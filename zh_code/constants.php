<?php

$servername="localhost";
$username="root";
$password="";
$database_name="CREATE_ADMIN_PAGE";
         
$conn=mysqli_connect($servername, $username, $password, $database_name);
         
if($conn)
{
print("Connection Established Successfully");
}else
{
print("Connection Failed ");
}


$conn=mysqli_connect($servername, $username, $password);
$db_select = mysqli_select_db($conn, $database_name) or die(mysqli_error());


?>






