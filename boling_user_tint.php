
<?php 

    session_start();

    include_once('config/db.php');

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $BatchGenQC = $_POST['BatchGenQC'];
        $MonomerHC = $_POST['MonomerHC'];
        $roundboling = $_POST['roundboling'];
        $abruptly_cc1 = $_POST['abruptly_cc1'];
        $abruptly_cc2 = $_POST['abruptly_cc2'];
        $break_cc1 = $_POST['break_cc1'];
        $break_cc2 = $_POST['break_cc2'];
        $peeling_cc1 = $_POST['peeling_cc1'];
        $peeling_cc2 = $_POST['peeling_cc2'];
        $tape_cc1 = $_POST['tape_cc1'];
        $tape_cc2 = $_POST['tape_cc2'];
        $abruptly_cx1 = $_POST['abruptly_cx1'];
        $abruptly_cx2 = $_POST['abruptly_cx2'];
        $break_cx1 = $_POST['break_cx1'];
        $break_cx2 = $_POST['break_cx2'];
        $peeling_cx1 = $_POST['peeling_cx1'];
        $peeling_cx2 = $_POST['peeling_cx2'];
        $tape_cx1 = $_POST['tape_cx1'];
        $tape_cx2 = $_POST['tape_cx2'];
       
        $resultboling = $_POST['resultboling'];
        $testerboling = $_POST['testerboling'];
       
        $stmt = $conn->prepare("UPDATE tracking_tint SET BatchGenQC = :BatchGenQC, roundboling = :roundboling, 
        abruptly_cc1 = :abruptly_cc1, abruptly_cc2 = :abruptly_cc2,break_cc1 = :break_cc1,break_cc2 = :break_cc2,
        peeling_cc1 = :peeling_cc1, peeling_cc2 = :peeling_cc2,tape_cc1 = :tape_cc1,tape_cc2 = :tape_cc2,
        abruptly_cx1 = :abruptly_cx1, abruptly_cx2 = :abruptly_cx2,break_cx1 = :break_cx1,break_cx2 = :break_cx2,
        peeling_cx1 = :peeling_cx1, peeling_cx2 = :peeling_cx2,tape_cx1 = :tape_cx1,tape_cx2 = :tape_cx2,
        resultboling = :resultboling, testerboling = :testerboling WHERE id = :id ");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":BatchGenQC", $BatchGenQC);
        $stmt->bindParam(":roundboling", $roundboling);
        $stmt->bindParam(":abruptly_cc1", $abruptly_cc1);
        $stmt->bindParam(":abruptly_cc2", $abruptly_cc2);
        $stmt->bindParam(":break_cc1", $break_cc1);
        $stmt->bindParam(":break_cc2", $break_cc2);
        $stmt->bindParam(":peeling_cc1", $peeling_cc1);
        $stmt->bindParam(":peeling_cc2", $peeling_cc2);
        $stmt->bindParam(":tape_cc1", $tape_cc1);
        $stmt->bindParam(":tape_cc2", $tape_cc2);
        $stmt->bindParam(":abruptly_cx1", $abruptly_cx1);
        $stmt->bindParam(":abruptly_cx2", $abruptly_cx2);
        $stmt->bindParam(":break_cx1", $break_cc1);
        $stmt->bindParam(":break_cx2", $break_cx2);
        $stmt->bindParam(":peeling_cx1", $peeling_cc1);
        $stmt->bindParam(":peeling_cx2", $peeling_cx2);
        $stmt->bindParam(":tape_cx1", $tape_cx1);
        $stmt->bindParam(":tape_cx2", $tape_cx2);
        $stmt->bindParam(":resultboling", $resultboling);
        $stmt->bindParam(":testerboling", $testerboling);
        $stmt->execute();



        
        $sToken = [
        
            "1AcsBeO9ABYUhMHFA5ze7uo1v0HwQMB2ITYoAPNycek" , 
            "qSopoy0Fm3ifBWswkS0eJbcqcx5VaS4axVYr1Dp58UF" , 
            "QPZl1wbgbIwYsM15zrYPz7LiLMA0vpV708tYcAdrIeM" 
                     ] ;
           $sMessage = "ผลการทดสอบ Boling Water !\r\n";
           $sMessage .= "BatchGenQC: " . $BatchGenQC . " \r\n";
           $sMessage .= "HCLacker: " . $MonomerHC . " \r\n";
        
           $sMessage .= "รอบ: " . $roundboling . " \r\n";
           $sMessage .= "ผลการทดสอบ: " . $resultboling . " \r\n";
           $sMessage .= "ผู้ทดสอบ: " . $testerboling . " \r\n";
        
        
           function nottify_message($sMessage , $Token){
             
           $chOne = curl_init(); 
           curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
           curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
           curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
           curl_setopt( $chOne, CURLOPT_POST, 1); 
           curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
           $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$Token.'', );
           curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
           curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
           $result = curl_exec( $chOne ); 
        
           //Result error 
           if(curl_error($chOne)) 
           { 
               echo 'error:' . curl_error($chOne); 
           } 
           else { 
               $result_ = json_decode($result, true); 
               echo "status : ".$result_['status']; echo "message : ". $result_['message'];
           } 
           curl_close( $chOne );  
        
           }
        
           foreach ($sToken as $Token ) {
               nottify_message($sMessage , $Token);
           } 


        if ($stmt) {
            $_SESSION['success'] = "Data has been updated successfully";
            header("location: user_tint.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: user_tint.php");
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
        <h1>บันทึกผลการทดสอบ</h1>
        <hr>
            <form action="boling_user_tint.php" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                        $stmt = $conn->query("SELECT * FROM tracking_tint WHERE id = $id ");
                        $stmt->execute();
                        $boling = $stmt->fetch();
                        
                }
            ?>      
                      <div class="row">  
                    <div class="col-sm-6">   
                    <label for="id" class="col-form-label">ID:</label>
                    <input type="text" readonly value="<?php echo $boling['id']; ?>" required class="form-control" name="id" >
                    </div> 
                    <div class="col-sm-6">
                    <label for="BatchGenQC" class="col-form-label">BatchGenQC:</label>
                    <input type="text" readonly value="<?php echo $boling['BatchGenQC']; ?>" required class="form-control" name="BatchGenQC" >
                   </div> 
                    </div>
                    
                    <div class="row">
                    <div class="col-sm-6">   
                    <label for="HCMachine" class="col-form-label">HCMachine:</label>
                    <input type="text" readonly value="<?php echo $boling['HCMachine']; ?>" required class="form-control" name="HCMachine" >  
                    </div>
                    <div class="col-sm-6">
                    <label for="LensType" class="col-form-label">LensType:</label>
                    <input type="text" readonly value="<?php echo $boling['LensType']; ?>" required class="form-control" name="LensType" >   
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                    <label for="Material" class="col-form-label">Material:</label>
                    <input type="text" readonly value="<?php echo $boling['Material']; ?>" required class="form-control" name="Material" >   
                    </div>
                    <div class="col-sm-6">
                    <label for="MonomerHC" class="col-form-label">Hc Lacker:</label>
                    <input type="text" readonly value="<?php echo $boling['MonomerHC']; ?>" required class="form-control" name="MonomerHC" >   
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="Round" class="col-form-label">Round:</label>
                    <select name="roundboling" class="form-control" required>
                    <option value="">-เลือกรอบ-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM round");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['round'];?>"><?= $boling['round'];?></option>
                    <?php } ?>
                    </select>
                    </div>

                    <hr>
                    <h5  align="center"> CYCLE 1 </h5>
                    <hr>
                    <div class="row">
                    <div class="col-sm-6">
                        <h5 align="center" > CC </h5>
                    <div class="form-group">
                    <label for="Abruptly" class="col-form-label">Wrinkle:</label>
                    <select name="abruptly_cc1" class="form-control" required>
                    <option value="">-เลือกระดับ Wrinkle-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM abruptly");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['abruptly'];?>"><?= $boling['abruptly'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <h5 align="center" > CX </h5>
                    <div class="form-group">
                    <label for="Abruptly" class="col-form-label">Wrinkle:</label>
                    <select name="abruptly_cx1" class="form-control" required>
                    <option value="">-เลือกระดับ Wrinkle-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM abruptly");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['abruptly'];?>"><?= $boling['abruptly'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Break" class="col-form-label">Crack:</label>
                    <select name="break_cc1" class="form-control" required>
                    <option value="">-เลือกระดับ Crack-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM break");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['break'];?>"><?= $boling['break'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Break" class="col-form-label">Crack:</label>
                    <select name="break_cx1" class="form-control" required>
                    <option value="">-เลือกระดับ Crack-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM break");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['break'];?>"><?= $boling['break'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Peeling" class="col-form-label">Peeling:</label>
                    <select name="peeling_cc1" class="form-control" required>
                    <option value="">-เลือกระดับ Peeling-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM peeling");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['peeling'];?>"><?= $boling['peeling'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Peeling" class="col-form-label">Peeling:</label>
                    <select name="peeling_cx1" class="form-control" required>
                    <option value="">-เลือกระดับ Peeling-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM peeling");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['peeling'];?>"><?= $boling['peeling'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>
                    

                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Tape Test" class="col-form-label">Tape Test:</label>
                    <select name="tape_cc1" class="form-control" required>
                    <option value="">-เลือกระดับ Tape Test-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM tape");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['tape'];?>"><?= $boling['tape'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Tape Test" class="col-form-label">Tape Test:</label>
                    <select name="tape_cx1" class="form-control" required>
                    <option value="">-เลือกระดับ Tape Test-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM tape");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['tape'];?>"><?= $boling['tape'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>
                    
                    <hr>
                    <h5  align="center"> CYCLE 2 </h5>
                    <hr>
                    <div class="row">
                    <div class="col-sm-6">
                        <h5 align="center" >CC </h5>
                    <div class="form-group">
                    <label for="Abruptly" class="col-form-label">Wrinkle:</label>
                    <select name="abruptly_cc2" class="form-control" required>
                    <option value="">-เลือกระดับ Wrinkle-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM abruptly");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['abruptly'];?>"><?= $boling['abruptly'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <h5 align="center" > CX </h5>
                    <div class="form-group">
                    <label for="Abruptly" class="col-form-label">Wrinkle:</label>
                    <select name="abruptly_cx2" class="form-control" required>
                    <option value="">-เลือกระดับ Wrinkle-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM abruptly");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['abruptly'];?>"><?= $boling['abruptly'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Break" class="col-form-label">Crack:</label>
                    <select name="break_cc2" class="form-control" required>
                    <option value="">-เลือกระดับ Crack-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM break");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['break'];?>"><?= $boling['break'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Break" class="col-form-label">Crack:</label>
                    <select name="break_cx2" class="form-control" required>
                    <option value="">-เลือกระดับ Crack-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM break");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['break'];?>"><?= $boling['break'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Peeling" class="col-form-label">Peeling:</label>
                    <select name="peeling_cc2" class="form-control" required>
                    <option value="">-เลือกระดับ Peeling-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM peeling");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['peeling'];?>"><?= $boling['peeling'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Peeling" class="col-form-label">Peeling:</label>
                    <select name="peeling_cx2" class="form-control" required>
                    <option value="">-เลือกระดับ Peeling-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM peeling");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['peeling'];?>"><?= $boling['peeling'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>
                    

                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Tape Test" class="col-form-label">Tape Test:</label>
                    <select name="tape_cc2" class="form-control" required>
                    <option value="">-เลือกระดับ Tape Test-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM tape");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['tape'];?>"><?= $row['tape'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Tape Test" class="col-form-label">Tape Test:</label>
                    <select name="tape_cx2" class="form-control" required>
                    <option value="">-เลือกระดับ Tape Test-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM tape");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['tape'];?>"><?= $boling['tape'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Result" class="col-form-label">Result:</label>
                    <select name="resultboling" class="form-control" required>
                    <option value="">-เลือก Result-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM result");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['result'];?>"><?= $boling['result'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Tester" class="col-form-label">Tester:</label>
                    <select name="testerboling" class="form-control" required>
                    <option value="">-เลือก tester -</option>
                    <?php
                    include '2db.php';
                    $stmt = $conn->prepare("SELECT* FROM tester");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $boling) {
                    ?>
                    <option value="<?= $boling['tester'];?>"><?= $boling['tester'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>
      <hr>
                <div class="modal-footer">
                     <a href="user_tint.php" class="btn btn-secondary">Close</a>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        
        </body>
</html>                

