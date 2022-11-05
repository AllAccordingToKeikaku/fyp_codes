<!--  move around to different pages in admin profile -->
<?php session_start(); ?>
<html>
<form action = "" method = "POST">
<div class="board">
    <span>ITEM page</span><br><br>
    

    <input type="submit" name="create_item" value="Create Menu Item">
    <?php
            if(isset($_POST['create_item'])){
            header('Location:staff_item_create.php');
            }
    ?>

<input type="submit" name="view_item" value="View Menu Item List">
    <?php
            if(isset($_POST['view_item'])){
            header('Location:staff_item_view_V2.php');
            }
    ?>

<input type="submit" name="delete_item" value="Delete Menu Item">
    <?php
            if(isset($_POST['delete_item'])){
            header('Location:staff_item_delete.php');
            }
    ?>

<input type="submit" name="update_item" value="Update Menu Item">
    <?php
            if(isset($_POST['update_item'])){
            header('Location:staff_item_update.php');
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






