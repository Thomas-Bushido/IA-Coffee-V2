document.addEventListener("DOMContentLoaded", function () {
    const roleSelects = document.querySelectorAll(".roleSelect"); // Ajout du point pour la classe
    const deleteButtons = document.querySelectorAll("#deleteButton");
    


    roleSelects.forEach((roleSelect) => {
        roleSelect.addEventListener("change", function () {
            // Trouver l'input caché correspondant à cet utilisateur
            const idRoleInput = roleSelect.closest("form").querySelector(".idRoleInput");
            if (idRoleInput) {
                idRoleInput.value = roleSelect.value; // Mise à jour de l'input caché
                console.log("Nouveau rôle sélectionné:", roleSelect.value);
            }
        });
    });

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault(); // Empêcher un éventuel comportement par défaut

            // Trouver le bon formulaire de suppression correspondant
            const form = button.closest("div").querySelector(".deleteAccount");
            const yesButton = form.querySelector(".buttonYes");
            const questionBookingTitle = form.querySelector(".questionBookingTitle");
            const noButton = form.querySelector(".buttonNo");
            const idUser = button.value;

            // Afficher le bon identifiant dans la question
            questionBookingTitle.textContent = idUser;

            // Afficher la fenêtre de confirmation
            form.style.display = "flex";
            form.style.position = "fixed";

            // Mettre à jour l'attribut "value" du bouton Oui avec l'ID utilisateur
            yesButton.setAttribute("value", idUser);

            // Gérer la fermeture avec le bouton "Non"
            noButton.addEventListener("click", function (event) {
                event.preventDefault();
                form.style.display = "none"; // Masquer le formulaire de confirmation
            });
        });
    });



});