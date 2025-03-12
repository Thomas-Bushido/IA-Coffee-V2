<?php


declare(strict_types=1);

require_once __DIR__ . '/../src/dbConnect.php';


class Connect extends Model{


public function postConnection($email2, $mdp) {
       
      // Insérer l'utilisateur s'il n'existe pas encore
      $sql = "SELECT * FROM utilisateur WHERE Adresse_mail = :email2";
      $statement = $this ->_connexion->prepare($sql);
      $statement->execute(['email2' => $email2]);
      $user = $statement->fetch(PDO::FETCH_ASSOC);
      // var_dump($user['Mot_de_passe'], $mdp);
      // Vérifier si l'utilisateur existe et si le mot de passe est correct
      if ($user && $user['Mot_de_passe'] === $mdp){
          $_SESSION['user'] = [
             'id' => $user['idUser'],
             'email' => $user['Adresse_mail'], 
              'role' => $user['idRole'] // Stocke le rôle de l'utilisateur
         
          ];
          return $user['idRole'];
      } else {
  
          return 'Errur de connection'; // Échec de connexion
      }
}

}