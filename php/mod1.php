<?php
include_once 'conexion.php';


$cluster = $_POST['cluster'];
$mes1 = $_POST['mes1'];
$mes2 = $_POST['mes2'];
$mes3 = $_POST['mes3'];

$insert = "UPDATE desarrollo SET messi='$mes1',mes1='$mes2',mes2='$mes3' WHERE cluster = '$cluster'";
$query = mysqli_query($conexion,$insert);

if($query){
    echo '<script language="javascript">alert("Los datos han sido modificados con etsito");</script>';
    echo "<script>  window.location.href = 'datos.php'; </script>"; 
}else{
    echo '<script language="javascript">alert("Ijole eso si no se va a poder");</script>';
}

?>