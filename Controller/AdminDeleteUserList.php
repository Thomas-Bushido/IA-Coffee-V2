<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php');

class AdminDeleteUserList extends Controller{
    private $deleteUser;
  
    public function __construct() {
        $this->loadModel("deleteUser");
        $this->deleteUser = $this->model;
    }


 
public function index (){
       if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if(isset($_POST['idUser'])) {
            $userId = $_POST['idUser'];
         
 $this->deleteUser->delete($userId);
 header('Location: sessionAdminUserlist'); // Redirection après mise à jour
}
    }


}
}
