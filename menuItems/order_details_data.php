<?php
require_once("dbConnection.php");
?>

<?php
if(isset($_POST['order_status'])){
  $order_date= $_POST['order_date'];
  $order_time= $_POST['order_time'];
  $order_price= $_POST['order_price'];
  $order_status= $_POST['order_status'];
  $order_promocode= $_POST['order_promocode'];
  $item_1 = $_POST['HAWAIIAN_SALMON'];
  $item_2 = $_POST['COLOURFUL_GODDESS'];
  $item_3 = $_POST['SPICY_MIXED_SALMON'];
  $item_4 = $_POST['SHOYU_TUNA_SPECIAL'];
  $item_5 = $_POST['FULL_VEGGIELICIOUS'];
  $item_6 = $_POST['AVOCADO_SUPREME'];
  $item_7 = $_POST['SUMMER_FLING'];
  $item_8 = $_POST['CHOC_SWEET'];
  $item_9 = $_POST['CARAMEL_NUTTIN'];
  $item_10 = $_POST['INCREDIBLE_HULK'];
  $item_11 = $_POST['ORANGE_MADNESS'];
  $item_12 = $_POST['SPIDEY_SENSES'];

  $INSERT = "INSERT into delivery_orders (order_date, order_time, order_price, order_status, order_promocode, 
                                        HAWAIIAN_SALMON, COLOURFUL_GODDESS, SPICY_MIXED_SALMON, SHOYU_TUNA_SPECIAL,
                                        FULL_VEGGIELICIOUS, AVOCADO_SUPREME, SUMMER_FLING, CHOC_SWEET,
                                        CARAMEL_NUTTIN, INCREDIBLE_HULK, ORANGE_MADNESS, SPIDEY_SENSES) 
                                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  
  //Prepare statement
  $stmt = $conn->prepare($INSERT);

  $stmt -> bind_param("sssssiiiiiiiiiiii", $order_date, $order_time, $order_price, $order_status, $order_promocode, $item_1, $item_2, $item_3,
                        $item_4, $item_5, $item_6, $item_7, $item_8, $item_9, $item_10, $item_11, $item_12);
  $stmt -> execute();
  if($stmt){
    echo 'Successfully placed an order!';
  }
  else{
    echo 'There were errors in your order, please refresh the page and try again';
  }
}
else{
  echo "Error! Could not send data";
}
mysqli_close($conn);
?>