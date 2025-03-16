<?php


require_once(__DIR__ . '/../config.php');
require_once(__DIR__ . '/AdminGetUserList.php'); // Import du contrôleur des réservations

class sessionAdminUserlist extends Controller {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }

        $getUserlist = new AdminGetUserList();
        $users = $getUserlist->getUserList(); // Récupération des réservations

        $role = $_SESSION['user']['role'];

        if ($role == 1) {
            $this->render('Users/Admin/userList', ['users' => $users]);
        } 
    }
}