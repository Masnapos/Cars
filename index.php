<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Scarica gratis GARAGE Template html/css - Web Domus Italia - Web Agency </title>
	<meta name="description" content="Scarica gratis il nostro Template HTML/CSS GARAGE. Se avete bisogno di un design per il vostro sito web GARAGE può fare per voi. Web Domus Italia">
	<meta name="author" content="Web Domus Italia">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="slider.css">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<!-- Header -->
<div class="allcontain">
	<div class="header">
			<ul class="socialicon">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
			</ul>
			<ul class="givusacall">
				<li>Give us a call : +66666666 </li>
			</ul>
			<ul class="logreg">
				<li><a href="#">Login </a> </li>
				<li><a href="#"><span class="register">Register</span></a></li>
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
				<li class="active"><a href="#">HOME</a> </li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle"	data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CATEGORIES <span class="caret"></span></a>
					<ul class="dropdown-menu dropdowncostume">
						<li><a href="#">Sport</a></li>
						<li><a href="#">Old</a></li>
						<li><a href="#">New</a></li>
					</ul>
				</li>
				<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DEALERS <span class="caret"></span></a>
						<ul class="dropdown-menu dropdowncostume">
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="3">3</a></li>
						</ul>
				</li>
				<li>
					<a href="contact.html">CONTACT</a>
 
				</li>
				<button><span class="postnewcar">POST NEW CAR</span></button>
			</ul>
		</div>
	</nav>
</div>
<!--_______________________________________ Carousel__________________________________ -->

