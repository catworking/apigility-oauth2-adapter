<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/11/15
 * Time: 10:03
 */
namespace ApigilityOauth2Adapter\DoctrineEntity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use ApigilityUser\DoctrineEntity\User;

/**
 * Class OauthAccessToken
 * @package ApigilityOauth2Adapter\DoctrineEntity
 * @Entity @Table(name="oauth_access_tokens")
 */
class OauthAccessToken
{
    /**
     * @Id @Column(type="string", length=40, nullable=false)
     */
    protected $access_token;

    /**
     * @Column(type="string", length=80, nullable=false)
     */
    protected $client_id;

    /**
     * @ManyToOne(targetEntity="ApigilityUser\DoctrineEntity\User", inversedBy="tokens")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @Column(type="datetime", nullable=false)
     */
    protected $expires;

    /**
     * @Column(type="string", length=2000, nullable=true)
     */
    protected $scope;
}