<?php
/**
 * Created by PhpStorm.
 * User: figo-009
 * Date: 2017/5/12
 * Time: 17:26
 */
namespace ApigilityOauth2Adapter\Service;

use Zend\ServiceManager\ServiceManager;

class AccessTokenServiceFactory
{
    public function __invoke(ServiceManager $services)
    {
        return new AccessTokenService($services);
    }
}