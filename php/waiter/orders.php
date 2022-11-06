<?php @include "../session.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" href="../../css/commonstyles.css">
	<link rel="stylesheet" href="../../css/adminDashboard.css">


</head>
<body>
	<div class="container">
	
		<div class="nav-btn-container">

		<!-- --------------------------------------BACK BUTTON--------------------------- -->
		<button class='nav-btn' onclick="history.back()">Go Back</button>
		</div>
		<?php
  @include "../config.php";

  // Check connection
  if ($conn->connect_error) {
  	die("Connection failed: " . $conn->connect_error);
  }

	if(isset($_POST['vieworders'])){
		$OrderNumber = $_POST['OrderNumber'];
		$TableNumber = $_POST['TableNumber'];
		$CustomerName = $_POST['CustomerName'];
		
	}

  $sql = "SELECT * FROM `orderparticulars` where orderID =  $OrderNumber";
  $result = $conn->query($sql);







  if ($result->num_rows > 0) {
  	echo "

		<h1 class='heading'>Order Details</h1>
		<h4 class='details'> 
		Name:  <span class='span-details'>".$CustomerName."</span> 
		Table Number:  <span class='span-details'>".$TableNumber." </span> 
		Order Number:  <span class='span-details'>".$OrderNumber." </span>
		</h4>
		<div class='table-container'>
		<table class='table'>
		<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
		</thead>
		<tbody>";

  	// output data of each row
  	while ($row = $result->fetch_assoc()) {
			$product_id_new = $row["product-id"];
	$sql1 = " SELECT `product_name` FROM `menu` WHERE product_id = $product_id_new ";
	$result1=$conn->query($sql1);
	$row1 = $result1->fetch_assoc();
  		echo "
			<tr>
		
			<td>" . $row["product-id"]. "</td>
			<td>" . $row1["product_name"]. "</td>
			<td>" . $row["quantity"]. "</td>
			<td>" . $row["amount"]. "</td>
			</tr>
			
				";
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