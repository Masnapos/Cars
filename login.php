<?php
session_start();

// Replace with your own database connection details
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'cars';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    // Login logic
    $username = $_POST['nev'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE nev = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Redirect to your desired page or set session variables
        header("Location: your_desired_page.php");
    } else {
        $_SESSION["login_error"] = "Invalid credentials!";
        header("Location: index.php");
    }

} elseif (isset($_POST['register'])) {
    // Registration logic
    $username = $_POST['nev'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (nev, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $username, $email, $password);

    if ($stmt->execute()) {
        // Redirect to your desired page or set session variables
        header("Location: your_desired_page.php");
    } else {
        $_SESSION["register_error"] = "Registration failed!";
        header("Location: index.php");
    }
}


$conn->close();
?>
