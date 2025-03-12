<?php



declare(strict_types=1);

require_once __DIR__ . '/../src/dbConnect.php';

class GetEvent extends Model{

public function get()
{
   $sql = "SELECT * FROM evenement";
   $statement = $this ->_connexion->query($sql);
   $events = [];
   while (($row = $statement->fetch(PDO::FETCH_ASSOC))) {
		$event = [
			'idEvent' => $row['idEvenement'], // Ajout de l'identifiant
		'entrants' => $row['nb_places'],
        'Title' => $row['Titre'],
        'Date' => $row['date'],
        'Heure' => $row['Heure'],
		'Lieu' => $row['Lieu'],
		'Description' => $row['Description'], // Ajout de la description

		];

		$events[] = $event;
	}
	// print_r($post['Date']);
	return $events;
}

}