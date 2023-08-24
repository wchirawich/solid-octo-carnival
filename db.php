<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=Wchira", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
<!--<link href="css/style.css" rel="stylesheet">-->
<?php
$con = mysqli_connect("localhost", "root", "", "Wchira") or die("เกิดข้อผิดพลาดเกิดขึ้น");
mysqli_set_charset($con, "utf8");
?>


