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
            <input type="text" name="input_from" id='dateFrom' >
            <br><br> 


            <label for="input_valid">Valid TO (yyyy-dd--mm):</label>
            <input type="text" name="input_to" id='dateTo' >
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
      
			
            <input type="submit" name="create" value="Create">
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

 

   

    if(isset($_POST['create']))
    {
      // echo "Button clicked";
     
      // echo $_POST['input_name'];
      // echo $_POST['input_from'];
      // echo $_POST['input_to'];
      // echo $_POST['input_tc'];
      // echo $_POST['input_percentage'];
     
      
      //get data from the form (variables)
      $staff_coupon_create_name =$_POST['input_name'];
      $staff_coupon_create_from =$_POST['input_from'];
      $staff_coupon_create_to =$_POST['input_to'];
      $staff_coupon_create_tc =$_POST['input_tc'];
      $staff_coupon_create_percentage =$_POST['input_percentage'];
 

  

        
        $sqlCommand1 = "INSERT INTO staffcoupon (staffcoupon_name, staffcoupon_fromDate, staffcoupon_toDate, staffcoupon_tc, staffcoupon_percentage) VALUES (?, ?, ?, ?, ?)";

        

        $stmt= $conn->prepare($sqlCommand1);

        $stmt-> bind_param("sssss", $staff_coupon_create_name, $staff_coupon_create_from,  $staff_coupon_create_to, $staff_coupon_create_tc, $staff_coupon_create_percentage);

        $stmt->execute();


         if($stmt){
           echo "done";
         }
         else
         {
           echo "not good";
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

