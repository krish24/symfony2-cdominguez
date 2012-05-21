<?php include("header.php"); ?> 
<script type="text/javascript"> 
    Shadowbox.init({
        // a darker overlay looks better on this particular site
        overlayOpacity: 0.93
        // setupDemos is defined in assets/demo.js
    }, setupDemos);
		
    function setupDemos() {
        Shadowbox.setup("a.cenfoclubes", {
            gallery:        "CenfoClubes",
            continuous:     true,
            counterType:    "skip"
        });
    }
</script> 
<div id="TopContenedorPrincipal" >
    <script type="text/javascript">  
        cambiarInnerHTMLXId('TopContenedorPrincipal', 'faceLikeBox.html');
    </script> 
</div>
<div id="BodyContenedorPrincipal">
    <!-- 1er proyecto Cenfoclubes en Cenfotec -->
    <div class="bestPost"> 
        <div class="thedate">
            <div class="month">Abr</div>
            <div class="day">01</div>
            <div class="year">2010</div>
        </div> 
        <h2>Cenfoclubes Manager</h2> 
        <div class="author clear"><? echo $translator->getLocalisedText("wordBy");?> 	
            <a href="http://www.facebook.com/portfolio.cdominguez" title="Posts by Carlos Dominguez">Carlos Dominguez</a>&nbsp;&nbsp;|
            <a href="#" class="comments-link"  title="Comment on Weekly Plugin Reviews">3 <? echo $translator->getLocalisedText("wordComment");?></a>
        </div> 

        <p>
            <img src="images/proyecto1/banner.png" alt="" title="wpplugin_big" width="550" height="200" class="aligncenter size-full wp-image-3469" />
			<? echo $translator->getLocalisedText("cenfoclubesParagraph");?>
        </p> 

        <div class="buttonbox"></div> 

        <br /><br />
        <h3><? echo $translator->getLocalisedText("wordProjectImages");?></h3>
        <div id="ContainerFunnyZoom" class="thumbs"> 
            <ul class="thumb"> 
                <li>
                    <a href="images/proyecto1/big/cfc0.png" class="cenfoclubes" title="Main for the administrator">
                        <img src="images/proyecto1/mini/cfc0.png" alt="" title="Main for the administrator"/>
                    </a>
                </li> 
                <li>
                    <a href="images/proyecto1/big/cfc1.png" class="cenfoclubes" title="Module to register a new instructor">
                        <img src="images/proyecto1/mini/cfc1.png" alt="" title="Module to register a new instructor"/>
                    </a>
                </li> 
                <li>
                    <a href="images/proyecto1/big/cfc2.png" class="cenfoclubes" title="Search an instructor">
                        <img src="images/proyecto1/mini/cfc2.png" alt="" title="Search a new instructor"/>
                    </a>
                </li> 
                <li>
                    <a href="images/proyecto1/big/cfc3.png" class="cenfoclubes" title="Assign an instructor">
                        <img src="images/proyecto1/mini/cfc3.png" alt="" title="Assign an instructor"/>
                    </a>
                </li> 
                <li>
                    <a href="images/proyecto1/big/cfc4.png" class="cenfoclubes" title="Module to register a new college">
                        <img src="images/proyecto1/mini/cfc4.png" alt="" title="Module to register a new college"/>
                    </a>
                </li> 
                <li>
                    <a href="images/proyecto1/big/cfc5.png" class="cenfoclubes" title="List of all registered instructors">
                        <img src="images/proyecto1/mini/cfc5.png" alt="" title="List of all registered instructors"/>
                    </a>
                </li> 
                <li>
                    <a href="images/proyecto1/big/cfc6.png" class="cenfoclubes" title="List of all registered college">
                        <img src="images/proyecto1/mini/cfc6.png" alt="" title="List of all registered college"/>
                    </a>
                </li> 
                <li>
                    <a href="images/proyecto1/big/cfc7.png" class="cenfoclubes" title="Module Help">
                        <img src="images/proyecto1/mini/cfc7.png" alt="" title="Module Help"/>
                    </a>
                </li> 
                <li>
                    <a href="images/proyecto1/big/cfc8.png" class="cenfoclubes" title="User login">
                        <img src="images/proyecto1/mini/miniproyecto1.png" alt="" title="User login"/>
                    </a>
                </li> 
            </ul> 
        </div>  
        
        <h3 class="LinkCursor" >
			<br />
			<a target="_blank" style="color: black;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'" href="http://www.megaupload.com/?d=AELICBI7">
				<? echo $translator->getLocalisedText("wordDownloadProject");?> (5 MB)
				<img src="images/imgdownload.png" alt="" title="Preview" align="middle"/>
			</a>
		</h3>
		<div class="LinkCursor">
			<br /><a href="http://www.megaupload.com/?d=AELICBI7" target="_blank">Link - Vision_SD_Carlos_Dominguez_Cenfoclubes (5 MB)</a>
		</div>
    </div> 
    <!-- 1er proyecto Cenfoclubes en Cenfotec -->
</div>
<?php include("footer.php"); ?>