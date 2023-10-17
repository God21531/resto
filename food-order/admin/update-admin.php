<?php 
include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php 
            //1. set the id of the selected admin
            $id=$_GET['id'];
            //2. create sql query to get the details
            $sql="SELECT * FROM tbl_admin WHERE id=$id";

            //3.execute the query
            $res=mysqli_query($conn, $sql);

            //check wheather the quer is executed or not
            if($res==true)
            {
                //check wheather the data is avaailabaleor not
                $count = mysqli_num_rows($res);
                //check wheather we have admin data or not
                if($count==1){
                    //Get the details
                    //echo "Admin available";
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else{
                    //Rediret to manae admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
            <tr>
                <td>Full Name: </td>
                <td>
                    <input type="text" name="full_name" value="<?php echo $full_name; ?>" >
</td>

<tr>
    <td>UserName: </td>
    <td>
        <input type="text" name="username" value="<?php echo $username; ?>">
</td>
</tr>
<tr>
    <td colspan="2">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
        
</td>
</tr>
</table>
</form>
</div>
</div>

<?php 
    //check wheathe the submit button is  clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button clicked";
        //get all the values from form to update
         $id = $_POST['id'];
         $full_name = $_POST['full_name'];
         $username = $_POST['username'];

         //create sql query to update admin
         $sql = "UPDATE tbl_admin SET
         full_name = '$full_name',
         username='$username'
         WHERE id = '$id'
         ";

         //Execute the query
         $res = mysqli_query($conn, $sql);

         //check whether the query is executed successfully or not
         if($res==true){
            //Query is executed and updated
            $_SESSION['update'] = "<div class='success'>admin updates successfully.</div>";
            //Redirect to manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
         }
         else{
            //Failed to update admin
            $_SESSION['update'] = "<div class='error'>Failed to update admin </div>";
            //Redirect to manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
         }
    }
?>

<?php include('partials/footer.php');?>