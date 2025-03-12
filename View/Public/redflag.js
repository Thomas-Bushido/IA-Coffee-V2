console.log(checkUsers[0]["MailAddress"]);

let ckeckmail = [];
checkUsers.forEach((user) => ckeckmail.push(user["MailAddress"]));




// formulaire de connection
document.addEventListener("DOMContentLoaded", function () {
    const form2 = document.getElementById("formConnection");
    const email2 = document.getElementById("email2");
    const pass3 = document.getElementById("pass3");
    const passAlert2 = document.getElementById("passAlert2");
    const mailAlert2 = document.getElementById("mailAlert2");
  
  
    
  
    // Transformer checkUsers en un objet { email: password }
    let usersData = {};
    checkUsers.forEach((user) => {
      usersData[user["MailAddress"]] = user["Password"];
    });
  
    console.log("Liste des utilisateurs :", usersData);
  
    form2.addEventListener("submit", function (event) {
      let emailValue = email2.value.trim();
      let passwordValue = pass3.value.trim();
  
      if (!usersData[emailValue]) {
        event.preventDefault(); // Empêche l'envoi du formulaire
        mailAlert2.textContent = "Cette adresse mail est invalide !";
        mailAlert2.style.color = "red";
        console.log("Email invalide :", emailValue);
        } else {
            mailAlert2.textContent = "Email validé !";
            mailAlert2.style.color = "green";
        }
  
      // Vérification du mot de passe
      if (usersData[emailValue] !== passwordValue) {
        event.preventDefault(); // Empêche l'envoi du formulaire
        passAlert2.textContent = "Mot de passe incorrect !";
        passAlert2.style.color = "red";
        console.log("Mot de passe incorrect pour :", passwordValue);
    
      } else {   
      passAlert2.textContent = "Connexion réussie !";
      passAlert2.style.color = "green";
      console.log("mail :", emailValue);
      console.log("pass :", passwordValue);
      }
      
    });
  });
// ******************************************************************
// formulaire d'inscription
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("formInscription");
  const email = document.getElementById("email");
  const pass1 = document.getElementById("pass1");
  const pass2 = document.getElementById("pass2");
  const phone = document.getElementById("telephone");
  const passAlert = document.getElementById("passAlert");
  const mailAlert = document.getElementById("mailAlert");
  const phoneAlert = document.getElementById("phoneAlert");

  console.log(document.getElementById("email").value);
  console.log(email.value);

  form.addEventListener("submit", function (event) {
    let mailExists = ckeckmail.includes(email.value);
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const phoneRegex = /^\+?[0-9]{10,15}$/;

    if (pass1.value !== pass2.value) {
      event.preventDefault(); // Empêche l'envoi du formulaire
      passAlert.textContent = "Les mots de passe ne correspondent pas !";
      passAlert.style.color = "red";
    } else {
      passAlert.textContent = "mot de passe validé ";
      passAlert.style.color = "green";
    }

    if (!phoneRegex.test(phone.value)) {
      event.preventDefault(); // Empêche l'envoi du formulaire
      phoneAlert.textContent = "Le numéro de téléphone est invalide !";
      phoneAlert.style.color = "red";
    } else {
      phoneAlert.textContent = "Le numéro de téléphone est valide";
      phoneAlert.style.color = "green";
    }

    if (mailExists) {
      event.preventDefault(); // Empêche l'envoi du formulaire
      mailAlert.textContent = "Cette adresse mail est déjà utilisé !";
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
});
