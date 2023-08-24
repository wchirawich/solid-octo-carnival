
<?php 
    include("config/db.php");

    if (isset($_POST['submit'])) {
        $BatchGenQC = $_POST['BatchGenQC']; 
        $HCMachine = $_POST['HCMachine'];
        $LensType = $_POST['LensType'];
        $Material = $_POST['Material'];
        $MonomerHC = $_POST['MonomerHC'];
   

        $stmt = $conn->prepare(" INSERT INTO tracking_tint ( BatchGenQC,  HCMachine,LensType, Material, MonomerHC  )
        VALUES (:BatchGenQC,  :HCMachine,  :LensType, :Material, :MonomerHC );");
        $stmt->bindParam(":BatchGenQC", $BatchGenQC);
        $stmt->bindParam(":HCMachine", $HCMachine);
        $stmt->bindParam(":LensType", $LensType);
        $stmt->bindParam(":Material", $Material);
        $stmt->bindParam(":MonomerHC", $MonomerHC);
        $stmt->execute();



        $sToken = [
   
            "1AcsBeO9ABYUhMHFA5ze7uo1v0HwQMB2ITYoAPNycek" , 
            "qSopoy0Fm3ifBWswkS0eJbcqcx5VaS4axVYr1Dp58UF" , 
            "QPZl1wbgbIwYsM15zrYPz7LiLMA0vpV708tYcAdrIeM" 
                     ] ;
           $sMessage = "ได้รับเลนส์ทดสอบ!\r\n";
           $sMessage .= "BatchGenQC: " . $BatchGenQC . " \r\n";
           $sMessage .= "Material Index: " . $Material . " \r\n";
           $sMessage .= "LensType: " . $LensType . " \r\n";
           $sMessage .= "HCLacker: " . $MonomerHC . " \r\n";
          
        
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
            $_SESSION['error'] = "user has not been updated successfully";
            header("location: user_tint.php");
        }
    }

?>























