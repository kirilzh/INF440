<?php

include 'db_connection.php';

$conn = openCon();
$term = $_POST["query"];

$sql = "SELECT * FROM books WHERE name LIKE '%$term%'";
$result = $conn->query($sql);

function trimtext($text)
{
    $trimmed_text = "";
    if (strlen($text)>100) {
        $trimmed_text = substr($text, 0, 200);
        //strripos - finds position of a last occurence of a string in a string
        $last_space = strripos($trimmed_text, ' ');
        //cuts until the last full word
        $trimmed_text = substr($trimmed_text, 0, $last_space);
    }
    return $trimmed_text;
};

if ($result->num_rows > 0) {
    // output data for each row

    echo '<div class="row">
           <div class="card-deck">';
    while ($row = $result->fetch_assoc()) {
      echo '

      <div class="col-lg-4 col-md-6 mb-4">
      <form method="post" action="cart.php">
        <div class="card">
          <img class="card-img-top" src="' . $row["img"] . '"">
        <div class="card-body">
          <h4 class="card-title">' . $row["name"] . '</h4>
          <p class="card-text">' . $row["author"] . '</p>
          <h5> $' .$row["price"] . '</h5>
          <p class="card-text" maxlength=50>'.trimtext($row["description"]).'<a href="#"> ...(more)</a> </p>
          <input type="text" name="quantity" value="1" size="2"/>
          <input type="submit" name="add" class="btn btn-primary" value="Add to cart" />
          <input type="hidden" name="isbn" value=' .$row['isbn'].'>
        </div>
      </div>
      </form>
    </div>
    ';
    }
    echo '</div></div>';

} else {
    echo "0 results";
}

closeCon($conn);

echo '<div class="card">
        <img class="card-img-top" src="' . $row["img"] . '" alt="">
        <div class="card-body">
          <h4 class="card-title">' . $row["name"] . '</h4>
          <p class="card-text">' . $row["author"] . '</p>
          <p class="card-text">' . $row["price"] . '</p>
        </div>
      </div>';
