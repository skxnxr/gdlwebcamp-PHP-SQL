$(document).ready(function(){
    $('#guardar-registro').on('submit', function(e) {
        e.preventDefault();

        var datos = $(this).serializeArray();
        //console.log(datos);

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                console.log(data);
                var resultado = data;
                if(resultado.respuesta === 'exito'){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 2400,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    //     ,onClose: () => {
                    //         window.location.href = 'index.php';
                    //    }
                      })
                      Toast.fire({
                        icon: 'success',
                        title: 'Administrador guardado correctamente'
                      })       
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Usuario ya registrado'
                        // footer: '<a href>Why do I have this issue?</a>'
                      })
                };
            }
        })

    });

    //Eliminar un registro
    $('.borrar_registro').on('click', function (e) {
        e.preventDefault();        
        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');
        //console.log("ID: " + id);
         
        $.ajax({
            type: 'post',
            data: {
                'id': id,
                'registro': 'eliminar'
            },
            url: 'modelo-'+tipo+'.php',
            success:function(data) {
                console.log(data);
            }
        })
    })

    $('#login-admin').on('submit', function(e) {
        e.preventDefault();

        var datos = $(this).serializeArray();
        //console.log(datos);

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                console.log(data);
                var resultado = data;
                if(resultado.respuesta === 'exitoso'){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 2400,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        ,onClose: () => {
                            window.location.href = './admin.php';
                       }
                      })
                      Toast.fire({
                        icon: 'success',
                        title: 'Bienvenido ' +resultado.usuario+'!'
                      })       
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Usuario o contraseña incorrectos'
                        // footer: '<a href>Why do I have this issue?</a>'
                      })
                      //******* Para redirecionar*************
                    //   setTimeout(function() {
                    //         window.location.href = './admin.php'; 
                    //   });

                };
            }
        })

    });


});