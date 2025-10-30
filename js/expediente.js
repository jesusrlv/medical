function _(el){
    return document.getElementById(el);
}

function expedienteInicial(){
    let id = _('idPaciente').value;

    $.ajax({
        url: "query/query_pacientes3.php", // Archivo PHP que obtiene los datos
        method: "POST", //
        data:{
            id:id
        },
        dataType: "json", //
        success: function (data) {
            let datos = JSON.parse(JSON.stringify(data));
            let success = datos.success;

            let nombre = datos.nombre;
            let apellido = datos.apellido;
            let peso = datos.peso;
            let sexo = datos.sexo;
            let alergia = datos.alergia;
            let estatura = datos.estatura;
            let tipoSangre = datos.tipoSangre;
            let nombreEmergencia = datos.nombreEmergencia;
            let telefonoEmergencia = datos.telefonoEmergencia;

            _('nombrePaciente').innerText = nombre+' '+apellido;
            _('pesoPaciente').innerText = peso;
            _('sexoPaciente').innerText = sexo;
            _('alergiaPaciente').innerText = alergia;
            _('estaturaPaciente').innerText = estatura;
            _('sangrePaciente').innerText = tipoSangre;
            _('nombreemergenciaPaciente').innerText = nombreEmergencia;
            _('telefonoemergenciaPaciente').innerText = telefonoEmergencia;


        }
    });
}

expedienteInicial();

function queryHistorial(){
    let idPaciente = _('idPaciente').value;
    $.ajax({
        url: "query/query_historial.php",
        method: "POST", //
        data:{
            idPaciente:idPaciente
        },
        dataType: "HTML", //
        success: function (data) {
            $("#tablaProcedimientos").html(data);
        }
    });
}

queryHistorial();

function queryDiagnosticoSelect(){
    $.ajax({
        url: "query/query_diagnostico.php",
        method: "POST", //
        dataType: "HTML", //
        success: function (data) {
            $("#diagnosticoExpediente").html(data);
            $("#diagnosticoExpedienteEditar").html(data);
        }
    });
}

queryDiagnosticoSelect();

function agregarHistorial(){
    let idPaciente = _('idPaciente').value;
    let diagnostico = _('diagnosticoExpediente').value;
    let fecha = new Date().toISOString().slice(0, 10);
    let procedimiento = _('procedimientoExpediente').value;

    $.ajax({
        url: "prcd/prcd_agregar_historial.php", 
        method: "POST",
        data:{
            idPaciente:idPaciente,
            diagnostico:diagnostico,
            fecha:fecha,
            procedimiento:procedimiento
        },
        dataType: "json",
        success: function (data) {
            let datos = JSON.parse(JSON.stringify(data));
            let success = datos.success;
            if(success == 1){
                Swal.fire({
                    icon: 'success',
                    title: 'Historial agregado correctamente',
                    confirmButtonColor: '#3085d6',
                    footer: 'MediDent App',
                }).then((result) => {
                    if(result.isConfirmed){
                        $("#agregarHistorial").modal("hide");
                        // aquí va el function de la tabla de historial
                        queryHistorial();
                    }
                });
            }
            else{
                console.log(datos.error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error al agregar el historial',
                    confirmButtonColor: '#3085d6',
                    footer: 'MediDent App',
                });
            }
        },
        error: function(xhr, status, error) {
            // Manejar errores
            console.error(xhr.responseText);
            alert('Hubo un error al guardar el historial');
        }
    });
}

function modalEditarExpediente(id){
    $('#editarExpedienteModal').modal('show');
    $.ajax({
        url: "query/query_editar_expediente.php",
        method: "POST",
        data:{
            id:id
        },
        dataType: "JSON",
        success: function (data) {
            let success = data.success;
            if(success == 1){
                _('idExpedienteEditar').value = data.id;
                // _('fecha').value = data.diagnostico;
                _('diagnosticoExpedienteEditar').value = data.diagnostico;
                _('procedimientoExpedienteEditar').value = data.descripcion;
            }
            else{
                alert("Error al cargar el expediente");
            }
        }
    });
}

function editarExpediente(id){
    $ajax({
        url: "query/query_editar_expediente.php",
        method: "POST",
        data:{
            id:id
        },
        dataType: "json",
        success: function (data) {
            let success = data.success;
            if(success == 1){
                alert("Expediente editado correctamente");
                queryHistorial();
            }
            else{
                alert("Error al editar el expediente");
            }
        }
    });
}

function eliminarExpediente(id){
    $.ajax({
        url: "prcd/prcd_eliminar_expediente.php",
        method: "POST",
        data:{
            id:id
        },
        dataType: "json",
        success: function (data) {
            let success = data.success;
            if(success == 1){
                alert("Expediente eliminado correctamente");
                queryHistorial();
            }
            else{
                alert("Error al eliminar el expediente");
            }
        }
    });
}   