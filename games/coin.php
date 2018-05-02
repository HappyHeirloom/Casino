<?php
include_once("../import.php");
?>

<html>
<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="coinstyle.css"/>
  <link rel="stylesheet" type="text/css" href="../topbar.css"/>  
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
  <script src="js/modernizr.js"></script> <!-- Modernizr -->
</head>
<body>

<div id="topbar">
	<div id="logout" style="float:left;">
		<button class="logout"> <a href="logout.php">Log out</a></p> </button>
	</div>

	<div id="user">
		<h1 class="rainbow-text">Hello <b><?php echo $_SESSION['username'] ?>!</b> </h1>
	</div>
</div>


<h1 class="rainbow-text" style="color:white; font-size:50px; text-align:center; padding-top:50px;"> Coinflip </h1>

	<div class="bigwrapper">
		<div class="coinbetwrap">
			<div class="coins" id="coins">
			</div>
			<input type="integer" id="amounthead" placeholder="Enter your bet on HEADS" />
			<input type="integer" id="amounttail" placeholder="Enter your bet on TAILS " />
		</div>

		<div class="wrapper">
			<a href="#"><div class="button restoreani" id="start_game">
			ROLL
			</div></a>
			<p> LAST NUMBER AND RESULT </p>
			<input style="text-align:center;" type="string" id="randomamount" disabled="disabled"/>
		</div>
		<button id="clear"> clear history </button>
		<!-- <button id="autoscroll"> Toggle Autoscroll </button> -->
		<div id="history" class="history">
		</div>
	</div>


  <header>
  	<nav class="cd-stretchy-nav">
  		<a class="cd-nav-trigger" href="#0">
  			Menu
  			<span aria-hidden="true"></span>
  		</a>

  		<ul>
  			<li><a href="../index.php"><span>Home</span></a></li>
  			<li><a href="./roulette.php"><span>Roulette</span></a></li>
  			<li><a href="./coin.php" class="active"><span>Coin flip</span></a></li>
  			<li><a href="./wheel.php"><span>Shop</span></a></li>
  			<!-- <li><a href="#0"><span>Contact</span></a></li> -->
  		</ul>

  		<span aria-hidden="true" class="stretchy-nav-bg"></span>
  	</nav>
  </header>


	<script src="js/jquery-2.1.4.js"></script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->

<script>
var bet_amounthead;
var bet_amounttail;
var user_coins = <?php echo $coins ?>;


$("#coins").html("coins: "+parseInt(user_coins));



$("#start_game").on("click",function() {
	bet_amounthead = $("#amounthead").val();
	bet_amounttail = $("#amounttail").val();
	if(bet_amounthead <= user_coins) {
		if(bet_amounttail <= user_coins){
		flipCoin();
	}}else{
		alert("NOT ENOUGH COINS");
	}
});

function flipCoin(bet_amount) {
	$('#randomamount').val('');
	let result;
	bet_amounthead = $("#amounthead").val();
	bet_amounttail = $("#amounttail").val();
	let random = Math.random().toFixed(1);

	if(random <= 0.49){ //HEADS
		if(bet_amounthead > 0){
			user_coins += parseInt(bet_amounthead);	
			logMatch("WON", bet_amounthead);
			}
		if(bet_amounttail > 0){
			user_coins -= parseInt(bet_amounttail);
			logMatch("LOST", bet_amounttail);
		}
		result = "HEADS";
		updateCoins();
		updateDatabaseCoins(user_coins);
	}


	if(random >= 0.5){ //TAILS
		if(bet_amounttail > 0){
			user_coins += parseInt(bet_amounttail);
			logMatch("WON", bet_amounttail);
		}
		if(bet_amounthead > 0){
			user_coins -= parseInt(bet_amounthead);
			logMatch("LOST", bet_amounthead);
		}
		result = "TAILS";	
		updateCoins();
		updateDatabaseCoins(user_coins);


	} 
	$('#randomamount').val($('#randomamount').val() + random + '  ' + ":" + '  ' + result);
}

/*
function winCoins(bet_amount) {
}

function subtractCoins(bet_amount) {
}
*/

function logMatch(result,bet_amount) {
	var row = "<b>"+result+"</b> "+bet_amount+" coins! ("+user_coins+") <br/>";
	var soup = $("#history").html();
	$("#history").html(soup+row);
}

$("#clear").on("click", function(){
	$("#history").html("");
});

/* $("#autoscroll").on("click", function() {
	var autoscroll;
	if(autoscroll == true){
		window.setInterval(function(){
			$("div").scrollTop($("div").children().height());
		}, 1000000000000);
		autoscroll = false;
	}else{
		window.setInterval(function(){
			$("div").scrollTop($("div").children().height());
		}, 1);
	}
	autoscroll = true;
});
*/

/* ------------ Cookie ------------ */
window.setInterval(function(){
  updateCoins();
}, 1000);

function updateCoins() {
		$("#coins").html("coins: "+parseInt(user_coins));
		user_coins = parseInt(user_coins);

		/* console.log("updated balance. Cookie saved at "+user_coins); */
}

function updateDatabaseCoins(amount) {
	$.ajax(
	{
		type:"POST",
		crossdomain: true,
		url: '../ajax.php',
		data: {updatecoins:true, updateamount: amount}
	}).done((response) => {
		console.log(response);
	});
}

</script>

</body>
</html>

