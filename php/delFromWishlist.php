<?php
    include("./connect.php");
      
    session_start();
    $id = $_POST['id'];
    $uid = $_SESSION['custId'];

    mysqli_query($conn, "delete from Wishlist where custId=$uid and productId=$id");
    header("location:../pages/wishlist.php");
  
?>