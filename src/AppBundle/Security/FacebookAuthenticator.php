<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.10.29
 * Time: 19.35
 */

namespace AppBundle\Security;


use AppBundle\Form\FaceBookForm;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Security\Authenticator\SocialAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class FacebookAuthenticator extends SocialAuthenticator
{
    private $clientRegistry;
    private $facebookForm;
    public function __construct(ClientRegistry $clientRegistry, FaceBookForm $facebookForm)
    {
        $this->clientRegistry = $clientRegistry;
        $this->facebookForm = $facebookForm;
    }
    public function getCredentials(Request $request)
    {
        if ($request->getPathInfo() != '/connect/facebook/check') {
            return;
        }
        return $this->fetchAccessToken($this->getFacebookClient());
    }
    private function getFacebookClient()
    {
        return $this->clientRegistry
            ->getClient('facebook_main');
    }
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $facebookUser = $this->getFacebookClient()
            ->fetchUserFromToken($credentials);
        $facebookUserArray = $facebookUser->toArray();
//        $existingUser = $this->userService->updateUser($facebookUserArray);
//        if ($existingUser) {
//            return $existingUser;
//        }
        $user = $this->facebookForm->createUser($facebookUserArray);
        return $user;
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
}