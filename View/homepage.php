<?php
require_once(__DIR__ . '/../config.php');
if (!isset($_SESSION)) {
    die("❌ Erreur : La session ne fonctionne pas.");
}
if (!isset($setChronos)) {
    die("Erreur : les données des événements ne sont pas disponibles.");
}


?>


<?php ob_start(); ?>

  
<div class="container1__homepage">
 <img class="logoHomepage" src="/View/Public/Images/logo_centre2.PNG" alt="image">
</div>
<h1>Les rendez vous incontournables sur l'IA</h1>
<div class="container2__homepage">

<img class="Picture__1" src="/View/Public/Images/photoaccueil2.png" alt="image">
 <p>A Euratechnologies Lille</p>
 <p class="moreInfos"> <link rel="stylesheet" href="">EN SAVOIR PLUS</p>
</div>
<div class="container3__homepage">
<h1 class="chronoTitle">Prochain événement dans:</h1>
<div class="chrono">
<span class="days">days</span>
<span class="hours">hours</span>
<span class="minuts">minuts</span>
<span class="seconds">seconds</span>
</div>
</div>
<div class="container4__homepage">
    <button class="buttonBooking"><a href="event">Accéder aux événements</a></button>
</div>
      <!-- Passer la date/heure du prochain événement à JavaScript -->
      <script>
   const chronos = <?=  json_encode($setChronos)  ?>;
   // console.log(chronos);
</script>
<script src="/View/Public/chrono.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require_once('Layout/layout.php'); ?>