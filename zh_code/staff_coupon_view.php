<html>
  <head>
    <title>View coupon </title>
  </head>

  <body>

  

<h1> view  </h1>
<form action = "" method = "POST">
  <table>
    <tr>
      <td>  Coupon Name: </td>
      <td> <input type = "text" name= "input_coupon_name" placeholder = "Enter Coupon's Name" >
      </td>
    </tr>


    <tr>
      <td colspan="2"> 
       <input type = "submit" name= "back" value="Back" >
      </td>
    </tr>

    <?php
    if(isset($_POST['back'])){
      header('Location:staff_coupon.php');
    }
    ?>

    <tr>
      <td colspan="2"> 
       <input type = "submit" name= "search" value="Search" >
      </td>
    </tr>





<?php
 include('constants.php');


      
 $sqlCommandMain = "SELECT * FROM staffcoupon";

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
      $table_name = $rows['staffcoupon_name'];
      $table_from =  $rows['staffcoupon_fromDate'];
      $table_to =  $rows['staffcoupon_toDate'];
      $table_tc =  $rows['staffcoupon_tc'];
      $table_percentage =  $rows['staffcoupon_percentage'];


      ?>
      <html>
      <tr>
          
          <td> <?php echo $table_name; ?> </td>
          <td> <?php echo $table_from; ?> </td>
          <td> <?php echo $table_to; ?> </td>
          <td> <?php echo $table_tc; ?> </td>
          <td> <?php echo $table_percentage; ?> </td>
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

$getName = $_POST['input_coupon_name']; //inputted account_name
      
$sqlCommand1 = "SELECT * FROM staffcoupon WHERE staffcoupon_name = '$getName'";



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
      $table_name = $rows['staffcoupon_name'];
      $table_from =  $rows['staffcoupon_fromDate'];
      $table_to =  $rows['staffcoupon_fromDate'];
      $table_tc =  $rows['staffcoupon_tc'];
      $table_percentage =  $rows['staffcoupon_percentage'];


      ?>
      <html>
      <tr>
          
          <td> <?php echo $table_name; ?> </td>
          <td> <?php echo $table_from; ?> </td>
          <td> <?php echo $table_to; ?> </td>
          <td> <?php echo $table_tc; ?> </td>
          <td> <?php echo $table_percentage; ?> </td>
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





  