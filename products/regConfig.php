<?php
include 'db_connection.php';
$conn = openCon();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $address2 = $_POST["address2"];
    $country = $_POST["country"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];

    // check if the username already exists
    $sql = "SELECT *
            FROM customers
            WHERE username = '$username'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
      echo 'Taken username';
      header('location: ../register.php');
    } else {
      $password = $_POST["password"];
      $sql = "INSERT INTO customers (firstName, lastName, username, password, address, address2, country, state, zip)
      VALUES ('$firstName', '$lastName', '$username', '$password', '$address', '$address2', '$country', '$state', '$zip')";

      if($conn->query($sql) == TRUE){
        echo "New record created sucsessfully";
        header('location: ../index.php');
      }else{
        echo "error";
      }
    }


  //   if ($result->num_rows > 0){
  //     echo 'taken';
  //   }else{
  // }
}
