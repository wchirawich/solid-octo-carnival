<?php 

    session_start();
    include("config/db.php");
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $BatchGenQC = $_POST['BatchGenQC'];
        $MonomerHC = $_POST['MonomerHC'];
        $roundtape = $_POST['roundtape'];
        $cx = $_POST['cx'];
        $cc = $_POST['cc'];
        $resulttape = $_POST['resulttape'];
        $testertape = $_POST['testertape'];
       
        $stmt = $conn->prepare("UPDATE tracking SET  BatchGenQC = :BatchGenQC, roundtape = :roundtape, cx = :cx, cc = :cc, resulttape = :resulttape, testertape = :testertape WHERE id = :id ");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":BatchGenQC", $BatchGenQC);
        $stmt->bindParam(":roundtape", $roundtape);
        $stmt->bindParam(":cx", $cx);
        $stmt->bindParam(":cc", $cc);
        $stmt->bindParam(":resulttape", $resulttape);
        $stmt->bindParam(":testertape", $testertape);
        $stmt->execute();

        
$sToken = [
    
    "QPZl1wbgbIwYsM15zrYPz7LiLMA0vpV708tYcAdrIeM" , 
    "1AcsBeO9ABYUhMHFA5ze7uo1v0HwQMB2ITYoAPNycek" ,
    "W5ObQeYKCvYxy6RBvtd8qOlYGkyUjSACwNGCVEV4s4e"
             ] ;
   $sMessage = "ผลการทดสอบ Tape test !\r\n";
   $sMessage .= "BatchGenQC: " . $BatchGenQC . " \r\n";
   $sMessage .= "HCLacker: " . $MonomerHC . " \r\n";

   $sMessage .= "รอบ: " . $roundtape . " \r\n";
   $sMessage .= "ผลการทดสอบ: " . $resulttape . " \r\n";
   $sMessage .= "ผู้ทดสอบ: " . $testertape . " \r\n";


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
            header("location: user.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: user.php");
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
            <form action="tape_user.php" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $stmt = $conn->query("SELECT * FROM tracking WHERE id = $id");
                        $stmt->execute();
                        $tape = $stmt->fetch();
                }
            ?>      
                    <div class="row">  
                    <div class="col-sm-6">   
                    <label for="id" class="col-form-label">ID:</label>
                    <input type="text" readonly value="<?php echo $tape['id']; ?>" required class="form-control" name="id" >
                    </div> 
                    <div class="col-sm-6">
                    <label for="BatchGenQC" class="col-form-label">BatchGenQC:</label>
                    <input type="text" readonly value="<?php echo $tape['BatchGenQC']; ?>" required class="form-control" name="BatchGenQC" >
                   </div> 
                    </div>
                    
                    <div class="row">
                    <div class="col-sm-6">   
                    <label for="HCMachine" class="col-form-label">HCMachine:</label>
                    <input type="text" readonly value="<?php echo $tape['HCMachine']; ?>" required class="form-control" name="HCMachine" >  
                    </div>
                    <div class="col-sm-6">
                    <label for="LensType" class="col-form-label">LensType:</label>
                    <input type="text" readonly value="<?php echo $tape['LensType']; ?>" required class="form-control" name="LensType" >   
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                    <label for="Material" class="col-form-label">Material:</label>
                    <input type="text" readonly value="<?php echo $tape['Material']; ?>" required class="form-control" name="Material" >   
                    </div>
                    <div class="col-sm-6">
                    <label for="MonomerHC" class="col-form-label">Hc Lacker:</label>
                    <input type="text" readonly value="<?php echo $tape['MonomerHC']; ?>" required class="form-control" name="MonomerHC" >   
                    </div>
                    </div>


                    <div class="form-group">
                    <label for="Round" class="col-form-label">Round:</label>
                    <select name="roundtape" class="form-control" required>
                    <option value="">-เลือกรอบ-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM round");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $tape) {
                    ?>
                    <option value="<?= $tape['round'];?>"><?= $tape['round'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="cc" class="col-form-label">CC: B5 = PASS</label>
                    <select name="cc" class="form-control" required>
                    <option value="">-เลือกระดับ CC-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM cc");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $tape) {
                    ?>
                    <option value="<?= $tape['cc'];?>"><?= $tape['cc'];?></option>
                    <?php } ?>
                    </select>
                    </div> 
                    </div> 
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="cx" class="col-form-label">CX: B5 = PASS </label>
                    <select name="cx" class="form-control" required>
                    <option value="">-เลือกระดับ CX-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM cx");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $tape) {
                    ?>
                    <option value="<?= $tape['cx'];?>"><?= $tape['cx'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Result" class="col-form-label">Result:</label>
                    <select name="resulttape" class="form-control" required>
                    <option value="">-เลือก Result-</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM result");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $tape) {
                    ?>
                    <option value="<?= $tape['result'];?>"><?= $tape['result'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Tester" class="col-form-label">Tester:</label>
                    <select name="testertape" class="form-control" required>
                    <option value="">-เลือก tester -</option>
                    <?php
                    include 'db.php';
                    $stmt = $conn->prepare("SELECT* FROM tester");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $tape) {
                    ?>
                    <option value="<?= $tape['tester'];?>"><?= $tape['tester'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>
                <p></p>
            
                <div class="modal-footer">
                <a href="user.php" class="btn btn-secondary" >Close</a>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
                
            </form>
        </div>
        
        </body>
</html>