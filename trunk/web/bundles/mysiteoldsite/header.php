<?php
	include "Gestor.php";
	$gestor = new Gestor();

	//create an instance of SiteTranslator, the class keeps track of the user's language
	//preferences. Also it will handle language changes via the configurable GET variable
	require ("translator/SiteTranslator.php");
	$translator = new SiteTranslator();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html lang="<? echo $translator->getLanguage(); ?>" >

<!--

______________oo$$$$$$$$$$$$$$$$$$$$$$$$o 
_________oo$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$o 
_______o$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$o 
_____o$$$$$$$$$____$$$$$$$$$$$$$____$$$$$$$$$o 
____o$$$$$$$$$______$$$$$$$$$$$______$$$$$$$$$$o 
___$$$$$$$$$$$______$$$$$$$$$$$______$$$$$$$$$$$$ 
__$$$$$$$$$$$$$____$$$$$$$$$$$$$____$$$$$$$$$$$$$ 
_$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ 
o$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ 
$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ 
$$$$$__$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$___o$ 
_$$$$___$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$_____$$ 
__$$$$____"$$$$$$$$$$$$$$$$$$$$$$$$$$$$"______o$$ 
__"$$$o_____"""$$$$$$$$$$$$$$$$$$"$$"_________$$ $ 
____$$$o__________"$$""$$$$$$""""___________o$$$ 
_____$$$$o_________________oo_____________o$$$" 
______"$$$$o______o$$$$$$o"$$$$o________o$$$$ 
________"$$$$$oo_____""$$$$o$$$$$o___o$$$$"" 
___________""$$$$$oooo__"$$$o$$$$$$$$$""" 
______________""$$$$$$$oo $$$$$$$$$$ 
______________________""""$$$$$$$$$$$ 
__________________________$$$$$$$$$$$$ 
___________________________$$$$$$$$$$" 
_____________________________"$$$"""" 

	0100_____1100__0000100000000__0000___________00000 00000000_______000001
	0000_____0010__0010000000000__1110___________00000 00111100_______000001
	0000_____0101__0000000000000__0000___________00000 00000000_______000011
	0000_____1001__0000_____0000__0000___________0000_ ____0000_______011000
	0000_____1001__0000_____0000__0000___________0000_ ____0000_______000000
	0000_____0101__0000_____0000__0000___________0000_ ____0000_______001111
	0010_____0000__0000_____0000__0000___________0000_ ____0000_______000000
	0000000000000__0000_____0000__0000___________01110 00000000_______000000
	0001000100000__0010_____0000__0000___________00000 11111111_______000000
	0011111110000__0000_____0000__0000___________00000 00000000_______000000
	0000_____0000__0000_____0000__0000___________0000_ ____0000_____________
	1000_____0000__0000_____0000__0000___________0000_ ____0000_____________
	0000_____0000__0010_____0000__0000___________0000_ ____0000_____________
	0000_____0100__0000000000000__0000000000000__0000_ ____0000_______011111
	0000_____0000__0100000100000__1111111110000__0000_ ____0000_______001000
	0000_____0000__0000000000000__0000000000000__0000_ ____0000_______100000
	
	00000000000__000000000__0000____0000__0000__0000000000______00000_______0000000____0000__00000000000_______000000000000___
	00000000000__000000000__0000____0000__0000__0000000000_____0000000______00000000__00000__0000000000000____00000000000000__
	0000__00000__0000_______0000____0000________000000________000000000_____000000000_00000__00000____00000___00000____00000__
	00000000000__000000000___0000__0000___0000__000000_______00000000000____00000__00000000__00000____000000__00000____00000__
	0000__000____000000000____000__000____0000______000000__0000000000000___00000___0000000__00000____000000__00000____00000__
	0000__0000___0000_________00000000____0000______000000__00000___00000___00000____000000__00000____00000___00000000000000__
	0000__00000__000000000____00000000____0000__0000000000__00000___00000___00000_____00000__000000000000______000000000000___
	__________________________________________________________________________________________________________________________
	0000000_____0000000__0000_____________00000000000___000000000000___00000000000______0000___000000000000____000000000000___
	00000000___00000000__0000____________000000000000__00000000000000__0000000000000____0000__00000000000000__00000000000000__
	000000000_000000000__________________00000_________00000____00000__00000____00000_________00000____00000__00000____00000__
	00000__00000__00000__0000____________00000_________00000____00000__00000____000000__0000__00000____00000__00000____00000__
	00000___000___00000__0000____________00000_________00000____00000__00000____000000__0000__00000____00000__00000____00000__
	00000____0____00000__0000____________000000000000__00000____00000__00000____00000___0000__00000000000000__00000000000000__
	00000_________00000__0000_____________00000000000___000000000000___000000000000_____0000___0000000000000___000000000000___
	___________________________________________________________________________________________________00000
	___________________________________________________________________________________________________00000
	___________________________________________________________________________________________0000000000000
	___________________________________________________________________________________________000000000000  
	____________________________000000__
	____________________________000000__
	000000000__00000___00000____000000__
	000000000__00000___00000____000000__
	0000_______00000___00000____000000__
	000000000__0000000000000____000000__
	000000000__0000000000000____________
	0000_______00000___00000____000000__
	000000000__00000___00000____000000__
