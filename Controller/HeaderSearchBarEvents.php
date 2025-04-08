<?php
include_once 'MainController.php';

class HeaderSearchBarEvents extends Controller {
    public $eventModel;
 


    public function __construct() {
        // Charger le modèle des événements
        $this->loadModel("GetEvent");
        $this->eventModel = $this->model;
    }
    public function index() {
        // Récupérer les événements
        $eventSearch = $this->eventModel->get(); 
    
        // Envoyer les événements et les réservations à la vue
        $this->render('Layout/layout', [
            'eventSearch' => $eventSearch,
        ]);
    }
}
