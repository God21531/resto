<?php 

//Include Constants pgae
include('../config/constants.php');
        //echo "Delete Food Page";

        if(isset($_GET['id']) && isset($_GET['image_name'])) // Wither use '&&' or 'AND'
        {
            //Process to delete
            echo "Process to Delete";

            //1. Get ID and Image name
            $id = $_GET['id'];
            $image_name = $_GET['image_name'];

            //2. Remove the image if available
            // Check wheather the image is available or not and delete only if avaiable
            if($image_name != "")
            {
                // It has image and need to remove from folder
                // Get thr image path
                $path = "../images/food/".$image_name;

                // Remove image file from folder
                $remove = unlink($path);

                //Check wheather the image is romoved or  not
                if($remove==false)
                {
                    //Failed to remove image
                    $_SESSION['upload'] = "<div class='error'>Failed to remove Image file.</div>";
                    ///Redirect to manage food
                    header('location'.SITEURL.'admin/manage-food.php');
                    //Stop the process
                    die();
                
                }

            }

            //3. delete food from database
            $sql = "DELETE FROM tbl_food WHERE id=$id";
            //Execute the query
            $res = mysqli_query($conn, $sql);

            //Check wheather the query is executed or not and set the session message respectively
             //4. Redirect to manage food e=with session message
            if($res==true)
            {
                //Food Deleted
                $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully. </div>";
                header('location:'.SITEURL.'admin/manage-food.php');
            }
            else{
                //Failed to delete food
                $_SESSION['delete'] = "<div class='error'>Failed to delete food. </div>";
                header('location:'.SITEURL.'admin/manage-food.php');
            }

            }
        else{
            //Redirect to manage food page
            //echo "Redirect";
            $_SESSION['unauthorize'] = "<div class='error'>Unautjorixed Access.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');

        }

?>