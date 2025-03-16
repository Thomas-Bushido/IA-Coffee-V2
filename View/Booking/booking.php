<?php $title = "Evenement"; ?>

<?php ob_start();
 ?>

  <?php 
 
 if (!isset($bookings)) {
    die("Erreur : les données des événements ne sont pas disponibles.");
}
;?>
<div class="container1__homepage">
    <h1 class="mainTitleEvent">Evenements</h1>
    <?php
    // Vérifiez si $posts contient des données avant d'afficher
    if (!empty($bookings)) {
        foreach ($bookings as $booking) {
    ?>
            <div class="card__event">
                <div class="topPart">
                    <h1><?= $titleEvent = htmlspecialchars($booking['Title']); ?></h1>

                    <p class="descriptionEvent"><?= nl2br(htmlspecialchars($booking['Description'])) ?></p>

                </div>
                <div class="bottomPart">
                    <p class="infosEvent">
                        le <?= htmlspecialchars($booking['Date']) ?><br> à <?= htmlspecialchars($booking['Heure']) ?>
                    </p>
                    <?php
                    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 0) {
                    ?> <button class="buttonBooking"><a href='authController'>Réserver une place</a></button> <?php
                                                                                                                } else {
                                                                                                                    ?>
                        <button class="buttonBooking2" data-title="<?= htmlspecialchars($booking['Title']); ?>" value="<?= htmlspecialchars($booking['idEvent']); ?>">Réserver une place</button>


                        <form class="confirmation" method="POST" action="booking" >
                            <h1 class="questionBooking"></h1>
                            <h2 class="questionBookingTitle"></h2>
                            <div class="answerContainer">
                                <button class="buttonYes" type="submit" name="idEvent">Oui</button>
                                <button class="buttonNo">Non</button>
                            </div>

                        </form>
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