<?php  
				 
	if (!defined('CONN_DIR')) define('CONN_DIR',dirname(__FILE__));
	require_once(CONN_DIR."/../adodb/adodb.inc.php");
	
	class Conexion {
		private $servidor;
		private $nombreBD;
		private $user;
		private $password; 
		private $dbConn;
											
		function __construct() {
		    $this->servidor='localhost';
		    $this->nombreBD='venezuela_segura';
			$this->user='root';
			$this->password='';
			$this->dbConn=ADONewConnection('mysqli');
			$this->dbConn->Connect($this->servidor,$this->user,$this->password,$this->nombreBD);
		}
		
		function __destruct() {
		    $this->dbConn->Close();
		}
		
		function getDbConn() {
		    return $this->dbConn;
		}
	}

	//invertir fecha para BD sql 02-02-2015
	function invertir($fecha){
		return substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2);
	}
	//normaliza fecha para vizualizar 2015-06-02 00:00:00
	function normaliza($fecha){
		return substr($fecha, 8, 2)."-".substr($fecha, 5, 2)."-".substr($fecha, 0, 4);
	}
	//retorna mes en spanish
	function mes_($mes){
		switch ($mes) {
			case '01':
				$mes_letra = 'Enero';
				break;
			case '02':
				$mes_letra = 'Febrero';
				break;
			case '03':
				$mes_letra = 'Marzo';
				break;
			case '04':
				$mes_letra = 'Abril';
				break;
			case '05':
				$mes_letra = 'Mayo';
				break;
			case '06':
				$mes_letra = 'Junio';
				break;
			case '07':
				$mes_letra = 'Julio';
				break;
			case '08':
				$mes_letra = 'Agosto';
				break;
			case '09':
				$mes_letra = 'Septiembre';
				break;
			case '10':
				$mes_letra = 'Octubre';
				break;
			case '11':
				$mes_letra = 'Noviembre';
				break;
			case '12':
				$mes_letra = 'Diciembre';
				break;
		}
		return $mes_letra; 
		
	}

	//retorna mes en spanish
	function mes__($mes){
		switch ($mes) {
			case '1':
				$mes_letra = 'Enero';
				break;
			case '2':
				$mes_letra = 'Febrero';
				break;
			case '3':
				$mes_letra = 'Marzo';
				break;
			case '4':
				$mes_letra = 'Abril';
				break;
			case '5':
				$mes_letra = 'Mayo';
				break;
			case '6':
				$mes_letra = 'Junio';
				break;
			case '7':
				$mes_letra = 'Julio';
				break;
			case '8':
				$mes_letra = 'Agosto';
				break;
			case '9':
				$mes_letra = 'Septiembre';
				break;
			case '10':
				$mes_letra = 'Octubre';
				break;
			case '11':
				$mes_letra = 'Noviembre';
				break;
			case '12':
				$mes_letra = 'Diciembre';
				break;
		}
		return $mes_letra; 
		
	}

?>
