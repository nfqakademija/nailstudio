<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class HomeController.
 *
 * @Route("/")
 */
class HomeController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $worker = $this->getDoctrine()
            ->getRepository('AppBundle:Worker')
            ->findAll();
        $service = $this->getDoctrine()
            ->getRepository('AppBundle:Service')
            ->findAll();
        return $this->render('AppBundle:Home:index.html.twig',
            array('workers' => $worker, 'services' => $service)
        );
    }

    /**
     * @Route("/user/{$id}", name="userpage")
     */
    public function userAction($id)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy($id);
        $service = $this->getDoctrine()
            ->getRepository('AppBundle:Service')
            ->findAll();
        return $this->render('AppBundle:User:user.html.twig', array('services' => $service));
    }
}
