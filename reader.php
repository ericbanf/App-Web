<?
	session_start();
	
	
	
	if ( isset($_GET['linterna']) ){
		$linterna = $_GET['linterna'];
		setcookie("estado_linterna", "1", time()+(60*60*24*3), "/", ".meticketonline.com");
	}else
	{
		$linterna = 0;
		setcookie("estado_linterna", "0", time()+(60*60*24*3), "/", ".meticketonline.com");
	}
	 
	if ( !isset($_GET['campania']) ){
		$campania = 1292;
		$cantidadVendida = 28;
	}else
	{
		$campania = $_GET['campania'];
		$cantidadVendida = $_GET['cantidadVendida'];	
		$nro_entrada_enviada = $_GET['nro_entrada_enviada'];
	}
	
	//$campania = $_GET['campania'];
	//$cantidadVendida = $_GET['cantidadVendida'];
	setcookie("cantidadVendidasEvento", $cantidadVendida, time()+(60*60*24*3), "/", ".meticketonline.com");
	
include('../Connections0011/bandas1100_mysqli.php'); 
mysqli_select_db($tienda_i,$database_tienda) or die("No se encuentra la base de datos especificada");
mysqli_query($tienda_i,"SET NAMES 'utf8'");

?>
<html>
<head>

  <meta name="language" content="Spanish" />
  <meta name="copyright" content="MTO 2020" />
  <meta name="Revisit-After" content="1 Days"/>
  <meta name="robots" content="index, follow"/>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
  
  
  <link rel="icon" type="image/png" sizes="64x64" href="https://www.meticketonline.com/images/met_icono_.png">
        <!-- Apple/Safari icon -->
        <link rel="apple-touch-icon" sizes="180x180" href="https://www.meticketonline.com/images/met_icono_.png">
        <!-- Square Windows tiles -->
        <meta name="msapplication-square70x70logo" content="https://www.meticketonline.com/images/met_icono_.png">
        <meta name="msapplication-square150x150logo" content="https://www.meticketonline.com/images/met_icono_.png">
        <meta name="msapplication-square310x310logo" content="https://www.meticketonline.com/images/met_icono_.png">
        <!-- Rectangular Windows tile -->
        <meta name="msapplication-wide310x150logo" content="https://www.meticketonline.com/images/met_icono_.png">
        <!-- Windows tile theme color -->
        <meta name="msapplication-TileColor" content="#000">
  
  <meta name="mobile-web-app-capable" content="yes">
  <!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#000000">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#000000">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#000000">

<title>MTO</title>


<script type="text/javascript" src="llqrcode.js"></script>
<script type="text/javascript" src="plusone.js"></script>
<script type="text/javascript" src="webqr3.js?version=<? echo uniqid(); ?>"></script>

<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->

<script src="jquery-3.4.1.min.js"></script>



<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>


<script>
function obtenerIngresosActuales() {
	
	
	var campania = <? echo $campania; ?>;
	var cantidadVendida = <? echo $cantidadVendida; ?>
	
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			
			var aux = this.responseText;
			document.getElementById("ingresos_actuales").innerHTML = aux;
			document.getElementById("cantidad_vendida").innerHTML = cantidadVendida - aux;
			
			//alert(aux);
			
			//window.location = "SI";
			
			
			

			
		}
	};
	xmlhttp.open("GET","https://www.meticketonline.com/servicioEstadoEntradasEvento-web.php?campania="+campania,true);
	xmlhttp.send();

}

</script>



<style>



body {

background-color:#000;
color:#FFF;
}


</style>

<body>

<div style="background-image:url(images/Resonant+Burst.gif); background-position:center; background-repeat:no-repeat; background-size:cover; position:absolute; z-index:99999; width:100%; height:60%; opacity:.1;">

</div>

