<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<iframe src="../Administrador/graficos/graficos/promedio_nota_inscritos.php" class="estad&iacute;sticas" style="width:100%;height:500px;" frameborder="0"> </iframe>
<?php } ?>