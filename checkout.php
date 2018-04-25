<?php
include 'cart.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Checkout page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  </head>
  <body>
<div class="container" style="padding:50px">
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Your cart
        <span class="badge badge-secondary badge-pill">
          <?php
          $qtyTotal = 0;
          foreach ($_SESSION['products'] as $id=>$prod) {
            $qtyTotal = $_SESSION['products'][$id]['qty'] + $qtyTotal;
          }
          echo $qtyTotal;
          ?>
        </span>
        </h3>
      </div>
    </div>

  <ul class="list-group mb-3">
    <li class="list-group-item d-flex justify-content-between lh-condensed">
      <div>
        Name
        <input class="my-0 change" style="border-style:none" value = "<?php echo $_SESSION['name']; ?>" readonly="readonly" />
      </div>
      <div>
        Address
        <input class="my-0 change" style="border-style:none" value="<?php echo $_SESSION['address']; ?>" readonly="readonly" />
      </div>
    </li>
    <button class="btn btn-success btn-xs btn-block" id='change'>Change</button>
    <button id='saveChange' class="btn btn-success btn-xs btn-block">Save Changes</button>
    <li class="list-group-item d-flex justify-content-between bg-light">
      <div class="text-success">
        <h6 class="my-0">Discount 5%</h6>
        <small></small>
      </div>
      <span class="text-success">-$
        <?php   $discount = $total*0.05;
                echo number_format($discount, 2);
       ?>
     </span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
      <span>Total (USD)</span>
      <strong><?php echo number_format($total - $discount, 2)?></strong>
    </li>
  </ul>
  </div>
  <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Payment Details
                    </h3>
                    <div class="checkbox pull-right">
                        <label>
                            <input type="checkbox" />
                            Remember
                        </label>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form">
                    <div class="form-group">
                        <label for="cardNumber">
                            CARD NUMBER</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expityMonth">
                                    EXPIRY DATE</label>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode">
                                    CV CODE</label>
                                <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <br/>
            <a href="http://www.jquery2dotnet.com" class="btn btn-success btn-lg btn-block" role="button">Pay</a>
        </div>

</div>
</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
$('#change').click(function(){
  $('.change').removeAttr('readonly');
  $('.change').css('border-style', "solid");

})
$('#saveChange').click(function(){
  $('.change').attr('readonly', 'readonly');
  $('.change').css('border-style', "none");
})
</script>

  </body>
</html>
