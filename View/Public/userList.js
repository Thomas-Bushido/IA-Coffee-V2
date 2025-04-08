console.log(users);

let checkmail = [];
users.forEach((user) => checkmail.push(user["MailAddress"]));

document.addEventListener("DOMContentLoaded", function () {
  const forms = document.querySelectorAll(".updatUserForm");

  forms.forEach((form) => {
    const firstName = form.querySelector("#Prenom");
    const lastName = form.querySelector("#Nom");
    const email = form.querySelector("#Email");
    const phone = form.querySelector("#Telephone");

    const mailAlert = form.querySelector("#mailAlert");
    const phoneAlert = form.querySelector("#phoneAlert");
    const lastNameAlert = form.querySelector("#lastNameAlert");
    const firstNameAlert = form.querySelector("#firstNameAlert");

    const oldEmail = email.value;
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const phoneRegex = /^\+?[0-9]{10,15}$/;

    form.addEventListener("submit", function (event) {
      if (!firstName.value) {
        event.preventDefault();
        firstNameAlert.textContent = "Le prénom est invalide !";
        firstNameAlert.style.color = "red";
      } else {
        firstNameAlert.textContent = "Le prénom est valide";
        firstNameAlert.style.color = "green";
      }

      if (!lastName.value) {
        event.preventDefault();
        lastNameAlert.textContent = "Le nom est invalide !";
        lastNameAlert.style.color = "red";
      } else {
        lastNameAlert.textContent = "Le nom est valide";
        lastNameAlert.style.color = "green";
      }

      if (!phoneRegex.test(phone.value)) {
        event.preventDefault();
        phoneAlert.textContent = "Le numéro de téléphone est invalide !";
        phoneAlert.style.color = "red";
      } else {
        phoneAlert.textContent = "Le numéro de téléphone est valide";
        phoneAlert.style.color = "green";
      }

      let mailExists = checkmail.includes(email.value);
      if (email.value !== oldEmail && mailExists) {
        event.preventDefault();
        mailAlert.textContent = "Cette adresse mail est déjà utilisée !";
        mailAlert.style.color = "red";
      } else if (!emailRegex.test(email.value)) {
        event.preventDefault();
        mailAlert.textContent = "Cette adresse mail est invalide !";
        mailAlert.style.color = "red";
      } else {
        mailAlert.textContent = "Adresse mail validée";
        mailAlert.style.color = "green";
      }
    });

    // Suppression compte - contexte local
    const deleteButton = form.closest(".avatarInfos").querySelector(".deleteButton");
    const deleteForm = form.closest(".avatarInfos").querySelector(".deleteAccount");

    const yesButton = deleteForm.querySelector(".buttonYes");
    const noButton = deleteForm.querySelector(".buttonNo");
    const questionBookingTitle = deleteForm.querySelector(".questionBookingTitle");

    deleteButton.addEventListener("click", function () {
      const idUser = deleteButton.value;
      questionBookingTitle.textContent = `ID: ${idUser}`;
      deleteForm.style.display = "flex";
      deleteForm.style.position = "fixed";
      yesButton.setAttribute("value", idUser);
    });

    noButton.addEventListener("click", function (event) {
      event.preventDefault();
      deleteForm.style.display = "none";
    });

    // Rôle
    const roleSelect = form.querySelector(".roleSelect");
    const idRoleInput = form.querySelector(".idRoleInput");

    roleSelect.addEventListener("change", function () {
      idRoleInput.value = roleSelect.value;
    });
  });
});
