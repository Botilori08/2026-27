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
//kapcsolat lezárása*/




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

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";


$sql = "SELECT id, firstname, lastname, CONCAT(firstname,' ',lastname) AS fullname FROM MyGuests";

if ($conn->query($sql) === TRUE) {
  echo "Data loaded successfully<br>";
} else {
  echo "Error<br>" . $conn->error;
}

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
  var_dump($row);
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]." ".$row["fullname"]."<br>";
  }


$sql = "SELECT id, firstname, lastname, CONCAT(firstname,' ',lastname) AS fullname FROM MyGuests";

$result = $conn->query($sql);

while($row = $result->fetch_row()) {
  var_dump($row);
  }


$conn->close();




?>