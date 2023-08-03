<?php
include_once 'conexion.php';

$desarrollo = $_POST['desarrollo'];
$cluster = $_POST['cluster'];
$mes1 = $_POST['mes1'];
$mes2 = $_POST['mes2'];
$mes3 = $_POST['mes3'];
$estado = "activo";

$insert = "INSERT INTO `desarrollo`(`desarrollo`, `cluster`, `messi`, `mes1`, `mes2`, `estado`) VALUES ('$desarrollo','$cluster','$mes1','$mes2','$mes3','$estado')";
$query = mysqli_query($conexion,$insert);

if($query){
    echo '<script language="javascript">alert("Los datos han sido ingresados con etsito");</script>';
    echo "<script>  window.location.href = 'datos.php'; </script>"; 
}else{
    echo '<script language="javascript">alert("Ijole eso si no se va a poder");</script>';
}
?>