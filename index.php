<?php
// On génère une constante qui contiendra le chemin vers index.php
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/'); // Si tu as un sous-répertoire, ajuste ce chemin en conséquence.

require_once(ROOT.'Model/src/dbConnect.php');
require_once(ROOT.'Controller/MainController.php');

// Vérifier si 'p' existe dans l'URL
if (isset($_GET['p']) && !empty($_GET['p'])) {
    $params = explode('/', $_GET['p']);

    if($params[0] != "") {
        $controller = ucfirst($params[0]);
        $action = isset($params[1]) ? $params[1] : "index";  // Définir 'index' comme action par défaut

        // Vérifier si le fichier du contrôleur existe
        $controllerFile = ROOT . 'Controller/' . $controller . '.php';
        if (file_exists($controllerFile)) {
            require_once($controllerFile);

            $controllerInstance = new $controller();

            if (method_exists($controllerInstance, $action)) {
                $controllerInstance->$action();
            } else {
                http_response_code(404);
                echo "La méthode '$action' n'existe pas dans le contrôleur '$controller'.";
            }
        } else {
            http_response_code(404);
            echo "Le contrôleur '$controller' n'existe pas.";
        }
    } else {
        echo "❌ Paramètre 'p' manquant ou vide.";
    }
} else {
    header('location:homepage');
}
?>
