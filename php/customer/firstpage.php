
<?php
@include '../session.php';

if(isset($_POST['submit'])){
    
   $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
   $tableNumber = mysqli_real_escape_string($conn, $_POST['tableNumber']); 
   $Noofpeople = mysqli_real_escape_string($conn, $_POST['Noofpeople']); 
   // $tableVacant = false;

   $select = " SELECT * FROM `table-orders` WHERE TableNumber = '$tableNumber' && tableVacant = 0 ";

   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows($result) > 0){
      $error[] = 'TABLE NOT VACANT! PLEASE CHECK';
      echo '<script>alert("TABLE NOT VACANT! PLEASE CHECK")</script>';
   }else{
      echo $OrderNumber = rand(1,200);
      // echo $OrderNumber = 14;
         $insert = "INSERT INTO `table-orders`(OrderNumber, TableNumber, CustomerName,OccupiedAt,NoOfGuests,tableVacant) VALUES($OrderNumber,'$tableNumber','$customer_name',CURRENT_TIME(),'$Noofpeople',false)";
         $mysqli = new mysqli('localhost','root','','user_db');
         
         if ($mysqli->query($insert)){
            echo " DONE";
         }
         else {
            echo "NOT DONE";
         };
         echo $_SESSION['OrderNumber'] = $OrderNumber;
         echo $_SESSION['tableNumber'] = $tableNumber;
     echo  $_SESSION['customer_name'] = $customer_name;
     echo  $_SESSION['Noofpeople'] = $Noofpeople;
     $_SESSION['cart'][] = array('tablenumber'=>$tableNumber);
      header('location:dashboard.php');
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div class="form-container">

<form action="" method="post">
   <h3 class="title">Welcome Customer</h3>
    <input type="text" name="customer_name" placeholder="Please Enter your Name" class="box" required>
    <input type="number" name="tableNumber" placeholder="Ask the waiter for your Table Number" class="box" required>
    <input type="number" name="Noofpeople" placeholder="You are How many People" class="box" required>
    <input type="submit" value="Next" class="form-btn" name="submit">
    
</form>

</div>

</body>
</html>