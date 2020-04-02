$(document).ready(function () {
    $('.sidebar-menu').tree()

    

    $('#registros').DataTable({
      'paging'      : true,
      'pageLenght'  : 3,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'language' : {
        paginate : {
          next: 'Siguiente',
          previous: 'Anterior',
          last: 'Último',
          first: 'Primero'
        },
        info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
        emptyTable: 'No hay registros',
        infoEmpty: '0 registros',
        search: 'Buscar'
      }

  });

  $('#crear_registro_admin').attr('disabled', true);

  $('#repetir_password').on('input', function(){
    //blur para validar al final, input para validar al momento
    var password_nuevo = $('#password').val();

    if ($(this).val() == password_nuevo) {
      $('#resultado_password').text('Correcto');
      $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
      $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
      $('#crear_registro_admin').attr('disabled', false);
    }else{
      $('#resultado_password').text('No son iguales');
      $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
      $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
    }

  })

 //Date picker
  $('#fecha').datepicker({
    autoclose: true
  })

  //Initialize Select2 Elements
  $('.select2').select2()

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false,
    timeFormat: 'HH:mm'
  });
  
  //Iconpicker
  // Create instance if not exists (returns a jQuery object)
$('#icono').iconpicker();

//iCheck
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })


      // LINE CHART
      $.getJSON('servicio-registrados.php', function(data){
        console.log(data);
            var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: data,
            xLabelFormat: function (d) {
              var weekdays = new Array(7);
              weekdays[0] = "Dom";
              weekdays[1] = "Lun";
              weekdays[2] = "Mar";
              weekdays[3] = "Mié";
              weekdays[4] = "Jue";
              weekdays[5] = "Vie";
              weekdays[6] = "Sáb";
          
              return weekdays[d.getDay()] + ' ' + 
              ("0" + (d.getDate() )).slice(-2) + '-' + 
              ("0" + (d.getMonth() + 1 )).slice(-2);
            
            },
            xkey: 'fecha',
            ykeys: ['cantidad'],
            xLabelAngle: 45,
            //xLabels: 'day',
            labels: ['Personas registradas'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
          });
          // function update() {
          //   nReloads++;
          //   graph.setData(data(5 * nReloads));
          //   $('#reloadStatus').text(nReloads + ' reloads');
          // }
          // setInterval(update, 100);
      });







})