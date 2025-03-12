

<?php $title = "Gestion des événements"; ?>
<?php ob_start();
?>

<div class="container1__homepage">
    <h1 class="mainTitleEvent"> Gestion des Evenements</h1>
    <div class="addButtonDiv"><button id="addButton"><img id="addLogo" src="/View/Public/Images/icons8-plus-64.png" alt="image"></button></div>
    <div class="addEventDiv">
        <form class="addEventForm" method="POST" action="/Controller/Admin/eventList.php">
            <h1>Ajoutez un nouvel événement à la liste</h1>
            <label for="titre">Titre:</label>
            <input type="text" id="addTitre" name="titre" require>
            <div id="titleAlert"></div>
            <br />
            <label for="date">Date:</label>
            <input type="date" id="addDate" name="date">
            <div id="dateAlert"></div>
            <br />
            <label for="heure">Heure:</label>
            <input type="heure" id="addHeure" name="heure">
            <div id="hourAlert"></div>
            <br />
            <label for="lieu">Lieu:</label>
            <input type="text" id="addLieu" name="lieu">
            <div id="addressAlert"></div>
            <br />

            <label for="description">Description:</label>
            <textarea type="text" id="addDescription" name="description"></textarea>
            <br />

            <!-- <div id = "passAlert"></div> -->

            <label for="places">Nombre de place maximum:</label>
            <input type="number" id="addPlace" name="place">
            <div id="entrantsAlert"></div>
            <br />
            <button id="newEventButton" type="submit">Ajouter l'événement</button>
            <button id="cancelEventButton">Annuler</button>
        </form>
    </div>
</div>

<?php
// Vérifiez si $posts contient des données avant d'afficher
if (!empty($events)) {
    foreach ($events as $event) {
?>
        <div class="card__event">
            <form class="formModifyEvent" action="/Controller/Admin/eventList.php" method="POST">
                <input type="hidden" name='idEventModify' data-id="<?= htmlspecialchars($event['idEvent']); ?>" value="<?= htmlspecialchars($event['idEvent']); ?>">
                <label for="nom">ID:<?= htmlspecialchars($event['idEvent']) ?></label>
                <br />
                <label for="titleModify">Titre:</label>
                <input type="text" id="titleModify" name="titleModify" value="<?= htmlspecialchars($event['Title']) ?>">
                <br />
                <br />
                <br />
                <label for="dateModify">Date:</label>
                <input type="date" id="dateModify" name="dateModify" value="<?= htmlspecialchars($event['Date']) ?>">
                <br />
                <!-- <div id = "mailAlert"></div> -->
                <br />
                <label for="hourModify">Heure:</label>
                <input type="heure" id="hourModify" name="hourModify" value="<?= htmlspecialchars($event['Heure']) ?>">
                <br />
                <!-- <div id = "phoneAlert"></div> -->
                <br />
                <label for="address">Lieu:</label>
                <input type="text" id="addressModify" name="addressModify" value="<?= htmlspecialchars($event['Lieu']) ?>">
                <br />
                <br />
                <label for="descriptionModify">Description:</label>
                <input type="text" id="descriptionModify" name="descriptionModify" value="<?= htmlspecialchars($event['Description']) ?>">
                <br />
                <br />
                <!-- <div id = "passAlert"></div> -->
                <br />
                <div>

                    <div>
                        <h1>Nombre de participants:</h1>
                    </div>
                    <label for="entrantsModify">Nombre de participant maximum:</label>
                    <input type="text" id="entrantsModify" name="entrantsModify" value="<?= htmlspecialchars($event['entrants']) ?>">
                </div>

                <button type="submit" id="updateButtonList" data-id="<?= htmlspecialchars($event['idEvent']); ?>" value="<?= htmlspecialchars($event['idEvent']); ?>">Modifier</button>
            </form>
            <button class="buttonCancelBooking"
                data-id="<?= htmlspecialchars($event['idEvent']); ?>"
                data-title="<?= htmlspecialchars($event['Title']); ?>"
                value="<?= htmlspecialchars($event['idEvent']); ?>">Supprimer</button>

            <form class="cancellation" action="/Controller/Admin/eventList.php" method="POST">
                <h1 class="questionBooking">Souhaitez-vous vraiment supprimer cet événement:</h1>
                <h2 class="questionBookingTitle"></h2>
                <div class="answerContainer">
                    <button class="buttonYes" type="submit" name="idEvent" value="<?= htmlspecialchars($event['idEvent']); ?>">Oui</button>
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


<script src="/View/Public/eventList.js"></script>
<?php $content = ob_get_clean(); ?>

</div>
<?php
// Inclure le layout principal
require_once(__DIR__ . '/../../Layout/layout.php');
?>