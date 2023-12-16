<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // 모든 열의 데이터 출력
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. $row["firstname"] . "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>