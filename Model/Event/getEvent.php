<?php



declare(strict_types=1);

require_once __DIR__ . '/../src/dbConnect.php';

class GetEvent extends Model{

	public function get()
	{
	   $sql = "SELECT 
				  evenement.idEvenement, 
				  evenement.Titre, 
				  evenement.date, 
				  evenement.Heure, 
				  evenement.Lieu, 
				  evenement.Description, 
				  evenement.nb_places AS entrants,
				  COUNT(reservation.idReservation) AS BookingNumber 
			   FROM evenement 
			   LEFT JOIN reservation ON evenement.idEvenement = reservation.idEvenement 
			   GROUP BY evenement.idEvenement";
	
	   $statement = $this->_connexion->query($sql);
	   $events = [];
	   while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		   $event = [
			   'idEvent' => $row['idEvenement'],
			   'entrants' => $row['entrants'],
			   'Title' => $row['Titre'],
			   'Date' => $row['date'],
			   'Heure' => $row['Heure'],
			   'Lieu' => $row['Lieu'],
			   'Description' => $row['Description'],
			   'BookingNumber' => $row['BookingNumber'], // Nombre total de réservations
		   ];
		   $events[] = $event;
	   }
	   return $events;
	}

}