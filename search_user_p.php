<?php
include("config/db.php");
$emp_data = $_POST["emp_data"];
$sql = "SELECT * FROM tracking WHERE BatchGenQC LIKE '%$emp_data%' OR PSNo LIKE '%$emp_data%' ORDER BY BatchGenQC ASC "; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
$result = mysqli_query($con, $sql); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql
$count = mysqli_num_rows($result); //เก็บผลที่ได้จากคำสั่ง $result เก็บไว้ในตัวแปร $count
$order = 1; //ให้เริ่มนับแถวจากเลข 1
?>
<?php session_start(); include("db.php"); ?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
          </div>
          <form action="search_user.php" class="form-group me-2" method="POST">
          <div class="row">
          <div class="col-9">
          <input type="text" placeholder="กรอกtrackingที่ต้องการค้น" class="form-control" name="emp_data" required>
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
                        <th scope="col" style="width: 0%;">ID</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">PSNo</th>
                        <th   scope="col" style="width: 5%;">BatchGenQC</th>
                        <th   scope="col" style="width: 10%;">HC Machine</th>  
                        <th  scope="col" style="width: 5%;">LensType</th>
                        <th  scope="col" style="width: 5%;">Material</th>
                        <th   scope="col" style="width: 5%;">MonomerHC</th>
                        <th   scope="col" style="width: 0%;"></th>
                        <th   scope="col" style="width: 5%;">Tape Test</th>
                        <th  scope="col" style="width: 5%;">Steel Wool</th>
                        <th  scope="col" style="width: 5%;">Boling Water</th>
                        <th   scope="col" style="width: 5%;">Tape Test</th>
                        <th  scope="col" style="width: 5%;">Steel Wool</th>
                        <th  scope="col" style="width: 5%;">Boling Water</th>
                </tr>
            </thead>
        <tbody  align="center" >
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <th scope="id"><?php echo $row['id']; ?></th>
             <td><?php echo $row['PSNo']; ?></td>

                  <td><?php echo $row['BatchGenQC']; ?></td>
                  <td><?php echo $row['HCMachine']; ?></td>
                  <td><?php echo $row['LensType']; ?></td>
                  <td><?php echo $row['Material']; ?></td>
                  <td><?php echo $row['MonomerHC']; ?></td>                      
                  <td> <?php 
                  if ($row["resulttape"]  == "PASS") {
                          echo "<td style='color:#00FF33'>".$row["resulttape"]."</td>";
                          } 
                  if ($row["resulttape"]  == "FAIL") {
                          echo "<td style='color:#FF0000'>".$row["resulttape"]."</td>";
                          } 
                  if ($row["resulttape"]  == "FAIL REJECT") {
                          echo "<td style='color:#CC0000'>".$row["resulttape"]."</td>";
                          } 
                      ?>
                  </td>
                  <td><?php echo $row['resultsteel']; ?></td>
                  <td><?php echo $row['resultboling']; ?></td>                      

                  <td>
                  <a href="tape_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Tape Test</a>
                  </td>
                  <td>
                  <a href="steel_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Steel Wool</a>
                  </td>
                  <td>
                  <a href="boling_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Boling Water</a>
                  </td>
            
            </tr>
              
          <?php } ?>
        </tbody>
    </table>
    <?php } else { ?>
      <div class="alert alert-danger">
        <b>ไม่พบข้อมูล!!</b>
      </div>
    <?php } ?>
   

 
 <a href="user_p.php" class="btn btn-success">กลับหน้าแรก</a>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
 

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
   </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
