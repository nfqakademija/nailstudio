<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.11.8
 * Time: 01.11
 */

namespace AppBundle\EventListener;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Client\Provider\FacebookClient;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class PostFacebookAuthenticationListener
{

    private $clientRegistry;
    private $em;

    public function __construct(EntityManagerInterface $em, ClientRegistry $clientRegistry)
    {
        $this->clientRegistry = $clientRegistry;
        $this->em = $em;
    }

    public function onLoginSuccess(InteractiveLoginEvent $event)
    {
        $token = $event->getAuthenticationToken()->getUser()->getFacebookToken();
        $client = $this->clientRegistry->getClient('facebook_main');
        $provider = $client->getOAuth2Provider();
        $longToken = $provider->getLongLivedAccessToken($token);
        $facebookUser = $client->fetchUserFromToken($longToken);
        $user = $this->em->getRepository(User::class)
            ->findOneBy(['facebookId' => $facebookUser->getId()]);
        if(!$user->getFacebookPicture()){
            $user->setFacebookPicture($facebookUser->getPictureUrl());
            $this->em->flush();
        }
    }
}