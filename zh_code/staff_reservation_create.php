<html>
  <head>
    <title>Create user now </title>
  </head>

  <body>

  

<h1> create reservation etc </h1>

<form action="" method="POST">
    <div class="profile">
        <span class="options">
			<br><br><br>
            
            



            <label for="input_name">Name:</label>
            <input type="text" " name="input_name" >
            <br><br>

            <label for="input_pax">Pax:</label>
            <input type="text"   name="input_pax" >
            <br><br>

            <label for="input_time">Time Slot:</label>
            <select name="input_time" id="input_time">
              <option value="11:00">11:00</option>
              <option value="12:00">12:00</option>
              <option value="13:00">13:00</option>
              <option value="14:00">14:00</option>
              <option value="15:00">15:00</option>
              <option value="16:00">16:00</option>
              <option value="17:00">17:00</option>
              <option value="18:00">18:00</option>
              <option value="19:00">19:00</option>
              <option value="20:00">20:00</option>
            </select>
            <br><br>

            <label for="input_seat" id="input_seat">Seat:</label>
            <select name="input_seat" id="input_seat">
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
              <option value="F">F</option>
              <option value="G">G</option>
              <option value="H">H</option>
              <option value="I">I</option>
              <option value="J">J</option>
            </select>
            <br><br><br>
      


            
			
            <input type="submit" name="create" value="Create">
			      <br><br>

            
            
            <input type = "submit" name= "back" value="Back" >
            <br><br>

            <?php
            if(isset($_POST['back'])){
            header('Location:staff_reservation.php');
            }
            ?>
            
			<!-- Already have account? <a href='LoginB.php'>Login </a> -->
        </span>
        <br>
    </div>
</form>


<?php
    include('constants.php');
    pre_r($_POST);


   

    if(isset($_POST['create']))
    {
      echo "Button clicked";
     

    
      //get data from the form (variables)
      $staff_reservation_create_name =$_POST['input_name'];
      $staff_reservation_create_pax =$_POST['input_pax'];
      $staff_reservation_create_time =$_POST['input_time'];
      $staff_reservation_create_seat =$_POST['input_seat'];
   
      
    

        $sqlCommand1 = "INSERT INTO staffreservation (staffreservation_name, staffreservation_pax, staffreservation_time, staffreservation_seat) VALUES (?, ?, ?, ?)";

        $stmt= $conn->prepare($sqlCommand1);

        $stmt-> bind_param("ssss",  $staff_reservation_create_name, $staff_reservation_create_pax, $staff_reservation_create_time, $staff_reservation_create_seat);

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

