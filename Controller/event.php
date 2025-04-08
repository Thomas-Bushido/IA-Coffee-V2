<?php
include_once 'MainController.php';

class Event extends Controller {
    private $eventModel;
    private $bookingModel;


    public function __construct() {
        // Charger le modèle des événements
        $this->loadModel("GetEvent");
        $this->eventModel = $this->model;

        $this->loadModel("getBooking");
        $this->bookingModel = $this->model;
    }
    public function index() {
        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            header("Location: /authController");
            exit();
        }
    
        // Récupérer les événements
        $events = $this->eventModel->get(); 
    
        // Récupérer toutes les réservations
        $bookings = $this->bookingModel->get(); 
        
        // Filtrer uniquement les réservations de l'utilisateur
        $userBookings = [];
        foreach($bookings as $booking) {
            if($booking['idUser'] === $_SESSION['user']['id']) {
                $userBookings[] = $booking;
              
            }
        }
    
        // Envoyer les événements et les réservations à la vue
        $this->render('Events/event', [
            'events' => $events,
            'bookings' => $userBookings
        ]);
    }
}




