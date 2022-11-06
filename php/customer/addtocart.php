<?php 
@include '../session.php';

// echo $_SESSION['tableNumber'];
// echo $_SESSION['OrderNumber'];
$OrderNumber = $_SESSION['OrderNumber'];
if(isset($_POST['addtocart'])){
	 $product_id = $_POST['Product-ID'];
	 $product_name = $_POST['Product-Name'];
	$product_qty = $_POST['ProductQty'];	

	 $sql = " SELECT * FROM `menu` WHERE product_id = $product_id ";
	 $result=$conn->query($sql);
	 if($result->num_rows>0){
	 $row = $result->fetch_assoc();
	//  echo"-----" ,$row['product_category'];
		 $product_price = $product_qty * $row['price'];
	//  if($result->num_rows>0){
	// 	while($row = $result->fetch_assoc()) {
	// 		echo"-----" ,$row['product_category'];
	// 		echo $product_price = $product_qty * $row['price'];
	// 	}
	$insert = "INSERT INTO `orderparticulars`(`product-id`, quantity, amount, orderID) VALUES('$product_id','$product_qty' , '$product_price', '$OrderNumber')";
  mysqli_query($conn, $insert);
// 	if ($mysqli->query($insert)){
// 		echo " DONE";
//  }
//  else {
// 		echo "NOT DONE";
//  };

	 }







}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cart</title>
	<link rel="stylesheet" href="../../css/dashboard.css">

</head>
<body>
	<div class="container">
		<div class="content">
		<div class="nav-bar">
		<button class='profileName' onclick="history.back()">Go Back</button>
		<a href="makepayment.php"  class=" cartbutton dashboard-button">Make Payment</a>
</div>
		<h3 class="title">MY ORDERS</h3>
		<table>
		<tr>
		<th>product_id</th>
		<th>product_name</th>
		<th>product_qty</th>
		<th>product_price</th>

		</tr>
		<?php

		 $sql = "SELECT * FROM `orderparticulars` where orderID =  $OrderNumber";
			$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
	$product_id_new = $row["product-id"];
	$sql1 = " SELECT `product_name` FROM `menu` WHERE product_id = $product_id_new ";
	$result1=$conn->query($sql1);
	$row1 = $result1->fetch_assoc();

	echo "<tr>
	<td>" . $row["product-id"]. "</td>
	<td>" . $row1["product_name"]. "</td>
	<td>" . $row["quantity"]. "</td>
	<td>" . $row["amount"]. "</td>
	</tr>";
}
		
		?>
</table>
		</div>
	</div>
	
</body>
</html>