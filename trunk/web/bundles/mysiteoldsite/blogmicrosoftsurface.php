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
        <h2>Microsoft Surface</h2> 
        <div class="author clear"><? echo $translator->getLocalisedText("wordBy");?>
            <a href="http://www.facebook.com/portfolio.cdominguez" title="Posts by Carlos Dominguez">Carlos Dominguez</a>&nbsp;&nbsp;|
            <a href="#" class="comments-link"  title="Comment on Weekly Plugin Reviews">5 <? echo $translator->getLocalisedText("wordComment");?></a>
        </div> 

        <p>
            <img src="images/blog/microsoftsurface/banner.png" alt="" title="wpplugin_big" width="550" height="200" class="aligncenter size-full wp-image-3469" />
				<p style="padding-left: 5px;">
					<img src="images/blog/microsoftsurface/ms1.png" alt="" title="Microsoft Surface" align="right" />
					<? echo $translator->getLocalisedText("blogMicrosoftSurfaceText");?>
					<img src="images/blog/microsoftsurface/ms2.png" alt="" title="Microsoft Surface"  />
				</p>
        </p> 

        <div class="buttonbox"></div> 

        <br /><br />
        <h3><? echo $translator->getLocalisedText("playvideo");?></h3>
        
        <!-- 1er Video -->
        <div style="width:565px;height:440px" >
			<object type="application/x-silverlight-2" data="data:application/x-silverlight-2," width="565" height="360" >
				<param name="source" value="http://www.microsoft.com/showcase/silverlight/player/1/player-en.xap" />
				<param name="initParams" value="Culture=en-US,Uuid=ff29de21-b598-45ed-8f70-6f3029821dc4,Autoplay=False,ShowMarketingOverlay=true,MiscControls=FullScreen;Detached,ShowMenu=True,Tabs=Embed;Email;Share;Info,ShowCaption=false,AgeGate=True,AgeGateDayMonthYearOrder=MDY,VideoUrl=http://www.microsoft.com/showcase/en/US/channels/surface,Mode=Player" />
				<param name="enableHtmlAccess" value="true" />
				<param name="allowHtmlPopupwindow" value="true" />
				<param name="background" value="#FF000000" />
				<param name="minRuntimeVersion" value="4.0.50401.0" />
				<param name="autoUpgrade" value="true" />
				<div>
					<a href="http://go.microsoft.com/fwlink/?LinkID=149156" style="text-decoration: none;" onmousedown="javascript:new Image().src = 'http://m.webtrends.com/dcsygm2gb10000kf9xm7kfvub_9p1t/dcs.gif?dcsdat=' + new Date().getTime() + '&dcssip=www.microsoft.com&dcsuri=' + window.location.href + '&WT.tz=-8&WT.bh=16&WT.ul=en-US&WT.cd=32&WT.jo=Yes&WT.ti=&WT.js=Yes&WT.jv=1.5&WT.fi=Yes&WT.fv=10.0&WT.sli=Not%20Installed&WT.slv=Version%20Unavailable&WT.dl=1&WT.seg_1=Not%20Logged%20In&WT.vt_f_a=2&WT.vt_f=2&WT.vt_nvr1=2&WT.vt_nvr2=2&WT.vt_nvr3=2&WT.vt_nvr4=2&vp_site=Embedded&wtEvtSrc=' + window.location.href + '&vp_sli=Embedded'">
						<img src="http://img.microsoft.com/showcase/Content/img/resx/en-US/installSL.gif" alt="Get Microsoft Silverlight" style="border-style: none"/>
					</a>
				</div>
				<div style='margin-top: -80px; text-align: center;'>
					<a style='text-align: center; color: #7db0d2; text-decoration: none; font-size: 80%; font-family: "Segoe UI", Segoe, Tahoma, Verdana, sans-serif;' href='mms://msnvidweb.wmod.msecnd.net/a10026/e1/ds/us/CMG_US/CMG_Microsoft/58b3aae4-7ccc-41c9-85c3-eb877a1546e2.wmv'>View this video as a WMV</a>
				</div>
				<noscript>
					<div>
						<img alt="DCSIMG" id="DCSIMG" width="1" height="1" src="http://m.webtrends.com/dcsygm2gb10000kf9xm7kfvub_9p1t/njs.gif?dcsuri=/nojavascript&amp;WT.js=No"/>
					</div>
				</noscript>
			</object>
		</div>
		<script type="text/javascript">
			document.write("<script type='text/javascript' src='" + (window.location.protocol) + "//c.microsoft.com/ms.js'><\/script>");
		</script>
        <!-- 1er Video -->
        
        <!-- 2do Video -->
        	<div style="width:565px;height:360px" ><object type="application/x-silverlight-2" data="data:application/x-silverlight-2," width="565" height="360" ><param name="source" value="http://www.microsoft.com/showcase/silverlight/player/1/player-en.xap" /><param name="initParams" value="Culture=en-US,Uuid=d390267f-afda-41eb-a606-820521be431d,Autoplay=False,ShowMarketingOverlay=true,MiscControls=FullScreen;Detached,ShowMenu=True,Tabs=Embed;Email;Share;Info,ShowCaption=false,AgeGate=True,AgeGateDayMonthYearOrder=MDY,VideoUrl=http://www.microsoft.com/showcase/en/US/details/d390267f-afda-41eb-a606-820521be431d,Mode=Player" /><param name="enableHtmlAccess" value="true" /><param name="allowHtmlPopupwindow" value="true" /><param name="background" value="#FF000000" /><param name="minRuntimeVersion" value="4.0.50401.0" /><param name="autoUpgrade" value="true" /><div><a href="http://go.microsoft.com/fwlink/?LinkID=149156" style="text-decoration: none;" onmousedown="javascript:new Image().src = 'http://m.webtrends.com/dcsygm2gb10000kf9xm7kfvub_9p1t/dcs.gif?dcsdat=' + new Date().getTime() + '&dcssip=www.microsoft.com&dcsuri=' + window.location.href + '&WT.tz=-8&WT.bh=16&WT.ul=en-US&WT.cd=32&WT.jo=Yes&WT.ti=&WT.js=Yes&WT.jv=1.5&WT.fi=Yes&WT.fv=10.0&WT.sli=Not%20Installed&WT.slv=Version%20Unavailable&WT.dl=1&WT.seg_1=Not%20Logged%20In&WT.vt_f_a=2&WT.vt_f=2&WT.vt_nvr1=2&WT.vt_nvr2=2&WT.vt_nvr3=2&WT.vt_nvr4=2&vp_site=Embedded&wtEvtSrc=' + window.location.href + '&vp_sli=Embedded'"><img src="http://img.microsoft.com/showcase/Content/img/resx/en-US/installSL.gif" alt="Get Microsoft Silverlight" style="border-style: none"/></a></div><div style='margin-top: -80px; text-align: center;'><a style='text-align: center; color: #7db0d2; text-decoration: none; font-size: 80%; font-family: "Segoe UI", Segoe, Tahoma, Verdana, sans-serif;' href='mms://msnvidweb.wmod.msecnd.net/a10026/e1/ds/us/CMG_US/CMG_Microsoft/9432e214-6f70-42d9-8e69-f0836407f1ad.wmv'>View this video as a WMV</a></div><noscript><div><img alt="DCSIMG" id="DCSIMG" width="1" height="1" src="http://m.webtrends.com/dcsygm2gb10000kf9xm7kfvub_9p1t/njs.gif?dcsuri=/nojavascript&amp;WT.js=No"/></div></noscript></object></div>
        <!-- 2do Video -->
    </div> 
    <!-- 1er blog Microsoft Surface -->
</div>
<?php include("footer.php"); ?>