<?
	session_start();
	
	
	include('sql/conect.php'); 
//	mysqli_select_db($database_tienda);
	
	$email = $_POST['metusuario'];
	$pass = $_POST['metpass'];
	
	
	$consulta_usuario = "SELECT id_punto, usuario, estado, tipo_usuario_control, id_campania, pass FROM puntoventa WHERE usuario LIKE '$email' AND pass '$pass'";
	$resultado_usuario = mysqli_query($tienda_i,$consulta_usuario);
	$resultado_usuario_full = mysqli_fetch_array($resultado_usuario);
	
	if ( ( $resultado_usuario_full['usuario'] === '$email' ) && ( $resultado_usuario_full['pass'] === '$pass' ) ){

		if ( $resultado_usuario_full['estado'] == 'ACTIVO' ){
			setcookie("usuarioOrganizadorId", $idUsuario, time()+(60*60*24*3), "/", ".meticketonline.com");
			setcookie("usuarioControlLogueadoId", $id_punto, time()+(60*60*24*3), "/", ".meticketonline.com");
		   	setcookie("usuarioControlLogueadoMail", $email, time()+(60*60*24*3), "/", ".meticketonline.com");
			
			header("Location: https://www.meticketonline.com/qr-scan3/eventList-ios.php");
		}else
		{
			//header("Location: https://www.meticketonline.com/qr-scan3/reader-ios.php?campania=1292&cantidadVendida=444449");
		}
		
		
	}else
	{
		/*
		setcookie("usuarioOrganizadorId", $idUsuario, time()+(60*60*24*3), "/", ".meticketonline.com");
			setcookie("usuarioControlLogueadoId", $id_punto, time()+(60*60*24*3), "/", ".meticketonline.com");
		   	setcookie("usuarioControlLogueadoMail", $email, time()+(60*60*24*3), "/", ".meticketonline.com");
			*/
		header("Location: https://www.meticketonline.com/qr-scan3/eventList-ios.php");
	}
	
	//echo $consulta_usuario;
?>