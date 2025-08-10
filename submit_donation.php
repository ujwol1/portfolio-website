<?php
// Database connection details
$servername = "localhost";
$username = "root";  // default user in XAMPP
$password = "";      // default no password
$dbname = "donations_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get POST data safely
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$amount = floatval($_POST['amount']);
$message = $conn->real_escape_string($_POST['message']);

// Insert data
$sql = "INSERT INTO donations (name, email, amount, message) VALUES ('$name', '$email', $amount, '$message')";

if ($conn->query($sql) === TRUE) {
  echo "Thank you for your donation!";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
