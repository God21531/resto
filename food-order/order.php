<?php include('partials-front/menu.php'); ?>






<!--order section starts-->
<section class="order" id="order">

    <h3 class="sub-heading">order now</h3>
    <h1 class="heading"> free and fast</h1>

   <form action="data.php" method="post">

    <div class="inputBox">
    <div class="input">
        <span>Your name</span>
        <input type="text" placeholder="enter your name" name="name" id="name">
    </div>

    <div class="input">
        <span>Your number</span>
        <input type="text" placeholder="enter your number" name="phno" id="phno">
    </div>
    </div>
    <div class="inputBox">
    <div class="input">
        <span>Your order</span>
        <input type="text" placeholder="enter food name" name="order" id="order">
    </div>

    <div class="input">
        <span>additional food</span>
        <input type="text" placeholder="extra with food" name="extra" id="extra">
    </div>
    </div>
    <div class="inputBox">
    <div class="input">
        <span>How much</span>
        <input type="text" placeholder="how many orders" name="much" id="much">
    </div>

    <div class="input">
        <span>date and time </span>
        <input type="datetime-local" name="date" id="date">
    </div>
</div>
<div class="inputBox">
    <div class="input">
        <span>Your address</span>
       <input name="" placeholder="enter your address" id="add"  name="add">
    </div>

    <div class="input">
        <span>Your message</span>
       <input name="" placeholder="enter your message" id="mage"  name="mage">
    </div>

    
</div>

<input type="submit" value="order now" class="btn">

   </form>
    

    
    
    

</section>
<!--order section ends-->

<?php include('partials-front/footer.php'); ?>