<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=hard_coat_test_report", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

$stmt = $conn->query("SELECT * FROM tracking");
$stmt->execute();
$trackings = $stmt->fetchAll();

if (!$trackings) {
    echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
} else 
foreach($trackings as $tracking)  

?>