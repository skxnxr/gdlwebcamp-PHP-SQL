$(document).ready(function(){
    $('#crear-admin').on('submit', function(e) {
        e.preventDefault();

        var datos = $(this).serializeArray();
        //console.log(datos);

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                //console.log(data);
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
                        title: 'Administrador creado correctamente'
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
});