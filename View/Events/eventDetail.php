<?php  require_once(__DIR__ . '/../../config.php');?>
<?php $title = "Evenement"; ?>

<?php ob_start();
// var_dump($eventInfos);

 ?>

  <?php 

 if (!isset($eventInfos)) {
    die("Erreur : les données des événements ne sont pas disponibles.");
}
;?>
<div class="container1__homepage">
    <h1 class="mainTitleEvent"><?= nl2br(htmlspecialchars($eventInfos[0]['Title'])) ?></h1>
    <?php
    // Vérifiez si $posts contient des données avant d'afficher
   
           
    ?>
    
            <div class="card__eventDetail">
                <div class="topPartDetail">
                  <?php 
                 
                 
                ?>   
             

                </div>
                <div class="bottomPartDetail">
                
                 <div class="descriptionEventDetail"><?= nl2br(htmlspecialchars($eventInfos[0]['Description'])) ?> </div>
                    <div class="infosEventDetail">
                        le <?= nl2br(htmlspecialchars($eventInfos[0]['Date'])) ?> à <?= nl2br(htmlspecialchars($eventInfos[0]['Heure'])) ?><br>
                        à <?= nl2br(htmlspecialchars($eventInfos[0]['Lieu'])) ?>
                        </div>   

        
<?php

    if (!isset($_SESSION['user'])) {
?>
        <button class="buttonBooking"><a href='authController'>Réserver une place</a></button>
<?php
    }   else {
?>
        <button class="buttonBooking2" data-title="<?= htmlspecialchars($eventInfos[0]['Title']); ?>" value="<?= htmlspecialchars($eventInfos[0]['idEvent']); ?>">Réserver une place</button>

        <form class="confirmation" method="POST" action="CreateBookingController">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
            <h1 class="questionBooking"></h1>
            <h2 class="questionBookingTitle"></h2>
            <div class="answerContainer">
                <button class="buttonYes" type="submit" name="idEvent" value="<?= htmlspecialchars($eventInfos[0]['idEvent']); ?>">Oui</button>
                <button class="buttonNo">Non</button>
            </div>
        </form>
<?php
    }

?>

                </div>
            </div>
   


    <script src="/View/Public/bookingConfirmation.js"></script>
    <?php $content = ob_get_clean(); ?>

</div>
<?php
// Inclure le layout principal
require_once(__DIR__ . '/../Layout/layout.php');
?>