<!--  move around to different pages in admin profile -->
<?php session_start(); ?>
<html>
<form action = "" method = "POST">
<div class="board">
    <span>Main staff ORDER page</span><br><br>
    

    <input type="submit" name="create_order" value="Create order">
    <?php
            if(isset($_POST['create_order'])){
            header('Location:staff_order_create.php');
            }
    ?>

<input type="submit" name="view_order" value="View order">
    <?php
            if(isset($_POST['view_order'])){
            header('Location:staff_order_view_V2.php');
            }
    ?>

<input type="submit" name="delete_order" value="Delete order">
    <?php
            if(isset($_POST['delete_order'])){
            header('Location:staff_order_delete.php');
            }
    ?>

<input type="submit" name="update_order" value="Modify quantity for food">
    <?php
            if(isset($_POST['update_order'])){
            header('Location:staff_order_modifyQuantity.php');
            }
    ?>

<input type="submit" name="update_order_status" value="Update order status">
    <?php
            if(isset($_POST['update_order_status'])){
            header('Location:staff_order_updateStatus_V2.php');
            }
    ?>

    <!-- Back button -->
    <tr>
      <td colspan="2"> 
       <input type = "submit" name= "back" value="Back" >
       
    <!-- This is for the 'Back' button which direct to main admin page -->
    <?php if(isset($_POST['back']))
    {
      //header('location:'.SITEURL.'mainadmin.php');
      header('Location:mainstaff.php');
    }
    ?>



    <br>
</div>






