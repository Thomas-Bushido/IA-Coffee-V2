<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/dbConnect.php';


class DeleteUser extends Model {

    public function delete($userId) {
        if (!is_numeric($userId)) {
            throw new InvalidArgumentException("L'ID de l'utilisateur doit être un nombre.");
        }

        // Supprimer d'abord les réservations liées à l'utilisateur
        $this->deleteData($userId);

        // Ensuite, supprimer l'utilisateur
        $sql = "
            DELETE
            FROM utilisateur 
            WHERE utilisateur.idUser = :idUser
        ";

        try {
            $statement = $this->_connexion->prepare($sql);
            $statement->execute([':idUser' => $userId]);
            return true;  // Retourner true pour indiquer la réussite
        } catch (PDOException $e) {
            echo "❌ Erreur lors de la suppression de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

    // Méthode pour supprimer les réservations de l'utilisateur
    private function deleteData($userId) {
        $sql = "
            DELETE
            FROM reservation
            WHERE reservation.idUser = :idUser
        ";

        try {
            $statement = $this->_connexion->prepare($sql);
            $statement->execute([':idUser' => $userId]);
        } catch (PDOException $e) {
            echo "❌ Erreur lors de la suppression des réservations : " . $e->getMessage();
        }
    }
}