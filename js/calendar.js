function generarCalendario2() {
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

    // Crear la fila de encabezados (días de la semana)
    const diasSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
    diasSemana.forEach(dia => {
        const cardHeader = document.createElement("div");
        cardHeader.classList.add("card", "border-info", "bg-info", "text-dark", "header-day");
        cardHeader.innerHTML = `
            <div class="card-body d-flex align-items-center justify-content-center">
                <h5 class="card-title m-0">${dia}</h5>
            </div>
        `;
        contenedorCalendario.appendChild(cardHeader);
    });

    // Crear espacios vacíos para los días que no corresponden al mes
    for (let i = 0; i < diaSemanaInicio; i++) {
        const espacioVacio = document.createElement("div");
        espacioVacio.classList.add("card", "border-secondary", "bg-dark", "text-light");
        espacioVacio.innerHTML = `
            <div class="card-body d-flex align-items-center justify-content-center">
                <h5 class="card-title text-center"><i class="bi bi-circle-fill text-info"></i></h5>
            </div>
        `;
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
                    <a href="#" style="text-decoration: none">
                        <i class="bi bi-plus-circle"></i> Agregar
                    </a>
                </p>
            </div>
        `;
        contenedorCalendario.appendChild(card);
    }

    // Crear espacios vacíos al final si es necesario
    const totalDias = diaSemanaInicio + ultimoDiaMes;
    const espaciosFinales = (7 - (totalDias % 7)) % 7; // Calcular espacios vacíos al final
    for (let i = 0; i < espaciosFinales; i++) {
        const espacioVacio = document.createElement("div");
        espacioVacio.classList.add("card", "border-secondary", "bg-dark", "text-light");
        espacioVacio.innerHTML = `
            <div class="card-body d-flex align-items-center justify-content-center">
                <h5 class="card-title text-center"><i class="bi bi-circle-fill text-info"></i></h5>
            </div>
        `;
        contenedorCalendario.appendChild(espacioVacio);
    }
}

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

    // Crear la fila de encabezados (días de la semana)
    const diasSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
    diasSemana.forEach(dia => {
        const cardHeader = document.createElement("div");
        cardHeader.classList.add("card", "border-info", "bg-dark", "text-light", "header-day");
        cardHeader.innerHTML = `
            <div class="card-body d-flex align-items-center justify-content-center">
                <h5 class="card-title m-0">${dia}</h5>
            </div>
        `;
        contenedorCalendario.appendChild(cardHeader);
    });

    // Crear espacios vacíos para los días que no corresponden al mes
    for (let i = 0; i < diaSemanaInicio; i++) {
        const espacioVacio = document.createElement("div");
        espacioVacio.classList.add("card", "border-secondary", "bg-dark", "text-light");
        espacioVacio.innerHTML = `
            <div class="card-body d-flex align-items-center justify-content-center">
                <h5 class="card-title text-center"><i class="bi bi-circle-fill text-info"></i></h5>
            </div>
        `;
        contenedorCalendario.appendChild(espacioVacio);
    }

    // Generar las cards para cada día del mes
    for (let dia = 1; dia <= ultimoDiaMes; dia++) {
        const fecha = new Date(año, mes, dia);
        const nombreDia = fecha.toLocaleDateString("es-ES", { weekday: "long" }); // Obtener el nombre del día
        const fechaFormateada = fecha.toISOString().split('T')[0]; // Formato YYYY-MM-DD
        
        // Verificar si es el día actual
        const esHoy = fecha.toDateString() === fechaActual.toDateString();

        const card = document.createElement("div");
        // card.classList.add("card", esHoy ? "bg-info": "border-info", "bg-dark", "text-light");
        card.classList.add("card", "cardActivo", "border-info", esHoy ? "bg-warning" : "bg-dark", "text-light");
        card.innerHTML = `
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-circle-fill text-info"></i> ${dia}</h5>
                <hr>
                <p class="card-text small"><i class="bi bi-calendar-day-fill"></i> Día: ${nombreDia}</p>
                <p class="card-text small" style="margin-top:-18px"><i class="bi bi-journal-bookmark-fill"></i> Citas: <span id="citas-${fechaFormateada}">0</span></p>
                <hr>
                <p class="card-text small"><i class="bi bi-circle-fill text-primary"></i> Concretadas: <span id="concretadas-${fechaFormateada}">0</span></p>
                <p class="card-text small" style="margin-top:-18px"><i class="bi bi-circle-fill text-danger"></i> No Concretadas: <span id="no-concretadas-${fechaFormateada}">0</span></p>
                <p class="card-text small">
                    <a href="#" style="text-decoration: none" onclick="abrirModalActividades('${fechaFormateada}')">
    <i class="bi bi-journal-check"></i> Ver
</a>
                </p>
            </div>
        `;
        contenedorCalendario.appendChild(card);
    }

    // Crear espacios vacíos al final si es necesario
    const totalDias = diaSemanaInicio + ultimoDiaMes;
    const espaciosFinales = (7 - (totalDias % 7)) % 7; // Calcular espacios vacíos al final
    for (let i = 0; i < espaciosFinales; i++) {
        const espacioVacio = document.createElement("div");
        espacioVacio.classList.add("card", "border-secondary", "bg-dark", "text-info");
        espacioVacio.innerHTML = `
            <div class="card-body d-flex align-items-center justify-content-center">
                <h5 class="card-title text-center"><i class="bi bi-circle-fill text-info"></i></h5>
            </div>
        `;
        contenedorCalendario.appendChild(espacioVacio);
    }

    // Hacer la llamada AJAX para obtener los datos de las citas
    $.ajax({
        url: "query/query_citas.php", // Archivo PHP que obtiene los datos
        method: "GET",
        dataType: "json",
        success: function (data) {
            // Mostrar los datos en las cards

            console.log(data);
            // Recorrer los datos y actualizar las cards
            for (const fecha in data) {
                const citas = data[fecha].total || 0;
                const concretadas = data[fecha].concretadas || 0;
                const noConcretadas = data[fecha].no_concretadas || 0;

                // Actualizar los valores en las cards
                $(`#citas-${fecha}`).text(citas);
                $(`#concretadas-${fecha}`).text(concretadas);
                $(`#no-concretadas-${fecha}`).text(noConcretadas);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error al obtener los datos de las citas:", error);
        }
    });

    // Agregar evento de clic para dispositivos móviles
    document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', function () {
        // Remover la clase 'active' de todas las cards
        document.querySelectorAll('.card').forEach(c => c.classList.remove('active'));
        
        // Agregar la clase 'active' a la card clickeada
        this.classList.add('active');
    });
});

}

