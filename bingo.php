<?php
    if(isset($_POST['action']) && !empty($_POST['action'])){
        $action = $_POST['action'];
        switch($action){
            case 'nuevoNumero' : anadirNumero(); break;
        }
    }
    if(isset($_GET['action']) && !empty($_GET['action'])){
        $action = $_GET['action'];
        switch($action){
            case 'getNumbers': leerFichero(); break;
        }
    }

    function anadirNumero(){
        $numero = $_POST['datos'];
        $fp = fopen('bingo.txt', 'a');
        while (! flock($fp, LOCK_EX)) { // Mientras no se pueda bloquear, esperar un segundo
            usleep(1000);
        }
        fwrite($fp, $numero['numero'] . " ");
        flock ($fp, LOCK_UN); // Desbloqueo el fichero
        fclose($fp);
        echo json_encode($numero['numero']);
    }

    function leerFichero(){
        $fp = fopen('bingo.txt', 'r');
        while (! flock($fp, LOCK_SH)){
            usleep(1000);
        }
        $fichero = fread($fp, filesize('bingo.txt'));
        echo json_encode(explode(' ', $fichero));
    }
?>