<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br /> <br />

        <?php 
            if(isset($_SESSION['add'])) //checking wheather the session is set or not
            {
                echo $_SESSION['add']; //Display the session message if set
                unset($_SESSION['add']); //Remove session message
            }
        ?>
    
         <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="type" name="full_name" placeholder="Enter your name">
                        </td>
                    </tr>

                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" placeholder="your username">
                        </td>
                    </tr>

                    <tr>
                    <td>Password: </td>
                    <td>
                     <input type="password" name="password" placeholder="your password">  
                    </td>

                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="add Admin" class="btn-secondary">
                        </td>
                    </tr>

                </table>
         </form>
</div>
</div>
<?php include('partials/footer.php'); ?>

<?php 
     //process the value from and save it in database
     //check wheather the submit button is clicked or not

     if(isset($_POST['submit']))
     {
        //Button clicked
        //echo "Button clicked";

        //1.Get the data from form
         $full_name = $_POST['full_name'];
         $username = $_POST['username'];
         $password = md5($_POST['password']); //Password encryption with md5

         //2.SQL Query to save the data into the database
         $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
         ";

         //3. Execute query and save data into database
         

         $res = mysqli_query($conn, $sql) or die(mysqli_error());

         //4.check wheather the (query is executed) data is inserted or not
         if($res==TRUE)
         {
            //DATA INSERTED
            //echo "Data inserted";
            //create a session variable to display message
            $_SESSION['add'] = "Admin added successfully";
            //Redirect page to manage Admin
            header("location:" .SITEURL.'admin/manage-admin.php');
            
         }
         else{
            //FAILDED TO INSERT DATA
            //echo "Failed to inser data";
            //create a session variable to display message
            $_SESSION['add'] = "Failed to add Admin";
            //Redirect page to Add Admin
            header("location:" .SITEURL.'admin/add-admin.php');
         }
     }
?>