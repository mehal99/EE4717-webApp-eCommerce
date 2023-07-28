<?php
 
    $result = mysqli_query($conn, "select * from Wishlist where custId=$uid and productId=$id");

    if(mysqli_num_rows($result)>0)
        $res = "ALREADY_ADDED";
    else {
        if(mysqli_query($conn, "insert into Wishlist (custId, productId) values ($uid, $id)")) {
            $res = "SUCCESS";
        } else {
            $res = "UNSUCCESS";
        }
    }
    mysqli_close($conn);
    
    
?>