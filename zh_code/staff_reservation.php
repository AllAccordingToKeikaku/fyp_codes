<!--  move around to different pages in admin profile -->
<?php session_start(); ?>
<html>
<form action = "" method = "POST">
<div class="board">
    <span>Main staff RESERVATION page</span><br><br>
    

    <input type="submit" name="create_reservation" value="Create reservation">
    <?php
            if(isset($_POST['create_reservation'])){
            header('Location:staff_reservation_create.php');
            }
    ?>

<input type="submit" name="view_reservation" value="View reservation">
    <?php
            if(isset($_POST['view_reservation'])){
            header('Location:staff_reservation_view_V2.php');
            }
    ?>

<input type="submit" name="delete_reservation" value="Delete reservation">
    <?php
            if(isset($_POST['delete_reservation'])){
            header('Location:staff_reservation_delete.php');
            }
    ?>

<input type="submit" name="update_reservation" value="Update reservation">
    <?php
            if(isset($_POST['update_reservation'])){
            header('Location:staff_reservation_update.php');
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






