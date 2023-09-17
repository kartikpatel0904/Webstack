<?php
    //Define global variables for connection
    $servername = "localhost:3306";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "DB_WEBSTACK";


    //Connect to database
    function ConnectDB(){
      $conDB=  mysqli_connect($GLOBALS['servername'], $GLOBALS['dbusername'], $GLOBALS['dbpassword'], $GLOBALS['dbname']);
        return $conDB;
    }
?>
