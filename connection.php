<?php
// Database connection parameters
$host = 'localhost';      // Database host, typically 'localhost'
$dbname = 'krishimitra';   // Your database name
$user = 'root';            // Your database username
$pass = '';                // Your database password

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    
    // Set the PDO error mode to exception to handle errors properly
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Debug: If connection is successful
    // echo "Connected successfully"; 

} catch (PDOException $e) {
    // If connection fails, output the error message
    die("Connection failed: " . $e->getMessage());
}
?>
