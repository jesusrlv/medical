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