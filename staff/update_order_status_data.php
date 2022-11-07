<?php
    include('../dbConnection.php');
    $em = "";
    if(isset($_POST['updateOrder']))
        {
        //get INPUT data from the form 
        $orderID = $_POST['updateSearchOrder'];
        $orderStatus = $_POST['updateOrderStatus'];

        if($conn){
            $UPDATE = "UPDATE `delivery_orders` SET order_status='". $orderStatus . 
            "' WHERE orderID= '" . $orderID . "'";

            $stmt = $conn->prepare($UPDATE);
            $stmt -> execute();
            if($stmt){
                $em= 'Order successfully updated!';
            }
            else{
                $em = 'Error updating order';
            }
        }
        else{
            $em = "Could not send data";
        }
        header('Location: staff_homepage.php?'.$em);
    }
?>