<div id="main" style="position:relative; z-index:1;">
    <div id="header">
    
        <div id="contenedor_top">
            <img src="https://www.meticketonline.com/images/logo-meticketonline-2018.png" alt="MTO" id="contenedor_top_logo">
        </div>
    
    	<style>
			#ingreso_exito{
				padding:5px;
				text-align:center;
				background-color:green;	
				
			}
			
			#ingreso_error{
				padding:5px;
				text-align:center;
				background-color:red;	
				
			}
			
			.cols{
				margin-bottom:10px;
				margin-top:10px;	
				text-align:center;
			}
			
			.col_1{
				width:50%;
				float:left;	
			}
			
			.col_2{
				width:50%;
				float:left;	
			}
			
			.titulo_seccion{
				text-align:center;
				font-weight:bold;
				margin:20px;
			}
			
			.contenedor_salir{
				text-align:center;
				margin-top:20px;	
			}
			
			
			.fila_ingresos{
				margin:10px;
				text-align:left;
				border-bottom:1px #FFF solid;	
				padding:10px;
			}
			
			#mensaje_resultado_ingreso{
				height:40px;	
				margin-top:10px;
			}
			
			.btn_navegacion{
				width:80%;
				margin:auto;
				text-align:center;
				background-color: #FF6400;
				color:#000;	
				padding:10px;
				border-color: #222;
				font-weight:bold;

			}
			
			.btn_ingreso_manual{
				width:80%;
				margin:auto;
				text-align:center;
				background-color: #FFF;
				color:#222;	
				padding:10px;
				border-color: #222;
				font-weight:bold;
			}
			
		</style>
        
        <div id="mensaje_resultado_ingreso">
			<?
                if ( $_GET['res'] == '1' ){
            ?>
                    <p id="ingreso_exito" class="mensaje_resultado_ingreso_aux">INGRESO CORRECTO</p>
            <?
                }
                
                if ( $_GET['res'] == '0' ){
            ?>
                    <p id="ingreso_error" class="mensaje_resultado_ingreso_aux">ENTRADA YA UTILIZADA</p>
            <?
                    
                }
            
            ?>
        </div>
        
        
        <style>
			.btn_cols{
				position:fixed;
				background-color:#000;
				bottom:0px;
				width:100%;

			}
			
			.btn_col_1{
				width:32%;
				float:left;	
			}
			
			.btn_col_2{
				width:32%;
				float:left;	
				text-align:center;
				/*margin-left:2%;*/
			}
			
			.btn_col_3{
				width:32%;
				float:left;	
				text-align:right;
				/*margin-left:2%;	*/
			}
			
			.bt_torch_flotante{
				position:fixed;
				bottom:20px;
				right:20px;	
			}
			
			.bt_subir_flotante{
				position:fixed;
				bottom:20px;
				left:20px;	
			}
			
		</style>
        
       <!--
        <div class="btn_cols">
        	<div class="btn_col_1">

                    <img src="images/torch-2-offb.png" alt="OFF" id="" width="50">
                    

            </div>
            
            <div class="btn_col_2">
            	<img src="images/torch-2-offb.png" alt="OFF" id="" width="50">
                    
            	
            </div>
            
            <div class="btn_col_3">
            	<?
					if ($linterna != 0 ){
					//if ($_COOKIE["estado_linterna"] == '1' ){
				?>
						
							<img src="images/torch-2-offb.png" alt="OFF" id="btn_linterna_off" width="50">
                            
						
				<?	
					}else
					{
				?>
						
	                        <img src="images/torch-2-onb.png" alt="OFF" id="btn_linterna_on" width="50">
							
							
				<?	
					}
				?>
                    
                
            </div>
            
            <div style="clear:both;"></div>
            
        
        </div>
        
        -->
        <div class="bt_torch_flotante">
			<?
                if ($linterna != 0 ){
                //if ($_COOKIE["estado_linterna"] == '1' ){
            ?>
                    
                        <img src="images/torch-2-offb.png" alt="OFF" id="btn_linterna_off" width="50">
                        <!--<button id="btn_linterna_off" class="btn_ingreso_manual">Apagar Linterna</button>-->
                    
            <?	
                }else
                {
            ?>
                    
                        <img src="images/torch-2-onb.png" alt="OFF" id="btn_linterna_on" width="50">
                        <!--<button id="btn_linterna_on" class="btn_ingreso_manual">Encender Linterna</button>-->
                        
            <?	
                }
            ?>
                
            
        </div>
        
        <div class="bt_subir_flotante">
			
                    
                        <img src="images/btn_topb.png" alt="Subir" id="bt_subir_flotante" width="50">
                        <!--<button id="btn_linterna_on" class="btn_ingreso_manual">Encender Linterna</button>-->
                        
            
            
        </div>
        
        
        
        
    </div>


</div>

<div id="mainbody">
<table class="tsel" border="0" width="100%" style="width:100% !important;">
<tr>
<td valign="top" align="center" width="100%" style="width:100% !important;">
<table class="tsel" border="0">
<tr>
<td><img class="selector" id="webcamimg" src="vid.png" onClick="setwebcam()" align="left" style="position:absolute; left:-9999px;" /></td>
<td><img class="selector" id="qrimg" src="cam.png" onClick="setimg()" align="right" style="position:absolute; left:-9999px;"/></td></tr>
<tr><td colspan="2" align="center">
<div id="outdiv" ><!--style="width:100% !important;">-->
</div></td></tr>
</table>
</td>
</tr>
<tr><td colspan="3" align="center">
<img src="down.png" style="position:absolute; left:-9999px;"/>
</td></tr>
<tr><td colspan="3" align="center">
<!--<div id="result"></div>-->
<input id="result" value="">
</td></tr>
</table>

<input type="hidden" name="campania" id="campania" value="<? echo $campania; ?>">
<!--<button id="boton">TEST</button>-->

<script>



  
  
  $( document ).ready(function() {
    obtenerIngresosActuales();
	$('.mensaje_resultado_ingreso_aux').delay(5000).fadeOut();
});

</script>

<div class="cols">

	<div class="col_1">
		<p>Ingresos: <span id="ingresos_actuales"></span></p>
    </div>
    
    <div class="col_2">
		<p>Restantes: <span id="cantidad_vendida"><? echo $cantidadVendida; ?></span></p>
    </div>

	<div style="clear:both;"></div>
