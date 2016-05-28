<?php
 require_once "log.class.php";
    $log = new PHPLogger();

    //Print out some debug.
    $log->d("DEBUGGING FTW");

    //Print some info
    $log->i("Making cup of tea.");

    //Print some error
    $log->e("OH NO! Spoke too soon, SERVER DOWN!");
    //you get the drift...
    $log->w("OOPS! Spoke too soon, SERVER DOWN!");
?>