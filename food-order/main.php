<?php include('partials-front/menu.php'); ?>

<!--menu section starts-->

<section class="menu" id="menu">
    <h3 class="sub-heading">our menu</h3>
    <h1 class="heading"> today's speciality </h1>

    <?php 
        $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 4 ";

        $res2= mysqli_query($conn, $sql2);
        
        $count2 = mysqli_num_rows($res2);

        if($count2>0)
        {
            //categry available
            while($row=mysqli_fetch_assoc($res2)){
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description=$row['description'];
                $image_name=$row['image_name'];

                ?>


                <?php 
                if($image_name==""){
                    echo "<div class='error'>Image not availale</div>";
                }
                else{
                
                ?>

<div class="box-container">
        <div class="box">
            <div class="image">
                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Shawarma">
                <a href="#" class="fas fa-heart"></a>
        </div>
        <div class="content">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3><?php echo $title; ?></h3>
            <p><?php echo $description; ?></p>
            <a href="#" class="btn">add to cart</a>
            <span class="price">$<?php echo $price; ?></span>
        </div>
        </div>

                <?php
            }
            ?>

                

            
            

                   <?php

            }

        }
        
        else{
            //category not available
            echo"<div class='error'>Category not added. </div>";
        }
        ?>

    
    
        
   

</section>

<!--menu section ends-->

<?php include('partials-front/footer.php'); ?>
