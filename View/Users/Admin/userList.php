<?php $title = "session admin: gestion des utilisateurs "; ?>
<?php ob_start(); ?>


<div class="container1__homepage">
    <h1>Gestion des utilisateurs</h1>
    <?php
var_dump($users);
    if (!empty($users)) {
       
        foreach ($users as $user) {
    ?>

    <ul>
            <li class="news">
                <h2>
            <label for="idUser">ID: <?= htmlspecialchars($user['Identifier']) ?></label>
                </h2>
            <form class="updatUserForm"method="POST" action="AdminUpdateUserList">
            <label for="Nom">Nom:</label>
    <input type="text" id="Nom" name="Nom" value="<?= htmlspecialchars($user['LastName']) ?>" >
    <div id = "lastNameAlert"></div>
    <br />
    <br />
    <br />
    <label for="prenom">Prénom:</label> 
    <input type="text" id="Prenom" name="Prenom" value="<?= htmlspecialchars($user['FirstName']) ?>" >
    <div id = "firstNameAlert"></div>
    <br />
    <br />
    <br />
     <label for="email">E-mail:</label> 
    <input type="email" id="Email" name="Email" value="<?= htmlspecialchars($user['MailAddress']) ?>" >
    <br />
    <div id = "mailAlert"></div>
    <br />
     <label for="numero de téléphone">Numéro de téléphone:</label> 
    <input type="number" id="Telephone" name="Telephone" value="<?= htmlspecialchars($user['PhoneNumber']) ?>" >
    <br />
    <div id = "phoneAlert"></div>
    <br />
    <div class="roleDiv">
        <h1 class="role">Rôle:</h1>
        <select class="roleSelect" name="Role">
            <option value="<?= htmlspecialchars($user['Role']) ?>" selected>
                <?= htmlspecialchars($user['Role']) ?>
            </option>
            <option value="<?= $user['Role'] == 1 ? 0 : 1 ?>">
                <?= $user['Role'] == 1 ? 0 : 1 ?>
            </option>
        </select>
    </div>
    
    <input type="hidden" name="idUser" class="idUserInput" value="<?= htmlspecialchars($user['Identifier']) ?>">
    <input type="hidden" name="idRole" class="idRoleInput" value="<?= htmlspecialchars($user['Role']) ?>">
    <button class="saveButton"  type="submit">Modifier</button>
    
</form>

                    <button class="deleteButton" value="<?= htmlspecialchars($user['Identifier']) ?>">Supprimer</button>
                    <form class="deleteAccount" method="POST" action="AdminDeleteUserList">
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