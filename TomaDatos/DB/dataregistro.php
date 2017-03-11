<?php

class Data
{
	// Conexion con Base de Datos y el Nombre de la Tabla
	private $conn;
	private $table_name = "registros";

	// Propiedades del objeto
  public $idregistro;
	public $sensorfk;
	public $po;
	public $te;


    public function __construct($db)
	{
		$this->conn = $db;
	}

    function create()
    {

    $query = "insert into ". $this->table_name." values (null,?,?,?,now())";

     $stmt = $this->conn->prepare($query);

		 $stmt->bindParam(1, $this->sensorfk);
     $stmt->bindParam(2, $this->po);
     $stmt->bindParam(3, $this->te);


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
			$query ="select distinct idregistro,sensorfk,po,te,tiempo
			from
			registros as r
			inner join
			sensores as s
			on r.sensorpk = s.idsensor
			order by idregistro desc limit
			{$from_record_num},{$records_per_page}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }


	 // Usarlo para paginar registros
    public function countAll()
    {

       $query="select idregistro from ". $this->table_name . "";

     $stmt = $this->conn->prepare($query);
       $stmt->execute();

       $num = $stmt->rowCount();

     return $num;


      $query = "SELECT idregistro from " . $this->table_name . "";

        $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $num = $stmt->rowCount();

        return $num;

    }

}

?>
