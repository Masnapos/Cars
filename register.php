<?php
session_start();

if (isset($_POST['nev']) && isset($_POST['password']) && isset($_POST['email'])) {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=cars', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_general_ci');

        $sqlSelect = "SELECT id FROM users WHERE nev = :nev";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':nev' => $_POST['nev']));

        if ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['register_error'] = "The username already exists!";
            header("Location: index.php");
        } else {
            $sqlInsert = "INSERT INTO users(id, nev, email, password) VALUES (0, :nev, :email, :password)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(':nev' => $_POST['nev'], ':email' => $_POST['email'], ':password' => sha1($_POST['password'])));

            if ($count = $stmt->rowCount()) {
                $_SESSION['register_success'] = "Your registration was successful!";
                header("Location: index.php");
            } else {
                $_SESSION['register_error'] = "Registration failed. Please try again.";
                header("Location: index.php");
            }
        }
    } catch (PDOException $e) {
        $_SESSION['register_error'] = "Registration failed due to an error: " . $e->getMessage();
        header("Location: index.php");
    }
}
