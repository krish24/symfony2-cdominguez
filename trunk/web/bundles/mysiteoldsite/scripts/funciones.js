window.onload = function () {
    //Desaparecemos el mensaje al momento de cargarlo.
    fade("imgMessage");
    
    $('#imgLogo').mouseover(function() {
    	mouseOverFunc();
    });
    
    $('#imgLogo').mouseout(function() {
    	mouseOutFunc();
    });
    
    $('#imgMessage').mouseover(function() {
    	mouseOverFunc();
    });
    
    $('#imgMessage').mouseout(function() {
    	mouseOutFunc();
    });
}

//--------OCULTA Y MUESTRA UN DIV------------------------------------------------------------------
function showDiv(pid) {
	obj = document.getElementById(pid);
	obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
}

//--------CAMBIA EL CONTENIDO DE UN IFRAME---------------------------------------------------------
function cambiarIframes(names, href, newHeight){ 
	var iframes = window.parent.frames;
    for(var i=0;i<names.length;i++){ // Se recorre el arreglo
       iframes[names[i]].document.location.href = href;
       parent.document.getElementById(names[i]).height = newHeight;
    }
}

//--------CARGAR IFRAME CONTACT -------------------------------------------------------------------
function cargarIframeContact(){
	var html = "<iframe name='ContenedorPrincipalIFrame' id='ContenedorPrincipalIFrame' height='800px' src='IFrameContact.php' scrolling='no' width='731px' allowTransparency='true' frameborder='0'></iframe>";
	document.getElementById("BodyContenedorPrincipal").innerHTML=html;
}

//--------FUNCION QUE SE ENCARGA DE MOSTRAR EL SLIDESHOWS------------------------------------------
function iniciarSlideShow(){
	$(document).ready(function(){
		
		$("#da-vinci-carousel").CloudCarousel( { 
			reflHeight: 56,
			reflGap:2,
			titleBox: $('#da-vinci-title'),
			altBox: $('#da-vinci-alt'),
			buttonLeft: $('#but1'),
			buttonRight: $('#but2'),
			yRadius:40,
			xPos: 285,
			yPos: 120,
			speed:0.15,
			mouseWheel:false,				
			FPS:30,
			autoRotate: 'left',
			autoRotateDelay: 5200,
			speed:0.2,
			bringToFront:true
		});
			
	});
}
//--------FUNCION QUE SE ENCARGA DE CARGAR EL CONTENDIO DE LOS DIV---------------------------------
function cambiarInnerHTMLXId(idElement, pathNewHmtl){
	var HTML_FILE_URL = pathNewHmtl;
	$("#"+idElement).load(pathNewHmtl);
}
//--------FUNCION QUE SE ENCARGA DE CARGAR EL CONTENDIO DE LOS DIV---------------------------------

function cambiarIframes(names, href, newHeight){ 
	//parent.document.getElementById('ContenedorPrincipalIFrame').height = document['body'].offsetHeight;
	parent.document.getElementById('ContenedorPrincipalIFrame').height = newHeight;
	
	var iframes = window.parent.frames;
    for(var i=0;i<names.length;i++){ // Se recorre el arreglo
       iframes[names[i]].document.location.href = href;
    }
 }

function getFile(filename) {
    oxmlhttp = null;
    try {
        oxmlhttp = new XMLHttpRequest();
        oxmlhttp.overrideMimeType("text/xml");
    }
    catch (e) {
        try {
            oxmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            return null;
        }
    }
    if (!oxmlhttp) return null;
    try {
        oxmlhttp.open("GET", filename, false);
        oxmlhttp.send(null);
    }
    catch (e) {
        return null;
    }
    return oxmlhttp.responseText;
}

function mouseOverLi() {
	this.style.cursor='hand';
    //this.style.backgroundColor = "gainsboro";
}

function mouseOutLi() {
    this.style.backgroundColor = "white";
}

function mouseOverFunc() {
    //alert("MouseOverImg");
    fade("imgMessage");
   
}

function mouseOutFunc() {
    //alert("MouseOutImg");
    fade("imgMessage");
}

var TimeToFade = 1000.0;

function fade(eid) {
    var element = document.getElementById(eid);
    if (element == null)
        return;

    if (element.FadeState == null) {
        if (element.style.opacity == null
        || element.style.opacity == ''
        || element.style.opacity == '1') {
            element.FadeState = 2;
        }
        else {
            element.FadeState = -2;
        }
    }

    if (element.FadeState == 1 || element.FadeState == -1) {
        element.FadeState = element.FadeState == 1 ? -1 : 1;
        element.FadeTimeLeft = TimeToFade - element.FadeTimeLeft;
    }
    else {
        element.FadeState = element.FadeState == 2 ? -1 : 1;
        element.FadeTimeLeft = TimeToFade;
        setTimeout("animateFade(" + new Date().getTime() + ",'" + eid + "')", 33);
    }
}

function animateFade(lastTick, eid) {
    var curTick = new Date().getTime();
    var elapsedTicks = curTick - lastTick;

    var element = document.getElementById(eid);

    if (element.FadeTimeLeft <= elapsedTicks) {
        element.style.opacity = element.FadeState == 1 ? '1' : '0';
        element.style.filter = 'alpha(opacity = '
        + (element.FadeState == 1 ? '100' : '0') + ')';
        element.FadeState = element.FadeState == 1 ? 2 : -2;
        return;
    }

    element.FadeTimeLeft -= elapsedTicks;
    var newOpVal = element.FadeTimeLeft / TimeToFade;
    if (element.FadeState == 1)
        newOpVal = 1 - newOpVal;

    element.style.opacity = newOpVal;
    element.style.filter = 'alpha(opacity = ' + (newOpVal * 100) + ')';

    setTimeout("animateFade(" + curTick + ",'" + eid + "')", 33);
}

//----------Function to management Cookies----------------------------------------
function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}


//------------------------FUNCIONES DE PRUEBA-------------------------------------------
