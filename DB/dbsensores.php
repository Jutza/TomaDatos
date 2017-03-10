<?php

class Data
{
	// Conexion con Base de Datos y el Nombre de la Tabla
	private $conn;
	private $table_name = "sensores";

	// Propiedades del objeto
  public $idsensor;
	public $po;
	public $te;
	public $fecha;


    public function __construct($db)
	//function __construct($db)
	{
		$this->conn = $db;
	}

    // Creacion de los metodos o productos

    function create()
    {
       // Escribir el Query (La Consulta)

    $query = "insert into ". $this->table_name." values (null,?,?,?)";

     $stmt = $this->conn->prepare($query);


     $stmt->bindParam(1, $this->po);
     $stmt->bindParam(2, $this->te);
     $stmt->bindParam(3, $this->fecha);


       if ($stmt->execute())
       {
       	return true;
       }
       else {

        return false;
       }
   }

     // Leer Registros
    function readAll($page,$from_record_num,$records_per_page)
    {
			$query ="select distinct idsensor,po,te,fecha
from sensores
order by idsensor desc limit
{$from_record_num},{$records_per_page}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }


	 // Usarlo para paginar registros
    public function countAll()
    {

       $query="select idsensor from ". $this->table_name . "";

     $stmt = $this->conn->prepare($query);
       $stmt->execute();

       $num = $stmt->rowCount();

     return $num;


      $query = "SELECT idsensor from " . $this->table_name . "";

        $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $num = $stmt->rowCount();

        return $num;

    }

}

?>
