
<?php include('../config/constants.php');?>
<html>
    <head>
        <title>Login - Food order system</title>
        <link rel="stylesheet" href="../css/admin.css">

</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1> 
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset( $_SESSION['no-login-message']))
                {
                    echo  $_SESSION['no-login-message'];
                    unset( $_SESSION['no-login-message']);
                }
            ?>

            <br><br>
        <!--login form starts here -->
        <form action="" method="POST" class="text-center">
            username: <br>
        <input type="text" name="username" placeholder="Enter Username"><br><br>
        password: <br>
        <input type="password" name="password" placeholder="Enter Password" > <br><br>

        <input type="submit" name="submit" value="Login" class="btn-primary">
        <!--login form ends here -->
        <br><br>
        </form>
        <p class="text-center">Created By - <a href="www.google.com">JOSH THAPA</a></p>
</div>
</body>
    </html>

    <?php 
     //check wheather the submit button is clicked or not
     if(isset($_POST['submit']))
     {
        //Process for login
        //1.get data from login form
         $username = $_POST['username'];
         $password = md5($_POST['password']);

         //2. SQL to check wheather the user with username and password exists or not
         $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

         //3. Execute the query
        $res = mysqli_query($conn, $sql);

        //4. count rows check wheather the user is exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
                //user available and login success
                $_SESSION['login'] = "<div class='success'>Login Successful. </div>";
                $_SESSION['user'] = $username; //TO check wheather the user is logged in or not and logout will unset it
                //Redirect to home page/Dashboard
                header('location:'.SITEURL.'admin/');
        }
        else{
                //user not available and login failed
                $_SESSION['login'] = "<div class='error text-center'>Username and password did not match. </div>";
                //Redirect to home page/Dashboard
                header('location:'.SITEURL.'admin/login.php');
        }

     }
    ?>