
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
						$sqlCommand = "SELECT * FROM staffcoupon WHERE CONCAT(staffcoupon_name, staffcoupon_fromDate, staffcoupon_toDate, staffcoupon_tc, staffcoupon_percentage ) LIKE '%$filtervalues%' ";


				}else 
				{
					$sqlCommand = "SELECT * FROM staffcoupon";
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
            header('Location:staff_coupon.php');
            }
            ?>
				</form>

				<br>
				<br>
				</div>
				<table class="table table-bordered">
					<tr>
						<th>name</th>
						<th>from Date</th>
						<th>to Date</th>
            <th>term & conditions</th>
            <th>percentage</th>
					</tr>

          <?php while($row = mysqli_fetch_object($result)) { ?>

					<tr>
						<td> <?php echo $row->staffcoupon_name ?> </td>
						<td> <?php echo $row->staffcoupon_fromDate ?></td>
            <td> <?php echo $row->staffcoupon_toDate ?></td>
            <td> <?php echo $row->staffcoupon_tc ?></td>
            <td> <?php echo $row->staffcoupon_percentage ?></td>
					</tr>

					<?php } ?>

				</table>
			</div>
		</div>
	</div>
</body>
</html>