<?php
require_once 'conexion.php';

$id = $_GET['id'];

echo $id;

$delete = "UPDATE desarrollo SET estado='inactivo' WHERE id_desarrollo = '$id'";
$query = mysqli_query($conexion,$delete);

if($query){
    echo '<script language="javascript">alert("Los datos han sido eliminados con éxito");</script>';
    echo "<script>  window.location.href = 'datos.php'; </script>"; 
}else{
    echo '<script language="javascript">alert("Ijole eso si no se va a poder");</script>';
}
?>