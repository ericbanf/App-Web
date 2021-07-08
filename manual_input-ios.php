<?
	session_start();
	
	if ( !isset($_GET['campania']) ){
		$campania = 1292;
		$cantidadVendida = 28;
		
		$dni_cliente = $_GET['dni_cliente'];
	}else
	{
		$campania = $_GET['campania'];
		$cantidadVendida = $_GET['cantidadVendida'];	
		$dni_cliente = $_GET['dni_cliente'];
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
  
  <meta name="mobile-web-app-capable" content="yes">
  <!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#000000">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#000000">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#000000">

<title>MTO Ingreso Manual</title>




<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->

<script src="jquery-3.4.1.min.js"></script>



<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>







<style>



body {

background-color:#000;
color:#FFF;
}


</style>

<body>



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
			
			#btn_enviar_ingreso_manual{
				width:80%;
				margin:auto;
				text-align:center;
				background-color: #EEE;
				color:#222;	
				padding:10px;
				border-color: #222;
				font-weight:bold;
				margin-bottom:40px;
			}
			
			.nro_documento{
				
				height:80px;
				width:80%;
				margin:auto;	
				margin-bottom:20px;
				margin-top:20px;
				font-size:60px;
				letter-spacing:1px;
			}
			
			.link_ingreso_entrada{
				color:#FFF;
				text-decoration:none;	
			}
		</style>
        
        
    </div>


</div>

<div id="mainbody">


<input type="hidden" name="campania" id="campania" value="<? echo $campania; ?>">
<!--<button id="boton">TEST</button>-->

</div>






</div>



<div style="text-align:center;">
    <form action="#" method="get" id="form_ingreso_manual">
        <div>
            <p style="color:#FFF;">DNI Cliente</p>
        </div>
        
        
        
        <div>
            <input type="number" name="dni_cliente" id="nro_documento" class="nro_documento" placeholder="DNI" autocomplete="off"  pattern="[0-9]{8}[A-Za-z]{1}" title="Debe poner 8 números y una letra"  required>
        </div>
        
        <input type="hidden" name="campania" value="<? echo $campania;?>">
        <input type="hidden" name="cantidadVendida" value="<? echo $cantidadVendida;?>">
        
        <div>
            <input type="submit" class="btn_navegacion" id="btn_enviar_ingreso_manual" value="Enviar">
        </div>
        
    </form>
    
    
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
			text-align:center;
			font-size:20px;
		}
		
		.lista_ingresos_col_3{
			width:25%;
			float:left;	
			font-size:16px;
		}
		
		.btn_ingresar_entrada{
			background-color:red;
			padding:5px;	
		}
		
		.ajuste_fila_entrada{
			font-size:20px;
			padding:5px;	
		}
	</style>
	
    <? 
		if ( isset($_GET['dni_cliente']) ){
	?>
    
	<div class="lista_ingresos_titulos fila_ingresos">
		
		<div class="lista_ingresos_col_1">
			<p>Nro</p>
		</div>
		
		<div class="lista_ingresos_col_2">
			<p>Cant</p>
		</div>
		
		<div class="lista_ingresos_col_3">
			<p>Accion</p>
		</div>
		<div style="clear:both;"></div>
	
	</div>
    
    <?
		}
	?>
    
    <?
		$consulta_entrada_dni = "SELECT entrada, cantidad FROM entradas WHERE iniciocompra IN (SELECT id_inicio FROM iniciocompra WHERE documento LIKE '$dni_cliente' AND id_campania = '$campania') AND estado = 2";
		$resultado_entrada_dni = mysqli_query($tienda_i,$consulta_entrada_dni);
		
		while ( $entradas_disponibles = mysqli_fetch_array($resultado_entrada_dni) ){
		?>
        	<div class="fila_ingresos" id="<? echo $ingresos['entrada']; ?>">
                <div class="lista_ingresos_col_1">
                    <p class="ajuste_fila_entrada"><? echo $entradas_disponibles['entrada'];?></p>
                </div>
                
                <div class="lista_ingresos_col_2">
                    <p class="ajuste_fila_entrada"><? echo $entradas_disponibles['cantidad'];?></p>
                </div>
                
                <div class="lista_ingresos_col_3">
                    <p class="btn_ingresar_entrada"><a href="https://www.meticketonline.com/registrarIngresos-web-manual-ios.php?entrada=<? echo $entradas_disponibles['entrada'];?>&campania=<? echo $campania;?>" class="link_ingreso_entrada" target="_self">Ingresar</a></p>
                </div>
                <div style="clear:both;"></div>
            </div>
        	<!--
			<div class="fila_ingresos">
				<p><a href="https://www.meticketonline.com/registrarIngresos-web-manual.php?entrada=<? echo $entradas_disponibles['entrada'];?>&campania=<? echo $campania;?>" class="link_ingreso_entrada" target="_self"><? echo $entradas_disponibles['entrada'];?> - <? echo $entradas_disponibles['cantidad'];?></a></p>
			</div>
            
            -->
		<?	
			
		}
		
	?>
</div>





<div class="contenedor_salir">
	
	<button id="btn_volver" class="btn_navegacion">Volver</button>
 
</div>
	
</div>
<script>



  
  $("#btn_volver").click(function(){
    window.location = "https://www.meticketonline.com/qr-scan3/reader-ios.php?campania=<? echo $campania;?>&cantidadVendida=<? echo $cantidadVendida;?>"
  });

</script>

</body>

</html>