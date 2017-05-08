# Apigility Oauth2 Adapter 认证组件
提供了Oauth2认证功能。

## 配置 Authentication Adapter
要理解本组件，必须先了解[Apigility中的Oauth2](https://apigility.org/documentation/auth/authentication-oauth2)功能。

此功能是由[zfcampus/zf-oauth2](https://github.com/zfcampus/zf-oauth2)模块提供的，
该模块整合了一个第三方Oauth2认证服务库[bshaffer/oauth2-server-php](https://github.com/bshaffer/oauth2-server-php)
来提供Oauth2认证功能。

本组件主要是按照[Apigility文档](https://apigility.org/documentation/auth/authentication-oauth2)
的指引，用PHP代码的方式配置了一个OAuth2 PDO类型的 authentication adapter。
具体的配置代码在/config/module.config.php文件中，内容类似如下：
```php
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
```

这个文件中的配置是模块的默认配置，从代码中可以看到，并没有配置具体的数据库dsn和帐号，
这是因为每个项目的数据库地址和帐号是不同的，所以在应用的全局配置中需要覆盖模块的默认配置，
指定具体的数据库信息，一般来说应该在apigility-skeleton工程中的/config/autoload/local.php中进行配置覆盖。

## 生成数据库表
除了OAuth2 PDO Adapter，的配置，本组件还为Oauth2服务生成了一系列数据库表，这些表是按照[zfcampus/zf-oauth2模块文档](https://github.com/zfcampus/zf-oauth2/blob/master/README.md)
的要求来生成的，为了能够统一管理数据库结构，所以在本组件中通过定义Doctrine实体类的方式来替代SQL脚本生成。

## Oauth2用户帐号注册
本组件还实现了一个名为 OauthUserManager 的服务，用于添加用户帐号。

该服务主要由Apigility User注册用户时调用来创建用户帐号。