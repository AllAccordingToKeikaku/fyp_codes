
<!DOCTYPE html>


<body>


<!-- allow users to move around to different pages related to user profile -->
<!-- <div class="board">
    <span>User Profiles</span><br><br>
    <a href="createprofile.php" class="profile" id="add">
        Add Profile
    </a>
    <a href="viewprofile.php" class="profile">
        View Profile
    </a>
    <a href="suspendprofile.php" class="profile">
        Suspend Profile
    </a>
    <a href="updateprofile.php" class="profile">
        Update Profile
    </a>
    <br>
</div> -->
    
<!-- user will key in new profile's details into these inputs -->
<form action="createprofile.php" method="POST">
<table align='center'><tr><td>
    <div class="profile">
        <span class="options">
            <label for="input_name">Profile Name:</label>
            <input type="text" id="input_name" name="input_name" onsubmit="validateName()">
			<span id="pnameError"></span>
            <br><br>
        </span>

<!-- user will tick the functions the new profile will have access to -->
        <span class="options">
            <label for="functions">Functions:</label><br>

                <input type="checkbox" id="" name="input_checkbox[]" value="profile" checked="checked">
                <label for="profile">Profile</label><br>

                <input type="checkbox" id="account" name="input_checkbox[]" value="account">
                <label for="account">Account</label><br>
                
                <input type="checkbox" id="paper" name="input_checkbox[]" value="paper">
                <label for="paper">Papers</label><br>

                <input type="checkbox" id="bid" name="input_checkbox[]" value="bid">
                <label for="bid">Bid</label><br>

                <input type="checkbox" id="review" name="input_checkbox[]" value="review">
                <label for="review">Review</label><br>

                <input type="checkbox" id="comment" name="input_checkbox[]" value="comment">
                <label for="comment">Comment</label><br>

                <input type="checkbox" id="rating" name="input_checkbox[]" value="rating">
                <label for="rating">Rating</label><br>    
        </span><br><br>

<!-- for user enter some stuff about why they create etc -->
            <div id="describe">
                <label for="input_desciption">Description:</label>
                <input type="text" id="input_description" name="input_description">
                <br><br>
                <span>
                <input type="submit" name="create" value="Create Profile">
                    
                </span>
            </div>
        <br>
    </div>
</td></tr></table>
</form>
    <div>
        
    </div>

    
    <?php
        $servername="localhost";
        $username="root";
        $password="";
        $database_name="314project";
                 
        $conn=mysqli_connect($servername, $username, $password, $database_name);
                 
        if($conn)
        {
        print("Connection Established Successfully");
        }else
        {
        print("Connection Failed ");
        }
        
        
        $conn=mysqli_connect($servername, $username, $password);
        $db_select = mysqli_select_db($conn, $database_name) or die(mysqli_error());
       
       

    if(isset($_POST["create"]))
    {
     //get data from the form (variables)
     $profile_name =$_POST['input_name'];
     echo $profile_name;

    //  $profie_functions = $_POST['input_checkbox[]'];
    //  $profile_overall_functions = implode(',', $profile_overall_functions);
    //  echo $profile_overall_functions;


    }

    pre_r($_POST);


    /*
        if(isset($_POST["create"]))
        {
            $functionName = array("menu", "orders", "coupon", "profile", "user", "report", "transaction");

            $UPName = stripslashes($_POST["UPName"]);
            $description = $_POST["description"];
            $functions = array();

            foreach($functionName as $name)
            {
                if(isset($_POST[$name]))
                    array_push($functions, $name);
                else
                    array_push($functions, NULL);
            }

            $controller = new CreateProfileC();
            $result = $controller->validateDetails($UPName, $description, $functions);
        
            if($result["result"] == TRUE)
                echo "<script>displaySuccess();</script>";
            else {
				if($result["errorMsg"] == "Cannot update functions")
					echo "<script> alert('Cannot update functions'); </script>";
				else if($result["errorMsg"] == "Cannot create")
					echo "<script>displayFail();</script>";
				else if($result["errorMsg"] == "Profile exists")
					echo "<script> alert('Profile already exist'); </script>"; 
				else
					echo "<script>displayFail();</script>";
			}
        }
		 */   



	function displaySuccess() {
		alert("New profile has been successfully created");
	}

	function displayFail() {
		alert("Failed to create profile");
	}

    

    
    ?>

<?php

function pre_r($array){
  echo '<pre>';
  print_r($array);
  echo '</pre>';

}




?>



</body>
</html>