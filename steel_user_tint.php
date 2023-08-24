
<?php 

    session_start();

    include("config/db.php");

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $BatchGenQC = $_POST['BatchGenQC'];
        $roundsteel = $_POST['roundsteel'];
        $steel = $_POST['steel'];
        $resultsteel = $_POST['resultsteel'];
        $testersteel = $_POST['testersteel'];
       
        $stmt = $conn->prepare("UPDATE tracking_tint SET  BatchGenQC = :BatchGenQC, roundsteel = :roundsteel, steel = :steel, resultsteel = :resultsteel, testersteel = :testersteel WHERE id = :id ");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":BatchGenQC", $BatchGenQC);
        $stmt->bindParam(":roundsteel", $roundsteel);
        $stmt->bindParam(":steel", $steel);
        $stmt->bindParam(":resultsteel", $resultsteel);
        $stmt->bindParam(":testersteel", $testersteel);
        $stmt->execute();



        $sToken = [
            
            "1AcsBeO9ABYUhMHFA5ze7uo1v0HwQMB2ITYoAPNycek" , 
            "qSopoy0Fm3ifBWswkS0eJbcqcx5VaS4axVYr1Dp58UF" , 
            "QPZl1wbgbIwYsM15zrYPz7LiLMA0vpV708tYcAdrIeM" 
                     ] ;
           $sMessage = "ผลการทดสอบ Steel Wool !\r\n";
           $sMessage .= "BatchGenQC: " . $BatchGenQC . " \r\n";
           $sMessage .= "HCLacker: " . $MonomerHC . " \r\n";
        
           $sMessage .= "รอบ: " . $roundsteel . " \r\n";
           $sMessage .= "ผลการทดสอบ: " . $resultsteel . " \r\n";
           $sMessage .= "ผู้ทดสอบ: " . $testersteel . " \r\n";
        
        
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
            <form action="steel_user_tint.php" method="post" enctype="multipart/form-data">
            <?php
              if (isset($_GET['id'])) {
                $id = $_GET['id'];
                        $stmt = $conn->query("SELECT * FROM tracking_tint  WHERE id = $id");
                        $stmt->execute();
                        $steel = $stmt->fetch();
                        
                }
            ?>      
                     <div class="row">  
                    <div class="col-sm-6">   
                    <label for="id" class="col-form-label">ID:</label>
                    <input type="text" readonly value="<?php echo $steel['id']; ?>" required class="form-control" name="id" >
                    </div> 
                    <div class="col-sm-6">
                    <label for="BatchGenQC" class="col-form-label">BatchGenQC:</label>
                    <input type="text" readonly value="<?php echo $steel['BatchGenQC']; ?>" required class="form-control" name="BatchGenQC" >
                   </div> 
                    </div>
                    
                    <div class="row">
                    <div class="col-sm-6">   
                    <label for="HCMachine" class="col-form-label">HCMachine:</label>
                    <input type="text" readonly value="<?php echo $steel['HCMachine']; ?>" required class="form-control" name="HCMachine" >  
                    </div>
                    <div class="col-sm-6">
                    <label for="LensType" class="col-form-label">LensType:</label>
                    <input type="text" readonly value="<?php echo $steel['LensType']; ?>" required class="form-control" name="LensType" >   
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                    <label for="Material" class="col-form-label">Material:</label>
                    <input type="text" readonly value="<?php echo $steel['Material']; ?>" required class="form-control" name="Material" >   
                    </div>
                    <div class="col-sm-6">
                    <label for="MonomerHC" class="col-form-label">Hc Lacker:</label>
                    <input type="text" readonly value="<?php echo $steel['MonomerHC']; ?>" required class="form-control" name="MonomerHC" >   
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="Round" class="col-form-label">Round:</label>
                    <select name="roundsteel" class="form-control" required>
                    <option value="">-เลือกรอบ-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM round");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $steel) {
                    ?>
                    <option value="<?= $steel['round'];?>"><?= $steel['round'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <hr>
                    <label for="LEVEL" class="col-form-label">   A-C = PASS  ,  EXCEPT HG1600 A-D = PASS </label> 
                         <hr>
                    <label for="LEVEL" class="col-form-label"> LEVEL: </label>
                    <select name="steel" class="form-control" required>
                    <option value="">-เลือกระดับ LEVEL-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM steel");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $steel) {
                    ?>
                    <option value="<?= $steel['steel'];?>"><?= $steel['steel'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="Result" class="col-form-label">Result:</label>
                    <select name="resultsteel" class="form-control" required>
                    <option value="">-เลือก Result-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM result");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['result'];?>"><?= $row['result'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="Tester" class="col-form-label">Tester:</label>
                    <select name="testersteel" class="form-control" required>
                    <option value="">-เลือก tester -</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM tester");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['tester'];?>"><?= $row['tester'];?></option>
                    <?php } ?>
                    </select>
                    </div>
            
                <div class="modal-footer">
                     <a href="user_tint.php" class="btn btn-secondary">Close</a>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        
        </body>
</html>                