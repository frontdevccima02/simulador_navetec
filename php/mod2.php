<?php
include_once 'conexion.php';


$id = $_POST['id'];
$i1 = $_POST['i1'];
$i2 = $_POST['i2'];
$i3 = $_POST['i3'];


$insert = "UPDATE financiamiento SET financiamiento1='$i1',financiamiento2='$i2',financiamiento3='$i3' WHERE id_financiamiento = '$id'";
$query = mysqli_query($conexion,$insert);

if($query){
    echo '<script language="javascript">alert("Los datos han sido modificados con etsito");</script>';
    echo "<script>  window.location.href = 'datos2.php'; </script>"; 
}else{
    echo '<script language="javascript">alert("Ijole eso si no se va a poder");</script>';
}

?>