</div>

</div>

<canvas id="qr-canvas"></canvas>
<script type="text/javascript">load();</script>


<div>
	<!--<h2 class="titulo_seccion">Lista ingresos</h2>-->
    
    	<style>
		
			.lista_ingresos_titulos{
				/*width:96%;
				margin:auto;	*/
			}
			
			.lista_ingresos_contenedor{
				/*width:96%;
				margin:auto;	*/
			}
			
			.lista_ingresos_col_1{
				width:50%;
				float:left;	
				font-size:20px;
			}
			
			.lista_ingresos_col_2{
				width:25%;
				float:left;	
				font-size:20px;
				text-align:center;
			}
			
			.lista_ingresos_col_3{
				width:25%;
				float:left;	
				font-size:20px;
				text-align:right;
				
			}
		</style>
        
    	<div class="lista_ingresos_titulos fila_ingresos">
        	
            <div class="lista_ingresos_col_1">
            	<p>Nro</p>
            </div>
            
            <div class="lista_ingresos_col_2">
            	<p>Cant</p>
            </div>
            
            <div class="lista_ingresos_col_3">
            	<p>Hora</p>
            </div>
        	<div style="clear:both;"></div>
        
        </div>
        
        <div class="lista_ingresos_contenedor">
    
    <?
		$consulta_ingresos = "SELECT entrada, cantidad, fecha_ingreso FROM entradas WHERE campania = '$campania' AND estado = '5' ORDER BY fecha_ingreso DESC";
		$resultado_ingresos=mysqli_query($tienda_i,$consulta_ingresos);
	
		
		while ( $ingresos = mysqli_fetch_array($resultado_ingresos) ){
			$fecha_ingreso = $ingresos['fecha_ingreso'];
	?>
    		<div class="fila_ingresos" id="<? echo $ingresos['entrada']; ?>">
                <div class="lista_ingresos_col_1">
                    <p><? echo $ingresos['entrada']; ?></p>
                </div>
                
                <div class="lista_ingresos_col_2">
                    <p><? echo $ingresos['cantidad']; ?></p>
                </div>
                
                <div class="lista_ingresos_col_3">
                    <p><? echo date('H:i',strtotime($fecha_ingreso)); ?></p>
                </div>
                <div style="clear:both;"></div>
            </div>
            
            
    		<!--<p class="fila_ingresos"><? echo $ingresos['entrada']; ?> - <? echo $ingresos['cantidad']; ?> - <? echo date('H:i',strtotime($fecha_ingreso)); ?></p>-->
    <?
		}
	?>
    	</div>
</div>


<div class="contenedor_salir">
	
	<button id="btn_ingreso_manual" class="btn_ingreso_manual">Ingreso Manual</button>
 
</div>
<!--
<?
	if ($linterna != 0 ){
	//if ($_COOKIE["estado_linterna"] == '1' ){
?>
		<div class="contenedor_salir">
            <button id="btn_linterna_off" class="btn_ingreso_manual">Apagar Linterna</button>
        </div>
<?	
	}else
	{
?>
		<div class="contenedor_salir">
            <button id="btn_linterna_on" class="btn_ingreso_manual">Encender Linterna</button>
        </div>		
<?	
	}
?>
-->

<div class="contenedor_salir">
	
	<button id="btn_volver" class="btn_navegacion">Volver</button>
 
</div>
	
</div>
<script>



$("#bt_subir_flotante").click(function(){
    $(window).scrollTop(0);
  });
  
  
  $("#btn_linterna_on").click(function(){
    window.location = "https://www.meticketonline.com/qr-scan/reader.php?campania=<? echo $campania;?>&cantidadVendida=<? echo $cantidadVendida;?>&linterna=1"
  });
  
  $("#btn_linterna_off").click(function(){
    window.location = "https://www.meticketonline.com/qr-scan/reader.php?campania=<? echo $campania;?>&cantidadVendida=<? echo $cantidadVendida;?>&linterna=0"
  });

  $("#btn_ingreso_manual").click(function(){
    window.location = "https://www.meticketonline.com/qr-scan/manual_input.php?campania=<? echo $campania;?>&cantidadVendida=<? echo $cantidadVendida;?>"
  });
  
  $("#btn_volver").click(function(){
    window.location = "https://www.meticketonline.com/qr-scan/eventList.php"
  });

</script>

<?
if ( $_GET['res'] == '0' ){
?>
		
<script>
	$(document).ready(function () {
		// Handler for .ready() called.
		$('html, body').animate({
			scrollTop: $('#<? echo $nro_entrada_enviada; ?>').offset().top
		}, 'slow');
		
		$("#<? echo $nro_entrada_enviada;?>").css("background-color","#EEEEEE");
		$("#<? echo $nro_entrada_enviada;?>").css("color","red");
	});
</script>
<?
		
	}
?>

<?
	if ( $linterna == 1 ){
?>
		<script  src="torch/script.js"></script>
<?	
	}
?>


</body>

</html>