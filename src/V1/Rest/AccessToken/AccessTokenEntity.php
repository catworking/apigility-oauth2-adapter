<?php
namespace ApigilityOauth2Adapter\V1\Rest\AccessToken;

use ApigilityCatworkFoundation\Base\ApigilityObjectStorageAwareEntity;
use ApigilityCatworkFoundation\Base\ApigilityEntity;

class AccessTokenEntity extends ApigilityEntity
{
    /**
     * @Id @Column(type="string", length=40, nullable=false)
     */
    protected $access_token;
    
    /**
     * 客户端id
     *
     * @Column(type="string", length=80, nullable=false)
     */
    protected $client_id;
    
    /**
     * 用户id
     *
     * @Column(type="string", length=255, nullable=true)
     */
    protected $user_id;
    
    /**
     * 过期时间
     *
     * @Column(type="datetime", nullable=false)
     */
    protected $expires;
    
    /**
     * 
     *
     * @Column(type="string", length=2000, nullable=true)
     */
    protected $scope;
    
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;
        return $this;
    }
    
    public function getAccessToken()
    {
        return $this->access_token;
    }
    
    public function setClientId($client_id)
    {
        $this->client_id = $client_id;
        return $this;
    }
    
    public function getClientId()
    {
        return $this->client_id;
    }
    
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }
    
    public function getUserId()
    {
        return $this->user_id;
    }
    
    public function setExpires($expires)
    {
        $this->expires = $expires;
        return $this;
    }
    
    public function getExpires()
    {
        return $this->expires;
    }
    
    public function setScope($scope)
    {
        $this->scope = $scope;
        return $this;
    }
    
    public function getScope()
    {
        return $this->scope;
    }
}
