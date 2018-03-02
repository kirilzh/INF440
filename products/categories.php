<?php
include 'db_connection.php';
include('crumbs.php');

$conn = openCon();
$type = 0;
$submit = $_POST['category'];

if($submit == 'non-fiction')
  $type = 1;

// prepare and bind
// $stmt = $conn->("SELECT * FROM books_t WHERE type = (type)");
// $stmt->bind_param("i", $type);
// $stmt->execute();

$sql = "SELECT *
        FROM books
        WHERE type = $type";
$result = $conn->query($sql);

echo '<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Bookstore</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Categories</h1>
        <!-- <div class="list-group">
          <a href="./products/fiction.php" class="list-group-item">Fiction</a>
          <a href="./products/non-fiction.php" class="list-group-item" data-id="non-fiction">Non-Fiction</a>
        </div> -->
        <form method="post" action="products/categories.php">
          <input name="category" type="submit" value="fiction">
          <input name="category" type="submit" value="non-fiction">
        </form>
      </div>
      <!-- /.col-lg-3 -->
      <div class="col-lg-9">
';


if ($result->num_rows > 0) {
    // output data for each row
    while ($row = $result->fetch_assoc()) {
      echo '<section>
              <div class="container py-3">
                <div class="card">
                  <div class="row ">
                    <div class="col-md-4">
                        <img src=".' . $row["img"] . '" class="w-100">
                      </div>
                      <div class="col-md-8 px-3">
                        <div class="card-block px-3">
                          <h4 class="card-title">' . $row["name"] . '</h4>
                          <p class="card-text">' . $row["author"] . '</p>
                          <p class="card-text">' . $row["description"] . '</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </section>';
    }
} else {
    echo "0 results";
}

closeCon($conn);
