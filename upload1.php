<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "image_upload";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $image = $_FILES["image"];

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($image["name"]);

  if (move_uploaded_file($image["tmp_name"], $target_file)) {
    $sql = "INSERT INTO images (image_name, image_path) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $image["name"], $target_file);
    $stmt->execute();
    $stmt->close();
    header("Location: upload.html");
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

$conn->close();
?>
