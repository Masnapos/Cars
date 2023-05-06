<!DOCTYPE html>
<html>
<head>
    <title>Image Upload Form</title>
    <link rel="stylesheet" href="upload.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div id="hamburger" class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="side-nav" id="sideNav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="upload.html">Upload images</a></li>
                <li><a href="#" onclick="showLoginModal()">Login</a></li>
            </ul>
        </div>
    </header>
    <main>
        <form action="upload2.php" method="post" enctype="multipart/form-data">
            <label for="brand">Brand: </label>
            <input type="text" name="brand" id="brand"><br>
            <label for="model">Model: </label>
            <input type="text" name="model" id="model"><br>
            <label for="displacement">Displacement: </label>
            <input type="text" name="displacement" id="displacement"><br>
            <label for="p_date">Production date: </label>
            <input type="text" name="p_date" id="p_date"><br>
            <label for="mileage">Mileage: </label>
            <input type="text" name="mileage" id="mileage"><br>
            <label for="price">Price: </label>
            <input type="text" name="price" id="price"><br>
            <label for="text">More: </label>
            <textarea name="text" id="text" rows="10" cols="30"></textarea>
            <label for="image">Choose Image:</label>
            <input type="file" name="image" id="image"><br><br>
            <input type="submit" name="Upload">
        </form>
        

        <hr>
        

        <h1>Gallery</h1>

       
          
    </main>

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
}; document.getElementById('postNewCarLink').addEventListener('click', function (event) {
  if (!<?php echo isset($_SESSION['username']) ? 'true' : 'false' ?>) {
    event.preventDefault();
    showLoginModal();
  }
});
</script>
  
		
	</script>
</body>
</html>

