<!--  move around to different pages in admin profile -->
<html>

<form action = "" method = "POST">
<div class="board">
    <span>Main staff page</span><br><br>
  

    <input type="submit" name="staff_item" value="Item">
    <?php
            if(isset($_POST['staff_item'])){
            header('Location:staff_item.php');
            //header('localhost:8081/mainitem.php');
            }?>

<input type="submit" name="staff_coupon" value="Coupon">
    <?php
            if(isset($_POST['staff_coupon'])){
            header('Location:staff_coupon.php');
            }
    ?>

<input type="submit" name="staff_order" value="Order">
    <?php
            if(isset($_POST['staff_order'])){
            header('Location:staff_order.php');
            }
    ?>

<input type="submit" name="staff_reservation" value="Reservation">
    <?php
            if(isset($_POST['staff_reservation'])){
            header('Location:staff_reservation.php');
            }
    ?>


    <br>
</div>






