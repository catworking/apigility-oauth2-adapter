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

/**
 * Class OauthUser
 * @package ApigilityOauth2Adapter\DoctrineEntity
 * @Entity @Table(name="oauth_users")
 */
class OauthUser
{
    /**
     * @Id @Column(type="string", length=255, nullable=false)
     */
    protected $username;

    /**
     * @Column(type="string", length=2000, nullable=true)
     */
    protected $password;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    protected $first_name;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    protected $last_name;

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}