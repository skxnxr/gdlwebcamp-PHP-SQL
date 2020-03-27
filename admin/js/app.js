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
})