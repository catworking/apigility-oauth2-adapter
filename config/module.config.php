<?php
return [
    'zf-mvc-auth' => [
        'authentication' => [
            'adapters' => [
                'apigilityoauth2adapter' => [
                    'adapter' => \ZF\MvcAuth\Authentication\OAuth2Adapter::class,
                    'storage' => [
                        'adapter' => \pdo::class,
                        'dsn' => '',
                        'route' => '/oauth',
                        'username' => '',
                        'password' => '',
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => array(
        'factories' => array(
            'ApigilityOauth2Adapter\OauthUserManager' => 'ApigilityOauth2Adapter\OauthUserManagerFactory',
        ),
    )
];
