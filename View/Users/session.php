<?php 
//  require_once(__DIR__ . '/); 

$title = "session utilisateur"; 
ob_start(); 
 
var_dump($_SESSION);


?>

<div class="container1__homepage">
    <h1 class="welcomeTitle">Bienvenue, <?php 
    
        echo $_SESSION['user']['email'] ?></h1>
        <button class="buttonSession"><a href="sessionUserInfos">Mes informations</a></button>
        <button class="buttonDeleteAccount" data-id="<?= htmlspecialchars($_SESSION['user']['id']); ?>">Supprimer mon compte</button>
        <form class="deleteAccount" action="session" method="POST">
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
    <div class="container2__homepage">
    <h1 id="titleMyBookings">Mes réservations: </h1>

     <?php if(!empty($bookings)) {
        foreach ($bookings as $booking)
        {
            ?>
            <div class="card__booking">
                <div class="topPartB">
                    <h1><?=  htmlspecialchars($booking['Title']); ?></h1>
                </div>
                <div class="bottomPartB">
                    <p class="infosEventB">
                        le <?= htmlspecialchars($booking['Date']) ?> à <?= htmlspecialchars($booking['Heure']) ?>
                
                   <br />
                        <?= htmlspecialchars($booking['Lieu']) ?>
                    </p>
                     <button class="buttonCancelBooking" data-title="<?= htmlspecialchars($booking['Title']); ?>" value="<?= htmlspecialchars($booking['idBooking']); ?>">Annuler</button>
                      <form class="cancellation" action="DeleteBookingController" method="POST">
                            <h1 class="questionBooking">Souhaitez-vous vraiment annuler cette réservation:</h1>
                            <h2 class="questionBookingTitle"></h2>
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
        echo "<p>Aucune réservation pour le moment.</p>";
    }
    ?>
    <script src="/View/Public/deleteUser.js"></script>
 <script src="/View/Public/bookingCancellation.js"></script>
    <?php $content = ob_get_clean(); ?>
<?php

require_once(__DIR__ . '/../Layout/layout.php');
