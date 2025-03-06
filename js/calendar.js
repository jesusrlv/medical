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

    // Agregar fecha a inputs
    document.getElementById("annio").value = año;
    document.getElementById("mes").value = mes;

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
                    <a href="javascript:void(0);" style="text-decoration: none" onclick="abrirModalActividades('${fechaFormateada}')">
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

function cambiarMes() {
    let annio = parseInt(document.getElementById("annio").value);
    let mes1 = parseInt(document.getElementById("mes").value);
    console.log(annio, mes1);
    const contenedorCalendario = document.getElementById("contenedorCalendario");
    const fechaActual = new Date();
    const año = annio;
    const mes = mes1; // Mes actual (0 = enero, 11 = diciembre)

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
                    <a href="javascript:void(0);" style="text-decoration: none" onclick="abrirModalActividades('${fechaFormateada}')">
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
// generarCalendario();

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
                const actividad = data.find(act => parseInt(act.hora) == parseInt(hora)); // Normalizar formato de la hora
                console.log("Actividad en", hora, ":", actividad);
            
                // Crear el elemento de la actividad
                const item = document.createElement("div");
                item.classList.add("list-group-item");

                if (actividad) {
                    // Si hay una actividad en esta hora
                    item.classList.add(actividad.concretada ? "actividad-concretada" : "actividad-no-concretada");
                    item.innerHTML = `
                        <strong>
                        <span class="badge bg-dark text-info">${hora}</span>
                        </strong> | ${actividad.paciente} | ${actividad.descripcion}
                        <a href="javascript:void(0);" onclick="cambiarEstatus(${actividad.id}, ${actividad.concretada ? 0 : 1})">
                        <span class="badge rounded-pill bg-warning text-dark">Cambiar estatus</span>
                        </a>
                    `;
                } else {
                    // Si no hay actividad en esta hora
                    item.innerHTML = `
                         <strong>
                        <span class="badge bg-dark text-info">${hora}</span>
                        </strong> 
                        | Sin actividades programadas.
                        <a href="javascript:void(0);" onclick="agregarAgenda(${hora})">
                        <span class="badge rounded-pill bg-primary text-light">Agregar Agenda</span>
                        </a>
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
    document.getElementById("fechaActD").textContent = fecha;

}

function generarHorario(inicio, fin) {
    let horario = [];
    for (let i = inicio; i <= fin; i++) {
        horario.push(i); // Solo números enteros
    }
    return horario;
}

function agregarAgenda(hora){
    let fecha = document.getElementById("fechaActD").textContent;
    $("#modalActividades").modal("hide");

    $("#nuevaActividad").modal("show");

    document.getElementById("fechaNuevaActD").innerText = fecha;
    document.getElementById("horaNuevaActD").innerText = hora;

    queryPacientesSelect();
    queryDiagnosticoSelect();

}

function queryPacientesSelect(){
    $.ajax({
        url: "query/query_pacientes.php", // Archivo PHP que obtiene los datos
        method: "POST", //
        dataType: "HTML", //
        success: function (data) {
            $("#pacientesSelect").html(data);
        }
    });
}

function queryDiagnosticoSelect(){
    $.ajax({
        url: "query/query_diagnostico.php", // Archivo PHP que obtiene los datos
        method: "POST", //
        dataType: "HTML", //
        success: function (data) {
            $("#diagnosticoSelect").html(data);
        }
    });
}

function guardarAgenda(){
    let fecha = document.getElementById("fechaNuevaActD").innerText;
    let hora = document.getElementById("horaNuevaActD").innerText;
    let paciente = document.getElementById("pacientesSelect").value;
    let diagnostico = document.getElementById("diagnosticoSelect").value;
    let observaciones = document.getElementById("observaciones").value

    $.ajax({
        url: "prcd/prcd_agregar_cita.php", // Archivo PHP que guarda la agenda
        method: "POST", //
        data: { 
            fecha: fecha, 
            hora: hora, 
            paciente: paciente, 
            diagnostico: diagnostico,
            observaciones: observaciones
        }, //
        dataType: "JSON", //
        success: function (data) {
            let datos = JSON.parse(JSON.stringify(data));
            let success = datos.success;

            if(success == 1){
                Swal.fire({
                    icon: 'success',
                    title: 'Cita agendada correctamente',
                    confirmButtonColor: '#3085d6',
                    footer: 'MediDent App',
                }).then((result) => {
                    if(result.isConfirmed){
                        $("#nuevaActividad").modal("hide");
                        abrirModalActividades(fecha);
                        cambiarMes();
                    }
                });
            }
            else{
                console.log(datos.error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error al agendar la cita',
                    confirmButtonColor: '#3085d6',
                    footer: 'MediDent App',
                });
            }

        }
    });
}

function cambiarEstatus(id, estatus){
    let confirmacion = confirm("¿Está seguro de cambiar el estatus de la cita?");
    if(confirmacion){
        $.ajax({
            url: "prcd/prcd_cambiar_estatus_cita.php", // Archivo PHP que cambia el estatus de la cita
            method: "POST", //
            data: { 
                id: id,
                estatus: estatus
             }, //
            dataType: "JSON", //
            success: function (data) {
                let datos = JSON.parse(JSON.stringify(data));
                let success = datos.success;

                if(success == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'Estatus cambiado correctamente',
                        confirmButtonColor: '#3085d6',
                        footer: 'MediDent App',
                    }).then((result) => {
                        if(result.isConfirmed){
                            $("#modalActividades").modal("hide");
                            abrirModalActividades(document.getElementById("fechaActD").textContent);
                            cambiarMes();
                        }
                    });
                }
                else{
                    console.log(datos.error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al cambiar el estatus de la cita',
                        confirmButtonColor: '#3085d6',
                        footer: 'MediDent App',
                    });
                }

            }
        });
    }
}