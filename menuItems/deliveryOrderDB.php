<?php
require_once("dbConnection.php");
?>

<?php
$query = "SELECT * FROM `delivery_orders`";
$select = mysqli_query($conn, $query);
$num_rows = mysqli_num_rows($select);
$deliveryOrderArray = array();
$orderID = "";
$accountID = "";
if ($num_rows > 0) {
    while ($rows = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
        $orderID = $rows["orderID"];
        $accountID = $rows["accountID"];
        $deliveryOrderArray[]=array($orderID, $accountID);
    }
}
mysqli_close($conn);
?>