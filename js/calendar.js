function generarCalendario() {
    const contenedorCalendario = document.getElementById("contenedorCalendario");
    const fechaActual = new Date();
    const año = fechaActual.getFullYear();
    const mes = fechaActual.getMonth(); // Mes actual (0 = enero, 11 = diciembre)

    // Obtener el primer día del mes
    const primerDiaMes = new Date(año, mes, 1);
    const diaSemanaInicio = primerDiaMes.getDay(); // Día de la semana (0 = domingo, 6 = sábado)

    // Obtener el último día del mes
    const ultimoDiaMes = new Date(año, mes + 1, 0).getDate();

    // Limpiar el contenedor del calendario
    contenedorCalendario.innerHTML = "";

    // Crear espacios vacíos para los días que no corresponden al mes
    for (let i = 0; i < diaSemanaInicio; i++) {
        const espacioVacio = document.createElement("div");
        espacioVacio.classList.add("card", "border-0", "bg-transparent");
        espacioVacio.innerHTML = `<div class="card-body"></div>`;
        contenedorCalendario.appendChild(espacioVacio);
    }

    // Generar las cards para cada día del mes
    for (let dia = 1; dia <= ultimoDiaMes; dia++) {
        const fecha = new Date(año, mes, dia);
        const nombreDia = fecha.toLocaleDateString("es-ES", { weekday: "long" }); // Obtener el nombre del día
        const card = document.createElement("div");
        card.classList.add("card", "border-info", "bg-dark", "text-light");
        card.innerHTML = `
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-circle-fill text-info"></i> ${dia}</h5>
                <hr>
                <p class="card-text small"><i class="bi bi-calendar-day-fill"></i> Día: ${nombreDia}</p>
                <p class="card-text small" style="margin-top:-18px"><i class="bi bi-journal-bookmark-fill"></i> Citas: 0</p>
                <hr>
                <p class="card-text small"><i class="bi bi-circle-fill text-primary"></i> Concretadas: 0</p>
                <p class="card-text small" style="margin-top:-18px"><i class="bi bi-circle-fill text-danger"></i> No Concretadas: 0</p>
                <p class="card-text small">
                    <a href="#" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-plus-circle"></i> Agregar
                    </a>
                </p>
            </div>
        `;
        contenedorCalendario.appendChild(card);
    }
}

// Llamar a la función para generar el calendario
generarCalendario();