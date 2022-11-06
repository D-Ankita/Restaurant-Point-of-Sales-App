<?php

@include '../config.php';

session_start();

if(isset($_POST['submit'])){
    
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = md5($_POST['password']);
	 
   $sql = " SELECT * FROM users WHERE email = '$email' && password = '$pass' && Role = 'Admin'" ;

   $result = $conn->query($sql);
   if($result->num_rows > 0){
      $_SESSION['Adminusermail'] = $email;
			$_SESSION['Adminname'] = $result->fetch_assoc()['Name'];
			$_SESSION['Adminrole'] = 'Admin';
      header('location:adminDashboard.php');
   }else{
      $error[] = 'incorrect password or email.';
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
        <h3 class="title">ADMIN login</h3>
        <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
        <input type="email" name="usermail" placeholder="enter your email" class="box" required>
        <input type="password" name="password" placeholder="enter your password" class="box" required>
        <input type="submit" value="login now" class="form-btn" name="submit">
        <p>don't have an account? <a href="register_form.php">register now!</a></p>
    </form>

</div>

</body>
</html>