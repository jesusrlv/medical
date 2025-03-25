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