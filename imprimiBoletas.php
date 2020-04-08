<?php
// session_start();
 include("config/config.php");
   include('librerias/pdf/fpdf.php');
  $hoy = date("Y/m/d"); 
  //echo $hoy;
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
    <form target="_blank" action="boletaPago.php" method="POST" >
      <table width="50%" align="center" border=2>
        <tr>
          <td  align="right">Seleccione el Año:</td>
            <td>
              <select name="gestion" id="gestion" style="width:180px;">
                <option value="null">Seleccion el año</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
              </select>   
            </td>
        </tr>
        <tr>
          <td  align="right">Seleccione el Mes:</td>
          <td>
            <select name="mes" id="mes" style="width:180px;">
              <option value="null">Seleccion el Mes</option>
              <option value="1">01</option>
              <option value="2">02</option>
              <option value="3">03</option>
              <option value="4">04</option>
              <option value="5">05</option>
              <option value="6">06</option>
              <option value="7">07</option>
              <option value="8">08</option>
              <option value="9">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>   
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit"  value="Generar Boletas"  > 
          </td>
        </tr>
    </form>
  </table>
 </div> 

               
  
 </body>
</html>

