<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Used Cars </title>
	<meta name="description" content="Scarica gratis il nostro Template HTML/CSS GARAGE. Se avete bisogno di un design per il vostro sito web GARAGE può fare per voi. Web Domus Italia">
	<meta name="author" content="Web Domus Italia">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="slider.css">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<link rel="stylesheet" type="text/css" href="contactstyle.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!-- Header -->
<div class="allcontain">
	<div class="header">
			<ul class="socialicon">
			<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="https://hu.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
			</ul>
			<ul class="givusacall">
				<li>Give us a call : +361234567 </li>
			</ul>
			<ul class="logreg">
				<li><a href="#" onclick="showLoginModal()" >Login </a> </li>
				<li><a href="#" onclick="showRegisterModal()"><span class="register">Register</span></a></li>
			</ul>
	</div>
	<!-- Navbar Up -->
	<nav class="topnavbar navbar-default topnav">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed toggle-costume" data-toggle="collapse" data-target="#upmenu" aria-expanded="false">
					<span class="sr-only"> Toggle navigaion</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand logo" href="#"><img src="image/logo1.png" alt="logo"></a>
			</div>	 
		</div>
		<div class="collapse navbar-collapse" id="upmenu">
			<ul class="nav navbar-nav" id="navbarontop">
				<li class="active"><a href="index.php">HOME</a> </li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle"	data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CATEGORIES <span class="caret"></span></a>
					<ul class="dropdown-menu dropdowncostume">
						<li><a href="#">Sport</a></li>
						<li><a href="#">Old</a></li>
						<li><a href="#">New</a></li>
					</ul>
				</li>
				<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">REQUIREMENTS<span class="caret"></span></a>
						<ul class="dropdown-menu dropdowncostume">
						<li><a href="canvas.html">Canvas</a></li>
							<li><a href="geo.html">Geolocation</a></li>
							<li><a href="svg.html">SVG</a></li>
							<li><a href="dada.html">Drag and drop API</a></li>
							<li><a href="cooki.php">Cookies</a></li>
							<li><a href="mail.php">Sending emails</a></li>
						
							<li><a href="ss.html">Session Storage</a></li>
							<li><a href="ls.html">Local Storage</a></li>
							<li><a href="ww.html">Web Workers</a></li>
							<li><a href="sse.html">Server Sent Events</a></li>
						</ul>
				</li>
				<li class="dropdown">
					<a href="contact.php"  >CONTACT </a>
				</li>
				<li>
				<a id="newcar" href="upload.php"><span class="postnewcar">
					<button>POST NEW CAR</button></span></a></li>
			</ul>
		</div>
	</nav>
</div>
<!--_______________________________________ Carousel__________________________________ -->
<div class="allcontain">
	<div id="carousel-up" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner " role="listbox">
			<div class="item active">
				<img src="image/oldcar.jpg" alt="oldcar">
				<div class="carousel-caption">
					<h2>Porsche 356</h2>
					<p>A great classic car with beauty and power<br>
						 like the new generations of cars</p>
				</div>
			</div>
			<div class="item">
				<img src="image/porche.jpg" alt="porche">
				<div class="carousel-caption">
					<h2>Porche</h2>
					<p>A great classic car with beauty and power<br>
						 like the new generations of cars</p>
				</div>
			</div>
			<div class="item">
				<img src="image/benz.jpg" alt="benz">
				<div class="carousel-caption">
					<h2>Mercedes</h2>
					<p>A great classic car with beauty and power<br>
						 like the new generations of cars</p>
				</div>
			</div>
		</div>
		
	</div>
</div>
<div class="allcontain">
    <br>
    <br>
<?php

//$varidv = $_COOKIE['id'];
$var_value = $_GET['varname'];



	$conn = mysqli_connect("localhost", "cars", "usedcarssql1234", "cars");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Fetch car details from database
$sql = "SELECT * FROM cars where id = '$var_value'";
$result = mysqli_query($conn, $sql);

// Check if any cars exist
if (mysqli_num_rows($result) > 0) {
  
  
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<div>";
   
    echo "<img src='img/$row[image]'" ."'width=200px'". "' alt='" . $row['brand'] . " " . $row['model'] . "'>";
    echo "<h2>" . $row['brand'] . " " . $row['model'] . "</h2>";
    echo "<p>Displacement: " . $row['displacement'] . " cc</p>";
    echo "<p>Production date: " . $row['p_date'] . "</p>";
    echo "<p>Price: $" . $row['price'] . "</p>";
    echo "<p>Mileage: " . $row['mileage'] . " km</p>";
    echo "<p>More: " . $row['text'] . "</p>";
    echo "</div>";
}
}
 else {
// Display message if no cars exist
echo "No cars found.";
}

// Close database connection
mysqli_close($conn);
?>

	</div>
</div>
<div class="footer">
	<div class="copyright">
		&copy; Copy right 2016 | <a href="#">Privacy </a>| <a href="#">Policy</a>
	</div>
	<div class="atisda">
		 Designed by <a href="http://www.webdomus.net/">Web Domus Italia - Web Agency </a> 
	</div>
</div>





<div class="modal" id="loginModal">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close" onclick="closeLoginModal()">&times;</span>
			<h2>Login</h2>
		</div>
		<div class="modal-body">
		
			<form method="post" action="login.php">
				<label for="nev">Username:</label>
				<input type="text" id="nev" name="nev"><br><br>
				<label for="password">Password:</label>
				<input type="password" id="password" name="password"><br><br>
				<button type="submit"  id="login" name="login">Login</button>
			</form>
			<p>Don't have an account? <a href="#" onclick="showRegisterModal()">Register</a></p>

		</div>
	</div>
</div>


<!-- Register Modal -->
<div id="registerModal" class="modal">
<div class="modal-content">
	<span class="close" onclick="closeRegisterModal()">&times;</span>
	<h2>Register</h2>
	
	<form method="post" action="register.php">
		<label for="nev">Username:</label>
		<input type="text" id="nev" name="nev">
		<label for="email">Email:</label>
		<input type="email" id="email" name="email">
		<label for="password">Password:</label>
		<input type="password" id="password" name="password">
		
		<button type="submit" id="register">Register</button>
	</form>

</div>
</div>
<script>
	const sideNav = document.getElementById('sideNav');
	const hamburger = document.getElementById('hamburger');

	hamburger.addEventListener('click', () => {
		sideNav.classList.toggle('open');
	});

	document.addEventListener('click', (e) => {
		if (!sideNav.contains(e.target) && !hamburger.contains(e.target)) {
			sideNav.classList.remove('open');
		}
	});
	function showLoginModal() {
document.getElementById('loginModal').style.display = 'block';
}

function closeLoginModal() {
document.getElementById('loginModal').style.display = 'none';
}

function showRegisterModal() {
document.getElementById('registerModal').style.display = 'block';
}

function closeRegisterModal() {
document.getElementById('registerModal').style.display = 'none';
}
function showRegisterModal() {
closeLoginModal();
const registerModal = document.getElementById('registerModal');
registerModal.style.display = 'block';
}
// Close modals when clicking outside of them
window.onclick = function (event) {
if (event.target.classList.contains('modal')) {
	event.target.style.display = 'none';
}
}; </script>


 




<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.js"></script>
<script type="text/javascript" src="source/js/myscript.js"></script> <script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/bootstrap.js"></script>


<script type="text/javascript" src="source/js/myscript.js"></script>
<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.1.11.js"></script>
</body>
</html>





