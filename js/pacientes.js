function pacientes(){
    $.ajax({
        url: "query/query_pacientes2.php", // Archivo PHP que obtiene los datos
        method: "POST", //
        dataType: "html", //
        success: function (data) {
            $("#pacientes2").html(data);
        }
    });
}

pacientes();