<?php
$cuenta = 0;
if (isset($_GET['cuenta'])) {
	$cuenta = $_GET['cuenta'];
}

$cantidad = 0;
if (isset($_GET['cantidad'])) {
	$cantidad = $_GET['cantidad'];
}

$saldo = 0;
if (isset($_GET['saldo'])) {
	$saldo = $_GET['saldo'];
}

//require 'cliente.php';
//require 'cn.php';
//$consulta= "Select * from usuarios";
//$resultado= mysqli_query($conexion,$consulta);

//$consulta1= "Select * from capital";
//$resultado1= mysqli_query($conexion,$consulta1);

/*while($row=$resultado->fetch_assoc()){    
    while($row1=$resultado1->fetch_assoc()){
        $pdf->SetX(15);
//    $pdf->Cell(40,10,$row['numero_cuenta'],0,0,'C',0);
//	$pdf->Cell(30,10,$row['nombre'],0,0,'C',0);
//	$pdf->Cell(40,10,$row['apellido_paterno'],0,1,'C',0);
    $pdf->Cell(60,8,'Numero cuenta',1,0,'C',0);
    $pdf->Cell(30,8,'Nombre',1,0,'C',0);
    $pdf->Cell(35,8,'A.Paterno',1,0,'C',0);
    $pdf->Cell(40,8,'Monto',1,1,'C',0);
    $pdf->Ln(0.5);
        $pdf->SetX(15);
        $pdf->Cell(60,8,$row['numero_cuenta'],1,0,'C',0);
        $pdf->Cell(30,8,$row['nombre'],1,0,'C',0);
        $pdf->Cell(35,8,$row['apellido_paterno'],1,0,'C',0);
        $pdf->Cell(40,8,$row1['monto_neto'],1,1,'C',0);
}          
}
*/

	# Incluyendo librerias necesarias #
    require "code128.php";
    $pdf = new PDF_Code128('P','mm',array(80,258));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();
    
    # Encabezado y datos de la empresa #
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Banco de los pobres")),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,utf8_decode("Direccion Av, José Francisco Ruiz Massieu No. 5, Fracc.villa Moderna, 39090 Chilpancingo de los Bravo, Gro."),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: 7541040190"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Email: vargas102298@outlook.com"),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

        date_default_timezone_set('america/mexico_city');
    $timestamp = time();
    $pdf->MultiCell(0,5,utf8_decode(date("F d, Y h:i:s", $timestamp)),0,'C',false);

//    $pdf->MultiCell(0,5,utf8_decode("Fecha: ".date("d/m/Y", strtotime("7-12-2022"))." ".date("h:s A")),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Caja Nro: 1"),0,'C',false);
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("RETIRO")),0,'C',false);
    $pdf->SetFont('Arial','',9);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,utf8_decode("Cliente: $cuenta"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Saldo a retirar: $cantidad"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Saldo Restante: $saldo"),0,'C',false);
    
    
    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    /*----------  Fin Detalles de la tabla  ----------*/



    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

    $pdf->Ln(10);

    $pdf->MultiCell(0,5,utf8_decode("***CUALQUIER ACLARACION ACUDE A TU SUCURSAL***"),0,'C',false);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,utf8_decode("Gracias por su preferencia"),'',0,'C');

    $pdf->Ln(9);

    # Codigo de barras #
    $pdf->Code128(5,$pdf->GetY(),"COD000001V0001",70,20);
    $pdf->SetXY(0,$pdf->GetY()+21);
    $pdf->SetFont('Arial','',14);
    $pdf->MultiCell(0,5,utf8_decode("COD000001V0001"),0,'C',false);
    
    # Nombre del archivo PDF #
    $pdf->Output("I","Ticket_Nro_1.pdf",true);
?>
