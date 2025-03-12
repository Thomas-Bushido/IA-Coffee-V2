<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php'); 
ob_start();


class Infos extends Controller {
      private $getUserModel;

      public function __construct() {
        // Charger le modèle des événements
        $this->loadModel("GetUser");
        $this->loadModel("UpdateUser");
        $this->getUserModel = $this->model;
    }

    public function index() {
        // Récupérer les infos de l'utilisateur
            $user = $this->infoUser(); 
            $this->render('Users/Infos', ['user' => $user]);
 }


    public function infoUser() {
        if (isset($_SESSION['user']['id'])) {
            $userId = $_SESSION['user']['id'];
            return $this->getUserModel->getUserById($userId);
        }
        return [];
    }

    public function updateUser(){

    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //   Vérification des champs avant utilisation
                $userId = $_SESSION['user']['id'];
                $firstname = $_POST['Prenom'];
                $lastname = $_POST['Nom'];
                $email = $_POST['email'];
                $phone = $_POST['telephone'];
        
                $pass1 = $_POST['pass1'];
                $pass2 = $_POST['pass2'];
                
                // Vérifier si un mot de passe a été fourni et qu'il correspond
                if (!empty($pass1) && !empty($pass2) && $pass1 === $pass2) {
                    $password = $pass1; // Nouveau mot de passe confirmé
                } else {
                    $password = $_POST['Mot_de_passe']; // Utiliser l'ancien mot de passe
                }
        
                if ($firstname && $lastname && $email && $phone && $password) {
                  
                 return $this->getUserModel->updateUser($userId, $firstname, $lastname, $email, $phone, $password);
                    

                    exit();
                } else {
                    echo "❌ Erreur : Tous les champs sont requis.";
                }
            }
        }// Mise à jour de l'utilisateur si la requête est en POST
    }



// Vérifier si l'utilisateur est bien connecté
if (!isset($_SESSION['user']['id'])) {
    echo "Accès interdit.";
    exit;
}






// // Fonction pour mettre à jour l'utilisateur
// function updateUser() {
//     if ($_SERVER["REQUEST_METHOD"] === "POST") {
//         // Vérification des champs avant utilisation
//         $userId = $_SESSION['user']['id'];
//         $firstname = $_POST['Prenom'];
//         $lastname = $_POST['Nom'];
//         $email = $_POST['email'];
//         $phone = $_POST['telephone'];

//         $pass1 = $_POST['pass1'];
//         $pass2 = $_POST['pass2'];
        
//         // Vérifier si un mot de passe a été fourni et qu'il correspond
//         if (!empty($pass1) && !empty($pass2) && $pass1 === $pass2) {
//             $password = $pass1; // Nouveau mot de passe confirmé
//         } else {
//             $password = $_POST['Mot_de_passe']; // Utiliser l'ancien mot de passe
//         }

//         if ($firstname && $lastname && $email && $phone && $password) {
//             $update = new Update();
//             $update->updateUser($userId, $firstname, $lastname, $email, $phone, $password);
            
//             // Redirection après mise à jour réussie
//             header("Location: /Controller/sessionInfos.php");
//             exit();
//         } else {
//             echo "❌ Erreur : Tous les champs sont requis.";
//         }
//     }
// }// Mise à jour de l'utilisateur si la requête est en POST
// updateUser();