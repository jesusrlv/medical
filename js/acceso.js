function _(el){
    return document.getElementById(el);
}
function acceso(){
    let usr = _("usr").value;
    let pwd = _("pwd").value;

    if(usr == "" || pwd == ""){
        alert("Por favor, complete todos los campos");
        return false;

    }else{
        $.ajax({
            url: "prcd/prcd_validacion.php",
            method: "POST",
            data: {
                usr: usr,
                pwd: pwd
            },
            dataType: "json",
            success: function(data){
                let datos = JSON.parse(JSON.stringify(data));
                let success = datos.success;

                if(success == 1){
                    Swal.fire({
                        icon: 'success',
                        imageUrl: 'css/assets/brand/dental.png',
                        imageHeight: 200,
                        title: 'Usuario correcto',
                        text: 'Credenciales correctas',
                        confirmButtonColor: '#3085d6',
                        footer: 'MediDent App',
                    }).then((result) => {
                        if(result.isConfirmed){
                            window.location.href = "dashboard.php";
                        }
                    });
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        imageUrl: 'css/assets/brand/dental.png',
                        imageHeight: 200,
                        title: 'Usuario incorrecto',
                        text: 'Credenciales incorrectas',
                        confirmButtonColor: '#3085d6',
                        footer: 'MediDent App',
                    });
                }
            }
        });
        
    }
}