<?php

include_once '../../db/confighost.php';
$database = new Config();
$db = $database->get_Connection();

include_once '../../db/ddsensores.php';
$product = new Data($db);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Agregar Clientes</title>

     <!-- CRUD C CREATE R RETRIEVE U UPDATE D DELETE BORRAR  -->
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

       <link rel="stylesheet" href="../../css/bootstrap.css">

    <!-- dtp abre -->
       <link rel="stylesheet" href="../../css/bootstrap.min.css" />
       <link rel="stylesheet" href="../../css/bootstrap-datepicker.min.css" />
       <script src="../../js/jquery.min.js"></script>
       <script src="../../js/bootstrap-datepicker.min.js"></script>
    <!-- dtp cierre -->


    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="../../css/styles.css" rel="stylesheet">

        <style type="text/css">
select{

  width:250px;
  padding:5px;
  border-radius:3px;
}
</style>
</head>
  <body>
<p><br></br></p>
<div class="container">
<p>
 <a class="btn btn-primary" href="clientes.php" role="button">Regresar</a>
</p><br></br>
<?php
if(isset($_POST['btnsave']))
{
  // $_POST TE REGRESA EL VALOR DE LA VARIABLE EN EL NAVEGADOR
  // escribir lo que esta escrito en la propiedad name del input

     $product->nombre = $_POST['nombre'];
     $product->telefono = $_POST['telefono'];
     $product->email = $_POST['email'];

       if($product->create())
      {
       ?>
<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
aria-hidden="true">&times;</span></button>
<strong>Success!</strong><a href="clientes.php">Mostrar Registros</a></div>

<!-- // quitar esto ">" en el span debe ser asi <span
aria-hidden="true"> -->
<?php
        }
      else
        {
?>


  </body>
</html>
