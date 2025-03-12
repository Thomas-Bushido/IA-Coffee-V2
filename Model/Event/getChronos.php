<?php



declare(strict_types=1);

require_once __DIR__ . '/../src/dbConnect.php';

class GetChronos extends Model{
    
    public function getChronos() {
    $sql = "SELECT * FROM evenement";
    $query = $this ->_connexion->prepare($sql);
    $query->execute();
    $setChronos = [];
    while (($row = $query->fetch(PDO::FETCH_ASSOC))) {
                     $setChronos[] = [
                       'Date' => $row['date'],
                        'Heure' => $row['Heure'],
                    ];
                 }
   
    return $setChronos;
}
}

