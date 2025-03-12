<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/dbConnect.php';


class DeleteEvent extends Model{

    public function delete($EventId) {
        if (!is_numeric($EventId)) {
            throw new InvalidArgumentException("L'ID de l'événement doit être un nombre.");
        }
            $sql = "
                DELETE FROM evenement 
                WHERE idEvenement = :idEvent
            " ;
        try {
            $statement = $this->_connexion->prepare($sql);

            $statement->execute([
                ':idEvent' => $EventId,
            ]);
        
        } catch (PDOException $e) {
            echo "❌ Erreur lors de la suppression : " . $e->getMessage();
            return false;
        }
    }
}