// Llamar a la función para generar el calendario
generarCalendario();

// Función para abrir el modal y cargar las actividades
function abrirModalActividades(fecha) {
    console.log("Fecha recibida:", fecha); // Verificar la fecha recibida

    // Limpiar la lista de actividades
    const listaActividades = document.getElementById("lista-actividades");
    listaActividades.innerHTML = "";

    // Hacer la llamada AJAX para obtener las actividades del día
    $.ajax({
        url: "query/obtener_actividades.php", // Archivo PHP que obtiene las actividades
        method: "GET",
        data: { fecha: fecha }, // Enviar la fecha seleccionada
        dataType: "json",
        success: function (data) {
            console.log("Actividades recibidas:", data);

            // Crear el horario de 8:00 AM a 10:00 PM
            const horario = generarHorario(8, 22); // 8:00 AM a 10:00 PM

            // Recorrer el horario y agregar las actividades
            horario.forEach(hora => {
                const actividad = data.find(act => act.hora === hora); // Buscar actividad en esta hora

                // Crear el elemento de la actividad
                const item = document.createElement("div");
                item.classList.add("list-group-item");

                if (actividad) {
                    // Si hay una actividad en esta hora
                    item.classList.add(actividad.concretada ? "actividad-concretada" : "actividad-no-concretada");
                    item.innerHTML = `
                        <strong>${hora}</strong>: ${actividad.descripcion}
                    `;
                } else {
                    // Si no hay actividad en esta hora
                    item.innerHTML = `
                        <strong>${hora}</strong>: Sin actividades programadas.
                    `;
                }

                // Agregar la actividad a la lista
                listaActividades.appendChild(item);
            });
        },
        error: function (xhr, status, error) {
            console.error("Error al obtener las actividades:", error);
        }
    });

    // Mostrar el modal
    const modal = new bootstrap.Modal(document.getElementById('modalActividades'));
    modal.show();
}

// Función para generar el horario de 8:00 AM a 10:00 PM
function generarHorario(horaInicio, horaFin) {
    const horario = [];
    for (let hora = horaInicio; hora <= horaFin; hora++) {
        horario.push(`${hora < 10 ? '0' + hora : hora}:00`); // Formato HH:00
    }
    return horario;
}

// Ejemplo de cómo abrir el modal al hacer clic en un día
// document.querySelectorAll('.card').forEach(card => {
//     card.addEventListener('click', function () {
//         const fecha = this.querySelector('h5').textContent; // Obtener la fecha de la card
//         abrirModalActividades(fecha); // Abrir el modal con las actividades del día
//     });
// });