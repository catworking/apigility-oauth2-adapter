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
     * 获取一个access_token
     *
     * @param $access_token
     * @return \ApigilityOauth2Adapter\DoctrineEntity\OauthAccessToken
     * @throws \Exception
     */
    public function getAccessToken($access_token)
    {
        $token = $this->em->find('ApigilityOauth2Adapter\DoctrineEntity\OauthAccessToken', $access_token);
        if (empty($token)) throw new \Exception('access_token不存在', 404);
        else return $token;
    }
    
    /**
     * 获取某个用户的access_token
     *
     * @param $params
     * @return DoctrinePaginatorAdapter
     */
    public function getAccessTokens($params, $user)
    {
        $qb = new QueryBuilder($this->em);
        $qb->select('o')->from('ApigilityOauth2Adapter\DoctrineEntity\OauthAccessToken', 'o');
    
        $where = null;
        if (isset($params->user_id) && $user->getId() == $params->user_id) {
            if (!empty($where)) $where .= ' AND ';
            $where = 'o.user = :user_id';
        } else {
            throw new \Exception('未识别的用户标识', 404);
        }
    
        if (!empty($where)) {
            $qb->where($where);
            if (isset($params->user_id)) $qb->setParameter('user_id', $params->user_id);
        }
    
        $doctrine_paginator = new DoctrineToolPaginator($qb->getQuery());
        return new DoctrinePaginatorAdapter($doctrine_paginator);
    }
    
    /**
     * 删除一个access_token
     *
     * @param $banner_id
     * @param $user
     * @return bool
     */
    public function deleteAccessToken($access_token, $user)
    {
        $token = $this->getAccessToken($access_token);
        $user_id = $token->getUser()->getId();
        
        if ($user_id != $user->getId()) {
            throw new \Exception('未识别的用户标识', 404);
        }
    
        if ($token instanceof DoctrineEntity\OauthAccessToken) {
            $this->em->remove($token);
            $this->em->flush();
        }
    
        return true;
    }
}