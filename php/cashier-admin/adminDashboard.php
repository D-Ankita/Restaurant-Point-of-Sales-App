<?php @include '../session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADMIN Dashboard</title>
	<link rel="stylesheet" href="../../css/dashboard.css">
</head>
<body>
	<div class="container">
	
		<div class="content">
		<div class="nav-bar">
		<div href="#" class="profileName"><?php echo $_SESSION['Adminname']; ?></div>
			</div>
		<?php




// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `table-orders`";
$result = $conn->query($sql);

$href = "dashboard.php";
$class = "Addtocart dashboard-button";

if ($result->num_rows > 0) {
    echo "<table>
		<tr>
		<th>Table Number</th>
		<th>Order Number</th>
		<th>Customer Name</th>

		<th>Total Bill</th>
		<th>Payment Status</th>
		</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
				<td>" . $row["TableNumber"]. "</td>
				<td>" . $row["OrderNumber"]. "</td>
				<td>" . $row["CustomerName"]. "</td>
				<td>" . $row["TotalBill"]. "</td>
				<td>" . $row["PaymentStatus"]. "</td>
				</tr>";
    }
    echo "</table>";
} else {
    echo "No Table Orders Found! Please check your Database";
}

$conn->close();
?>
		</div>
	</div>
	
</body>
</html>