<?php 
@include '../session.php';
echo $orderID = $_SESSION['OrderNumber'];
echo "----------table -----" ;
echo $tableNumber = $_SESSION['tableNumber'];

$sql= "SELECT SUM(amount) FROM orderparticulars WHERE orderID=$orderID  GROUP BY orderID;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "----------sum -----" ;
echo $totalBill = $row['SUM(amount)'];

$sql= "UPDATE `table-orders` SET `TotalBill`=$totalBill,`PaymentStatus`='paid',`RelievedAt`=now(),`tableVacant`=1 WHERE `OrderNumber`=$orderID";
if ($mysqli->query($sql)){
	$message="Hope you had a great Time.. Visit Again!"; 
	echo "<script>alert('$message');window.location='firstpage.php'</script>";
	
	 }
	 else {
			echo 'alert("Please try again in some time.. (some network issue)")';
			
	 };

?>


