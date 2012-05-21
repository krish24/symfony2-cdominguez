<?php
/*
M�dulo: 				AccesoDatos
Prop�sito:			Servir de capa de acceso a datos y abstraer al 
programador de los detalles del motor de base de datos con el que 
se conecta
Creado por:			Laura Monge Izaguirre
Fecha de creaci�n:	26-Jun-2008
Fecha de �ltima 
modificaci�n:		26-Jun-2008
Bit�cora de modificaciones:

*/
class AccesoDatos{	

	var $connection;
	//carlosdominguez.zxq.net connection
//	var $db_host="localhost";
//	var $db_name="carlosdominguez_zxq_db";
//	var $username="495972_carlos";
//	var $password="000797";
		
	//http://carlosdominguez.cu.cc/
	//var $db_host="mysql.binhoster.com";
	//var $db_name="u786916849_db";
	//var $username="u786916849_user";
	//var $password="000797";
	
	//http://carlosdominguez.co.cc/
	//var $db_host="mysql.binhoster.com";
	//var $db_host="localhost";
	//var $db_name="u476963084_bd";
	//var $username="u476963084_user";
	//var $password="000797";
	
	//http://cdominguez.tk/
	//var $db_host="mysql.binhoster.com";
	var $db_host="mysql.binhoster.com";
	var $db_name= "u110257736_db";
	var $username="u110257736_user";
	var $password="000797";
	
	/*
	Entrada:			Ninguna
	Salida:			Ninguna
	Precondici�n:	Ya se construy� la base de datos y se configur�
	el ODBC
	Funcionamiento:	Se establece la cadena de conexi�n con la base
	de datos
	*/
	public function AccesoDatos(){	}
	
	/*
	Entrada:			$psql : Sentencia de SQL con la inserci�n, el
	borrado, la modificaci�n o consulta de la base de datos
	Salida:			$rs : ResultSet que almacena el resultado de 
	la consulta, cuando aplique
	Precondici�n:	La conexi�n con la base de datos est� correctamente
	configurada
	Funcionamiento:	Se conecta con la base de datos, se ejecuta la 
	sentencia.  Dentro del proceso se verifica si la conexi�n se estableci�n
	y si la sentencia se ejecut� con �xito
	*/
	public function ejecutarSQL($psql){	
		//echo "ingresa a ejecutarSQL";
		$this->connection=mysql_connect($this->db_host,$this->username,$this->password);
		mysql_select_db($this->db_name, $this->connection);
		
		if(!$this->connection){
			exit("Fall� la conexi�n:<br>".$this->connection);
		}			
		//echo $psql;
		$rs= mysql_query($psql);		
		
		if (!$rs){
			exit("Error al ejecutar la sentencia");
		}
		
//		echo "el rs es: ".$rs;
		return $rs;
	}
	
	public function executeSQLOnly($psql){
		//echo "ingresa a ejecutarSQL";
		$this->connection=mysql_connect($this->db_host,$this->username,$this->password);
		mysql_select_db($this->db_name, $this->connection);
		
		if(!$this->connection){
			exit("Fall� la conexi�n:<br>".$this->connection);
		}			
		//echo $psql;
		//echo $psql;
		//echo "<script>alert('mysql_query();	')</script>";
		mysql_query($psql);	
	}
	
	/*
	Entrada:			Ninguna
	Salida:			Ninguna
	Precondici�n:	La conexi�n con la base de datos se encuentra
	abierta
	Funcionamiento:	Se cierra la conexi�n con la base de datos
	*/
	public function cerrarConexion(){
		//odbc_close($this->connection);
		mysql_close($this->connection);
	}
	
}

?>