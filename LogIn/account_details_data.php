<?php
require_once("../dbConnection.php");
?>

<?php
if(isset($_POST['profileID'])){
    $profileID = $_POST['profileID'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $accountPassword = $_POST['accountPassword'];
    $phoneNumber = $_POST['phoneNumber'];

    $INSERT = "INSERT into account (profileID, fullName, email, accountPassword, phoneNumber)
                VALUES(?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($INSERT);

    $stmt -> bind_param("sssss", $profileID, $fullName, $email, $accountPassword, $phoneNumber);

    $stmt -> execute();
    if($stmt){
        echo 'Account successfully created!';
    }
    else{
        echo 'There were errors during account creation, please refresh the page and try again';
    }
}
else{
    echo "Error! Could not send data";
}
mysqli_close($conn);
?>