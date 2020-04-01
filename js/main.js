(function() {
    "use strict";

    
    document.addEventListener('DOMContentLoaded', function(){

        /*
       //Código JS para el mapa 
       var map = L.map('mapa').setView([10.496262, -66.848937], 16);

       L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
           attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
       }).addTo(map);

       L.marker([10.496262, -66.848937]).addTo(map)
           .bindPopup('GDLWebCamp 2020<br> Boletos ya disponibles.')
           .openPopup();
           // .bindTooltip('Un Tooltip')
           // .openTooltip()
        */

        

    }); //DOM CONTENT LOADED
})();


$(function(){

    //Lettering
    $('.nombre-sitio').lettering();

    //Agregar clase a menú
    $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
    $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');

    //Menu fijo
    let windowHeight = $(window).height();
    let barraAltura = $('.barra').innerHeight();

    $(window).scroll(function() {
       let scroll = $(window).scrollTop();
       if (scroll > windowHeight) {
           $('.barra').addClass('fixed');
           $('body').css({'margin-top': barraAltura+'px'});
       }else{
            $('.barra').removeClass('fixed');
            $('body').css({'margin-top': '0px'});
       }
    });

    //Menú responsive
    $('.menu-movil').on('click', function() {
        $('.navegacion-principal').slideToggle();
    });

    //Programa de conferencias
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');

    $('.menu-programa a').on('click', function() {
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();

       let enlace =  $(this).attr('href');
       $(enlace).fadeIn(1000);
       return false;
    });
    
    //Animaciones para los números
    let resumenLista = jQuery('.resumen-evento');
    if (resumenLista.length > 0) {
        $('.resumen-evento').waypoint(function(){
            $('.resumen-evento li:nth-child(1) p').animateNumber({number: 6}, 1200);
            $('.resumen-evento li:nth-child(2) p').animateNumber({number: 15}, 1200);
            $('.resumen-evento li:nth-child(3) p').animateNumber({number: 3}, 1400);
            $('.resumen-evento li:nth-child(4) p').animateNumber({number: 9}, 1500);

        }, {
            offset: '60%'
        });
    }

    
    //Cuenta regresiva
    $('.cuenta-regresiva').countdown('2020/05/01 09:00:00', function(event) {
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

    //Colobox
    $('.invitado-info').colorbox({inline:true, width:"50%"});
    $('.boton_newsletter').colorbox({inline:true, width:"50%"});


});