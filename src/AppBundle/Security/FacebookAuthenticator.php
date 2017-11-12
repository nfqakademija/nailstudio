<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.10.29
 * Time: 19.35
 */

namespace AppBundle\Security;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Security\Authenticator\SocialAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class FacebookAuthenticator extends SocialAuthenticator
{
    private $clientRegistry;
    private $em;

    /**
     * FacebookAuthenticator constructor.
     * @param ClientRegistry $clientRegistry
     * @param EntityManager $em
     */
    public function __construct(ClientRegistry $clientRegistry, EntityManager $em)
    {
        $this->em = $em;
        $this->clientRegistry = $clientRegistry;
    }

    /**
     * @param Request $request
     * @return \League\OAuth2\Client\Token\AccessToken|void
     */
    public function getCredentials(Request $request)
    {
        if ($request->getPathInfo() != '/connect/facebook/check') {
            return;
        }
        return $this->fetchAccessToken($this->getFacebookClient());
    }

    /**
     * @return \KnpU\OAuth2ClientBundle\Client\OAuth2Client
     */
    private function getFacebookClient()
    {
        return $this->clientRegistry
            ->getClient('facebook_main');
    }

    /**
     * @param $credentials
     * @param UserProviderInterface $userProvider
     * @return User|null|object
     */
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $facebookUser = $this->getFacebookClient()
            ->fetchUserFromToken($credentials);
        $facebookUserArray = $facebookUser->toArray();
        $existingUser = $this->updateUser($facebookUserArray);
        if ($existingUser) {
            return $existingUser;
        }
        $user = new User();
        $user->setEmail($facebookUserArray['email']);
        $user->setFacebookId($facebookUserArray['id']);
        $user->setRoles(array('ROLE_USER'));
        $user->setName($facebookUserArray['name']);
        $user->setFacebookToken($credentials);
        $this->em->persist($user);
        $this->em->flush();
        return $user;
    }

    /**
     * @param $userArray
     * @return User|null|object
     */
    public function updateUser($userArray)
    {
        $existingUser = $this->em->getRepository('AppBundle:User')
            ->findOneBy(['facebookId' => $userArray['id']]);
        if ($existingUser) {
            $existingUser->setUpdated(new \DateTime);
            $this->em->persist($existingUser);
            $this->em->flush();
            return $existingUser;
        }
        return null;
    }


    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // TODO: Implement onAuthenticationSuccess() method.
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        // TODO: Implement onAuthenticationFailure() method.
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        // TODO: Implement start() method.
    }
    /**
     * Return a UserInterface object based on the credentials.
     *
     * The *credentials* are the return value from getCredentials()
     *
     * You may throw an AuthenticationException if you wish. If you return
     * null, then a UsernameNotFoundException is thrown for you.
     *
     * @param mixed $credentials
     * @param UserProviderInterface $userProvider
     *
     * @throws AuthenticationException
     *
     * @return UserInterface|null
     */
}