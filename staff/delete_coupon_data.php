
<?php
include('../dbConnection.php');

if(isset($_POST['deleteCoupon']))
{
    $promoID = strtoupper($_POST['deleteSearchCoupon']);

    $sqlCommand = "DELETE FROM promocodes WHERE promoID = '$promoID'";

    echo $sqlCommand;


    $result = mysqli_query($conn, $sqlCommand);

    if($result==true)
    {
        header('Location: staff_homepage.php?successfullyDeletedPromo');
    }
    else 
    {
        header('Location: staff_homepage.php?failedToDeletePromo');
    }
}
?>