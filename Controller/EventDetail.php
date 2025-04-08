<?php
include_once 'MainController.php';

class EventDetail extends Controller {
    private $eventDetailModel;
    private $eventDetailEntrants;
    
    public function __construct() {
        $this->loadModel('getEvent');
        $this->eventDetailModel = $this->model;
     
    }

   
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }
    
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['idEvent'])) {
            $idEvent = (int)$_POST['idEvent'];
            $events = $this->eventDetailModel->get();
            
            $eventInfos = [];
            foreach ($events as $event) {
                if ($event['idEvent'] === $idEvent) {
                    $eventInfos[] = $event;
                }
            }
 
    
            // On envoie à la vue
            $this->render('Events/eventDetail', [
                'eventInfos' => $eventInfos,
            ]);
        }
    }
    
}

