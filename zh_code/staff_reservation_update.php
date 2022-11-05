<?php session_start(); ?>




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
              <option value="10:00">10:00</option>
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

            <label for="input_seat" id="input_seat">User Profile:</label>
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
      


            
			
            <input type="submit" name="update" value="Update">
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

    if(isset($_POST['update']))
    {
      echo "Button clicked";



      //get data from the form (variables)
      $staff_reservation_create_name =$_POST['input_name'];
      $staff_reservation_create_pax =$_POST['input_pax'];
      $staff_reservation_create_time =$_POST['input_time'];
      $staff_reservation_create_seat =$_POST['input_seat'];


      $getName = $_POST['input_name']; //inputted account_name
      
      $sqlCommand1 = "SELECT * FROM staffreservation WHERE staffreservation_name = '$getName'";

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
          header('Location:staff_reservation.php');

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


      //get data from the form (variables)
      $staff_reservation_create_name =$_POST['input_name'];
      $staff_reservation_create_pax =$_POST['input_pax'];
      $staff_reservation_create_time =$_POST['input_time'];
      $staff_reservation_create_seat =$_POST['input_seat'];




      $sql = "UPDATE staffreservation SET  
                                     staffreservation_pax = '$staff_reservation_create_pax',
                                     staffreservation_time = '$staff_reservation_create_time',
                                     staffreservation_seat = '$staff_reservation_create_seat'
                                     WHERE staffreservation_name = '$staff_reservation_create_name'
                                     ";



      echo $sql;

      $res = mysqli_query($conn, $sql);

      if($res==true){
         $_SESSION['update'] = "Admin updated successfully";
         header('Location:staff_reservation.php');

      }
      else{
        $_SESSION['update'] = "Admin updated successfully";
      }

    }

    ?>