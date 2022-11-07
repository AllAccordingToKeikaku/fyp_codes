
<?php
include('../dbConnection.php');

if(isset($_POST['delete']))
{
    $itemID = $_POST['deleteSearchItem'];

    $sqlCommand = "DELETE FROM menu_item WHERE menu_item_ID = '$itemID'";

    echo $sqlCommand;


    $result = mysqli_query($conn, $sqlCommand);

    if($result==true)
    {
        header('Location: staff_homepage.php?successfullyDeletedItem');
    }
    else 
    {
        header('Location: staff_homepage.php?failedToDeleteItem');
    }
}
?>