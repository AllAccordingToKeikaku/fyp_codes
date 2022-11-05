

<form action="" method="POST">
    <div class="profile">
        <span class="options">
			<br><br><br>
            

            <!-- <label for="profile_name">User Profile:</label>
            <input type = "text" id='profile_name'name= "profile_name" placeholder = "Enter desired name" > -->


            <label for="email">Email Address:</label>
            <input type="email" id="email" name="input_email" >
            <br><br>
      
      

            <label for="password">Password:</label>
            <input type="password" id="password" name="input_password" >
            <!-- <span id="passwordError"></span> -->
            <br><br>


        

            <label for="phonenumber">Phone number:</label>
            <input type="text" id="phonenumber" name="input_phonenumber"  >
            <br><br>

            <label for="account_name">Account Name:</label>
            <input type="text" id="account_name" name="input_account_name" >
            <br><br>

            <label for="profilename" id="profileimg">User Profile:</label>
            <select name="profile" id="profilename">
              <option value="User Admin">User Admin</option>
              <option value="Manager">Restaurant Manager</option>
              <option value="Staff">Restaurant Staff</option>
              <option value="Owner">Restaurant Owner</option>
            </select>
            <br><br><br>
			
            <input type="submit" name="create" value="Create Account">
			<br><br>

            
            
            <input type = "submit" name= "back" value="Back" >
            <br><br>

            <?php
            if(isset($_POST['back'])){
            //header('location:'.SITEURL.'mainadmin.php');
            header('Location:mainadmin.php');
            //header('localhost:7882/mainadmin.php');
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

    if(isset($_POST['back'])){
      //header('location:'.SITEURL.'mainadmin.php');
      header('Location:mainadmin.php');

    }

   

    if(isset($_POST['create']))
    {
      echo "Button clicked";

      
      //get data from the form (variables)
      $profile_email =$_POST['input_email'];
      $profile_pass =$_POST['input_password'];
      $profile_phone =$_POST['input_phonenumber'];
      $profile_accname =$_POST['input_account_name'];
      $profile_profile =$_POST['profile'];



        // $result = mysqli_query($conn, $sqlCreateTable);

        //left side is from database, right side is $ from this php file form 
        // $sqlCommand1 = "INSERT INTO useraccount SET 
        // account_email = '$profile_email',
        // account_password = '$profile_pass',
        // account_rpassword = '$profile_rpass',
        // account_pnumber = '$profile_phone',
        // account_name  = '$profile_accname',
        // account_profile  = '$profile_profile'
        // ";

        $sqlCommand1 = "INSERT INTO account (email, accountPassword, phoneNumber, fullName, profileID) VALUES (?, ?, ?, ?, ?)";

        $stmt= $conn->prepare($sqlCommand1);
        $stmt-> bind_param("sssss", $profile_email, $profile_pass, $profile_phone, $profile_accname, $profile_profile);

        $stmt->execute();


    }
?>



<?php

    function pre_r($array){
      echo '<pre>';
      print_r($array);
      echo '</pre>';

    }

   

    
?>