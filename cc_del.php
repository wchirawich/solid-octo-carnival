<?php 
if(isset($_GET['id'])){
    include_once('config/db.php');
//ประกาศตัวแปรรับค่าจาก param method get
$id = $_GET['id'];
$stmt = $conn->prepare('DELETE FROM cc WHERE id=:id');
$stmt->bindParam(':id', $id , PDO::PARAM_INT);
$stmt->execute();

  if($stmt->rowCount() > 0){
        echo '<script>       
              window.location = "option_Level.php"; //หน้าที่ต้องการให้กระโดดไป
              </script>';
    }else{
       echo '<script>         
              window.location = "option_Level.php"; //หน้าที่ต้องการให้กระโดดไป
             </script>';
    }
$conn = null;
} //isset
?>                                 