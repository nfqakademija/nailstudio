<?php
namespace AppBundle\Service;

// liste des événements
 $json = array();
 // requête qui récupère les événements
// $request = "SELECT title, start, end FROM akademija.schedule ORDER BY id";
$conn = $this->getEntityManager()
    ->getConnection();
$sql = 'SELECT title, start, end FROM akademija.schedule ORDER BY id';
$stmt = $conn->prepare($sql);
$stmt->execute();
var_dump($stmt->fetchAll());die;
 // connexion à la base de données
 try {
     $bdd = new PDO('mysql:host=mariadb;dbname=akademija', 'root', 'root');
 } catch(Exception $e) {
     exit('Impossible de se connecter à la base de données.');
 }
 // exécution de la requête
 $result = $bdd->query($request) or die(print_r($bdd->errorInfo()));

 // envoi du résultat au success
 echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));


/**
// * Created by PhpStorm.
// * User: benas
// * Date: 17.12.11
// * Time: 15.01
// */
//
//namespace AppBundle\Service;
//
//
//use AncaRebeca\FullCalendarBundle\Event\CalendarEvent;
//
//class Calendar extends \AncaRebeca\FullCalendarBundle\Service\Calendar
//{
//    /**
//     * @param \Datetime $startDate
//     * @param \DateTime $endDate
//     * @param array $filters
//     *
//     * @return string json
//     */
//    public function addData(\Datetime $startDate, \DateTime $endDate, array $filters = [])
//    {
//        /** @var CalendarEvent $event */
//        $event = $this->dispatcher->dispatch(
//            CalendarEvent::ADD_DATA,
//            new CalendarEvent($startDate, $endDate, $filters)
//        );
//
//        return $this->serializer->serialize($event->getEvents());
//    }
//
//
//}
