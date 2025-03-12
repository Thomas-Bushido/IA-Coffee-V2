<?php
include_once 'MainController.php';

class User extends Controller {
    private $getUserModel;

    public function __construct() {
        // Charger le modèle des événements
        $this->loadModel("GetUser");
        $this->getUserModel = $this->model;
    }

    function AllUsers(){
       
         $checkUsers = $this->getUserModel->get();
         return $checkUsers;
            
     }
}

