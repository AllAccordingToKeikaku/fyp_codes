<!--  move around to different pages in admin profile -->
<?php session_start(); ?>
<html>
<form action = "" method = "POST">
<div class="board">
    <span>Main staff COUPON page</span><br><br>
    

    <input type="submit" name="create_coupon" value="Create coupon">
    <?php
            if(isset($_POST['create_coupon'])){
            header('Location:staff_coupon_create.php');
            }
    ?>

<input type="submit" name="view_coupon" value="View coupon">
    <?php
            if(isset($_POST['view_coupon'])){
            header('Location:staff_coupon_view_V2.php');
            }
    ?>

<input type="submit" name="delete_coupon" value="Delete coupon">
    <?php
            if(isset($_POST['delete_coupon'])){
            header('Location:staff_coupon_delete.php');
            }
    ?>

<input type="submit" name="update_coupon" value="Update coupon">
    <?php
            if(isset($_POST['update_coupon'])){
            header('Location:staff_coupon_update.php');
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






