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

public function getUserById(int $userId): ?array
{
	$sql = "SELECT * FROM utilisateur WHERE idUser = :user_id";
	$statement = $this->_connexion->prepare($sql); // Utiliser prepare() au lieu de query()
	$statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
	$statement->execute();
	
	$user = $statement->fetch(PDO::FETCH_ASSOC);
	
	
		return [
			'Identifier' => $user['idUser'],
			'FirstName' => $user['Nom'],
			'LastName' => $user['Prenom'],
			'MailAddress' => $user['Adresse_mail'],
			'PhoneNumber' => $user['Numero_de_telephone'],
			'Password' => $user['Mot_de_passe'],
			'Role' => $user['idRole'],
		];

}


}