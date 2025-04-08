<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php');


class AdminGetEventList extends Controller{
    private $getEvent;
  
    public function __construct() {
        $this->loadModel("getEvent");
        $this->getEvent = $this->model;
    }

    public function index () {
        
        $events = $this->getEvent->get();
        $this->render('Users/Admin/eventList', ['events' => $events]);
        
    }
}


// $eventsFetcher = new EventsFetcher();
// $events = $eventsFetcher->getEvents();
// // var_dump($events);

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
//     // 📌 Ajout d'un debug pour voir ce qui est envoyé
//     var_dump($_POST);

//     // 🔹 Création d'un événement
//     if (isset($_POST['titre'], $_POST['date'], $_POST['heure'], $_POST['lieu'], $_POST['description'], $_POST['place'])) {
//         $title = $_POST['titre'];
//         $date = $_POST['date'];
//         $hour = $_POST['heure'];
//         $description = $_POST['description'];
//         $address = $_POST['lieu'];
//         $entrants = $_POST['place'];

//         $createEvent = new Create();
//         $newEvent = $createEvent->createEvent($title, $date, $hour, $description, $address, $entrants);

//         header("Location: /Controller/Admin/eventList.php");
//         exit();
//     }
    
//     // 🔹 Suppression d'un événement
//     if (isset($_POST['idEvent'])) {
//         $EventId = $_POST['idEvent'];
//         $deleteEvent = new Delete();
//         $cancel = $deleteEvent->deleteEvent($EventId);
        
//         header("Location: /Controller/Admin/eventList.php");
//         exit();
//     }

//     // 🔹 Mise à jour d'un événement
//     if (isset($_POST['idEventModify'], $_POST['titleModify'], $_POST['dateModify'], $_POST['hourModify'], $_POST['addressModify'], $_POST['descriptionModify'], $_POST['entrantsModify'])) {
//         var_dump($_POST);
       
//         $updateID = $_POST['idEventModify'];
//         $updateTitle = $_POST['titleModify'];
//         $updateDate = $_POST['dateModify'];
//         $updateHour = $_POST['hourModify'];
//         $updateDescription = $_POST['descriptionModify'];
//         $updateAddress = $_POST['addressModify'];
//         $updateEntrants = $_POST['entrantsModify'];
      
//         $updateEvent = new Update();
//         $update = $updateEvent->updateEvent($updateID, $updateTitle, $updateDate, $updateHour, $updateDescription, $updateAddress, $updateEntrants);

//         header("Location: /Controller/Admin/eventList.php");
//         exit();
//     }
// }




// require('../../View/Users/Admin/eventList.php');
