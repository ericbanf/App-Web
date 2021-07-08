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
	

	let metusuario = $("#metusuario").val();
	let metpass = $("#metpass").val();
	
	let url = "https://www.meticketonline.com/servicioLogin-web.php?metusuario="+metusuario+"&metpass="+metpass;

	$.ajax({
	    url: url,
	    type: 'GET',
	    success: function(data){ 
	    	if(data != 'false') window.location = "https://www.meticketonline.com/qr-scan3/eventList-ios.php";
	        else alert("Acceso invalido");
	    },
	    error: function(data) {
	       alert("Acceso invalido");	
    }
	});
}

 $(document).ready(function(){
 	 $("#login_form").submit(function(e){
  		e.preventDefault();
	    loginUsuario()   
	 });
 })

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
        
        <form id="login_form" >
			
            <div>
            	<input type="email" name="metusuario" id="metusuario" placeholder="Usuario">
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