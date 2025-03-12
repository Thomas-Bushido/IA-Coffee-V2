<?php $title = "session admin: gestion des utilisateurs "; ?>
<?php ob_start(); ?>


<div class="container1__homepage">
    <h1>Gestion des utilisateurs</h1>
    <?php

    if (!empty($users)) {
       
        foreach ($users as $user) {
    ?>

    <ul>
            <li class="news">
                <h2>
            
                    <label for="id">ID: <?= htmlspecialchars($user['Identifier']) ?></label>
                    <input type="text" id="nom" name="Nom" value="<?= htmlspecialchars($user['Nom']) ?>">

                </h2>

                <div>
                <!-- <label for="nom">Nom: <?= htmlspecialchars($user['Identifier']) ?></label>
                <input type="text" id="nom" name="Nom" value="<?= htmlspecialchars($user['Nom']) ?>">
                    <br/>
                    <br/>
                    Prénom: <?= nl2br(htmlspecialchars($user['LastName'])) ?>
                    <br/>
                    <br/>
                    Adresse mail: <?= nl2br(htmlspecialchars($user['MailAddress'])) ?>
                    <br/>
                    <br/>
                    Numéro de téléphone: <?= nl2br(htmlspecialchars($user['PhoneNumber'])) ?>
                    <br/>
                    <br/> -->
                    <form    method="POST" action="/Controller/Admin/userList.php">
    <div class="roleDiv">
        <h1 class="role">Role:</h1>
        <select class="roleSelect">
            <option value="<?= htmlspecialchars($user['Role']) ?>" selected
                <?= htmlspecialchars($user['Role']) ?>
            </option>
            <option value="<?= $user['Role'] == 1 ? 0 : 1 ?>">
                <?= $user['Role'] == 1 ? 0 : 1 ?>
            </option>
        </select>
    </div>
    
    <input type="hidden" name="idUser" class="idUserInput" value="<?= htmlspecialchars($user['Identifier']) ?>">
    <input type="hidden" name="idRole" class="idRoleInput">
    <button class="saveButton"  type="submit">Enregistrer</button>
    
</form>

                    <button id="deleteButton" value="<?= htmlspecialchars($user['Identifier']) ?>">Supprimer</button>
                    <form class="deleteAccount" method="POST" action="/Controller/Admin/userList.php">
                    <h1 class="questionBooking">Souhaitez-vous vraiment supprimer ce compte ? ID:</h1>
                            <h2 class="questionBookingTitle"></h2>
                            <input type="hidden" name="deleteUser" value="1">
                            <div class="answerContainer">
                                <button class="buttonYes" type="submit" name="idUser" value="<?= htmlspecialchars($user['Identifier']) ?>">Oui</button>
                                <button class="buttonNo">Non</button>
                    </form>
                </div>
            </li>
            </ul>
    <?php
        }
    } else {
        echo "<p>utilisateur non trouvé </p>";
    }
    ?>
</div>

<script>
   const users = <?=  json_encode($users)  ?>;
   console.log('hello');
</script>
<script src="/View/Public/userList.js"></script>
<?php $content = ob_get_clean(); ?>
<?php
// Inclure le layout principal
require_once(__DIR__ . '/../../Layout/layout.php');