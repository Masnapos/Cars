<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Used Cars</title>
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
				<li>Give us a call : +36701234567 </li>
			</ul>
			<ul class="logreg">
			<?php if (isset($_SESSION['username'])): ?>
    		<li><a href="#" class="logged-in">Logged in as <?php echo $_SESSION['username']; ?></a></li>
    		<li><a href="logout.php" class="logout">Logout</a></li>
  		<?php else: ?>
    		<li><a href="#" onclick="showLoginModal()">Login</a></li>
    		<li><a href="#" onclick="showRegisterModal()">Register</a></li>
  		<?php endif; ?>
			</ul>
	</div>
	<!-- Navbar Up -->
	</li>
			</ul>
			<ul class="logreg">
  		<?php if (isset($_SESSION['username'])): ?>
    		<li><a href="#" class="logged-in">Logged in as <?php echo $_SESSION['username']; ?></a></li>
    		<li><a href="logout.php" class="logout">Logout</a></li>
  		<?php else: ?>
    		<li><a href="#" onclick="showLoginModal()">Login</a></li>
    		<li><a href="#" onclick="showRegisterModal()">Register</a></li>
  		<?php endif; ?>
	</ul>
	</div>
	<div class="collapse navbar-collapse" id="upmenu">
    <?php
    $string = file_get_contents("menu.json");
    $config = json_decode($string, true);
    ?>

    <ul class="nav navbar-nav" id="navbarontop">
        <?php foreach($config['menu'] as $menuItem): ?>
            <?php if(isset($menuItem['submenu'])): ?>
                <li class="dropdown">
                    <a href="index.php?page=<?php echo $menuItem['link']; ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo $menuItem['name']; ?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdowncostume">
                        <?php foreach($menuItem['submenu'] as $submenuItem): ?>
                            <li><a href="index.php?page=<?php echo $submenuItem['link']; ?>"><?php echo $submenuItem['name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php else: ?>
                <li>
                    <?php if(isset($menuItem['button']) && $menuItem['button']): ?>
                        <a id="<?php echo $menuItem['id']; ?>" href="index.php?page=<?php echo $menuItem['link']; ?>">
                            <span class="postnewcar"><button><?php echo $menuItem['name']; ?></button></span>
                        </a>
                    <?php else: ?>
                        <a href="index.php?page=<?php echo $menuItem['link']; ?>"><?php echo $menuItem['name']; ?></a>
                    <?php endif; ?>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
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
	<div class="contact">
		<div class="newslettercontent">
			<div class="leftside">
				<img id="image_border" src="image/border.png" alt="border">
					<div class="contact-form">
						<h1>Contact Us</h1>
						<form method="post" action="email.php">
							<div class="form-group group-coustume">
								<input type="text" class="form-control name-form" placeholder="Name" name="name">
								<input type="email" class="form-control email-form" placeholder="E-mail" name="email">
								<input type="text" class="form-control subject-form" placeholder="Subject" name="subject">
								<textarea rows="4" cols="50" class="message-form" name="text"></textarea>
								
							
								<button type="submit" class="btn btn-default btn-submit" name="submit"  >Submit</button>
							</div>
							</form>
					</div>
			</div>
			<div class="google-maps">
			 <div id="googleMap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2726.3375300228404!2d19.666564676824606!3d46.89607993677126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da7a6c479e1d%3A0xc8292b3f6dc69e7f!2sNeumann%20J%C3%A1nos%20Egyetem%20GAMF%20M%C5%B1szaki%20%C3%A9s%20Informatikai%20Kar!5e0!3m2!1shu!2shu!4v1682872825703!5m2!1shu!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>

			</div>
		</div>

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
};  
function checkUserLoggedIn() {
    <?php if (isset($_SESSION['username'])): ?>
      window.location.href = 'upload.php';
    <?php else: ?>
      document.getElementById('customAlert').style.display = 'block';
    <?php endif; ?>
  }

  
  function showCustomAlert() {
  document.getElementById('customAlert').style.display = 'block';
}

function closeCustomAlert() {
  document.getElementById('customAlert').style.display = 'none';
}

function checkUserLoggedIn(event) {
  if (!<?php echo isset($_SESSION['username']) ? 'true' : 'false' ?>) {
    event.preventDefault();
    showCustomAlert();
  }
}</script>


 




<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.js"></script>
<script type="text/javascript" src="source/js/myscript.js"></script> <script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/bootstrap.js"></script>

<script>
	$(window).resize(function(){
		var new_height = $("#image_border").height();
		console.log(new_height);
		$("#googleMap").height(new_height);
	});

	$(window).load(function(){
		var new_height = $("#image_border").height();
		console.log(new_height);
		$("#googleMap").height(new_height);
		google.maps.event.addDomListener(window, 'load', initialize());
	});
	

</script>
	

<script type="text/javascript" src="source/js/myscript.js"></script>
<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.1.11.js"></script>
</body>
</html>