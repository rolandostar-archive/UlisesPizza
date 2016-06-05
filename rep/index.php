<?php
session_start();
$title = "Navegacion - Little Ulises Pizza&trade;";
//$css = "./css/resumen.css";
if(isset($_SESSION['email'])) {
    require_once('db.class.php');
    $db = new database();
    ?>


<a href="https://maps.google.com?saddr=Current+Location&daddr=760+West+Genesee+Street+Syracuse+NY+13204">Test Link</a>

<?php
}else{
    echo '<script> window.location="login.php"; </script>';
}

?>