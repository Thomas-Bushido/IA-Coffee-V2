// Formulaire de création
console.log(bookings);
console.log(eventList);



document.addEventListener("DOMContentLoaded", function () {
    const addbutton = document.getElementById('addButton');
    const cancelButton = document.getElementById('cancelEventButton');
    const yesButton = document.getElementById('newEventButton');  
   
    const addEventDiv = document.querySelector(".addEventDiv");

    const addUser = document.getElementById("addUser");
    const userAlert = document.getElementById('userAlert'); 

    const addEvent = document.getElementById("addEvent");
    const eventAlert = document.getElementById('eventAlert'); 

    const checkBookingsAlert = document.getElementById("checkBookingsAlert");
      
  
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
        let userId = addUser.value.trim();
        let eventId = addEvent.value.trim();
        let exists = false;
    
        // Validation des champs
        if (userId !== "" && /^[a-zA-ZÀ-ÿ0-9\s\-_']{1,60}$/.test(userId)) {
            userAlert.textContent = "ok";
            userAlert.style.color = "green";
            userAlert.style.fontWeight = "bolder";
        } else {
            event.preventDefault();
            userAlert.textContent = "Erreur: l'ID de l'utilisateur est requis";
            userAlert.style.color = "red";
            userAlert.style.fontWeight = "bolder";
            return;
        }
    
        if (eventId) {
            eventAlert.textContent = "ok";
            eventAlert.style.color = "green";
            eventAlert.style.fontWeight = "bolder";
        } else {
            event.preventDefault();
            eventAlert.textContent = "Erreur: l'ID de l'événement est requis";
            eventAlert.style.color = "red";
            eventAlert.style.fontWeight = "bolder";
            return;
        }
    
        // 🔍 Vérification s'il existe déjà une réservation pour ce couple idUser/idEvent
        for (let booking of bookings) {
            if (
                String(booking.idUser) === userId &&
                String(booking.idEvent) === eventId
            ) {
                exists = true;
                break;
            }
        }
    
        if (exists) {
            event.preventDefault();
            checkBookingsAlert.textContent = "Cette réservation existe déjà pour cet utilisateur et cet événement.";
            checkBookingsAlert.style.color = "red";
            checkBookingsAlert.style.fontWeight = "bolder";
            return;
        }

        let matchedEvent = eventList.find(event => String(event.idEvent) === eventId);

        if (matchedEvent && matchedEvent.BookingNumber === matchedEvent.entrants) {
            event.preventDefault();
            checkBookingsAlert.textContent = "Événement complet : veuillez augmenter le nombre maximum de participants.";
            checkBookingsAlert.style.color = "red";
            checkBookingsAlert.style.fontWeight = "bolder";
            return;
        }
    
        console.log("ok"); // Ici tu peux soumettre ton formulaire si besoin
    });
    
  
  });
  