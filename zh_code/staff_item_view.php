<html>
  <head>
    <title>View user now </title>
  </head>

  <body>

  

<h1> view  </h1>
<form action = "" method = "POST">
  <table>
    <tr>
      <td>  Item Name: </td>
      <td> <input type = "text" name= "input_item_name" placeholder = "Enter Item's Name" >
      </td>
    </tr>


    

    <tr>
      <td colspan="2"> 
       <input type = "submit" name= "back" value="Back" >
      </td>
    </tr>

    <tr>
      <td colspan="2"> 
       <input type = "submit" name= "search" value="Search" >
      </td>
    </tr>

    <?php
    if(isset($_POST['back'])){
      header('Location:staff_item.php');
    }
    ?>



<?php
 include('constants.php');

 if(isset($_POST['search'])){

$getName = $_POST['input_item_name']; //inputted account_name
      
$sqlCommand1 = "SELECT * FROM menu_item WHERE item_name = '$getName'";



$res = mysqli_query($conn, $sqlCommand1);
if($res==TRUE)
{
  $count = mysqli_num_rows($res); //get all rows

  $sn=1;

  if($count>0)
  {
    while($rows= mysqli_fetch_assoc($res))
    {
      

      //account_xxx etc is from TABLE accountprofile
      $table_id = $rows['menu_item_ID'];
      $table_category =  $rows['item_category'];
      $table_name =  $rows['item_name'];
      $table_describe =  $rows['item_description'];
      $table_picture =  $rows['item_picture'];
      $table_price =  $rows['item_price'];
      $table_stock =  $rows['item_stock'];


      ?>
      <html>
      <tr>
          
          <td> <?php echo $table_id; ?> </td>
          <td> <?php echo $table_category; ?> </td>
          <td> <?php echo $table_name; ?> </td>
          <td> <?php echo $table_describe; ?> </td>
          <td> <?php echo $table_picture; ?> </td>
          <td> <?php echo $table_price; ?> </td>
          <td> <?php echo $table_stock; ?> </td>
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





  