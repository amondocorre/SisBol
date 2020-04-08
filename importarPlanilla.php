<?php
 session_start();
 include("config/config.php");
 
  $hoy = date("Y"); 
 $ci=0;
 //echo $hoy;
 ?>

 <?php
 if(isset($_SESSION['user']) && isset($_GET['ci']))
 {
  $idT="";
  $username=$_SESSION['user'];
  $idT=$_GET['ci'];
  echo $idT;
 
 }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Menu Desplegable</title>
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/fontello.css">
  <link rel="stylesheet" href="css/tablas.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,600" rel="stylesheet">
</head>
<body>
	<div class="navegacion">
		<nav>
			<ul>
				<li><a href="index.html">Inicio <span class="icon icon-up-dir"></span></a></li>
				<!--<li><a href="#">Nosotros <span class="icon icon-up-dir"></span></a></li> -->
				<li>
					<a href="#">Boletas de Sueldo <span class="icon icon-up-dir"></span></a>
					<div class="submenu">
						<div class="submenu-items">
							<ul>
								<li><a href="importarPlanilla.php">Importar Planilla Mensual</a></li>
								<li><a href="archivos/FormatoPlanillaMensual.xlsx">Exportar Planilla Sueldo</a></li>
								<li><a href="imprimiBoletas.php">Imprimir Boleta de Sueldos</a></li>
							</ul>
						</div>
						
					</div>
				</li>
				<li><a href="index.php">Salir <span class="icon icon-up-dir"></span></a></li>
			</ul>
		</nav>
	</div>
	<!--    parte central de la pagina -->
	<div id="main-container">
    <table class="conespacio"   border=2>
      <form action="" method="POST" enctype="multipart/form-data">
        <tr>
          <td  align="right">Seleccione el Archivo *.csv:</td>
          <td>
            <input type="file" name="archivo_csv" id='archivo'>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" value="ENVIAR" >
            <input type="reset" value="CANCELAR">
          </td>
        </tr>
      </form>
    </table>
  </div> 

<?php 
  function getExtension($str){
     $i = strrpos($str,".");
     if (!$i){
       return "";
     }
  
     $len = strlen($str) - $i;
     $ext = substr($str,$i+1,$len);
     return $ext;
  }
 ?>
    
<?php
if(isset($_FILES["archivo_csv"]["name"] )) {
   $file_upload = $_FILES["archivo_csv"]["name"];
   $tmp_name = $_FILES["archivo_csv"]["tmp_name"];
   $size = $_FILES["archivo_csv"]["size"];
   $tipo = $_FILES["archivo_csv"]["type"];
   
   if($size > 0){
     $fp = fopen($tmp_name, "r");
   
    while($datos = fgetcsv ($fp, 10000, ";")){
        $tsql="INSERT INTO SIREPE_PLANILLAS (ID_EMPLEADO,
                                        CI,
                                        NOMBRES,
                                        AP_PATERNO,
                                        AP_MATERNO,
                                        CARGO,
                                        CTA_BANCARIA,
                                        FECHA_INGRESO,
                                        FECHA_RETIRO,
                                        SUELDO,
                                        FECHA_MES,
                                        ASISTENCIA,
                                        ASISTENCIA_MENSUAL,
                                        ASISTENCIA_REGULAR,
                                        ASISTENCIA_REGULAR_M,
                                        ASISTENCIA_REGULAR_T,
                                        ASISTENCIA_REGULAR_N, 
                                        BAJA_MEDICA,  
                                        FALTA_INJUSTIFICADA,  
                                        FALTA_JUSTIFICADA,  
                                        FERIADO,  
                                        LIBRE,  
                                        VACACION, 
                                        SALARIO_DIARIO, 
                                        SALARIO_MENSUAL,  
                                        BONO,   
                                        BONO_ANTIGUEDAD,  
                                        BONO_TRANSPORTE,  
                                        TOTAL_GANADO, 
                                        ANTICIPO, 
                                        DESCUENTO_REPOSICION, 
                                        DESCUENTO_DESCUADRE,  
                                        MINUTOS_RETRASO,  
                                        DESCUENTO_RETRASO,  
                                        DESCUENTO_FALTA,  
                                        AFP,  
                                        LIQUIDO_PAGABLE
                                        ) 
        VALUES (?,?,?,?,?,?,?,?,?,?,
                ?,?,?,?,?,?,?,?,?,?,
                ?,?,?,?,?,?,?,?,?,?,
                ?,?,?,?,?,?,?
                );";
        $fIngreso=date("Y-m-d", strtotime(str_replace('/', '-',$datos[10])));
        $fRetiro=date("Y-m-d", strtotime(str_replace('/', '-',$datos[11])));
        $fMes=date("Y-m-d", strtotime(str_replace('/', '-',$datos[13])));
        $bono=0;
        $params=array($datos[1],
                 $datos[2].$datos[3],
                 $datos[5],
                 $datos[6],
                 $datos[7],
                 $datos[8],
                 $datos[4],
                 $fIngreso,
                 $fRetiro,
                 $datos[12],
                 $fMes,
                 $datos[14],
                 $datos[15],
                 $datos[16],
                 $datos[17],
                 $datos[18],
                 $datos[19],
                 $datos[20],
                 $datos[21],
                 $datos[22],
                 $datos[23],
                 $datos[24],
                 $datos[28],
                 $datos[29],
                 $datos[30],
                 $bono,
                 $datos[33],
                 $datos[32],
                 $datos[34],
                 $datos[35],
                 $datos[36],
                 $datos[37],
                 $datos[38],
                 $datos[39],
                 $datos[40],
                 $datos[41],
                 $datos[42]
               );
        $getResults= sqlsrv_query($conn, $tsql, $params);
    	  $rowsAffected = sqlsrv_rows_affected($getResults);
    	
	      if ($getResults == FALSE or $rowsAffected == FALSE)
	         die(FormatErrors(sqlsrv_errors()));
	
	      sqlsrv_free_stmt($getResults);
	      echo '<br>';
  	}//end de while
	?>
  <script>
    alert('Datos importados  correctamente');
    window.location='index.html';
  </script>
  <?php
  }//fin de if
}

$linea = 0;
?>
  </div>
 </body>
</html>


                   
</body>
</html>