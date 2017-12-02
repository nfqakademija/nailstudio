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
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Worker');
        $worker = $repository->findAll();
        return $this->render('AppBundle:Home:index.html.twig',
            array('workers' => $worker));
    }

    /**
     * @Route("/user", name="userpage")
     */
    public function userAction()
    {
        return $this->render('AppBundle:User:user.html.twig', []);
    }
}
