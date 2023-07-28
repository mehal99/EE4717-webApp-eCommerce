<?php
    include "../php/connect.php";
    $pid = $_POST['product_id'];
    $oid = $_POST['order_id'];
    $sql = "delete from OrderItems where productId = $pid and orderId = $oid";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location:../pages/shoppingCart.php");
?>