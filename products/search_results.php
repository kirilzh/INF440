<?php
include 'db_connection.php';

$conn = openCon();
$term = $_POST["query"];

$sql = "SELECT * FROM books WHERE name LIKE '%$term%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data for each row
    while ($row = $result->fetch_assoc()) {
      echo '<div class="card">
              <img class="card-img-top" src="' . $row["img"] . '" alt="">
              <div class="card-body">
                <h4 class="card-title">' . $row["name"] . '</h4>
                <p class="card-text">' . $row["author"] . '</p>
                <p class="card-text">' . $row["price"] . '</p>
              </div>
            </div>';
    }
} else {
    echo "0 results";
}

closeCon($conn);
