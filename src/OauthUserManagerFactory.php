<?php
namespace ApigilityOauth2Adapter;

use Zend\ServiceManager\ServiceManager;

class OauthUserManagerFactory
{
    public function __invoke(ServiceManager $services)
    {
        $entity_manager = $services->get('Doctrine\ORM\EntityManager');
        return new OauthUserManager($entity_manager);
    }
}
