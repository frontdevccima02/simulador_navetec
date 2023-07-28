<?php

include "conexion.php";	
$id = $_POST['id'];	



        mysqli_query ($conexion,"SET NAMES 'utf8'");		
        $query = $conexion -> query ("SELECT cluster FROM desarrollo WHERE desarrollo = '$id' AND `estado` = 'activo' ORDER BY cluster");
        echo " <option selected='selected' disabled='disabled'>Elije tu Condominio</option>";	
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores['cluster'].'">'.$valores['cluster'].'</option>';
            }
  

 

?>
  