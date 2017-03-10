<?php

class Config
{
// Especificar tus propias credenciales de base Datos
private $host = "localhost";
private $db_name = "registros";
private $username = "root";
private $password = "123123";
public $conn;

// Obtener La Conexion a la Base de Datos

    // get the database connection
    public function get_Connection()
    {

  $this->conn = null;

  try {
         $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" .$this->db_name, $this->username, $this->password);

   } catch (PDOException $exception) {
   	echo "Error de Conexion: ". $exception->getMessage();

   }

       return $this->conn;

}
}
?>
