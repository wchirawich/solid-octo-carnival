
<?php 

    session_start();

    include("config/db.php");

    if (isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $urole = $_POST['urole'];
       
        $stmt = $conn->prepare("INSERT INTO users SET firstname = :firstname, lastname = :lastname, email = :email, password = :password, urole = :urole ");
        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":urole", $urole);
        $stmt->execute();

        if ($stmt) {
            $_SESSION['success'] = "Data has been updated successfully";
            header("location: list_host.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: list_host.php");
        }
    }

?>


