<?php
include_once 'MainController.php';

class Event extends Controller {
    private $eventModel;

    public function __construct() {
        // Charger le modèle des événements
        $this->loadModel("GetEvent");
        $this->eventModel = $this->model;
    }

    public function index() {
        // Récupérer les événements
        $events = $this->eventModel->get(); 
        // Définition du titre
        $title = "Evenements";

        // Inclure la vue (en s'assurant que ROOT est bien défini dans index.php)
        require(ROOT . 'View/Events/event.php');
    }
}



