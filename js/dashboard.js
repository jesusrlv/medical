function dateMini(){
    $("#exampleModalCita").modal("show");
    // Obtener los elementos input
  const inputFechaActual = document.getElementById('dateAgendaMini');
  // Obtener la fecha actual
  const fechaActual = new Date();

  // Función para formatear la fecha en YYYY-MM-DD
  function formatearFecha(fecha) {
      const año = fecha.getFullYear();
      const mes = String(fecha.getMonth() + 1).padStart(2, '0'); // Meses van de 0 a 11
      const dia = String(fecha.getDate()).padStart(2, '0');
      return `${año}-${mes}-${dia}`;
  }

  // Formatear las fechas
  const fechaActualFormateada = formatearFecha(fechaActual);

  // Asignar las fechas a los inputs
  inputFechaActual.innerText = fechaActualFormateada;
  cargarAgendaMini();
}

function cargarAgendaMini() {
    $.ajax({
        url: "query/query_tablaMini.php",
        method: "POST",
        dataType: "HTML",
        success: function(data){
            $("#tablaMini").html(data);
        }
    });
}

function cargarTipoSangre() {
    $.ajax({
        url: "query/query_tipoSangre.php",
        method: "POST",
        dataType: "HTML",
        success: function(data){
            $("#tiposangre_paciente").html(data);
        }
    });
}

cargarTipoSangre();

$(document).ready(function() {
    // Cuando se envíe el formulario
    $('#agregarPaciente').on('submit', function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe de la manera tradicional

        // Serializar los datos del formulario
        var formData = $(this).serialize();

        // Enviar los datos mediante AJAX
        $.ajax({
            url: 'prcd/prcd_agregar_paciente.php', // La URL a la que se enviarán los datos
            type: 'POST', // El método de envío
            data: formData, // Los datos del formulario serializados
            success: function(data) {
                // Manejar la respuesta del servidor
                console.log(data);
                let datos = JSON.parse(JSON.stringify(data));
                let success = datos.success;
    
                if(success = 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'Paciente agregado correctamente',
                        confirmButtonColor: '#3085d6',
                        footer: 'MediDent App',
                    }).then((result) => {
                        if(result.isConfirmed){
                            $("#exampleModalPaciente").modal("hide");
                            document.getElementById('agregarPaciente').reset();
                        }
                    });
                }
                else{
                    console.log(datos.error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al agregar el paciente',
                        confirmButtonColor: '#3085d6',
                        footer: 'MediDent App',
                    });
                }
            },
            error: function(xhr, status, error) {
                // Manejar errores
                console.error(xhr.responseText);
                alert('Hubo un error al guardar el paciente');
            }
        });
    });
});

function agendarCitasGuardar() {
    $.ajax({
        url: "prcd/prcd_agregar_cita.php",
        method: "POST",
        data: $("#formAgendarCitas").serialize(),
        dataType: "json",
        success: function(data){
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
                        $("#agendarCitas").modal("hide");
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

            cargarAgendaMini();
        }
    });
}