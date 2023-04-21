<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cars";
$FOLDER ='./img/';

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

    // Check if image file is an actual image or a fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
       
       
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $displacement = $_POST['displacement'];
        $p_date = $_POST['p_date'];
        $mileage = $_POST['mileage'];
        $price = $_POST['price'];
        $text = $_POST['text'];

        $image_data = file_get_contents($_FILES["image"]["tmp_name"]);

        // Prepare the SQL query
        $sql = "INSERT INTO cars (brand, model, displacement, p_date, mileage, text, price, image ) VALUES (?, ?, ?,?,?,?,?,?)";
       $filename = $_FILES["image"]["name"];
        $stmt = $conn->prepare($sql);
        $target_dir = $FOLDER.strtolower($filename);
        if (file_exists($target_dir))
        $messages[] = " Already exist: " . $file['name'];
    
    
        
       
    
            
        if ($stmt) {
            // Bind the parameters and execute the query
            $stmt->bind_param("ssiiisis", $brand, $model, $displacement, $p_date, $mileage, $text, $price, $image_data);
           
            if ($stmt->execute()) {
                echo "Image uploaded successfully.";
            } else {
                echo "Error uploading image: " . $stmt->error;
            }
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Fetch and display images
$sql = "SELECT * FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/>';
    }
} else {
    echo "No images found.";
}

// Close the database connection
$conn->close();
?>
