<?php
if (empty($_SESSION['login_user']) != TRUE){
  header("location: ../register.php");
}else{
  header("location: ../checkout.php");
}
