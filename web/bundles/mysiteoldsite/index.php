<?php include("header.php"); ?> 
<?php
    //ELIMINAMOS LOS WARINING CON EL SIGUIENTE BLOQUE DE CODIGO.
    //***************************************************************************************
    function handleError($errno, $errstr, $errfile, $errline, array $errcontext) {
        //error was suppressed with the @-operator
        if (0 === error_reporting()) {
            return false;
        }

        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    }

    set_error_handler('handleError');
    //****************************************************************************************
    //La variable $gestor se crea en el archivo Incluido "header.php".
    $existeIP = $gestor->existeIP($_SERVER['REMOTE_ADDR']);

    if ($existeIP == 1) {
        $gestor->aumentarVisita($_SERVER['REMOTE_ADDR']);
    } else {
        $IPDetail = $gestor->countryCityFromIP($_SERVER['REMOTE_ADDR']);
        $gestor->registrarVisita($_SERVER['REMOTE_ADDR'], $IPDetail['country'], $IPDetail['city'], $IPDetail['country_code']);
    }
?> 
<script type="text/javascript">  
    iniciarSlideShow();
</script> 
<script type="text/javascript"> 
    function setupDemos() {
        Shadowbox.setup("a.mustang-gallery", {
            gallery:        "mustang",
            continuous:     true,
            counterType:    "skip"
        });
    }
		
    Shadowbox.init({
        // a darker overlay looks better on this particular site
        overlayOpacity: 0.93
        // setupDemos is defined in assets/demo.js
    }, setupDemos);
</script> 
<div id="TopContenedorPrincipal" >
    <div id="fb-root"></div>
	<script src="http://connect.facebook.net/<? echo $translator->getLocalisedText("localeFacebook");?>/all.js#appId=174004469328039&amp;xfbml=1"></script> 
	<fb:like-box href="http://www.facebook.com/portfolio.cdominguez" height="250" width="570" colorscheme="light" show_faces="true" border_color="white" stream="false" header="false"></fb:like-box>
</div>
<div id="BodyContenedorPrincipal">
    <h3 class="bestPosth3" ><? echo $translator->getLocalisedText("myProjects");?></h3> 
    <div id="da-vinci-carousel" class="thumbs" style="width: 570px; height: 384px; background: url(images/carousel/bg1.jpg); overflow: scroll;">

        <!-- Imagen 1 -->
        <a href="images/proyecto1/big/cfc8.png" title="Cenfoclubes" class="mustang-gallery">
            <img class="cloudcarousel"
                 src="images/proyecto1/mini/miniproyecto1.png" width="209" height="158"
                 alt="<? echo $translator->getLocalisedText("miniProyecto1");?>"
                 title="Cenfoclubes" />
        </a> 
        <!-- Imagen 2 -->
        <a href="images/proyecto2/ssl/big/bigproyecto2local.png" title="<? echo $translator->getLocalisedText("surveyManagerTitleLocal");?>" class="mustang-gallery">
            <img class="cloudcarousel"
                 src="images/proyecto2/ssl/mini/miniproyecto2local.png" width="209" height="158"
                 alt="<? echo $translator->getLocalisedText("surveyManager");?>"
                 title="<? echo $translator->getLocalisedText("surveyManagerTitleLocal");?>" />
        </a> 
        <!-- Imagen 3 -->
        <a href="images/proyecto2/ssw/big/bigproyecto2web.png" title="<? echo $translator->getLocalisedText("surveyManagerTitleWeb");?>" class="mustang-gallery">
            <img class="cloudcarousel"
                 src="images/proyecto2/ssw/mini/miniproyecto2web.png" width="209" height="158"
                 alt="<? echo $translator->getLocalisedText("surveyManager");?>"
                 title="<? echo $translator->getLocalisedText("surveyManagerTitleWeb");?>" />
        </a> 
        <!-- Imagen 4 -->
        <a href="images/proyecto3/big/bigproyecto3.png" title="<? echo $translator->getLocalisedText("desingPatterns");?>" class="mustang-gallery">
            <img class="cloudcarousel"
                 src="images/proyecto3/mini/miniproyecto3.png" width="209" height="158"
                 alt="<? echo $translator->getLocalisedText("miniProyecto3");?>"
                 title="<? echo $translator->getLocalisedText("desingPatterns");?>" />
        </a> 
        <!-- Imagen 5 -->
        <a href="images/proyecto4/big/bigproyecto4.png" title="<? echo $translator->getLocalisedText("miniProyecto4Title");?>" class="mustang-gallery">
            <img class="cloudcarousel"
                 src="images/proyecto4/mini/miniproyecto4.png" width="209" height="158"
                 alt="<? echo $translator->getLocalisedText("miniProyecto4");?>"
                 title="<? echo $translator->getLocalisedText("miniProyecto4Title");?>" />
        </a>  

        <div id="da-vinci-title"></div>
        <div id="da-vinci-alt"></div>

        <div id="but1" class="carouselLeft" style="position: absolute; top: 20px; right: 64px;"></div>
        <div id="but2" class="carouselRight" style="position: absolute; top: 20px; right: 20px;"></div>
    </div>
    <br />
    <div id="authorbox" class="clear fl" style="float: inherit;">
        <div class="thedate"><div class="month">Edad</div><div class="day">19</div><div class="year">a&ntilde;os</div></div>
        <img alt='' src='images/carlos.jpg' class='avatar avatar-80 photo' height='130' width='80' />            
        <div class="authortext fl" >
        	<? echo $translator->getLocalisedText("aboutAutor");?>
        </div>
    </div>

    <div id="authorbox" class="clear fl" style="float: inherit;">
        <h2><? echo $translator->getLocalisedText("technicalSkills");?></h2>
        <div class="description">
            <UL>  
                <li id="personalList">
                	<? echo $translator->getLocalisedText("technicalSkillsParagraph");?> 
                </li>
                <? echo $translator->getLocalisedText("programmingLanguage");?>
            </UL>  
        </div>
        <p class="more-info"><span></span><a class="LinkCursor" href="aboutme.php"><? echo $translator->getLocalisedText("readMore");?></a></p> 
    </div>
</div>
<?php include("footer.php"); ?>