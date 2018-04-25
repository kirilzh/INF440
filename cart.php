<?php
session_start();

include "./home/db_connection.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $isbn = $_POST['isbn'];
    $query = "SELECT * FROM books WHERE isbn=$isbn";

    $result = $conn->query($query);
    $product = $result->fetch_assoc();
    if(!empty($_SESSION['products'][$isbn])){
      $quantity = $_POST['quantity'] + $_SESSION['products'][$isbn]['qty'] ;
    } else {
      $quantity = $_POST['quantity'];
    }
    $_SESSION['products'][$isbn] = array('qty'=>$quantity, 'name'=> $product['name'], 'price'=>$product['price'],'img'=>$product['img'], 'subtotal'=>($product['price']* $quantity));
}
 ?>

<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>

<!-- Include the above in your HEAD tag ---------->

<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>

        <?php
            $total = 0;
            if(!empty($_SESSION['products'])) {
              foreach($_SESSION['products'] as $id=>$prod){
                  if ($_SESSION['products'][$id]['qty'] != 0){
                  $total += $_SESSION['products'][$id]['price'] * $_SESSION['products'][$id]['qty'];
                  echo '
                  <form method="post" action="cart_update.php">
                    <tr id="div'.$id.'">
                      <td data-th="Product">
                      <div class="row">
                          <input type="hidden" name="isbn" value="'.$id.'">
                          <div class="col-sm-2 hidden-xs"><img src="'.  $_SESSION['products'][$id]['img'].'" alt="..." class="img-responsive"/></div>
                          <div class="col-sm-10">
                            <h4 class="nomargin">'. $_SESSION['products'][$id]['name'].'</h4>
                          </div>
                      </div>
                      </td>
                      <td data-th="Price" name="price" id="price'.$id.'">$'. $_SESSION['products'][$id]['price'].'</td>
                      <td data-th="Quantity">
                        <input type="number" id="quant'.$id.'" name="qty" class=" form-control text-center" value="'.$_SESSION['products'][$id]['qty'].'">
                      </td>
                      <td data-th="Subtotal" id="subtotal'.$id.'" class="text-center">$'. $_SESSION['products'][$id]['price'] * $_SESSION['products'][$id]['qty']  .'</td>
                      <td class="actions" data-th="">
                          <button name = "submit" class="refresh btn btn-info btn-sm" type="submit"><i class="fa fa-refresh"></i></button>
                          <button name = "delete" class="deletebtn btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                      </td>
                    </tr>
                  </form>';
                }
              }
            }?>
					</tbody>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong>Total 1.99</strong></td>
						</tr>
						<tr>
							<td><a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td id="total" class="hidden-xs text-center"><strong>Total $<?php echo $total ?></strong></td>
							<td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>
</div>
</body>
</html>
<!-- <script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <script src="vendor/jquery/cart.js"></script> -->
<script>
</script>
