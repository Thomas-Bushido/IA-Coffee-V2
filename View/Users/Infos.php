<?php  require_once(__DIR__ . '/../../config.php');?>
<?php $title = "session utilisateur: informations "; ?>

<?php ob_start(); 

// var_dump($infos);

 if (!isset($_SESSION['user'])){
    header("Location: /Controller/homepage.php");
    exit();
}
?>




<div class="container1__homepage">
    <h1 class="mainTitleEvent">Mes informations</h1>
<form id="formInscription" action="UpdateInfosUser" method="POST">
<input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
    <label for="nom">Votre nom:</label>
    <input type="text" id="nom" name="Nom" value="<?= htmlspecialchars($infos['LastName']) ?>" required>
    <br />
    <br />
    <br />
    <label for="prenom">Votre prénom:</label> 
    <input type="text" id="prenom" name="Prenom" value="<?= htmlspecialchars($infos['FirstName']) ?>" required>
    <br />
    <br />
    <br />
     <label for="email">Votre e-mail:</label> 
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($infos['MailAddress']) ?>" readonly>
    <br />
    <div id = "mailAlert"></div>
    <br />
     <label for="numero de téléphone">Votre numéro de téléphone:</label> 
    <input type="number" id="telephone" name="telephone" value="<?= htmlspecialchars($infos['PhoneNumber']) ?>" required>
    <br />
    <div id = "phoneAlert"></div>
    <br />
     <label for="Mot de passe actuel">Votre mot de passe actuel:</label>
     <input type="password" id="Mot_de_passe" name="Mot_de_passe" value="<?= htmlspecialchars($infos['Password']) ?>" readonly>
     <br />
     <br />
    <label for="pass1">Nouveau mot de passe:</label> 
    <input type="password" id="pass1" name="pass1" value="" placeholder="Saisissez un nouveau mot de passe" >
    <br />
    <br />
     <label for="pass2">Confirmez le nouveau mot de passe:</label> 
    <input type="password" id="pass2" name="pass2" value="" placeholder="Confirmez ce nouveau mot de passe">
    <br />
    <div id = "passAlert"></div>
    <br />
    <button id="updateButton"  >Modidier mes informations</button>
 

<div class="updateDiv" >
                            <h1 class="questionBooking">Confirmez-vous ces modifications ?</h1>
                            
                            <div class="answerContainer">
                                <button id="buttonYes" type="submit" name="ok">Oui</button>
                                <button class="buttonNo">Non</button>
                            </div>

</div>  
</form>


<script>
   const updateUsers = <?=  json_encode($updateUsers ?? [], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
   // Encodage des caractères spéciaux (<, >, &, ', ") pour éviter les injections JS  ?>;
   </script>


 <!-- Inclusion du fichier JavaScript  -->
 <script src="/View/Public/updateUser.js"></script> 

    <?php $content = ob_get_clean(); ?>
<?php
// Inclure le layout principal
require_once(__DIR__ . '/../Layout/layout.php');
