<?php
session_start();

$allowed_pages = ['dealer1.html', 'canvas.html',"svg.html", 'geo.html',"dada.html","cooki.php","mail.php","ss.html","ww.html","sse.html","contact.php","upload.php"]; 

if (isset($_GET['page']) && in_array($_GET['page'], $allowed_pages)) {
    $file = 'pages/'.$_GET['page'];
    if (file_exists($file)) {
        include($file);
        exit;
    } else {
        echo "The file does not exist.";
    }
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
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

	
	
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
				<li>Give us a call : +36701234567
				<?php
if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
}
?>
<?php if (isset($_SESSION['login_error'])): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['login_error']; ?>
    </div>
    <?php unset($_SESSION['login_error']); ?>
<?php endif; ?>
<?php if (isset($_SESSION['register_error'])): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['register_error']; ?>
    </div>
    <?php unset($_SESSION['register_error']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['register_success'])): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['register_success']; ?>
    </div>
    <?php unset($_SESSION['register_success']); ?>
<?php endif; ?>

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
					<h2>Porsche</h2>
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
		<nav class="navbar navbar-default midle-nav">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed textcostume" data-toggle="collapse" data-target="#navbarmidle" aria-expanded="false">
						<h1>SEARCH TEXT</h1>
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbarmidle">
				<div class="searchtxt">
					<h1>SEARCH TEXT</h1>
				</div>
				<form class="navbar-form navbar-left searchformmargin"  action="#" method="post" >
					<div class="form-group">
						<input type="text" class="form-control searchform" placeholder="Brand" id="brand" name="brand" default="*">
					</div>
					<div class="form-group">
						<input type="text" class="form-control searchform" placeholder="Model" id="model"  name="model" default="*">
					</div>
					<div class="form-group">
						<input type="text" class="form-control searchform" placeholder="Production date" id="p_date" name="p_date" default="*">
					</div>
					<div class="form-group">
						<input type="text" class="form-control searchform" placeholder="Maximum price" id="max_price"  name="max_price" default="*">
					</div>
					<button type="submit1" id="submit1" name="submit1" class="searchbutton"><span class="glyphicon glyphicon-search "></span></button>


				</form>
				
 
			</div>
		</nav>
	</div>
</div>
<!-- ____________________Featured Section ______________________________--> 

