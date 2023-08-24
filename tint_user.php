
<?php 

    session_start();

    include("config/db.php");

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $BatchGenQC = $_POST['BatchGenQC'];
        $roundtint = $_POST['roundtint'];
        $MonomerHC = $_POST['MonomerHC'];
        $power = $_POST['power'];
        $lt1 = $_POST['lt1'];
        $pd1 = $_POST['pd1'];
        $resulttint1 = $_POST['resulttint1'];
        $lt2 = $_POST['lt2'];
        $pd2 = $_POST['pd2'];
        $resulttint2 = $_POST['resulttint2'];
        $lt3 = $_POST['lt3'];
        $pd3 = $_POST['pd3'];
        $resulttint3 = $_POST['resulttint3'];
        $lt4 = $_POST['lt4'];
        $pd4 = $_POST['pd4'];
        $resulttint4 = $_POST['resulttint4'];
        $lt5 = $_POST['lt5'];
        $pd5 = $_POST['pd5'];
        $resulttint5 = $_POST['resulttint5'];

        $resulttint = $_POST['resulttint'];
        $testertint = $_POST['testertint'];
       
        $stmt = $conn->prepare("UPDATE tracking_tint SET  BatchGenQC = :BatchGenQC, roundtint = :roundtint, power = :power,
         lt1 = :lt1,  pd1 = :pd1, resulttint1 = :resulttint1, 
         lt2 = :lt2,  pd2 = :pd2, resulttint2 = :resulttint2, 
         lt3 = :lt3,  pd3 = :pd3, resulttint3 = :resulttint3, 
         lt4 = :lt4,  pd4 = :pd4, resulttint4 = :resulttint4, 
         lt5 = :lt5,  pd5 = :pd5, resulttint5 = :resulttint5, 
         
         resulttint = :resulttint, testertint = :testertint WHERE id = :id ");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":BatchGenQC", $BatchGenQC);
        $stmt->bindParam(":roundtint", $roundtint);
        $stmt->bindParam(":power", $power);
     
        $stmt->bindParam(":lt1", $lt1);
        $stmt->bindParam(":pd1", $pd1);
        $stmt->bindParam(":resulttint1", $resulttint1);
        $stmt->bindParam(":lt2", $lt2);
        $stmt->bindParam(":pd2", $pd2);
        $stmt->bindParam(":resulttint2", $resulttint2);
        $stmt->bindParam(":lt3", $lt3);
        $stmt->bindParam(":pd3", $pd3);
        $stmt->bindParam(":resulttint3", $resulttint3);
        $stmt->bindParam(":lt4", $lt4);
        $stmt->bindParam(":pd4", $pd4);
        $stmt->bindParam(":resulttint4", $resulttint4);
        $stmt->bindParam(":lt5", $lt5);
        $stmt->bindParam(":pd5", $pd5);
        $stmt->bindParam(":resulttint5", $resulttint5);
    
        $stmt->bindParam(":resulttint", $resulttint);
        $stmt->bindParam(":testertint", $testertint);
        $stmt->execute();

        $sToken = [

          "qSopoy0Fm3ifBWswkS0eJbcqcx5VaS4axVYr1Dp58UF" , 
          "p3UUNGioD5fN5ag21QePihULDJp7OfbpKFGOACFRNos" ,
          "1bOtZavTgkwhnuLnAmGEyUw4X9MrR3b8QhQ4HLSSC5k"
                   ] ;
         $sMessage = "ผลการทดสอบ Tint !\r\n";
         $sMessage .= "BatchGenQC: " . $BatchGenQC . " \r\n";
         $sMessage .= "HCLacker: " . $MonomerHC . " \r\n";
      
         $sMessage .= "รอบ: " . $roundtint . " \r\n";
         $sMessage .= "ผลการทดสอบ: " . $resulttint . " \r\n";
         $sMessage .= "ผู้ทดสอบ: " . $testertint . " \r\n";
      
      
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
            <form action="tint_user.php" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $stmt = $conn->query("SELECT * FROM tracking_tint WHERE id = $id");
                        $stmt->execute();
                        $tint = $stmt->fetch();
                }
            ?>      
                    <div class="row">  
                    <div class="col-sm-6">   
                    <label for="id" class="col-form-label">ID:</label>
                    <input type="text" readonly value="<?php echo $tint['id']; ?>" required class="form-control" name="id" >
                    </div> 
                    <div class="col-sm-6">
                    <label for="BatchGenQC" class="col-form-label">BatchGenQC:</label>
                    <input type="text" readonly value="<?php echo $tint['BatchGenQC']; ?>" required class="form-control" name="BatchGenQC" >
                   </div> 
                    </div>
                    
                    <div class="row">
                    <div class="col-sm-6">   
                    <label for="HCMachine" class="col-form-label">HCMachine:</label>
                    <input type="text" readonly value="<?php echo $tint['HCMachine']; ?>" required class="form-control" name="HCMachine" >  
                    </div>
                    <div class="col-sm-6">
                    <label for="LensType" class="col-form-label">LensType:</label>
                    <input type="text" readonly value="<?php echo $tint['LensType']; ?>" required class="form-control" name="LensType" >   
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                    <label for="Material" class="col-form-label">Material:</label>
                    <input type="text" readonly value="<?php echo $tint['Material']; ?>" required class="form-control" name="Material" >   
                    </div>
                    <div class="col-sm-6">
                    <label for="MonomerHC" class="col-form-label">Hc Lacker:</label>
                    <input type="text" readonly value="<?php echo $tint['MonomerHC']; ?>" required class="form-control" name="MonomerHC" >   
                    </div>
                    </div>


                    <div class="form-group">
                    <label for="Round" class="col-form-label">Round:</label>
                    <select name="roundtint" class="form-control" required>
                    <option value="">-เลือกรอบ-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM round");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $tint) {
                    ?>
                    <option value="<?= $tint['round'];?>"><?= $tint['round'];?></option>
                    <?php } ?>
                    </select>
                    </div>

        <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
        <label for="POWER" class="col-form-label">POWER :</label>
            <input type="text" value="" required class="form-control" name="power" placeholder="บันทึกข้อมูล POWER" >  
          </div>
        </div>
        </div>



         <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
           <label for="%LT" class="col-form-label">%LT ( 1 ) : </label>
            <input type="text" value="" required class="form-control" name="lt1" placeholder="บันทึกข้อมูล  %LT">  
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
          <label for="ปัญหาที่พบ" class="col-form-label">ปัญหาที่พบ ( 1 ) : </label>
            <input type="text" value="" required class="form-control" name="pd1" placeholder="บันทึกปัญหาที่พบ">  
          </div>
        </div>


        
                    <div class="col-sm-4">
                    <div class="form-group">
                    <label for="Result" class="col-form-label">Result ( 1 ) : </label>
                    <select name="resulttint1" class="form-control" required>
                    <option value="">-เลือก Result-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM result");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $tint) {
                    ?>
                    <option value="<?= $tint['result'];?>"><?= $tint['result'];?></option>
                    <?php } ?>
                    </select>
                    </div>

      </div>
      </div>


         <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
           <label for="%LT" class="col-form-label">%LT ( 2 ) :</label>
            <input type="text" value="" required class="form-control" name="lt2" placeholder="บันทึกข้อมูล  %LT">  
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
          <label for="ปัญหาที่พบ" class="col-form-label">ปัญหาที่พบ ( 2 ) :</label>
            <input type="text" value="" required class="form-control" name="pd2" placeholder="บันทึกปัญหาที่พบ">  
          </div>
        </div>


        
                    <div class="col-sm-4">
                    <div class="form-group">
                    <label for="Result" class="col-form-label">Result ( 2 ) :</label>
                    <select name="resulttint2" class="form-control" required>
                    <option value="">-เลือก Result-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM result");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $tint) {
                    ?>
                    <option value="<?= $tint['result'];?>"><?= $tint['result'];?></option>
                    <?php } ?>
                    </select>
                    </div>

      </div>
      </div>


         <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
           <label for="%LT" class="col-form-label">%LT ( 3 ) :</label>
            <input type="text" value="" required class="form-control" name="lt3" placeholder="บันทึกข้อมูล  %LT">  
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
          <label for="ปัญหาที่พบ" class="col-form-label">ปัญหาที่พบ ( 3 ) :</label>
            <input type="text" value="" required class="form-control" name="pd3" placeholder="บันทึกปัญหาที่พบ">  
          </div>
        </div>


        
                    <div class="col-sm-4">
                    <div class="form-group">
                    <label for="Result" class="col-form-label">Result ( 3 ) :</label>
                    <select name="resulttint3" class="form-control" required>
                    <option value="">-เลือก Result-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM result");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $tint) {
                    ?>
                    <option value="<?= $tint['result'];?>"><?= $tint['result'];?></option>
                    <?php } ?>
                    </select>
                    </div>

      </div>
      </div>


         <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
           <label for="%LT" class="col-form-label">%LT ( 4 ) :</label>
            <input type="text" value="" required class="form-control" name="lt4" placeholder="บันทึกข้อมูล  %LT">  
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
          <label for="ปัญหาที่พบ" class="col-form-label">ปัญหาที่พบ ( 4 ) :</label>
            <input type="text" value="" required class="form-control" name="pd4" placeholder="บันทึกปัญหาที่พบ">  
          </div>
        </div>


        
                    <div class="col-sm-4">
                    <div class="form-group">
                    <label for="Result" class="col-form-label">Result ( 4 ) :</label>
                    <select name="resulttint4" class="form-control" required>
                    <option value="">-เลือก Result-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM result");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $tint) {
                    ?>
                    <option value="<?= $tint['result'];?>"><?= $tint['result'];?></option>
                    <?php } ?>
                    </select>
                    </div>

      </div>
      </div>


         <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
          <label for="%LT" class="col-form-label">%LT ( 5 ) :</label>
            <input type="text" value="" required class="form-control" name="lt5" placeholder="บันทึกข้อมูล  %LT">  
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
          <label for="ปัญหาที่พบ" class="col-form-label">ปัญหาที่พบ ( 5 ) :</label>
            <input type="text" value="" required class="form-control" name="pd5" placeholder="บันทึกปัญหาที่พบ">  
          </div>
        </div>


        
                    <div class="col-sm-4">
                    <div class="form-group">
                    <label for="Result" class="col-form-label">Result ( 5 ) :</label>
                    <select name="resulttint5" class="form-control" required>
                    <option value="">-เลือก Result-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM result");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $tint) {
                    ?>
                    <option value="<?= $tint['result'];?>"><?= $tint['result'];?></option>
                    <?php } ?>
                    </select>
                    </div>

      </div>
      </div>


                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Result" class="col-form-label">Result:</label>
                    <select name="resulttint" class="form-control" required>
                    <option value="">-เลือก Result-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM result");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $tint) {
                    ?>
                    <option value="<?= $tint['result'];?>"><?= $tint['result'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Tester" class="col-form-label">Tester:</label>
                    <select name="testertint" class="form-control" required>
                    <option value="">-เลือก tester -</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM tester");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $tint) {
                    ?>
                    <option value="<?= $tint['tester'];?>"><?= $tint['tester'];?></option>
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