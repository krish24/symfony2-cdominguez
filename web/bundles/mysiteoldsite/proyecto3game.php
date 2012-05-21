<?php include("header.php"); ?> 
	<script type="text/javascript"> 
		Shadowbox.init({
			// a darker overlay looks better on this particular site
			overlayOpacity: 0.93
			// setupDemos is defined in assets/demo.js
		}, setupDemos);
		function setupDemos() {
			Shadowbox.setup("a.Patrones", {
				gallery:        "PatronesGame",
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
				<div class="month">Ene</div>
				<div class="day">04</div>
				<div class="year">2011</div>
			</div> 
			<h2><? echo $translator->getLocalisedText("fightGameTitle");?></h2> 
			<div class="author clear"><? echo $translator->getLocalisedText("wordBy");?>
				<a href="http://www.facebook.com/portfolio.cdominguez" title="Posts by Carlos Domínguez">Carlos Dominguez</a>&nbsp;&nbsp;|
				<a href="#" class="comments-link"  title="Comment on Weekly Plugin Reviews">3 <? echo $translator->getLocalisedText("wordComment");?></a>
			</div> 
			
			<p>
				<img src="images/proyecto3/banner.png" alt="" title="wpplugin_big" width="550" height="200" class="aligncenter size-full wp-image-3469" />
				<? echo $translator->getLocalisedText("fightGameParagraph");?>
			</p> 
				
			<div class="buttonbox"></div> 
			
			<div style=" width: 570px; height: 330px;">
				<br /><br />
				<h3><? echo $translator->getLocalisedText("wordProjectImages");?></h3>
				<div id="ContainerFunnyZoom" class="thumbs"> 
					<ul class="thumb"> 
						<li>
							<a href="images/proyecto3/big/pd1.png" class="Patrones" title="Playing">
								<img src="images/proyecto3/mini/pd1.png" alt="" title="Playing"/>
							</a>
						</li> 
						<li>
							<a href="images/proyecto3/big/pd2.jpg" class="Patrones" title="Class diagram of framework">
								<img src="images/proyecto3/mini/pd2.png" alt="" title="Class diagram of framework"/>
							</a>
						</li> 
						<li>
							<a href="images/proyecto3/big/bigproyecto3.png" class="Patrones" title="Preview">
								<img src="images/proyecto3/mini/miniproyecto3.png" alt="" title="Preview"/>
							</a>
						</li> 
					</ul> 
					<h3 class="LinkCursor" onclick="showDiv('game')" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">
						<br /><? echo $translator->getLocalisedText("wordPlayGame");?>
						<img src="images/playgame.png" alt="" title="Preview" align="middle"/>
					</h3>
				</div> 
			</div>
			
			<div id="game" style="display:none; border-style:solid; border-color: #C9E2F5; border-width: 4px; width: 570px; height: 500px;">
				<? echo $translator->getLocalisedText("waitLoadGame");?>
				<object type="application/x-shockwave-flash" data="images/proyecto3/Game.swf" width="570" height="480" >
					<embed src="images/proyecto3/Game.swf"  name="main-logo" />
				</object>
			</div>
			
			<h3 class="LinkCursor" >
				<br />
				<a target="_blank" style="color: black;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'" href="http://www.megaupload.com/?f=W2QXESLS">
					<? echo $translator->getLocalisedText("wordDownloadProject");?> (251 MB)
					<img src="images/imgdownload.png" alt="" title="Preview" align="middle"/>
				</a>
			</h3>
			<div class="LinkCursor">
				<br /><a href="http://www.megaupload.com/?d=7ESCQJY0" target="_blank">Carlos-Dominguez-ProyectoFinal-Beu2D.part1.rar (40 MB)</a>
				<br /><a href="http://www.megaupload.com/?d=RRGDWE6H" target="_blank">Carlos-Dominguez-ProyectoFinal-Beu2D.part2.rar (40 MB)</a>
				<br /><a href="http://www.megaupload.com/?d=0BBRMTTQ" target="_blank">Carlos-Dominguez-ProyectoFinal-Beu2D.part3.rar (40 MB)</a>
				<br /><a href="http://www.megaupload.com/?d=ADW46KJA" target="_blank">Carlos-Dominguez-ProyectoFinal-Beu2D.part4.rar (40 MB)</a>
				<br /><a href="http://www.megaupload.com/?d=965SX2N7" target="_blank">Carlos-Dominguez-ProyectoFinal-Beu2D.part5.rar (40 MB)</a>
				<br /><a href="http://www.megaupload.com/?d=D0HSGDGM" target="_blank">Carlos-Dominguez-ProyectoFinal-Beu2D.part6.rar (40 MB)</a>
				<br /><a href="http://www.megaupload.com/?d=POKCX2WX" target="_blank">Carlos-Dominguez-ProyectoFinal-Beu2D.part7.rar (11 MB)</a>
			</div>
		</div> 
		<!-- 1er proyecto Cenfoclubes en Cenfotec -->
	</div>
<?php include("footer.php"); ?>