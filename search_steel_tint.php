<?php 

    session_start();

    include("config/db.php");

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM tracking WHERE BatchGenQC = $delete_id");
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
$sql = "SELECT * FROM tracking_tint WHERE BatchGenQC LIKE '%$emp_data%' OR PSNo LIKE '%$emp_data%' ORDER BY BatchGenQC ASC "; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
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
<?php include("menu_user.php"); ?> 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DATA TAPE</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-3">
          </div>
          <form action="_tint" class="form-group me-2" method="POST">
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
                <tr role="row" class="info" align="center" >
                <th scope="col" style="width: 20%;">BatchGenQC</th>
                <th scope="col" style="width: 20%;">roundsteel</th>
                <th scope="col" style="width: 20%;">Level</th>
                <th scope="col" style="width: 20%;">resultsteel</th>
                <th scope="col" style="width: 20%;">testersteel</th>
                        
                </tr>
            </thead>
        <tbody  align="center" >
          <?php while ($tracking = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <th scope="row"><?php echo $tracking['BatchGenQC']; ?></th>
                        <td><?php echo $tracking['roundsteel']; ?></td>
                        <td><?php echo $tracking['steel']; ?></td>
                        <td><?php echo $tracking['resultsteel']; ?></td>
                        <td><?php echo $tracking['testersteel']; ?></td>
                       
                    </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <div class="alert alert-danger">
      <b>ไม่พบข้อมูล!!</b>
      </div>
    <?php } ?>
   
<a href="data_steel_tint_p.php" class="btn btn-success">กลับหน้าแรก</a>
  </div>
  </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>

