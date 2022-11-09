
<?php
include('../dbConnection.php');

if(isset($_POST['deleteOrder']))
{
    $orderID = $_POST['deleteSearchOrder'];

    $sqlCommand = "DELETE FROM delivery_orders WHERE orderID = '$orderID'";

    echo $sqlCommand;


    $result = mysqli_query($conn, $sqlCommand);

    if($result==true)
    {
        header("Location: staff_homepage.php#viewOrder");
    }
    else 
    {
        header('Location: staff_homepage.php?error');
    }
}
else{
    header('Location: staff_homepage.php?error');
}
?>