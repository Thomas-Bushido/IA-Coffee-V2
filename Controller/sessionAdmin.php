<?php
include_once 'MainController.php';
require_once(__DIR__ . '/../config.php');
ob_start();

class SessionAdmin extends Controller {
  

    public function index() {
        if (isset($_SESSION['user']) && $_SESSION['user']['role']==1) {
   
            require(ROOT . 'View/Users/Admin/sessionAdmin.php');
 }
}
}