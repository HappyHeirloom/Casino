<?php
// Initialize the session
session_start();
include_once("db/db.php");
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

$load_coins_query = mysqli_query($link,"SELECT coins, Acoins FROM users WHERE username='$_SESSION[username]'");
$coins = mysqli_fetch_object($load_coins_query);



?>