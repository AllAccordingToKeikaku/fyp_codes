<?php session_start(); ?>




<?php
    include('constants.php');

    // pre_r($_POST);

    if(isset($_POST['updateprofile']))
    {
      // echo "Button clicked";                                
      // echo "profile name is ".$_POST['profile_name'];
      // echo "describ name is ".$_POST['profile_description'];
      // echo "status is ".$_POST['active'];
      // echo "function name is ".$_POST['profile_function'];
      
      
      //get INPUT data from the form 
      $profile_name = $_POST['profile_name'];
      $profile_description = $_POST['profile_description'];
      $status = $_POST['active'];
      $profile_function = $_POST['profile_function'];

      //Assume there is only 1 unique profile name (eg: 'sam')
      $getName = $_POST['profile_name'];
      
      $sqlCommand1 = "SELECT * FROM profile WHERE profile_name = '$getName'"; //___ = 'sam'

      $result1 = mysqli_query($conn, $sqlCommand1); //conn to db using ___ = 'sam'

      if($result1 == true){
        $count = mysqli_num_rows($result1);

        if($count == 1)
        {
          // echo " !AVAILABLE! ";
          $row=mysqli_fetch_assoc($result1);

          // $table_name = $row['user_name'];
          // echo " $table_name ";
          // $table_function = $row['user_function'];
          // echo " $table_function ";
          // $table_describe = $row['user_describe'];
          // echo " $table_describe ";

        }
        else
        {
          header("localhost:7882/mainadmin.php");
          //header('location:'.SITEURL.'mainadmin.php');
        }
      }
      
      
      //if the status is Active then continue, if not suspend will have a pop out notification!
      if(isset($_POST['active']))
      {
        $radioType = $_POST['active'];

        if($radioType=="Active"){
          echo "!!!active!!!";
          
          $_SESSION['status'] = "Active now"; //display message
          header("localhost:7882/mainadmin.php"); //redirect to mainadmin.php
        //header('location:'.SITEURL.'mainadmin.php');
          
          
        }
        else
        {
          echo "!!!suspend!!!";
          $_SESSION['status'] = "Suspended now, try again later"; //display message
          header("localhost:7882/mainadmin.php"); //redirect to mainadmin.php
        }
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


<form action = "" method = "POST">
  <table>
    <tr>
      <td> Profile Name </td>
      <td> <input type = "text" name= "profile_name" placeholder = "Enter desired name" 
      
      
      
      </td>
    </tr>

    <tr>
      <td> Description </td>
      <td> <input type = "text" name= "profile_description" placeholder = "Enter description" 
    
      </td>
    </tr>


    <tr>
      <td> Status </td>
      <td> Active<input type = "radio" value= "Active" name= "active" 
      <td> Suspend<input type = "radio" value= "Suspend" name= "active" 
      
      </td>
    </tr>


    <tr>
      <td> Functions </td>
      <td> <input type = "text" name= "profile_function"  placeholder = "Enter function" 
      
      
      </td>
    </tr>

    <tr>
    <td colspan="2"> 
       <input type = "submit" name= "updateprofile" value="Update Profile" >
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

    <?php

    if(isset($_POST['updateprofile'])){

      //if UPDATE button clicked
      $form_name = $row['user_name'];
      echo "--" ."$form_name ";
      $form_function = $row['user_function'];
      echo "--" ."$form_function ";
      $form_describe = $row['user_describe'];
      echo "--" ."$form_describe ";

      $sql = "UPDATE profile SET user_describe = '$profile_description',
                                     user_function = '$profile_function'
                                     WHERE user_name = '$form_name'
                                     ";

      echo $sql;

      $res = mysqli_query($conn, $sql);

      if($res==true){
         $_SESSION['update'] = "Admin updated successfully";
         header("localhost:7882/mainadmin.php"); //redirect to mainadmin.php
        //header('location:'.SITEURL.'mainadmin.php');

      }
      else{
        $_SESSION['update'] = "Admin updated successfully";
      }

    }

    ?>


    

