<div id="header-wrapper">
    <header class="container" id="site-header">
        
        <!-- Bootstrap Core CSS 
        <link href="<?php echo $tema; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
        <!-- Theme CSS 
        <link href="<?php echo $tema; ?>css/freelancer.min.css" rel="stylesheet">-->
        <div class="row">
            <div class="12u">
                <div id="logo">
                    <h1><img id="logotipo" src="<?php echo $path; ?>images/logo_confucio_verde.png"/> </h1>
                </div>
                <nav id="nav">
                    <ul>


                        <?php
                        if ($path == "src/") {
                            $path_menu = "vista/";
                            $path_index = "index.php";
                        } else {
                            /* if($pag="principal_admin")$path_menu="../pag_publicas/"; else */
                            $path_menu = "../";
                            $path_index = "../../index.php";
                        }




                        if ($pag == "inicio")
                            echo'<li class="current_page_item"><a href="' . $path_index . '">Inicio</a></li>';
                        else
                        //echo'<li><a href="' . $path_index . '">Instituto Confucio de la Universidad Bolivariana de Venezuela</a></li>';
                            echo'<li><a href="' . $path_index . '"></a></li>';
                        /* echo'
                          <li><a href="#">Sobre nosotros</a></li>
                          <li><a href="#">Actualidad</a></li>
                          <li><a href="#">Cursos</a></li>
                          <li><a href="#">Cont&aacute;ctenos</a></li>
                          ';
                         */
                        $ban = 0;
                        if (isset($_SESSION['admin']) && !isset($_SESSION['prof'])) {

                            if ($pag == "principal_admin")
                                echo'<li class="current_page_item"><a href="' . $path_menu . 'Administrador/principal_admin.php">Instituto Confucio de la Universidad Bolivariana de Venezuela</a></li>';
                            else
                               echo'<li><a href="' . $path_menu . 'Administrador/principal_admin.php">Sistema</a></li>';
                            $ban = 1;
                        }
                        if (isset($_SESSION['prof']) && !isset($_SESSION['admin'])) {

                            if ($pag == "principal_profesor")
                                echo'<li class="current_page_item"><a href="' . $path_menu . 'Profesor/principal_profesor.php">Instituto Confucio de la Universidad Bolivariana de Venezuela</a></li>';
                            else
                                echo'<li><a href="' . $path_menu . 'Profesor/principal_profesor.php">Instituto Confucio de la Universidad Bolivariana de Venezuela</a></li>';
                            $ban = 1;
                        }
                        if (isset($_SESSION['prof']) && isset($_SESSION['admin'])) {

                            if ($pag == "principal_profesor")
                                echo'<li class="current_page_item"><a href="' . $path_menu . 'Profesor/principal_profesor.php">Instituto Confucio de la Universidad Bolivariana de Venezuela</a></li>';
                            else
                                echo'<li><a href="' . $path_menu . 'Profesor/principal_profesor.php">Instituto Confucio de la Universidad Bolivariana de Venezuela</a></li>';
                            $ban = 1;
                        }
                        if (isset($_SESSION['est']) && $ban == 0) {

                            if ($pag == "principal_estudiante")
                                echo'<li class="current_page_item"><a href="' . $path_menu . 'Estudiante/principal_estudiante.php">Instituto Confucio de la Universidad Bolivariana de Venezuela</a></li>';
                            else
                                echo'<li  class="current_page_item"><a href="' . $path_menu . 'Estudiante/principal_estudiante.php">Instituto Confucio de la Universidad Bolivariana de Venezuela</a></li>';
                            $ban = 1;
                        }
                        if ($ban == 0) {

                            /* if ($pag == "sistema")
                              echo'<li class="current_page_item"><a href="' . $path_menu . 'pag_publicas/login.php">Sistema</a></li>';
                              else
                              echo'<li><a href="' . $path_menu . 'pag_publicas/login.php">Sistema</a></li>';
                             * 
                             */
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</div>