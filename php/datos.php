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
    <link rel="stylesheet" href="./../css/all2.css">
    <title>Desglose de Intereses por Cluster</title>
</head>

<body style="background-color: #6f798b;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-md-12 card mt-5 p-5">

                <div class="">
                    <h1 class="text-primary-emphasis text-center fs-2 mb-5"> Desglose de Intereses por Cluster </h1>
                    <div class="text-end mb-5">
                        <button type="button" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
                            Agregar
                        </button>
                    </div>                    
                    <div class="table_res">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table table-header">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Desarrollo</th>
                                        <th scope="col">Cluster</th>
                                        <th scope="col">Meses Sin Intereses</th>
                                        <th scope="col">Meses con 1er Interes</th>
                                        <th scope="col">Meses con 2do Interes</th>
                                        <th scope="col">Modificar</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                    <?php
                                        $sel="SELECT * FROM desarrollo WHERE estado = 'activo'";
                                        $res=mysqli_query($conexion,$sel);
                                        while($mos=mysqli_fetch_row($res)){?>
                                                    <tr class=""></tr>
                                    <td><?php echo $mos[0]; ?></td>
                                    <td><?php echo $mos[1]; ?></td>
                                    <td><?php echo $mos[2]; ?></td>
                                    <td><?php echo $mos[3]; ?></td>
                                    <td><?php echo $mos[4]; ?></td>
                                    <td><?php echo $mos[5]; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary deletedbt"
                                            data-bs-toggle="modal" data-bs-target="#del">
                                            <?php echo "<a class='text-white' href='datos1.php?id=".$mos[0]."'>Modificar</a>";  ?>
                                        </button>
                                    </td>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger editbtn">
                                            <?php echo "<a class='text-white' href='elim.php?id=".$mos[0]."'>Eliminar</a>";  ?>
                                        </button>
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
    </div>

    <script>
        var modalId = document.getElementById('modalId');

        modalId.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            let button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            let recipient = button.getAttribute('data-bs-whatever');

            // Use above variables to manipulate the DOM
        });
    </script>


    <!-- Modal -->
    <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="ingresar.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Nuevo cluster</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Desarrollo</label>
                            <select class="form-select form-select" name="desarrollo" id="desarrollo">
                                <option value="Porttoblanco Cimatario" selected>Porttoblanco Cimatario</option>
                                <option value="Lomas de Porto Blanco Cimatario">Lomas de Porto Blanco Cimatario</option>
                                <option value="Portto Blanco Bernal">Portto Blanco Bernal</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Cluster</label>
                            <input type="text" class="form-control" name="cluster" id="cluster"
                                aria-describedby="helpId" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Meses Sin Intereses</label>
                            <input type="text" class="form-control" name="mes1" id="mes1" aria-describedby="helpId"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Meses con 1er Interes</label>
                            <input type="text" class="form-control" name="mes2" id="mes2" aria-describedby="helpId"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"> Meses con 2do Interes</label>
                            <input type="text" class="form-control" name="mes3" id="mes3" aria-describedby="helpId"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submint" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>