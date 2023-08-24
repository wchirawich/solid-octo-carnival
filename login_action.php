<?php
session_start(); // เปิดใช้งาน session

if (isset($_SESSION['user_login'])) { // ถ้าเข้าระบบอยู่
    header("location: user.php"); // redirect ไปยังหน้า index.php
    exit;
}
include_once('config/function.php');
$objCon = connectDB(); // เชื่อมต่อฐานข้อมูล
$username = mysqli_real_escape_string($objCon, $_POST['username']); // รับค่า username
$password = mysqli_real_escape_string($objCon, $_POST['password']); // รับค่า password

$sToken = [

    "fJkBHN4u3WVgQ0qy4vbRY336DR8Jm0mY9MF9xuRFgz0",
    "1AcsBeO9ABYUhMHFA5ze7uo1v0HwQMB2ITYoAPNycek",
    "QPZl1wbgbIwYsM15zrYPz7LiLMA0vpV708tYcAdrIeM"

   
             ] ;
             $sMessage = "เข้าสู่ระบบ!\r\n";
             $sMessage .= "Username: " . $username . " \r\n";
            

          



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






$strSQL = "SELECT * FROM user WHERE u_username = '$username' AND u_password = md5('$password')  ";
$objQuery = mysqli_query($objCon, $strSQL);
$row = mysqli_num_rows($objQuery);
if($row) {
    $res = mysqli_fetch_assoc($objQuery);
    $_SESSION['user_login'] = array(
        'id' => $res['u_id'],
        'fullname' => $res['u_fullname'],
        'level' => $res['u_level']
    );
    echo '<script>alert("ยินดีต้อนรับคุณ ', $res['u_fullname'],'");window.location="user.php";</script>';
} else {
    echo '<script>alert("username หรือ password ไม่ถูกต้อง!!");window.location="login.php";</script>';
}
?>