<?php @include "../session.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<!-- <link rel="stylesheet" href="../../css/dashb.css"> -->
	<link rel="stylesheet" href="../../css/commonstyles.css">
	<link rel="stylesheet" href="../../css/adminDashboard.css">


</head>
<body>
	<div class="container">
	
		<!-- <div class="content"> -->
		<div class="nav-btn-container">
		<div href="#" class="nav-btn"><?php echo $_SESSION["OrderNumber"]; ?></div>
		<a href="addtocart.php"  class="nav-btn">My Cart</a>
		</div>
		<?php
  @include "../config.php";

  // Check connection
  if ($conn->connect_error) {
  	die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM `menu`";
  $result = $conn->query($sql);

  $href = "dashboard.php";
  $class = "Addtocart dashboard-button";






  if ($result->num_rows > 0) {
  	echo "

		<div class='table-container'>
		<table class='table'>
		<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Category</th>
			<th>Price</th>
			<th>Qty</th>
			<th></th>
		</tr>
		</thead>
		<tbody>";

  	// output data of each row
  	while ($row = $result->fetch_assoc()) {
  		echo "
				<form action='addtoCart.php' method='post'>
			
				<input type='hidden' name='Product-ID' value=" .
  			$row["product_id"] .
  			">

				<input type='hidden' name='Product-Name' value=" .
  			$row["product_name"] .
  			">
				<tr>
					<td>" .
					$row["product_id"] .
					"</td>
					<td>" .
					$row["product_name"] .
					"</td>
					<td>" .
					$row["product_category"] .
					"</td>

					
					<td>" .
					$row["price"] .
					"</td>
					<td > 
					<input type='number' class='qty-input' name='ProductQty' value='1'>
					</td>
					<td>
					


				<input type='submit' class='btn' name='addtocart' value='Add to Cart' id=" . $row["product_id"] . ">

				

				</td></tr>
				</form>
				";
  	}
  	echo "</tbody></table>";
  } else {
  	echo "0 results";
  }

  $conn->close();
  ?>
		<!-- </div> -->
	</div>
	
</body>
</html>