(function() {
    "use strict";
    var regalo = document.getElementById('regalo');
    document.addEventListener('DOMcontentLoaded', function() {

        var map = L.map('mapa').setView([51.505, -0.09], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([51.5, -0.09]).addTo(map)
            .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
            .openPopup();



        //campos datos usuario
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');
        //campos pases
        var pase_dia = document.getElementById('pase_dia');
        var pase_dosdias = document.getElementById('pase_dosdias');
        var pase_completo = document.getElementById('pase_completo');

        //botones y divs
        var calcular = document.getElementById('calcular');
        var errordiv = document.getElementById('error');
        var botonRegistro = document.getElementById('btnRegistro');
        var lista_productos = document.getElementById('lista-productos');

        // Extras
        var camisas = document.getElementById('camisa_evento');
        var etiquetas = document.getElementById('etiquetas');


        botonRegistro.disabled = true;

        if (document.getElementById('calcular')) {



            calcular.addEventListener('click', calcularMontos);

            pase_dia.addEventListener('blur', mostrarDias);
            pase_dosdias.addEventListener('blur', mostrarDias);
            pase_completo.addEventListener('blur', mostrarDias);

            nombre.addEventListener('blur', validarCampos);
            apellido.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarMail);

            function validarCampos() {
                if (this.value == '') {
                    errordiv.style.display = "block";
                    errordiv.innerHTML = "este campo es obligatorio";
                    this.style.border = '1px solid red';
                    errordiv.style.border = '1px solid red';
                } else {
                    errordiv.style.display = "none";
                    this.style.border = '1px solid #ccccccc';

                }
            }

            function validarMail() {
                if (this.value.indexOf("@") > -1) {
                    errordiv.style.display = "none";
                    this.style.border = '1px solid #ccccccc';
                } else {
                    errordiv.style.display = "block";
                    errordiv.innerHTML = "debe tener al menos un @";
                    this.style.border = '1px solid red';
                    errordiv.style.border = '1px solid red';
                }
            }

            function calcularMontos(event) {
                event.preventDefault();
                if (regalo.value === '') {
                    alert("debes elegir un regalo");
                    regalo.focus();

                } else {
                    var boletosDia = parseInt(pase_dia.value, 10) || 0,
                        boletosDosDias = parseInt(pase_dosdias.value, 10) || 0,
                        boletoCompleto = parseInt(pase_completo.value, 10) || 0,
                        cantCamisas = parseInt(camisas.value, 10) || 0,
                        cantEtiquetas = parseInt(etiquetas.value, 10) || 0;



                    console.log("Boletos Dias: " + boletosDia);
                    console.log("Boletos Dos Dias: " + boletosDosDias);
                    console.log("Boleto Completo: " + boletoCompleto);

                    var totalPagar = (boletosDia * 30) + (boletosDosDias * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) * 93);

                    var listadoProductos = [];

                    if (boletosDia >= 1) {
                        listadoProductos.push(boletosDia + 'Pases por dia');
                    }
                    if (boletosDosDias >= 1) {
                        listadoProductos.push(boletosDosDias + 'Pases por dos dias');
                    }
                    if (boletoCompleto >= 1) {
                        listadoProductos.push(boletoCompleto + 'Pases completo');
                    }
                    if (cantCamisas >= 1) {
                        listadoProductos.push(boletoCompleto + 'camisas');
                    }
                    if (cantEtiquetas >= 1) {
                        listadoProductos.push(boletoCompleto + 'etiquetas');
                    }


                    lista_productos.style.display = "block";
                    lista_productos.innerHTML = '';
                    for (var i = 0; i < listadoProductos.length; i++) {
                        lista_productos.innerHTML += listadoProductos[i] + '<br/>';

                    }
                    suma.innerHTML = "$" + totalPagar.toFixed(2);

                    botonRegistro.disabled = false;
                    document.getElementById('total_pedido').value = totalPagar;



                }
            }



            function mostrarDias() {
                var boletosDia = parseInt(pase_dia.value, 10) || 0,
                    boletosDosDias = parseInt(pase_dosdias.value, 10) || 0,
                    boletoCompleto = parseInt(pase_completo.value, 10) || 0,



                    if (boletosDia > 0) {
                        diasElegidos.push('viernes');
                    }
                if (boletosDosDias > 0) {
                    diasElegidos.push('viernes', 'sabado');
                }
                if (boletoCompleto > 0) {
                    diasElegidos.push('viernes', 'sabado', 'domingo');
                }
            }
        }
    });

})();


$(function() {
    //lettering
    $('.nombre-sotio').lettering;

    //menu
    var windowheight = $(window).height();
    var barraAltura = $('.barra').innerHeight();

    console.log(windowheight);
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll > windowheight) {
            $('.barra').addClass('fixed');
            $('body').css({ 'margin-top': barraAltura + 'px' });
        } else {
            $('.barra').addClass('fixed');
            $('body').css({ 'margin-top': '0px' });
        }
    });

    //menu responsive

    $('.menu-movil').on('click', function() {

        $('.navegacion-principal').slideToggle();
    });

    //programa de conferencias
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');

    $('.menu-programa a').on('click', function() {
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('ocultar').hide(1);
        var enlace = $(this).attribution('href');
        $(enlace).fadeIn(1000);
    });

    //animaciones para los numeros
    $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 }, 1200);
    $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 6 }, 1200);
    $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 }, 600);
    $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 }, 1500);
    //cue(nta regresiva

    $('cuenta-regresiva').countdown('2020/12/10 09:00:00', function(event) {

        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%D'));
    });

    //colorbox 
    $('.invitado-info').colorbox({ inline: true, width: "50%" });
});