<?php

namespace App\EventSubscriber;

use CalendarBundle\CalendarEvents;
use CalendarBundle\Entity\Event;
use CalendarBundle\Event\CalendarEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CalendarSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            CalendarEvents::SET_DATA => 'onCalendarSetData',
        ];
    }

    public function onCalendarSetData(CalendarEvent $calendar)
{
    $start = $calendar->getStart();
    $end = $calendar->getEnd();
    $filters = $calendar->getFilters();

    // fetch plannings from the database
    $plannings = $this->entityManager->getRepository(Planning::class)
        ->createQueryBuilder('p')
        ->where('p.datediffusion BETWEEN :start AND :end')
        ->setParameter('start', $start)
        ->setParameter('end', $end)
        ->getQuery()
        ->getResult();

    foreach ($plannings as $planning) {
        // create an Event object using the planning's datediffusion attribute
        $event = new Event(
            $planning->getFilm()->getTitle(),
            $planning->getDateDiffusion(),
            $planning->getDateDiffusion()
        );
        $calendar->addEvent($event);
    }
}

}