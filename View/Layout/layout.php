
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

   </body>
</html>

