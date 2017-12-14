<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.12.11
 * Time: 12.10
 */

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Reservation;
use AppBundle\Entity\Schedule;
use AppBundle\Entity\Service;
use AppBundle\Entity\User;
use AppBundle\Entity\Worker;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class CalendarController extends Controller
{

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function calendarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $status = 'error';
        $title = $request->request->get('title');
        $start = $request->request->get('start');
        $end = $request->request->get('end');

        $schedule = new Schedule();
        $schedule->setTitle($title);
        $schedule->setStart(new \DateTime($start));
        $schedule->setEnd(new \DateTime($end));
        $em->persist($schedule);
        $em->flush();

        return new JsonResponse([
            'status' => $status,
            'title' => $title,
            'start' => $start,
            'end' => $end
        ]);
    }


    public function showServiceAction(Request $request){

    }


    /**
     * @param Request $request
     * @param $serviceId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function makeReservationAction(Request $request, $serviceId)
    {

        $em = $this->getDoctrine()->getManager();
        $userRepository = $em->getRepository(User::class);

        // first check if a user with the same username already exists.
        $existingUser = $userRepository->findOneBy(['id'=> $userRepository->find('id')]);
        var_dump($existingUser);die();
        $reservation = new Reservation();
        $reservation->setUser($this->getUser());
        $reservation->setTitle('$worker->getName() + $schedule->getTitle()');
//        $userRepository = $this->entityManager->getRepository(User::class);

        // first check if a user with the same username already exists.
//        $existingUser = $userRepository->findOneBy(['username' => $username]);
//        $service = $this->getDoctrine()
//            ->getRepository('AppBundle:Service')
//            ->findAll();
//        $userRepo = $this->getDoctrine()
//            ->getRepository('AppBundle:User');
//
//        $user = $userRepo->findOneBy(array('user.name' => $userRepo->getId()));





        $em = $this->getDoctrine()->getManager();
        $serviceId = $em->getRepository(Service::class)->findAll();

        return $this->render('AppBundle:Reservation:reservation.html.twig',
            array
            (
//              'services'=> $services,
                'serviceId' => $serviceId,
                'existingUser' => $existingUser
            )

        );
    }


//    /**
//     * @return EntityManager|object
//     */
//    private function getEntitymanager()
//    {
//        return $this->get("doctrine.orm.default_entity_manager");
//    }

    /**
     * @param $start
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
//    public function updateAction($id, Request $request)
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $id = $request->request->get('id');
//        $title = $request->request->get('title');
//        $start = $request->request->get('start');
//        $end = $request->request->get('end');
//
//        $schedule = $em->getRepository(Schedule::class)->find($id);
//var_dump($schedule);die();
//        if (!$schedule) {
//            throw $this->createNotFoundException(
//                'No product found for id '.$start
//            );
//        }
//
//        $schedule->setTitle($title);
//        $schedule->setStart($start);
//        $schedule->setEnd($end);
//
//        $em->flush();
//
//        return $this->redirectToRoute('update_calendar', [
//            'start' => $schedule->getStart()
//        ]);
//    }

}

