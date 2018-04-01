<?php

include 'db_connection.php';
$conn = openCon();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $username = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $address = $_POST["address"];
    if ($_POST["password"] == $_POST["repeat_password"]){
      $password = $_POST["password"];
    }else{
      echo "Your passwor is invalid";
    }

    $sql = "INSERT INTO customers (firstName, lastName, password, address)
            VALUES ('$username', '$lastName', '$password', '$address')";

    if($conn->query($sql) == TRUE){
      echo "New record created sucsessfully";
    }else{
      echo "error";
    }
}
