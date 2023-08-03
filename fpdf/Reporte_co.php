<?php
require('./fpdf.php');

class PDF extends FPDF
{

// Cabecera de página
function Header()
{    
    $this->Image('logo_habitta.png', 20, 10, 170,);
    $this->Ln(30);
    $this->SetFont('Arial', 'B', 10); 
    $this->Cell(10); //colorFondo
    
    $this->Cell(100, 15, utf8_decode('Simulador de pagos'), 1, 1, 'C', 0);
    $this->Ln(10);
    $this->Image('porttoblanco1.png', 30, 40, 20,);
}


// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
}
function DrawBlueLine($x1, $y1, $x2, $y2, $lineWidth) {
    $this->SetDrawColor(0, 255, 255); // Color azul
    $this->Line($x1, $y1, $x2, $y2);
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage("portrait");
$pdf->SetFont('Arial','B',10);


/* $pdf->Cell(20,10,'Nombre:',0,0,'C');
$pago = $_POST["name"];
$pdf->Cell(85,10,utf8_decode($pago),1,1,'C',0);
$pdf->Ln(10);
$pdf->Cell(40,10,'Fecha de apartado:',0,0,'C');
$dato = $_POST["date"];
$pdf->Cell(85,10,utf8_decode($dato),1,1,'C',0); */
 /* UBICACION */

 
 $pdf->Cell(20);  // mover a la derecha
 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(20, 10, utf8_decode("Nombre: "), 0, 0, '', 0);
 $pdf->SetFillColor(153,255,100);
 $pdf->SetFont('Arial', 'B', 11);
 $pago = $_POST["name"];
 
 $pdf->Cell(100,10,utf8_decode($pago),1,0,'C',0);
 $pdf->Ln(10);

 $pdf->Cell(20);  // mover a la derecha
 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(20, 10, utf8_decode("Desarrollo: "), 0, 0, '', 0);
 $pdf->SetFont('Arial', 'I', 11);
 $desarrollo = $_POST["desarrolloid"];
 $pdf->Cell(100,10,utf8_decode($desarrollo),0,0,'L',0);
 $pdf->Ln(5); 
 
 
 $pdf->Cell(20);  // mover a la derecha
 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(20, 10, utf8_decode("Descuento: "), 0, 0, '', 0);
 $pdf->SetFont('Arial', 'I', 11);
 $descuento = $_POST["descuento"];
 $pdf->Cell(100, 10, utf8_decode($descuento), 0, 0, 'L',0);
 $pdf->Ln(5);


 $pdf->Cell(20);  // mover a la derecha
 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(20, 10, utf8_decode("Fecha: "), 0, 0, '', 0);
 $pdf->SetFont('Arial', 'I', 11);
 $dato = $_POST["date"];
 $pdf->Cell(100,10,utf8_decode($dato),0,0,'L',0);
 $pdf->Ln(5); 

 $pdf->Cell(20);  // mover a la derecha
 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(20, 10, utf8_decode("LOTE: "), 0, 0, '', 0); 
 $pdf->SetFont('Arial', 'I', 11);
 $dato = $_POST["lote"];
 $pdf->Cell(100,10,utf8_decode($dato),0,0,'L',0);
 $pdf->Ln(5); 
 



 $pdf->Cell(20);  // mover a la derecha
 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(20.5, 10, utf8_decode("Condominio: "), 0, 0, '', 0);
 $pdf->SetFont('Arial', 'I', 11);
 $condominio = $_POST["clusterid"];
 $pdf->Cell(100, 10, utf8_decode($condominio), 0, 0, 'L',0);
 $pdf->Ln(5);

 


 $pdf->Cell(20);  // mover a la derecha
 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(20, 10, utf8_decode("Metraje: "), 0, 0, '', 0);
 $pdf->SetFont('Arial', 'I', 11);
 $metrosCuadrados = $_POST["area"];
 $pdf->Cell(100, 10, utf8_decode($metrosCuadrados), 0, 0, 'L',0);
 $pdf->Ln(5);

 $pdf->Cell(20);  // mover a la derecha
 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(20, 10, utf8_decode("Tipo: "), 0, 0, '', 0);
 $pdf->SetFont('Arial', 'I', 11);
 $tipo = $_POST["tipo"];
 $pdf->Cell(100, 10, utf8_decode($tipo), 0, 0, 'L',0);
 $pdf->Ln(10);

$pdf->Cell(40); 
$referencia = $tipo." | " . $condominio." | " .$dato ."|" .$metrosCuadrados."M2";
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(228, 100, 0);
$pdf->Cell(100,10,utf8_decode($referencia),1,0,'C',0);
$pdf->Ln(10);

 $pdf->Cell(70);  // mover a la derecha
 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(45, 10, utf8_decode("Precio unitario de Lista: "), 0, 0, '', 0);
 $pdf->SetFont('Arial', 'B', 11);
 $precio = $_POST["precioLista"];
 $pdf->Cell(100, 10, utf8_decode($precio), 0, 0, 'L',0);
 $pdf->Ln(5);


 $pdf->Cell(70);  // mover a la derecha
 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(45, 9, utf8_decode("Precio Unitario Descuento: "), 0, 0, '', 0);
 $pdf->SetFont('Arial', 'B', 11);
 $des = $_POST["precioDescuento"];
 $pdf->Cell(90, 9, utf8_decode($des), 0, 0, 'L',0);
 $pdf->Ln(30);

 $pdf->SetFont('Arial', 'B', 15);
 $pdf->Cell(20);  
 $pdf->Cell(90, 15, utf8_decode('Financiamiento'), 0, 1, 'L', 0);
 $pdf->Ln(3);
 $pdf->Cell(20);  // mover a la derecha
 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(20, 10, utf8_decode("Tiempo: "), 0, 0, '', 0);
 $pdf->SetFont('Arial', 'I', 11);
 $tiempo = $_POST["tiempo"];
 $pdf->Cell(100, 10, utf8_decode($tiempo), 0, 0, 'L',0);
 $pdf->Ln(5);


 $pdf->Cell(20);  // mover a la derecha
 $pdf->SetFont('Arial', '', 10);
 $pdf->Cell(20, 10, utf8_decode("Tiempo: "), 0, 0, '', 0);
 $pdf->SetFont('Arial', 'I', 11);
 $plazo = $_POST["plazoM"];
 $pdf->Cell(100, 10, utf8_decode($plazo), 0, 0, 'L',0);
 $pdf->Ln(5);

$pdf->Output();
?>