<?php include("header.php"); ?> 
<div id="TopContenedorPrincipal" >
    <script type="text/javascript">  
        cambiarInnerHTMLXId('TopContenedorPrincipal', 'faceLikeBox.html');
    </script> 
</div>
<div id="BodyContenedorPrincipal">
    <div id="authorbox" class="clear fl">
        <div class="thedate"><div class="month">Edad</div><div class="day">19</div><div class="year">a&ntilde;os</div></div>
        <img alt="" src="images/carlos.jpg" class="avatar avatar-80 photo" height="130" width="80" />            
        <div class="authortext fl" >
        	<? echo $translator->getLocalisedText("aboutAutor");?>
        </div>
    </div>

    <div id="authorbox" class="clear fl">
        <h2><? echo $translator->getLocalisedText("technicalSkills");?></h2>
        <div class="description">
            <UL>  
                <li id="personalList">
                	<? echo $translator->getLocalisedText("technicalSkillsParagraph");?> 
                </li>
                <? echo $translator->getLocalisedText("programmingLanguage");?>
                <? echo $translator->getLocalisedText("designPattern");?>
                <? echo $translator->getLocalisedText("personalSkills");?>
            </UL>  
        </div>
  	</div>

    <div id="authorbox" class="clear fl">
        <h2><? echo $translator->getLocalisedText("academicHistory");?></h2>
        <div class="description">
            <UL>  
                <li id="personalList">
                    <? echo $translator->getLocalisedText("academicHistoryParagraph");?>
                    <UL>  
                        <li>
                        	<? echo $translator->getLocalisedText("summaryProyecto1");?>
                        </li>
                        <li>
                        	<? echo $translator->getLocalisedText("summaryProyecto2");?>
                        </li>
                    </UL>  
                </li>
            </UL>  
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
