<?php 
  session_start();

  include_once('config/db.php');

    if (isset($_POST['update'])) {
        $BatchGenQC = $_POST['BatchGenQC'];
        $PSNo = $_POST['PSNo'];
        $HCMachine = $_POST['HCMachine'];
        $HCOven = $_POST['HCOven'];
        $HCOvenRound = $_POST['HCOvenRound'];
        $LensType = $_POST['LensType'];
        $Material = $_POST['Material'];
        $MonomerHC = $_POST['MonomerHC'];
        $CoatTime = $_POST['CoatTime'];
        $Phase = $_POST['Phase'];
        
       $stmt = $conn->prepare("INSERT INTO tracking SET  PSNo = :PSNo , HCMachine = :HCMachine, HCOven = :HCOven , HCOvenRound = :HCOvenRound,
        LensType = :LensType, Material = :Material, MonomerHC = :MonomerHC, CoatTime = :CoatTime, Phase = :Phase  WHERE BatchGenQC = :BatchGenQC");
        $stmt->bindParam(":BatchGenQC", $BatchGenQC);
        $stmt->bindParam(":PSNo", $PSNo);                                                                                                                                                                                                                                                                                         
        $stmt->bindParam(":HCMachine", $HCMachine);                                                                                                                                                                                                                                                                                         
        $stmt->bindParam(":HCOven", $HCOven);
        $stmt->bindParam(":HCOvenRound", $HCOvenRound);                                                                                                                                                                                                                                                                                         
        $stmt->bindParam(":LensType", $LensType);
        $stmt->bindParam(":Material", $Material);                                                                                                                                                                                                                                                                                         
        $stmt->bindParam(":MonomerHC", $MonomerHC);
        $stmt->bindParam(":CoatTime", $CoatTime);                                                                                                                                                                                                                                                                                         
        $stmt->bindParam(":Phase", $Phase);                                                                                                                                                                                                                                                                                         
        $stmt->execute();

        if ($stmt) {
            $_SESSION['success'] = "Data has been updated successfully";
            header("location: admin.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: admin.php");
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
        <form action="edit_admin.php" method="post" enctype="multipart/form-data">
       
            <?php
                if (isset($_GET['BatchGenQC'])) {
                        $BatchGenQC = $_GET['BatchGenQC'];
                        $stmt = $conn->query(" SELECT * FROM tracking WHERE BatchGenQC = $BatchGenQC ");
                        $stmt->execute();
                        $row = $stmt->fetch();                   
                }
            ?>
                <div class="mb-3">
                    <label for="BatchGenQC" class="col-form-label">BatchGenQC:</label>
                    <input type="text" readonly value="<?php echo $row['BatchGenQC']; ?>" required class="form-control" name="BatchGenQC" >
                    <label for="PSNo" class="col-form-label">PSNo:</label>
                    <input type="text" readonly value="<?php echo $row['PSNo']; ?>" required class="form-control" name="PSNo" >
                    <label for="HCMachine" class="col-form-label"> HCMachine :</label>
                    <input type="text" value="<?php echo $row['HCMachine']; ?>" required class="form-control" name="HCMachine" >
                    <label for="HCOven" class="col-form-label"> HCOven :</label>
                    <input type="text" value="<?php echo $row['HCOven']; ?>" required class="form-control" name="HCOven" >
                    <label for="HCOvenRound" class="col-form-label"> HCOvenRound :</label>
                    <input type="text" value="<?php echo $row['HCOvenRound']; ?>" required class="form-control" name="HCOvenRound" >
                    <label for="LensType" class="col-form-label"> LensType :</label>
                    <input type="text" value="<?php echo $row['LensType']; ?>" required class="form-control" name="LensType" >
                    <label for="Material" class="col-form-label"> Material :</label>
                    <input type="text" value="<?php echo $row['Material']; ?>" required class="form-control" name="Material" >
                    <label for="MonomerHC" class="col-form-label"> MonomerHC :</label>
                    <input type="text" value="<?php echo $row['MonomerHC']; ?>" required class="form-control" name="MonomerHC" >
                    <label for="CoatTime" class="col-form-label"> CoatTime :</label>
                    <input type="text" value="<?php echo $row['CoatTime']; ?>" required class="form-control" name="CoatTime" >
                    <label for="Phase" class="col-form-label"> Phase :</label>
                    <input type="text" value="<?php echo $row['Phase']; ?>" required class="form-control" name="Phase" >
                </div>
                
                <hr>
                <a href="admin.php" class="btn btn-secondary">Go Back</a>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
    </div>

</body>
</html>