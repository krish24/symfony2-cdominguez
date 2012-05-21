<?php include("header.php"); ?> 
<script type="text/javascript"> 
    Shadowbox.init({
        // a darker overlay looks better on this particular site
        overlayOpacity: 0.93
        // setupDemos is defined in assets/demo.js
    }, setupDemos);
		
    function setupDemos() {
        Shadowbox.setup("a.windows8", {
            gallery:        "windows8",
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
        <h2><? echo $translator->getLocalisedText("blogWindow8");?></h2> 
        <div class="author clear"><? echo $translator->getLocalisedText("wordBy");?>	
            <a href="http://www.facebook.com/portfolio.cdominguez" title="Posts by Carlos Dominguez">Carlos Dominguez</a>&nbsp;&nbsp;|
            <a href="#" class="comments-link"  title="Comment on Weekly Plugin Reviews">25 <? echo $translator->getLocalisedText("wordComment");?></a>
        </div> 

        <p>
            <img src="images/blog/windows8/banner.png" alt="" title="wpplugin_big" width="550" height="200" class="aligncenter size-full wp-image-3469" />
				<p style="padding-left: 5px;">
					<? echo $translator->getLocalisedText("blogwindows8Text");?>
					<h1><? echo $translator->getLocalisedText("blogWindows8Support3D");?></h1>
					<img src="images/3dwindow8.jpg" alt="" title="Windows 8"  />
					
					<h1><? echo $translator->getLocalisedText("blogWindows8FaceDetection");?></h1>
					<br />
					<? echo $translator->getLocalisedText("blogwindows8TextFaceDetection");?>
					<img src="images/facedetection.png" alt="" title="Windows 8"  />
				</p>
        </p> 
 
        <div class="buttonbox"></div> 

        <br /><br />
        <h3><? echo $translator->getLocalisedText("playvideo");?></h3>
        
        <!-- 1er Video -->
        <h1>Microsoft Previews Windows 8 OS</h1><br />
		<object id="wsj_fp" width="512" height="363"><param name="movie" value="http://s.wsj.net/media/swf/VideoPlayerMain.swf"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><param name="flashvars" value="videoGUID={62CE4859-1C14-4426-BA42-382021346981}&playerid=1000&plyMediaEnabled=1&configURL=http://wsj.vo.llnwd.net/o28/players/&autoStart=false" base="http://s.wsj.net/media/swf/"name="flashPlayer"></param><embed src="http://s.wsj.net/media/swf/VideoPlayerMain.swf" bgcolor="#FFFFFF"flashVars="videoGUID={62CE4859-1C14-4426-BA42-382021346981}&playerid=1000&plyMediaEnabled=1&configURL=http://wsj.vo.llnwd.net/o28/players/&autoStart=false" base="http://s.wsj.net/media/swf/" name="flashPlayer" width="512" height="363" seamlesstabbing="false" type="application/x-shockwave-flash" swLiveConnect="true" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></embed></object>
        <!-- 1er Video -->
        
        <!-- 2do Video -->
        <h1><? echo $translator->getLocalisedText("blogWindow8");?></h1><br />
        <object width="512" height="363" id="msnbc3ed9fc" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0"><param name="movie" value="http://www.msnbc.msn.com/id/32545640" /><param name="FlashVars" value="launch=43245401&amp;width=512&amp;height=363" /><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="true" /><param name="wmode" value="transparent" /><embed name="msnbc3ed9fc" src="http://www.msnbc.msn.com/id/32545640" width="512" height="363" FlashVars="launch=43245401&amp;width=512&amp;height=363" allowscriptaccess="always" allowFullScreen="true" wmode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash"></embed></object>
        <!-- 2do Video -->
    </div> 
    <!-- 1er blog Microsoft Surface -->
</div>
<?php include("footer.php"); ?>