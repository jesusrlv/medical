function pacientes(){
    $.ajax({
        url: "query/query_pacientes2.php", // Archivo PHP que obtiene los datos
        method: "POST", //
        dataType: "HTML", //
        success: function (data) {
            $("#pacientes2").html(data);
        }
    });
}