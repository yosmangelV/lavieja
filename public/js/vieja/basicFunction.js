$(document).ready(function() {

    /*
    $("#btnCheckCommet").click(function(evt) {
        evt.preventDefault();
        $body = $("body");
        $(document).on({
            ajaxStart: function() {
                $body.addClass("loading");
            },
            ajaxStop: function() {
                $body.removeClass("loading");
            }
        });
        checkCommetApi();
        //alert("mensaje");
    });

   //$("#formRegister").on('submit', function(evt){
       // evt.preventDefault();
    $("#btnRegistrar").click(function() {
        $body = $("body");
        $(document).on({
            ajaxStart: function() {
                $body.addClass("loading");
            },
            ajaxStop: function() {
                $body.removeClass("loading");
            }
        });
        $("#success-mensaje").addClass("ocultar-mensaje-error");
        var datosobligatorios = verificarDatosObligatorios();
        var tipoUsuario = document.formRegister.tipoUsuario.value;
        var booleano = true;
        if (tipoUsuario == 1) {
            booleano = verificarCNA();
        } else if (tipoUsuario == 2) {
            booleano = true;
        } else if (tipoUsuario == 3) {
            booleano = verificarArbitro();
        } else if (tipoUsuario == 4) {
            booleano = verificarAsesor();
        }else if (tipoUsuario == 5) {
            booleano = verificaPreparador();
        } else {
            booleano = false;
        }

        var datosopcionales = verificarOpcionales();

        if (datosobligatorios && booleano && datosopcionales) {
            serializarDatosRegistros();
        } else {
            $('html,body').scrollTop(0);
        }
    });
    */
});

function box(celda){
    $body = $("body");
    $(document).on({
        ajaxStart: function() {
            $body.addClass("loading");
        },
        ajaxStop: function() {
            $body.removeClass("loading");
        }
    });

    var player=(document.getElementById("radioX").checked)?'X':'O';


    var data={
        'celda': "c"+celda,
        'turno': player
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        data: data,
        url: '/api/checkbox',
        type: 'post',
        contentType: 'application/x-www-form-urlencoded'
    }).done(function(response) {
        if(response.cod=='033'){
            jQuery('#modal-mostrar-mensaje').modal('show', {backdrop: 'static'});
            $("#textoMensaje").text(response.message);
        }

        if(response.cod=='111' || response.cod=='222'){
            $("#img0"+celda).attr("src","/images/"+player+".png");
            jQuery('#modal-reload-mensaje').modal('show', {backdrop: 'static'});
            $("#textoMensajeReload").text(response.message);
        }

        if(response.cod=='000'){
            if(response.turno=="X"){
                $("#radioX").prop('checked', true);
            }else{
                $("#radioO").prop('checked', true);

            }
            $("#img0"+celda).attr("src","/images/"+player+".png");
        }
    }).fail(function(error) {
        console.log(error);
    });
}

function reload(){
    console.log("entro");
    $body = $("body");
    $(document).on({
        ajaxStart: function() {
            $body.addClass("loading");
        },
        ajaxStop: function() {
            $body.removeClass("loading");
        }
    });

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, 
        url: '/api/new_game',
        type: 'get',
        contentType: 'application/x-www-form-urlencoded'
    }).done(function(response) {
        console.log(response);
        if(response.status=='success'){
            location.reload('/');
        }else{
            jQuery('#modal-mostrar-mensaje').modal('show', {backdrop: 'static'});
            $("#textoMensaje").text("Ocurrió un error, por favor reinicie la partida manualmente.");
        }
    }).fail(function(error) {
        jQuery('#modal-mostrar-mensaje').modal('show', {backdrop: 'static'});
        $("#textoMensaje").text("Ocurrió un error, por favor reinicie la partida manualmente.");
    });
}
