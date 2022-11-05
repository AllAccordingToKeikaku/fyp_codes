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
            
            



            <label for="input_name">Staff Name:</label>
            <input type="text" " name="input_staffname" >
            <br><br>

            <label for="input_item">Food Name:</label>
            <input type="text"   name="input_food" >
            <!-- <span id="passwordError"></span> -->
            <br><br>

            <label for="input_quantity">Quantity:</label>
            <input type="text"   name="input_quantity" >
            <!-- <span id="passwordError"></span> -->
            <br><br>
      


            
			
            <input type="submit" name="confirm" value="Confirm">
			      <br><br>

            
            
            <input type = "submit" name= "back" value="Back" >
            <br><br>

            <?php
            if(isset($_POST['back'])){
            header('Location:staff_order.php');
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


   

    if(isset($_POST['confirm']))
    {
      echo "Button clicked";
     
      echo $_POST['input_staffname'];
      echo $_POST['input_food'];
      echo $_POST['input_quantity'];

      
      //get data from the form (variables)
      $staff_order_create_name =$_POST['input_staffname'];
      $staff_order_create_item =$_POST['input_food'];
      $staff_order_create_quantity =$_POST['input_quantity'];
   
      
    

        $sqlCommand1 = "INSERT INTO stafforder (stafforder_staffname, stafforder_food, stafforder_quantity) VALUES (?, ?, ?)";

        $stmt= $conn->prepare($sqlCommand1);

        $stmt-> bind_param("sss", $staff_order_create_name, $staff_order_create_item, $staff_order_create_quantity);

        $stmt->execute();



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

