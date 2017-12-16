<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.12.11
 * Time: 12.10
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Schedule;
use AppBundle\Entity\Service;
use AppBundle\Entity\Worker;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @Route("reservation/service/{serviceId}")
     * @param Request $request
     * @param $serviceId
     *
     * @return Response
     */
    public function showAction(Request $request, $serviceId)
    {
        $em = $this->getDoctrine()->getManager();

        $request->query->get('user');

        $service = $em
            -> getRepository('AppBundle:Service')
            -> findAll();

        $userId = $this->getUser();

        $user = $em
            ->getRepository('AppBundle:User')
            ->findAll();

        $worker = $em
            ->getRepository('AppBundle:Worker')
            ->findAll();

        $serviceId = $em
            ->getRepository('AppBundle:Service')
            ->find($serviceId);

        $repository = $this->getDoctrine()->getRepository(Service::class);
        $serviceOne = $repository->find($serviceId);
        //$workerFrom = $repository->find($serviceId);
//        $workersByServices = $repository->findBy(
//            array('id' => $serviceId));
        $serviceRepo = $em->getRepository(Service::class);
        $workerByService = $serviceRepo->getWorkerByService($serviceId->getId());

        return $this->render(
            'AppBundle:User:user.html.twig',
            array(
                'serviceId' => $serviceId,
                'services' => $service,
                'workers' => $worker,
                'users' => $user,
                'userId' => $userId,
                'serviceOne' => $serviceOne,
//                'workersByServices' => $workersByServices,
                'workerByService' => $workerByService,
            )
        );
    }



//    /**
//     * @Route("/calendar/reserve-time/{serviceId}", name="make_reservation"
//     *
//     * @param $serviceId
//     * @return \Symfony\Component\HttpFoundation\Response
//     */
//    public function makeReservationAction($serviceId)
//    {
//
//        $em = $this->getDoctrine()->getManager();
//        $serviceId = $em->getRepository(Service::class)->find('id');
//
//        return $this->render($this->generateUrl('make_reservation',array
//        (
//            'serviceId'=>array($serviceId->getId())))
//
//        );
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

