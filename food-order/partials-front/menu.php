<?php include("config/constants.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete responsive food website design </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    
    <!-- font awesome cdn link-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

     <!-- custom css file link-->
     <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- header section starts-->
    <header>

    <a href="#" class="logo"><i class="fas fa-utensils"></i>Chaatmato.</a>

    <nav class="navbar">
        <a class="active" href="<?php echo SITEURL; ?>index.php">home</a>
        <a href="<?php echo SITEURL; ?>dish.php">dishes</a>
        <a href="<?php echo SITEURL; ?>about.php">about</a>
        <a href="<?php echo SITEURL; ?>main.php">menu</a>
        <a href="<?php echo SITEURL; ?>review.php">review</a>
        <a href="<?php echo SITEURL; ?>order.php">order</a>
        
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-shopping-cart"></a>
    </div>


</header>



    <!-- header section ends-->

    <!--search form-->
    <!--ifas fa-times#close -->
<form action="" id="search-form">
    <input type="search" placeholder="search here..." name="" id="search-box">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>     
</form>