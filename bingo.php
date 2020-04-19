<?php
    if(isset($_POST['action']) && !empty($_POST['action'])){
        $action = $_POST['action'];
        switch($action){
            case 'nuevoNumero' : anadirNumero();
        }
    }

    function anadirNumero(){
        $numero = $_POST['datos'];
        $fp = fopen('bingo.txt', 'a');
        while (! flock($fp, LOCK_EX)) { // Mientras no se pueda bloquear, esperar un segundo
            usleep(1000);
        }
        fwrite($fp, $numero['numero'] . "\r\n");
        flock ($fp, LOCK_UN);
        fclose($fp);
        echo json_encode($numero['numero']);
    }

    function leerFichero(){
        $
    }
?>