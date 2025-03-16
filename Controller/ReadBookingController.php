<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php'); 

class ReadBookingController extends Controller {
    private $readBookingModel;
    
    public function __construct() {
        $this->loadModel('ReadBooking');
        $this->readBookingModel = $this->model;
    }

    public function getUserBookings() {
        if (!isset($_SESSION['user'])) {
            header("Location: /login"); // Redirection si l'utilisateur n'est pas connecté
            exit();
        }

        $userId = $_SESSION['user']['id'];
        return $this->readBookingModel->read($userId);  
    }
}