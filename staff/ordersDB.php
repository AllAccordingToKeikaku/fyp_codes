<?php
require_once('../dbConnection.php');
?>

<?php
$query = "SELECT * FROM `delivery_orders`";
$select = mysqli_query($conn, $query);
$num_rows = mysqli_num_rows($select);
$ordersArray = array();
$orderID = "";
$accountID = "";
$order_date = "";
$order_time = "";
$order_price = "";
$order_status = "";
$order_promocode = "";
$order_address = "";
$item_1 = "";
$item_2 = "";
$item_3 = "";
$item_4 = "";
$item_5 = "";
$item_6 = "";
$item_7 = "";
$item_8 = "";
$item_9 = "";
$item_10 = "";
$item_11 = "";
$item_12 = "";
if ($num_rows > 0) {
    while ($rows = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
        $orderID = $rows["orderID"];
        $accountID = $rows["accountID"];
        $order_date = $rows["order_date"];
        $order_time = $rows["order_time"];
        $order_price = $rows["order_price"];
        $order_status = $rows["order_status"];
        $order_promocode = $rows["order_promocode"];
        $order_address = $rows["order_address"];
        $item_1 = $rows["HAWAIIAN_SALMON"];
        $item_2 = $rows["COLOURFUL_GODDESS"];
        $item_3 = $rows["SPICY_MIXED_SALMON"];
        $item_4 = $rows["SHOYU_TUNA_SPECIAL"];
        $item_5 = $rows["FULL_VEGGIELICIOUS"];
        $item_6 = $rows["AVOCADO_SUPREME"];
        $item_7 = $rows["SUMMER_FLING"];
        $item_8 = $rows["CHOC_SWEET"];
        $item_9 = $rows["CARAMEL_NUTTIN"];
        $item_10 = $rows["INCREDIBLE_HULK"];
        $item_11 = $rows["ORANGE_MADNESS"];
        $item_12 = $rows["SPIDEY_SENSES"];
        $ordersArray[]=array($orderID, $accountID, $order_date, $order_time, $order_price, $order_status, $order_promocode, $order_address,
                $item_1, $item_2, $item_3, $item_4, $item_5, $item_6, $item_7, $item_8, $item_9, $item_10, $item_11, $item_12);
    }
}
?>