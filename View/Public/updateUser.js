

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formInscription");
    const updateButton = document.getElementById("updateButton");
    // const email = document.getElementById("email");
    const pass1 = document.getElementById("pass1");
    const pass2 = document.getElementById("pass2");
    const phone = document.getElementById("telephone");
    const passAlert = document.getElementById("passAlert");
    
    // const mailAlert = document.getElementById("mailAlert");
    const phoneAlert = document.getElementById("phoneAlert");
    const updateDiv = document.querySelector(".updateDiv");
    let Flag = false;
  
    form.addEventListener("submit", function (event) {
      event.preventDefault(); // Empêche l'envoi initial du formulaire
      
      let validPhone = false;
      let validPass = false;
     
       const phoneRegex = /^\+?[0-9]{10,15}$/;

       if (!phoneRegex.test(phone.value)) {
        event.preventDefault(); // Empêche l'envoi du formulaire
        phoneAlert.textContent = "Le numéro de téléphone est invalide !";
        phoneAlert.style.color = "red";
      
      } else {
        phoneAlert.textContent = "Le numéro de téléphone est valide";
        phoneAlert.style.color = "green";
        validPhone = true;
      }


  
       if (pass1.value !== "" || pass2.value !== "") {
        if (pass1.value !== pass2.value) {
            passAlert.textContent = "Les mots de passe ne correspondent pas !";
            passAlert.style.color = "red";
        } else {
            passAlert.textContent = "Mot de passe validé ";
            passAlert.style.color = "green";
            validPass = true;
        }
    } else {
        validPass = true; // Si l'utilisateur ne modifie pas le mot de passe
    }
    if (validPhone && validPass) {
      Flag = true;
      updateDiv.style.display = "flex";
      updateDiv.style.position = "fixed";
  }
  const yesButton = document.getElementById("buttonYes");
    // Si l'utilisateur confirme, soumettre le formulaire
  yesButton.addEventListener("click", function () {
      if (Flag) {
          form.submit();
      }
  });
 
});
const noButton = document.querySelector(".buttonNo");
           // Si l'utilisateur annule la modification
    noButton.addEventListener("click", function (event) {
      event.preventDefault();
      updateDiv.style.display = "none";
      Flag = false;
  });
    
    
      
   
  //   document.getElementById("buttonYes").addEventListener("click", function () {
  //     if (isValid) {
  //         form.submit();
  //     }
  // });
  
  //   updateButton.addEventListener("click", function() {
       

  //      if(Flag) {
  //       update.style.display = "flex";
  //       update.style.position = "fixed";
  //      }
       
  //      document.querySelector(".buttonNo").addEventListener("click", function(event) {
  //       update.style.display = "none";
  //       event.preventDefault();
  //     });
          
  
  //     })

});
