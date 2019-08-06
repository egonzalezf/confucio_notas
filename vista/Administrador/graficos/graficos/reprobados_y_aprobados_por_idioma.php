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
			$matriz=$objeto->aprobados_por_idioma();
			$objeto->desconectar();
		?>
		
		<?php
		echo "\t \t <b>Aprobados y reprobados activos por idioma.</b>";
		?>
        
		<div id="chart1" style="margin-top:20px; margin-left:20px; width:600px; height:400px;"></div>
        
        <script type="text/javascript">$(document).ready(function(){
			
			var s1 = [<?php
						$i=0;
						while(isset($matriz[$i][$i])){
						  if($i!=0)echo ',';
						  echo $matriz[$i][$i]; 
						  $i++;
						}
		           ?>];
				    var s2 = [<?php
						$i=0;
						while(isset($matriz[$i][$i+1])){
						  if($i!=0)echo ',';
						  echo $matriz[$i][$i+1]; 
						  $i++;
						}
		           ?>];
        var ticks = [<?php
						$i=0;
						while(isset($matriz[$i][$i+2])){
						  if($i!=0)echo ',';
						  echo "'".$matriz[$i][$i+2]."'"; 
						  $i++;
						}
		  			 ?>];
	   

         
        plot2 = $.jqplot('chart1', [s1, s2], {
            seriesDefaults: {
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            }
        });
     
        $('#chart2').bind('jqplotDataHighlight', 
            function (ev, seriesIndex, pointIndex, data) {
                $('#info2').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
             
        $('#chart2').bind('jqplotDataUnhighlight', 
            function (ev) {
                $('#info2').html('Nothing');
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
