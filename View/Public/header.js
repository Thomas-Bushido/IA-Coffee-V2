document.addEventListener("DOMContentLoaded", function () {
    const container4 = document.querySelector(".container4");
    const searchInput = document.getElementById("searchInput");
    const items = document.querySelectorAll(".searchItem");

    // Affiche la liste quand on clique dans l'input
    searchInput.addEventListener("focus", function () {
        container4.style.display = "flex";
        container4.style.flexDirection = "column";
    });

    // Filtre la liste
    searchInput.addEventListener("input", function () {
        const searchValue = searchInput.value.toLowerCase();
        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            item.style.display = text.includes(searchValue) ? "block" : "none";
        });
    });

    // Clic en dehors => cacher le container
    document.addEventListener("click", function (e) {
        // Vérifie si le clic est EN DEHORS du container ET de l'input
        if (
            !container4.contains(e.target) &&
            !searchInput.contains(e.target)
        ) {
            container4.style.display = "none";
        }
    });
});
