(function() {
       
    document.addEventListener('DOMContentLoaded', function(){

        
       //Código JS para el mapa 
       //var map = L.map('mapa').setView([10.496262, -66.848937], 16);
       var map = L.map('mapa', {
        center:[10.496262, -66.848937],
        tap: false,
        // minZoom:16,
        // maxZoom: 16,
        scrollWheelZoom: false,
        //dragging: false,
        touchZoom: 'center',
        dragging: false,
        zoom: 16
    });

       L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
           attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
       }).addTo(map);

       L.marker([10.496262, -66.848937]).addTo(map)
           .bindPopup('GDLWebCamp 2020<br> Boletos ya disponibles.')
           .openPopup();
           // .bindTooltip('Un Tooltip')
           // .openTooltip()
        
        

         
        

    }); //DOM CONTENT LOADED
})();