<?php
return [
    'service_manager' => [
        'factories' => [
            \ApigilityOauth2Adapter\V1\Rest\AccessToken\AccessTokenResource::class => \ApigilityOauth2Adapter\V1\Rest\AccessToken\AccessTokenResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'apigility-oauth2-adapter.rest.access-token' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/oauth/access-token[/:access_token_id]',
                    'defaults' => [
                        'controller' => 'ApigilityOauth2Adapter\\V1\\Rest\\AccessToken\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'apigility-oauth2-adapter.rest.access-token',
        ],
    ],
    'zf-rest' => [
        'ApigilityOauth2Adapter\\V1\\Rest\\AccessToken\\Controller' => [
            'listener' => \ApigilityOauth2Adapter\V1\Rest\AccessToken\AccessTokenResource::class,
            'route_name' => 'apigility-oauth2-adapter.rest.access-token',
            'route_identifier_name' => 'access_token_id',
            'collection_name' => 'access_token',
            'entity_http_methods' => [
                0 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \ApigilityOauth2Adapter\V1\Rest\AccessToken\AccessTokenEntity::class,
            'collection_class' => \ApigilityOauth2Adapter\V1\Rest\AccessToken\AccessTokenCollection::class,
            'service_name' => 'AccessToken',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'ApigilityOauth2Adapter\\V1\\Rest\\AccessToken\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'ApigilityOauth2Adapter\\V1\\Rest\\AccessToken\\Controller' => [
                0 => 'application/vnd.apigility-oauth2-adapter.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'ApigilityOauth2Adapter\\V1\\Rest\\AccessToken\\Controller' => [
                0 => 'application/vnd.apigility-oauth2-adapter.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \ApigilityOauth2Adapter\V1\Rest\AccessToken\AccessTokenEntity::class => [
                'entity_identifier_name' => 'access_token',
                'route_name' => 'apigility-oauth2-adapter.rest.access-token',
                'route_identifier_name' => 'access_token_id',
                'hydrator' => \Zend\Hydrator\ClassMethods::class,
            ],
            \ApigilityOauth2Adapter\V1\Rest\AccessToken\AccessTokenCollection::class => [
                'entity_identifier_name' => 'access_token',
                'route_name' => 'apigility-oauth2-adapter.rest.access-token',
                'route_identifier_name' => 'access_token_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'ApigilityOauth2Adapter\\V1\\Rest\\AccessToken\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => true,
                ],
            ],
        ],
    ],
];
