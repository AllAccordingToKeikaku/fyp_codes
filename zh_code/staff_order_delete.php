

<form action="" method="POST">
    <div class="profile">
        <span class="options">
			<br><br><br>


            <label for="input_item">Food Name:</label>
            <input type="text"   name="input_food" >
            <!-- <span id="passwordError"></span> -->
            <br><br>

      
			
            <input type="submit" name="delete" value="Delete">
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


if(isset($_POST['delete']))
  {
    echo "   Delete Button clicked!!! ";


    $name = $_POST['input_food'];

    $sqlCommand = "DELETE FROM stafforder WHERE stafforder_food = '$name'";

    echo $sqlCommand;

  
    $result = mysqli_query($conn, $sqlCommand);

   if($result==true)
  {
    $_SESSION['delete'] = "Account deleted successfully";
    header('Location:staff_order.php');
  }
  else 
  {
    echo "cannot delete";
  }


  }


?>