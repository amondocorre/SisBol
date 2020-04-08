<?php 
   include('librerias/pdf/fpdf.php');
  include("config/config.php");

  $gestion=$_POST['gestion'];
  $mes=$_POST['mes'];
  
  switch ($mes) {
    case 1:
      $mesLiteral="ENERO";
      break;
    case 1:
      $mesLiteral="ENERO";
      break;
    case 2:
      $mesLiteral="FEBRERO";
      break;
    case 3:
      $mesLiteral="MARZO";
      break;
    case 4:
      $mesLiteral="ABRIL";
      break;
    case 5:
      $mesLiteral="MAYO";
      break;
    case 6:
      $mesLiteral="JUNIO";
      break;
    case 7:
      $mesLiteral="JULIO";
      break;
    case 8:
      $mesLiteral="AGOSTO";
      break;
    case 9:
      $mesLiteral="SEPTIEMBRE";
      break;
    case 10:
      $mesLiteral="OCTUBRE";
      break;
    case 11:
      $mesLiteral="NOVIEMBRE";
      break;
    case 12:
      $mesLiteral="DICIEMBRE";
      break;
     
  }

 ini_set('max_execution_time', 300);
  
class PDF extends FPDF
  {
  // Cabecera de página
    
    function Header()
    {
       
        $sLinea=4;
        $dtitulo=120;
        //$w = $this->GetStringWidth($titulo)+6;
        // Logo
        $this->Image('images\logoCapresso.png',20,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',8);
        // Movernos a la derecha
        $this->Cell($dtitulo);
        // Título
        
        $this->Cell(50,5,'Nro. Partronal CNS 02-942-0330',0,0,'C');
        $this->Ln($sLinea);
        $this->Cell($dtitulo);
        $this->Cell(50,5,'Nro. Empleador 174496020-03',0,0,'C');
        $this->Ln($sLinea);
        $this->Cell($dtitulo);
        $this->Cell(50,5,'NIT: 174496020',0,0,'C');
        $this->Ln($sLinea);
        $this->Cell($dtitulo);
        $this->Cell(50,5,'Cochabamba Bolivia',0,0,'C');
        // titulo del Centro
        $this->SetFont('Arial','B',12);
        $this->Ln(5);
        //$this->Cell(10);
       
    }
    function CabeceraCopia()
    {
       
        $sLinea=4;
        $dtitulo=120;
        //$w = $this->GetStringWidth($titulo)+6;
        
        // Logo
        $this->Image('images\logoCapresso.png',20,145,33);
        // Arial bold 15
        $this->Cell(20);
        $this->SetFont('Arial','B',8);
        // Movernos a la derecha
        $this->Cell($dtitulo);
        // Título
        
        $this->Cell(10,5,'Nro. Partronal CNS 02-942-0330',0,0,'C');
        $this->Ln($sLinea);
        $this->Cell($dtitulo);
        $this->Cell(50,5,'Nro. Empleador 174496020-03',0,0,'C');
        $this->Ln($sLinea);
        $this->Cell($dtitulo);
        $this->Cell(50,5,'NIT: 174496020',0,0,'C');
        $this->Ln($sLinea);
        $this->Cell($dtitulo);
        $this->Cell(50,5,'Cochabamba Bolivia',0,0,'C');
        // titulo del Centro
        $this->SetFont('Arial','B',12);
        $this->Ln(0);
        //$this->Cell(10);
       
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

    }

    // Funcion para crear el cuerpo de la boleta
    function CabeceraBoleta($titulo,$ci,$nom,$fIng,$fNac,$dTrab,$cargo)
    {
      $borde=0;
       //titulo
      $this->Ln(3);
      //$this->Cell(20);
      $this->SetFont('Arial','B',14);
      $this->Cell(160,5,$titulo,0,0,'C');
      // Salto de línea
      $this->Ln(10);
      //ci
      $this->Cell(10);
      $this->SetFont('Arial','B',9);
      $this->Cell(35,5,'CEDULA:',$borde,0,'R');
      $this->SetFont('Arial','',9);
      $this->Cell(40,5,$ci,$borde,0,'L');
      //Nombre
      $this->SetFont('Arial','B',9);
      $this->Cell(35,5,'NOMBRE:',$borde,0,'R');
      $this->SetFont('Arial','',9);
      $this->Cell(60,5,$nom,$borde,0,'L');
      $this->Ln(5); 
      //Ingreso
      $this->Cell(10);
      $this->SetFont('Arial','B',9);
      $this->Cell(35,5,'FECHA INGRESO:',$borde,0,'R');
      $this->SetFont('Arial','',9);
      $this->Cell(40,5,$fIng,$borde,0,'L');
      //Cargo
      
      $this->SetFont('Arial','B',9);
      $this->Cell(35,5,'CARGO:',$borde,0,'R');
      $this->SetFont('Arial','',9);
      $this->Cell(60,5,$cargo,$borde,0,'L');
      $this->Ln(5); 
      //Nacimiento
      $this->Cell(10);
      $this->SetFont('Arial','B',9);
      $this->Cell(35,5,'FECHA. NAC:',$borde,0,'R');
      $this->SetFont('Arial','',9);
      $this->Cell(60,5,$fNac,$borde,0,'L');
      $this->Ln(5); 
      //Dias trabajados
      /*
      $this->Cell(10);
      $this->SetFont('Arial','B',9);
      $this->Cell(35,5,'DIAS TRABAJADOS:',$borde,0,'R');
      $this->SetFont('Arial','',9);
      $this->Cell(40,5,$dTrab,$borde,0,'L');
      */

    
    }
    function CuerpoBoleta($hBas,$iva,$hBasM,$afp,$bono,$apSol,$hrsExt,$anticip,$feriado,$faltaCaja,$bonoPas,$sancRep,$bonoPue,$otrosEgr,$otrosIng,$TotalEgr,$totalGanado,$LiqPagable)
    {
      $this->Cell(10);
      $this->SetFont('Arial','B',9);
      $this->Cell(80,5,'INGRESOS',1,0,'C');
      $this->Cell(80,5,'EGRESOS',1,0,'C');
      $this->Ln(5);
      $this->Cell(10);
      $this->Cell(50,5,'CONCEPTO',1,0,'C');
      $this->Cell(30,5,'MONTO (Bs.)',1,0,'C');
      $this->Cell(50,5,'CONCEPTO',1,0,'C');
      $this->Cell(30,5,'MONTO (Bs.)',1,0,'C');
      $this->Ln(5);
      $this->Cell(10);
      $this->SetFont('Arial','',9);
      //HABER BASICO
      $this->Cell(50,5,'HABER BASICO:',1,0,'R');
      $this->Cell(30,5,$hBas,1,0,'R');
      //Rc iva
      $this->Cell(50,5,'RC-IVA:',1,0,'R');
      $this->Cell(30,5,$iva,1,0,'R');
      $this->Ln(5);
      $this->Cell(10);
      
      //HABER BASICO MENSUAL
      $this->Cell(50,5,'HABER BASICO MENSUAL:',1,0,'R');
      $this->Cell(30,5,$hBasM,1,0,'R');
      //AFP
      $this->Cell(50,5,'AFP(12.71%):',1,0,'R');
      $this->Cell(30,5,$afp,1,0,'R');
      $this->Ln(5);
      $this->Cell(10);
      
      //Bomno de antiguedad
      $this->Cell(50,5,'BONO ANTIGUEDAD:',1,0,'R');
      $this->Cell(30,5,$bono,1,0,'R');
      //aporte solidario
      $this->Cell(50,5,'APORTE SOLIDARIO(0.5%):',1,0,'R');
      $this->Cell(30,5,$apSol,1,0,'R');
      $this->Ln(5);
      $this->Cell(10);
      
      //HORAS EXTRAS
      $this->Cell(50,5,'HORAS EXTRAS:',1,0,'R');
      $this->Cell(30,5,$hrsExt,1,0,'R');
      //ANTICIPOS
      $this->Cell(50,5,'ANTICIPOS:',1,0,'R');
      $this->Cell(30,5,$anticip,1,0,'R');
      $this->Ln(5);
      $this->Cell(10);
      
      //FERIADOS Y OTROS
      $this->Cell(50,5,'FERIADOS Y OTROS:',1,0,'R');
      $this->Cell(30,5,$feriado,1,0,'R');
      //FALTANTE EN CAJA
      $this->Cell(50,5,'FALTANTE EN CAJA:',1,0,'R');
      $this->Cell(30,5,$faltaCaja,1,0,'R');
      $this->Ln(5);
      $this->Cell(10);
      
      //BONO PASAJE
      $this->Cell(50,5,'BONO PASAJE:',1,0,'R');
      $this->Cell(30,5,$bonoPas,1,0,'R');
      //SANCION POR REPOSICION
      $this->Cell(50,5,'SANCION POR REPOSICION:',1,0,'R');
      $this->Cell(30,5,$sancRep,1,0,'R');
      $this->Ln(5);
      $this->Cell(10);
      
      //BONO DE PUESTO
      $this->Cell(50,5,'BONO DE PUESTO:',1,0,'R');
      $this->Cell(30,5,$bonoPue,1,0,'R');
      //OTROS EGRESOS
      $this->Cell(50,5,'OTROS EGRESOS:',1,0,'R');
      $this->Cell(30,5,$otrosEgr,1,0,'R');
      $this->Ln(5);
      $this->Cell(10);
      
      //OTROS INGRESOS
      $this->Cell(50,5,'OTROS INGRESOS:',1,0,'R');
      $this->Cell(30,5,$otrosIng,1,0,'R');
      //TOTAL EGRESOS
      $this->SetFont('Arial','B',9);
      $this->Cell(50,5,'TOTAL EGRESOS:',1,0,'R');
      $this->Cell(30,5,$TotalEgr,1,0,'R');
      $this->Ln(5);
      $this->Cell(10);
      
      //TOTAL GANADO
      $this->Cell(50,5,'TOTAL GANADO:',1,0,'R');
      $this->Cell(30,5,$totalGanado,1,0,'R');
      //LIQUIDO PAGABLE
      $this->Cell(50,5,'LIQUIDO PAGABLE:',1,0,'R');
      $this->Cell(30,5,$LiqPagable,1,0,'R');       
      
      
      
    }//fin de cuerpo de boleta
    function Firmas($nom,$cargo)
    {
      date_default_timezone_set('America/Caracas');
      $fecha=date('d-m-Y H:i:s');
      $this->Ln(15);
      $this->Cell(10);
      $this->SetFont('Arial','',9);
      $this->Cell(80,5,'_________________________',0,0,'C');
      $this->Cell(80,5,'_________________________',0,0,'C');
      $this->Ln(5);
      $this->Cell(10);
      $this->Cell(80,5,'Daniel Saavedra Martinez',0,0,'C');
      $this->Cell(80,5,$nom,0,0,'C');
      $this->SetFont('Arial','B',9);
      $this->Ln(5);
      $this->Cell(10);
      $this->Cell(80,5,'GERENTE GENERAL',0,0,'C');
      $this->Cell(80,5,$cargo,0,0,'C');
      $this->Ln(5);
      $this->Cell(15);
      $this->Cell(150,5,$fecha,0,0,'C');
      $this->Ln(15);
    }
    function SaltoPagina()
    {
      $this->Ln(25);
    }
  }//fin de class


  // Creación del objeto de la clase heredada
  $pdf = new PDF();
  //$pdf->SetTitle();
  $pdf->AliasNbPages();
  $pdf->AddPage();



  //$pdf->SetFont('Times','',12);
  $tsql = "SELECT SE.FECHA_NACIMIENTO, SP.* 
           FROM SIREPE_PLANILLAS SP, SIREPE_EMPLEADO SE
           WHERE SP.ID_EMPLEADO=SE.ID_EMPLEADO AND 
                 YEAR(FECHA_MES)='$gestion' AND 
                 MONTH(FECHA_MES)='$mes'                 
          ";
  
  $params = array();
  $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
  $getResults= sqlsrv_query($conn, $tsql,$params,$options);
  $numReg=sqlsrv_num_rows($getResults);
  
  for($i=0;$i<$numReg;$i++)
  {
    $row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC);
    $titulo='BOLETA DE PAGO - '.($mesLiteral)." ".$gestion;
    $ci=$row['CI'];
    $nom=$row['NOMBRES']." ".$row['AP_PATERNO']." ".$row['AP_MATERNO'];
    $fIng= date_format( $row['FECHA_INGRESO'],'d/m/Y');
    if ($row['FECHA_NACIMIENTO']='NULL'){
      $fNac= date('d/m/Y');  
    }
    else{
      $fNac= date_format( $row['FECHA_NACIMIENTO'],'d/m/Y'); 
    }
    $dTrab=$row['ASISTENCIA_REGULAR'];
    $cargo=$row['CARGO'];
    ////CUERPO DE LA BOLETA
    $hBas=number_format($row['SUELDO'], 2, '.', '');
    $iva=number_format(0, 2, '.', '');
    $hBasM=number_format($row['SALARIO_MENSUAL'], 2, '.', '');
    $afp=number_format($row['AFP'], 2, '.', '');
    $bono=number_format($row['BONO_ANTIGUEDAD'], 2, '.', '');
    $apSol=number_format(0, 2, '.', '');;
    $hrsExt=number_format(0, 2, '.', '');;
    $anticip=number_format($row['ANTICIPO'], 2, '.', '');
    $feriado=number_format(0, 2, '.', '');; //$row['FERIADO'];
    $faltaCaja=number_format($row['DESCUENTO_DESCUADRE'], 2, '.', '');
    $bonoPas=number_format($row['BONO_TRANSPORTE'], 2, '.', '');
    $sancRep=number_format($row['DESCUENTO_REPOSICION'], 2, '.', '');
    $bonoPue= number_format($row['BONO'], 2, '.', '');
    $otrosEgr=number_format($row['DESCUENTO_RETRASO'], 2, '.', '');
    $otrosIng=number_format(0, 2, '.', '');;//$row['BONO'];
    $TotalEgr=$row['AFP']+
              $row['ANTICIPO']+
              $row['DESCUENTO_DESCUADRE']+
              $row['DESCUENTO_REPOSICION']+
              $row['DESCUENTO_RETRASO'];
    $TotalEgr= number_format($TotalEgr, 2, '.', '');
    $totalGanado=$row['SALARIO_MENSUAL']+
                 $row['BONO_ANTIGUEDAD']+
                 $row['BONO_TRANSPORTE']+
                 $row['BONO'];
    $totalGanado=number_format($totalGanado, 2, '.', '');
    //$hBasM+$bono+$hrsExt+$feriado+$bonoPas+$bonoPue+$otrosIng;
    $LiqPagable=$row['LIQUIDO_PAGABLE'];

    // IMPRIMIENDO EL PDF 
    $pdf->CabeceraBoleta($titulo,$ci,$nom,$fIng,$fNac,$dTrab,$cargo);
    $pdf->CuerpoBoleta($hBas,$iva,$hBasM,$afp,$bono,$apSol,$hrsExt,$anticip,$feriado,$faltaCaja,$bonoPas,$sancRep,$bonoPue,$otrosEgr,$otrosIng,$TotalEgr,$totalGanado,$LiqPagable);
    $pdf->Firmas($nom,$cargo);
    $pdf->CabeceraCopia();
    $pdf->CabeceraBoleta($titulo,$ci,$nom,$fIng,$fNac,$dTrab,$cargo);
    $pdf->CuerpoBoleta($hBas,$iva,$hBasM,$afp,$bono,$apSol,$hrsExt,$anticip,$feriado,$faltaCaja,$bonoPas,$sancRep,$bonoPue,$otrosEgr,$otrosIng,$TotalEgr,$totalGanado,$LiqPagable);
  

    $pdf->Firmas($nom,$cargo);
    $pdf->SaltoPagina();
    $pdf->SaltoPagina();
  }// FIN DE FOR
  
  $pdf->Output();


  ?>