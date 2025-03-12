document.addEventListener("DOMContentLoaded", function () {
    const cancelButtons = document.querySelectorAll('.buttonCancelBooking');
    
    const yesButton = document.querySelector(".buttonYes");
    const noButtons = document.querySelectorAll(".buttonNo"); // Sélectionne tous les boutons "Non"
  
    const cancellation = document.querySelector(".cancellation");
    
 
    
    cancelButtons.forEach((button) => {
      
  
      button.addEventListener("click", function() {
          const questionBookingTitle = document.querySelector(".questionBookingTitle")
          const idEvent = button.value;
          const titleEvent = button.dataset.title;
          questionBookingTitle.textContent = titleEvent;
          cancellation.style.display = "flex";
          cancellation.style.position = "fixed";
          yesButton.setAttribute("value", idEvent);


      })
  
  
    })
    noButtons.forEach((button) => {
      button.addEventListener("click", function (event) {
          event.preventDefault();
          cancellation.style.display = "none";
      });
  });
  
  });
  