<?php
require_once "./php/conexion.php";

$datos2 = date('d-m-Y');

$les="SELECT * FROM financiamiento where 1";
$ser=mysqli_query($conexion,$les);
$som = mysqli_fetch_row($ser);

//mando a llamar el ultimo id geerado y le sumo uno
$sim="SELECT max(id) from datos";
$post=mysqli_query($conexion,$sim);
$identificador1 = mysqli_fetch_row($post);
$ident = $identificador1[0] + 1;


$des = "Selecciona tu desarrollo";
$datos1 = "Selecciona la fecha";


if (isset($_POST['enviar'])) {

    $datos2 = date('Y-m-d');

    $datos1 = $_POST['date'];
    $modulo = $_POST['modulo'];
    $pulista = $_POST['pulista'];
    $lote = $_POST['lote'];
    $nombre = $_POST['name'];

    $condominio = "Lomas 4";
    $podescuento = $_POST['descuento'];
    $metraje = $_POST['area']; 

    $emdies = $_POST['engancheextra']; 
    // $tiempo = $_POST['tiempo'];  
    $des = $_POST['desarrolloid'];
    


    $op="SELECT tipo FROM parque where nombre = '$des'";
$res=mysqli_query($conexion,$op);
$ko = mysqli_fetch_row($res);




$op1="SELECT meses FROM parque where nombre = '$des'";
$qwe=mysqli_query($conexion,$op1);
$meses = mysqli_fetch_row($qwe);

$años = $meses[0]/12;

    $sel="SELECT * FROM parque where nombre = '$des'";
$res=mysqli_query($conexion,$sel);
$mos1 = mysqli_fetch_row($res);




    


// //operaciones para primer seccion de simulador
 $descuento = $podescuento*$pulista/100;

 $pudescuento = $pulista - $descuento;

 $plista = $metraje * $pulista;
if ($des == 'calamanda (local)') {
 $descuentoc = 80000;
 
}else{
 $descuentoc = $podescuento*$plista/100;
}
 $montoo = $plista - $descuentoc;

    switch ($des) {
        case 'celta':
        case 'aereopuerto (naves)':   
        case 'aereopuerto (lote)':
        case 'calamanda (nave)': 
        case 'calamanda (local)':
        case 'sur 57':
            $poenganche = 30;
            break;
        case 'gamma II espeta 2':
            $poenganche = 20;
        break;
            
        default:
            # code...
            break;
    }


 $enganche = $montoo * $poenganche / 100;

 switch ($des) {
    case 'celta':
        case 'aereopuerto (naves)':
            case 'aereopuerto (lote)':
                case 'calamanda (nave)':
                    case 'calamanda (local)':
                        case 'sur 57':
                            case 'gamma II espeta 2':
                        $pdenganche = $enganche * 0;
                        break;
    default:
        # code...
        break;
 }

 $denganche = $enganche * $pdenganche / 100;

 if($emdies>$enganche){
    $eepagar = $emdies - ($enganche - $denganche) ;
 }else{
    $eepagar = 0;
    $emdies = 0;
 }
 $poren1 = $eepagar / $montoo *100;
 $poren2 =round($poren1);
 $eapagar = $enganche - $denganche + $eepagar;
 $peapagara1 = $eapagar / $montoo *100;
 $peapagara2 = $peapagara1;
 $montoaf = $montoo - $enganche - $eepagar; 
 $tapagar = $eapagar + $montoaf;
 $porepagar =round( (($eapagar/$montoo)*100),1 );

 if($ko[0] == "lote"){
    $iva2 = 0;
    $iva = 0;
    }else{
    $iva = 12.8/100;
    $iva2 = 12.8;
    }

        
    // presio de lista
    $plista2 = $plista * $iva;
    $plistat = $plista + $plista2;
    // descuento
    $descuentoc2 = $descuentoc * $iva;
    $descuentoct = $descuentoc + $descuentoc2;
    // monto de operaciones
    $montoo2 = $montoo * $iva;
    $montoot = $montoo + $montoo2;
    // enganche
    $enganche2 = $enganche * $iva;
    $enganchet = $enganche + $enganche2;
    // descuento en el enganche
    $denganche2 = $denganche * $iva;
    $denganchet = $denganche2 + $denganche;
    // enganche extra a pagar
    $eepagar2 = $eepagar * $iva;
    $eepagart = $eepagar + $eepagar2;
    // enganche a pagar
    $eapagar2 = $eapagar * $iva;
    $eapagart = $eapagar + $eapagar2;
    // total a pagar
    $tapagar2 = $tapagar * $iva;
    $tapagart = $tapagar + $tapagar2;
    // importe a financiar
    $montoaf2 = $montoaf * $iva;
    $montoaft = $montoaf + $montoaf2;


// definir el tiempo limite en meses en la simulacion en base a los meses seleccionados 
 $plazo = $meses[0];



$result = explode('-', $datos1);
$dia1 = $result[2];
$mes1 = $result[1];
$año1 = $result[0];

$result1 = $año1 . "-" . $mes1 . "-" . $dia1;


$dia = $result[2];

if($dia < 6){
    $per =date("d-m-Y",strtotime($datos1."+ 1 month"));
}else{
    $per = date("d-m-Y",strtotime($datos1."+ 2 month"));
}

$res = explode('-', $per);
$mes = $res[1];
$año = $res[2];

$mos ="05/". $mes."/".$año;
$dat = $año . "-" . $mes . "-05"; 


$abonos = 0;

$les="SELECT * FROM financiamiento where 1";
$ser=mysqli_query($conexion,$les);
$som = mysqli_fetch_row($ser);
$som1 = $som[1]*0;
$som2 = $som[2]*0.01;
$cuota1 = 0;
$cuota2 = 0;
$cuota3 = 0;


                        for($i = 1; $i <= $plazo; $i ++){
                            $periodo = $i;
                            $r = $i-1;
                            if($periodo == 1){
                                $fech = $mos;
                                $enganche3 = $eepagart + $enganchet;
                                $financiar = $montoot - $enganche3;
                                $si = $financiar;
                                $interes = $som1;
                                $mensualidades = $financiar / $plazo; 
                                
                                $pagado = $mensualidades + $abonos;
                                $intereses = $si*$som1;
                                $abonocapital = $mensualidades - $intereses;
                                $saldofinal = $si - $abonocapital;  
                                $cuota1 = $mensualidades;
                                // calculo de cuota con iva
                                $cuota2 = $cuota1 * $iva;
                                $cuotat = $cuota1 + $cuota2;
                            }
                            
                            if($periodo > 1 AND $periodo <= $mos1[4]){
                                $fech = date("m/Y",strtotime($per."+ $r month"));
                                $si= $saldofinal;
                                $mensualidades = $financiar / $plazo; 
                                
                                $pagado = $mensualidades + $abonos;
                                $intereses = $si*$som1;
                                $abonocapital = $mensualidades - $intereses;
                                $saldofinal = $si - $abonocapital;  
                            }
                            
                            if($periodo == $mos1[4]+1){
                                $fech = date("m/Y",strtotime($per."+ $r month"));
                                $intereses = $si*$som2;
                                $spagado = $mensualidades * $mos1[4];
                                $porpagar = $financiar - $spagado;
                                $plasor = $plazo - $mos1[4];
                                $msci2 = $mos1[5];
                                $añosmsci2 = $msci2 / 12;

                                $cuota = $porpagar * (pow(1+$som[2]/100 , $plasor) * $som[2]/100)/ (pow(1+$som[2]/100, $plasor)-1);
                                $cuota2 = $cuota;
                            }

                            if($periodo > $mos1[4] AND $periodo <= $mos1[4] + $mos1[5]){
                                $fech = date("m/Y",strtotime($per."+ $r month"));
                                $interes = $som2;
                                $si= $saldofinal;
                                $mensualidades = $cuota; 
                                
                                $pagado = $mensualidades + $abonos;
                                $intereses = $si*$som2;
                                $abonocapital = $mensualidades - $intereses;
                                $saldofinal = $si - $abonocapital;  
                            
                            }
                        }


                                               

//                         //insercion de datos en la tabla
//                         $insert = "INSERT INTO datos (`id`,`nombre`, `fecha`, `lote`, `desarrollo`, 
//                         `condominio`, `descuento`, `metros`, `tipo`, `precioU`, `precioUD`, `tiempo`, `mes1`, `mes2`, `mes3`,
//                          `monto`, `engancheE`, `desenganche`, `engancheEx`, `engancheP`, `totalP`, `Importe`, `mens1`, `mens2`,
//                           `mens3`,`fech`,`dato`,`pdenganche`,`penganchee`,`penganchep`,`enganchet`) 
//                         VALUES (NULL,'$nombre','$datos2','$lote','$des','$condominio','$podescuento','$metraje',
//                         '$tipo','$pulista','$descuento','$plazo','$ms1','$ms2','$ms3',
//                         '$montoo','$enganche','$denganche','$emdies','$eepagar','$tapagar','$financiar','$cuota1',
//                         '$cuota2','$cuota3','$dat','$result1','$pdenganche','$poren2','$porepagar','$eapagar')";
//                         if($query1 = mysqli_query($conexion,$insert)){
//                             echo "datos almacenados correctamente";
//                         }else{
//                             echo "errro al almacenar los datos";
//                         }
                        
                        
                    
//                         //tomar el valor del id de la simulacion y no el ultimo id generado
//                         $identificador = $ident;
//                         // $les="SELECT max(id) FROM datos where 1";
//                         // $ser=mysqli_query($conexion,$les);
//                         // $identificador = mysqli_fetch_row($ser);
                        
                        


} else {
    $lote = "";
    $tipo = "";
    $condominio = "";
    $podescuento = "";
    $metraje = "";
    $pdenganche = "";
    $emdies = "";
    $nombre = "";
    $tiempo = "";                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
    $plazo = 0;
    $pulista = ""; 
    $pudescuento = 0;

    $plista = 0;
    $descuentoc= 0;
    $montoo = 0;
    $enganche = 0;

    $denganche = 0;
    $poren2 = 0;                                                                                                                                                                                                                               
    $eepagar = 0;
    $porepagar = 0;
    $eapagar = 0;
    $tapagar = 0;
    $montoaf = 0;
    $periodo = 0;
    $fech = 0;
    $si =0;
    $mensualidades = 0;
    $abonos = 0;
    $pagado = 0;
    $intereses = 0;
    $abonocapital= 0;
    $saldofinal = 0;
    $ms1 = 0;
    $ms2 = 0;
    $ms22 = 0;
    $identificador = 0;
    $ms3 = 0;
    $ms33 = 0;
    $cuota1 = 0;
    $cuota2 = 0;
    $cuota3 = 0;
    $mos = 0;
    $iva = 0;
    $ko[0] = "lote";
    $meses[0] = 0;
    $años = 0;
    $modulo = "";
    $mos1[4] = 0;
    $mos1[5] = 0;
    $iva = 0;
    $iva2 = 0;
    $poenganche = 0;
    $plista2 = 0;
    $plistat = 0;
    $descuentoc2 = 0;
    $descuentoct = 0;
    $montoo2 = 0;
    $montoot = 0;
    $enganche2 = 0;
    $enganchet = 0;
    // descuento en el enganche
    $denganche2 = 0;
    $denganchet = 0;
    // enganche extra a pagar
    $eepagar2 = 0;
    $eepagart = 0;
    // enganche a pagar
    $eapagar2 = 0;
    $eapagart = 0;
    // total a pagar
    $tapagar2 = 0;
    $tapagart = 0;
    // importe a financiar
    $montoaf2 = 0;
    $montoaft = 0;
}   

