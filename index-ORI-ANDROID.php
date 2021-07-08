<?
	$campania = 1292;
	
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


<script>
function loginUsuario() {
	
	/*
	if ( validateEmail(mail) == true )
	{
		invalid_mail();
		return false;
	}*/
	var metusuario = document.getElementById("metusuario").value;
	var metpass = document.getElementById("metpass").value;
	
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
			//document.getElementById("ingresos_actuales").innerHTML = aux;
			
			if (aux != 'false'){
				window.location = "https://www.meticketonline.com/qr-scan3/eventList.php";
			}else
			{
				alert("Acceso invalido");	
			}

			
			//window.location = "SI";
			
			
			

			
		}
	};
	xmlhttp.open("GET","https://www.meticketonline.com/servicioLogin-web.php?metusuario="+metusuario+"&metpass="+metpass,true);
	xmlhttp.send();

}

</script>


<style>
#login_form{
	text-align:center;	
	width:80%;
	margin:auto;
}

#login_form input{
	margin-top:10px;
	margin-bottom:10px;
	height:40px;
	text-align:center;
	width:100%;
	
	
}
.titulo_seccion{
	text-align:center;
	font-weight:bold;
	margin:20px;
}
</style>

<div>
    <h2 class="titulo_seccion">Control de entradas</h2>
    <div>
        <form id="login_form" method="post" onSubmit="loginUsuario();">
			
            <div>
            	<input type="email" name="metusuario" id="metusuario" placeholder="Usuario" value="grendeizer@gmail.com">
            </div>
            
            <div>
            	<input type="password" name="metpass" id="metpass" placeholder="Contraseña">
            </div>
            
            
            <div>
            	<input type="submit" name="submit" value="Ingresar">
            </div>
        
        </form>
    </div>
</div>





</body>

</html>