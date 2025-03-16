<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php');


class AdminGetUserList extends Controller{
    private $getUserModel;

    public function __construct() {
        $this->loadModel("GetUser");
        $this->getUserModel = $this->model;
    }

    public function getUserList() {
        if (!isset($_SESSION['user'])) {
            header("Location: /login"); // Redirection si l'utilisateur n'est pas connecté
            exit();
        }
        return $this->getUserModel->get();
         
        // require(ROOT . 'View/Users/Admin/userList.php');
}

 
// public function updateByAdmin (){

//     if ($_SERVER["REQUEST_METHOD"] === "POST") {
//         if(isset($_POST['idRole']) && isset($_POST['idUser'])) {
//             $userId = $_POST['idUser'];
//             $firstname = $_POST['Nom'];
//             $lastname = $_POST['Prenom'];
//             $email = $_POST['Adresse_mail'];
//             $phone = $_POST['Numero_de_telephone'];
//             $role = $_POST['idRole'];
// return $this->updateUser->updateByAdmin($userId, $firstname, $lastname, $email, $phone, $role);

// }
//     }


// }
}

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     if(isset($_POST['idRole']) && isset($_POST['idUser'])) {
//         $userId = $_POST['idUser'];
//         $role = $_POST['idRole'];
//         $updateRole = new Update;
//         $updateRole->updateRole($userId, $role);
       
      
//     } 
    
//     if(isset($_POST['deleteUser']) && isset($_POST['idUser'])) {
//         $userId = $_POST['idUser'];
    
//      $deleteUser = new Delete();
//      $deleteUser->deleteUser($userId);

//      if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 1) {
//         header("Location: /Controller/homepage.php");
//         exit();
//     } else {
//           header("Location: /Controller/Admin/userList.php");
//         exit();
//     }
//     }
// }


// require('../../View/Users/Admin/userList.php');



 

