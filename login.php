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
    $password = sha1($_POST['password']);

    $sql = "SELECT * FROM users WHERE nev = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Store username in session
        $_SESSION['username'] = $username;
        
        header("Location: index.php");
    } else {
        $_SESSION["login_error"] = "Invalid credentials!";
        header("Location: index.php");
    }
}

$conn->close();
?>
