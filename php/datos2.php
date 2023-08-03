<?php
require_once 'conexion.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./../css/all1.css">
    <title>Desglose de Intereses por Clúster</title>
</head>

<body style="background-color: #6f798b;">
    <div class="container">
        <div class="row">
            <div class="col-12 card p-5 mt-5 shadow">
                <h1 class="text-primary-emphasis text-center fs-2 mb-5"> Desglose de Intereses por Cluster </h1>

                <div class="table_res">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table table-header">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Meses sin intereses</th>
                                    <th scope="col">Primer interés</th>
                                    <th scope="col">Segundo Interés</th>
                                    <th scope="col">Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $sel="SELECT * FROM financiamiento WHERE 1";
                        $res=mysqli_query($conexion,$sel);
                        while($mos=mysqli_fetch_row($res)){?>
                                <tr class=""></tr>
                                <td><?php echo $mos[0]; ?></td>
                                <td><?php echo $mos[1]; ?></td>
                                <td><?php echo $mos[2]; ?></td>
                                <td><?php echo $mos[3]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary deletedbt"
                                        data-bs-toggle="modal" data-bs-target="#del">
                                        <?php echo "<a href='datos3.php?id=".$mos[0]."'>Modificar</a>";  ?>
                                    </button>
                                </td>
                                </td>
                                </tr>
                                <?php
                        }
                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>