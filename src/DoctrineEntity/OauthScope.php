<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/11/15
 * Time: 10:05
 */
namespace ApigilityOauth2Adapter\DoctrineEntity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;

/**
 * Class OauthScope
 * @package ApigilityOauth2Adapter\DoctrineEntity
 * @Entity @Table(name="oauth_scopes")
 */
class OauthScope
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string", length=255, nullable=false, options={"default":"supported"})
     */
    protected $type;

    /**
     * @Column(type="string", length=2000, nullable=true)
     */
    protected $scope;

    /**
     * @Column(type="string", length=80, nullable=true)
     */
    protected $client_id;

    /**
     * @Column(type="smallint", nullable=true, options={"default":null})
     */
    protected $is_default;
}