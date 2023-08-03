<?php
//mandar a llamar libreria de pdf

require_once "./php/conexion.php";

$id = $_GET['id'];

$les="SELECT * FROM datos where id = $id";
$ser=mysqli_query($conexion,$les);
$som11 = mysqli_fetch_row($ser);

for($i = 0 ; $i <= 25 ; $i ++){
  echo $som11[$i];
  echo "<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<section class="mb-5">
            <h2 class="text-uppercase blue-text mt-3">DESGLOSE DE FINANCIAMIENTO</h2>
            <div class="p-3 table-responsive-lg">
                <table class="table table-striped table-hover mb-2">
                    <thead class="thead-pagos">
                        <tr>
                            <th class="text-uppercase text-bold" scope="col">periodo</th>
                            <th class="text-uppercase text-bold" scope="col">fecha</th>
                            <th class="text-uppercase text-bold" scope="col">saldo inicial</th>
                            <th class="text-uppercase text-bold" scope="col">mensualidad</th>
                            <th class="text-uppercase text-bold" scope="col">Abonos</th>
                            <th class="text-uppercase text-bold" scope="col">pagado</th>
                            <th class="text-uppercase text-bold" scope="col">interes</th>
                            <th class="text-uppercase text-bold" scope="col">abono a capital</th>
                            <th class="text-uppercase text-bold" scope="col">Saldo Final</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //*************************************************

//operaciones para la tabla de cotizacion 
// $periodo es el periodo de pago 
// $fech es la fecha proxima de pago 
// $si es el saldo inicial a pagar 
// $mensualidades es el pago de las mensualidades 
// $abonos es la cantidad que abona la persona 
// $pagado es la variable ocupada igual a la mensualidad menos el abono 
// $intereses es la cantidad de dinero a pagar aplicado el interes 
// $aboonocapital variable a ocupar en abono a capital 
// $saldofinal variable que se ocupa al realizar los calculos finales


// desglose de excel para meses sin intereses
// la ms significa meses sin intereses
$abonos = 0;
$les="SELECT * FROM financiamiento where 1";
$ser=mysqli_query($conexion,$les);
$som = mysqli_fetch_row($ser);

$som1 = $som[1]*0;
$som2 = $som[2]*0.01;
$som3 = $som[3]*0.01;


$mos = $som11[25];
$result2 = explode('-', $som11[25]);
$dia2 = $result2[2];
$mes2 = $result2[1];
$año2 = $result2[0];

$mos2 =  $dia2 . "-" . $mes2 . "-" . $año2;


$plazo = $som11[11];
$eepagar = $som11[18];
$enganche = $som11[16];
$montoo = $som11[15];
$ms1 = $som11[12];
$ms2 = $som11[13];
$ms3 = $som11[14];
$ms22 = $ms1 + $ms2;



if($ms3 > 1){
    $ms33 = $plazo;
}else{
    $ms33 = 0;
}


$result = explode('-', $som11[26]);
$dia1 = $result[2];
$mes1 = $result[1];
$año1 = $result[0];

$result1 = $dia1 . "-" . $mes1 . "-" . $año1;


$dia = $result[0];

if($dia < 6){
    $per =date("d-m-Y",strtotime($result1."+ 1 month"));
}else{
    $per = date("d-m-Y",strtotime($result1."+ 2 month"));
}


                        for($i = 1; $i <= $plazo; $i ++){
                            $periodo = $i;
                            $r = $i-1;
                            if($periodo == 1){
                                $fech = $mos2;
                                $enganche3 = $eepagar + $enganche;
                                $financiar = $montoo - $enganche3;
                                $si = $financiar;
                                $interes = $som1;
                                $mensualidades = $financiar / $plazo; 
                                
                                $pagado = $mensualidades + $abonos;
                                $intereses = $si*$som1;
                                $abonocapital = $mensualidades - $intereses;
                                $saldofinal = $si - $abonocapital;  
                            }
                            
                            if($periodo > 1 AND $periodo <= $ms1){
                                $fech = "05/".date("m/Y",strtotime($per."+ $r month"));
                                $si= $saldofinal;
                                $mensualidades = $financiar / $plazo; 
                                
                                $pagado = $mensualidades + $abonos;
                                $intereses = $si*$som1;
                                $abonocapital = $mensualidades - $intereses;
                                $saldofinal = $si - $abonocapital;  
                            }
                            
                            if($periodo == $ms1+1){
                                $fech = "05/".date("m/Y",strtotime($per."+ $r month"));
                                $intereses = $si*$som2;
                                $spagado = $mensualidades * $ms1;
                                $porpagar = $financiar - $spagado;
                                $plasor = $plazo - $ms1;
                                $msci2 = $ms2;
                                $añosmsci2 = $msci2 / 12;

                                $cuota = $porpagar * (pow(1+$som[2]/100 , $plasor) * $som[2]/100)/ (pow(1+$som[2]/100, $plasor)-1);

                            }

                            if($periodo > $ms1 AND $periodo <= $ms22){
                                $fech = "05/".date("m/Y",strtotime($per."+ $r month"));
                                $interes = $som2;
                                $si= $saldofinal;
                                $mensualidades = $cuota; 
                                
                                $pagado = $mensualidades + $abonos;
                                $intereses = $si*$som2;
                                $abonocapital = $mensualidades - $intereses;
                                $saldofinal = $si - $abonocapital;  
                            
                            }
                            
                            if($periodo == $ms22+1){
                                $fech = "05/".date("d/m/Y",strtotime($per."+ $r month"));
                                $intereses = $si*$som3;
                                $spagado2 = $mensualidades * $ms2;
                                $porpagar = $saldofinal;
                                $plasor = $ms3;
                                $msci2 = $ms3;
                                $añosmsci = $msci2 / 12;
                            
                                $cuota = $porpagar * (pow(1+$som[3]/100 , $plasor) * $som[3]/100)/ (pow(1+$som[3]/100, $plasor)-1);

                               
                            }

                            if($periodo > $ms22 AND $periodo < $ms33+1){
                                $fech = "05/".date("m/Y",strtotime($per."+ $r month"));
                                $interes = $som3;
                                $si= $saldofinal;
                                $mensualidades = $cuota; 
                                
                                $pagado = $mensualidades + $abonos;
                                $intereses = $si*$som3;
                                $abonocapital = $mensualidades - $intereses;
                                $saldofinal = $si - $abonocapital;  
                            }
                        
                            
                        ?>
                        <tr>
                            <td><?php echo $periodo; ?></td>
                            <td><?php echo $fech;    ?> </td>
                            <td><?php echo "$".number_format($si,2); ?></td>
                            <td><?php echo "$".number_format($mensualidades,2); ?></td>
                            <td>$0</td>
                            <td><?php echo "$".number_format($pagado,2); ?></td>
                            <td><?php echo "$".number_format($intereses,2) ?></td>
                            <td><?php echo "$".number_format($abonocapital,2); ?></td>
                            <td><?php echo "$".number_format($saldofinal,2); ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
</body>
</html>

//colocar el codigo del reporte 