<?php include("header.php"); ?>
	
<!-- LINKS FOR GALLERY-->
<link href="styles/photogallery/skins/tn3/tn3.css" rel="stylesheet" type="text/css" />
<script src="scripts/photogallery/jquery.tn3lite.min.js"  type="text/javascript" ></script> 

<!--  initialize the TN3 when the DOM is ready -->
<script type="text/javascript">
	$(document).ready(function() {
		//Thumbnailer.config.shaderOpacity = 1;
		var tn1 = $('.mygallery').tn3({
			skinDir:"styles/photogallery/skins/",
			imageClick:"fullscreen",
			image:{
				maxZoom:3.5,
				crop:true,
				clickEvent:"dblclick",
				transitions:[{
				type:"fade"
				},{
				type:"grid"
				},{
				type:"grid",
				duration:460,
				easing:"easeInQuad",
				gridX:1,
				gridY:8,
				// flat, diagonal, circle, random
				sort:"random",
				sortReverse:false,
				diagonalStart:"bl",
				// fade, scale
				method:"fade",
				partDuration:160,
				partEasing:"easeOutSine",
				partDirection:"left"
				}]
			}
		});
	});
</script>
<div id="TopContenedorPrincipal" >
    <script type="text/javascript">  
        cambiarInnerHTMLXId('TopContenedorPrincipal', 'faceLikeBox.html');
    </script> 
</div>
<div id="BodyContenedorPrincipal" >
 	<div id="authorboxbackground" >
        <h2>Cenfotec (2011)</h2><br />
		    <div class="mygallery">
				<div class="tn3 album">
				    <ol>
					<li>
					    <h4></h4>
					    <div class="tn3 description"></div>
					    <a href="images/photos/big/carlos dominguez lara (10).jpg">
						<img src="images/photos/mini/carlos dominguez lara (10).jpg" />
					    </a>
					</li>
				    <li>
					    <h4></h4>
					    <div class="tn3 description"></div>
					    <a href="images/photos/big/carlos dominguez lara (1).jpg">
						<img src="images/photos/mini/carlos dominguez lara (1).jpg" />
					    </a>
					</li>
					<li>
					    <h4></h4>
					    <div class="tn3 description"></div>
					    <a href="images/photos/big/carlos dominguez lara (2).jpg">
						<img src="images/photos/mini/carlos dominguez lara (2).jpg" />
					    </a>
					</li>
					<li>
					    <h4></h4>
					    <div class="tn3 description"></div>
					    <a href="images/photos/big/carlos dominguez lara (3).jpg">
						<img src="images/photos/mini/carlos dominguez lara (3).jpg" />
					    </a>
					</li>
					<li>
					    <h4></h4>
					    <div class="tn3 description"></div>
					    <a href="images/photos/big/carlos dominguez lara (4).jpg">
						<img src="images/photos/mini/carlos dominguez lara (4).jpg" />
					    </a>
					</li>
					<li>
					    <h4></h4>
					    <div class="tn3 description"></div>
					    <a href="images/photos/big/carlos dominguez lara (5).jpg">
						<img src="images/photos/mini/carlos dominguez lara (5).jpg" />
					    </a>
					</li>
					<li>
					    <h4></h4>
					    <div class="tn3 description"></div>
					    <a href="images/photos/big/carlos dominguez lara (6).jpg">
						<img src="images/photos/mini/carlos dominguez lara (6).jpg" />
					    </a>
					</li>
					<li>
					    <h4></h4>
					    <div class="tn3 description"></div>
					    <a href="images/photos/big/carlos dominguez lara (7).jpg">
						<img src="images/photos/mini/carlos dominguez lara (7).jpg" />
					    </a>
					</li>
					<li>
					    <h4></h4>
					    <div class="tn3 description"></div>
					    <a href="images/photos/big/carlos dominguez lara (8).jpg">
						<img src="images/photos/mini/carlos dominguez lara (8).jpg" />
					    </a>
					</li>
					<li>
					    <h4></h4>
					    <div class="tn3 description"></div>
					    <a href="images/photos/big/carlos dominguez lara (9).jpg">
						<img src="images/photos/mini/carlos dominguez lara (9).jpg" />
					    </a>
					</li>
				    </ol>
				</div>
		    </div>
  	</div>
</div>
<?php include("footer.php"); ?>