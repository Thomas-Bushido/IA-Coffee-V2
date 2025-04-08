<?php $title = "Evenement"; ?>

<?php ob_start();
 ?>

  <?php 
 
 if (!isset($bookings)) {
    die("Erreur : les données des événements ne sont pas disponibles.");
}
;?>
<div class="container1__homepage">
    <h1 class="mainTitleEvent">Gestion des réservations</h1>
    <?php
    // Vérifiez si $posts contient des données avant d'afficher
    // var_dump($bookings);
    if (!empty($bookings)) {
        foreach ($bookings as $booking) {
    ?>
    
            <div class="card__bookingAdmin">
                <div class="topPartBooking">
                <p class="idCard">Booking N°:<?= nl2br(htmlspecialchars($booking['idBooking'])) ?></p>
                </div>
                <div class="bottomPartBooking">
                    <label for="Event"></label>
                    <h1>Réservation pour l'événement:<?= $titleEvent = htmlspecialchars($booking['idEvent']); ?></h1>
                    
                    <label for="Event">Utilisateur N°: <?= nl2br(htmlspecialchars($booking['idUser'])) ?></label>
                    <label for="Event">Statut de la réservation: <?= nl2br(htmlspecialchars($booking['state'])) ?></label>
                    
                </div>
                
                </div>
            
    <?php
        }
    } else {
        echo "<p>Aucun événement disponible pour le moment.</p>";
    }
    ?>


    <script src="/View/Public/bookingConfirmation.js"></script>
    <?php $content = ob_get_clean(); ?>

</div>
<?php
// Inclure le layout principal
require_once(__DIR__ . '/../Layout/layout.php');
?>