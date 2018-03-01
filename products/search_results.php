<?php
include 'db_connection.php';
$term = $_GET['query'];
$conn = openCon();
$sql = "SELECT * FROM books_t WHERE title = '%$term%";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data for each row
    while ($row = $result->fetch_assoc()) {
      echo '<section>
              <div class="container py-3">
                <div class="card">
                  <div class="row ">
                    <div class="col-md-4">
                        <img src="' . $row["img"] . '" class="w-100">
                      </div>
                      <div class="col-md-8 px-3">
                        <div class="card-block px-3">
                          <h4 class="card-title">' . $row["name"] . '</h4>
                          <p class="card-text">' . $row["author"] . '</p>
                          <p class="card-text">' . $row["price"] . '</p>
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

