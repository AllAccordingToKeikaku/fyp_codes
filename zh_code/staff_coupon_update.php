

<html>
  <head>
    <title>Create Coupon </title>
  </head>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">

<script>
  $(document).ready(function(){
    $("#dateFrom").datepicker({dateFormat: 'yy-dd-mm'});
    $("#dateFrom").datepicker('show');
  });

  $(document).ready(function(){
    $("#dateTo").datepicker({dateFormat: 'yy-dd-mm'});
    $("#dateTo").datepicker('show');
  });



</script>

  <body>

<h1> create new Coupon etc </h1>

<form action="" method="POST">
    <div class="profile">
        <span class="options">
			<br><br><br>
            


            <label for="input_valid">Valid FROM (yyyy-dd--mm):</label>
            <input type="text" " name="input_from" id='dateFrom' >
            <br><br> 


            <label for="input_valid">Valid TO (yyyy-dd--mm):</label>
            <input type="text" " name="input_to" id='dateTo' >
            <br><br>  

            <label for="input_name">Coupon Name:</label>
            <input type="text"  name="input_name" >
            <br><br>



          

            <label for="input_tc">T&C:</label>
            <input type="text"   name="input_tc" >
            <!-- <span id="passwordError"></span> -->
            <br><br>

            <label for="input_percentage">Percentage:</label>
            <input type="text"   name="input_percentage" >
            <!-- <span id="passwordError"></span> -->
            <br><br>
      
			
            <input type="submit" name="update" value="Update">
			      <br><br>

            
            
            <input type = "submit" name= "back" value="Back" >
            <br><br>

            <?php
            if(isset($_POST['back'])){
            header('Location:staff_coupon.php');
            }
            ?>
            
			
        </span>
        <br>
    </div>
</form>



<?php
    include('constants.php');

    pre_r($_POST);

    if(isset($_POST['update']))
    {
      echo "Button clicked";
     
    
      //get data from the form (variables)
      $staff_coupon_create_name =$_POST['input_name'];
      $staff_coupon_create_from =$_POST['input_from'];
      $staff_coupon_create_to =$_POST['input_to'];
      $staff_coupon_create_tc =$_POST['input_tc'];
      $staff_coupon_create_percentage =$_POST['input_percentage'];



      $getName = $_POST['input_name']; //inputted coupon_name
      
      $sqlCommand1 = "SELECT * FROM staffcoupon WHERE staffcoupon_name = '$getName'";

      $result1 = mysqli_query($conn, $sqlCommand1);

      if($result1 == true){
        $count = mysqli_num_rows($result1);

        if($count == 1)
        {
          echo " !AVAILABLE! ";
          $row=mysqli_fetch_assoc($result1);

        

        }
        else
        {
          header('Location:staff_coupon.php');
          //header('location:'.SITEURL.'mainadmin.php');
        }
      }
      
      
      //if the status is Active then continue, if not suspend will have a pop out notification!
      

      
        

      
       
    }
?>


<?php

    function pre_r($array){
      echo '<pre>';
      print_r($array);
      echo '</pre>';

    }

    
?>


    <?php

    if(isset($_POST['update'])){
               


      $sql = "UPDATE staffcoupon SET staffcoupon_fromDate = '$staff_coupon_create_from',
                                     staffcoupon_toDate = '$staff_coupon_create_to',
                                     staffcoupon_tc = '$staff_coupon_create_tc',
                                     staffcoupon_percentage = '$staff_coupon_create_percentage'
                                     WHERE staffcoupon_name = '$staff_coupon_create_name'
                                     ";



      echo $sql;

      $res = mysqli_query($conn, $sql);

      if($res==true){
         $_SESSION['update'] = "Admin updated successfully";
         header('Location:staff_coupon.php');

      }
      else{
        $_SESSION['update'] = "Admin updated successfully";
      }

    }

    ?>