<?php


declare(strict_types=1);


 
require_once __DIR__ . '/../src/dbConnect.php';


class CreateBooking extends Model {



public function create($idEventBooked, $userId) {
       
    try {
        $sql = "
      SELECT reservation.idReservation, utilisateur.idUser, utilisateur.Nom 
				FROM utilisateur 
				INNER JOIN reservation ON utilisateur.idUser = reservation.idUser
				WHERE reservation.idEvenement = :idEvent AND utilisateur.idUser = :idUser
    ";
        $statement = $this->_connexion->prepare($sql);
    
    $statement->execute([
        ':idEvent' => $idEventBooked,
        ':idUser'  => $userId
    
    ]);
    $reservation = $statement->fetch(PDO::FETCH_ASSOC);
	
    if ($reservation) {
        echo "ℹ️ L'utilisateur {$reservation['Nom']} (ID: {$userId}) a déjà réservé l'événement ID: {$idEventBooked}.";
        return $reservation;
    }

    // ✅ Si aucune réservation trouvée, insérer une nouvelle réservation
    $insertStmt = $this->_connexion->prepare("
        INSERT INTO reservation (idUser, idEvenement, Statut) 
        VALUES (:idUser, :idEvent, 'confirmée')
    ");
    $insertStmt->execute([
        ':idUser'  => $userId,
        ':idEvent' => $idEventBooked
    ]);

    echo "✅ Réservation enregistrée pour l'utilisateur ID: $userId à l'événement ID: $idEventBooked.";

    return [
        'idUser'        => $userId,
        'idEvenement'   => $idEventBooked,
        'idReservation' => $this->_connexion->lastInsertId()
    ];
    
} catch (PDOException $e) {
    echo "❌ Erreur lors de la réservation : " . $e->getMessage();
}


}

}