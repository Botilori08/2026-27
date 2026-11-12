<?php

//objektum-orientált
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proba2026";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

var_dump($conn);
//kapcsolat lezárása
$conn->close();



//Procedural
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proba2026";

// Create connection
$conn2 = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn2) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "<br>Connected successfully<br>";
var_dump($conn2);

mysqli_close($conn2);



echo "<br>";
//PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proba2026";

try {
  $conn3 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
$conn3 = null;


//unsigned -> nem negatív

$tabla = "CREATE TABLE MyGuests(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

)"





?>