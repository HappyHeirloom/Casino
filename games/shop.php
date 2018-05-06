<?php
include_once("../import.php");
?>


<html>
<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../topbar.css"/>	
  <link rel="stylesheet" type="text/css" href="../rainbow.css"/>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.0/p5.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.0/addons/p5.dom.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.0/addons/p5.sound.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="shopstyle.css"/>
  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
  <script src="js/modernizr.js"></script> <!-- Modernizr -->
</head>
<body>

<div id="topbar">
	<div id="logout" style="float:left;">
		<button class="logout"> <a href="../logout.php">Log out</a></p> </button>
	</div>

	<div id="user">
		<h1 class="rainbow-text">Hello <b><?php echo $_SESSION['username'] ?>!</b> </h1>
	</div>
</div>

<h1 class="rainbow-text" style="color:white; font-size:50px; text-align:center; padding-top:50px;"> Shop </h1>


<div class="bigwrapper">
	<div class="coinbetwrap">
	<div class="coins" id="coins">
	</div>
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
  			<li><a href="./coin.php"><span>Coin flip</span></a></li>
  			<li><a href="./shop.php" class="active"><span>shop</span></a></li>
  			<!-- <li><a href="#0"><span>Contact</span></a></li> -->
  		</ul>

  		<span aria-hidden="true" class="stretchy-nav-bg"></span>
  	</nav>
  </header>


<div id="shop">
	<div id="item1">
	<img onclick="buy()" class="coinimg" src="../coin.png"/>
	<input class="price" type="string" id="price" disabled="disabled"/>
	</div>
</div>




<script src="js/jquery-2.1.4.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->


<script>
let a_coins = <?php echo $coins->Acoins?>;
let price = <?php echo $coins->coinPrice?>;

let user_coins = <?php echo $coins->coins ?>;
$("#coins").html("coins: "+parseInt(user_coins));


$('#price').val($('#price').val() + ' Price: '  + price + ' ' +'coins.');

function buy(){
	if (user_coins >= price){
		a_coins += 1;
		user_coins -= price;
		price *= 3.5;
		$('#price').val('');
		$('#price').val($('#price').val() + ' Price: '  + price + ' ' +'coins.');
		update();
	} else {
		alert("NOT ENOUGH COINS");
	}
}

function addCoins(){
	user_coins += a_coins;
}

function update(){
	addCoins();
  updateCoins();
	updateDatabaseCoins(user_coins);
	updateDatabase_a_Coins(a_coins);
	updateDatabase_coinPrice(price);
}

window.setInterval(function(){
	if (a_coins > 0){
	update();
	}
}, 10000);


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
function updateDatabase_a_Coins(amount) {
	$.ajax(
	{
		type:"POST",
		crossdomain: true,
		url: '../ajax.php',
		data: {update_A_coins:true, updateamount: amount}
	}).done((response) => {
		console.log(response);
	});
}
function updateDatabase_coinPrice(amount) {
	$.ajax(
	{
		type:"POST",
		crossdomain: true,
		url: '../ajax.php',
		data: {updatecoinprice:true, updateamount: amount}
	}).done((response) => {
		console.log(response);
	});
}

</script>


</body>
</html>
