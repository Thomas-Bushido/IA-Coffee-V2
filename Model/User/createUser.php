<?php


declare(strict_types=1);

require_once __DIR__ . '/../src/dbConnect.php';

class CreateUser extends Model{

public function inscription($firstname, $lastname, $email, $phone, $pass1) {
    $role=0;
    $sql= "INSERT INTO utilisateur (Nom, Prenom, Adresse_mail, Numero_de_telephone, Mot_de_passe, idRole) 
    VALUES (:Nom, :Prenom, :Adresse_mail, :Numero_de_telephone, :Mot_de_passe, :idRole)";

      // Insérer l'utilisateur s'il n'existe pas encore
      $insertStmt = $this->_connexion->prepare($sql);

      $insertStmt->execute([
        "Nom" => $lastname,
        "Prenom" => $firstname,
        "Adresse_mail" => $email,
        "Numero_de_telephone" => $phone,
        "Mot_de_passe" => $pass1,
        "idRole" => $role,
    ]);
    
    return ['id' => $this->getLastInsertId(), "role" => $role, 'email'=> $email];
}

public function getLastInsertId(): int {
    return (int) $this->_connexion->lastInsertId();
}
}