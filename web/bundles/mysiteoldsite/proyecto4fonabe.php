<?php include("header.php"); ?> 
	<script type="text/javascript"> 
		Shadowbox.init({
			// a darker overlay looks better on this particular site
			overlayOpacity: 0.93
			// setupDemos is defined in assets/demo.js
		}, setupDemos);
		function setupDemos() {
			Shadowbox.setup("a.Fonabe", {
				gallery:        "FonabeGallery",
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
			
		<!-- 4to proyecto en Fonabe -->
		<div class="bestPost"> 
			<div class="thedate">
				<div class="month">Feb</div>
				<div class="day">27</div>
				<div class="year">2011</div>
			</div> 
			<h2><? echo $translator->getLocalisedText("siabeFonabeTitle");?></h2> 
			<div class="author clear"><? echo $translator->getLocalisedText("wordBy");?>
				<a href="http://www.facebook.com/portfolio.cdominguez" title="Posts by Carlos Domínguez">Carlos Domínguez</a>&nbsp;&nbsp;|
				<a href="#" class="comments-link"  title="Comment on Weekly Plugin Reviews">5 <? echo $translator->getLocalisedText("wordComment");?></a>
			</div> 
			
			<p>
				<img src="images/proyecto4/banner.png" alt="" title="wpplugin_big" width="550" height="200" class="aligncenter size-full wp-image-3469" />
				<? echo $translator->getLocalisedText("siabeFonabeParagraph");?>
			</p> 
				
			<div class="buttonbox"></div> 
			
			<br /><br />
			<h3><? echo $translator->getLocalisedText("wordProjectImages");?></h3>
			<div id="ContainerFunnyZoom" class="thumbs"> 
				<ul class="thumb"> 
					<li>
						<a href="images/proyecto4/big/bigproyecto4.png" class="Fonabe" title="M&oacute;dulo para casos regulares">
							<img src="images/proyecto4/mini/miniproyecto4.png" alt="" title="M&oacute;dulo para casos regulares"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto4/big/siabe1.png" class="Fonabe" title="Menu Principal">
							<img src="images/proyecto4/mini/siabe1.png" alt="" title="Menu Principal"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto4/big/siabe2.png" class="Fonabe" title="M&oacute;dulo para casos de escuelas y colegios">
							<img src="images/proyecto4/mini/siabe2.png" alt="" title="M&oacute;dulo para casos de escuelas y colegios"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto4/big/siabe3.png" class="Fonabe" title="Vista de resulatados">
							<img src="images/proyecto4/mini/siabe3.png" alt="" title="Vista de resulatados"/>
						</a>
					</li> 
					<li>
						<a href="images/proyecto4/big/siabe4.png" class="Fonabe" title="M&oacute;dulo para casos de universidad">
							<img src="images/proyecto4/mini/siabe4.png" alt="" title="M&oacute;dulo para casos de universidad"/>
						</a>
					</li> 
				</ul> 
			</div> 
		</div> 
		<!-- 4to proyecto en Fonabe -->
	</div>
<?php include("footer.php"); ?>