-->
	<head>
        <title>
	        <? echo $translator->getLocalisedText("title"); ?>
        </title>
        <!-- LINKS GENERALES -->
        <meta http-equiv="content-type" content="text/html; charset=<? echo $translator->getCharSet(); ?>">
        <link rel="icon" type="image/png" href="images/iconWeb.png" />
        <!-- LINKS GENERALES -->

        <!-- INICIO DE Metas de FACEBOOK -->
        <meta property="og:title" content="Carlos Dominguez - Web Site" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://cdominguez.tk/" />
        <meta property="og:image" content="http://cdominguez.tk/images/iconWeb.png" />
        <meta property="og:site_name" content="cdominguez.tk" />
        <meta property="fb:admins" content="100000248364632" />
        <meta property="og:description" content="Soy un Ingeniero en Desarrollo de Software, vivo en Costa Rica y gasto bastante de mi tiempo escribiendo para mi sitio web y desarrollando todo tipo de software." /> 
        <!-- FIN DE Metas de FACEBOOK -->

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script> 

        <!-- LINKS PARA LOS CSSs -->
        <link href="styles/slideshowIpod.css" rel="stylesheet" type="text/css" />
        <link href="styles/style.css" rel="stylesheet" type="text/css" />
        <link href="styles/beststyle.css" rel="stylesheet" type="text/css" />
        <!-- LINKS PARA LOS CSSs -->

        <!-- LINKS PARA LOS JS's -->    
        <script type="text/javascript" src="scripts/funciones.js" ></script>
        <script type="text/javascript" src="scripts/slideshowIpod.js" ></script>
        <script type="text/javascript" src="scripts/efectoFlip.js" ></script>
        <!-- LINKS PARA LOS JS's -->

        <!-- this section is the only one needed to run Shadowbox and FunnyZoom --> 
        <link rel="stylesheet" type="text/css" href="scripts/funnyzoom/style.css" /> 
        <script type="text/javascript" src="scripts/funnyzoom/script.js"></script> 
        <link rel="stylesheet" type="text/css" href="scripts/darkslideshow/shadowbox.css" /> 
        <script type="text/javascript" src="scripts/darkslideshow/shadowbox.js"></script> 

        <!-- LINK FOR CAROUSEL SLIDESHOW -->
        <script type="text/JavaScript" src="scripts/CorauselSlider/cloud-carousel.1.0.5.js"></script> 
        <link href="styles/CorauselSlider/CorauselSlider.css" rel="stylesheet" type="text/css" />
        <!-- LINK FOR CAROUSEL SLIDESHOW -->

        <!-- For the title of shared link  -->
        <meta name="title" content="About the author: Carlos Dominguez" />

        <!-- For the Description/Excerpt : -->
        <meta name="description" content="A software engineer living in San Jose, Costa Rica who spends most of his time writing for this site and developing software." />

        <!-- For Thumbnail Image : -->
        <link rel="image_src" href="images/iconWeb.png" />

        <!-- Inicio del Script para google Analytics -->
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-23907243-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
        <!-- Fin del Script para google Analytics -->

    </head>
    <body>
        <div id="pageflip">
        	<?php
        		$redirecTo = "";
        		$imgTranslate = "";
        		if ($translator->getLanguage() == 'en') {
        			$redirecTo = $_GET["original_url"].'?lang=es';
        			$imgTranslate = '<span class="msg_block" style="background: url(images/bg_flip_spanish.png) no-repeat right top;"></span>';
        		}else{
        			$redirecTo = $_GET["original_url"].'?lang=en';
        			$imgTranslate = '<span class="msg_block" style="background: url(images/bg_flip_english.png) no-repeat right top;"></span>';
        		}
        	?>
            <a class="HandFlipCursor" href="<? echo $redirecTo; ?>" >
                <img src="images/page_flip.png" alt="" border="none"/>
                <?
	                $visit = $gestor->obtenerVisitas();
	                echo $imgTranslate;
                ?>
            </a>
        </div>
		<div id="selectLenguage">
			<? echo $translator->getLocalisedText("selectLenguage");?>
		</div>
        <div id="FullContent">
            <div id="header">
			    <div id="titleSoftwareEnginner" align="center">
			    	<? echo $translator->getLocalisedText("titleHeaderPage");?>
			    </div>
		        <div id="downloadResume" align="center">
		        	<? echo $translator->getLocalisedText("infoResume");?>
		        </div>
                <div id="logo">
                    <a class="LinkCursor" href="contactme.php" target="_blank" title="send me a email!">
                        <img id="imgLogo" src="images/avatar.png" alt="send me a email!" border="0"/>
                    </a>
                </div>
                <? 
			  		$follow = "";
					if ($translator->getLanguage() == 'en') {
	        			$follow= "follow_en";
	        		}else{
	        			$follow= "follow_es";
	        		}
				?>
				<div id="<?php echo $follow?>">
                    <span></span>
                    <div id="outerContainer">
                        <div id="imageScroller">
                            <div id="viewer" class="js-disabled">
                                <a class="wrapperIpod" title="<? echo $translator->getLocalisedText("goFacebook"); ?>" href="http://www.facebook.com/portfolio.cdominguez" ><img id="Facebook" src="images/slideshowipod/logos/facebook.png" alt="Facebook" ></a>
                                <a class="wrapperIpod" title="<? echo $translator->getLocalisedText("goLinkedin"); ?>" href="http://www.linkedin.com/pub/carlos-dominguez/35/442/224" ><img class="logoIpod" id="Linkedin" src="images/slideshowipod/logos/linkedin.png" alt="Linkedin" ></a>
                                <a class="wrapperIpod" title="<? echo $translator->getLocalisedText("goTwitter");  ?>" href="http://twitter.com/krlosnando" ><img id="Twitter" src="images/slideshowipod/logos/twitter.png" alt="Twitter"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="NumOfVisit">
                    <? echo $visit; echo $translator->getLocalisedText("visit");?>
                </div>			
                <div id="message">
                    <a class="LinkCursor" href="contactme.php" target="_blank" title="send me a email!">
                        <img id="imgMessage" src="<? echo $translator->getLocalisedText("imgMessage");  ?>" alt="send me a email!" border="0"/>
                    </a>
                </div>																																													
                <ul id="menu">
                    <!-- Home -->
                    <li>
                        <a class="FontMenus" href="index.php" >
                        	<? echo $translator->getLocalisedText("home");?>
                        </a>
                    </li>
                    <!-- About Me -->
                    <li>
                        <a class="FontMenus" href="aboutme.php" >
	                        <? echo $translator->getLocalisedText("aboutMe");?>
                        </a>
                    </li>
                    <!-- Photos -->
                    <li>
                        <a class="FontMenus" href="photos.php">
                            <? echo $translator->getLocalisedText("photos");?>
                        </a>
                    </li>
                    <!-- My projects -->
                    <li>
                        <a class="FontMenus" href="myprojects.php" >
                            <? echo $translator->getLocalisedText("portfolio");?>
                        </a>
                    </li>
                    <!-- Blog -->
                    <li>
                        <a class="FontMenus" href="myblogs.php">
	                        Blog
                        </a>
                    </li>
                    <!-- Contact -->
                    <li>
                        <a class="FontMenus" href="contactme.php" >
                            <? echo $translator->getLocalisedText("contactMe");?>
                        </a>
                    </li>
                </ul>
                <map id ="circleMap" name="Map" >
                    <area shape="circle" alt="" coords="99, 92, 88" href="#" />
                </map>
            </div>
            <div id="content">
                <div id="subContent" style="float: inherit; height: 100%;">
                    <div id="ContenedorPrincipal">