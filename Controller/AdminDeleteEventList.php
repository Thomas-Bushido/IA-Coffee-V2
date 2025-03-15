<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php');

class AdminDeleteEventList extends Controller{
    private $deleteEventModel;
    // private $updateUser;
    // private $deleteUser;
    public function __construct() {
        $this->loadModel("DeleteEvent");
        $this->deleteEventModel = $this->model;
    }

    public function index() {
 // 🔹 Suppression d'un événement
    if (isset($_POST['idEvent'])) {
        $EventId = $_POST['idEvent'];
        
        $this->deleteEventModel->delete($EventId);
        
        header("Location: AdminGetEventList");
        exit();
    }


    }
}


