<?php
namespace ApigilityOauth2Adapter\V1\Rest\AccessToken;

use ApigilityCatworkFoundation\Base\ApigilityCollection;

class AccessTokenCollection extends ApigilityCollection
{
    protected $itemType = AccessTokenEntity::class;
}
