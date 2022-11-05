<!--  move around to different pages in admin profile -->
<?php session_start(); ?>
<html>
<form action = "" method = "POST">
<div class="board">
    <span>PROFILE</span><br><br>
    

    <input type="submit" name="create_profile" value="Create User profile">
    <?php
            if(isset($_POST['create_profile'])){
            header('Location:mainadmin_profile_create.php');
            }
    ?>

<input type="submit" name="view_profile" value="View User profile">
    <?php
            if(isset($_POST['view_profile'])){
            header('Location:mainadmin_profile_view_V2.php');
            }
    ?>

<input type="submit" name="delete_profile" value="Delete User profile">
    <?php
            if(isset($_POST['delete_profile'])){
            header('Location:mainadmin_profile_delete.php');
            }
    ?>

<input type="submit" name="update_profile" value="Update User profile">
    <?php
            if(isset($_POST['update_profile'])){
            header('Location:mainadmin_profile_update.php');
            }
    ?>

    <br><br><br><br>

    

    <span>ACCOUNT</span><br><br>



    <input type="submit" name="create_account" value="Create User account">
    <?php
            if(isset($_POST['create_account'])){
            header('Location:mainadmin_account_create.php');
            }
    ?>

<input type="submit" name="view_account" value="View User account">
    <?php
            if(isset($_POST['view_account'])){
            header('Location:mainadmin_account_view_V2.php');
            }
    ?>

<input type="submit" name="delete_account" value="Delete User account">
    <?php
            if(isset($_POST['delete_account'])){
            header('Location:mainadmin_account_delete.php');
            }
    ?>

<input type="submit" name="update_account" value="Update User account">
    <?php
            if(isset($_POST['update_account'])){
            header('Location:mainadmin_account_update.php');
            }
    ?>
</div>








<?php
    if(isset($_SESSION['status']))
    {
        echo($_SESSION['status']);
        unset($_SESSION['status']);
    }

    if(isset($_SESSION['delete']))
    {
        echo($_SESSION['delete']);
        unset($_SESSION['delete']);
    }


   

    if(isset($_SESSION['update']))
    {
        echo($_SESSION['update']);
        unset($_SESSION['update']);
    }
    
        
    
?>
    <br>







