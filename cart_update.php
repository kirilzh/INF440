<?php
    session_start();
    if(isset($_POST['submit'])){
        $id_update = $_POST['isbn'];
        $quant_update = $_POST['qty'];

        $_SESSION['products'][$id_update]['qty'] = $quant_update;
        header("location: cart.php");
    }
    else if(isset($_POST['delete'])){
        $id_update = $_POST['isbn'];
        $_SESSION['products'][$id_update]['qty'] = 0;
        header("location: cart.php");
    }

?>
