<?php  require_once(__DIR__ . '/../../config.php');?>
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
    <div class="addButtonDiv"><button id="addButton"><img id="addLogo" src="/View/Public/Images/icons8-plus-64.png" alt="image"></button></div>
    <div class="addEventDiv">
        <form class="addEventForm" method="POST" action="AdminCreateBookingList">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
            <h1 class="titleAddEventDiv">Ajoutez une nouvelle réservation</h1>
            <label for="addUser">ID de l'Utilisateur:</label>
            <input type="number" id="addUser" name="idUser" required>
            <div id="userAlert"></div>
            <br />
            <label for="addEvent">ID de l'événement:</label>
            <input type="number" id="addEvent" name="idEvent">
            <div id="eventAlert"></div>
            <div id="checkBookingsAlert"></div>
            <br />
            <button id="newEventButton" type="submit">Ajouter</button>
            <button id="cancelEventButton">Annuler</button>
        </form>
    </div>
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
                    <h1>Réservation pour l'événement:<?= htmlspecialchars($booking['idEvent']); ?></h1>
                    
                    <label for="Event">Utilisateur N°: <?= nl2br(htmlspecialchars($booking['idUser'])) ?></label>
                    <label for="Event">Statut de la réservation: <?= nl2br(htmlspecialchars($booking['state'])) ?></label>
                    
                
                
                <button class="buttonCancelBooking" data-title="<?= htmlspecialchars($booking['idBooking']); ?>" value="<?= htmlspecialchars($booking['idBooking']); ?>">Supprimer</button>
                      <form class="cancellation" action="DeleteBookingController" method="POST">
                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                            <h1 class="questionBooking">Souhaitez-vous vraiment annuler cette réservation:</h1>
                            <h2 class="questionBookingTitle"><?= htmlspecialchars($booking['idBooking']); ?></h2>
                            <div class="answerContainer">
                                <button class="buttonYes" type="submit" name="idBooking" value="<?= htmlspecialchars($booking['idBooking']); ?>">Oui</button>
                                <button class="buttonNo">Non</button>
                            </div>

                        </form>  
                        </div>       
                </div>
            
    <?php
        }
    } else {
        echo "<p>Aucun événement disponible pour le moment.</p>";
    }
    ?>
    
    <script>
   const eventList = <?=  json_encode($events ?? [], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
   console.log('access events ok');
</script>
    <script>
   const bookings = <?=  json_encode($bookings ?? [], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
   console.log('access bookings ok');
</script>

    <script src="/View/Public/bookingConfirmationAdmin.js"></script> 
    <script src="/View/Public/bookingCancellationAdmin.js"></script>

    </div>
    <?php $content = ob_get_clean(); ?>


<?php
// Inclure le layout principal
require_once(__DIR__ . '/../Layout/layout.php');
?>