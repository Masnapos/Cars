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


       
       
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $displacement = $_POST['displacement'];
        $p_date = $_POST['p_date'];
        $mileage = $_POST['mileage'];
        $price = $_POST['price'];
        $text = $_POST['text'];

      
        $TYPES = array ('.jpg', '.png');
        $MEDIATYPES = array('image/jpeg', 'image/png');
        $DATEFORMAT = "m/d/Y H:i";
        $MAXSIZE = 500*1024;
        $messages = array();   
    
        // Form checkings:
        if (isset($_POST['Upload'])) {
            //print_r($_FILES);
            foreach($_FILES as $file) {
                if ($file['error'] == 4);   // There was no file uploaded
                elseif (!in_array($file['type'], $MEDIATYPES))
                    $messages[] = " The type is not correct: " . $file['name'];
                elseif ($file['error'] == 1   // The file size exceeds the limit allowed in php.ini
                            or $file['error'] == 2   // The file size exceeds the limit allowed in HTML Form
                            or $file['size'] > $MAXSIZE) 
                    $messages[] = " Too big file: " . $file['name'];
                else {
                    $target_dir = $FOLDER.strtolower($file['name']);
                    if (file_exists($target_dir))
                        $messages[] = " Already exist: " . $file['name'];
                    else {
                        move_uploaded_file($file['tmp_name'], $target_dir);
                        
                        $messages[] = ' Ok: ' . $file['name'];
                        $sql = "INSERT INTO cars (brand, model, displacement, p_date, mileage, text, price, image ) VALUES (?, ?, ?,?,?,?,?,?)";
                                $stmt = $conn->prepare($sql);
                            if ($stmt) {
                                // Bind the parameters and execute the query
                                $stmt->bind_param("ssiiisis", $brand, $model, $displacement, $p_date, $mileage, $text, $price, $file['name']);
                            
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
            }        
        }

       
        
       
    
    
        
       
    


// Fetch and display images
$sql = "SELECT * FROM images";
$result = $conn->query($sql);

/*if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/>';
    }
} else {
    echo "No images found.";
}*/

// Close the database connection
$conn->close();
?>
