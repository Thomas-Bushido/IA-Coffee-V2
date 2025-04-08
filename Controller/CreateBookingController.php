<?php
include_once 'MainController.php';

class CreateBookingController extends Controller {
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
            if (isset($_POST['idEvent'])) {
                $idEventBooked = htmlspecialchars($_POST['idEvent']);
                $userId = $_SESSION['user']['id'] ?? null;

                if ($userId && $_SESSION['user']['role'] === 0) {
                    $this->createBookingModel->create($idEventBooked, $userId);
                    header("Location: session");
                    exit();
                } elseif($userId && $_SESSION['user']['role'] === 1){
                    $this->createBookingModel->create($idEventBooked, $userId);
                    header("Location: sessionAdmin");
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
