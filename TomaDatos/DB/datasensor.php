<?php

/**
*
*/
class Data
{
	// Conexion con Base de Datos y el Nombre de la Tabla
	private $conn;
	private $table_name = "sensores";

	// Propiedades del objeto
  public $idsensor;
	public $foliof;
	public $prodf;
	public $cantidad;


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


     $stmt->bindParam(1, $this->foliof);
     $stmt->bindParam(2, $this->prodf);
     $stmt->bindParam(3, $this->cantidad);

       if ($stmt->execute()) {
       	return true;
       } else {
        return false;
       }
   }

     // Leer Registros
    function readAll($page,$from_record_num,$records_per_page)
    {

   $query ="
	select distinct d.det,d.foliof,c.nomb_cli,c.ap_cli,c.am_cli,d.prodf,p.producto,d.cantidad
from
detalles as d
inner join
facturas as f
on d.foliof=f.folio
inner join
productos as p
on
p.prod=d.prodf
inner join
clientes as c
on
c.cli=f.clif
order by d.det asc
limit {$from_record_num},{$records_per_page}";


	    $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }


	 // Usarlo para paginar registros
    public function countAll()
    {

       $query="select det from ". $this->table_name . "";

	   $stmt = $this->conn->prepare($query);
       $stmt->execute();

       $num = $stmt->rowCount();

	   return $num;


    }


    // Usarlo Cuando Queramos Actualizar la Tabla con sus registros
    function readOne()
    {
	$query="
	select d.det,d.foliof,c.nomb_cli,c.ap_cli,c.am_cli,d.prodf,p.producto,d.cantidad
from
detalles as d
inner join
facturas as f
on d.foliof=f.folio
inner join
productos as p
on
p.prod=d.prodf
inner join
clientes as c
on
c.cli=f.clif
where d.det = ?";

       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(1, $this->det);


       $stmt->execute();

       // Crea el vinculo con la BD y Muestra los registros existentes
       $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // en las llaves "[ ]" van los nombres de atributos de BD.
         $this->det= $row['det'];
	   $this->foliof = $row['foliof'];
	   $this->prodf = $row['prodf'];
     $this->cantidad = $row['cantidad'];

    }


      // Funcion para Actualizar o Modificar los registros en BD.
      function update()
      {

	$query="update
					" . $this->table_name . "
				set
					foliof = :fo,
					prodf = :pr,
          cantidad = :ca
          	where
					 det= :id";




          $stmt = $this->conn->prepare($query);

     $stmt->bindParam(':id', $this->det);
	   $stmt->bindParam(':fo', $this->foliof);
     $stmt->bindParam(':pr', $this->prodf);
     $stmt->bindParam(':ca', $this->cantidad);

       // ejecuta el query (la Consulta)
       if ($stmt->execute()) {
       	return true;

       } else {
        //var_dump($stmt->errorInfo());
        return false;
       }

      }


 // Funcion para Eliminar los registros en BD.
      function delete()
      {
           $query="delete from " . $this->table_name . " where det = ?";
     $stmt = $this->conn->prepare($query);
     $stmt->bindParam(1, $this->det);

       // ejecuta el query (la Consulta)
       if ($stmt->execute()) {
       	return true;
       } else {
        return false;
       }
      }
}

?>
