<html>
    <head>
        <title>Wishlist</title>
        <link rel="stylesheet" href="../css/index.css"/>
        <link rel="stylesheet" href="../css/nav.css"/>
        <link rel="stylesheet" href="../css/footer.css"/>
        <link rel="stylesheet" href="../css/category.css"/>
    </head>

    <body>      
        <?php 
            include('../php/authorizedPage.php');
            include('../components/nav.php');
        ?>
        
            <div class="category-page page">
                <div class="title-container">
                    <h1>Your Wishlist</h1>
                </div>
                <div class="category-content content">

                    <?php
                        include('../php/connect.php');
                        
                        if(!isset($_SESSION['custId']))
                            echo "Please Login";
                        else {
                            $custId = $_SESSION['custId'];
                            $sql = "SELECT * FROM Wishlist, Product WHERE Wishlist.productId=Product.productId and $custId=custId";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                   
                                    echo '
                                    <div class="product-card justify-content-between" style="padding:20px;">
                                        <a href="../pages/productPage.php?productId='. $row['productId'].'" class="product-link">
                                            <img src="'.$row['image'].'"/>
                                        </a>
                                        <div class="product-details">
                                            <a href="../pages/productPage.php?productId='. $row['productId'].'" class="product-link">
                                                <div class="product-name">'.$row['name'].'</div>
                                            </a>';
                                            $rating = $row['rating']; include '../components/rating.php';
                                    echo'    
                                            <div class="product-price">'.$row['price'].'</div>
                                        </div>
                                      
                                        <form action="../php/delFromWishlist.php" method="post">
                                            <input type="hidden" value="'.$row['productId'].'" name="id" />
                                            <input type="submit" class="btn btn-danger" value="Remove Item"/>
                                        </form>
                                    </div>
                                    <hr/>';   
                                }
                            }
                            else{
                                echo '<div class="no-product">No Product added to wishlist</div>';
                            }
                        }
                    
                    ?>
                                        
                    
                </div>
                <?php $conn->close(); ?>
            </div>
        <?php include '../components/footer.php' ?>
    </body>

</html>

