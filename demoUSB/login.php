<?php
include_once('dbconnect.php');
//print_r($_POST);
if (strpos($_POST['email'], '@') !== false) {
    $result = mysql_query("SELECT * FROM usuarios_pass WHERE Email='".$_POST['email']."' AND Password='".$_POST['password']."'") or die(mysql_error());
    if(mysql_num_rows($result) > 0){
        while($row = mysql_fetch_assoc($result)) { 
            echo '<h1>Bienvenido '.$row['Nombre'].'</h1>[pass]';
        }
    }else{
        echo 'Usuario o Contraseña incorrectos';
        header( "Refresh:3; url=http:/demoUSB/index.php", true, 303); //RFC 3986 Seccion 4.2 Apendice A
    }
}else{
    $result = mysql_query("SELECT * FROM usuarios_llave WHERE Serial='".$_POST['email']."'") or die(mysql_error());
    if(mysql_num_rows($result) > 0){
        while($row = mysql_fetch_assoc($result)) { 
            echo '<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Bienvenido '.$row['Nombre'].' - Little Ulises Pizza&trade;</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="index, follow">

        <!-- icons -->
        <link rel="shortcut icon" href="/favicon.ico">

        <link rel="stylesheet" href="/Assets/css/styles.css">
        <link rel="stylesheet" href="/Assets/css/login.css">
        <script type="text/javascript" src="js/hotkeys.min.js"></script>



        <style>
            .small {
                padding: 0;
                margin: 0;
            }
        </style>
        <script>
            hotkeys("ctrl+f12", function(event,handler){
                  switch(handler.key){
                      case "ctrl+f12":
                        window.location.href = \'./index.php\';
                      break;
                  }
              });
        </script>

    </head>

    <body>
        <header>
            <div class="nav-bar">
                <div class="container">
                    <ul class="nav">
                        <li><a href="javascript:alert(\'Para salir, remueve la USB\');">Salir</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <main class="container-narrow">
            <h1>Bienvenido '.$row['Nombre'].'</h1>[llave]
        </main>
    </body>
</html>';
        }
    }else{
        echo 'Llave incorrecta';
        header( "Refresh:3; url=http:/demoUSB/index.php", true, 303);
    }
}
?>