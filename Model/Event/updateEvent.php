<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/dbConnect.php';

class UpdateEvent extends Model{

    public function update($updateID, $updateTitle, $updateDate, $updateHour, $updateDescription, $updateAddress, $updateEntrants) {
        
            $statement = $this->_connexion->prepare("
                UPDATE evenement 
                SET Titre = :titleModify, date = :dateModify, Heure = :hourModify, Lieu = :addressModify, Description = :descriptionModify, nb_places = :entrantsModify
                WHERE idEvenement = :idEventModify
            ");

            $statement->execute([
                'titleModify'  => $updateTitle,
					"dateModify" => $updateDate,
					"hourModify" => $updateHour,
					"descriptionModify" => $updateDescription,
					"addressModify" => $updateAddress,
					"entrantsModify" => $updateEntrants,
                    'idEventModify'  => $updateID 
            ]);
    

        
    }
}