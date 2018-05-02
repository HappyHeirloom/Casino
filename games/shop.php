<?php
include_once("../import.php");
?>


<html>
<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../topbar.css"/>	
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
		<button class="logout"> <a href="logout.php">Log out</a></p> </button>
	</div>

	<div id="user">
		<h1 class="rainbow-text">Hello <b><?php echo $_SESSION['username'] ?>!</b> </h1>
	</div>
</div>

<h1 class="rainbow-text" style="font-size:30x; text-align:left; padding-top:50px; position:absolute;">Hi, <b><?php echo $_SESSION['username'] ?></b> </h1>



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
  			<li><a href="./wheel.php" class="active"><span>Wheel of fortune</span></a></li>
  			<!-- <li><a href="#0"><span>Contact</span></a></li> -->
  		</ul>

  		<span aria-hidden="true" class="stretchy-nav-bg"></span>
  	</nav>
  </header>


<script src="js/jquery-2.1.4.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->

</body>
</html>
