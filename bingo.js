$("#frm_nuevo_numero").submit(function(event){
    event.preventDefault();
    var formData = {
        'numero' : $('input[name=numero_actual]').val()
    };
    $.ajax({
        type: 'POST',
        url: 'bingo.php',
        data: {datos: formData, action: 'nuevoNumero'},
    }).done(function(data){
        //console.log(parseInt(data.replace(/"/g,'')));
        data = parseInt(data.replace(/"/g,''));
        // $("#" + data).addClass("fuera");
        pintarNumero(data);
    });

    event.preventDefault();
});

function leerFichero(){

}

function pintarNumero(numero){
    $("#" + numero).addClass("fuera");
}