<?php 

    session_start();

    include("config/db.php");

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM user WHERE id = $delete_id");
        $deletestmt->execute();

        if ($deletestmt) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:1; url=data_host.php");
        }
        
    }

?>
<?php
require('db.php');
$emp_data = $_POST["emp_data"];
$sql = "SELECT * FROM user WHERE u_fullname LIKE '%$emp_data%' OR u_username LIKE '%$emp_data%' ORDER BY u_fullname ASC "; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
$result = mysqli_query($con, $sql); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql

$count = mysqli_num_rows($result); //เก็บผลที่ได้จากคำสั่ง $result เก็บไว้ในตัวแปร $count
$order = 1; //ให้เริ่มนับแถวจากเลข 1
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <title>ข้อมูลทั้งหมด</title>
</head>

<body>
<?php include("menu_qp.php"); ?> 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DATA ACCOUNT</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-3">
          </div>
          <form action="search_data.php" class="form-group me-2" method="POST">
          <div class="row">
          <div class="col-9">
          <input type="text" placeholder="" class="form-control" name="emp_data" required>
          </div>
          <div class="col-3">
          <input type="submit" value="search" class="btn btn-info">
          </div>
          </div>
          </form>
          
        </div>
 </div>

    <?php if ($count > 0) { ?>
      <table class="table">
            <thead>
            <th scope="col" >ID</th>
                <th scope="col">ชื่อ-นามสกุล</th>
                
                <th scope="col" >ชื่อผู้ใช้</th>
                <th scope="col">รหัสผ่าน</th>
                <th scope="col" >ระดับ</th>
                        
                </tr>
            </thead>
        <tbody  >
          <?php while ($user = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <th scope="row"><?php echo $user['u_id']; ?></th>
                        <td><?php echo $user['u_fullname']; ?></td>
                        <td><?php echo $user['u_username']; ?></td>
                        <td><?php echo $user['u_password']; ?></td>
                        <td><?php echo $user['u_level']; ?></td>
    
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 0%;"></th>
                       
                    </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <div class="alert alert-danger">
      <b>ไม่พบข้อมูล!!</b>
      </div>
    <?php } ?>
   
<a href="account.php" class="btn btn-success">กลับหน้าแรก</a>
  </div>
 

  <!-- Optional JavaScript; choose one of the two! -->

  </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
