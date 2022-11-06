<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['usermail'])){
   header('location:login_form.php');
}
?>