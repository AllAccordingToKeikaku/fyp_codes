
<?php
include('../dbConnection.php');

if(isset($_POST['deleteCoupon']))
{
    $promoID = $_POST['deleteSearchCoupon'];

    $sqlCommand = "DELETE FROM promocodes WHERE promoID = '$promoID'";

    echo $sqlCommand;


    $result = mysqli_query($conn, $sqlCommand);

    if($result==true)
    {
        header("Location: staff_homepage.php#viewCouponCode");
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