<?php



declare(strict_types=1);

require_once __DIR__ . '/../src/dbConnect.php';

class ReadBooking extends Model{

public function read($userId)
{
    $sql = 'SELECT * FROM reservation 
    INNER JOIN evenement 
    ON reservation.idEvenement = evenement.idEvenement
    WHERE reservation.idUser = :user_id';
    
    $stmt = $this ->_connexion->prepare($sql);
$stmt->execute(['user_id' => $userId]);

    $bookings = [];
    while (($row = $stmt->fetch(PDO::FETCH_ASSOC))) {
        $booking = [
            'idBooking' => $row['idReservation'],
            'Title' => $row['Titre'],
            'id' => $row['idUser'],
            'Date' => $row['date'],
            'Heure' => $row['Heure'],
            'Lieu' => $row['Lieu'],
            'Description' => $row['Description'],
        ];
        $bookings[] = $booking;
    }
    // print_r($bookings);
    return $bookings;
}

}