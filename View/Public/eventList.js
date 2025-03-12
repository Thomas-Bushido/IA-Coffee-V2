
// Formulaire de création

document.addEventListener("DOMContentLoaded", function () {
    const addbutton = document.getElementById('addButton');
    const cancelButton = document.getElementById('cancelEventButton');
    const yesButton = document.getElementById('newEventButton');  
   
    const addEventDiv = document.querySelector(".addEventDiv");

    const addTitre = document.getElementById("addTitre");
    const titleAlert = document.getElementById('titleAlert'); 

    const addDate = document.getElementById("addDate");
    const dateAlert = document.getElementById('dateAlert'); 

    const addHour = document.getElementById("addHeure");
    const hourAlert = document.getElementById('hourAlert');

    const addAddress = document.getElementById("addLieu");
    const addressAlert = document.getElementById('addressAlert');
    const addDescription = document.getElementById("addDescription");
    const addEntrants = document.getElementById("addPlace");
    const entrantAlert = document.getElementById('entrantsAlert');
      
  
    addbutton.addEventListener("click", function(event) {
        
          addEventDiv.style.display = "flex";
          addEventDiv.style.position = "fixed";
          event.preventDefault();
      
          
      })

  
    cancelButton.addEventListener("click", function(event) {
        addEventDiv.style.display = "none";
        console.log("test");
              event.preventDefault();
    });

    yesButton.addEventListener("click", function(event) {
 
        if(addTitre.value.trim() !== "" && /^[a-zA-ZÀ-ÿ0-9\s\-_']{1,60}$/.test(addTitre.value)){
            titleAlert.textContent = "ok"
            titleAlert.style.color = "green"
        } else {
            event.preventDefault();
            titleAlert.textContent = "Erreur: le titre est requis"
            titleAlert.style.color = "red"
        }
        if(addDate.value) {
            dateAlert.textContent = "ok"
            dateAlert.style.color = "green"
        } else {
            event.preventDefault();
            dateAlert.textContent = "Erreur: la date doit être saisie"
            dateAlert.style.color = "red"
        }
        if( /^([01]\d|2[0-3]):[0-5]\d$/.test(addHour.value)) {
            hourAlert.textContent = "ok"
            hourAlert.style.color = "green"
        } else {
            event.preventDefault();
            hourAlert.textContent = "Erreur: l'heure doit être saisie au format hh:mm"
            hourAlert.style.color = "red"
        }
        if(addAddress.value.trim() !== "" && /^[a-zA-ZÀ-ÿ0-9\s\-_']{1,60}$/.test(addAddress.value)){
            addressAlert.textContent = "ok"
            addressAlert.style.color = "green"
        } else {
            event.preventDefault();
            addressAlert.textContent = "Erreur: l'adresse est requise"
            addressAlert.style.color = "red"
        }
        if(addEntrants.value && Number.isInteger(Number(addEntrants.value))){
            entrantAlert.textContent = "ok"
            entrantAlert.style.color = "green"
        } else {
            event.preventDefault();
            console.log(addEntrants.value)
            entrantAlert.textContent = "Erreur: le nombre de place maximum est requis"
            entrantAlert.style.color = "red"
        }
             
        console.log("ok");
              
    });
  
  });
  
 // formulaire de modification d'événements


 document.addEventListener("DOMContentLoaded", function () {
   
    const modifyButton = document.getElementById('updateButtonList');
   
   
  
    const updateForm = document.querySelector(".formModifyEvent");

    const updateTitle = document.getElementById("titleModify");
    const titleAlert = document.getElementById('titleAlert'); 

    const updateDate = document.getElementById("dateModify");
    const dateAlert = document.getElementById('dateAlert'); 

    const updateHour = document.getElementById("hourModify");
    const hourAlert = document.getElementById('hourAlert');

    const updateAddress = document.getElementById("addressModify");
    const addressAlert = document.getElementById('addressAlert');
    const updateDescription = document.getElementById("descriptionModify");
    const addEntrants = document.getElementById("addPlace");
   

    
  
      

    modifyButton.addEventListener("click", function() {
        // event.preventDefault();
        if(updateTitle.value.trim() !== "" && /^[a-zA-ZÀ-ÿ0-9\s\-_']{1,60}$/.test(updateTitle.value)){
            titleAlert.textContent = "ok"
            titleAlert.style.color = "green"
        } else {
            titleAlert.textContent = "Erreur: le titre est requis"
            titleAlert.style.color = "red"
        }
        if( /^([01]\d|2[0-3]):[0-5]\d$/.test(updateHour.value)) {
            hourAlert.textContent = "ok"
            hourAlert.style.color = "green"
        } else {
            hourAlert.textContent = "Erreur: l'heure doit être saisie au format hh:mm"
            hourAlert.style.color = "red"
        }
        if(updateAddress.value.trim() !== "" && /^[a-zA-ZÀ-ÿ0-9\s\-_']{1,60}$/.test(updateAddress.value)){
            addressAlert.textContent = "ok"
            addressAlert.style.color = "green"
        } else {
            addressAlert.textContent = "Erreur: l'adresse est requise"
            addressAlert.style.color = "red"
        }
        if(addEntrants){
            addEntrants.textContent = "ok"
            addEntrants.style.color = "green"
        } else {
            addEntrants.textContent = "Erreur: le nombre de place est requis"
            addEntrants.style.color = "red"
        }
        console.log("ok");
              
    });
  
  });


  


//   Supprimer un événement
document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll('.buttonCancelBooking');

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const idBooking = button.getAttribute("data-id");
            const titleEvent = button.getAttribute("data-title");

            // Sélectionne le bon formulaire de confirmation lié à ce bouton
            const cancellation = button.nextElementSibling;
            const questionBookingTitle = cancellation.querySelector(".questionBookingTitle");
            const yesButton = cancellation.querySelector(".buttonYes");

            questionBookingTitle.textContent = ` ${titleEvent} ?`;
            yesButton.setAttribute("value", idBooking);

            cancellation.style.display = "flex";
            cancellation.style.position = "fixed";
        });
    });

    document.querySelectorAll(".buttonNo").forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            button.closest(".cancellation").style.display = "none";
        });
    });
});
  
  