<?php $title = "session admin"; ?>
 <?php ob_start(); 

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 1) {
    header("Location: /Controller/homepage.php");
    exit();
}
?> 

<div class="container1__homepage">
    <h1 class="welcomeTitle">Bienvenue, <?php echo $_SESSION['user']['email']
    ?></h1>
        <button class="buttonSession"><a href="sessionAdminUserList">Gestion des utilisateurs</a></button>
        <button class="buttonSession"><a href="sessionAdminEventList">Gestion des événements</a></button>
        <button class="buttonSession">Gestion des Réservations</button>
        <button class="buttonSession"><a href="Infos">Mes informations</a></button>
        <button class="buttonDeleteAccount" data-id="<?= htmlspecialchars($_SESSION['user']['id']); ?>">Supprimer mon compte</button>
        <form class="deleteAccount" action="../../Controller/userCancellation.php" method="POST">
                            <h1 class="questionBooking">Souhaitez-vous vraiment supprimer votre compte ?</h1>
                            <h2 class="questionBookingTitle"></h2>
                            <div class="answerContainer">
                                <button class="buttonYes" type="submit" name="idUser">Oui</button>
                                <button class="buttonNo">Non</button>
                            </div>

                        </form>
        <form class="deconnection" method="POST" action="logout">
        <button id="buttonDeconnection" type="submit" value="Déconnexion">Me déconnecter</button>
        </form>
    </div>


    <?php $content = ob_get_clean(); ?>
<?php
// Inclure le layout principal
require_once(__DIR__ . '/../../Layout/layout.php');
?>
