<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php');
ob_start();
require_once(__DIR__ . '/../Controller/login.php');
require_once(__DIR__ . '/../Controller/register.php');
require_once(__DIR__ . '/../Controller/user.php');

class AuthController extends Controller{
    private $connection;
    private $inscription;
    private $check;

    public function __construct() {
        // Instancier les classes Connection et Inscription
        $this->connection = new Login();
        $this->inscription = new Register();
        $this->check = new User();
    }

    public function check() {
    
        $checkUsers = $this->check->AllUsers();
        return $checkUsers;
    }

    public function index(){
        // Si la requête est une méthode POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->verifyCsrfToken();
            if (isset($_POST['action'])) {
                if ($_POST['action'] == "register") {
                    $this->connection->index();
                } elseif ($_POST['action'] == "login") {
                    $this->inscription->index();
                } else {
                    die("❌ Action non reconnue.");
                }
            } else {
                die("❌ Aucune action définie.");
            }
        } 
    }
        public function handleRequest() {
            // Charger la liste des utilisateurs
            $checkUsers = $this->check->AllUsers(); // Assure-toi que la méthode AllUsers() est bien définie dans ton modèle User
            
            // Afficher la vue et lui passer les données
            $this->render('Users/auth', ['checkUsers' => $checkUsers]);
        }
    }


// Exécuter le contrôleur si un formulaire est soumis
$auth = new AuthController();
$auth->handleRequest();