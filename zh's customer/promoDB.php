<?php
require_once('../dbConnection.php');
?>

<?php
$query = "SELECT * FROM `promocodes`";
$select = mysqli_query($conn, $query);
$num_rows = mysqli_num_rows($select);
$promoArray = array();
$codeName = "";
$discountRate = "";
$imgFile = "";
if ($num_rows > 0) {
    while ($rows = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
        $codeName = $rows["codeName"];
        $discountRate = $rows["discountRate"];
        $imgFile = $rows["imgFile"];
        $promoArray[]=array($codeName, $discountRate, $imgFile);
    }
}
?>