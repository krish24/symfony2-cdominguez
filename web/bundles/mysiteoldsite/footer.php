				</div>	
				<div id="sidebar">
				    <div id="search">
				    	<div style="padding-left: 110px; padding-top: 35px;">
				    		<!-- Place this tag where you want the +1 button to render -->
							<g:plusone size="tall" href="http://cdominguez.tk/"></g:plusone>
							
							<!-- Place this tag after the last plusone tag -->
							<script type="text/javascript">
							  (function() {
							    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
							    po.src = 'https://apis.google.com/js/plusone.js';
							    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
							  })();
							</script>
							<font style="color: white;">Add +1</font>
				    	</div>
					</div>
					<!-- Blogs --> 
					<div id="fsjobs"> 
					  	<? 
					  		$headerTable = "";
							if ($translator->getLanguage() == 'en') {
			        			$headerTable= "fsjobs_header_projects_en";
			        		}else{
			        			$headerTable= "fsjobs_header_projects_es";
			        		}
						?>
						<div id="<? echo $headerTable?>"></div> 
						<div id="fsjobs_body"> 
					    <ul id="fsjobs_list">
							<li><a class="LinkCursor" href="proyecto1cenfoclubes.php" ><? echo $translator->getLocalisedText("blackboardProject1");?></a></li>
							<li><a class="LinkCursor" href="proyecto2ssl.php" ><? echo $translator->getLocalisedText("blackboardProject2Local");?></a></li>
							<li><a class="LinkCursor" href="proyecto2ssw.php" ><? echo $translator->getLocalisedText("blackboardProject2Web");?></a></li>
							<li><a class="LinkCursor" href="proyecto3game.php" ><? echo $translator->getLocalisedText("blackboardProject3");?></a></li>
							<li><a class="LinkCursor" href="proyecto4fonabe.php" ><? echo $translator->getLocalisedText("blackboardProject4");?></a></li>
						</ul>
					    <a href="myprojects.php" class="more_jobs" title="See All Projects"><? echo $translator->getLocalisedText("seeAll");?></a> 
					  </div> 
					</div> 
					<!-- [END] Blogs --> 
					
					<!-- Blogs --> 
					<div id="fsjobs"> 
					   
						<div id="fsjobs_header_blog"> 
							Carlos Dominguez Lara, Portafolio, Blog, Descargar Gratis Proyecto en C#, VB.NET, ASPX.NET
							The best portfolio, Carlos Dominguez Software Engineer.
						</div> 
						<div id="fsjobs_body"> 
					    <ul id="fsjobs_list"> 
					    	<li><a class="LinkCursor" href="blogmicrosoftsurface.php" >Microsoft Surface</a></li>
					    	<li><a class="LinkCursor" href="blogwindows8.php" ><? echo $translator->getLocalisedText("blogWindow8");?></a></li>
					    	<li><a class="LinkCursor" href="blogmicrosoftstrategy.php" ><? echo $translator->getLocalisedText("blogMicrosoftStrategy");?></a></li>
						</ul> 
					    <a href="myblogs.php" class="more_jobs" title="See All Projects"><? echo $translator->getLocalisedText("seeAll");?></a>
					  </div> 
					</div> 
					<!-- [END] Blogs --> 
				</div>
			</div>
			<!-- Inicio de la caja de comentarios de facebook -->
			<div id="FacebookComment" style="float: inherit;">
				<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="http://carlosdominguez.co.cc/" num_posts="3" width="850" colorscheme="light"></fb:comments>
			</div>
			<!-- Fin de la caja de comentarios de facebook -->
		</div>
		<div id="footer">
			<p>Copyright &copy;. All rights reserved. Design by <a class="LinkCursor" href="http://www.facebook.com/portfolio.cdominguez" target="_blank" title="Developer">Carlos Domínguez</a></p>																																																																		<div class="inner_copy"><a href="http://www.beautifullife.info/">beautiful</a><a href="http://www.grungemagazine.com/">grunge</a></div>
		</div>
	</div>
</body>
</html>