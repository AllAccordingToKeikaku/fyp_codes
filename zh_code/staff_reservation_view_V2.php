
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<title>Profile Search</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
				<div class="row">
        <?php 
        include('constants.php');

				if(isset($_POST['search']))
				{
						$filtervalues = $_POST['search'];
						$sqlCommand = "SELECT * FROM staffreservation WHERE CONCAT(staffreservation_name, staffreservation_pax, staffreservation_time, staffreservation_seat) LIKE '%$filtervalues%' ";


				}else 
				{
					$sqlCommand = "SELECT * FROM staffreservation";
				}
       

        $result = mysqli_query($conn, $sqlCommand);


        ?>

				<form action="" method="POST"> 
					<div class="col-md-6">
						<input type="text" name="search" class='form-control' placeholder="Search By Name" value="" > 
					</div>
					<div class="col-md-6 text-left">
						<button class="btn">Search</button>
					</div>

					<div class="col-md-6 text-left">
          <input type = "submit" name= "back" value="Back" >
            <br><br>

            <?php
            if(isset($_POST['back'])){
            header('Location:staff_reservation.php');
            }
            ?>
				</form>

				<br>
				<br>
				</div>
				<table class="table table-bordered">
					<tr>
						<th>id</th>
						<th>name</th>
						<th>pax</th>
            <th>time</th>
            <th>seat</th>
					</tr>

          <?php while($row = mysqli_fetch_object($result)) { ?>

					<tr>
						<td> <?php echo $row->id ?> </td>
						<td> <?php echo $row->staffreservation_name ?></td>
            <td> <?php echo $row->staffreservation_pax ?></td>
            <td> <?php echo $row->staffreservation_time ?></td>
            <td> <?php echo $row->staffreservation_seat ?></td>
					</tr>

					<?php } ?>

				</table>
			</div>
		</div>
	</div>
</body>
</html>