<?php
  function openCon(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "1234";
    $db = "test";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
    return $conn;
  }

  function closeCon($conn){
    $conn->close();
  }
 ?>
