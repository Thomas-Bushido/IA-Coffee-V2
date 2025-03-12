
// **************************************************************

// console.log(chronos)

if (chronos) {
  function getChrono() {
    const p1 = document.querySelector(".days");
    const p2 = document.querySelector(".hours");
    const p3 = document.querySelector(".minuts");
    const p4 = document.querySelector(".seconds");

// let dateEvents = [chronos[0]["Date"]];
// let hourEvents = [chronos[0]["Heure"]];



let conversionToNumber = [];

// Conversion des dates en nombre qu'on entre dans le tableau conversionToNumber
chronos.forEach((chrono) => conversionToNumber.push(chrono["Date"]+ ',' + chrono["Heure"]));
 


let numberTab = [];
conversionToNumber.forEach((element) => numberTab.push(new Date(element).getTime()));

let tabDate = [];
// console.log("tabDate: " + tabDate);
const now = new Date().getTime();
// console.log("now: " + now);

let minDate = 0;
 for (let i = 0; i < numberTab.length; i++) {
 

 if(numberTab[i]>now){
  tabDate.push(numberTab[i]); 
 

 }
  }
  //  console.log("tabDate: " + tabDate);

   minDate = Math.min(...tabDate);
const   distanceBase = minDate - now;


     if (distanceBase > 0) {
      const d = Math.floor(distanceBase / (1000 * 60 * 60 * 24));
      const h = Math.floor(
       (distanceBase % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
      );
       const m = Math.floor((distanceBase % (1000 * 60 * 60)) / (1000 * 60));
       const s = Math.floor((distanceBase % (1000 * 60)) / 1000);

       p1.innerHTML = `${d} jours`;
       p2.innerHTML = `${h} heures`;
       p3.innerHTML = `${m} minutes`;
       p4.innerHTML = `${s} secondes`;
     } else {
        // Compte à rebours terminé
       p1.innerHTML = `0 jours`;
      p2.innerHTML = `0 heures`;
      p3.innerHTML = `0 minutes`;
      p4.innerHTML = `0 secondes`;
     }
}

 // Mettre à jour le compte à rebours toutes les secondes
    getChrono();
   setInterval(getChrono, 1000);
} else {
  console.log("Aucun événement à venir.");
  }
