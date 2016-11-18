<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/11/15
 * Time: 10:02
 */
namespace ApigilityOauth2Adapter\DoctrineEntity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

/**
 * Class OauthClient
 * @package ApigilityOauth2Adapter\DoctrineEntity
 * @Entity @Table(name="oauth_clients")
 */
class OauthClient
{
    /**
     * @Id @Column(type="string", length=80, nullable=false)
     */
    protected $client_id;

    /**
     * @Column(type="string", length=80, nullable=false)
     */
    protected $client_secret;

    /**
     * @Column(type="string", length=2000, nullable=false)
     */
    protected $redirect_uri;

    /**
     * @Column(type="string", length=80, nullable=true)
     */
    protected $grant_types;

    /**
     * @Column(type="string", length=2000, nullable=true)
     */
    protected $scope;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    protected $user_id;

    public function setClientId($client_id)
    {
        $this->client_id = $client_id;
        return $this;
    }

    public function getClientId()
    {
        return $this->client_id;
    }

    public function setClientSecret($client_secret)
    {
        $this->client_secret = $client_secret;
        return $this;
    }

    public function getClientSecret()
    {
        return $this->client_secret;
    }

    public function setRedirectUri($redirect_uri)
    {
        $this->redirect_uri = $redirect_uri;
        return $this;
    }

    public function getRedirectUri()
    {
        return $this->redirect_uri;
    }
}