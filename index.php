<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="./public/images/logo.png" style="height:30px;width:30px;margin:0px;"> </a>
        <a class="navbar-brand" href="#"> The Book Basement </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a id="home_nav" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a id="products_nav" class="nav-link">Products</a>
            </li>
            <li class="nav-item">
              <a img="./images/cart.png" href = "#"></a>
              <a class="nav-link" href="#">
                <img  src="./public/images/cart.png" height="20px" width="20px"> Cart</a>
            </li>

            <?php
            if (empty($_SESSION['login_user']) != TRUE){
              echo '
              <li class="nav-item">
                <a class="nav-link" href="profile.php">
                  <img  src="./public/images/account.png" height="20px" width="20px">' . $_SESSION['login_user'] . '</a>';
                }else{
                  echo '
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">
                      <img  src="./public/images/account.png" height="20px" width="20px">' . 'Log In' . '</a>';
                    } ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div id="res"></div>
    </div>

    <!-- Footer -->
    <footer class="py-2 bg-dark">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">About the site </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Contact us </a>
            </li>
        </nav>

      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery/index.js"></script>
    <script src="vendor/jquery/products.js"></script>


  </body>

</html>
