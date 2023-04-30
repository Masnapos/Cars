<?php

 if(isset($_POST['nev']) && isset($_POST['password']) && isset($_POST['email']) ) {
 try {
 

 $dbh = new PDO('mysql:host=localhost;dbname=cars', 'root', '', 
array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
 $dbh->query('SET NAMES utf8 COLLATE utf8_general_ci');
 
 
 $sqlSelect = "select id from users where nev = :nev";

 $sth = $dbh->prepare($sqlSelect);

 $sth->execute(array(':nev' => $_POST['nev']));

 if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
 $message = "The username already exists!";
 
 $again = "true";
 }

 else {


 $sqlInsert = "insert into users(id, nev, email, password)
 values(0, :nev, :email,  :password)";
 $stmt = $dbh->prepare($sqlInsert); 

 $stmt->execute(array(':nev' => $_POST['nev'], ':email' => $_POST['email'],
  ':password' => sha1($_POST['password']))); 





 if($count = $stmt->rowCount()) {


 $newid = $dbh->lastInsertId();
 $message = "Your registration was successful.<br>ID: {$newid}"; 
 $again = false;
 }
 else {
 $message = "Your registration wasn't successful.";
 $again = true;
 
 }
 
 }  echo $message;
}
 catch (PDOException $e) {
 echo "Error: ".$e->getMessage();
 } 
 
 }
?>
