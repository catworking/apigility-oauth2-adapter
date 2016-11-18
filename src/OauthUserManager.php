<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/11/15
 * Time: 21:55
 */
namespace ApigilityOauth2Adapter;

use ApigilityOauth2Adapter\DoctrineEntity\OauthUser;
use Doctrine\ORM\EntityManager;
use Zend\Crypt\Password\Bcrypt;
use Zend\Math\Rand;

class OauthUserManager
{
    protected $em;

    public function __construct(EntityManager $entity_manager)
    {
        $this->em = $entity_manager;
    }

    /**
     * 创建一个Oauth2用户
     *
     * @param $password
     * @return OauthUser
     */
    public function createUser($password)
    {
        $username = $this->generateUsername();
        $password = $this->encryptPassword($password);

        $oauth_user = new OauthUser();
        $oauth_user->setUsername($username);
        $oauth_user->setPassword($password);

        $this->em->persist($oauth_user);
        $this->em->flush();

        return $oauth_user;
    }

    /**
     * 更新用户密码
     *
     * @param $username
     * @param $new_password
     * @return string $new_password
     */
    public function updatePassword($username, $new_password)
    {
        $user = $this->em->find('ApigilityOauth2Adapter\DoctrineEntity\OauthUser', $username);
        if (empty($user)) throw new Exception\IdentityNotExistException();

        $user->setPassword($this->encryptPassword($new_password));

        $this->em->flush();

        return $new_password;
    }

    /**
     * 生成一个唯一的用户名
     *
     * @return string
     */
    private function generateUsername()
    {
        do {
            $string = Rand::getString(8, 'abcdefghijklmnopqrstuvwxyz', true);

            // 检查用户名是否已存在
            $user = $this->em->find('ApigilityOauth2Adapter\DoctrineEntity\OauthUser', $string);
        } while($user != null);

        return $string;
    }

    /**
     * 加密用户密码
     *
     * @param $password
     * @return string
     */
    private function encryptPassword($password)
    {
        $bcrypt = new Bcrypt();
        return $bcrypt->create($password);
    }
}