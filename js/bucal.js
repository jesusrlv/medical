function _(el){
    return document.getElementById(el);
}

// datos generales
function datosGenerales(){
    let id = _('user').value;
    $.ajax({
      type: "POST",
      data: { id: id },
      url: "query/query_datos_generales.php", // Cambia esto por la ruta de tu script PHP
      dataType: "JSON",
      success: function(data) {
        console.log('Respuesta JSON datos generales:', data);
        var nombre = data.nombre;
        // var edad = data.edad;
        // var sexo = data.sexo;
        // var fecha_registro = data.fecha_registro;

        _('nombrePaciente').innerHTML = nombre;
        // _('edadPaciente').innerHTML = edad + " años";
        // _('sexoPaciente').innerHTML = sexo;
        // _('fechaRegistro').innerHTML = fecha_registro;
      },
      error: function(xhr, status, error) {
          console.error('Error en AJAX:', error);
          console.log('Estado:', status);
          console.log('Respuesta del servidor:', xhr.responseText);
      }
  });

  }

// funciones para determinar el bucal

function datosGeneralesBucal(){
    let id = _('idPaciente').value;
    $.ajax({
      type: "POST",
      data: { id: id },
      url: "query/query_bucal.php", // Cambia esto por la ruta de tu script PHP
      dataType: "JSON",
      success: function(data) {
        // var jsonData = JSON.parse(data);
        var jsonData = JSON.parse(JSON.stringify(data));
        console.log('Respuesta JSON:', jsonData);
        // var total_espacios = jsonData.total_espacios;
        // console.log('Totalespacios:', total_espacios);

        debugger;

        if (Array.isArray(jsonData)) {
          console.log('Número de elementos en el array:', jsonData.length);
          var espacios, espaciosTotal, porcentaje;
      
          let espaciosTotal2 = 0; // Inicializamos la variable

          for (var i = 0; i < jsonData.length; i++) {
              var municipios2 = jsonData[i];
              let espacios2; // Variable para almacenar los espacios actuales del municipio

              if (municipios2.cantidad_espacios_intervenidos == null) {
                  espacios2 = 0;
              } else {
                espacios2 = parseInt(municipios2.cantidad_espacios_intervenidos, 10); // Usar parseFloat si hay decimales    
              }

              // Sumar al total
              espaciosTotal2 = espaciosTotal2 + espacios2; // Suma correctamente
          }

          console.log('El total de espacios intervenidos es:', espaciosTotal2);

          for (var i = 0; i < jsonData.length; i++) {
            var municipios = jsonData[i];

            // porcentajes
            var porcentaje = 0;

            var mun = municipios.municipio; // El id del elemento
            if (municipios.cantidad_espacios_intervenidos == null){
              espacios = 0;
              
            }
            else{
              espacios = municipios.cantidad_espacios_intervenidos; // Otra información asociada
            }
            
            console.log('Municipio:', mun);
            console.log('Número de espacios:', espacios);
        
            // Busca el elemento en el DOM
            var elemento = document.getElementById(mun);

            porcentaje = (espacios * 100)/(espaciosTotal2);
            console.log(porcentaje); 
        
            // Verifica si el elemento existe antes de modificarlo
            if (elemento) {
                // Cambia el color según la condición
                if (espacios > 0 ) {
                    elemento.style.fill = "#99e7ff"; // Color para más de 0 espacios
                    elemento.style.stroke = "#004f67"; // Color para más de 0 espacios
                } else {
                    elemento.style.fill = "#004f67"; // Color para 0 espacios
                    elemento.style.stroke = "#99e7ff"; // Color para 0 espacios
                }
            } else {
                console.error(`Elemento con ID "${mun}" no encontrado en el DOM.`);
            }
        }
        
        } 
      },
      error: function(xhr, status, error) {
          console.error('Error en AJAX:', error);
          console.log('Estado:', status);
          console.log('Respuesta del servidor:', xhr.responseText);
      }
  });

  }

 function mostrarModalDiente(idDiente){
	// alert("Diente seleccionado: "+idDiente);
	$('#modalDiente').modal('show');
    _('textDiente').innerHTML = idDiente;
    _('inputDiente').value = idDiente;
  }