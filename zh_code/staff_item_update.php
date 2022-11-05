<?php session_start(); ?>



<form action="" method="POST">
    <div class="profile">
        <span class="options">
			<br><br><br>
            

            <!-- <label for="profile_name">User Profile:</label>
            <input type = "text" id='profile_name'name= "profile_name" placeholder = "Enter desired name" > -->


            <label for="category">Category:</label>
            <input type="text"  name="category" >
            <br><br>

            <label for="name">Name:</label>
            <input type="text" " name="name" >
            <br><br>

            <label for="describe">Description:</label>
            <input type="text"   name="describe" >
            <!-- <span id="passwordError"></span> -->
            <br><br>

            <label for="picture">Picture's location:</label>
            <input type="text"   name="picture_location" >
            <!-- <span id="passwordError"></span> -->
            <br><br>
      

            <label for="price">Price:</label>
            <input type="text"  name="price" >
            <!-- <span id="passwordError"></span> -->
            <br><br>

         

            <label for="stock123" id="stock12345">Stock:</label>
            <select name="stock" id="stock123">
              <option value="Available">Available</option>
              <option value="Unavailable">Unavailable</option>

            </select>
            <br><br><br>

            
			
            <input type="submit" name="update" value="Update">
			      <br><br>

            
            
            <input type = "submit" name= "back" value="Back" >
            <br><br>
            <?php
            if(isset($_POST['back'])){
            //header('location:'.SITEURL.'mainadmin.php');
            header('Location:staff_item.php');
            //header('localhost:7882/mainadmin.php');
            }
            ?>
            <br><br>

            
            
			<!-- Already have account? <a href='LoginB.php'>Login </a> -->
        </span>
        <br>
    </div>
</form>



<?php
    include('constants.php');

    pre_r($_POST);

    if(isset($_POST['update']))
    {
      echo "Button clicked";
     
      echo $_POST['category'];
      echo $_POST['name'];
      echo $_POST['describe'];
      echo $_POST['picture_location'];
      echo $_POST['price'];
      echo $_POST['stock'];
    
      
      
      //get data from the form (variables)
      $staff_item_create_category =$_POST['category'];
      $staff_item_create_name =$_POST['name'];
      $staff_item_create_describe =$_POST['describe'];
      $staff_item_create_location =$_POST['picture_location'];
      $staff_item_create_price =$_POST['price'];
      $staff_item_create_stock =$_POST['stock'];


      $getName = $_POST['name']; //inputted account_name
      
      $sqlCommand1 = "SELECT * FROM menu_item WHERE item_name = '$getName'";

      $result1 = mysqli_query($conn, $sqlCommand1);

      if($result1 == true){
        $count = mysqli_num_rows($result1);

        if($count == 1)
        {
          echo " !AVAILABLE! ";
          $row=mysqli_fetch_assoc($result1);

        

        }
        else
        {
          header('Location:staff_item.php');
          //header('location:'.SITEURL.'mainadmin.php');
        }
      }
      
      
      //if the status is Active then continue, if not suspend will have a pop out notification!
      

      
        

      
       
    }
?>


<?php

    function pre_r($array){
      echo '<pre>';
      print_r($array);
      echo '</pre>';

    }

    
?>


    <?php

    if(isset($_POST['update'])){

      //if UPDATE button clicked DISPLAY ORIGINAL DATABASE CONTENTS before UPDATES

      // $table_id = $rows['menu_item_ID'];
      // $table_category =  $rows['item_category'];
      // $table_name =  $rows['item_name'];
      // $table_describe =  $rows['item_description'];
      // $table_picture =  $rows['item_picture'];
      // $table_price =  $rows['item_price'];
      // $table_stock =  $rows['item_stock'];
      

      
      // UPDATE menu_item SET item_category = 'nthing',
      //                                item_description = 'asd',
      //                                item_picture = '11',
      //                                item_price = '31',
      //                                item_stock = '123'
      //                                WHERE item_name = 'CHOC SWEET';                      


      $sql = "UPDATE menu_item SET item_category = '$staff_item_create_category',
                                     item_description = '$staff_item_create_describe',
                                     item_picture = '$staff_item_create_location',
                                     item_price = '$staff_item_create_price',
                                     item_stock = '$staff_item_create_stock'
                                     WHERE item_name = '$staff_item_create_name'
                                     ";

// $staff_item_create_category =$_POST['category'];
// $staff_item_create_name =$_POST['name'];
// $staff_item_create_describe =$_POST['describe'];
// $staff_item_create_location =$_POST['picture_location'];
// $staff_item_create_price =$_POST['price'];
// $staff_item_create_stock =$_POST['stock'];

      echo $sql;

      $res = mysqli_query($conn, $sql);

      if($res==true){
         $_SESSION['update'] = "Admin updated successfully";
         header('Location:staff_item.php');

      }
      else{
        $_SESSION['update'] = "Admin updated successfully";
      }

    }

    ?>