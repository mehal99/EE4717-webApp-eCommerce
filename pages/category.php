<html>
    <?php 
        $productCategory = $_GET['productCategory']; 
        if(!$productCategory )
            $productCategory = 'laptop' //default value
    ?>
    <head>
        <title>Category - <?php echo ucfirst($productCategory); ?></title>
        <link rel="stylesheet" href="../css/index.css"/>
        <link rel="stylesheet" href="../css/nav.css"/>
        <link rel="stylesheet" href="../css/footer.css"/>
        <link rel="stylesheet" href="../css/category.css"/>
    </head>

    <body>
        
        <?php include '../components/nav.php' ?>
        
            <div class="category-page page">
                <div class="title-container">
                    <h1><?php echo ucfirst($productCategory); ?></h1>
                </div>
                <div class="category-content content">
                    <?php
                        include "../php/cart_and_list.php"; 
                        include '../php/connect.php';
                        $sql = "SELECT * FROM `Product` WHERE category='$productCategory';";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $rating = $row['rating'] ;
                                
                                echo '
                                <div class="product-card">
                                    <a href="../pages/productPage.php?productId='. $row['productId']. '" class="product-link">
                                        <img src='. $row['image'] .'/>
                                    </a>
                                    <div class="product-details">
                                        <a href="../pages/productPage.php?productId='. $row['productId']. '" class="product-link">
                                            <div class="product-name">'. $row['name'] .'</div>
                                        </a>
                                        <div class="product-rating">
                                ';
                                include '../components/rating.php';
                                echo '
                                </div>
                                        <div class="product-desc">
                                        '. substr($row['description'], 0, 150) .'...
                                        </div>
                                    </div>
                                    
                                    <div class="product-action">
                                        <div class="product-price">$'. $row['price'] .'</div>
                                        <form method="post">
                                            <input type="hidden" value="'.$row['productId'].'" name="id" />
                                            <input type="hidden" value="cart" name="type" />
                                            <input type="submit" class="btn btn-success btn-block" value="Add to cart"/>
                                        </form>
                                        <form method="post">
                                            <input type="hidden" value="'.$row['productId'].'" name="id" />
                                            <input type="hidden" value="list" name="type" />
                                            <input type="submit" class="btn btn-block btn-outline-warning wishlist-button" value="Add to wishlist"/>
                                        </form>

                                    </div>
                                </div>
                                <hr/>';
                            }
                        }
                        
                        $conn->close();
                    ?>

                </div>
                
            </div>
            <script>
                var result = '<?php echo($res); ?>'
                switch(result){
                    case "NOT_LOGGED_IN" : alert("Please login to continue");
                                            triggerModalById("login-modal");
                                            break;
                    case "ALREADY_ADDED" :  alert("Already added");
                                            break;
                    case "SUCCESS" :    alert("Added to wishlist");
                                        break;
                    case "UNSUCCESS" :   alert("Could not add");
                                        break;
                    case "CART_ADD" :   alert("Added to cart");
                                        break;                    
                    case "CART_UPDATE" : alert("Cart updated");
                                        break;
                }   
            </script>
        <?php include '../components/footer.php' ?>
    </body>

</html>

