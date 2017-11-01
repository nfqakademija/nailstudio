<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.11.1
 * Time: 21.00
 */

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
class FaceBookForm
{
    private $em;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function createUser($userArray){
        $user = new User();
        $user->setEmail($userArray['email']);
        $user->setFacebookId($userArray['id']);
        $this->em->persist($user);
        $this->em->flush();
        return $user;
    }

}