<?php



declare(strict_types=1);


require_once __DIR__ . '/../src/dbConnect.php';


class GetUser extends Model{

public function get()
{
	$sql = "SELECT * FROM utilisateur";
	$statement = $this ->_connexion->query($sql);
	
	$users = [];
	while (($row = $statement->fetch(PDO::FETCH_ASSOC))){
		$user = [
			'Identifier' => $row['idUser'],
			'FirstName' => $row['Nom'],
			'LastName' => $row['Prenom'],
			'MailAddress' => $row['Adresse_mail'],
			'PhoneNumber' => $row['Numero_de_telephone'],
			'Password' => $row['Mot_de_passe'],
			'Role' => $row['idRole'],
		];
		$users[] = $user;
	}
	// print_r($users);
	return $users;

}

public function getUserById(int $userId)
{
  
        $sql = "SELECT * FROM utilisateur WHERE idUser = :user_id";
		$statement = $this ->_connexion->prepare($sql);
        $statement->execute(['user_id' => $userId]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user; // Retourne null si aucun utilisateur n'est trouvé
  
}


}