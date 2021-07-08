<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<script>

/**
 * Determina el sistema operativo del móvil.
 * Esta función retorna 'iOS', 'Android', 'Windows Phone', or 'desconocido'.
 *
 * @returns {String}
 */
function getMobileOperatingSystem() {
  var userAgent = navigator.userAgent || navigator.vendor || window.opera;

  // Windows Phone debe ir primero porque su UA tambien contiene "Android"
 if (/windows phone/i.test(userAgent)) {
    alert( "Windows Phone" );
 }

 if (/android/i.test(userAgent)) {
    alert( "Android" );
}

     if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
    alert( "iOS");
}

//alert( "desconocido");
}

getMobileOperatingSystem();
</script>
</body>
</html>
