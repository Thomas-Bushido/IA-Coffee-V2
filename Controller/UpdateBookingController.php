<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php'); 

class UpdateBookingController extends Controller {
    private $updateBookingModel;
    
    public function __construct() {
        $this->loadModel('updateBooking');
        $this->updateBookingModel = $this->model;
    }

    public function index() {
        if ($_SESSION['user']['role'] === 1) {
            $updates = $this->updateBookingModel->update();  
            $this->render('Booking/booking.php', ['updates' => $updates]);
        } 
     else {
        header("Location: /login.php"); // Rediriger vers la page de login
        exit();
    }
}
}