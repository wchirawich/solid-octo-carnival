
<?php 

    session_start();

    include("config/db.php");

    if (isset($_POST['submit'])) {
        $tape = $_POST['tape'];
       
       
        $stmt = $conn->prepare("INSERT INTO tape (tape)
        VALUES (:tape)");
        $stmt->bindParam(':tape', $tape, PDO::PARAM_STR);
        $tapes = $stmt->execute();


        
        $sToken = [

            "fJkBHN4u3WVgQ0qy4vbRY336DR8Jm0mY9MF9xuRFgz0",
            "1AcsBeO9ABYUhMHFA5ze7uo1v0HwQMB2ITYoAPNycek",
            "QPZl1wbgbIwYsM15zrYPz7LiLMA0vpV708tYcAdrIeM"
           
                     ] ;
           $sMessage = "บันทึกข้อมูล Tape test !\r\n";
           $sMessage .= "ระดับการทดสอบ: " . $tape . " \r\n";
    
        
        
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
            header("location: option_Level.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: option_Level.php");
        }
    }

?>


