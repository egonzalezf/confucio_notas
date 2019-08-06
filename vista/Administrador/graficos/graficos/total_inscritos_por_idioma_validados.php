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
			$matriz=$objeto->total_inscritos_idioma("v");
		?>
		
		<?php
		$i=0;
		$suma=0;
		while(isset($matriz[$i][$i])){
		  $suma+=$matriz[$i][$i];
		  $i++;
		}
		echo "\t \t <b>Total de inscritos activos validados:</b> ".$suma." Estudiantes.";
		?>
        
		<div id="chart1" style="margin-top:20px; margin-left:20px; width:<?php echo 58*$i; ?>px; height:400px;"></div>
        
        <script type="text/javascript">function grafico(){
        $.jqplot.config.enablePlugins = true;
        var s1 = [<?php
						$i=0;
						while(isset($matriz[$i][$i])){
						  if($i!=0)echo ',';
						  echo $matriz[$i][$i]; 
						  $i++;
						}
		           ?>];
        var ticks = [<?php
						$i=0;
						while(isset($matriz[$i][$i+1])){
						  if($i!=0)echo ',';
						  echo "'".$matriz[$i][$i+1]."'"; 
						  $i++;
						}
		  			 ?>];
	   
	    <?php
			$objeto->desconectar();
		?>
        
        plot1 = $.jqplot('chart1', [s1], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },
            highlighter: { show: false }
        });
    
       
    }</script>
    
 
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

      
    <script type="text/javascript" src="example.min.js"></script>

</body>
</html>
<?php } ?>
