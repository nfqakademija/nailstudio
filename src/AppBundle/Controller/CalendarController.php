<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.12.11
 * Time: 12.10
 */

namespace AppBundle\Controller;


use AncaRebeca\FullCalendarBundle\Event\CalendarEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CalendarController extends CalendarEvent
{
    public function addData(CalendarEvent $calendarEvent)
    {
        // You can retrieve information from the event dispatcher (eg, You may want which day was selected in the calendar):
        $startDate = $calendarEvent->getStart();
        $endDate = $calendarEvent->getEnd();
        $title = $this->addData()->getTitle();
        $filters = $calendarEvent->getFilters();
        // You may want do a custom query to populate the events
        // $currentEvents = $repository->findByStartDate($startDate);
        $repository = $this->em
            ->getRepository(
                'AppBundle:Schedule'
            );

//        $schedules = $repository->findAll();
//        // You may want to add an Event into the Calendar view.
//        /** @var Schedule $schedule */
//
//        foreach ($schedules as $schedule) {
//            $calendarEvent->addEvent(
//                new Event($schedule->getTitle(),
//                    $schedule->getStart(),
//                    $schedule->getEnd())
//            );
//        }

//        $service = $this->em->getRepository(Service::class);
//        $serviceDuration = $this->$service->getService()->getDurationInMinutes();
//        dump($serviceDuration);
        $schedule = new Schedule();
        $schedule->setStart($startDate);
        $schedule->setEnd($endDate);
//        $schedule->setTitle()

        $this->em->persist($schedule);
        $this->em->flush();
        return $schedule;
    }

//    function changeAction(Request $request) {
////        $id = $request->get('id');
//
//        $newStartData = $request->get('newStartData');
//        $newEndData = $request->get('newEndData');
//        $this->get('app_bundle.service.calendar')->addData($newStartData,$newEndData);
//        return ( 201);
//    }
//    /*
//     * Change end date event
//     *
//     */
//    function resizeAction(Request $request) {
//        $id = $request->get('id');
//        $newDate = $request->get('newDate');
//        $this->get('anca_rebeca_full_calendar.service.calendar')->resizeEvent($newDate,$id);
//        return new Response($id, 201);
//    }
}
