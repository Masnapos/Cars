<?php

 if(isset($_POST['username']) && isset($_POST['password'])) {

 try {
 
 $dbh = new PDO('mysql:host=localhost;dbname=databaselesson', 'root', 
'',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

 $dbh->query('SET NAMES utf8 COLLATE utf8_general_ci');
 
 $sqlSelect = "select id, nev,  from users where user_name = :nev and 
 password = sha1(:password)";
 
  $sth = $dbh->prepare($sqlSelect);
 
  $sth->execute(array(':nev' => $_POST['nev'], ':password' => $_POST['password']));
 
  $row = $sth->fetch(PDO::FETCH_ASSOC);
 
  }
 
  catch (PDOException $e) {
  echo "Error: ".$e->getMessage();
  } 
  }
 ?>