<?php


declare(strict_types=1);


 
require_once __DIR__ . '/../src/dbConnect.php';


class GetBooking extends Model {

public function get() {
       
    
        $sql = "SELECT * FROM reservation";
        $statement = $this->_connexion->query($sql);
        $bookings = [];
        while (($row = $statement->fetch(PDO::FETCH_ASSOC))) {
             $booking = [
                 'idEvent' => $row['idEvenement'], // Ajout de l'identifiant
             'idBooking' => $row['idReservation'],
             'state' => $row['Statut'],
             'idUser' => $row['idUser'],
             ];
     
             $bookings[] = $booking;
         }
        
         return $bookings;
}

}