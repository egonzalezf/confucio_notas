<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CONFUCI - Verificacion</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">               
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" href="../src/css/menuV.css" />
        <link rel="stylesheet" href="../src/css/style.css" />
        <link rel="stylesheet" href="../src/css/style-desktop.css" /> 
        <link rel="stylesheet" media="(min-width: 320px) and (max-width: 767px)" href="../src/css/style-mobile.css" />
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="../src/thema_boostrap/vendor/bootstrap/css/bootstrap.min.css">

        <!-- Theme CSS -->
        <link href="../src/thema_boostrap/css/freelancer.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../src/thema_boostrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!--hedear-->
        <div id="header-wrapper">
            <header class="container" id="site-header">             
                <div class="row">
                    <div class="12u">
                        <div id="logo">
                            <h1><img id="logotipo" src="../src/images/logo_confucio_verde.png"/> </h1>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <!-- Codigo -->
        <?php
        include("../modelo/EstudianteModel.Class.php");
// Datos
        $cont = 1;
        $objeto = new EstudianteModelo();
        $objeto->conectar();
        $sql = "select i.cod_seccion, nivel,nota
                from inscripcion i
                inner join seccion s on i.cod_seccion=s.cod_seccion
                where cod_estudiante='73c6d32037'";
        //var_dump($sql);
        $resultado = pg_query($sql);
        $sql1 = "select upper(nacionalidad ||'-'|| cedula_est) as cedula,
                upper(nombre_1||' '||nombre_2 ) as nombres,
                upper(apellido_1||' '||apellido_2) as apellidos,nota
                from inscripcion i
                inner join estudiante e on i.cod_estudiante=e.cod_estudiante 
                where e.cod_estudiante='73c6d32037'
                and nota>='12'";
        $resultado1 = pg_query($sql1);
        //var_dump($resultado1);die();
        /* while ($datos = pg_fetch_array($resultado1)) {
          echo utf8_decode($datos[1]) . "</br>";
          echo utf8_decode($datos[2]) . "</br>";
          echo strtoupper($datos[0]) . "</br>";
          echo strtoupper($datos[3]) . "</br>";
          } */
        ?>
        <!--Verificacion de Certificación-->
        <div class="container">
            <div class="row">

                <div class="col-lg-12 text-center">
                    <h2>Verificación de Certificado</h2>
                    <hr class="star-primary"></br></br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">El Instituto Confucio de la Universidad Bolivariana de Venezuela, hace constar que el certificado otorgado al ciudadano:</div></br></br>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8"><center><h1><?php
                            $datos2 = pg_fetch_array($resultado1);
                            echo $datos2[1] . " " . $datos2[2];
                            ?></h1></center></br></br></div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    Portador del numero de cédula <strong><?php echo $datos2[0]; ?></strong>, cuyo desempeño en el aprendizaje del idioma Chino Mandarin para el
                        manejo de Pinyin, uso del vocabulario, compresión del dialogo,
                        construcción de expresiones y conocimiento general de la cultura China.
                </div>
            </div>
        </div></br></br>
        <!--Verificacion de notas-->
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Sección</th>
                        <th class="text-center">Nivel</th>
                        <th class="text-center">Valoración</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        while ($datos = pg_fetch_array($resultado)) {
                            if ($datos[2] >= 18) {
                                    $val='Sobresaliente';
                                } elseif ($datos[2] >= 15) {
                                    $val='Notable';
                                } elseif ($datos[2] >= 12) {
                                    $val='Aprobado';
                            }
                            
                            echo "<tr><td><center>" . ($datos[0]) .
                            "</center></td><td><center>" . ($datos[1]) . "
                                  </center></td><td><center>" . $val. "
                                  </center></td></tr>";
                        }
                        ?>
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                         En el Instituto Confucio proporcionamos el estudio de la lengua y la
                        cultura chinas y trabajamos por construir un puente de entendimiento
                        entre pueblos de China y Venezuela y contribuir a la tradicional amistad
                        de ambos países y a la formación de un mundo armónico.
                </div>
            </div>
        </div>
        </br>
        </br>
        </br>
        </br>

        <?php include("comun/final_main.php"); ?>
        <script src="../src/js/jquery-1.9.1.min.js"></script>
        <script src="../src/js/config.js"></script>
        <script src="../src/js/skel.min.js"></script>
        <script src="../src/js/skel-ui.min.js"></script>
        <script src="../src/js/ajax.js"></script>

        <!-- jQuery -->
        <script src="../src/thema_boostrap/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../src/thema_boostrap/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Theme JavaScript -->
        <script src="../src/thema_boostrap/js/freelancer.min.js"></script>
    </body>
    <?php include("comun/final_main.php"); ?>
    <?php include("comun/pie.php"); ?>
</html>
