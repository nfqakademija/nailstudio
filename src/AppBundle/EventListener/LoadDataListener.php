<?php
/**
 * Created by PhpStorm.
 * User: benas
 * Date: 17.11.26
 * Time: 08.15
 */

namespace AppBundle\EventListener;

use AncaRebeca\FullCalendarBundle\Event\CalendarEvent;
use AncaRebeca\FullCalendarBundle\Model\Event;
use AncaRebeca\FullCalendarBundle\Model\FullCalendarEvent;
use AppBundle\Entity\Schedule;
use AppBundle\Entity\Service;
use Doctrine\ORM\EntityManager;

class LoadDataListener
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param CalendarEvent $calendarEvent
     *
     * @return FullCalendarEvent[]
     */
    public function loadData(CalendarEvent $calendarEvent)
    {
        // You can retrieve information from the event dispatcher (eg, You may want which day was selected in the calendar):
        // $startDate = $calendarEvent->getStart();
        // $endDate = $calendarEvent->getEnd();
        // $filters = $calendarEvent->getFilters();
        // You may want do a custom query to populate the events
        // $currentEvents = $repository->findByStartDate($startDate);
        $repository = $this->em
            ->getRepository(
                'AppBundle:Schedule'
            );

        $schedules = $repository->findAll();
        // You may want to add an Event into the Calendar view.
        /** @var Schedule $schedule */

        foreach ($schedules as $schedule) {
            $calendarEvent->addEvent(
                new Event($schedule->getTitle(),
                    $schedule->getStart(),
                    $schedule->getEnd())
            );
        }
    }


//    public function addData(CalendarEvent $calendarEvent, $id)
//    {
//        // You can retrieve information from the event dispatcher (eg, You may want which day was selected in the calendar):
//        // $startDate = $calendarEvent->getStart();
//        // $endDate = $calendarEvent->getEnd();
//        // $filters = $calendarEvent->getFilters();
//        // You may want do a custom query to populate the events
//        // $currentEvents = $repository->findByStartDate($startDate);
//        $repository = $this->em
//            ->getRepository(
//                'AppBundle:Schedule'
//            );
//
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
//
//        $service = $this->em->getRepository(Service::class);
//        $serviceDuration = $this->$service->getService()->getDurationInMinutes();
//        dump($serviceDuration);
//        $schedule = new Schedule();
//        $schedule->setStart(new \DateTime());
//
//        $user->setName($facebookUser->getName());
//        $user->setFacebookId($facebookUser->getId());
//        $user->setFacebookPicture($facebookUser->getPictureUrl());
//        $user->setRoles(['ROLE_USER']);
//        $user->setFacebookToken($token);
//        $this->em->persist($user);
//        $this->em->flush();
//        return $user;
//    }
}

