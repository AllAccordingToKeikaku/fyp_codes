<?php session_start(); ?>


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

            <td> Status </td>
            <td> Active<input type = "radio" value= "Active" name= "active" 
            <td> Suspend<input type = "radio" value= "Suspend" name= "active" 
            </td>
            <br><br>
			
            <input type="submit" name="updateaccount" value="Update Account">
			    
            <input type = "submit" name= "back" value="Back" >
            <?php
            if(isset($_POST['back'])){
            //header('location:'.SITEURL.'mainadmin.php');
            header('Location:mainadmin.php');
            //header('localhost:7882/mainadmin.php');
            }
            ?>
            <br><br>

            
            
			<!-- Already have account? <a href='LoginB.php'>Login </a> -->
        </span>
        <br>
    </div>
</form>



<?php
    include('constants.php');

    pre_r($_POST);

    if(isset($_POST['updateaccount']))
    {
      echo "Button clicked";

      
      
      //get data from the form (variables)
      $account_email =$_POST['input_email'];
      $account_pass =$_POST['input_password'];
      $account_phone =$_POST['input_phonenumber'];
      $account_accname =$_POST['input_account_name'];
      $account_profile =$_POST['profile'];



      $getName = $_POST['input_account_name']; //inputted account_name
      
      $sqlCommand1 = "SELECT * FROM account WHERE fullName= '$getName'";

      $result1 = mysqli_query($conn, $sqlCommand1);

      if($result1 == true){
        $count = mysqli_num_rows($result1);

        if($count == 1)
        {
          echo " !AVAILABLE! ";
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

    <?php

    if(isset($_POST['updateaccount'])){

      //if UPDATE button clicked DISPLAY ORIGINAL DATABASE CONTENTS before UPDATES


            //get data from the form (variables)
            $account_email =$_POST['input_email'];
            $account_pass =$_POST['input_password'];
            $account_phone =$_POST['input_phonenumber'];
            $account_accname =$_POST['input_account_name'];
            $account_profile =$_POST['profile'];
      
      



      $sql = "UPDATE account SET email = '$account_email',
                                     accountPassword = '$$account_pass',
                                     phoneNumber = '$account_phone',
                                     profileID = '$account_profile'
                                     WHERE fullName = '$account_accname'
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


    

