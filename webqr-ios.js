// JavaScript Document
function check_cookie_name(name) 
		{
		  var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
		  if (match) {
			console.log(match[2]);
			return match[2];
		  }
		  else{
			   console.log('--something went wrong---');
		  }
	   }
	
	function setCookie(name,value,days) {
		var expires = "";
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days*24*60*60*1000));
			expires = "; expires=" + date.toUTCString();
		}
		document.cookie = name + "=" + (value || "")  + expires + "; path=.meticketonline.com";
	}
	
	function nuevoIngreso(nro_entrada) {
		
		
		var campania = document.getElementById("campania").value;
		
		var cant_vendidas = check_cookie_name('cantidadVendidasEvento');
		
		setCookie('ultimaEntradaLeida',nro_entrada,1);
		
		
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
				
				if ( aux == 4 ){
					//alert("nO");
					//window.location = "SI";
					//location.reload();
					window.location = "https://www.meticketonline.com/qr-scan3/reader-ios.php?campania="+campania+"&cantidadVendida="+cant_vendidas+"&nro_entrada_enviada="+nro_entrada+"&res=0";
					
					
					
				}
				
				if ( aux == 1 ){
					//alert("SI");
					//window.location = "SI";
					//location.reload();
					window.location = "https://www.meticketonline.com/qr-scan3/reader-ios.php?campania="+campania+"&cantidadVendida="+cant_vendidas+"&nro_entrada_enviada="+nro_entrada+"&res=1";
					
					
					
				}



				if ( aux == 5 ){
					//alert("SI");
					//window.location = "SI";
					//location.reload();
					window.location = "https://www.meticketonline.com/qr-scan3/reader-ios.php?campania="+campania+"&cantidadVendida="+cant_vendidas+"&nro_entrada_enviada="+nro_entrada+"&res="+aux;
					
					
					
				}
				
				
				/*
				if ( aux == 0 ){
				
	
					alert("NO");	
					//location.reload();
					//window.location = "NO";
					window.location = "https://www.meticketonline.com/qr-scan3/reader.php?campania="+campania+"&cantidadVendida="+cant_vendidas+"&res=0";
					return;
				}
				*/
				
				
			}
		};
		xmlhttp.open("GET","https://www.meticketonline.com/registrarIngresos-web.php?entrada="+nro_entrada+"&campania="+campania,true);
		xmlhttp.send();
	
	}
	
    function onQRCodeScanned(scannedText)
    {
    	var result = document.getElementById("result");
    	if(result)
    	{
			var campania = document.getElementById("campania").value;
	
			var cant_vendidas = check_cookie_name('cantidadVendidasEvento');
			
			//alert(link_registro_ingreso);
			
			var ultimaEntradaLeidaAnterior = check_cookie_name('ultimaEntradaLeida');
			//alert(ultimaEntradaLeidaAnterior);
			if ( scannedText != ultimaEntradaLeidaAnterior ){
				nuevoIngreso(scannedText);
			}else
			{
				//window.location = "https://www.meticketonline.com/qr-scan3/reader-ios.php?campania="+campania+"&cantidadVendida="+cant_vendidas+"&nro_entrada_enviada="+scannedText+"&res=0";
			}
    		//result.value = scannedText;
    	}
		/*
    	var scannedTextMemoHist = document.getElementById("scannedTextMemoHist");
    	if(scannedTextMemoHist)
    	{
    		scannedTextMemoHist.value = scannedTextMemoHist.value + '\n' + scannedText;
    	}*/
    }
    
    function provideVideo()
    {
        var n = navigator;

        if (n.mediaDevices && n.mediaDevices.getUserMedia)
        {
          return n.mediaDevices.getUserMedia({
            video: {
              facingMode: "environment"
            },
            audio: false
          });
		  
        } 
        
        return Promise.reject('Your browser does not support getUserMedia');
    }

    function provideVideoQQ()
    {
        return navigator.mediaDevices.enumerateDevices()
        .then(function(devices) {
            var exCameras = [];
            devices.forEach(function(device) {
            if (device.kind === 'videoinput') {
              exCameras.push(device.deviceId)
            }
         });
            
            return Promise.resolve(exCameras);
        }).then(function(ids){
            if(ids.length === 0)
            {
              return Promise.reject('Could not find a webcam');
            }
            
            return navigator.mediaDevices.getUserMedia({
                video: {
                  'optional': [{
                    'sourceId': ids.length === 1 ? ids[0] : ids[1]//this way QQ browser opens the rear camera
                    }]
                }
            });        
        });                
    }
    
    //this function will be called when JsQRScanner is ready to use
    function JsQRScannerReady()
    {
        //create a new scanner passing to it a callback function that will be invoked when
        //the scanner succesfully scan a QR code
        var jbScanner = new JsQRScanner(onQRCodeScanned);
        //var jbScanner = new JsQRScanner(onQRCodeScanned, provideVideo);
        //reduce the size of analyzed image to increase performance on mobile devices
        jbScanner.setSnapImageMaxSize(300);
    	var scannerParentElement = document.getElementById("scanner");
    	if(scannerParentElement)
    	{
    	    //append the jbScanner to an existing DOM element
    		jbScanner.appendTo(scannerParentElement);
    	}        
    }