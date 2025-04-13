<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php');
var_dump($_POST['idEventModify']);
class AdminUpdateEventList extends Controller{
    private $updateEventModel;
   
    public function __construct() {
        $this->loadModel("UpdateEvent");
        $this->updateEventModel = $this->model;
    }

    public function index() {
// 🔹 Mise à jour d'un événement
    if (isset($_POST['idEventModify'], $_POST['titleModify'], $_POST['dateModify'], $_POST['hourModify'], $_POST['addressModify'], $_POST['descriptionModify'], $_POST['entrantsModify'])) {
        $this->verifyCsrfToken();
        
        $updateID = $_POST['idEventModify'];
        $updateTitle = $_POST['titleModify'];
        $updateDate = $_POST['dateModify'];
        $updateHour = $_POST['hourModify'];
        $updateDescription = $_POST['descriptionModify'];
        $updateAddress = $_POST['addressModify'];
        $updateEntrants = $_POST['entrantsModify'];
      
        $this->updateEventModel->update($updateID, $updateTitle, $updateDate, $updateHour, $updateDescription, $updateAddress, $updateEntrants);

        header("Location: AdminGetEventList");
        exit();
    }
}


}


