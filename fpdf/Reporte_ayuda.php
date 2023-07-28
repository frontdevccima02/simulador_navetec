<?php


include '../php/conexion.php';

class PDF extends FPDF
{
   
   // Cabecera de página
   function Header()
   {
      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('logo.jpg', 270, 5, 30); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('Grupo CCIMA'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : "), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal : "), 0, 0, '', 0);
      $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 100, 0);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("Simulador de pagos "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
    /* 
      $this->SetFillColor(62, 95, 138); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(30, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('NÚMERO'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('TIPO'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('PRECIO'), 1, 0, 'C', 1);
      $this->Cell(85, 10, utf8_decode('CARACTERÍSTICAS'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('ESTADO'), 1, 1, 'C', 1); 
      $this->Ln(20);
      
      $this->SetFillColor(62, 95, 138); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(30, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('NÚMERO'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('TIPO'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('PRECIO'), 1, 0, 'C', 1);
      $this->Cell(85, 10, utf8_decode('CARACTERÍSTICAS'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('ESTADO'), 1, 1, 'C', 1); 
      $this->Ln(20); */


   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}




$id= $_GET[
   'id'
];

$consulta = "SELECT * FROM datos where id = $id";
$resultados = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas
$pdf->SetFont('Arial', 'B', 12);

While ($row=$resultados->fetch_assoc()) {
     $pdf->Cell(30,10,$row['nombre'],1,0,'B',0);
     $pdf->Cell(30,10,$row['fecha'],1,0,'b',0);
     $pdf->Cell(30,10,$row['lote'],1,0,'B',0);
     $pdf->Cell(30,10,$row['desarrollo'],1,0,'b',0);
     $pdf->Ln(20); 
     $pdf->Cell(30,10,$row['metros'],1,0,'B',0);
     $pdf->Cell(30,10,$row['descuento'],1,0,'b',0);
     $pdf->Cell(30,10,$row['precioU'],1,0,'B',0);
     $pdf->Cell(30,10,$row['precioUD'],1,0,'b',0);

}



$pdf->Output();
?>