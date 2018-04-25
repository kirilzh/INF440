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
            WHERE username = '$username' and password = '$password'";
    $result = $conn->query($sql);

    $sql = "SELECT *
            FROM customers
            WHERE username = '$username' and password = '$password'";
    $data = $conn->query($sql);
    $info = $data->fetch_assoc();

    if($result->num_rows == 1){
      $_SESSION['login_user'] = $username;
      $_SESSION['name'] = $info['firstName'] . " " . $info['lastName'];
      $_SESSION['address'] = $info['address'];
      header("location: ../index.php");
    } else {
      echo "Your login Name or Password is invalid";
    }
}
