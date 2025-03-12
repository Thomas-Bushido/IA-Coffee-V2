document.addEventListener("DOMContentLoaded", function () {
    const buttonDeleteAccount = document.querySelector('.buttonDeleteAccount');
    const yesButton = document.querySelector(".buttonYes");
    const deleteAccount = document.querySelector(".deleteAccount");
    const noButton = document.querySelector(".buttonNo");
console.log("deleteAccount");
        buttonDeleteAccount.addEventListener("click", function () {
            const idUser = buttonDeleteAccount.getAttribute("data-id"); // Récupération de l'ID utilisateur
            deleteAccount.style.display = "flex";
            deleteAccount.style.position = "fixed";
            yesButton.setAttribute("value", idUser); // Ajout de l'ID au bouton "Oui"
        })
    

    
        noButton.addEventListener("click", function (event) {
            deleteAccount.style.display = "none";
            event.preventDefault();
  
    })
});