<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php');

class DeleteBookingController extends Controller{
    private $deleteBookingModel;
    // private $updateUser;
    // private $deleteUser;
    public function __construct() {
        $this->loadModel("DeleteBooking");
        $this->deleteBookingModel = $this->model;
    }

    public function index() {
 // 🔹 Suppression d'un événement
    if($_SESSION['user']['role'] === 1 && isset($_POST['idBooking'])) {
        $this->verifyCsrfToken();
        $idBooking = $_POST['idBooking'];
        $this->deleteBookingModel->delete($idBooking);
        header("Location: sessionAdminBookingList"); // Redirection si l'utilisateur n'est pas connecté
        exit();
    }
    if (isset($_POST['idBooking'])) {
        $idBooking = $_POST['idBooking'];
        $this->deleteBookingModel->delete($idBooking);
        header("Location: session"); // Redirection si l'utilisateur n'est pas connecté
        exit();
    
    }


    }
}

