<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/dbConnect.php';


class CreateEvent extends Model{
    
    public function create($title, $date, $hour, $description, $address, $entrants) {
    $sql = "
        INSERT INTO evenement (Titre, date, Heure, Lieu, nb_places, Description) 
        VALUES (:titre, :date, :heure, :lieu, :place, :description)
     ";
     $success = $insertStmt = $this->_connexion->prepare($sql);
     $insertStmt->execute([
                'titre' => $title,
                 'date' => $date,
                'heure' => $hour,
                 'lieu' => $address,
                 'place' => $entrants,
                 'description' => $description
    ]);
    return $success;
}
}
