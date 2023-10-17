<?php include('partials/menu.php');
ob_start();

?>

<div class="main-content">
        <div class="wrapper">
            <h1>Add Food</h1>

            <br><br>

            <?php 
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">
                    <table class="tbl-30">
                        <tr>

                        <td>Title: </td>
                        <td> 
                            <input type="text" name="title" placeholder="Title of the food">

                        </td>
                        </tr>

                        <tr>
                            <td>Description: </td>
                            <td>
                                <textarea name="description" id="" cols="30" rows="5" placeholder="description of the food."></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>Price: </td>
                            <td>
                                <input type="number" name="price">
                            </td>
                        </tr>

                        <tr>
                            <td>Select Image:</td>
                            <td>
                                <input type="file" name="image">
                            </td>
                        </tr>

                        <tr>
                            <td>Category: </td>
                            <td>
                                <select name="category" id="">

                                    <?php 
                                      //Create PHP code to display categoriies from database
                                      //1. Create sql to get all the active categories from database
                                      $sql = "SELECT * FROM tbl_category WHERE active='Yes' ";

                                      //Executing the query 
                                      $res = mysqli_query($conn, $sql);

                                      //Count the rows to check wheather we have categories or not
                                      $count = mysqli_num_rows($res);

                                      //IF count is greather then zero, we have categories else we do not have categorues
                                      if($count>0)
                                      {
                                        // We have categories
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            //Get the details of cattegory
                                            $id = $row['id'];
                                            $title = $row['title'];
                                            ?>

                                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                            <?php
                                        }
                                      }
                                      else{
                                        // We do not have categories
                                        ?>
                                         <option value="0">No Category Found</option>
                                        <?php
                                      }

                                      //2. Display  on Dropdown
                                    ?>
                                   

                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Featured: </td>
                            <td>
                                <input type="radio" name="featured" value="Yes"> Yes
                                <input type="radio" name="featured" value="No"> No 
                            </td>
                            
                        </tr>

                        <tr>
                            <td>Active: </td>
                            <td>
                            <input type="radio" name="active" value="Yes"> Yes
                                <input type="radio" name="active" value="No"> No
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Add Food" class="btn-secondary" >
                            </td>
                        </tr>



                    </table>

            </form>
                
            <?php 

            //Check wheather the button is clicked or not
            if(isset($_POST['submit']))
            {
                //Add the Food in Database
                //echo "Clicked";

                //1. Get the data from form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                //check wheather radio button for featured and active are checked or not
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else{
                    $featured = "No"; //Setting the default value
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else{
                    $active = "No"; //Setting Default Value
                }

                //2. upload the image if selected
                //Check wheather the select image is clicked or not and upload the image only if the image is selected
                if(isset($_FILES['image']['name']))
                {
                    //Get the details of the selected image
                    $image_name = $_FILES['image']['name'];

                    //Check wheather the image is selected or not and upload image onlly if selected
                    if($image_name != "")
                    {
                        //Image is selected
                        // A.Rename the image
                        //Get the extension of selected image (jpg, png, gif, etc) "JOSH-thapa.jpg"  :- vijay-thapa jpg
                        $tmp=explode('.', $image_name);
                        $ext = end($tmp); 

                        //Create New Name for image
                        $image_name = "Food-Name-".rand(0000,9999).".".$ext; //New Image name may be "Food-Name-657.jpg"

                        //b. Upload the image
                        //  Get the src path and destination path

                        // Source path is the current locatin of the image
                        $src=$_FILES['image']['tmp_name'];
                        
                        //Destination path for the image to be uploaded
                        $dst = "../images/food/".$image_name;

                        //Finally upload the food image
                        $upload = move_uploaded_file($src, $dst);

                        //Check wheather the image uploaded or not
                        if($upload==false)
                        {
                            //Failed to upload the image
                            //Redirect to add food page with error message
                            $_SESSION['upload'] = "<div class='error'>Failed to upload image. </div>";
                            header('location:'.SITEURL.'admin/add-food.php');
                           //Stop the process
                           die(); 
                        }
                    }

                }
                else{
                    $image_name = ""; // Setting default value as blank
                }

                //3. Insert into database

                //Create a sql Query to save or add food
                //For numerical we do not need to pass value inside quotes '' But foe string value it is compulsory to add quote''
                $sql2="INSERT INTO tbl_food SET 
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = $category,
                featured = '$featured',
                active = '$active'
                ";

                //Execute the query
                $res2 = mysqli_query($conn, $sql2);
                //Check wheather data inserted or not
                //4. Redirect the message to manage food page

                if($res2 == true){
                    //Data inserted successfully
                    $_SESSION['add'] = "<div class='success'>Food Added Successfullly. </div>";

                    header('location:'.SITEURL.'admin/manage-food.php');
                    ob_end_flush();
                }
                else{
                    //Failed to insert data
                    $_SESSION['add'] = "<div class='error'>Failed to add food </div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }

                


            }
            
            ?>
        </div>

</div>

<?php include('partials/footer.php');?>

