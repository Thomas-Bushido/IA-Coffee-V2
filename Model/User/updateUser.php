<?php

declare(strict_types=1);


require_once __DIR__ . '/../src/dbConnect.php';


class UpdateUser extends Model{


    public function updateUser($userId, $firstname, $lastname, $email, $phone, $mdp) {
        
            $statement = $this->_connexion->prepare(
       	"UPDATE utilisateur 
					 SET Nom = :Nom, Prenom = :Prenom, Adresse_mail = :Adresse_mail, Numero_de_telephone = :Numero_de_telephone, Mot_de_passe = :Mot_de_passe
					 WHERE idUser = :idUser"
				);
		
				$statement->execute([
					'idUser'  => $userId,
					"Nom" => $lastname,
					"Prenom" => $firstname,
					"Adresse_mail" => $email,
					"Numero_de_telephone" => $phone,
					"Mot_de_passe" => $mdp
				]);
        
    }

	public function updateUserByAdmin($userId, $firstname, $lastname, $email, $phone, $role) {
	
		
			try {
				// 🔍 Vérifier si l'utilisateur a déjà réservé cet événement
				$statement = $this->_connexion->prepare('
					UPDATE utilisateur
					SET Nom = :Nom, Prenom = :Prenom, Adresse_mail = :Email, Numero_de_telephone = :Telephone, idRole = :idRole
					WHERE utilisateur.idUser = :idUser 
				');
				$statement->execute([
					':idUser' => $userId,
					':Nom' => $firstname,
					':Prenom' => $lastname,
					':Email' => $email,
					':Telephone' => $phone,
					':idRole' => $role,
				]);
			} catch (PDOException $e) {
				echo "❌ Erreur lors de l'annulation' : " . $e->getMessage();
			}
		}
}