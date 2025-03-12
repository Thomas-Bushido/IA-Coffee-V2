<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/dbConnect.php';


class DeleteBooking extends Model {

    public function delete($idBooking) {
		   $sql= '
				DELETE
				FROM reservation 
				WHERE reservation.idReservation = :idBooking
			';
        try {

			// 🔍 Vérifier si l'utilisateur a déjà réservé cet événement
			$statement = $this->_connexion->prepare($sql);
			$statement->execute([
				':idBooking' => $idBooking
			]);
	
			// header("Location: /Controller/session.php");
			// exit();
			
		} catch (PDOException $e) {
			echo "❌ Erreur lors de l'annulation' : " . $e->getMessage();
		}
}
}