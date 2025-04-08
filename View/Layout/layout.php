<?php
// Inclure le contrôleur pour récupérer les événements
require_once __DIR__ . '/../../Controller/HeaderSearchBarEvents.php';

// Instancier le contrôleur
$headerSearch = new HeaderSearchBarEvents();

// Appeler la méthode qui récupère les événements
$eventSearch = $headerSearch->eventModel->get(); // Ou $headerSearch->index() si tu veux passer par index()

?>
<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?= htmlspecialchars($title) ?></title>
      <link href="/View/Public/main.css" rel="stylesheet">
   </head>
   <body>
  

      <!-- Inclusion de l'en-tête -->
       <?php require __DIR__ . '/header.php'; ?>   

      <!-- Contenu principal -->
      <main>
         <?= $content ?> 
      </main>

      <!-- Inclusion du pied de page -->
       <?php require __DIR__ . '/footer.php'; ?>     

       <script>
   const eventSearch = <?=  json_encode($eventSearch)  ?>;
   // console.log(chronos);
</script>
<script src="/View/Public/header.js"></script>
   </body>
</html>

