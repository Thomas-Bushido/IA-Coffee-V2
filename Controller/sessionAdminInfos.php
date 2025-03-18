<?php


require_once(__DIR__ . '/../config.php');
require_once(__DIR__ . '/GetUserInfos.php'); // Import du contrôleur des réservations

class sessionAdminInfos extends Controller {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }

        $getInfos = new GetUserInfos();
        $infos = $getInfos->index(); // Récupération des réservations

        $role = $_SESSION['user']['role'];

        if ($role == 1) {
            $this->render('Users/Admin/sessionAdminInfos', ['infos' => $infos]);
        } 
    }
}