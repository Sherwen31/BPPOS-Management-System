import "./bootstrap";

document.addEventListener("livewire:navigated", () => {
    document
        .getElementById("toggle-button")
        .addEventListener("click", function () {
            document.querySelector(".sidebarMod").classList.toggle("collapsed");
        });
});

document.getElementById("toggle-button").addEventListener("click", function () {
    document.querySelector(".sidebarModed").classList.toggle("collapsed");
});
