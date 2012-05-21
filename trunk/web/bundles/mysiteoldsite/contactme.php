<?php include("header.php"); ?> 
	<div id="TopContenedorPrincipal" >
		<script type="text/javascript">  
			cambiarInnerHTMLXId('TopContenedorPrincipal', 'faceLikeBox.html');
		</script> 
	</div>
	<div id="BodyContenedorPrincipal">
		<br />
		<h3 class="bestPosth3" ><? echo $translator->getLocalisedText("contactMeTitle");?></h3> 
		<br />
		<div class="bestPost"> 
			<p>
				<? echo $translator->getLocalisedText("contactMeParagraph");?>
			</p> <br />
			<form action="contactme.php" method="post"> 
		        <label for="name-req"><? echo $translator->getLocalisedText("contactMeYourName");?></label> 
		        <input type="text" name="name-req" value="" style="width:60%;" /><small style='color: #dd0000;'>&nbsp;&laquo; <? echo $translator->getLocalisedText("wordRequired");?></small><br /><br /> 
		        <label for="email-req"><? echo $translator->getLocalisedText("contactMeYourEmail");?></label> 
		        <input type="text" name="email-req" value="" style="width:60%;" /><small style='color: #dd0000;'>&nbsp;&laquo; <? echo $translator->getLocalisedText("wordRequired");?></small><br /><br /> 
		        <label for="message-req"><? echo $translator->getLocalisedText("contactMeYourMessage");?></label><br /> 
		        <textarea name="message-req" rows="12" cols="" style="width:88%;" class="wmd-ignore"></textarea><small style='color: #dd0000;'>&nbsp;&laquo; <? echo $translator->getLocalisedText("wordRequired");?></small><br /><br /> 
		        <label>&nbsp;</label> 
		        <input type="submit" value="<? echo $translator->getLocalisedText("wordSend");?>" />				
		    </form> 
		</div>
		<?php
			//if (array_key_exists('email-req',$_POST)){
			if(isset($_POST['email-req'])){			
				$nomUser = $_POST['name-req'];
				$emailUser = $_POST['email-req'];
				$messageUser = $_POST['message-req'];
				$email_to = "krlosnando@gmail.com";
				
				//El gestor se crea en el archivo incluido "header.php"
				$gestor->enviarEmail($nomUser, $emailUser, $messageUser, $email_to);
				
				$message = "<div id='authorbox' class='clear fl'>";
				$message .= "<img alt='Email sended' src='images/email_send.png' class='avatar avatar-80 photo' height='80' width='90' />";          
				$message .= "<div class='authortext fl' >";
				$message .= "	<h4>Your email has been sent successfully</h4>";
		        $message .= "	<p class='clear'>To: ".$email_to."</p>";
		        $message .= "	<p class='clear'>From: ".$emailUser."</p>";
		        $message .= "	<p class='clear'>Message: ".$messageUser."</p>";
		        $message .= "	<p class='clear'><font color='blue'>Thank you for contacting me. I will be in touch with you very soon. </font></p>";
		        $message .= "	<p class='clear'><a href=''></a></p>";
		        $message .= "</div>";
		        $message .= "</div>";
				print $message;
			}
		?> 
	</div>
<?php include("footer.php"); ?>
