<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php');

class AdminUpdateUserList extends Controller{
    private $updateUser;
  
    public function __construct() {
        $this->loadModel("UpdateUser");
        $this->updateUser = $this->model;
    }


 
public function index (){
       if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $this->verifyCsrfToken();
        if(isset($_POST['idRole']) && isset($_POST['idUser'])) {
            $userId = $_POST['idUser'];
            $firstname = $_POST['Nom'];
            $lastname = $_POST['Prenom'];
            $email = $_POST['Email'];
            $phone = $_POST['Telephone'];
            $role = $_POST['idRole'];
            $this->updateUser->updateUserByAdmin($userId, $firstname, $lastname, $email, $phone, $role);
            header('Location: sessionAdminUserlist');

}
    }


}
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



 