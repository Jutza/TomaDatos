<!-- abrir lo que contiene codigo php-->
<?php
// Se mostrara la pagina donde la pagina se este usando
echo "<nav><ul class=\"pagination\">";

// Colocacion del Boton para mostrar la primer Pagina
     if ($page>1) {
     echo "<li><a href='{$page_dom}' title='Dirigete a la primer Pagina.'>";
          echo "&laquo;";
     echo "</a></li>";     
     }
 
// Contar Todos los registros en la BD Para Calcular El Total de Paginas
     $total_rows = $product->countAll();
	 // es $product   no $producto
	 
     $total_pages = ceil($total_rows / $records_per_page);
	 
	// rango de Filas o Registros por Mostrar
     $range = 2;

 // Mostrar los puntos  para el rango de paginas alrededor de la pagina actual
     $initial_num = $page - $range;
     $condition_limit_num = ($page + $range)  + 1;

     for ($x=$initial_num; $x<$condition_limit_num; $x++)
     {
     // Para estar seguro '$x debe ser mayor que cero y menor o igual al total de paginas'
         if (($x > 0) && ($x<= $total_pages))
         {
			 
         // Pagina Actual
         	if ($x == $page)
         	{
               echo "<li class='active'><a href=\"#\">$x</a></li>";
         	}
             // si no es la actual pagina
         	else
         	{
              echo "<li><a href='{$page_dom}?page=$x'>$x</a></li>";
			  // le falto el "$" al page_dom
         	}
         }
     }  

     // boton para dirigirme a la ultima pagina
     if ($page<$total_pages)
     {
       echo "<li><a href='" .$page_dom . "?page={$total_pages}' title='La ultima Pagina es {$total_pages}.'>";
       echo "&raquo;";
       echo "</a><li>";
     }     
       echo "</ul></nav>";
?>
