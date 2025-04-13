<?php
include_once 'MainController.php';

class AdminCreateBookingList extends Controller {
    private $createBookingModel;

    public function __construct() {
        $this->loadModel('createBooking');
        $this->createBookingModel = $this->model;
    }

    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: /login.php"); // Rediriger vers la page de login
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $this->verifyCsrfToken();
            if (isset($_POST['idEvent'])) {
                $idEventBooked = htmlspecialchars($_POST['idEvent']);
                $userId = htmlspecialchars($_POST['idUser']) ?? null;

                if($userId && $_SESSION['user']['role'] === 1){
                    $this->createBookingModel->create($idEventBooked, $userId);
                    header("Location: sessionAdminBookingList");
                    exit();

                } else {
                    echo "❌ Erreur : utilisateur non authentifié.";
                    exit();
                }
            } else {
                echo "❌ Erreur : Aucune action valide reçue.";
                exit();
            }
        }
    }
}