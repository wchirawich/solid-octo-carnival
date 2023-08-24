<?php
include_once('config/function.php');
$objCon = connectDB();

$data = $_POST;
$u_fullname = $data['u_fullname'];
$u_username = $data['u_username'];
$u_password = md5($data['u_password']); // เข้ารหัสด้วย md5
$u_level = $data['u_level'];

$strSQL = "INSERT INTO 
user(
    `u_fullname`,
    `u_username`,
    `u_password`, 
    `u_level`
) VALUES (
    '$u_fullname', 
    '$u_username', 
    '$u_password', 
    '$u_level'
)";


$sToken = [
    "fJkBHN4u3WVgQ0qy4vbRY336DR8Jm0mY9MF9xuRFgz0",
    "1AcsBeO9ABYUhMHFA5ze7uo1v0HwQMB2ITYoAPNycek",
    "QPZl1wbgbIwYsM15zrYPz7LiLMA0vpV708tYcAdrIeM"
             ] ;
   $sMessage = "แจ้งเตือนการสมัครสมาชิก!\r\n";
   $sMessage .= $u_fullname . " ". " ได้ทำการสมัครสมาชิก!\r\n";
   $sMessage .= "Full Name: " . $u_fullname . " " . " \r\n";
   $sMessage .= "Username: " . $u_username . " \r\n";
   $sMessage .= "Level: " . $u_level . " \r\n";


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

$objQuery = mysqli_query($objCon, $strSQL) or die(mysqli_error($objCon));
if ($objQuery) {
    echo '<script>alert("ลงทะเบียนเรียบร้อยแล้ว");window.location="account.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด");window.location="account.php";</script>';
}