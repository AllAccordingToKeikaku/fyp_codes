<html>
  <head>
    <title>View user now </title>
  </head>

  <body>

  

<h1> view user account </h1>
<form action = "" method = "POST">
  <table>
    <tr>
      <td> Account Name </td>
      <td> <input type = "text" name= "profile_name" placeholder = "Enter desired name" 
      </td>
    </tr>


    

    <tr>
      <td colspan="2"> 
       <input type = "submit" name= "back" value="Back" >
      </td>
    </tr>

    <?php
    if(isset($_POST['back'])){
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
  
$sqlCommand3 = "SELECT * FROM accountprofile WHERE account_profile = '$getName'";
  

$res3 = mysqli_query($conn, $sqlCommand3);
if($res3==TRUE)
{
    $count = mysqli_num_rows($res3); //get all rows

    $sn=1;

    if($count>0)
    {
      while($rows= mysqli_fetch_assoc($res3))
      {
        

        //account_xxx etc is from TABLE accountprofile
        $table_email = $rows['account_email'];
        $table_password =  $rows['account_password'];
        $table_rpassword =  $rows['account_rpassword'];
        $table_pnumber =  $rows['account_pnumber'];
        $table_name =  $rows['account_name'];
        $table_profile =  $rows['account_profile'];


        ?>
        <html>
        <tr>
            
            <td> <?php echo $table_email; ?> </td>
            <td> <?php echo $table_password; ?> </td>
            <td> <?php echo $table_rpassword; ?> </td>
            <td> <?php echo $table_pnumber; ?> </td>
            <td> <?php echo $table_name; ?> </td>
            <td> <?php echo $table_profile; ?> </td>
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





  