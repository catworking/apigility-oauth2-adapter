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
    // 配置token持续刷新支持，以及refresh_token的有效时间
    'zf-oauth2' => [
        'options' => [
            'always_issue_new_refresh_token' => true,
            'refresh_token_lifetime'=>1209600, // 14天
        ],
    ],
    'service_manager' => array(
        'factories' => array(
            'ApigilityOauth2Adapter\OauthUserManager' => 'ApigilityOauth2Adapter\OauthUserManagerFactory',
        ),
    )
];
