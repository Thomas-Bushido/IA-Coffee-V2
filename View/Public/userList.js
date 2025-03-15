console.log(users);
let ckeckmail = [];
console.log(ckeckmail);
users.forEach((user) => ckeckmail.push(user["MailAddress"]));

document.addEventListener("DOMContentLoaded", function () {
  const firstName = document.getElementById("Prenom");
  const lastName = document.getElementById("Nom");
  const email = document.getElementById("Email");
  const phone = document.getElementById("Telephone");
  const forms = document.querySelectorAll(".updatUserForm"); // Ajout du point pour la classe
  
  const mailAlert = document.getElementById("mailAlert");
  const phoneAlert = document.getElementById("phoneAlert");
  const lastNameAlert = document.getElementById("lastNameAlert");
  const firstNameAlert = document.getElementById("firstNameAlert");

  // Récupérer l'ancienne adresse e-mail de l'utilisateur connecté
  const oldEmail = email.value;
  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  const phoneRegex = /^\+?[0-9]{10,15}$/;

  forms.forEach((form) => {
    form.addEventListener("submit", function (event) {
      // Trouver l'input caché correspondant à cet utilisateur
      if (!firstName.value) {
        event.preventDefault(); // Empêche l'envoi du formulaire
        firstNameAlert.textContent = "Le prénom est invalide !";
        firstNameAlert.style.color = "red";
      } else {
        firstNameAlert.textContent = "Le prénom est valide";
        firstNameAlert.style.color = "green";
      }
      if (!lastName.value) {
        event.preventDefault(); // Empêche l'envoi du formulaire
        lastNameAlert.textContent = "Le nom est invalide !";
        lastNameAlert.style.color = "red";
      } else {
        lastNameAlert.textContent = "Le nom est valide";
        lastNameAlert.style.color = "green";
      }

      if (!phoneRegex.test(phone.value)) {
        event.preventDefault(); // Empêche l'envoi du formulaire
        phoneAlert.textContent = "Le numéro de téléphone est invalide !";
        phoneAlert.style.color = "red";
      } else {
        phoneAlert.textContent = "Le numéro de téléphone est valide";
        phoneAlert.style.color = "green";
      }
      let mailExists = ckeckmail.includes(email.value);
      if (email.value !== oldEmail && mailExists) {
        // Si l'email est différent de l'ancien ET qu'il existe déjà, on bloque
        mailAlert.textContent = "Cette adresse mail est déjà utilisée !";
        mailAlert.style.color = "red";
      } else if (!emailRegex.test(email.value)) {
        event.preventDefault(); // Empêche l'envoi du formulaire
        mailAlert.textContent = "Cette adresse mail est invalide !";
        mailAlert.style.color = "red";
      } else {
        console.log(mailAlert.value);
        mailAlert.textContent = "Adresse mail validé";
        mailAlert.style.color = "green";
      }
    });

    // Sélectionner correctement les boutons de suppression
    const deleteButtons = document.querySelectorAll(".deleteButton");
    deleteButtons.forEach((button) => {
      button.addEventListener("click", function (event) {
   

        const deleteForm = button.closest("div").querySelector(".deleteAccount");
        const yesButton = document.querySelector(".buttonYes");
        const questionBookingTitle = document.querySelector(".questionBookingTitle");
        const noButton = document.querySelector(".buttonNo");
        const idUser = button.value;

        questionBookingTitle.textContent = idUser;

        deleteForm.style.display = "flex";
        deleteForm.style.position = "fixed";

        yesButton.setAttribute("value", idUser);

        noButton.addEventListener("click", function (event) {
          event.preventDefault();
          deleteForm.style.display = "none";
        });
      });
    });

    // Gestion du changement de rôle
    const roleSelect = document.querySelector(".roleSelect");
    const idRoleInput = document.querySelector(".idRoleInput");

    roleSelect.addEventListener("change", function () {
      idRoleInput.value = roleSelect.value;
    });
  });
});