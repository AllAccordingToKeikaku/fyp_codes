<?php
require_once('dbConnection.php');
?>

<?php
$query = "UPDATE `account` SET fullName=`{$name}`, email=`{$email}`, accountPassword=`{$accountPassword}`, phoneNumber=`{$phoneNumber}` WHERE accountID=`{$accountID}` ";
$select = mysqli_query($conn, $query);
$num_rows = mysqli_num_rows($select);
?>