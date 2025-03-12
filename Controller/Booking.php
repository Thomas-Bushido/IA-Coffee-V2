<?php
include_once 'MainController.php';

class Booking extends Controller {
    private $createModel;
    
    public function __construct() {
        $this->loadModel('createBooking');
        $this->createModel = $this->model;
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

                if ($userId) {
                    $this->createModel->create($idEventBooked, $userId);
                    header("Location: session");
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
