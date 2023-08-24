
<?php 

    session_start();

    include_once('config/db.php');
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $urole = $_POST['urole'];
       

       $stmt = $conn->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, password = :password, urole = :urole WHERE id = :id");
        $stmt->bindParam(":id", $id);
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .container {
            max-width: 550px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Data</h1>
        <hr>
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <?php
                if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $stmt = $conn->query("SELECT * FROM users WHERE id = $id");
                        $stmt->execute();
                        $data = $stmt->fetch();
                }
            ?>
                <div class="mb-3">
                    <label for="id" class="col-form-label">ID:</label>
                    <input type="text" readonly value="<?php echo $data['id']; ?>" required class="form-control" name="id" >
                    <label for="firstname" class="col-form-label">First Name:</label>
                    <input type="text" value="<?php echo $data['firstname']; ?>" required class="form-control" name="firstname" >
                </div>
                <div class="mb-3">
                    <label for="lastname" class="col-form-label">Last Name:</label>
                    <input type="text" value="<?php echo $data['lastname']; ?>" required class="form-control" name="lastname">
                </div>
                <div class="mb-3">
                    <label for="email" class="col-form-label">Email:</label>
                    <input type="email" value="<?php echo $data['email']; ?>" required class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="col-form-label">Password:</label>
                    <input type="text" value="<?php echo $data['password']; ?>" required class="form-control" name="password">
                </div>
                <div class="form-group">
        <label for="urole">ระดับผู้ใช้งาน <i class='bx bxs-user-pin'></i></label>
        <select name="urole" class="form-control" required>
          <option value="">--เลือกระดับผู้ใช้งาน--</option>
          <option value="host">ผู้ดูแลเซิร์ฟเวอร์</option>
          <option value="admin">ผู้ดูแลระบบ</option>
          <option value="user">ผู้ใช้งาน</option>
        </select>
      </div>
               
                <hr>
                <a href="list_host.php" class="btn btn-secondary">Go Back</a>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
    </div>

</body>
</html>