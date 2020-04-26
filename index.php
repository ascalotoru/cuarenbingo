<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="estilos.css">
        <title>Cuareningo</title>
    </head>
    <body>
        <div class="container">
            <h1>Cuareningo</h1>
            <div class="row">
                <form action="bingo.php" class="needs-validation" method="post" id="frm_nuevo_numero">
                    <div class="form-group">
                        <label for="insertar_numero">Número:</label><br>
                        <input type="text" class="form-control" id="insertar_numero" name="numero_actual">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="row">
                <br>
                <div class="lead">
                    Números del bingo:
                </div>
                <div class="table-responsive">
                    <table class="table" text-align="center">
                        <tbody>
                        <?php $cont=1;
                            for($i=0;$i<6;$i++){
                            echo "<tr>";
                            for ($j=0;$j<15;$j++){
                                echo '<td id="'.$cont.'">' . $cont .'</td>';
                                $cont++;
                            }
                            echo "</tr>";
                        }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                Lista: <span id="lista_numeros" class="lista"></span>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="bingo.js"></script>
    </body>
</html>