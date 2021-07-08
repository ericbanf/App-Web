// QRCODE reader Copyright 2011 Lazar Laszlo
// http://www.webqr.com

var gCtx = null;
var gCanvas = null;
var c=0;
var stype=0;
var gUM=false;
var webkit=false;
var moz=false;
var v=null;

var imghtml='<div id="qrfile"><canvas id="out-canvas" width="100%" height="100%"></canvas>'+
    '<div id="imghelp">drag and drop a QRCode here'+
	'<br>or select a file'+
	'<input type="file" accept="video/*;capture=camcorder" onchange="handleFiles(this.files)"/>'+
	'</div>'+
'</div>';

var vidhtml = '<video id="v" autoplay style="width:100% !important;"></video>';

function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
}
function drop(e) {
  e.stopPropagation();
  e.preventDefault();

  var dt = e.dataTransfer;
  var files = dt.files;
  if(files.length>0)
  {
	handleFiles(files);
  }
  else
  if(dt.getData('URL'))
  {
	qrcode.decode(dt.getData('URL'));
  }
}

function handleFiles(f)
{
	var o=[];
	
	for(var i =0;i<f.length;i++)
	{
        var reader = new FileReader();
        reader.onload = (function(theFile) {
        return function(e) {
            gCtx.clearRect(0, 0, gCanvas.width, gCanvas.height);

			qrcode.decode(e.target.result);
        };
        })(f[i]);
        reader.readAsDataURL(f[i]);	
    }
}

function initCanvas(w,h)
{
    gCanvas = document.getElementById("qr-canvas");
    gCanvas.style.width = w + "px";
    gCanvas.style.height = h + "px";
    gCanvas.width = w;
    gCanvas.height = h;
    gCtx = gCanvas.getContext("2d");
    gCtx.clearRect(0, 0, w, h);
}


function captureToCanvas() {
    if(stype!=1)
        return;
    if(gUM)
    {
        try{
            gCtx.drawImage(v,0,0);
            try{
                qrcode.decode();
            }
            catch(e){       
                console.log(e);
                //setTimeout(captureToCanvas, 500);
				setTimeout(captureToCanvas, 2000);
            };
        }
        catch(e){       
                console.log(e);
                //setTimeout(captureToCanvas, 500);
				setTimeout(captureToCanvas, 2000);
        };
    }
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}



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
				window.location = "https://www.meticketonline.com/qr-scan/reader.php?campania="+campania+"&cantidadVendida="+cant_vendidas+"&nro_entrada_enviada="+nro_entrada+"&res=0";
				
				
				
			}
			
			if ( aux == 1 ){
				//alert("SI");
				//window.location = "SI";
				//location.reload();
				window.location = "https://www.meticketonline.com/qr-scan/reader.php?campania="+campania+"&cantidadVendida="+cant_vendidas+"&nro_entrada_enviada="+nro_entrada+"&res=1";
				
				
				
			}
			
			
			/*
			if ( aux == 0 ){
			

				alert("NO");	
				//location.reload();
				//window.location = "NO";
				window.location = "https://www.meticketonline.com/qr-scan/reader.php?campania="+campania+"&cantidadVendida="+cant_vendidas+"&res=0";
				return;
			}
			*/
			
			
		}
	};
	xmlhttp.open("GET","https://www.meticketonline.com/registrarIngresos-web.php?entrada="+nro_entrada+"&campania="+campania,true);
	xmlhttp.send();

}


function read(a)
{
	// ACA ORI
	/*
    var html="<br>";
    if(a.indexOf("http://") === 0 || a.indexOf("https://") === 0)
        html+="<a target='_blank' href='"+a+"'>"+a+"</a><br>";
    html+="<b>"+htmlEntities(a)+"</b><br><br>";
    
	document.getElementById("result").innerHTML=html;
	*/
	
	//var html=a;
    //if(a.indexOf("http://") === 0 || a.indexOf("https://") === 0)
//        html+="<a target='_blank' href='"+a+"'>"+a+"</a><br>";
   // html+=htmlEntities(a);
    

	//document.getElementById("result").value=a;
	
	var campania = document.getElementById("campania").value;
	
	var cant_vendidas = check_cookie_name('cantidadVendidasEvento');
	
	//alert(link_registro_ingreso);
	
	var ultimaEntradaLeidaAnterior = check_cookie_name('ultimaEntradaLeida');
	//alert(ultimaEntradaLeidaAnterior);
	if ( a != ultimaEntradaLeidaAnterior ){
		nuevoIngreso(a);
	}else
	{
		window.location = "https://www.meticketonline.com/qr-scan/reader.php?campania="+campania+"&cantidadVendida="+cant_vendidas+"&nro_entrada_enviada="+a	+"&res=0";
	}
	
	//alert(respuesta);
	//location.reload();
}	

