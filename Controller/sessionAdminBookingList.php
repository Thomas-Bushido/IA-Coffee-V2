<?php


require_once(__DIR__ . '/../config.php');
require_once(__DIR__ . '/AdminGetBookingList.php'); // Import du contrôleur des réservations

class sessionAdminBookingList extends Controller {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }

        $getBookinglist = new AdminGetBookingList();
        $bookings = $getBookinglist->getBookingList(); // Récupération des réservations
        $events = $getBookinglist->getEventList(); // Récupération des réservations

        $role = $_SESSION['user']['role'];

        if ($role == 1) {
            $this->render('Booking/Booking', [ 'events' => $events,
            'bookings' => $bookings,]);
        } 
    }
}