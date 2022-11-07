
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
        include('../dbConnection.php');

				if(isset($_POST['update']))
				{
						$getID = $_POST['input_orderID'];

            //get data from the form (variables)
            
            $getStatus =$_POST['input_status'];




            $sqlCommand = "UPDATE delivery_orders SET  order_status = '$getStatus'
                                          WHERE orderID = '$getID'
                                          ";
            
            $result = mysqli_query($conn, $sqlCommand);
            


            $sqlCommand = "SELECT * FROM delivery_orders";
        	


				}else 
				{
					$sqlCommand = "SELECT * FROM delivery_orders";
				}
       

        $result = mysqli_query($conn, $sqlCommand);


        ?>

				<form action="" method="POST"> 

            <label for="input_item">Order ID:</label>
            <input type="number" placeholder="Enter Order ID now"  name="input_orderID" > 
            <br><br>


            
            <label for="profilename" id="profileimg">Change Status:</label>
            <select name="input_status" id="profilename">
              <option value="Delivered">Delivered</option>
              <option value="In-progress">In-progress</option>
            </select>
            <br><br><br>

					<div class="col-md-6 text-left">
						<button class="btn" name='update'>update</button>
					</div>




				</form>

				<br>
				<br>
				</div>
				<table class="table table-bordered">
					<tr>
						<th>Order ID</th>
						<th>Account ID</th>
						<th>Order Date</th>
						<th>Order Time</th>
            <th>Price </th>
            <th>Status</th>
            <th>Promo code</th>
            <th>HAWAIIAN_SALMON</th>
            <th>COLOURFUL_GODDESS</th>
            <th>SPICY_MIXED_SALMON</th>
            <th>SHOYU_TUNA_SPECIAL</th>
            <th>FULL_VEGGIELICIOUS</th>
            <th>AVOCADO_SUPREME</th>
            <th>SUMMER_FLING</th>
            <th>CHOC_SWEET</th>
            <th>CARAMEL_NUTTIN</th>
            <th>INCREDIBLE_HULK</th>
            <th>ORANGE_MADNESS</th>
            <th>SPIDEY_SENSES</th>
            <th>CC number</th>
					</tr>

          <?php while($row = mysqli_fetch_object($result)) { ?>

					<tr>
						<td> <?php echo $row->orderID ?> </td>
						<td> <?php echo $row->accountID ?></td>
            <td> <?php echo $row->order_date ?></td>
            <td> <?php echo $row->order_time ?></td>
            <td> <?php echo $row->order_price ?></td>
            <td> <?php echo $row->order_status ?></td>
            <td> <?php echo $row->order_promocode ?></td>
            <td> <?php echo $row->HAWAIIAN_SALMON ?></td>
            <td> <?php echo $row->COLOURFUL_GODDESS ?></td>
            <td> <?php echo $row->SPICY_MIXED_SALMON ?></td>
            <td> <?php echo $row->SHOYU_TUNA_SPECIAL ?></td>
            <td> <?php echo $row->FULL_VEGGIELICIOUS ?></td>
            <td> <?php echo $row->AVOCADO_SUPREME ?></td>
            <td> <?php echo $row->SUMMER_FLING ?></td>
            <td> <?php echo $row->CHOC_SWEET ?></td>
            <td> <?php echo $row->CARAMEL_NUTTIN ?></td>
            <td> <?php echo $row->INCREDIBLE_HULK ?></td>
            <td> <?php echo $row->ORANGE_MADNESS ?></td>
            <td> <?php echo $row->SPIDEY_SENSES ?></td>
            <td> <?php echo $row->cc_number ?></td>
          

					</tr>

					<?php } ?>

				</table>
			</div>
		</div>
	</div>
</body>
</html>