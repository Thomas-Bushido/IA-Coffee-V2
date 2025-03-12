document.addEventListener("DOMContentLoaded", function () {
  const bookbuttons = document.querySelectorAll('.buttonBooking2');
  const noButtons = document.querySelectorAll(".buttonNo");
  const yesButton = document.querySelector(".buttonYes");
  

  const confirmation = document.querySelector(".confirmation");
  
  ;
  const questionBooking = document.querySelector(".questionBooking");
  bookbuttons.forEach((button) => {
    

    button.addEventListener("click", function() {
        const questionBookingTitle = document.querySelector(".questionBookingTitle")
        const idEvent = button.value;
        const titleEvent = button.dataset.title;
        questionBooking.textContent = "Confirmez-vous cette réservation:";
        questionBookingTitle.textContent = titleEvent;
        confirmation.style.display = "flex";
        confirmation.style.position = "fixed";
        yesButton.setAttribute("value", idEvent);
    })
    

  })

  document.querySelector(".buttonNo").addEventListener("click", function(event) {
    confirmation.style.display = "none";
    event.preventDefault();
  });

  // yesButton.forEach((button) => {
  //   button.addEventListener("click", function() {
  //       // Cacher la boîte de confirmation associée
  //       // event.preventDefault();
  //       questionBooking.textContent = "Merci !";
  //       questionBookingTitle.textContent = "La réservation est en cours de traitement...";
        
  //       // Cacher les boutons Oui/Non
  //       button.closest(".answerContainer").style.display = "none";
        
        
  //   });



});


  









