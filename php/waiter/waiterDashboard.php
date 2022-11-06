<?php @include '../session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Waiter Dashboard</title>
	<link rel="stylesheet" href="../../css/adminDashboard.css">
	<link rel="stylesheet" href="../../css/commonstyles.css">


</head>
<body>
	<div class="container">
	
		<div class="nav-btn-container">

		<div href="#" class="nav-btn"> Waiter's Name: <?php echo $_SESSION['Waitername']; ?></div>
			</div>
		<?php




// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `table-orders` WHERE `PaymentStatus`='unpaid' ORDER BY `PaymentStatus` DESC,`OccupiedAt` DESC;";
$result = $conn->query($sql);

// $href = "dashboard.php";
// $class = "Addtocart dashboard-button";
echo "<h1 class='heading'>All Current Orders</h1>
";


if ($result->num_rows > 0) {
    echo "
		<div class='table-container'>
		<table class='table'>
		<thead>
		<tr>
		<th>Table Number</th>
		<th>Order Number</th>
		<th>Customer Name</th>
		<th>No Of Guests</th>
		<th>View Order</th>
		<th>Payment Status</th>
		</tr>
		</thead>
		<tbody>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
				<form action='orders.php' method='post'>
				<tr>
				<td>" . $row["TableNumber"]. "</td>
				<td>" . $row["OrderNumber"]. "</td>
				<td>" . $row["CustomerName"]. "</td>
				<td>" . $row["NoOfGuests"]. "</td>
				<td> 

				<input type='hidden' name='OrderNumber' value=" .
  			$row["OrderNumber"] .">
				<input type='hidden' name='TableNumber' value=" .
  			$row["TableNumber"] .">
				<input type='hidden' name='CustomerName' value=" .
  			$row["CustomerName"] .">

				<input type='submit' class='btn' name='vieworders' value='View Order' id=" . $row["OrderNumber"] . "> 
				
				</td>
				<td>" . $row["PaymentStatus"]. "</td>
				</tr>
				</form>";
    }
    echo "</tbody></table>";
} else {
    echo "<div class='message-container'>No Table Orders Found! \n Restaurant is empty at this moment</div>";
}

$conn->close();
?>
		<!-- </div> -->
	</div>
	
</body>
</html>