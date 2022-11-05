<html>
  <head>
    <title>Create PROFILE now </title>
  </head>

  <body>

  

<h1> create new admin account etc </h1>
<form action = "" method = "POST">
  <table>
    

    <label for="profile_name" id="profile_name">User Profile:</label>
            <select name="profile_name"" id="profile_name"">
              <option value="User Admin">User Admin</option>
              <option value="Manager">Restaurant Manager</option>
              <option value="Staff">Restaurant Staff</option>
              <option value="Owner">Restaurant Owner</option>
            </select>
            <br><br><br>
    


    <tr>
      <td> Functions </td>
      <td> <input type = "text" name= "profile_function"  placeholder = "Enter User" 
      </td>
    </tr>



    <tr>
      <td> Description </td>
      <td> <input type = "text" name= "profile_description" placeholder = "Enter description" >
      </td>
    </tr>

    <!-- I use this to preset msg for empty fields, jus leave this as it is  -->
    <tr>
      <td> <input type = "hidden" value= "true"name= "submitted" >
      </td>
    </tr>


    <tr>
      <td colspan="2"> 
       <input type = "submit" name= "submit" value="Add admin" >
      </td>
    </tr>

    
    <!-- Back button -->
    <tr>
      <td colspan="2"> 
       <input type = "submit" name= "back" value="Back" >
       
    <!-- This is for the 'Back' button which direct to main admin page -->
    <?php if(isset($_POST['back']))
    {
      //header('location:'.SITEURL.'mainadmin.php');
      header('Location:mainadmin.php');
    }
    ?>
    
      </td>
    </tr>


    <?php
    include('constants.php');
    // pre_r($_POST);

    if(!empty($_POST['submitted']) && $_POST['submitted']=="true"){
      
      if(empty($_POST['profile_function'])){
       echo'<script>alert("Please go back and fill the functions!")</script>';
      } else {
        $profile_function = $_POST['profile_function'];
      }

      if(empty($_POST['profile_description'])){
        echo'<script>alert("Please go back and fill the descriptions!")</script>';
      } else {
        $profile_description = $_POST['profile_description'];
      }

    }

    if(isset($_POST['submit']))
    {
      // echo "Button clicked";
      // echo "profile name is ".$_POST['profile_name'];
      // echo "function name is ".$_POST['profile_function'];
      // echo "describ name is ".$_POST['profile_description'];
      
      //get INPUT data from the form 
      $profile_name = $_POST['profile_name'];
      $profile_function = $_POST['profile_function'];
      $profile_description = $_POST['profile_description'];

      
        //left side is from database, right side is $ from this php file form 
        // $sqlCommand1 = "INSERT INTO userprofile SET 
        // user_name = '$profile_name'
        // user_function = '$profile_function'
        // user_describe = '$profile_description'
        // ";
  
    
        //  echo $sqlCommand1;


        //-----------------------------------------------------

        //mysql_connect(host name ,username,password); and mysqli_connect(host name ,username,password,db) is that the mysql take 3 parameter and mysqli take 4 parameter to connect the database server .

        // $sqlCommand2 = "INSERT INTO 'userprofile' ('user_name', 'user_function', 'user_describe') VALUES ('$profile_name', '$profile_function', '$profile_description')";

        

       
        //-----------------------------------------------------
        //contents of constants.php is here!!!!!!!

        //  $servername="localhost";
        //  $username="root";
        //  $password="";
        //  $database_name="createuserprofile";
        // $conn=mysqli_connect($servername, $username, $password, $database_name);
        //-----------------------------------------------------

        if($conn)
        {
        // print("Connection Established Successfully");

        // $sqlCommandUnique = ALTER table userprofile add CONSTRAINT UC_name UNIQUE (user_name);

        // $resultUnique = mysqli_query($conn, $sqlCommandUnique);

        // drop index UC_name on userprofile;
        $sqlCommand2 = "INSERT INTO profile (profile_name, profile_function, profile_describe) VALUES (?, ?, ?)";

        // echo $sqlCommand2;
        
        $stmt= $conn->prepare($sqlCommand2);
        $stmt-> bind_param("sss", $profile_name, $profile_function, $profile_description);

        $stmt->execute();

        // if($stmt){
        //   echo "done";
        // }
        // else
        // {
        //   echo "not good";
        // }
        // }else
        // {
        // print("Connection Failed ");
        }

       
    }


?>
    

  </table>

  </form>
  </body>
</html>













<?php

$sqlCommand3 = "SELECT * FROM userprofile";

$res3 = mysqli_query($conn, $sqlCommand3);
if($res3==TRUE)
{
  $count = mysqli_num_rows($res3); //get all rows

  $sn=1;

  if($count>0)
  {
    while($rows= mysqli_fetch_assoc($res3))
    {
      $table_id = $rows['id'];
      $table_name = $rows['user_name'];
      $table_function = $rows['user_function'];
      $table_describe = $rows['user_describe'];

      ?>
      <html>
      <tr>
          <td> <?php echo $sn++; ?> </td>
          <td> <?php echo $table_name; ?> </td>
          <td> <?php echo $table_function; ?> </td>
          <td> <?php echo $table_describe; ?> </td>
      </tr>
      </html>

      <?php

    }
  }
} else
{
  //do not have anything in database
}

?>


<?php

    function pre_r($array){
      echo '<pre>';
      print_r($array);
      echo '</pre>';
    }
 
?>


