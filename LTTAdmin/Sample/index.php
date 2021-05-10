<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutorial";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT *FROM contents";
//$result = mysql_db_query($conn,$sql);

if ($result = $conn -> query($sql)) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - title: " . $row["title"]. "shot_desc :" . $row["short_desc"]."long_desc :" . $row["long_desc"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>