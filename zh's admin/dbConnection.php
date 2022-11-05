<!--?php
$servername="localhost";
$username="root";
$password="";
$database_name="u683387266_fyp_2022";

$conn=mysqli_connect($servername, $username, $password, $database_name);
?-->

<?php
$servername="localhost";
$username="root";
$password="";
$database_name="id19649955_fyp2022";

$conn=mysqli_connect($servername, $username, $password, $database_name);

if($conn)
{
print("Connection Established Successfully");
}else
{
print("Connection Failed ");
}


?>