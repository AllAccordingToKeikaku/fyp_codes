
<?php
include('../dbConnection.php');

if(isset($_POST['delete']))
{
    $itemID = strtoupper($_POST['deleteSearchItem']);

    $sqlCommand = "DELETE FROM menu_item WHERE menu_item_ID = '$itemID'";

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