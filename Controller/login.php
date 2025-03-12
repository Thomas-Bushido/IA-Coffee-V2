<?php
include_once 'MainController.php';
class Login extends Controller {
    private $connectionModel;

    public function __construct() {
        // Charger le modèle des événements
        $this->loadModel("Connect");
        $this->connectionModel = $this->model;
    }

       public function index() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['email2'], $_POST['pass3'])) {
           $email2 = $_POST['email2'];
           $mdp = $_POST['pass3'];
           $role = $this->connectionModel->postConnection($email2, $mdp);
                if ($role === 1){
                     header("Location: sessionAdmin"); 
                   
               } else {
                header("Location: session");
                   }
                   exit();
              } else {
                  die("Email ou mot de passe incorrect.");
              }
          }
        }

 
       
 
    
 
}
