<?php
require_once __DIR__ . '/../index.php';
abstract class Controller {
    protected $model;

    public function loadModel(string $model) {
        // Définir une liste des répertoires possibles pour les modèles
        $directories = [
            ROOT .'Model/Event/',
            ROOT .'Model/Booking/',
            ROOT .'Model/User/',
            ROOT .'Model/src/',
            
        ];

        // Parcourir les répertoires pour trouver le fichier du modèle
        foreach ($directories as $directory) {
            $modelPath = $directory . $model . '.php';

            if (file_exists($modelPath)) {
                require_once($modelPath);
                $this->model = new $model();
                return;
            }
        }

       
        die("❌ Erreur : Le modèle '$model' est introuvable !");
    }

    public function render(string $fichier, array $data = []) {
       
        extract($data);

        require_once(ROOT . 'View/' . '/' . $fichier . '.php');

    }

    // ✅ Méthode CSRF
    public function verifyCsrfToken(): void {
        if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token'])) {
            die("❌ Erreur : Token CSRF manquant.");
        }

        if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("❌ Erreur : Token CSRF invalide.");
        }
    }

}





// class TestController extends Controller {
//     public function testLoadModel() {
//         // Essayer de charger un modèle existant
//         $this->loadModel('Connect');
//         if ($this->model instanceof Connect) {
//             echo "✅ Le modèle 'Connect' a été chargé avec succès !<br>";
//         } else {
//             echo "❌ Le modèle 'Connect' n'a pas pu être chargé.<br>";
//         }
//     }
// }

// // Créer une instance de TestController et exécuter le test
// $testController = new TestController();

// $testController->testLoadModel();

