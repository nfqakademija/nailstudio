<?php

namespace AppBundle\Controller;

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
     * @Route("/", name="home_page")
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
     * @Route("/user", name="user_page")
     */
    public function userAction()
    {
        $service = $this->getDoctrine()
            ->getRepository('AppBundle:Service')
            ->findAll();

        $user = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findAll();

        return $this->render(
            'AppBundle:User:user.html.twig',
            array('services' => $service, 'user' => $user)
        );
    }
}
