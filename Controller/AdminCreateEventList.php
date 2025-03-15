<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php');


class AdminCreateEventList extends Controller{
    private $createEventModel;
  
    public function __construct() {
        $this->loadModel("CreateEvent");
        $this->createEventModel = $this->model;
    }

    public function index () {
        //     // 🔹 Création d'un événement
    if (isset($_POST['titre'], $_POST['date'], $_POST['heure'], $_POST['lieu'], $_POST['description'], $_POST['place'])) {
        $title = $_POST['titre'];
        $date = $_POST['date'];
        $hour = $_POST['heure'];
        $description = $_POST['description'];
        $address = $_POST['lieu'];
        $entrants = $_POST['place'];

        $this->createEventModel->create($title, $date, $hour, $description, $address, $entrants);
        header("Location: AdminGetEventList");
    }

}

}