<?php session_start(); ?>




<form action="" method="POST">
    <div class="profile">
        <span class="options">
			<br><br><br>
            
            


            <label for="input_item">Food Name:</label>
            <input type="text"   name="input_food" >
            <!-- <span id="passwordError"></span> -->
            <br><br>

            <label for="input_quantity">Quantity:</label>
            <input type="text"   name="input_quantity" >
            <!-- <span id="passwordError"></span> -->
            <br><br>
      
			
            <input type="submit" name="update" value="Update">
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

    if(isset($_POST['update']))
    {
      echo "Button clicked";

      echo $_POST['input_food'];
      echo $_POST['input_quantity'];


      //get data from the form (variables)
      $staff_order_create_item =$_POST['input_food'];
      $staff_order_create_quantity =$_POST['input_quantity'];


      $getName = $_POST['input_food']; //inputted account_name
      
      $sqlCommand1 = "SELECT * FROM stafforder WHERE stafforder_food = '$getName'";

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
          header('Location:staff_order.php');

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


      //get data from the form (variables)
      $staff_order_create_item =$_POST['input_food'];
      $staff_order_create_quantity =$_POST['input_quantity'];




      $sql = "UPDATE stafforder SET  stafforder_quantity = '$staff_order_create_quantity'
                                     WHERE stafforder_food = '$staff_order_create_item'
                                     ";



      echo $sql;

      $res = mysqli_query($conn, $sql);

      if($res==true){
         $_SESSION['update'] = "Admin updated successfully";
         header('Location:staff_order.php');

      }
      else{
        $_SESSION['update'] = "Admin updated successfully";
      }

    }

    ?>