<?php
// establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cars";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // get search bar inputs
  $search1 = $_POST["brand"];
  $search2 = $_POST["model"];
  $search3 = $_POST["p_date"];
  $search4 = $_POST["min_price"];
  $search5 = $_POST["max_price"];

  // build SQL query
  $sql = "SELECT brand, model, p_date, price, image FROM cars WHERE brand LIKE '%$search1%' AND model LIKE '%$search2%' and p_date like '%$search3%'";

  // execute query and get results
  $result = $conn->query($sql);

  // display results in a table
  echo "<table>";
  while($row = $result->fetch_assoc()) {
    print "<tr><td>" . $row['brand'] . "</td>" . " <td>" .$row['model'] . " </td>"."<td>" .$row['p_date'] ."</td>"." <td>" .$row['price'] ."</td>"."<td>".  print "<img src='img/$row[image]' style='width:10%'>"; "</td></tr>";
  }
  echo "</table>";    
}
?>