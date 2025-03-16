<?php


require_once(__DIR__ . '/../config.php');
require_once(__DIR__ . '/../Controller/ReadBookingController.php'); // Import du contrôleur des réservations

class Session extends Controller {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        }

        $readBookingController = new ReadBookingController();
        $bookings = $readBookingController->getUserBookings(); // Récupération des réservations

        $role = $_SESSION['user']['role'];

        if ($role == 1) {
            $this->render('Booking/booking', ['bookings' => $bookings]);
        } else { // role == 0
            $this->render('Users/session', ['bookings' => $bookings]);
        }
    }
}



//     private $deleteAccount;
//     // private $readBookings;
//     private $deleteBookings;
//     public function __construct() {
//         $this->deleteAccount = new DeleteUser();
//         // $this->readBookings = new ReadBooking();
//         $this->deleteBookings = new DeleteBooking();
//     }

//     // La méthode index, qui va afficher la vue
//     public function index() {
//         if (!isset($_SESSION['user'])) {
//             header("Location: /login.php"); // Rediriger vers la page de login
//             exit();
//         }
//         // Gérer la suppression de compte ici
//         if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['idUser'])) {
//             $this->deleteAccount();
//         }
//         // Gérer la suppression de réservation ici
//         if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['idBooking'])) {
//             $this->deleteBooking();
//         }

//         // // Charger les réservations de l'utilisateur
//         // $bookings = $this->readBooking();  

//         // // Passer les données à la vue
//         // $this->render('Users/session', ['bookings' => $bookings]);
//     }

//     // Supprime le compte
//     public function deleteAccount() {
//         $userId = htmlspecialchars($_POST['idUser']);

//         // Appel à la méthode delete du modèle pour supprimer l'utilisateur
//         // Assurez-vous que votre modèle utilise des requêtes préparées pour éviter SQL Injection
//         $isDeleted = $this->deleteAccount->delete($userId);  // La méthode `delete` doit retourner true/false selon si la suppression a fonctionné
       
//         // Si l'utilisateur a bien été supprimé, on détruit la session
//         if ($isDeleted) {
//             session_unset(); 
//             session_destroy();
//             session_write_close();
//             // Optionnel: Ajouter un message de confirmation
//             $_SESSION['message'] = "Votre compte a bien été supprimé."; 

//             // Rediriger après la suppression du compte
//             header("Location: homepage");
//             exit();
//         }
//         else {
//             echo "erreur";        }
//     }

//     // // Récupère les réservations de l'utilisateur connecté
//     // public function readBooking() {
//     //     if (isset($_SESSION['user']['id'])) {
//     //         $userId = $_SESSION['user']['id'];
//     //         return $this->readBookings->read($userId);
//     //     }
//     //     return [];
//     // }

//     // Supprime une réservation
//     public function deleteBooking() {
//         if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['idBooking'])) {
//             $idBooking = htmlspecialchars($_POST['idBooking']); // Sécurisation de l'entrée
//             $this->deleteBookings->delete($idBooking);

//             // Rediriger après suppression pour éviter un re-submit du formulaire
//             header("Location: session");
//             exit();
//         }
//     }
// }
