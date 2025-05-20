export default function afficheMenu() {
    document
        .getElementById("deconnecter")
        .addEventListener("click", function () {
            const menu = document.getElementById("menu-deroulant");
            menu.classList.toggle("invisible");
        });

    // Facultatif : clique en dehors pour fermer le menu
    document.addEventListener("click", function (event) {
        const menu = document.getElementById("menu-deroulant");
        const button = document.getElementById("deconnecter");
        if (!menu.contains(event.target) && !button.contains(event.target)) {
            menu.classList.add("invisible");
        }
    });
}

afficheMenu();
