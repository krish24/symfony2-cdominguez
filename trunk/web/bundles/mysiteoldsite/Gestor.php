<?php
/********************************************************************************************************************************************
 * Módulo:  Gestor
 * Propósito: Servir de capa lógica de negocios, es decir, servir
 * de interfaz de servicios y orquestador de procesos
 * Creado por: Carlos Domínguez Lara
 ********************************************************************************************************************************************/
include "AccesoDatos.php";

class Gestor {
	
	//Constructor del Gestor.
	function Gestor() {
		$this->acceso = new AccesoDatos ( );
	}
	
	/********************************************************************************************************************************************
	 * Funcion que se encarga de verificar si una IP ya existe en la base de datos.
	 * Entrada (parametros): $pIP
	 * Salidas (retorna): 1 ó 0
	 ********************************************************************************************************************************************/
	
	public function existeIP($pIP) {
		$sql = "";
		$rs = false;
		$numIP = 0;
		$sql = "SELECT count(id) as Result from TVisitor WHERE ip = '" . $pIP . "'";
		//$sql = "SELECT id, ip, country, dateVisit, numVisit from TVisitor; ";
		//echo $sql;
		$rs = $this->acceso->ejecutarSQL ( $sql );
		
		while ( $row = mysql_fetch_array ( $rs ) ) {
			$numIP = $row ['Result'];
		}
		
		$this->acceso->cerrarConexion ();
		return $numIP;
	}
	
	/********************************************************************************************************************************************
	 * Método que se encarga de aumentar una visita de una IP.
	 * Entrada (parametros): $pIP
	 ********************************************************************************************************************************************/
	
	public function aumentarVisita($pIP) {
		//Actualizamos la variable que lleva el control de visitas.
		$sql = "UPDATE TVisitor SET numVisit = numVisit + 1 WHERE IP = '" . $pIP . "'; ";
		//echo $sql;
		$this->acceso->executeSQLOnly ( $sql );
		
		//Registramos la visita.
		$sql = "insert into TVisitorVisit(ip, dateVisit) values('".$pIP."', DATE_SUB(NOW(), INTERVAL 2 HOUR));";
		$this->acceso->executeSQLOnly ( $sql );
		
		$this->acceso->cerrarConexion ();
	}
	
	/********************************************************************************************************************************************
	 * Método que se encarga de obtener el nombre de la ciudad y el nombre del pais que visita la Web
	 * Entrada (parametros): $ipAddr
	 ********************************************************************************************************************************************/
	
	public function countryCityFromIP($ipAddr) {
		//function to find country and city name from IP address
		//Developed by Roshan Bhattarai 
		//Visit http://roshanbh.com.np for this script and more.
		

		//verify the IP address for the  
		ip2long ( $ipAddr ) == - 1 || ip2long ( $ipAddr ) === false ? trigger_error ( "Invalid IP", E_USER_ERROR ) : "";
		// This notice MUST stay intact for legal use
		$ipDetail = array (); //initialize a blank array
		
		try {
			//echo "inicion del : file_get_contents.";
			//get the XML result from hostip.info
			$xml = file_get_contents ( "http://api.hostip.info/?ip=" . $ipAddr );
			
			//echo "fin del : file_get_contents.";
			//get the city name inside the node <gml:name> and </gml:name>
			preg_match ( "@  <gml:name>(.*?)</gml:name>@si", $xml, $match );
			//print $xml;
			//assing the city name to the array
			$ipDetail ['city'] = $match [1];
			
			//get the country name inside the node <countryName> and </countryName>
			preg_match ( "@<countryName>(.*?)</countryName>@si", $xml, $matches );
			//assign the country name to the $ipDetail array 
			$ipDetail ['country'] = $matches [1];
			//get the country name inside the node <countryName> and </countryName>
			preg_match ( "@<countryAbbrev>(.*?)</countryAbbrev>@si", $xml, $cc_match );
			$ipDetail ['country_code'] = $cc_match [1]; //assing the country code to array
			//return the array containing city, country and country code
		}catch(ErrorException $e){
			$ipDetail ['city'] = "Exception";
			$ipDetail ['country'] = "El inutil servidor lo bloqueo";
			$ipDetail ['country_code'] = "Error"; //assing the country code to array
			//echo "Atrapo la Exepcion.";
		}
		return $ipDetail;
	}
	
	/********************************************************************************************************************************************
	 * Método que se encarga de registrar los datos de una IP nueva.
	 * Entrada (parametros): --
	 ********************************************************************************************************************************************/
	
	public function registrarVisita($pIP, $pPais, $pCiudad, $pCodigoPais) {
		$sql = "insert into TVisitor(ip, country, dateVisit, numVisit) values('".$pIP."', '".$pPais." (".$pCodigoPais."), ".$pCiudad."', DATE_SUB(NOW(), INTERVAL 2 HOUR), 1);";
		
		//echo "IP:".$pIP." Direccion:'".$pIP."', '".$pPais." (".$pCodigoPais."), ".$pCiudad."'";
		//echo $sql;
		$this->acceso->executeSQLOnly ( $sql );
		$this->acceso->cerrarConexion ();
	}
	
	/********************************************************************************************************************************************
	 * Método que se encarga de cargar el número de visitas a la pagina.
	 * Entrada (parametros): --
	 ********************************************************************************************************************************************/
	
	public function obtenerVisitas(){
		$sql = "SELECT COUNT(ip) as NumOfVisit FROM TVisitor;";
		$rs = $this->acceso->ejecutarSQL ( $sql );
		
		while ( $row = mysql_fetch_array ( $rs ) ) {
			$numOfVisit = $row ['NumOfVisit'];
		}
		
		$this->acceso->cerrarConexion ();
		return $numOfVisit;
	}
	
	/********************************************************************************************************************************************
	 * Método que se encarga de enviar un correo electronico.
	 * Entrada (parametros): 
	 *  - 
	 ********************************************************************************************************************************************/
	public function enviarEmail($pNomUser, $email_from, $pMessageUser, $email_to){
		// EDIT THE 1 LINES BELOW AS REQUIRED
		$email_subject = "New e-mail from carlosdominguez.co.cc / ".$email_from;
		$email_web = "myemail@carlosdominguez.co.cc";
		
		function died($error) {
			//your error code can go here
			echo "We are very sorry, but there were error(s) found with the form your submitted. ";
			echo "These errors appear below.<br /><br />";
			echo $error."<br /><br />";
			echo "Please go back and fix these errors.<br /><br />";
			die();
		}
		
		$error_message = "";
		$email_exp = "^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$";
  
		if(!eregi($email_exp,$email_from)) {
		  	$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
		}
			
	  	if(strlen($error_message) > 0) {
	  		died($error_message);
	  	}
	  	
		$email_message = "Form details below.\n\n";
		
		function clean_string($string) {
	  		$bad = array("content-type","bcc:","to:","cc:","href");
	  		return str_replace($bad,"",$string);
		}
	
		$date = date('m/d/Y h:i:s a', time());
		$email_message .= "Email: ".clean_string($email_from)."\n";
		$email_message .= "Nombre: ".$pNomUser."\n";
		$email_message .= "Message: ".$pMessageUser."\n\n";
		$email_message .= $date;

		 //create email headers
		$headers = 'From: '.$email_web."\r\n".
		'Reply-To: '.$email_web."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		
		mail($email_to, $email_subject, $email_message, $headers);  
	}
}
?>