if (isset($_POST['new'])){
    $lote = "";
    $tipo = "";
    $condominio = "";
    $podescuento = "";
    $metraje = "";
    $pdenganche = "";
    $emdies = "";
    $nombre = "";
    $tiempo = "";                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
    $plazo = 0;
    $pulista = ""; 
    $pudescuento = 0;

    $plista = 0;
    $descuentoc= 0;
    $montoo = 0;
    $enganche = 0;
    $pdenganche = "";
    $denganche = 0;
    $poren2 = 0;                                                                                                                                                                                                                               
    $eepagar = 0;
    $porepagar = 0;
    $eapagar = 0;
    $tapagar = 0;
    $montoaf = 0;
    $periodo = 0;
    $fech = 0;
    $si =0;
    $mensualidades = 0;
    $abonos = 0;
    $pagado = 0;
    $intereses = 0;
    $abonocapital= 0;
    $saldofinal = 0;
    $ms1 = 0;
    $ms2 = 0;
    $ms22 = 0;
    $ms3 = 0;
    $ms33 = 0;
    $cuota1 = 0;
    $cuota2 = 0;
    $cuota3 = 0;
    $datos1 = 0;
    $dia = 0;
    $abonos = 0;
    $mos = 0;
    $identificador1 = 0;
    $identificador = 0;
    $iva = 0;
    $ko[0] = "lote";
    $meses[0] = 0;
    $años = 0;
    $modulo = "";
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/icons/logo.ico">
    <title>Simulador de Pagos Navetec</title>
    <meta name="title" content="">
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta property="og:image" content="">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta name="author" content="Grupo CCIMA">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="html2pdf.bundle.min.js"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/main.css">    
    
</head>

<body>
    <header class="">
        <!-- Grey with black text -->
        <nav class="navbar navbar-expand-sm  navbar-light px-4 ">
            <div class="container">
            
            </div>
        </nav>
    </header>
    <div class="container ">
        <!-- menu bar -->
        <div class="">
            <div class="row align-items-end">
                <div class="col-6">
            
                </div>
                <div class="col-6">
                    <!-- <h3 class="gray-text text-end text-uppercase text-sm pt-3"> simulador actualizacion: 22-12-2022</h3> -->
                </div>
                
            </div>
            <div class="d-flex  align-items-center">
                <!-- <img id="logo" class="img-logo-desarrollo" src="img/logos/porttoblanco.svg" alt=""> -->
                <h1 class="blue-text text-uppercase ml-1"> Simulador de Pagos</h1>
            </div>
            <div class="d-flex align-items-start justify-content-end gap-3">
                <img class="w-3 mr-1" src="img/icon/calendar-alt-solid.svg" alt="">
                <h3 class="text-uppercase blue-text text-end  text-bold"><?php echo $datos2." "; ?> </h3>
                <br>
                <h3 class="text-uppercase blue-text text-end  text-bold"><?php echo " simulacion numero: ".$ident; ?> </h3>
                <h3 class="text-uppercase blue-text text-end  text-bold"><?php echo " valor del iva: ".$iva2."%"; ?> </h3>
            </div>
            <hr class="pbhr">
        </div>
        <!-- vista de escritorio -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <section class="table-view mb-5">
            <div class="row mt-4">
                <div class="col-12  col-xl-6">
                    <!-- informacion de lote -->
                    <div class="card p-3">
                        
                            <div class="form-group">
                                <label class="blue-text" for="name">Nombre</label>
                                <input type="input" class="form-control" id="name" name="name" aria-describedby="name"
                                     value="<?php echo $nombre;?>"><br>
                                     <label class="blue-text" for="name">Fecha de apartado</label>
                                <input type="date" class="form-control" id="date" name="date" aria-describedby="name"
                                     value="<?php echo $nombre;?>"><br>
                                     <div class="form-group">
                                        <label class="blue-text" for="desarrolloid">Parque</label>
                                        <select name='desarrolloid' id='desarrolloid' class='form-control' title='Selecciona tu Estado'>
                                        <option value="<?php echo $des ?>"><?php echo $des ?></option>
                                            <?php
                                            include( "php/conexion.php" );

                                            mysqli_query( $conexion, "SET NAMES 'utf8'" );
                                            $query = $conexion->query( "SELECT nombre FROM parque");
                                            while ( $valores = mysqli_fetch_array( $query ) ) {
                                            echo '<option value="' . $valores[ 0 ] . '">' . $valores[ 0 ] . '</option>';
                                        }
                                        ?>
                                        </select>
                                       <!--  <select class="form-control" id="desarrollo" name="desarrollo" required>
                                            <option selected disabled>Desarrollos</option>
                                            <option>Porttoblanco Bernal</option>
                                            <option>Porttoblanco Cimatario</option>
                                            <option>Lomas de Porttoblanco Cimatario</option>
                                        </select> -->
                                    </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center pt-4">
                                <h3 class="text-uppercase secondary-text">REFERENCES:  <?php echo $lote ?> | <?php echo $des ?> | <?php echo $modulo ?><sup> </sup> </h3>
                            <br>
                            </div>
                            <div class="row pt-3">
                                <div class="col-12 col-xl-6 mt-2 order-xl-first">

                                </div>
                                <div class="col-12  mt-2 order-xl-first">
                                   
                                     
                                </div>
                                <div class="col-6 col-xl-4 mt-2 order-xl-first">
                                    <div class="form-group">
                                        <label class="blue-text" for="name"><?php echo $ko[0]  ?></label>
                                        <input type="input" class="form-control" id="name" aria-describedby="name"
                                             name="lote" required value="<?php echo $lote ?>">
                                    </div>
                                </div>

                                <div class="col-6 col-xl-4 mt-2 ">
                                    <div class="form-group">
                                        <label class="blue-text" for="area">Metros cuadrados</label>
                                        <input type="input" class="form-control" id="area" aria-describedby="name"
                                         name="area" required value="<?php echo $metraje ?>">
                                    </div>
                                </div>
                                <div class="col-6 col-xl-4 mt-2 ">
                                    <div class="form-group">
                                        <label class="blue-text " for="name">Modulo</label>
                                        <input type="input" class="form-control" id="area" aria-describedby="name"
                                         name="modulo" required value="<?php echo $modulo ?>">
                                    </div>
                                </div>
                                <div class="col-6 col-xl-4 mt-2 order-xl-last">
                                    <div class="form-group">
                                        <label class="blue-text" for="name">Descuento(%)</label>
                                        <input type="input" class="form-control" id="name" name="descuento" aria-describedby="name"
                                             required value="<?php echo $podescuento; ?>">
                                    </div>
                                    </div>    
                                <div class="col-6 col-xl-4 mt-2 order-xl-last">
                                    <div class="form-group">
                                        <label class="blue-text " for="name">Precio Unitario Lista </label>
                                        <div class="d-flex">

                                        
                                        </div>
                                        <input type="input" class="form-control" id="area" aria-describedby="name"
                                         name="pulista" required value="<?php echo $pulista ?>">
                                    </div>
                                </div>
                                <div class="col-6 col-xl-4 mt-2 order-xl-last">
                                    <div class="form-group">
                                        <label class="blue-text " for="name">Precio Unitario Descuento </label>
                                        <div class="d-flex">
                                            <img class="w-3 mr-1" src="img/icon/check-square-regular.svg" alt="">
                                        <p class="text-b green-text" class="text-uppercase"><?php echo "$".number_format($pudescuento,2); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        
                    </div>
                    <!-- financiamiento -->
                    <div class="card p-3 mt-4">
                        <h2 class="text-uppercase blue-text">financiamiento</h2>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <h3 class="blue-text"><?php echo $años; ?> Años</h3>
                                </div>
                            </div>
                            <div class="col-6 d-flex align-items-end">
                                <div class="d-flex align-items-start">
                                    <img class="w-3 mr-1" src="img/icon/calendar-alt-solid.svg"
                                        alt=""> 
                                    <h3 class="blue-text"><?php echo $meses[0]; ?> meses</h3>
                                </div>
                                
                            </div>
                        </div>
                        <table class="table table-striped table-hover mt-3 ">
                            <tbody>
                                <tr>
                                    <td>1 A <?php echo $mos1[4];?> Meses </td>
                                    <td><?php echo $mos1[4];?> Meses </td>
                                    <td><?php echo $som[1];?>%</td>
                                </tr>
                                <tr>
                                    <td><?php echo $mos1[4]+1;?> A <?php echo $mos1[4] + $mos1[5];?> Meses </td>
                                    <td><?php echo $mos1[5] ?> Meses</td>
                                    <td><?php echo $som[2];?>%</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- documentacion requerida -->
                    <div class="card p-3 mt-4">
                        <h2 class="text-uppercase blue-text">documentacion requerida</h2>
                        <div class="row">
                            <div class="col-6">
                                <h3 class="text-uppercase pt-3">fisica</h3>
                                <ul class="documentos">
                                    <li>Identificación oficial vigente.</li>
                                    <li>Acta de nacimiento.</li>
                                    <li>Acta de matrimonio ( en caso de ser casado).</li>
                                    <li>Constancia de situación fiscal </li>
                                    <li>CURP</li>
                                    <li>Comprobante de domicilio</li>
                                </ul>
                                <p style="font-size: 12px;">**En caso de ser copropiedad o casado por bienes
                                    mancomunados anexar envíar toda la documnetación de ambas personas**</p>
                            </div>
                            <div class="col-6">
                                <h3 class="text-uppercase pt-3">Moral</h3>
                                <ul class="documentos">
                                    <li>Identificación oficial del representante legal vigente.</li>
                                    <li>Acta de nacimiento del representante legal.</li>
                                    <li>Acta constitutiva</li>
                                    <li>Constancia de situacón fiscal empresa y representante legal</li>
                                    <li>CURP del representante legal</li>
                                    <li>Comprobante de Domicilio (Empresa y Representante legal)</li>
                                    <li>Poder en el que ostenta las facultades otorgadas al representante legal</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                
                    <!-- resumen de financiamiento -->
                    <div class="card p-3 mt-4 mt-xl-0">
                        <h2 class="text-uppercase blue-text mt-3">resumen del importe</h2>
                        <table class="table mt-3 mb-2">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-bold" scope="col">importe</th>
                                    <th class="text-uppercase text-bold" scope="col">%</th>
                                    <th class="text-uppercase text-bold" scope="col">subtotal</th>
                                    <th class="text-uppercase text-bold" scope="col">iva</th>
                                    <th class="text-uppercase text-bold" scope="col">importe total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>PRECIO DE LISTA </td>
                                    <td></td>
                                    <td><?php echo "$".number_format($plista,2); ?></td>
                                    <td><?php echo "$".number_format($plista2,2); ?></td>
                                    <td><?php echo "$".number_format($plistat,2); ?></td>
                                </tr>
                                <tr>
                                    <td>DESCUENTO</td>
                                    <td><?php echo $podescuento."%"; ?></td>
                                    <td><?php echo "$".number_format($descuentoc,2); ?></td>
                                    <td><?php echo "$".number_format($descuentoc2,2); ?></td>
                                    <td><?php echo "$".number_format($descuentoct,2); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-bold">MONTO DE OPERACIONES</td>
                                    <td></td>
                                    <td class="text-bold green-text"><?php echo "$".number_format($montoo,2); ?></td>
                                    <td class="text-bold green-text"><?php echo "$".number_format($montoo2,2); ?></td>
                                    <td class="text-bold green-text"><?php echo "$".number_format($montoot,2); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="blue-text text-uppercase" for="name">enganche extra($)</label>
                                    <input type="input" class="form-control" id="name" aria-describedby="name"
                                     name="engancheextra" value="<?php echo $emdies; ?>" required>
                                     
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-end">
                            </div>
                        </div>
                        <table class="table mt-3 mb-2">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-bold" scope="col">importe</th>
                                    <th class="text-uppercase text-bold" scope="col">%</th>
                                    <th class="text-uppercase text-bold" scope="col">subtotal</th>
                                    <th class="text-uppercase text-bold" scope="col">iva</th>
                                    <th class="text-uppercase text-bold" scope="col">importe total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">Enganche </td>
                                    <td><?php echo $poenganche."%" ?></td>
                                    <td><?php echo "$".number_format($enganche,2); ?></td>
                                    <td><?php echo "$".number_format($enganche2,2); ?></td>
                                    <td><?php echo "$".number_format($enganchet,2); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Descuento en el Enganche</td>
                                    <td><?php echo $pdenganche."%"; ?></td>
                                    <td><?php echo "$".number_format($denganche,2); ?></td>
                                    <td><?php echo "$".number_format($denganche2,2); ?></td>
                                    <td><?php echo "$".number_format($denganchet,2); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Enganche extra</td>
                                    <td><?php echo $poren2."%"; ?></td>
                                    <td><?php echo "$".number_format($eepagar,2); ?></td>
                                    <td><?php echo "$".number_format($eepagar2,2); ?></td>
                                    <td><?php echo "$".number_format($eepagart,2); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase text-bold">Enganche a Pagar</td>
                                    <td><?php echo $porepagar."%"; ?></td>
                                    <td><?php echo "$".number_format($eapagar,2); ?></td>
                                    <td><?php echo "$".number_format($eapagar2,2); ?></td>
                                    <td><?php echo "$".number_format($eapagart,2); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase text-bold">total a pagar</td>
                                    <td></td>
                                    <td><?php echo "$".number_format($tapagar,2); ?></td>
                                    <td><?php echo "$".number_format($tapagar2,2); ?></td>
                                    <td><?php echo "$".number_format($tapagart,2); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase text-bold">importe a financiar </td>
                                    <td></td>
                                    <td class="text-bold green-text"><?php echo "$".number_format($montoaf,2); ?></td>
                                    <td class="text-bold green-text"><?php echo "$".number_format($montoaf2,2); ?></td>
                                    <td class="text-bold green-text"><?php echo "$".number_format($montoaft,2); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- mensualidades -->
                    <div class="card p-3 mt-4">
                        <h2 class="text-uppercase blue-text">Mensualidades</h2>
                        <table class="table table-striped table-hover mt-3 ">
                            <tbody>
                            <tr>
                                    <td>Mensualidades</td>
                                    <td>Subtotal</td>
                                    <td>IVA</td>
                                    <td>Importe Total</td>
                                </tr>
                                <tr>
                                    <td>Mensualidades 1 A <?php echo $mos1[4];?> Meses </td>
                                    <td><?php echo "$".number_format($cuota1,2) ?></td>
                                    <td><?php echo "$".number_format($cuota2,2) ?></td>
                                    <td><?php echo "$".number_format($cuotat,2) ?></td>
                                </tr>
                                <tr>
                                    <td>Mensualidades <?php echo $mos1[4]+1;?> A <?php echo $mos1[4] + $mos1[5];?> Meses </td>
                                    <td><?php echo "$".number_format($cuota2,2) ?></td>
                                    <td><?php echo "$".number_format($cuota2,2) ?></td>
                                    <td><?php echo "$".number_format($cuota2,2) ?></td>
                                </tr>

                            </tbody>
                        </table>
                        
                         <button onclick="guardarStorage()"  id="calcular" type="submit" class="btn btn-simualador mt-3 mb-2 text-uppercase" name="enviar">Calcular</button>
                        <div class="row" id="premio">

                           <div class="row m-0">
                                <div class="col-6">
                                    <button onclick="LimpiarStorage()" id="btnSimulacion" type="submit" class="btn btn-simualador mt-3 mb-2 text-uppercase" name="new" style="width:100%;">Nueva Simulacion</button>
                                </div>

                                <div class="col-6">
                                    <!-- envia el valor del id de la ultima simulacion hecha por un usuario y redirecciona al reporte -->
                                    <button  type="button" class="btn btn-simualador mt-3 mb-2 text-uppercase"  style="width:100%;">
                                    <?php echo "<a class='btn-imprimir' href='./fpdf/Reporte_original.php?id=".$identificador."'>Generar reporte</a>";  ?>
                                    </button>
                                </div> 
                                   
                            </div>
                            

                    </div>


                        
                    </div>
                    <p class="blue-text text-rigth">*Los precios estan sujetos a cambios sin previo aviso</p>
                    
                </div>
            </div>
        </section>
        </form>
        <!-- spiner -->
        <div class="text-center d-none">
            <img src="img/spiner/Fusion6.gif" style="width: 9rem;" alt="">
        </div>
        <!-- financiamiento a meses sin intereses -->
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

$les="SELECT * FROM financiamiento where 1";
$ser=mysqli_query($conexion,$les);
$som = mysqli_fetch_row($ser);
$som1 = $som[1]*0;
$som2 = $som[2]*0.01;
$cuota1 = 0;
$cuota2 = 0;
$cuota3 = 0;


                        for($i = 1; $i <= $plazo; $i ++){
                            $periodo = $i;
                            $r = $i-1;
                            if($periodo == 1){
                                $fech = $mos;
                                $enganche3 = $eepagart + $enganchet;
                                $financiar = $montoot - $enganche3;
                                $si = $financiar;
                                $interes = $som1;
                                $mensualidades = $financiar / $plazo; 
                                
                                $pagado = $mensualidades + $abonos;
                                $intereses = $si*$som1;
                                $abonocapital = $mensualidades - $intereses;
                                $saldofinal = $si - $abonocapital;  
                                $cuota1 = $mensualidades;
                                // calculo de cuota con iva
                                $cuota2 = $cuota1 * $iva;
                                $cuotat = $cuota1 + $cuota2;
                            }
                            
                            if($periodo > 1 AND $periodo <= $mos1[4]){
                                $fech = date("m/Y",strtotime($per."+ $r month"));
                                $si= $saldofinal;
                                $mensualidades = $financiar / $plazo; 
                                
                                $pagado = $mensualidades + $abonos;
                                $intereses = $si*$som1;
                                $abonocapital = $mensualidades - $intereses;
                                $saldofinal = $si - $abonocapital;  
                            }
                            
                            if($periodo == $mos1[4]+1){
                                $fech = date("m/Y",strtotime($per."+ $r month"));
                                $intereses = $si*$som2;
                                $spagado = $mensualidades * $mos1[4];
                                $porpagar = $financiar - $spagado;
                                $plasor = $plazo - $mos1[4];
                                $msci2 = $mos1[5];
                                $añosmsci2 = $msci2 / 12;

                                $cuota = $porpagar * (pow(1+$som[2]/100 , $plasor) * $som[2]/100)/ (pow(1+$som[2]/100, $plasor)-1);
                                $cuota2 = $cuota;
                            }

                            if($periodo > $mos1[4] AND $periodo <= $mos1[4] + $mos1[5]){
                                $fech = date("m/Y",strtotime($per."+ $r month"));
                                $interes = $som2;
                                $si= $saldofinal;
                                $mensualidades = $cuota; 
                                
                                $pagado = $mensualidades + $abonos;
                                $intereses = $si*$som2;
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
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $('#datepicker').datepicker({
            weekStart: 1,
            daysOfWeekHighlighted: "6,0",
            autoclose: true,
            todayHighlight: true,
        });
        $('#datepicker').datepicker("setDate", new Date());
    </script>

    <script src="scripts.js"></script>
    <script src="js/jquery-3.6.3.min.js"></script>
    <!-- <script src="js/app.js"></script> -->
    <script src="js/change.js"></script>
  

</body>

</html>
