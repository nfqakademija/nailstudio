<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", unique=true, nullable=true)
     */
    private $name;
    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $email;
    /**
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $roles = array();
    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $apiToken;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastLoginTime;
    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $facebookId;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $facebookPicture;
    /**
     * @ORM\Column(type="string",)
     */
    private $facebookToken;

    /**
     * @var string
     *
     * @ORM\Column(name="picture_url", type="string", length=255)
     */
    private $pictureUrl = "";

    public function __construct()
    {
        $this->apiToken = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the roles or permissions granted to the user for security.
     */
    public function getRoles()
    {
        $roles = $this->roles;
        // guarantees that a user always has at least one role for security
        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }
        return array_unique($roles);
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     */
    public function getSalt()
    {
        // See "Do you need to use a Salt?" at http://symfony.com/doc/current/cookbook/security/entity_provider.html
        // we're using bcrypt in security.yml to encode the password, so
        // the salt value is built-in and you don't have to generate one
        return;
    }

    /**
     * Removes sensitive data from the user.
     */
    public function eraseCredentials()
    {
        // if you had a plainPassword property, you'd nullify it here
        // $this->plainPassword = null;
    }

    /**
     * @param string $apiToken
     */
    public function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;
    }

    public function setLastLoginTime(\DateTime $lastLoginTime)
    {
        $this->lastLoginTime = $lastLoginTime;
    }

    public function getFacebookId()
    {
        return $this->facebookId;
    }

    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFacebookPicture()
    {
        return $this->facebookPicture;
    }

    /**
     * @param mixed $facebookPicture
     */
    public function setFacebookPicture($facebookPicture)
    {
        $this->facebookPicture = $facebookPicture;
    }

    /**
     * @return mixed
     */
    public function getFacebookToken()
    {
        return $this->facebookToken;
    }

    /**
     * @param mixed $facebookToken
     */
    public function setFacebookToken($facebookToken)
    {
        $this->facebookToken = $facebookToken;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }

    /**
     * @return string
     */
    public function getPictureUrl()
    {
        return $this->pictureUrl;
    }

    /**
     * @param string $pictureUrl
     */
    public function setPictureUrl($pictureUrl)
    {
        $this->pictureUrl = $pictureUrl;
    }


}