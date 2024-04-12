<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DFS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the "tour" table
$sql = "SELECT * FROM dfs_trucks";
$result = $conn->query($sql);

// Display the data in a table
if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Name</th><th>Prices per Mile </th><th>Starting point</th><th>Destination</th><th>Image</th></tr>";
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["Pricespermile"]. "</td><td>" . $row["Startingpoint"]. "</td><td>" . $row["Destination"]. "</td><td>" . $row["image"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

// Close the connection
$conn->close();
?>