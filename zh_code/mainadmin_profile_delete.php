

<form action = "" method = "POST">
  
    <tr>
      <td> Profile Name </td>
      <td> <input type = "text" name= "profile_name" placeholder = "Enter desired name" 
      </td>
    </tr>

    <tr>
      <td colspan="2"> 
       <input type = "submit" name= "delete" value="Delete admin" >
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
    if(isset($_POST['back'])){
      //header('location:'.SITEURL.'mainadmin.php');
      header('Location:mainadmin.php');
      //header('localhost:7882/mainadmin.php');
    
    }
    ?>
</form>

<?php
 include('constants.php');


if(isset($_POST['delete']))
    {
      echo "   Delete Button clicked!!! ";
      echo "profile name is ".$_POST['profile_name'];

      $name = $_POST['profile_name'];

      $sqlCommand = "DELETE FROM profile WHERE profile_name = '$name'";

      echo $sqlCommand;

    
      $result = mysqli_query($conn, $sqlCommand);

     if($result==true)
    {
      $_SESSION['delete'] = "Admin deleted successfully";
      //header('location:'.SITEURL.'mainadmin.php');
      header('localhost:7882/mainadmin.php');
    }
    else 
    {
      echo "cannot delete";
    }
 

    // $stmt= $conn->prepare($sqlCommand);
    // $stmt-> bind_param("sss", $profile_name, $profile_function, $profile_description);

    // $stmt->execute();

    // if($result==true)
    // {

    // }
    // else 
    // {
    //   echo "cannot delete";
    // }





    }


 ?>