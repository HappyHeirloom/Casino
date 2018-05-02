<?php
session_start();
include_once("db/db.php");
$GLOBALS['link'] = $link;
function updateCoins($amount) {
	$updateCoins = mysqli_query($GLOBALS['link'],"UPDATE users SET coins = $amount WHERE username='$_SESSION[username]'");
}
function update_A_Coins($amount) {
	$updateCoins = mysqli_query($GLOBALS['link'],"UPDATE users SET Acoins = $amount WHERE username='$_SESSION[username]'");
}


if(isset($_POST['updatecoins'])) {
	updateCoins($_POST['updateamount']);
	die("yup");
	}
if(isset($_POST['update_A_coins'])) {
	update_A_Coins($_POST['updateamount']);
	die("yup,cc");
	}
?>