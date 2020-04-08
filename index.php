<?php   
  include("config/config.php");
?>

<html >
<head>
  <title>Boleta de Sueldos</title>
  <!--JQUERY-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <!-- Los iconos tipo Solid de Fontawesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <!-- nuestro css-->
  <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body >
  <div class="modal-dialog text-center">
    <div class="col-sm-8">
      <div class="modal-content">
        <div class="col-12">
          <img src="images/logo-capresso.png"  width="200" height="200" align="center" alt=""/>
        </div>
        <form class="col-12" action="" method="post" name="frm_login" id="frm_login" enctype="multipart/form-data"> 
          <div class="form-group">
            <input type="text" name="txt_username" placeholder="Nombre del Usuario"/>
          </div>
          <div class="form-group">
            <input type="password" name="txt_password" placeholder="Pasword"/>
          </div>
          <input type="submit" id="submitMain" name="submitMain" class="btn btn-primary" value="Ingresar" Onclick="return check(this.form);" />
        </form>
        
      </div>
    </div>
  </div>

<?php
 if(isset($_POST['submitMain'])) {
    $user =$_POST['txt_username'];
    $password=$_POST['txt_password'];
    $tsql= "SELECT * FROM SIREPE_ACCESO where USUARIO='$user' AND PASWORD='$password'" ;
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $getResults= sqlsrv_query($conn, $tsql,$params,$options);
    $row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC);
    $numReg=sqlsrv_num_rows($getResults);
    if($numReg>0){
      $_SESSION['user']=$user;
      echo "<script>window.location='index.html';</script>";
    }//end if
    else{
      echo '
            <div class="modal-dialog text-center">
              <div class="col-sm-8">
              <div class="modal-content">
                <strong>
                  <font color="#EC7063 ">Usuario o contraseña son incorrectos !!</font>
                </strong>
              </div>
            </div>
            </div>
            ';
     //header('Location: error.php?mensaje=Tus nombre de usuario o clave son incorrectos');
     //echo '<div align="center"><strong><font color="#FF0000">usuario u contraseña son incorrectos !!</font></Strong></div>';
    }
  }//end if
?>
</body>
</html>