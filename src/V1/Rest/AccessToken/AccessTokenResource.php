<?php
namespace ApigilityOauth2Adapter\V1\Rest\AccessToken;

use Zend\ServiceManager\ServiceManager;
use ZF\ApiProblem\ApiProblem;
use ApigilityCatworkFoundation\Base\ApigilityResource;

class AccessTokenResource extends ApigilityResource
{
    /**
     * @var \ApigilityAd\Service\BannerService
     */
    protected $accessTokenService;
    
    /**
     * @var \ApigilityUser\Service\UserService
     */
    protected $userService;
    
    public function __construct(ServiceManager $services)
    {
        parent::__construct($services);
    
        $this->accessTokenService = $this->serviceManager->get('ApigilityOauth2Adapter\Service\AccessTokenService');
        $this->userService = $services->get('ApigilityUser\Service\UserService');
    }
    
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return new ApiProblem(405, 'The POST method has not been defined');
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        try {
            $user = $this->userService->getAuthUser();
            return $this->accessTokenService->deleteAccessToken($id, $user);
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        try {
            return new AccessTokenEntity($this->accessTokenService->getAccessToken($id), $this->serviceManager);
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        try {
            $user = $this->userService->getAuthUser();
            return new AccessTokenCollection($this->accessTokenService->getAccessTokens($params, $user), $this->serviceManager);
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
