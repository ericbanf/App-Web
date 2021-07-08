<?php session_start();

//http://localhost/bandas/servicioLogin.php?metusuario=mauro.julian.ayala@gmail.com&metpass=admin
//setcookie("ultimaEntradaLeida", "0", time()+(60*60*24*3), "/", "meticketonline.com");
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
  
  
  <!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#000000">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#000000">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#000000">

<title>MTO</title>




<script src="jquery-3.4.1.min.js"></script>



<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>



<body>

<!--<div style="background-image:url(images/Resonant+Burst.gif); background-position:center; background-repeat:no-repeat; background-size:cover; position:absolute; z-index:99999; width:100%; height:100%; opacity:.2;">

</div>-->

<div id="main" style="position:relative; z-index:1;">
    <div id="header">
    
        <div id="contenedor_top">
            <img src="https://www.meticketonline.com/images/logo-meticketonline-2018.png" alt="MTO" id="contenedor_top_logo">
        </div>
    
    
    
    </div>


</div>

<style>
	.fila_eventos{
		margin:10px;
		text-align:left;
		border-bottom:1px #FFF solid;	
		padding:10px;
	}
	
	.link_evento{
		color:#FFF;
		text-decoration:none;	
		text-align:left;
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
</style>


<div>
    
    <div>
        <h2 class="titulo_seccion">Eventos</h2>
<?
$fecha=date("Y-m-d H:i:s");
$nombremail = $_COOKIE['usuarioControlLogueadoMail'];
$sql="select vpuntosdeventas.*,campania.nombreCampania AS nombreCampania,campania.fechaEvento,campania.lugarEvento, puntoventa.tipo_usuario_control,campania.tipo AS tipoCampania
	
	from vpuntosdeventas,campania, puntoventa
	
	where vpuntosdeventas.usuario='$nombremail' and vpuntosdeventas.fecha>='$fecha' 
	and vpuntosdeventas.id_campania=campania.id_campania
	AND puntoventa.id_punto  = vpuntosdeventas.id_punto
	
	AND vpuntosdeventas.estado LIKE 'ACTIVO'
	";
	
	$res=mysqli_query($tienda_i,$sql);
	
	
	while ( $evento = mysqli_fetch_array($res) ){
		
		$id_campania_aux = $evento['id_campania'];
		$tipoCampania = $evento['tipoCampania'];
		
		if ( $tipoCampania == 2 ){
			$consulta_total_entradas = "SELECT SUM(cantidad) AS cantidadVendida FROM entradas WHERE campania = '$id_campania_aux' AND estado < '6'";
		}
		
		if ( $tipoCampania == 3 ){
			$consulta_total_entradas = "SELECT SUM(cantidad) AS cantidadVendida FROM entradas_free WHERE campania = '$id_campania_aux' AND estado < '6'";
		}
		
		if ( $tipoCampania == 4 ){
			$consulta_total_entradas = "SELECT SUM(cantidad) AS cantidadVendida FROM entradas_free WHERE campania = '$id_campania_aux' AND estado < '6'";
		}
		
		$resultado_total_entradas = mysqli_query($tienda_i,$consulta_total_entradas);
		
		$resultado_total_entradas_full = mysqli_fetch_array($resultado_total_entradas);
		
		$cantidad_vendidas = $resultado_total_entradas_full['cantidadVendida'];
		
?>
		<!--<p><a href="https://www.meticketonline.com/qr-scan/reader.php?eventoId=<? echo $evento['id_campania']; ?>"><? echo $evento['nombreCampania']; ?></a></p>-->
        
        
        
        
        <div class="fila_eventos">
        	<!--<div style="width:75%; float:left; margin-right:5%;">
            	<p><a href="https://www.meticketonline.com/qr-scan/reader.php?campania=<? echo $evento['id_campania']; ?>&cantidadVendida=<? echo $cantidad_vendidas;?>" class="link_evento"><? echo $evento['nombreCampania']; ?></a></p>
            </div>
            
            <div style="width:20%; float:left;">
            	<p><? echo $cantidad_vendidas; ?></p>
            </div>
            
            <div style="clear:both;"></div>-->
            <p><a href="https://www.meticketonline.com/qr-scan3/reader.php?campania=<? echo $evento['id_campania']; ?>&cantidadVendida=<? echo $cantidad_vendidas;?>" class="link_evento"><? echo $evento['nombreCampania']; ?></a></p>
        </div>

<?
	}
?>

    </div>
</div>




<!--

<div>
    
    <div>
        <h2 class="titulo_seccion">Eventos Gratuitos</h2>
<?
$fecha=date("Y-m-d H:i:s");
$nombremail = $_COOKIE['usuarioControlLogueadoMail'];
$sql="select vpuntosdeventas.*,campania.nombreCampania AS nombreCampania,campania.fechaEvento,campania.lugarEvento, puntoventa.tipo_usuario_control,campania.tipo AS tipoCampania
	
	from vpuntosdeventas,campania, puntoventa
	
	where vpuntosdeventas.usuario='$nombremail' and vpuntosdeventas.fecha>='$fecha' 
	and vpuntosdeventas.id_campania=campania.id_campania
	AND puntoventa.id_punto  = vpuntosdeventas.id_punto
	AND campania.tipo > '2'
	AND vpuntosdeventas.estado LIKE 'ACTIVO'
	";
	
	$res=mysqli_query($tienda_i,$sql);
	
	
	while ( $evento = mysqli_fetch_array($res) ){
		
		$id_campania_aux = $evento['id_campania'];
		$tipoCampania = $evento['tipoCampania'];
		
		if ( $tipoCampania == 2 ){
			$consulta_total_entradas = "SELECT SUM(cantidad) AS cantidadVendida FROM entradas WHERE campania = '$id_campania_aux' AND estado < '6'";
		}
		
		if ( $tipoCampania == 3 ){
			$consulta_total_entradas = "SELECT SUM(cantidad) AS cantidadVendida FROM entradas_free WHERE campania = '$id_campania_aux' AND estado < '6'";
		}
		
		if ( $tipoCampania == 4 ){
			$consulta_total_entradas = "SELECT SUM(cantidad) AS cantidadVendida FROM entradas_free WHERE campania = '$id_campania_aux' AND estado < '6'";
		}
		
		$resultado_total_entradas = mysqli_query($tienda_i,$consulta_total_entradas);
		
		$resultado_total_entradas_full = mysqli_fetch_array($resultado_total_entradas);
		
		$cantidad_vendidas = $resultado_total_entradas_full['cantidadVendida'];
		
?>
		
        
        
        
        <div class="fila_eventos">
        	
            <p><a href="https://www.meticketonline.com/qr-scan/reader.php?campania=<? echo $evento['id_campania']; ?>&cantidadVendida=<? echo $cantidad_vendidas;?>" class="link_evento"><? echo $evento['nombreCampania']; ?></a></p>
        </div>

<?
	}
?>

    </div>
</div>

-->
<div class="contenedor_salir">
	
	<button id="btn_salir" class="btn_navegacion">Salir</button>

</div>

<script>



  $("#btn_salir").click(function(){
    window.location = "https://www.meticketonline.com/qr-scan3/logout.php"
  });
  

</script>



<script>


function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=.meticketonline.com";
}
  
  
  $( document ).ready(function() {
    
	

	setCookie('ultimaEntradaLeida','0',1);
});

</script>


</body>

</html>