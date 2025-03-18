 <?php


require_once(__DIR__ . '/../config.php');
 require_once(__DIR__ . '/GetUserInfos.php'); // Import du contrôleur des réservations

class SessionUserInfos extends Controller {
    public function index() {
//         if (!isset($_SESSION['user'])) {
//             header("Location: /login");
//             exit();
        // }

        $getController = new GetUserInfos();
     $infos = $getController->index(); // Récupération des réservations
     $this->render('Users/Infos', ['infos' => $infos]);
     
    }
 } 



