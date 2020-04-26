listaNumeros = [];
$().ready(function(){
    $("#frm_nuevo_numero").submit(function(event){
        event.preventDefault();
        var formData = {
            'numero' : $('input[name=numero_actual]').val()
        };
        if(!revisarNumero){
            $.ajax({
                type: 'POST',
                url: 'bingo.php',
                data: {datos: formData, action: 'nuevoNumero'},
            }).done(function(data){
                data = parseInt(data.replace(/"/g,''));
                getNumbers();
                $("#insertar_numero").val("");
                $("#insertar_numero").focus();
            });

            event.preventDefault();
        }else{
            alert("Número incorrecto");
        }
    });
    /* DEPRECATED
    $("#refrescar").click(function(){
        getNumbers();
    });
    */
    getNumbers();
});


/**
 * Aplica la clase 'fuera' que simplemente cambia el fondo de la celda a negro
 * y pone las letras en blanco
 */
function pintarNumero(numero){
    $("#" + numero).addClass("fuera");
    if ($("#lista_numeros").text()){
        $("#lista_numeros").text($("#lista_numeros").text() + ", " + numero);
    }else{
        $("#lista_numeros").text(numero);
    }
}

/**
 * Hace petición GET por AJAX y recibe el contenido del fichero con los números
 * que ya han salido
 */
function getNumbers(){
    $.ajax({
        type: 'GET',
        url: 'bingo.php',
        data: {action: 'getNumbers'},
        dataType: 'json'
    }).done(function(data){
        numeros = data;
        $.each(data, function(index, value){
            if(! value.length == 0){
                pintarNumero(value);
            }
        });
    });
}

function revisarNumero(numero){
    $.each(listaNumeros, function(index, value){
        if(value == numero){
            return true;
        }
    });
    return false;
}
