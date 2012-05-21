<?php include("header.php"); ?> 
<script type="text/javascript"> 
    Shadowbox.init({
        // a darker overlay looks better on this particular site
        overlayOpacity: 0.93
        // setupDemos is defined in assets/demo.js
    }, setupDemos);
		
    function setupDemos() {
        Shadowbox.setup("a.microsoftsurface", {
            gallery:        "microsoftsurface",
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

    <!-- 1er blog Microsoft Surface -->
    
    <div class="bestPost"> 
        <div class="thedate">
            <div class="month">Agost</div>
            <div class="day">08</div>
            <div class="year">2011</div>
        </div> 
        <h2>La estrategia de microsoft</h2> 
        <div class="author clear">by 	
            <a href="http://www.facebook.com/portfolio.cdominguez" title="Posts by Carlos Dominguez">Carlos Dominguez</a>&nbsp;&nbsp;|
            <a href="#" class="comments-link"  title="Comment on Weekly Plugin Reviews">5 comments</a>
        </div> 

        <p>
            <img src="images/blog/microsoftstrategy/banner.png" alt="" title="wpplugin_big" width="550" height="200" class="aligncenter size-full wp-image-3469" />
				<p style="padding-left: 5px;">
					<img src="images/blog/microsoftstrategy/img1.png" alt="" title="Microsoft Surface" align="right" />
					<? echo $translator->getLocalisedText("blogMicrosoftStrategyText");?>
					<img src="images/blog/microsoftstrategy/img2.png" alt="" title="Microsoft Surface"  />
				</p>
        </p> 

        <div class="buttonbox"></div> 
    </div> 
    <!-- 1er blog Microsoft Surface -->
</div>
<?php include("footer.php"); ?>