<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/11/15
 * Time: 10:04
 */
namespace ApigilityOauth2Adapter\DoctrineEntity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

/**
 * Class OauthAuthorizationCode
 * @package ApigilityOauth2Adapter\DoctrineEntity
 * @Entity @Table(name="oauth_authorization_codes")
 */
class OauthAuthorizationCode
{
    /**
     * @Id @Column(type="string", length=40, nullable=false)
     */
    protected $authorization_code;

    /**
     * @Column(type="string", length=80, nullable=false)
     */
    protected $client_id;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    protected $user_id;

    /**
     * @Column(type="string", length=2000, nullable=true)
     */
    protected $redirect_uri;

    /**
     * @Column(type="datetime", nullable=false)
     */
    protected $expires;

    /**
     * @Column(type="string", length=2000, nullable=true)
     */
    protected $scope;

    /**
     * @Column(type="string", length=2000, nullable=true)
     */
    protected $id_token;
}