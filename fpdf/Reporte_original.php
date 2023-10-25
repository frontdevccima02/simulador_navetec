<?php
require('./fpdf.php');

 

class PDF extends FPDF
{

    function Header()
    {    
    
    }
    function Content($pulista) {
        // Otros contenidos del reporte
        $this->SetFont('Arial', '', 10);
    }
    function Footer()
    {
        $this->Image('piedepagina.png', 35, 278, 131, 12);
        $this->SetY(-10);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
    }

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage("portrait");
$pdf->SetFont('Arial','B',10);

require('../php/conexion.php');

$id= $_GET['id'];

 $les="SELECT * FROM datos where id = $id";
 $ser=mysqli_query($conexion,$les);
 $som11 = mysqli_fetch_row($ser);
 
 $pdf = new PDF();
 $pdf->AddPage("portrait"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
 $pdf->AliasNbPages(); //muestra la pagina / y total de paginas
 $pdf->SetFont('Arial', 'B', 12);
 
$pdf->Image('encabezado.png', 68, 10, 119);
$pdf->Ln(20);
$pdf->SetFont('Arial', 'B', 10); 
$pdf->Cell(10); //colorFondo

$pdf->Cell(100, 15, utf8_decode('Simulador de pagos'), 0, 0, 'C', 0);
$pdf->Ln(10);
$pdf->Image('logo.png', 15, 15, 34);
$pdf->Ln(10);

 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(152, 10, utf8_decode("Fecha de Cotización:"), 0, 0, 'R', 0);
 $pdf->SetFont('Arial', 'B', 11);

 $pdf->Cell(58,10,utf8_decode($som11[2]),0,0,'',0);
 $pdf->Ln(5);
 
 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(50, 10, utf8_decode("Nombre del Cliente: "), 0, 0, '', 0);
 $pdf->SetFont('Arial', 'B', 9);
 $nombre = strtoupper($som11[1]);
 $pdf->Cell(58,10,utf8_decode($nombre),0,0,'',0);
 $pdf->Ln(5);
 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(50, 10, utf8_decode("Desarrollo: "), 0, 0, '', 0);
 $pdf->SetFont('Arial', 'B', 9);
 $desarrollo = strtoupper($som11[4]);
 $pdf->Cell(58, 10, utf8_decode($desarrollo), 0, 0, '', 0);
 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(20, 10, utf8_decode("Referencia:"), 0, 0, '', 0);
 $pdf->SetFont('Arial', 'B', 10);
 $pdf->Cell(50, 10, utf8_decode($som11[3]." | ".$som11[5] ), 0, 0, '', 0);
 $pdf->Ln(10);

// tabla de informacion de Lote y Financiamiento
//encabezado 
$pdf->SetFillColor(215,216,225);
$pdf->Cell(45,7,utf8_decode("LOTE"),'B',0,'C',0);
$pdf->Cell(30,7,utf8_decode("INFORMACIÓN"),'B',0,'C',0);
$pdf->Cell(65,7,utf8_decode("IMPORTE"),'B',0,'C',0);
$pdf->Cell(48,7,utf8_decode("SUBTOTAL"),'B',0,'C',0);
$pdf->Ln(2);
$pdf->Ln(7);


$pdf->SetFont('Arial', '', 10);
$pdf->Cell(45,7,utf8_decode("Desarollo: "),0,0,'R',0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30,7,utf8_decode($som11[4]),0,0,'',0);
$pdf->SetFont('Arial', '', 10);

$precio_lista= $som11[9]*$som11[7];
$pdf->Cell(65,7,utf8_decode("Precio de Lista: "),0,0,'R',0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30,7,utf8_decode("$ ". number_format($precio_lista,2) ),0,0,'',0);
$pdf->Ln(7);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(45,7,utf8_decode("Condominium: "),0,0,'R',1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30,7,utf8_decode($som11[5]),0,0,'B',1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode("Descuento: "),0,0,'R',1);
$pdf->SetFont('Arial', 'B', 10);
$descuento = $som11[10]*$som11[7];
$pdf->Cell(30,7,utf8_decode("$ ".number_format($descuento,2) ),0,0,'',1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(18,7,utf8_decode(number_format($som11[6],0)."%"),0,0,'C',1);
$pdf->Ln(7);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(45,7,utf8_decode("Lote: "),0,0,'R',0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30,7,utf8_decode($som11[3]),0,0,'',0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode("Monto de Operaciones: "),0,0,'R',0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30,7,utf8_decode("$ ".number_format($som11[15],2) ),0,0,'',0);
$pdf->Ln(7);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(45,7,utf8_decode("Metros2: "),0,0,'R',1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30,7,utf8_decode($som11[7]),0,0,'',1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode("Enganche: "),0,0,'R',1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30,7,utf8_decode("$ ".number_format($som11[16],2)),0,0,'',1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(18,7,utf8_decode("10%"),0,0,'C',1);
$pdf->Ln(7);



$pdf->SetFont('Arial', '', 10);
$pdf->Cell(45,7,utf8_decode("Tipo: "),0,0,'R',0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30,7,utf8_decode($som11[8]),0,0,'',0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode("Descuento en el Enganche: "),0,0,'R',0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30,7,utf8_decode("$ ".number_format($som11[17],2)),0,0,'',0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(18,7,utf8_decode($som11[27]."%"),0,0,'C',0);
$pdf->Ln(7);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(45,7,utf8_decode("Precio U.L."),0,0,'R',1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30,7,utf8_decode("$".number_format($som11[9],2)),0,0,'',1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode("Enganche Extra: "),0,0,'R',1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30,7,utf8_decode("$ ".number_format($som11[19],2)),0,0,'',1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(18,7,utf8_decode($som11[28]."%"),0,0,'C',1);
$pdf->Ln(7);


$precio_descuento= $som11[9] - $som11[10];
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(45,7,utf8_decode("Precio con Descuento"),0,0,'R',0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30,7,utf8_decode("$".number_format($precio_descuento,2)),0,0,'',0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode("Enganche a Pagar: "),0,0,'R',0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30,7,utf8_decode("$ ".number_format($som11[30],2)),0,0,'',0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(18,7,utf8_decode($som11[29]."%"),0,0,'C',0);
$pdf->Ln(7);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(45,7,utf8_decode(""),0,0,'',0);
$pdf->Cell(30,7,utf8_decode(""),0,0,'',0);
$pdf->Cell(65,7,utf8_decode("Total a Pagar: "),0,0,'',1);
$pdf->Cell(48,7,utf8_decode("$ ".number_format($som11[20],2)),0,0,'',1);
$pdf->Ln(7);

$pdf->SetFillColor(215,216,225);
$pdf->Cell(45,7,utf8_decode(""),0,0,'',0);
$pdf->Cell(30,7,utf8_decode(""),0,0,'',0);

$pdf->Cell(65,7,utf8_decode("Importe a Financiar: "),0,0,'',0);
$pdf->Cell(48,7,utf8_decode("$ ".number_format($som11[21],2)),0,0,'',0);
$pdf->Ln(15);


// Lista de desgloce, 

$pdf->Cell(105,7,utf8_decode("FINANCIAMIENTO"),'B',0,'C',0);
$pdf->Cell(50,7,utf8_decode("MENSUALIDAD"),'B',0,'C',0);
$pdf->Cell(33,7,utf8_decode("SUBTOTAL"),'B',0,'C',0);
$pdf->Ln(2);
$pdf->Ln(7);
$yearsf= $som11[11]/12;

$pdf->Cell(35,9,utf8_decode("PERIODOS"),0,0,'B',0);
$pdf->Cell(35,9,utf8_decode($yearsf. " Años" ),0,0,'B',0);
$pdf->Cell(35,9,utf8_decode($som11[11]." Meses"),0,0,'C',0);
$pdf->Cell(50,9,utf8_decode(""),0,0,'B',0);
$pdf->Cell(33,9,utf8_decode(""),0,0,'B',0);
$pdf->Ln();

$pdf->SetFillColor(215,216,225);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(35,9,utf8_decode("1 a 48 Meses"),0,0,'B',1);
$pdf->Cell(35,9,utf8_decode(number_format($som11[12],0). " Meses"),0,0,'B',1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(35,9,utf8_decode("0%"),0,0,'C',1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50,9,utf8_decode("Mensualidades 1 a 48 "),0,0,'B',1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(33,9,utf8_decode("$ ".number_format($som11[22],2) ),0,0,'B',1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(35,9,utf8_decode("49 a 120 Meses"),0,0,'B',0);
$pdf->Cell(35,9,utf8_decode(number_format( $som11[13],0). " Meses"),0,0,'B',0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(35,9,utf8_decode("1.0%"),0,0,'C',0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50,9,utf8_decode("Mensualidades 49 a 120 "),0,0,'B',0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(33,9,utf8_decode("$ ".number_format($som11[23],2)),0,0,'B',0);
$pdf->Ln();

$pdf->SetFillColor(215,216,225);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(35,9,utf8_decode("121 a 240 Meses"),0,0,'',1);
$pdf->Cell(35,9,utf8_decode(number_format( $som11[14],0). " Meses"),0,0,'',1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(35,9,utf8_decode("1.25%"),0,0,'C',1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50,9,utf8_decode("Mensualidades 121 a 240 "),0,0,'',1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(33,9,utf8_decode("$ ".number_format($som11[24],2)),0,0,'',1);
$pdf->Ln(15);



$pdf->SetFont('Arial', '', 9);
$pdf->Cell(120,9,utf8_decode("Documentación Requerida:" ),0,0,'B',0);
$pdf->Ln(5);

$pdf->SetFont('Arial', '', 7);
$pdf->Cell(80,9,utf8_decode("Fisica"),0,0,'B',0);
$pdf->Cell(80,9,utf8_decode("Moral"),0,0,'B',0);
$pdf->Ln(9);

$pdf->Cell(80,3,utf8_decode("*Identificación oficial vigente."),0,0,'B',0);
$pdf->Cell(80,3,utf8_decode("*Identificación oficial del representante legal vigente."),0,0,'B',0);
$pdf->Ln(3);

$pdf->Cell(80,3,utf8_decode("*Acta de nacimiento."),0,0,'B',0);
$pdf->Cell(80,3,utf8_decode("*Acta de nacimiento del representante legal."),0,0,'B',0);
$pdf->Ln(3);


$pdf->Cell(80,3,utf8_decode("*Acta de matrimonio ( en caso de ser casado)."),0,0,'B',0);
$pdf->Cell(80,3,utf8_decode("*Acta constitutiva"),0,0,'B',0);
$pdf->Ln(3);

$pdf->Cell(80,3,utf8_decode("*Constancia de situación fiscal"),0,0,'B',0);
$pdf->Cell(80,3,utf8_decode("*Constancia de situacón fiscal empre y representante legal"),0,0,'B',0);
$pdf->Ln(3);

$pdf->Cell(80,3,utf8_decode("*CURP."),0,0,'B',0);
$pdf->Cell(80,3,utf8_decode("*CURP del representante legal"),0,0,'B',0);
$pdf->Ln(3);


$pdf->Cell(80,3,utf8_decode("*Comprobante de domicilio"),0,0,'B',0);
$pdf->Cell(80,3,utf8_decode("*Comprobante de Domicilio (Empresa y Representante legal)."),0,0,'B',0);
$pdf->Ln(3);

$pdf->Cell(80,3,utf8_decode(""),0,0,'B',0);
$pdf->Cell(80,3,utf8_decode("*Poder en el que ostenta las facultades otorgadas al representante legal"),0,0,'B',0);
$pdf->Ln(10);


$pdf->Cell(160,3,utf8_decode("* En caso de estar CASADOS por sociedad conyugal o COOPROPIEDAD"),0,0,'B',0);
$pdf->Ln(3);

$pdf->Cell(160,3,utf8_decode("anexar toda la documentacion mencionada de ambas partes."),0,0,'B',0);
$pdf->Ln(3);


$pdf->AddPage("portrait");
$degradado = 2;
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(7,29,73);
$pdf->Cell(17,7,"PERIODO",1,0,'C',1);
$pdf->Cell(17,7,"FECHA",1,0,'C',1);  
$pdf->Cell(25,7,"SALDO INCIAL",1,0,'C',1);
$pdf->Cell(22,7,"MENSUALIDAD",1,0,'C',1);
$pdf->Cell(16,7,"ABONOS",1,0,'C',1);
$pdf->Cell(20,7,"PAGADO",1,0,'C',1);
$pdf->Cell(20,7,"INTERES",1,0,'C',1);
$pdf->Cell(25,7,"ABONO A CAPITAL",1,0,'C',1); 
$pdf->Cell(25,7,"SALDO FINAL",1,0,'C',1); 
$pdf->Ln(7); 
 
 
$pdf->SetTextColor(0,0,0);
$abonos = 0;
$les="SELECT * FROM financiamiento where 1";
$ser=mysqli_query($conexion,$les);
$som = mysqli_fetch_row($ser);

$som1 = $som[1]*0;
$som2 = $som[2]*0.01;
$som3 = 1; //$som[3]*0.01

$mos = $som11[25];
$result2 = explode('-', $som11[25]);
$dia2 = $result2[2];
$mes2 = $result2[1];
$año2 = $result2[0];

$mos2 =  $dia2 . "-" . $mes2 . "-" . $año2;

$plazo = $som11[11];

$emdies = $som11[18];
$enganche = $som11[16];
$pdenganche = $som11[27];

$denganche = $enganche * $pdenganche / 100;

if($emdies>$enganche){
    $eepagar = $emdies - ($enganche - $denganche) ;
}else{
    $eepagar = 0;
}



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
                            
                                $cuota = 1;// $porpagar * (pow(1+$som[1]/100 , $plasor) * $som[1]/100)/ (pow(1+$som[1]/100, $plasor)-1);

                               
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
                        
                            if($degradado % 2 == 0){
                                $pdf->SetFillColor(255,255,255);
                            }
                            else{
                                $pdf->SetFillColor(215,216,225);
                            }
                            $pdf->Cell(17,7,$periodo,1,0,'C',1);
                            $pdf->Cell(17,7,$fech,1,0,'C',1);  
                            $pdf->Cell(25,7,"$".number_format($si,2),1,0,'C',1);
                            $pdf->Cell(22,7,"$".number_format($mensualidades,2),1,0,'C',1);
                            $pdf->Cell(16,7,"$0",1,0,'C',1);
                            $pdf->Cell(20,7,"$".number_format($pagado,2),1,0,'C',1);
                            $pdf->Cell(20,7,"$".number_format($intereses,2),1,0,'C',1);
                            $pdf->Cell(25,7,"$".number_format($abonocapital,2),1,0,'C',1); 
                            $pdf->Cell(25,7,"$".number_format($saldofinal,2),1,0,'C',1); 
                            $degradado++;
                            $pdf->Ln(7);
                        }
 
 
 $pdf->Output(); 


 


