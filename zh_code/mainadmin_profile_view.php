<html>
  <head>
    <title>View user now </title>
  </head>

  <body>

  

  <h1> view admin account </h1>
  <form action = "" method = "POST">
  <table>
    <tr>
      <td> Profile Name </td>
      <td> <input type = "text" name= "profile_name" placeholder = "Enter desired name" 
      </td>
    </tr>


    
     <!-- Back button -->
    <tr>
      <td colspan="2"> 
       <input type = "submit" name= "back" value="Back" >
      </td>
    </tr>
    
    <!-- This is for the 'Back' button which direct to main admin page -->
    <?php
    if(isset($_POST['back']))
    {
      //header('location:'.SITEURL.'mainadmin.php');
      header('Location:mainadmin.php');
      //header('localhost:7882/mainadmin.php');
    
    }
    ?>

    <tr>
      <td colspan="2"> 
       <input type = "submit" name= "search" value="Search" >
      </td>
    </tr>


<?php
 include('constants.php');

 if(isset($_POST['search'])){

$getName = $_POST['profile_name']; //inputted account_name

$sqlCommand3 = "SELECT * FROM profile WHERE profile_name = '$getName'";

$res3 = mysqli_query($conn, $sqlCommand3);
if($res3==TRUE)
{
  $count = mysqli_num_rows($res3); //get all rows

  $sn=1;

    if($count>0)
    {
      while($rows= mysqli_fetch_assoc($res3))
      {
        $table_id = $rows['profile_id'];
        $table_name = $rows['profile_name'];
        $table_function = $rows['profile_function'];
        $table_describe = $rows['profile_describe'];

        ?>
        <html>
        <tr>
            <td> <?php echo $sn++; ?> </td>
            <td> <?php echo $table_name; ?> </td>
            <td> <?php echo $table_function; ?> </td>
            <td> <?php echo $table_describe; ?> </td>
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





  