<html>
  <head>
    <title>Create user now </title>
  </head>

  <body>

  

<h1> create new admin account etc </h1>

<form action="" method="POST">
    <div class="profile">
        <span class="options">
			<br><br><br>
            
            

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

            
			
            <input type="submit" name="confirm" value="Confirm">
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
            
			<!-- Already have account? <a href='LoginB.php'>Login </a> -->
        </span>
        <br>
    </div>
</form>


<?php
    include('constants.php');
    pre_r($_POST);

    if(isset($_POST['back'])){
      //header('location:'.SITEURL.'mainadmin.php');
      header('Location:staff_item.php');

    }

   

    if(isset($_POST['confirm']))
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
      
       

        // $sqlCommand1 = "INSERT INTO accountprofile (account_email, account_password , account_rpassword, account_pnumber, account_name, account_profile) VALUES (?, ?, ?, ?, ?, ?)";

        

        $sqlCommand1 = "INSERT INTO menu_item (item_category, item_name, item_description, item_picture, item_price, item_stock) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt= $conn->prepare($sqlCommand1);

        $stmt-> bind_param("ssssss", $staff_item_create_category, $staff_item_create_name, $staff_item_create_describe, $staff_item_create_location, $staff_item_create_price, $staff_item_create_stock);

        $stmt->execute();

        //$result1 = mysqli_query($conn, $sqlCommand2); //conn to db to INSERT etc etc

        // if($result1 == true){
        // $count = mysqli_num_rows($result1);

         if($stmt){
           echo "done";
         }
         else
         {
           echo "not good";
         }
       


    }
?>



<?php

    function pre_r($array){
      echo '<pre>';
      print_r($array);
      echo '</pre>';

    }

   

    
?>

