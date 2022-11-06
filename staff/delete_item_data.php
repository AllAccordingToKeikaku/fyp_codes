
<?php
include('../dbConnection.php');

if(isset($_POST['delete']))
{
    $name = strtoupper($_POST['deleteSearchItem']);

    $sqlCommand = "DELETE FROM menu_item WHERE item_name = '$name'";

    echo $sqlCommand;


    $result = mysqli_query($conn, $sqlCommand);

    if($result==true)
    {
        $_SESSION['delete'] = "Account deleted successfully";
        header('Location: staff_homepage.php?successfullyDeleted');
    }
    else 
    {
        header('Location: staff_homepage.php?failedToCreate');
    }
}
?>