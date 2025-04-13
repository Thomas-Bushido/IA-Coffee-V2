document.addEventListener("DOMContentLoaded", function () {
    const cancelButtons = document.querySelectorAll('.buttonCancelBooking');
  
    cancelButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const idEvent = button.value;
        const titleEvent = button.dataset.title;
  
        // On remonte au parent .card__booking pour trouver la bonne modale
        const card = button.closest(".card__bookingAdmin");
        const cancellation = card.querySelector(".cancellation");
        const questionBookingTitle = cancellation.querySelector(".questionBookingTitle");
        const yesButton = cancellation.querySelector(".buttonYes");
        const noButton = cancellation.querySelector(".buttonNo");
  
        // Met à jour le titre
        questionBookingTitle.textContent = titleEvent;
  
        // Affiche uniquement la bonne modale
        cancellation.style.display = "flex";
        cancellation.style.position = "fixed";
  
        // Met à jour le bouton "Oui" avec le bon ID
        yesButton.setAttribute("value", idEvent);
  
        // Ajoute le comportement du bouton "Non"
        noButton.addEventListener("click", function (event) {
          event.preventDefault();
          cancellation.style.display = "none";
        });
      });
    });
  });