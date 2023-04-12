<?php
// Replace with your own database connection details
$db_host = 'localhost';
$db_user = 'username';
$db_pass = 'password';
$db_name = 'database_name';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Logged in successfully!";
    // Redirect to your desired page or set session variables
} else {
    echo "Invalid credentials!";
}

$stmt->close();
$conn->close();
?>
