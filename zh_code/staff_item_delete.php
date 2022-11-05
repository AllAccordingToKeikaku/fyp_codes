

<form action = "" method = "POST">
  
  <tr>
    <td> Profile Name </td>
    <td> <input type = "text" name= "menu_name" placeholder = "Enter desired name" 
    </td>
  </tr>

  <tr>
    <td colspan="2"> 
     <input type = "submit" name= "delete" value="Delete" >
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
    header('Location:staff_item.php');
    //header('localhost:7882/mainadmin.php');
  
  }
  ?>
</form>

<?php
include('constants.php');


if(isset($_POST['delete']))
  {
    echo "   Delete Button clicked!!! ";
    echo "profile name is ".$_POST['menu_name'];

    $name = $_POST['menu_name'];

    $sqlCommand = "DELETE FROM menu_item WHERE item_name = '$name'";

    echo $sqlCommand;

  
    $result = mysqli_query($conn, $sqlCommand);

   if($result==true)
  {
    $_SESSION['delete'] = "Account deleted successfully";
    //header('location:'.SITEURL.'mainadmin.php');
    header('localhost:7882/mainadmin.php');
  }
  else 
  {
    echo "cannot delete";
  }


  }


?>