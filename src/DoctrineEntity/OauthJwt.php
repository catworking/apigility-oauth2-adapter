<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/11/15
 * Time: 10:06
 */
namespace ApigilityOauth2Adapter\DoctrineEntity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

/**
 * Class OauthJwt
 * @package ApigilityOauth2Adapter\DoctrineEntity
 * @Entity @Table(name="oauth_jwt")
 */
class OauthJwt
{
    /**
     * @Id @Column(type="string", length=80, nullable=false)
     */
    protected $client_id;

    /**
     * @Column(type="string", length=80, nullable=true)
     */
    protected $subject;

    /**
     * @Column(type="string", length=2000, nullable=true)
     */
    protected $public_key;
}