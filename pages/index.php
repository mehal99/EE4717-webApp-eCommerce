<html>
    <head>
        <title>Shopping website</title>
        <link rel="stylesheet" href="../css/index.css"/>
        <link rel="stylesheet" href="../css/nav.css"/>
        <link rel="stylesheet" href="../css/footer.css"/>
        <link rel="stylesheet" href="../css/category.css"/>
    </head>

    <body>

        <?php include '../components/nav.php' ?>
        <?php 
            include '../php/connect.php'; 
            $res="";
            if(!isset($_SESSION['custId']) && isset($_POST['id']))
                $res = "NOT_LOGGED_IN";
            else if(isset($_SESSION['custId']) && isset($_POST['id']))
            {
                $id = $_POST['id'];
                $uid = $_SESSION['custId'];
                if($_POST['type'] == "cart")
                {
                    include "../php/addToCart.php";   
                }
                else 
                {
                    include "../php/addToWishlist.php";
                }
                
            }
            unset($_POST['id']); //as we don't want the product id to be the same if we reload the page
        ?>
        <div class="container">
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="../images/new-ce-exclusive-desktop.webp" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="../images/new-ncl-note20-banner-desktop.webp" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="../images/tab-a7-shop-offer-desktop.webp" style="width:100%">
                </div>
            </div>

            <br>

            <div style="text-align:center">
                <span class="dot"></span> 
                <span class="dot"></span> 
                <span class="dot"></span> 
            </div>

            <h1 class="display border-bottom heading" >Best Selling Products</h1>
            
            <div class="flex-row justify-content-around ">
                <?php 
                    include '../php/connect.php';
                    $result = mysqli_query($conn, "SELECT * FROM Product where bestSellingProduct = 1");
                    while($row= mysqli_fetch_assoc($result))
                    {  
                        echo '
                        <div class="card index-product">
                            
                                <img src= "'.$row['image'].'" alt="..." class="card-img">
                            
                            <div class="card-body"> 
                             <a href="../pages/productPage.php?productId='. $row['productId']. '" class="product-link">
                                <h5 class="card-title"> '.$row['name'].' </h5>
                                </a>
                                <div>
                                    <p class="card-text product-price">$'.$row['price'].'</p>
                                    <form method="post">
                                        <input type="hidden" value="'.$row['productId'].'" name="id" />
                                        <input type="hidden" value="cart" name="type" />
                                        <input type="submit" class="btn btn-success btn-block" value="Add to cart"/>
                                    </form>
                                    <form method="post">
                                        <input type="hidden" value="'.$row['productId'].'" name="id" />
                                        <input type="hidden" value="list" name="type" />
                                        <input type="submit" class="btn btn-outline-warning btn-block wishlist-button" value="Add to wishlist"/>
                                    </form>
                                </div>
                            </div>
                        </div> ' ;
                    }
                    //product id accessed by product page using get variable present in the hyperlink 
                ?>
            </div>
            <?php $conn->close(); ?>
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
                case "UNSUCCESS" :   alert("Could not add"); //not used generally 
                                    break;
                case "CART_ADD" :   alert("Added to cart");
                                    break;                    
                case "CART_UPDATE" : alert("Cart updated");
                                    break;
            }   
        </script>
        <script src="../js/index.js" ></script>
        <?php include '../components/footer.php' ?>
    </body>

</html>