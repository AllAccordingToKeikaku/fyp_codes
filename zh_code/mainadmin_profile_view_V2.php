
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
						$sqlCommand = "SELECT * FROM profile WHERE CONCAT(profile_name,profile_function, profile_describe) LIKE '%$filtervalues%' ";


				}else 
				{
					$sqlCommand = "SELECT * FROM profile";
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
            header('Location:mainadmin.php');
            }
            ?>
				</form>

				<br>
				<br>
				</div>
				<table class="table table-bordered">
					<tr>
			
						<th>name</th>
						<th>function</th>
						<th>describe</th>
					</tr>

          <?php while($row = mysqli_fetch_object($result)) { ?>

					<tr>
			
						<td> <?php echo $row->profile_name ?></td>
            <td> <?php echo $row->profile_function ?></td>
            <td> <?php echo $row->profile_describe ?></td>
					</tr>

					<?php } ?>

				</table>
			</div>
		</div>
	</div>
</body>
</html>