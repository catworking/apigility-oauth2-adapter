<?php
/**
 * Created by PhpStorm.
 * User: figo-009
 * Date: 2017/5/12
 * Time: 17:26
 */
namespace ApigilityOauth2Adapter\Service;

use Zend\ServiceManager\ServiceManager;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrineToolPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrinePaginatorAdapter;
use Zend\Math\Rand;
use Doctrine\ORM\Query\Expr;
use ApigilityOauth2Adapter\DoctrineEntity;

class AccessTokenService
{
    protected $classMethodsHydrator;
    
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;
    
    /**
     * @var \ApigilityAd\Service\PositionService
     */
    protected $positionService;
    
    public function __construct(ServiceManager $services)
    {
        $this->classMethodsHydrator = new ClassMethodsHydrator();
        $this->em = $services->get('Doctrine\ORM\EntityManager');
        $this->positionService = $services->get('ApigilityAd\Service\PositionService');
    }
    
    /**
     * 获取一个横幅广告
     *
     * @param $banner_id
     * @return \ApigilityAd\DoctrineEntity\Banner
     * @throws \Exception
     * @internal param $position_id
     */
    public function getAccessToken($access_token)
    {
        $token = $this->em->find('ApigilityOauth2Adapter\DoctrineEntity\OauthAccessToken', $access_token);
        if (empty($token)) throw new \Exception('access_token不存在', 404);
        else return $token;
    }
    
    /**
     * 通过user_id获取access_token
     *
     * @param $params
     * @return DoctrinePaginatorAdapter
     */
    public function getAccessTokens($params)
    {
        $qb = new QueryBuilder($this->em);
        $qb->select('o')->from('ApigilityOauth2Adapter\DoctrineEntity\OauthAccessToken', 'o');
    
        $where = null;
        if (isset($params->user_id)) {
            if (!empty($where)) $where .= ' AND ';
            $where = 'o.user_id = :user_id';
        } else {
            throw new \Exception('用户标识不存在', 404);
        }
    
        if (!empty($where)) {
            $qb->where($where);
            if (isset($params->user_id)) $qb->setParameter('user_id', $params->user_id);
        }
    
        $doctrine_paginator = new DoctrineToolPaginator($qb->getQuery());
        return new DoctrinePaginatorAdapter($doctrine_paginator);
    }
    
    /**
     * 删除一个Banner广告
     *
     * @param $banner_id
     * @return bool
     */
    public function deleteAccessToken($access_token)
    {
        $token = $this->getAccessToken($access_token);
    
        if ($token instanceof DoctrineEntity\OauthAccessToken) {
            $this->em->remove($token);
            $this->em->flush();
        }
    
        return true;
    }
}