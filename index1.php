<?php $path = "src/";
$path_include = "vista/comun/"; ?>
<?php session_start(); ?>
<?php include($path_include . "top.php"); ?>
<body>

    <!-- Header -->

    <?php $pag = "inicio";
    include($path_include . "menu.php"); ?>
<?php include($path_include . "iniciar_main.php"); ?>

    <!-- Banner -->

    <div class="row">
        <div class="12u">
            <div id="banner">
                <a href="#">

                    <iframe src="<?php echo $path; ?>indexg.html" id="galeria" height="265" scrolling="no" style="padding:-5px;"></iframe>
                    <div id="logo_mobile"><img src="src/images/logo_confucio_verde.png"></div>

                </a>
                <div class="caption">
                    <span><strong>Tu Centro de Idiomas Rosa Luxemburgo en linea. </strong></span>
                    <a href="#" class="button">Con&oacute;cenos!</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features -->

    <div class="row">
        <div class="7u">
            <section class="first">

                <h2>¿Quiénes Somos?</h2>
                <p style="text-align:justify">El Centro de Idiomas de la Universidad Bolivariana de Venezuela fue creado en octubre de 2005, adscrito al Vicerrectorado, en el marco del nuevo mapa estratégico de la nación con la finalidad de seguir impulsando el nuevo sistema multipolar internacional y de avanzar en la conformación de la nueva estructura social. Se basa también en el capítulo VIII de nuestro Documento Rector, en su Política II, donde se establece la formación bilingüe como parte de nuestro sistema de educación Bolivariano.</p>
            </section>							
        </div>
        <div class="5u">
            <section>

                <h2><br></h2>
                <p style="text-align:justify">
                    El Centro de Idiomas cuenta, en la actualidad, con cinco sedes en el interior del país; Zulia, Falcón, Monagas y Bolívar. Además de estar presentes en las aldeas universitarias de la Misión Sucre – UBV
                </p>
            </section>							
        </div>
        <!--<div class="3u">
                <section>
<img src="<?php echo $path; ?>images/3.png" style="width:50px;height:50px;padding-right:20px;">
                        <h2>Qu&eacute; hacemos</h2>
                        <p style="text-align:justify">TLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                </section>							
        </div>
        <div class="3u">
                <section class="last">
<img src="<?php echo $path; ?>images/4.png" style="width:50px;height:50px;padding-right:20px;">
                        <h2>Importante</h2>
                        <p style="text-align:justify">TLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. .</p>
                </section>							
        </div>-->
    </div>


    <!--  Divider 

            <div class="row">
                    <div class="12u">
                            <div class="divider divider-top"></div>
                    </div>
            </div>

    -->

    <br>

<?php include($path_include . "pie.php"); ?>
<?php include($path_include . "final_main.php"); ?>

</body>
</html>