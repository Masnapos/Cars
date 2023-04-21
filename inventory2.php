<!DOCTYPE html>
<html>
  <head>
    <title>Inventory</title>
    <link rel="stylesheet" href="stylei.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <header>
      <div id="hamburger" class="hamburger" onclick="toggleSideNav()">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </header>

    <div class="side-nav" id="sideNav">
      <ul>
        <li><a href="cars.html">Home</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="upload.html">Upload images</a></li>
        <li><a href="#" onclick="showLoginModal()">Login</a></li>
      </ul>
    </div>
    <form onsubmit="event.preventDefault(); searchItems();">
      <label for="search">Search:</label>
      
      <input type="text" id="search" name="search">
      <label for="">Brand:</label>
      <input type="text" id="search" name="brand">
      <label for="model">Model:</label>
      <input type="text" id="search" name="model">
      <label for="model">Model:</label>
      <input type="text" id="search" name="model">
      <label for="model">Model:</label>
      <input type="text" id="search" name="model">

      <button type="submit">Go</button>
    </form>
    <?php
	try {
		// Connecting
		$pdo = new PDO('mysql:host=localhost;dbname=cars', 'root', '',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		$pdo->query('SET NAMES utf8 COLLATE utf8_general_ci');
		$statement = "Select brand, model, p_date, price, image From cars";
		$result = $pdo->query($statement);
	}
	catch (PDOException $e) {
		echo "Error: ".$e->getMessage();
	}      
?>

    <table>
      <thead>
        <tr>
          <th>Make</th>
          <th>Model</th>
          <th>Year</th>
          <th>Price</th>
          <th>Images</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $row)
print "<tr><td>" . $row['brand'] . "</td>" . " <td>" .$row['model'] . " </td>"."<td>" .$row['p_date'] ."</td>"." <td>" .$row['price'] ."</td></tr>";
        ?>
        <img src="$row['image']">
          
        <!-- Add more rows as needed -->
      </tbody>
    </table>

    <div id="loginModal" class="login-modal hidden">
      <div class="login-modal-content">
        <div class="login-register-container"> 
          <form id="loginForm">
            <h2>Login</h2>
            <label for="loginEmail">Email:</label>
            <input type="email" id="loginEmail" name="loginEmail" required>
            <label for="loginPassword">Password:</label>
            <input type="password" id="loginPassword" name="loginPassword" required>
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="#" onclick="showRegisterForm()">Register</a></p>
          </form>
          <form id="registerForm" style="display:none;">
            <h2>Register</h2>
            <label for="registerEmail">Email:</label>
            <input type="email" id="registerEmail" name="registerEmail" required>
            <label for="registerPassword">Password:</label>
            <input type="password" id="registerPassword" name="registerPassword" required>
            <button type="submit">Register</button>
            <p>Already have an account? <a href="#" onclick="showLoginForm()">Login</a></p>
          </form>
        </div>
        <span class="close" id="loginModalClose" onclick="closeLoginModal()">&times;</span>
      </div>
    </div>
       <!-- The Modal -->
       <div id="myModal" class="modal">
        <!-- The Close Button -->
        <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="modalImage">
        <!-- Modal Caption (Image Text) -->
        <div id="caption"></div>
        <button class="prev" onclick="changeImage(-1)">&#10094;</button>
        <button class="next" onclick="changeImage(1)">&#10095;</button>
      </div>
    <script>
    function toggleSideNav() {
    const sideNav = document.getElementById("sideNav");
    if (sideNav.style.width === "250px") {
      sideNav.style.width = "0";
    } else {
      sideNav.style.width = "250px";
    }
  }

  document.addEventListener('click', function (event) {
    const sideNav = document.getElementById("sideNav");
    const hamburger = document.getElementById("hamburger");

    if (!sideNav.contains(event.target) && !hamburger.contains(event.target) && sideNav.style.width === "250px") {
      sideNav.style.width = "0";
    }
  });

  document.addEventListener("click", function (event) {
    const loginModal = document.getElementById("loginModal");
    const loginModalContent = document.querySelector(".login-modal-content");
    const loginModalClose = document.getElementById("loginModalClose");

    if (
      event.target === loginModal &&
      !loginModalContent.contains(event.target) &&
      !loginModalClose.contains(event.target)
    ) {
      closeLoginModal();
    }
  });

  function showLoginModal() {
  const loginModal = document.getElementById("loginModal");
  const loginForm = document.getElementById("loginForm");
  const registerForm = document.getElementById("registerForm");

  loginForm.style.display = "block";
  registerForm.style.display = "none";
  loginModal.style.display = "block";
}

function closeLoginModal() {
  const loginModal = document.getElementById("loginModal");
  loginModal.style.display = "none";
}

  function showLoginForm() {
    document.getElementById("loginForm").style.display = "block";
    document.getElementById("registerForm").style.display = "none";
  }

  function showRegisterForm() {
    document.getElementById("loginForm").style.display = "none";
    document.getElementById("registerForm").style.display = "block";
  }
  

      function searchItems() {
  const input = document.getElementById("search");
  const filter = input.value.toUpperCase();
  const table = document.getElementsByTagName("table")[0];
  const tr = table.getElementsByTagName("tr");

  for (let i = 1; i < tr.length; i++) {
    let shouldDisplay = false;
    const tds = tr[i].getElementsByTagName("td");
    for (let j = 0; j < tds.length; j++) {
      const td = tds[j];
      if (td) {
        const txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          shouldDisplay = true;
          break;
        }
      }
    }
    tr[i].style.display = shouldDisplay ? "" : "none";
  }
}
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("myModal");
  const modalImage = document.getElementById("modalImage");
  const closeBtn = document.getElementsByClassName("close")[0];
  let currentIndex = 0;
  let images = [];

  closeBtn.onclick = function () {
    modal.style.display = "none";
  };

  window.onclick = function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };

  const viewImageLinks = document.querySelectorAll("a[data-images]");
  viewImageLinks.forEach((link) => {
    link.addEventListener("click", function (event) {
      event.preventDefault();
      images = this.getAttribute("data-images").split(",");
      currentIndex = 0;
      modalImage.src = images[currentIndex];
      modal.style.display = "block";
    });
  });

  window.changeImage = function (direction) {
    currentIndex += direction;
    if (currentIndex < 0) {
      currentIndex = images.length - 1;
    } else if (currentIndex >= images.length) {
      currentIndex = 0;
    }
    modalImage.src = images[currentIndex];
  };
});


    </script>
  </body>
</html>


