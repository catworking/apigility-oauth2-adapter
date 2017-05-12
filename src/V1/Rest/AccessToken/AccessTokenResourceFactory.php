<?php
namespace ApigilityOauth2Adapter\V1\Rest\AccessToken;

class AccessTokenResourceFactory
{
    public function __invoke($services)
    {
        return new AccessTokenResource();
    }
}
