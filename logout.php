<?php
session_start();
$_SESSION = array();
session_destroy();
setcookie ("usuarioControlLogueadoId", "", time() - 3600, "/", ".meticketonline.com");
setcookie ("usuarioControlLogueadoMail", "", time() - 3600, "/", ".meticketonline.com");
setcookie ("cantidadVendidasEvento", "", time() - 3600, "/", ".meticketonline.com");
setcookie ("ultimaEntradaLeida", "", time() - 3600, "/", ".meticketonline.com");


?>
<script>
function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

deleteAllCookies();
window.location = "https://www.meticketonline.com/qr-scan3/";
</script>
<?



//header("Location: https://www.meticketonline.com/qr-scan/");
?>