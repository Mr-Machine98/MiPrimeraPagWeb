<?php
//Conexión a la base de datos
// Utilizo xamp la contraseña es vacia
class basedatos{
    private $Servidor = "mysql:host=localhost";
	private $Sesion = "root";
	private $Contrasena = "";
	private $Instancia = "registro_figuras_ecuacion"; // AQUÍ FALTA LA BASE DE DATOS
	private $Conexion; //Mantiene la conexión con la base de datos
    private $Lectura; //Mantiene el puntero de consulta de la tabla
    //CONECTAR LA BASE DE DATOS
    public function Conectar(){
		if (isset($this->Conexion)) return true; //Si ya está definida la conexión
		try {		
			//Usando PDO (PHP Data Objects) para conectarse.
			//Parámetros: "mysql:host:servidor;dbname=instancia", "usuario", "contraseña", codificación de caracteres
		
			//$Conexion será un Database Handle(manejador de la base de datos)
			$this->Conexion = new PDO($this->Servidor.";dbname=".$this->Instancia, $this->Sesion, $this->Contrasena, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		} catch (PDOException $UnError){
			echo $UnError->getMessage();
			return false;
		}		
		return true;
    }
    //PREPARA LA SENTENCIA
    public function PrepararLectura($SQL){
		$this->Conectar();
		$this->Lectura = $this->Conexion->prepare($SQL);
		$this->Lectura->execute(); //Ejecuta la consulta
    }
    //TRAER LOS REGISTROS
    public function TraeRegistroARegistro(){
		return $this->Lectura->fetch();
	}

	//Insertar valores en la base de datos de la tabla cuadrado
	public function PrepararEscrituraCuadrado($SQL, $l1, $l2){
		$this->Conectar();
		$this->Lectura = $this->Conexion->prepare($SQL);
		$this->Lectura->execute(array(':l1'=> $l1, ':l2' => $l2)); //Ejecuta la consulta
	}

	//Insertar valores en la base de datos de la tabla triangulo
	public function PrepararEscrituraTriangulo($SQL, $l1, $l2, $l3){
		$this->Conectar();
		$this->Lectura = $this->Conexion->prepare($SQL);
		$this->Lectura->execute(array(':l1'=> $l1, ':l2' => $l2, ':l3' => $l3)); //Ejecuta la consulta
	}
	//Insertar valores en la base de datos de la tabla cubo
	public function PrepararEscrituraCubo($SQL, $l1){
		$this->Conectar();
		$this->Lectura = $this->Conexion->prepare($SQL);
		$this->Lectura->execute(array(':l1'=> $l1)); //Ejecuta la consulta
	}
		//Insertar valores en la base de datos de la tabla esfera
		public function PrepararEscrituraEsfera($SQL, $l1){
			$this->Conectar();
			$this->Lectura = $this->Conexion->prepare($SQL);
			$this->Lectura->execute(array(':l1'=> $l1)); //Ejecuta la consulta
		}
		
	

	//borra un registro específico por parámetro
	public function borraEsteRegistro($SQL, $id){
		$this->Conectar();
		$this->Lectura = $this->Conexion->prepare($SQL);
		$this->Lectura->execute(array(':id' => $id));
	}

	//Insertar valores en la base de datos de la tabla ecuacion
	public function PrepararEscrituraEcuacion($SQL, $a, $b, $c, $d, $e){
		$this->Conectar();
		$this->Lectura = $this->Conexion->prepare($SQL);
		$this->Lectura->execute(array(':a' => $a, ':b' => $b, ':c' => $c, ':d' => $d, ':e' => $e,)); //Ejecuta la consulta
	}
	



}

