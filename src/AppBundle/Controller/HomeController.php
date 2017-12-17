<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\User\UserInterface;

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

        $user = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findAll();

        return $this->render(
            'AppBundle:Home:index.html.twig',
            array(
                'workers' => $worker,
                'services' => $service,
                'users' => $user
            )
        );
    }

    /**
     * @Route("/user", name="user_page")
     */
    public function userAction()
    {
        $userBySchedule = $this->getUser()->getId();
        $user = $this->getDoctrine()
            ->getRepository('AppBundle:Service')
            ->findAll();

        $service = $this->getDoctrine()
            ->getRepository('AppBundle:Service')
            ->findAll();

        $worker = $this->getDoctrine()
            ->getRepository('AppBundle:Worker')
            ->findAll();

        $schedule = $this->getDoctrine()
            ->getRepository('AppBundle:Schedule')
            ->findBy(array('user' => $userBySchedule));

        return $this->render(
            'AppBundle:User:user_reservations.html.twig',
            array(
                'services' => $service,
                'workers' => $worker,
                'user' => $user,
                'schedule' => $schedule,
            )
        );
    }
}
