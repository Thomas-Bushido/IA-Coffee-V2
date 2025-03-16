<?php


require_once(__DIR__ . '/../config.php');
require_once(__DIR__ . '/AdminGetEventList.php'); // Import du contrôleur des réservations

class sessionAdminEventList extends Controller {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }

        $getEventlist = new AdminGetEventList();
        $events = $getEventlist->getEventList(); // Récupération des réservations

        $role = $_SESSION['user']['role'];

        if ($role == 1) {
            $this->render('Users/Admin/eventList', ['events' => $events]);
        } 
    }
}