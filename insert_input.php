
<?php 
   include("config/db.php");
    if (isset($_POST['submit'])) {
        $BatchGenQC = $_POST['BatchGenQC']; 
        $HCMachine = $_POST['HCMachine'];
        $LensType = $_POST['LensType'];
        $Material = $_POST['Material'];
        $MonomerHC = $_POST['MonomerHC'];
   

        $stmt = $conn->prepare(" INSERT INTO tracking ( BatchGenQC,  HCMachine,LensType, Material, MonomerHC  )
        VALUES (:BatchGenQC,  :HCMachine,  :LensType, :Material, :MonomerHC );");
        $stmt->bindParam(":BatchGenQC", $BatchGenQC);
        $stmt->bindParam(":HCMachine", $HCMachine);
        $stmt->bindParam(":LensType", $LensType);
        $stmt->bindParam(":Material", $Material);
        $stmt->bindParam(":MonomerHC", $MonomerHC);
        $stmt->execute();

        if ($stmt) {
            $_SESSION['success'] = "Data has been updated successfully";
            header("location: user.php");
        } else {
            $_SESSION['error'] = "user has not been updated successfully";
            header("location: user.php");
        }
    }

?>























