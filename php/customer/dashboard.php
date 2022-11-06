<?php @include '../session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" href="../../css/dashboard.css">
</head>
<body>
	<div class="container">
	
		<div class="content">
		<div class="nav-bar">
		<div href="#" class="profileName"><?php echo $_SESSION['customer_name']; ?></div>
		<a href="addtocart.php"  class=" cartbutton dashboard-button">My Cart</a>
		</div>
		<?php
@include '../config.php';



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `menu`";
$result = $conn->query($sql);

$href = "dashboard.php";
$class = "Addtocart dashboard-button";

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Category</th><th>Price</th><th></th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
				<form action='addtoCart.php' method='post'>
			
				<input type='hidden' name='Product-ID' value=". $row["product_id"].">

				<input type='hidden' name='Product-Name' value=". $row["product_name"].">
				<tr><td>" . $row["product_id"]. "</td><td>" . $row["product_name"]. "</td>
				<td>" . $row["product_category"]. "</td><td>" .$row["price"]."</td>
				<td>
				<input type='submit' class=".$class." name='addtocart' value='Add to Cart' id=". $row["product_id"].">
				<input type='number' name='ProductQty' value='1'>
				</td></tr>
				</form>
				";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
		</div>
	</div>
	
</body>
</html>