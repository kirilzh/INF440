<?php
include 'db_connection.php';
$term = $_GET['query'];
$conn = openCon();
$sql = "SELECT * FROM books_t WHERE title = '%$term%";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data for each row
    while ($row = $result->fetch_assoc()) {
      echo '<div class="container">

              <div class="row text-center">

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="' . $row["img"] . '" alt="">
            <div class="card-body">
              <h4 class="card-title">' . $row["name"] . '</h4>
              <p class="card-text">' . $row["author"] . '</p>
              <p class="card-text">' . $row["price"] . '</p>

            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>

        
      </div>
                </div>
            </div>';
    }
} else {
    echo "0 results";
}

closeCon($conn);

