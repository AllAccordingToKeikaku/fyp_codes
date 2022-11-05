<html>
  <head>
    <title>View coupon </title>
  </head>

  <body>

  

  <form action="" method="POST">
    <div class="profile">
        <span class="options">
			<br><br><br>
            

            <label for="input_food">Food Name:</label>
            <input type="text"   name="input_food" >
            <!-- <span id="passwordError"></span> -->
            <br><br>

			
            <input type="submit" name="search" value="Search">
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


      
 $sqlCommandMain = "SELECT * FROM stafforder";

 $resMain = mysqli_query($conn, $sqlCommandMain);

 if($resMain==TRUE)
{
  $count = mysqli_num_rows($resMain); //get all rows

  $sn=1;

  if($count>0)
  {
    while($rows= mysqli_fetch_assoc($resMain))
    {
      

      //account_xxx etc is from TABLE staffcoupon
      $table_id = $rows['id'];
      $table_staffname = $rows['stafforder_staffname'];
      $table_food =  $rows['stafforder_food'];
      $table_quantity =  $rows['stafforder_quantity'];



      ?>
      <html>
      <tr>
          <td> <?php echo $table_id; ?> </td>          
          <td> Name: <?php echo $table_staffname; ?> </td>
          <td> Food: <?php echo $table_food; ?> </td>
          <td> Qty: <?php echo $table_quantity; ?> </td>
          <br>

      </tr>
      </html>

      <?php

    }
  }
} 
else
{
  //do not have anything in database
}

 


if(isset($_POST['search'])){

$getName = $_POST['input_food']; //inputted account_name
      
$sqlCommand1 = "SELECT * FROM stafforder WHERE stafforder_food = '$getName'";



$res = mysqli_query($conn, $sqlCommand1);
if($res==TRUE)
{
  $count = mysqli_num_rows($res); //get all rows

  $sn=1;

  if($count>0)
  {
    while($rows= mysqli_fetch_assoc($res))
    {
      

      //account_xxx etc is from TABLE staffcoupon
      $table_id = $rows['id'];
      $table_staffname = $rows['stafforder_staffname'];
      $table_food =  $rows['stafforder_food'];
      $table_quantity =  $rows['stafforder_quantity'];


      ?>
      <html>
      <tr>
          
          <td> <?php echo $table_id; ?> </td>          
          <td> Name: <?php echo $table_staffname; ?> </td>
          <td> Food: <?php echo $table_food; ?> </td>
          <td> Qty: <?php echo $table_quantity; ?> </td>
          <br>
      </tr>
      </html>

      <?php

    }
  }
} else
{
  //do not have anything in database
}

 }
?>





  