function isCanvasSupported(){
  var elem = document.createElement('canvas');
  return !!(elem.getContext && elem.getContext('2d'));
}
function success(stream) 
{

    v.srcObject = stream;
    v.play();

    gUM=true;
    setTimeout(captureToCanvas, 500);
}
		
function error(error)
{
    gUM=false;
    return;
}

function load()
{
	
	
	if(isCanvasSupported() && window.File && window.FileReader)
	{
		initCanvas(800, 600);
		qrcode.callback = read;
		document.getElementById("mainbody").style.display="inline";
        setwebcam();
	}
	else
	{
		document.getElementById("mainbody").style.display="inline";
		document.getElementById("mainbody").innerHTML='<p id="mp1">QR code scanner for HTML5 capable browsers</p><br>'+
        '<br><p id="mp2">sorry your browser is not supported</p><br><br>'+
        '<p id="mp1">try <a href="http://www.mozilla.com/firefox"><img src="firefox.png"/></a> or <a href="http://chrome.google.com"><img src="chrome_logo.gif"/></a> or <a href="http://www.opera.com"><img src="Opera-logo.png"/></a></p>';
	}
}

function setwebcam()
{
	
	var options = true;
	if(navigator.mediaDevices && navigator.mediaDevices.enumerateDevices)
	{
		try{
			navigator.mediaDevices.enumerateDevices()
			.then(function(devices) {
			  devices.forEach(function(device) {
				if (device.kind === 'videoinput') {
				  if(device.label.toLowerCase().search("back") >-1)
					options={'deviceId': {'exact':device.deviceId}, 'facingMode':'environment'} ;
				}
				console.log(device.kind + ": " + device.label +" id = " + device.deviceId);
			  });
			  setwebcam2(options);
			  
			  
			});
		}
		catch(e)
		{
			console.log(e);
		}
	}
	else{
		console.log("no navigator.mediaDevices.enumerateDevices" );
		setwebcam2(options);
	}
	
}

function setwebcam2(options)
{
	console.log(options);
	document.getElementById("result").innerHTML="- scanning -";
    if(stype==1)
    {
        setTimeout(captureToCanvas, 500);    
        return;
    }
    var n=navigator;
    document.getElementById("outdiv").innerHTML = vidhtml;
    v=document.getElementById("v");


    if(n.mediaDevices.getUserMedia)
    {
        n.mediaDevices.getUserMedia({video: options, audio: false}).
            then(function(stream){
                success(stream);
            }).catch(function(error){
                error(error)
            });
    }
    else
    if(n.getUserMedia)
	{
		webkit=true;
        n.getUserMedia({video: options, audio: false}, success, error);
	}
    else
    if(n.webkitGetUserMedia)
    {
        webkit=true;
        n.webkitGetUserMedia({video:options, audio: false}, success, error);
    }

    document.getElementById("qrimg").style.opacity=0.2;
    document.getElementById("webcamimg").style.opacity=1.0;

    stype=1;
    setTimeout(captureToCanvas, 500);
}

function setimg()
{
	document.getElementById("result").innerHTML="";
    if(stype==2)
        return;
    document.getElementById("outdiv").innerHTML = imghtml;
    //document.getElementById("qrimg").src="qrimg.png";
    //document.getElementById("webcamimg").src="webcam2.png";
    document.getElementById("qrimg").style.opacity=1.0;
    document.getElementById("webcamimg").style.opacity=0.2;
    var qrfile = document.getElementById("qrfile");
    qrfile.addEventListener("dragenter", dragenter, false);  
    qrfile.addEventListener("dragover", dragover, false);  
    qrfile.addEventListener("drop", drop, false);
    stype=2;
}
