<?php $title = "Connexion"; ?>

<?php ob_start(); ?>


<div class="container1__homepage">
<h1 class="mainTitleEvent">Déjà un compte? Identifiez-vous</h1>
    <form id="formConnection" method="POST"action="login">
    <!-- <label for="email">Votre e-mail:</label> -->
    <input type="email" id="email2"name="email2" placeholder="Entrez votre adresse mail" required>
    <br />
    
    <div id = "mailAlert2"></div>
    <br />
    <!-- <label for="pass3">Votre mot de passe:</label> -->
    <input type="password" id="pass3" name="pass3" placeholder="Entrez le mot de passe" required autocomplete="current-password">
    <br />
    <div id = "passAlert2"></div>
    <br />
    <input id="submitFormConnection" type="submit" value="Me connecter" name="ok">
    </form>
</div>

<div class="container2__homepage">
    <h1 class="mainTitleEvent">Ou</h1>
    <h2 class="mainTitleEvent" >Créez votre compte</h2>
<form id="formInscription" method="POST" action="register">
    <!-- <label for="nom">Votre nom:</label> -->
    <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required>
    <br />
    <br />
    <br />
    <!-- <label for="prenom">Votre prénom:</label> -->
    <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
    <br />
    <br />
    <br />
    <!-- <label for="email">Votre e-mail:</label> -->
    <input type="email" id="email" name="email" placeholder="Entrez votre adresse mail" required>
    <br />
    <div id = "mailAlert"></div>
    <br />
    <!-- <label for="numero de téléphone">Votre numéro de téléphone:</label> -->
    <input type="number" id="telephone" name="telephone" placeholder="Entrez votre numéro de téléphone" required>
    <br />
    <div id = "phoneAlert"></div>
    <br />
    <!-- <label for="pass1">Votre mot de passe:</label> -->
    <input type="password" id="pass1" name="pass1" placeholder="Entrez le mot de passe" required>
    <br />
    <br />
    <br />
    <!-- <label for="pass2">Confirmez le mot de passe:</label> -->
    <input type="password" id="pass2" name="pass2" placeholder="Saisissez à nouveau le mot de passe" required>
    <br />
    <div id = "passAlert"></div>
    <br />
    <input id="submitFormInscription" type="submit" value="Créer mon compte" name="ok">
 
</form>
</div>


   <script>
   const checkUsers = <?=  json_encode($checkUsers)  ?>;
//    console.log('he');
</script>


 <!-- Inclusion du fichier JavaScript  -->
 <script src="/View/Public/redflag.js"></script> 
 <?php $content = ob_get_clean(); ?>
<?php
// Inclure le layout principal
require_once(__DIR__ . '/../Layout/layout.php');
?>