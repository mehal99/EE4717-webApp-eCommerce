
<div class="product-rating">
    <?php 
        if($rating){
            $rating_int = intval($rating);
            $remaining = 5; //max rating
            for ($i = 0; $i < $rating_int; $i++) {
                echo "<img src='../images/star-filled.png' class='rating-star'/>";
                $remaining --;
            }
            if($rating - $rating_int > 0){
                echo "<img src='../images/star-half-filled.png' class='rating-star'/>";
                $remaining --;
            }
            if($remaining > 0){
                for ($i = 0; $i < $remaining; $i++) {
                    echo "<img src='../images/star-empty.png' class='rating-star'/>";
                }
            }
        }
    ?>
</div>