<?php if (!isset($_SESSION['admin'])) session_start(); if (isset($_SESSION['admin'])){ ?>
<!DOCTYPE html>
<html>
<head>

    <title>estad&iacute;sticas</title>
    <link class="include" rel="stylesheet" type="text/css" href="../jquery.jqplot.min.css" />
    <link rel="stylesheet" type="text/css" href="examples.min.css" />
    <link type="text/css" rel="stylesheet" href="syntaxhighlighter/styles/shCoreDefault.min.css" />
    <link type="text/css" rel="stylesheet" href="syntaxhighlighter/styles/shThemejqPlot.min.css" />
  
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="../excanvas.js"></script><![endif]-->
    <script class="include" type="text/javascript" src="jquery-ui/js/jquery.min.js"></script>    
   
</head>
<body onLoad="grafico()">
       
		<?php
			include("../../../../modelo/AdministradorModel.Class.php");
			$objeto=new AdministradorModelo();
			$a=$objeto->total('a');
			$r=$objeto->total('r');
			$objeto->desconectar();
		?>
		
		<?php
		echo "\t \t <b>Total de aprobados y reprobados activos.</b>";
		?>
        
		<div id="chart1" style="margin-top:20px; margin-left:20px; width:600px; height:400px;"></div>
        
        <script type="text/javascript">
		$(document).ready(function(){
  plot1 = jQuery.jqplot('chart1', 
    [[['Reprobados <?php echo $r; ?> estudiantes', <?php echo $r; ?>],['Aprobados <?php echo $a; ?> estudiantes', <?php echo $a; ?>]]], 
    {
      
      seriesDefaults: {
 
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: { 
         
          showDataLabels: true
        } 
      }, 
      legend: { show:true, location: 'e' }
    }
  );
 
   
});
    

    </script>
    
 
<!-- End example scripts -->

<!-- Don't touch this! -->


    <script class="include" type="text/javascript" src="../jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="syntaxhighlighter/scripts/shCore.min.js"></script>
    <script type="text/javascript" src="syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
    <script type="text/javascript" src="syntaxhighlighter/scripts/shBrushXml.min.js"></script>
<!-- Additional plugins go here -->

  <script class="include" type="text/javascript" src="../plugins/jqplot.barRenderer.min.js"></script>
  <script class="include" type="text/javascript" src="../plugins/jqplot.pieRenderer.min.js"></script>
  <script class="include" type="text/javascript" src="../plugins/jqplot.categoryAxisRenderer.min.js"></script>
  <script class="include" type="text/javascript" src="../plugins/jqplot.pointLabels.min.js"></script>

<!-- End additional plugins -->

      
    

</body>
</html>
<?php } ?>
