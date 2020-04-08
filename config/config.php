<?php
  $serverName = "capresso.database.windows.net";
    $connectionOptions = array(
        "Database" => "BDCapresso",
        "UID" => "capresso",
        "PWD" => "Qwerty123"
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if(!$conn)
    {
    ?>
      <script>
      alert('errror de Conexion a la BD comuniquese con su administrador..');
      window.location='errorBD.php';
     </script>
    <?php
    }
    ?> 


