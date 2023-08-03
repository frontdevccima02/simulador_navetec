<?php
require_once 'conexion.php';

$id = $_GET['id'];
$sel="SELECT * FROM desarrollo WHERE id_desarrollo = '$id'";
$res=mysqli_query($conexion,$sel);
$mos = mysqli_fetch_row($res);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./../css/all1.css">
  <title>Document</title>
</head>

<body style="background-color: #6f798b;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-11 col-sm-10 col-md-6 card p-5 mt-5 shadow rounded-lg">
        <form action="mod1.php" method="post">
          <div class="">
            <h1 class="text-primary-emphasis text-center fs-2" >Editar Contenido</h1>
            <div class="mb-3">
              <label for="" class="form-label text-secondary">Cluster</label>
              <input type="text" class="form-control" aria-describedby="helpId" placeholder="" value="<?php echo $mos[2]?>"
                name="cluster">
            </div>
            <div class="mb-3">
              <label for="" class="form-label text-secondary">Meses sin intereses</label>
              <input type="text" class="form-control" aria-describedby="helpId" placeholder="" value="<?php echo $mos[3]?>"
                name="mes1">
            </div>
            <div class="mb-3">
              <label for="" class="form-label text-secondary">Meses con 1er interes</label>
              <input type="text" class="form-control" aria-describedby="helpId" placeholder="" value="<?php echo $mos[4]?>"
                name="mes2">
            </div>
            <div class="mb-5">
              <label for="" class="form-label text-secondary">Meses con 2do interes</label>
              <input type="text" class="form-control" aria-describedby="helpId" placeholder="" value="<?php echo $mos[5]?>"
                name="mes3">
            </div>
      
            <div class="text-end">
              <button type="submit" class="btn btn-outline-primary deletedbt" data-bs-toggle="modal" data-bs-target="#del">
                Editar
              </button>
              <a href='./datos.php' class="btn btn-outline-danger editbtn text-danger" role="button">
                Cancelar
              </a>
            </div>
          </div>
        </form>

      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

</body>

</html>