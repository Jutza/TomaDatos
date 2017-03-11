
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

           $product->sensorpk = $_GET['sensorfk'];
           $product->po = $_GET['po'];
           $product->te = $_GET['te'];
           if($product->create()) {
           ?>
           <div class="alert alert-success alert-dismissible" role="alert"></div>

           <?php
            }
              else
                   {
                     ?>
                     <div class="alert alert-danger alert-dismissible" role="alert"></div>
                     <?php
                   }
                 }
           ?>

  </body>
</html>
