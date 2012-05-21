<?php include("header.php"); ?> 
	<script type="text/javascript"> 
		Shadowbox.init({
			// a darker overlay looks better on this particular site
			overlayOpacity: 0.93
			// setupDemos is defined in assets/demo.js
		}, setupDemos);
		
		function setupDemos() {
			Shadowbox.setup("a.ssw", {
				gallery:        "ssw",
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
		<!-- 2do proyecto SSW en Cenfotec -->
		<div class="bestPost"> 
			<div class="thedate">
				<div class="month">Nov</div>
				<div class="day">18</div>
				<div class="year">2010</div>
			</div> 
			<h2><? echo $translator->getLocalisedText("surveySystemWebTitle");?></h2> 
			<div class="author clear"><? echo $translator->getLocalisedText("wordBy");?>
				<a href="http://www.facebook.com/portfolio.cdominguez" title="Posts by Carlos Domínguez">Carlos Domínguez</a>&nbsp;&nbsp;|
				<a href="#" class="comments-link"  title="Comment on Weekly Plugin Reviews">4 <? echo $translator->getLocalisedText("wordComment");?></a>
			</div> 
			
			<p>
				<img src="images/proyecto2/ssw/banner.png" alt="" title="wpplugin_big" width="550" height="200" class="aligncenter size-full wp-image-3469" />
				<? echo $translator->getLocalisedText("surveySystemWebParagraph");?>
			</p> 
				
		    <div class="buttonbox"></div> 
		    
		    <br /><br />
		    <h3><? echo $translator->getLocalisedText("wordProjectImages");?></h3>
			<div id="ContainerFunnyZoom" class="thumbs"> 
				<ul class="thumb"> 
					<li>
						<a href="images/proyecto2/ssw/big/ssw0.png" class="ssw" title="Recover password">
							<img src="images/proyecto2/ssw/mini/ssw0.png" alt="" title="Recover password"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto2/ssw/big/ssw1.png" class="ssw" title="Survey analysis">
							<img src="images/proyecto2/ssw/mini/ssw1.png" alt="" title="Survey analysis"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto2/ssw/big/ssw2.png" class="ssw" title="Survey analysis">
							<img src="images/proyecto2/ssw/mini/ssw2.png" alt="" title="Survey analysis"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto2/ssw/big/ssw3.png" class="ssw" title="Administration of survey questions">
							<img src="images/proyecto2/ssw/mini/ssw3.png" alt="" title="Administration of survey questions"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto2/ssw/big/ssw4.png" class="ssw" title="Evaluation of the survey">
							<img src="images/proyecto2/ssw/mini/ssw4.png" alt="" title="Evaluation of the survey"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto2/ssw/big/ssw5.png" class="ssw" title="Page to login and answer a survey">
							<img src="images/proyecto2/ssw/mini/ssw5.png" alt="" title="Page to login and answer a survey"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto2/ssw/big/ssw6.png" class="ssw" title="Answering a survey">
							<img src="images/proyecto2/ssw/mini/ssw6.png" alt="" title="Answering a survey"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto2/ssw/big/ssw7.png" class="ssw" title="User Login">
							<img src="images/proyecto2/ssw/mini/ssw7.png" alt="" title="User Login"/>
						</a>
					</li>
					<li>
						<a href="images/proyecto2/ssw/big/ssw8.png" class="ssw" title="Tabulation of open questions">
							<img src="images/proyecto2/ssw/mini/ssw8.png" alt="" title="Tabulation of open questions"/>
						</a>
					</li>
					<li>
						<a href="images/proyecto2/ssw/big/ssw9.png" class="ssw" title="Tabulation of open questions">
							<img src="images/proyecto2/ssw/mini/ssw9.png" alt="" title="Tabulation of open questions"/>
						</a>
					</li>
					<li>
						<a href="images/proyecto2/ssw/big/ssw10.png" class="ssw" title="Email notifications to the user">
							<img src="images/proyecto2/ssw/mini/ssw10.png" alt="" title="Email notifications to the user"/>
						</a>
					</li>
					<li>
						<a href="images/proyecto2/ssw/big/ssw11.png" class="ssw" title="Creating a questionnaire">
							<img src="images/proyecto2/ssw/mini/ssw11.png" alt="" title="Creating a questionnaire"/>
						</a>
					</li>
					<li>
						<a href="images/proyecto2/ssw/big/ssw12.png" class="ssw" title="Preview a survey">
							<img src="images/proyecto2/ssw/mini/ssw12.png" alt="" title="Preview a survey"/>
						</a>
					</li>
					<li>
						<a href="images/proyecto2/ssw/big/ssw13.png" class="ssw" title="Homepage">
							<img src="images/proyecto2/ssw/mini/ssw13.png" alt="" title="Homepage"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto2/ssw/big/ssw14.png" class="ssw" title="Graphics for the survey">
							<img src="images/proyecto2/ssw/mini/ssw14.png" alt="" title="Graphics for the survey"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto2/ssw/big/ssw15.png" class="ssw" title="Report of the survey">
							<img src="images/proyecto2/ssw/mini/ssw15.png" alt="" title="Report of the survey"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto2/ssw/big/sswclases.png" class="ssw" title="Class diagram of the project">
							<img src="images/proyecto2/ssw/mini/sswclases.png" alt="" title="Class diagram of the project"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto2/ssw/big/sswdatabase.png" class="ssw" title="Database model of the project">
							<img src="images/proyecto2/ssw/mini/sswdatabase.png" alt="" title="Database model of the project"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto2/ssw/big/bigproyecto2web.png" class="ssw" title="Answering a survey">
							<img src="images/proyecto2/ssw/mini/miniproyecto2web.png" alt="" title="Answering a survey"/>
						</a>
					</li> 
				</ul> 
			</div>  
			
			<h3 class="LinkCursor" >
				<br />
				<a target="_blank" style="color: black;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'" href="http://www.megaupload.com/?f=O6K269JD">
					<? echo $translator->getLocalisedText("wordDownloadProject");?> (389 MB)
					<img src="images/imgdownload.png" alt="" title="Preview" align="middle"/>
				</a>
			</h3>
			<div class="LinkCursor">
				<br /><a href="http://www.megaupload.com/?d=HISIQU81" target="_blank">Carlos-Dominguez-Proyecto2-Web-Local.part01.rar (40 MB)</a>
				<br /><a href="http://www.megaupload.com/?d=28F1BMZF" target="_blank">Carlos-Dominguez-Proyecto2-Web-Local.part02.rar (40 MB)</a>
				<br /><a href="http://www.megaupload.com/?d=DPS7BE1X" target="_blank">Carlos-Dominguez-Proyecto2-Web-Local.part03.rar (40 MB)</a>
				<br /><a href="http://www.megaupload.com/?d=YF10B95E" target="_blank">Carlos-Dominguez-Proyecto2-Web-Local.part04.rar (40 MB)</a>
				<br /><a href="http://www.megaupload.com/?d=BV0E02MZ" target="_blank">Carlos-Dominguez-Proyecto2-Web-Local.part05.rar (40 MB)</a>
				<br /><a href="http://www.megaupload.com/?d=J7SKSKZN" target="_blank">Carlos-Dominguez-Proyecto2-Web-Local.part06.rar (40 MB)</a>
				<br /><a href="http://www.megaupload.com/?d=JIK98E80" target="_blank">Carlos-Dominguez-Proyecto2-Web-Local.part07.rar (11 MB)</a>
				<br /><a href="http://www.megaupload.com/?d=C7403A0V" target="_blank">Carlos-Dominguez-Proyecto2-Web-Local.part08.rar (40 MB)</a>
				<br /><a href="http://www.megaupload.com/?d=5GXT7O0D" target="_blank">Carlos-Dominguez-Proyecto2-Web-Local.part09.rar (40 MB)</a>
				<br /><a href="http://www.megaupload.com/?d=C9H5UWZJ" target="_blank">Carlos-Dominguez-Proyecto2-Web-Local.part10.rar (29 MB)</a>
			</div>
		</div> 
		<!-- 2do proyecto ssw en Cenfotec -->
	</div>
<?php include("footer.php"); ?>