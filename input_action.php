<?php
include_once('config/function.php');
$objCon = connectDB();

$data = $_POST;
$BatchGenQC = $data['BatchGenQC'];
$HCMachine = $data['HCMachine'];
$LensType = ($data['LensType']); // เข้ารหัสด้วย md5
$Material = $data['Material'];
$MonomerHC = $data['MonomerHC'];

$strSQL = "INSERT INTO 
tracking(
    `BatchGenQC`,
    `HCMachine`,
    `LensType`, 
    `Material`,
    `MonomerHC`
) VALUES (
    '$BatchGenQC', 
    '$HCMachine', 
    '$LensType', 
    '$Material',
    '$MonomerHC'
)";

  
$sToken = [
   
    "QPZl1wbgbIwYsM15zrYPz7LiLMA0vpV708tYcAdrIeM" , 
    "1AcsBeO9ABYUhMHFA5ze7uo1v0HwQMB2ITYoAPNycek" ,
    "W5ObQeYKCvYxy6RBvtd8qOlYGkyUjSACwNGCVEV4s4e"
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
            header("location: user.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: user.php");
        }
  

$objQuery = mysqli_query($objCon, $strSQL) or die(mysqli_error($objCon));
if ($objQuery) {
    echo '<script>alert("บันทึกเรียบร้อยแล้ว");window.location="user.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด");window.location="user.php";</script>';
}