<div class="row">

  <div class="col-lg-3">
      <h2 class="my-4">Search</h2>
      <div class="form-group">
          <input class="form-control input-sm" id="search-input" type="text" value="Search">
          <br>
          <button class="btn btn-block" id="search-button" type="button"> Submit </button>
      </div>
    <h2 class="my-4">Browse</h2>
    <div class="list-group">
      <a href="#" class="list-group-item">Science Fiction</a>
      <a href="#" class="list-group-item">Action and Adventure</a>
      <a href="#" class="list-group-item">Romance</a>
      <a href="#" class="list-group-item">Mystery</a>
      <a href="#" class="list-group-item">History</a>
      <a href="#" class="list-group-item">Children's</a>
      <a href="#" class="list-group-item">Poetry</a>
      <a href="#" class="list-group-item">Foreign Literature</a>

    </div>

  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="./public/images/11.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="./public/images/12.png" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="row">
    <?php
    function openCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = 1234;
        $db = 'test';

        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
        return $conn;
    }

    function closeCon($conn)
    {
        $conn->close();
    }

    $conn = openCon();
    $sql = "SELECT * FROM books";
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
        //keep track of number of items displayed on home page
        $num = 1;
        while ($num<7) {
            $row = $result->fetch_assoc();
            echo '<div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100" style="height:18rem;">
            <a href="#"><img class="card-img-top" style="height: 352px; width:253px;" src="'.$row["img"].'" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">'. $row["name"] . '</a>
              </h4>
              <h5 class="card-title">
                  ' . $row["author"] .'
              </h5>
              <h5> $' .$row["price"] . '</h5>
              <p class="card-text" maxlength=50>'.trimtext($row["description"]).'<a href="#"> ...(more)</a> </p>
            </div>
          </div>
        </div>';

            $num+=1;
        }
    }



?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->
