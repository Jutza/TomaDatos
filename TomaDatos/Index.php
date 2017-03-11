
<?php
include_once 'db/confighost.php';
$database = new Config();
$db = $database->get_Connection();
include_once 'db/dataregistro.php';
$product = new Data($db);
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Datos</title>
  </head>
  <body>

    <?php

    if ($_GET){
    	// $_POST TE REGRESA EL VALOR DE LA VARIABLE EN EL NAVEGADOR
    	// escribir lo que esta escrito en la propiedad name del input

           $product->sensorpk = $_GET['sensorpk'];
           $product->po = $_GET['po'];
           $product->te = $_GET['te'];
           $product->timepo = $_GET['tiempo'];
           if($product->create()) {
           ?>
           <div class="alert alert-success alert-dismissible" role="alert">


           <?php
                   }
                 else
                   {
                   }
                 }
           ?>

  </body>
</html>
