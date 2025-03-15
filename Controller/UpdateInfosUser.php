<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php'); 
ob_start();


class UpdateInfosUser extends Controller {
   
      private $updateUserModel;
      private $currentPassModel;
      public function __construct() {
          // Charger les modèles nécessaires
          $this->loadModel("UpdateUser");
          $this->updateUserModel = $this->model;

          $this->loadModel("GetUser");
          $this->currentPassModel = $this->model;
      }

      

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Vérifier si l'utilisateur est connecté
            if (!isset($_SESSION['user']['id'])) {
                echo "Accès interdit.";
                exit;
            }

            $userId = $_SESSION['user']['id'];

            // Sécuriser les entrées
            $firstname = htmlspecialchars($_POST['Prenom']);
            $lastname = htmlspecialchars($_POST['Nom']);
            $email = $_POST['email'];
            $phone = htmlspecialchars($_POST['telephone']);
            $mdp = $_POST['pass2'];
            if (empty($mdp)) {
                // Récupérer l'ancien mot de passe si aucun nouveau n'est fourni
                $user = $this->currentPassModel->getUserById($userId);
                $mdp = $user['Mot_de_passe'] ?? null;
            }
            $this->updateUserModel->updateUser($userId, $firstname, $lastname, $email, $phone, $mdp);
        
            header("Location: Infos"); // Redirection après mise à jour
            
    }
    }
}


// Vérifier si l'utilisateur est bien connecté
if (!isset($_SESSION['user']['id'])) {
    echo "Accès interdit.";
    exit;
}