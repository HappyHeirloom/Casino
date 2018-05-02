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
function update_coinPrice($amount) {
	$updateCoins = mysqli_query($GLOBALS['link'],"UPDATE users SET coinPrice = $amount WHERE username='$_SESSION[username]'");
}


if(isset($_POST['updatecoins'])) {
	updateCoins($_POST['updateamount']);
	die("yup, uc");
	}
if(isset($_POST['update_A_coins'])) {
	update_A_Coins($_POST['updateamount']);
	die("yup,cc");
	}
if(isset($_POST['updatecoinprice'])) {
	update_coinPrice($_POST['updateamount']);
	die("yup,cp");
	}
?>