<?php
    try {

	$pdo = new PDO('mysql:host=localhost;dbname=cars', 'root', 
  '',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
  $pdo->query('SET NAMES utf8 COLLATE utf8_general_ci');
  $statement = "Select brand, model, p_date, price, image From cars";
  $result = $pdo->query($statement);
  }
  catch (PDOException $e) {
  echo "Error: ".$e->getMessage();
  } 
  ?>
  
<?php
		// Establish database connection
		$conn = mysqli_connect("localhost", "root", "", "cars");

		// Check if submit button is clicked
		if (isset($_POST['submit1'])) {
			// Retrieve search values
			$search1 = $_POST['brand'];
			$search2 = $_POST['model'];
			$search3 = $_POST['p_date'];
      $search4 = $_POST['min_price'];
      $search5 = $_POST['max_price'];

			// Build SQL query
			//$sql = "SELECT brand, model, p_date, price, image FROM cars WHERE brand LIKE '%$search1%' AND model LIKE '%$search2%' and p_date Like '%$search3%' ";

			// Execute SQL query
			$result1 = mysqli_query($conn, $statement);

			// Check if any results are returned
		}?>
<div class="allcontain">
	<div id="carousel-up" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner " role="listbox">
			<div class="item active">
				<img src="image/oldcar.jpg" alt="oldcar">
				<div class="carousel-caption">
					<h2>Porsche 356</h2>
					<p>Lorem ipsum dolor sit amet, consectetur ,<br>
						sed do eiusmod tempor incididunt ut labore </p>
				</div>
			</div>
			<div class="item">
				<img src="image/porche.jpg" alt="porche">
				<div class="carousel-caption">
					<h2>Porche</h2>
						<p>Lorem ipsum dolor sit amet, consectetur ,<br>
						sed do eiusmod tempor incididunt ut labore </p>
				</div>
			</div>
			<div class="item">
				<img src="image/benz.jpg" alt="benz">
				<div class="carousel-caption">
					<h2>Car</h2>
					<p>Lorem ipsum dolor sit amet, consectetur ,<br>
						sed do eiusmod tempor incididunt ut labore </p>
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
				<form class="navbar-form navbar-left searchformmargin" role="search">
					<div class="form-group">
						<input type="text" class="form-control searchform" placeholder="Enter Keyword">
					</div>
				</form>
				<ul class="nav navbar-nav navbarborder">
					<li class="li-category">
						<a class="btn  dropdown-toggle btn-costume"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Category<span class="glyphicon glyphicon-chevron-down downicon"></span></a>
						<ul class="dropdown-menu" id="mydd">
							<li><a href="#">Epic</a></li>
							<li><a href="#">Old</a></li>
							<li><a href="#">New</a></li>
						</ul>
					</li>
					<li class="li-minyear"><a class="btn  dropdown-toggle btn-costume"  id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Min Year <span class="glyphicon glyphicon-chevron-down downicon"></span></a>
						<ul class="dropdown-menu" id="mydd2">
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
						</ul>
					</li>
					<li class="li-maxyear"><a class="btn dropdown-toggle btn-costume"  id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Max Year <span class="glyphicon glyphicon-chevron-down downicon"></span></a>
						<ul class="dropdown-menu" id="mydd3">
							<li><a href="#">1900</a></li>
							<li><a href="#">2000</a></li>
							<li><a href="#">2016</a></li>
						</ul>
					</li>
					<li class="li-slideprice">
						<p> <label class="slidertxt" for="amount">Price </label>
							<input class="priceslider" type="text" id="amount" readonly="readonly">
						</p>
							<div id="slider-range"></div>
							
					</li>
					<li class="li-search"> <button class="searchbutton"><span class="glyphicon glyphicon-search "></span></button></li>
				</ul>
 
			</div>
		</nav>
	</div>
</div>
<!-- ____________________Featured Section ______________________________--> 
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
							<h1>LOREM IPSUM</h1>
							<p>"Lorem ipsum dolor sit amet, consectetur ,<br>
			 						sed do eiusmod tempor incididunt </p>
			 				<h2>Price &euro;</h2>
			 				<button id="btnRM" onclick="rmtxt()">READ MORE</button>
			 				<div id="readmore">
			 						<h1>Car Name</h1>
			 						<p>"Lorem ipsum dolor sit amet, consectetur ,<br>
			 						sed do eiusmod tempor incididunt <br>"Lorem ipsum dolor sit amet, consectetur ,<br>
			 						sed do eiusmod tempor incididunt"Lorem ipsum dolor sit amet, consectetur1 ,
			 						sed do eiusmod tempor incididunt"Lorem ipsum dolor sit amet, consectetur1
			 						sed do eiusmod tempor incididunt"Lorem ipsum dolor sit amet, consectetur1<br>
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
							<h1>LOREM IPSUM</h1>
							<p>"Lorem ipsum dolor sit amet, consectetur ,<br>
			 						sed do eiusmod tempor incididunt </p>
			 				<h2>Price &euro;</h2>
			 				<button id="btnRM2">READ MORE</button>
			 				<div id="readmore2">
			 						<h1>Car Name</h1>
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
	<?php 
	$result1 = mysqli_query($conn, $statement);
	foreach ($result1 as $row1)
	{ print "<div class='grid'>";
		print "<div class='row'>";
			print "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3'>";
				print "<div class='txthover'>";
					print "<img src='img/$row1[image]' alt='car1'>";
					print "	<div class='txtcontent'>";
							print "<div class='stars'>";
								print "<div class='glyphicon glyphicon-star'></div>";
								 print "<div class='glyphicon glyphicon-star'></div>";
								 print "<div class='glyphicon glyphicon-star'></div>";
							print "</div>";
							print "<div class='simpletxt'>";
								print "<h3 class='name'>".$row1['brand']."</h3>";
								print "<p>'Lorem ipsum dolor sit amet, consectetur,<br>
	 							sed do eiusmod tempor incididunt' </p>";
	 							print "<h4 class='price'>".$row1['brand']."</h4>";
	 							print "<button>READ MORE</button><br>";
	 							print "<div class='wishtxt'>";
		 							print "<p class='paragraph1'> Add to Wishlist <span class='glyphicon glyphicon-heart'></span> </p>";
		 							print "<p class='paragraph2'>Compare <span class='icon'><img src='image/compicon.png' alt='compicon'></span></p>
		 						</div>
							</div>";
							print "<div class='stars2'>";
								print "<div class='glyphicon glyphicon-star'></div>";
								print "<div class='glyphicon glyphicon-star'></div>";
								print "<div class='glyphicon glyphicon-star'></div>
							</div>
						</div>
				</div>	 
			</div>";}
			?>
			
			
			
			
			
			
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<div class="txthover">
					<img src="image/car8.jpg" alt="car8">
						<div class="txtcontent">
							<div class="stars">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
							<div class="simpletxt">
								<h3 class="name">Meclaren</h3>
								<p>"Lorem ipsum dolor sit amet, consectetur,<br>
	 							sed do eiusmod tempor incididunt" </p>
	 							<h4 class="price">2500 &euro;</h4>
	 							<button>READ MORE</button><br>
	 							<div class="wishtxt">
		 							<p class="paragraph1"> Add to Wishlist <span class="glyphicon glyphicon-heart"></span> </p>
		 							<p class="paragraph2">Compare <span class="icon"><img src="image/compicon.png" alt="compicon"></span></p>
		 						</div>
							</div>
							<div class="stars2">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
						</div>
				</div>	 
			</div>	
		</div>
	</div>
<!-- _______________________________News Letter ____________________-->
	<div class="newslettercontent">
		<div class="leftside">
			<img src="image/border.png" alt="border">
			<h1>NEWSLETTER</h1>
			<p>Subscribe to the COLLECTIONCARS mailing list to <br>
				receive updates on new arrivals, special offers <br>
				and other discount information.</p>
		</div>
		<div class="rightside">
			<img class="newsimage" src="image/newsletter.jpg" alt="newsletter">
			<input type="text" class="form-control" id="subemail" placeholder="EMAIL">
			<button>SUBSCRIBE</button>
		</div>
	</div>
	<!-- ______________________________________________________Bottom Menu ______________________________-->
	<div class="bottommenu">
		<div class="bottomlogo">
		<span class="dotlogo">&bullet;</span><img src="image/collectionlogo1.png" alt="logo1"><span class="dotlogo">&bullet;;</span>
		</div>
		<ul class="nav nav-tabs bottomlinks">
			<li role="presentation" ><a href="#/" role="button">ABOUT US</a></li>
			<li role="presentation"><a href="#/">CATEGORIES</a></li>
			<li role="presentation"><a href="#/">PREORDERS</a></li>
			<li role="presentation"><a href="#/">CONTACT US</a></li>
			<li role="presentation"><a href="#/">RECEIVE OUR NEWSLETTER</a></li>
		</ul>
		<p>"Lorem ipsum dolor sit amet, consectetur,  sed do eiusmod tempor incididunt <br>
			eiusmod tempor incididunt </p>
		 <img src="image/line.png" alt="line"> <br>
		 <div class="bottomsocial">
		 	<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-google-plus"></i></a>
			<a href="#"><i class="fa fa-pinterest"></i></a>
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

<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.js"></script>
<script type="text/javascript" src="source/js/isotope.js"></script>
<script type="text/javascript" src="source/js/myscript.js"></script> 
<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.1.11.js"></script>
<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
</body>
</html>