<?php
    try {

	$pdo = new PDO('mysql:host=localhost;dbname=cars', 'cars', 
  'usedcarssql1234',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
  $pdo->query('SET NAMES utf8 COLLATE utf8_general_ci');
  $statement = "Select brand, model, p_date, price, text, image From cars";
  $result = $pdo->query($statement);
  }
  catch (PDOException $e) {
  echo "Error: ".$e->getMessage();
  } 
  ?>
  
<?php
		// Establish database connection
		$conn = mysqli_connect("localhost", "root", "", "cars");
$sql = "SELECT id, brand, model, p_date, price, image FROM cars";
		// Check if submit button is clicked
		if (isset($_POST['submit1'])) {
			// Retrieve search values
			$search1 = $_POST['brand'];
			$search2 = $_POST['model'];
			$search3 = $_POST['p_date'];
     
      

			// Build SQL query
			if (empty($_POST['max_price'])) {
				$sql = "SELECT id,   brand, model, p_date, price, image FROM cars WHERE brand LIKE '%$search1%' and model like '%$search2%' and p_date like '%$search3%' ";
			}
			else {
				$search5 = $_POST['max_price'];
				$sql = "SELECT id, brand, model, p_date, price, image FROM cars WHERE brand LIKE '%$search1%' and model like '%$search2%' and p_date like '%$search3%' and price < '$search5'";
			
				}
			// Execute SQL query
			

			// Check if any results are returned
		}?>
<div class="allcontain">
	<div class="feturedsection">
		<h1 class="text-center"><span class="bdots">&bullet;</span>F E A T U R E S<span class="carstxt">C A R S</span>&bullet;</h1>
	</div>
	<div class="feturedimage">
		<div class="row firstrow">
			<div class="col-lg-6 costumcol colborder1">
				<div class="row costumrow">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 img1colon">
						<img src="image/featurporch.jpg" alt="porsche">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 txt1colon ">
						<div class="featurecontant">
							<h1>Porsche</h1>
							<p>A great classic car with beauty and power<br>
						 like the new generations of cars</p>
			 				<h2>Price: 8000 &euro;</h2>
			 				<button id="btnRM" onclick="rmtxt()">READ MORE</button>
			 				<div id="readmore">
			 						<h1>Porsche</h1>
			 						<p>"A great classic car with beauty and power
						 like the new generations of cars ,<br>
			 						Anything, Something<br>
			 						</p>
			 						<button id="btnRL">READ LESS</button>
			 				</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 costumcol colborder2">
				<div class="row costumrow">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 img2colon">
						<img src="image/featurporch1.jpg" alt="porsche1">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 txt1colon ">
						<div class="featurecontant">
							<h1>Porsche</h1>
							<p>A great classic car with beauty and power<br>
						 like the new generations of cars</p>
			 				<h2>Price: 9000 &euro;</h2>
			 				<button id="btnRM2">READ MORE</button>
			 				<div id="readmore2">
			 						<h1>Porsche</h1>
			 						<p>"Lorem ipsum dolor sit amet, consectetur ,<br>
			 						sed do eiusmod tempor incididunt <br>"Lorem ipsum dolor sit amet, consectetur ,<br>
			 						sed do eiusmod tempor incididunt"Lorem ipsum dolor sit amet, consectetur1 ,
			 						sed do eiusmod tempor incididunt"Lorem ipsum dolor sit amet, consectetur1
			 						sed do eiusmod tempor incididunt"Lorem ipsum dolor sit amet, consectetur1<br></p>
			 						<button id="btnRL2">READ LESS</button>
			 				</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- ________________________LATEST CARS SECTION _______________________-->
<div class="latestcars">
	<h1 class="text-center">&bullet; LATEST   CARS &bullet;</h1>
	<ul class="nav nav-tabs navbar-left latest-navleft">
		<li role="presentation" class="li-sortby"><span class="sortby">SORT BY: </span></li>
		<li data-filter=".RECENT" role="presentation"><a href="#mostrecent" class="prcBtnR">MOST RECENT </a></li>
		<li data-filter=".POPULAR" role="presentation"><a href="#mostpopular" class="prcBtnR">MOST POPULAR </a></li>
		<li  role="presentation"><a href="#" class="alphSort">ALPHABETICAL </a></li>
		<li data-filter=".HPRICE" role="presentation"><a href="#" class="prcBtnH">HIGHEST PRICE </a></li>
		<li data-filter=".LPRICE" role="presentation"><a href="#" class="prcBtnL">LOWEST  PRICE </a></li>
		<li id="hideonmobile">
	</ul>
</div>
<br>
<br>
<!-- ________________________Latest Cars Image Thumbnail________________-->
	<div class='grid'>
<div class='row'>
			<?php 
	$result1 = mysqli_query($conn, $sql);
	 
	foreach ($result1 as $row1){
	
		 $varid = $row1['id'];
			print "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3'>";
				print "<div class='txthover'>";
					print "<img src='img/$row1[image]' alt='car1'>";
					print "	<div class='txtcontent'>";
							
							print "<div class='simpletxt'>";
								print "<h3 class='name'>".$row1['brand']."</h3>";
								print "<p>".$row1['model']. " </p>";
	 							print "<h4 class='price'>".$row1['price'].' $'."</h4>";
								print "<form method='get' action='adv.php'>";
								print "<input type='hidden' name='varname' value=$varid>";
	 							print "<button type='submit'>READ MORE</button><br>";
	 							print "</form>";
							print "</div>";
							
							
						
				print "</div>";	 
	print "</div>";print"</div>";


	
}?>
			
			
			
			
			
			
			</div>
			

	</div>
<!-- _______________________________News Letter ____________________-->
	
	<!-- ______________________________________________________Bottom Menu ______________________________-->
	<br>
	<div class="bottommenu">
		<div class="bottomlogo">
		<span class="dotlogo">&bullet;</span><img src="image/collectionlogo1.png" alt="logo1"><span class="dotlogo">&bullet;;</span>
		</div>
		<ul class="nav nav-tabs bottomlinks">
			<li class="ab" role="presentation" ><a href="#" onclick="showRegisterModal()">REGISTER</a></li>
			
			<li role="presentation"><a href="pages/upload.php" id="postNewCarLink">POST NEW CAR</a></li>
			<li role="presentation"><a href="#" onclick="showLoginModal()">LOGIN</a></li>
			<li role="presentation"><a href="contact.php">CONTACT US</a></li>
			
			
		</ul>
		
		<p>We have the best used cars on the market! </p>
		 <img src="image/line.png" alt="line"> <br>
		 <div class="bottomsocial">
		 	<a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
			<a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-google-plus"></i></a>
			<a href="https://hu.pinterest.com/"><i class="fa fa-pinterest"></i></a>
			<div id="loginAlert" class="custom-alert">


		</div>
			<div class="footer">
				<div class="copyright">
				  &copy; Copy right 2016 | <a href="#">Privacy </a>| <a href="#">Policy</a>
				</div>
				<div class="atisda">
					 Designed by <a href="http://www.webdomus.net/">Web Domus Italia - Web Agency </a> 
				</div>
			</div>
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
	
<!-- Custom Alert -->
<div id="customAlert" class="modal" style="display:none;">
  <div class="modal-content">
    <span class="close" onclick="closeCustomAlert()">&times;</span>
    <h2>Please log in to post a new car</h2>
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
      window.location.href = 'pages/upload.php';
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
}

window.onclick = function (event) {
  if (event.target.classList.contains('modal')) {
    event.target.style.display = 'none';
  }
};



  </script>
<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.js"></script>
<script type="text/javascript" src="source/js/isotope.js"></script>
<script type="text/javascript" src="source/js/myscript.js"></script> 
<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.1.11.js"></script>
<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
</body>
</html>