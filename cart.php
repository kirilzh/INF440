<?php
session_start();

include "./home/db_connection.php";


if($_SERVER['REQUEST_METHOD']=='POST'){
    $isbn = $_POST['isbn'];
    $query = "SELECT * FROM books WHERE isbn=$isbn";

    $result = $conn->query($query);
    $product = $result->fetch_assoc();
    $_SESSION['products'][$_POST['isbn']]['qty'] = 0;
    $quantity = $_POST['quantity'] + $_SESSION['products'][$_POST['isbn']]['qty'] ;
    $_SESSION['products'][$_POST['isbn']] = array('qty'=>$quantity, 'name'=> $product['name'], 'price'=>$product['price'],'img'=>$product['img']);
}

?>

<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- Bootstrap core CSS -->
<!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

<!-- Custom styles for this template -->
<link href="css/shop-homepage.css" rel="stylesheet">

</head>

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
            foreach($_SESSION['products'] as $id=>$prod){
                $total += $_SESSION['products'][$id]['price'] * $_SESSION['products'][$id]['qty'];
                echo '
                <tr id="div'.$id.'">
                <td data-th="Product">
                <div class="row">
                    <div class="col-sm-2 hidden-xs"><img src="'.  $_SESSION['products'][$id]['img'].'" alt="..." class="img-responsive"/></div>
                    <div class="col-sm-10">
                        <h4 class="nomargin">'. $_SESSION['products'][$id]['name'].'</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price" id="price'.$id.'">$'. $_SESSION['products'][$id]['price'].'</td>
            <td data-th="Quantity">
                <input type="number" id="quant'.$id.'" class=" form-control text-center" value="'.$_SESSION['products'][$id]['qty'].'">
            </td>
            <td data-th="Subtotal" id="subtotal'.$id.'" class="text-center">$'. $_SESSION['products'][$id]['price'] * $_SESSION['products'][$id]['qty']  .'</td>
            <td class="actions" data-th="">
                <button name="'.$id.'" class="refresh btn btn-info btn-sm" ><i class="fa fa-refresh"></i></button>
                <button name="'.$id.'" class="deletebtn btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
            </td>
            </tr>'
            ;
            }
            // echo json_encode($_SESSION['products']);
    ?>

						</tr>
					</tbody>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong>Total 1.99</strong></td>
						</tr>
						<tr>
							<td><a href="index.php" class="btn btn-warning">
                <i class="fa fa-angle-left"></i>Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td id="total" class="hidden-xs text-center">
                <!-- <strong>Total $<?php echo $total ?></strong> -->
              </td>
							<td><a id="checkout" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>
</div>
<!-- <script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <script src="vendor/jquery/cart.js"></script> -->

<script>
    $('.refresh').click(function(){
        var refresh_id = this.name;
        var refresh_quant = $('#quant'+refresh_id).val();
        var refresh_price = $('#price'+refresh_id).text();
        refresh_price = refresh_price.substring(1,refresh_price.length);

        var sess = <?php echo json_encode($_SESSION['products']) ?>;

        $('#quant'+refresh_id).html(refresh_quant);
        $('#subtotal'+refresh_id).html('$'+refresh_quant*refresh_price);

        var total = 0;
        var subtotal = 0;
        for(i = 0; i < 10; i++){
            if($('#subtotal'+i).text().match(/\d+/) != null){
                subtotal = ($('#subtotal'+i).text()).match(/\d+/);
                total = parseFloat(total) + parseFloat(subtotal[0]);
            }
        }
        $('#total').html('Total $'+total);
    });

    $('.deletebtn').click(function(){
        var delete_id = this.name;
        console.log(delete_id);
        $('#div'+delete_id).remove();

        var total = 0;
        var subtotal = 0;
        for(i = 0; i < 10; i++){
            console.log($('#subtotal'+i).text());
            if($('#subtotal'+i).text().match(/\d+/) != null){
                subtotal = ($('#subtotal'+i).text()).match(/\d+/);
                total = parseFloat(total) + parseFloat(subtotal[0]);
            }
        }
        $('#total').html('Total $'+total);
    });

    var total_quant = 0;
    var subtotal_quant = 0;
    $("#checkout").click(function(){
      for(i = 0; i < 10; i++){
        if($('#quant'+i).val() != null){
          subtotal_quant = $('#quant'+i).val();
          total_quant = parseFloat(total_quant) + parseFloat(subtotal_quant[0]);
        }
      }
      console.log(total_quant);
      $.ajax({
        type: "GET",
        url: "products/checkAuth.php",
        success: function(data){
          $("#cart").html(data);
        }
      })
      $('#total_quant').html(total_quant);
    });
</script>

</body>
</html>