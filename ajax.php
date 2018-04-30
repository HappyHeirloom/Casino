<?php
session_start();
include_once("db/db.php");
$GLOBALS['link'] = $link;
function updateCoins($amount) {
	$updateCoins = mysqli_query($GLOBALS['link'],"UPDATE users SET coins = $amount WHERE username='$_SESSION[username]'");
}


if(isset($_POST['updatecoins'])) {
	updateCoins($_POST['updateamount']);
	die("yup");
	}
?>