<?php
include_once 'MainController.php';
class Homepage extends Controller {
    private $chronosModel;

    public function index() {
        // Charger le modèle
        $this->loadModel("GetChronos"); 
        $this->chronosModel = $this->model; 

        // Récupérer les événements
        $setChronos = $this->chronosModel->getChronos(); 

        // Définition du titre
        $title = "Page d'accueil";

        // Inclusion de la vue (en s'assurant que ROOT est bien défini dans index.php)
        require(ROOT . 'View/homepage.php');
    }
}



	
// if($controller === 'sessionAdmin'){
//     $controllerFile = ROOT . 'Controller/' . 'Admin' . $controller . '.php';
// }

// if($controller === 'Admin'){
//     $folder = 'Admin';
//     $controller = ucfirst($params[1]);
//     $action = isset($params[2]) ? $params[2] : "index"; 
// $controllerFile = ROOT . 'Controller/' . $folder . $controller . '.php';
// } else {
// $controllerFile = ROOT . 'Controller/' . $controller . '.php';
// }