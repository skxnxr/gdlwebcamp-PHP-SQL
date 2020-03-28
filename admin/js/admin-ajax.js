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
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Un registro eliminado no se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, ¡Eliminar!',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
                $.ajax({
                    type: 'post',
                    data: {
                        'id': id,
                        'registro': 'eliminar'
                    },
                    url: 'modelo-'+tipo+'.php',
                    success:function(data) {
                        //console.log(data);
                        var resultado = JSON.parse(data);
                        //console.log(resultado);
                        if (resultado.respuesta == 'exito') {
                            Swal.fire(
                                '¡Eliminado!',
                                'Administrador eliminado correctamente',
                                'success'
                              )
                            jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: '¡Error!',
                                text: 'No se pudo eliminar'
                              })
                        }
                        
                    }
                })
         })      
    })

    

});