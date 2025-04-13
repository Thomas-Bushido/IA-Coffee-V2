<?php
include_once 'MainController.php';
class Register extends Controller {
    private $inscriptionModel;

    public function __construct() {
        // Charger le modèle des utilisateurs
        $this->loadModel("CreateUser");
        $this->inscriptionModel = $this->model;
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->verifyCsrfToken();
            // Récupération des données et validation
            if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['pass1'], $_POST['pass2'])) {
                $lastname = trim($_POST['nom']);
                $firstname = trim($_POST['prenom']);
                $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
                $phone = $_POST['telephone'];
                $pass1 = $_POST['pass1'];
                $pass2 = $_POST['pass2'];

                // Validation de l'email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    die("❌ Email invalide.");
                }

                // Vérification que les mots de passe correspondent
                if ($pass1 !== $pass2) {
                    die("❌ Les mots de passe ne correspondent pas.");
                }

                // Inscription
                $success = $this->inscriptionModel->inscription($firstname, $lastname, $email, $phone, $pass1);

                if (!empty($success)) {
                    // Initialiser la session utilisateur
                    $_SESSION['user'] = [
                        'id' => $success['id'],
                        'role' => $success['role'],
                        'email' => $success['email'],
                    ];

                    // Rediriger après l'inscription
                    header("Location: session"); // Ou une page dédiée à l'utilisateur
                    exit();
                } else {
                    die("❌ Une erreur est survenue lors de l'inscription.");
                }
            } else {
                die("❌ Des champs manquent.");
            }
        }
    }
}
