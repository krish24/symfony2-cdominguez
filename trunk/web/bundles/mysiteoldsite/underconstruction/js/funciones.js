window.onload = function () {
    //var lis = document.getElementById("carlos");
    var imgLogo = document.getElementById("imgLogo");
    var imgMessage = document.getElementById("imgMessage");

    imgLogo.onmouseover = mouseOverFunc;
    imgLogo.onmouseout = mouseOutFunc;
    imgMessage.onmouseover = mouseOverFunc;
    imgMessage.onmouseout = mouseOutFunc;

    //Desaparecemos el mensaje al momento de cargarlo.
    fade("imgMessage");
};

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
};

function mouseOverLi() {
    this.style.backgroundColor = "gainsboro";
};

function mouseOutLi() {
    this.style.backgroundColor = "white";
};

function mouseOverFunc() {
    //alert("MouseOverImg");
    fade("imgMessage");
   
};

function mouseOutFunc() {
    //alert("MouseOutImg");
    fade("imgMessage");
};

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