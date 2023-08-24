
<?php 
    include("config/db.php");

    if (isset($_POST['submit'])) {
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
       

        $stmt = $conn->prepare(" INSERT INTO tracking ( BatchGenQC, PSNo, HCMachine, HCOven,  HCOvenRound, LensType, Material, MonomerHC, CoatTime, Phase )
        VALUES (:BatchGenQC, :PSNo, :HCMachine, :HCOven, :HCOvenRound, :LensType, :Material, :MonomerHC, :CoatTime, :Phase );");
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
            header("location: host.php");
        } else {
            $_SESSION['error'] = "user has not been updated successfully";
            header("location: host.php");
        }
    }

?>























