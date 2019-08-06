<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../src/thema_boostrap/vendor/bootstrap/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container">
            <h2>Modal Example</h2>

            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
            <!-- Codigo -->
            <?php
            include("../modelo/EstudianteModel.Class.php");
// Datos
            $cont = 1;
            $objeto = new EstudianteModelo();
            $objeto->conectar();
            $sql = "select fecha, deposito, hora, nota, cod_seccion from inscripcion where cod_estudiante='73c6d32037'";
//var_dump($sql);
            $resultado = pg_query($sql);
            $sql1 = "select upper(nacionalidad ||'-'|| cedula_est) as cedula,
         upper(nombre_1||' '||nombre_2 ) as nombres,
         upper(apellido_1||' '||apellido_2) as apellidos,nota
         from inscripcion i
         inner join estudiante e on i.cod_estudiante=e.cod_estudiante 
         where e.cod_estudiante='73c6d32037'
         and nota>='10'";
            $resultado1 = pg_query($sql1);
//var_dump($resultado1);die();
            /*while ($datos = pg_fetch_array($resultado1)) {
                echo utf8_decode($datos[1]) . "</br>";
                echo utf8_decode($datos[2]) . "</br>";
                echo strtoupper($datos[0]) . "</br>";
                echo strtoupper($datos[3]) . "</br>";
            }*/
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php while ($datos = pg_fetch_array($resultado1)) {
                            echo "<tr><td>" . ($datos[0]) .
                                 "</td><td>" . ($datos[1]) . "
                                  </td><td>" . ($datos[2]) . "
                                  </td><td>" . ($datos[3]) . "
                                  </td></tr>";
                        }?>
                </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                            <p>Some text in the modal.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </body>
    <script src="../src/thema_boostrap/vendor/jquery/jquery.min.js"></script>
<script src="../src/thema_boostrap/vendor/bootstrap/js/bootstrap.min.js"></script>
</html>