<?php

include 'db_connection.php';
$conn = openCon();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT id
            FROM customers
            WHERE firstName = '$username' and password = '$password'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
      $_SESSION['login_user'] = $username;
      header("location: ../index.php");
    } else {
      echo "Your login Name or Password is invalid";
    }
}
