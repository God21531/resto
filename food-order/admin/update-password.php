<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>current password: </td>
                <td>
                    <input type="password" name="current_password" placeholder="Old password">
                </td>

            </tr> 

            <tr>
                <td>New password: </td>
                <td>
                    <input type="password" name="new_password" placeholder="New Password">
                </td>
            </tr>

            <tr>
                <td>Confirm password: </td>
                <td>
                    <input type="password" name="confirm_password" placeholder="Confirm Password">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                </td>
            </tr>



        </table>

        </form>

</div>
</div>

<?php 
       //chech wheather the submit button is clicked or not
       if(isset($_POST['submit']))
       {
        //echo "clicked";

        //1.Get data from form

        $id=$_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        //2.Check wheather the user with current ID nad Current password wxists or not
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password= '$current_password'";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            //Check wheather data is available or not
            $count=mysqli_num_rows($res);

            if($count==1)
            {
                //user exists and password can be changed
               // echo "user found";
               //check wheather the new password and confirm match or not
               if($new_password==$confirm_password){
                //update the passwrod
                $sql2 = "UPDATE tbl_admin SET 
                password='$new_password'
                WHERE id=$id
                ";
                //  Execute the query
                $res2 = mysqli_query($conn, $sql2);

                //check wheather the query is executed or not
                if($res2==true)
                {
                    //Display success message
                     //redirrect into manage admin with success message
                $_SESSION['change-pwd'] = "<div class='success'>password changed successfully. </div>";
                //redirect the user
                header('location:'.SITEURL.'admin/manage-admin.php');
                }
                else{
                    //Display error message
                      //redirrect into manage admin with error message
                $_SESSION['change-pwd'] = "<div class='error'>failed to change password. </div>";
                //redirect the user
                header('location:'.SITEURL.'admin/manage-admin.php');

                }
               }
               else{
                //redirrect into manage admin with failed message
                $_SESSION['pwd-not-match'] = "<div class='error'>password did not match. </div>";
                //redirect the user
                header('location:'.SITEURL.'admin/manage-admin.php');
               }


            }
            else {
                //user does not exist set message and redirect
                $_SESSION['user-not-found'] = "<div class='error'>User not found. </div>";
                //redirect the user
                header('location:'.SITEURL.'admin/manage-admin.php');
            }

        }

        //3.Check wheather the new password and confirn password match or not

        //4Change password if all above is true
       }
?>


<?php include('partials/footer.php');?>