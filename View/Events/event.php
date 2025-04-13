<?php  require_once(__DIR__ . '/../../config.php');?>
<?php $title = "Evenement"; ?>

<?php ob_start();
?>

<?php

if (!isset($events)) {
    die("Erreur : les données des événements ne sont pas disponibles.");
}; ?>
<div class="container1__homepage">
    <h1 class="mainTitleEvent">Evenements</h1>
    <?php
    // Vérifiez si $posts contient des données avant d'afficher
    if (!empty($events)) {
        foreach ($events as $event) {

    ?>

            <div class="card__event">
                <div class="topPart">
                    <?php


                    ?>


                </div>
                <div class="bottomPart">
                    <h1><?= $titleEvent = htmlspecialchars($event['Title']); ?></h1>
                    <!-- <p class="descriptionEvent"><?= nl2br(htmlspecialchars($event['Description'])) ?></p> -->
                    <p class="infosEvent">
                        le <?= htmlspecialchars($event['Date']) ?><br> à <?= htmlspecialchars($event['Heure']) ?>
                    </p>
                    <?php
$alreadyBooked = false;
foreach ($bookings as $booking) {
    if ($booking['idEvent'] === $event['idEvent'] && $booking['state'] === 'confirmée') {
        $alreadyBooked = true;
        break;
    }
}

if ($alreadyBooked) {
?>
    <div class="eventState">Réservé</div>

<?php
} elseif ($event['entrants'] <= $event['BookingNumber']) {
?>
    <div style="background-color: white; color: red; font-size:20px; font-weight:bolder; border: none; cursor: not-allowed;" class="eventState">Complet</div>
<?php
} elseif ($_SESSION['user']['role'] !== 1) {
    // Seuls les utilisateurs normaux (non-admins) peuvent réserver
?>
    <form class="formDetails" method="POST" action="EventDetail">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
        <input type="hidden" name="idEvent" value="<?= htmlspecialchars($event['idEvent']); ?>">
        <button class="buttonBooking2" type="submit" data-title="<?= htmlspecialchars($event['Title']); ?>">
            Réserver une place
        </button>
    </form>
<?php
} else {
    // Utilisateur admin : pas de bouton
?>
    <div class="eventState" style="background-color: white; cursor: not-allowed;">
        
    </div>
<?php
}
?>

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