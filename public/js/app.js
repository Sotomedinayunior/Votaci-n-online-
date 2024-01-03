document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll(".Button-submit");
    const modal = document.getElementById("myModal");
    const modalTitle = modal.querySelector(".modal-title");
    const modalDescription = modal.querySelector(".modal-description");
    const modalImage = modal.querySelector(".modal-image");
    const checkbox = modal.querySelector("#checkbox");
    const input = modal.querySelector("#input");

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            const nombre = button.getAttribute("data-nombre");
            const descripcion = button.getAttribute("data-descripcion");
            const imagen = button.getAttribute("data-imagen");

            modalTitle.textContent = nombre;
            modalDescription.textContent = descripcion;
            modalImage.src = imagen;
            checkbox.checked = false; // Desmarcar el checkbox
            input.style.display = "none"; // Ocultar el input

            modal.style.display = "flex"; // Mostrar el modal
        });
    });

    modal.addEventListener("click", event => {
        if (event.target === modal) {
            modal.style.display = "none"; // Ocultar el modal
        }
    });

    checkbox.addEventListener("change", () => {
        input.style.display = checkbox.checked ? "block" : "none";
    });

    const cards = document.querySelectorAll(".card");

    let minVotes = Number.POSITIVE_INFINITY;

    cards.forEach(function(card) {
        const progressBar = card.querySelector(".progress-bar");
        const votosSpan = card.querySelector("#Votos");

        let currentValue = 0;
        const targetValue = Math.floor(Math.random() * 101);

        if (targetValue < minVotes) {
            minVotes = targetValue;
        }

        const interval = setInterval(function() {
            currentValue++;
            progressBar.style.width = currentValue + "%";
            votosSpan.textContent = currentValue + "%";

            if (currentValue >= targetValue) {
                clearInterval(interval);

                if (targetValue === minVotes) {
                    progressBar.classList.add("bg-danger");
                }
            }
        }, 20);
    });
});
