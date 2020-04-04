$(document).ready(function () {

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