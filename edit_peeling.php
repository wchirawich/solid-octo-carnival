
<?php 

    session_start();

    include_once('config/db.php');

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $peeling = $_POST['peeling'];
        
       

       $stmt = $conn->prepare("UPDATE peeling SET peeling = :peeling WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":peeling", $peeling);                                                                                                                                                                                                                                                                                         
        $stmt->execute();

        if ($stmt) {
            $_SESSION['success'] = "Data has been updated successfully";
            header("location: option_Level.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: option_Level.php");
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
        <form action="edit_peeling.php" method="post" enctype="multipart/form-data">
            <?php
                if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $stmt = $conn->query("SELECT * FROM peeling WHERE id = $id");
                        $stmt->execute();
                        $data = $stmt->fetch();
                }
            ?>
                <div class="mb-3">
                    <label for="id" class="col-form-label">ID:</label>
                    <input type="text" readonly value="<?php echo $data['id']; ?>" required class="form-control" name="id" >
                    <label for="peeling" class="col-form-label">Peeling:</label>
                    <input type="text" value="<?php echo $data['peeling']; ?>" required class="form-control" name="peeling" >
                </div>
    
                <hr>
                <a href="option_Level.php" class="btn btn-secondary">Go Back</a>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
    </div>

</body>
</html>
</html>
