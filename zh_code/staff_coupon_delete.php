
<form action = "" method = "POST">
  
  <tr>
    <td> Profile Name </td>
    <td> <input type = "text" name= "input_name" placeholder = "Enter coupon name" 
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
    header('Location:staff_coupon.php');
  
  }
  ?>
</form>

<?php
include('constants.php');


if(isset($_POST['delete']))
  {
    echo "   Delete Button clicked!!! ";
    echo "Coupon name is ".$_POST['input_name'];

    $name = $_POST['input_name'];

    $sqlCommand = "DELETE FROM staffcoupon WHERE staffcoupon_name = '$name'";

    echo $sqlCommand;

  
    $result = mysqli_query($conn, $sqlCommand);

   if($result==true)
  {
    // $_SESSION['delete'] = "Account deleted successfully";
    header('Location:staff_coupon.php');
  }
  else 
  {
    echo "cannot delete";
  }


  }


?>