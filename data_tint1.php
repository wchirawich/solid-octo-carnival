<?php 

    session_start();

    include_once('config/db.php');

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM tracking_tint WHERE BatchGenQC = $delete_id");
        $deletestmt->execute();

        if ($deletestmt) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:1; url=data_host.php");
        }
        
    }
?>
<?php include("menu_user.php"); ?>  
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DATA TINT 1</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-3">
          </div>
          <form action="search_tint1.php" class="form-group me-2" method="POST">
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

        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']); 
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']); 
                ?>
            </div>
        <?php } ?>

        <table class="table" align="center">
            <thead>
                <tr>
                <th scope="col" style="width: 15%;">BatchGenQC</th>
                <th scope="col" style="width: 15%;">roundtint</th>
                <th scope="col" style="width: 15%;">POWER</th>
                <th scope="col" style="width: 15%;">%LT</th>
                <th scope="col" style="width: 15%;">ปัญหาที่พบ</th>
                <th scope="col" style="width: 15%;">resulttint1</th>
                <th scope="col" style="width: 15%;">resulttint</th>
                <th scope="col" style="width: 15%;">testertint</th>
           
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM tracking_tint");
                    $stmt->execute();
                    $trackings = $stmt->fetchAll();

                    if (!$trackings) {
                        echo "<p><td colspan='8' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($trackings as $tracking)  {  
                ?>
                    <tr>
                    <th scope="row"><?php echo $tracking['BatchGenQC']; ?></th>
                        <td><?php echo $tracking['roundtint']; ?></td>
                        <td><?php echo $tracking['power']; ?></td>
                        <td><?php echo $tracking['lt1']; ?></td>
                        <td><?php echo $tracking['pd1']; ?></td>
                        <td><?php echo $tracking['resulttint1']; ?></td>
                        <td><?php echo $tracking['resulttint']; ?></td>
                        <td><?php echo $tracking['testertint']; ?></td>
                       
    
                       
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DATA TINT 2</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-3">
          </div>
          <form action="search_tint2.php" class="form-group me-2" method="POST">
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
        <table class="table" align="center">
            <thead>
                <tr>
                <th scope="col" style="width: 15%;">BatchGenQC</th>
                <th scope="col" style="width: 15%;">roundtint</th>
                <th scope="col" style="width: 15%;">POWER</th>
                <th scope="col" style="width: 15%;">%LT</th>
                <th scope="col" style="width: 15%;">ปัญหาที่พบ</th>
                <th scope="col" style="width: 15%;">resulttint2</th>
                <th scope="col" style="width: 15%;">resulttint</th>
                <th scope="col" style="width: 15%;">testertint</th>
           
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM tracking_tint");
                    $stmt->execute();
                    $trackings = $stmt->fetchAll();

                    if (!$trackings) {
                        echo "<p><td colspan='8' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($trackings as $tracking)  {  
                ?>
                    <tr>
                    <th scope="row"><?php echo $tracking['BatchGenQC']; ?></th>
                        <td><?php echo $tracking['roundtint']; ?></td>
                        <td><?php echo $tracking['power']; ?></td>
                        <td><?php echo $tracking['lt2']; ?></td>
                        <td><?php echo $tracking['pd2']; ?></td>
                        <td><?php echo $tracking['resulttint2']; ?></td>
                        <td><?php echo $tracking['resulttint']; ?></td>
                        <td><?php echo $tracking['testertint']; ?></td>
                       
    
                       
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DATA TINT 3</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-3">
          </div>
          <form action="search_tint3.php" class="form-group me-2" method="POST">
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
        <table class="table" align="center">
            <thead>
                <tr>
                <th scope="col" style="width: 15%;">BatchGenQC</th>
                <th scope="col" style="width: 15%;">roundtint</th>
                <th scope="col" style="width: 15%;">POWER</th>
                <th scope="col" style="width: 15%;">%LT</th>
                <th scope="col" style="width: 15%;">ปัญหาที่พบ</th>
                <th scope="col" style="width: 15%;">resulttint3</th>
                <th scope="col" style="width: 15%;">resulttint</th>
                <th scope="col" style="width: 15%;">testertint</th>
           
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM tracking_tint");
                    $stmt->execute();
                    $trackings = $stmt->fetchAll();

                    if (!$trackings) {
                        echo "<p><td colspan='8' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($trackings as $tracking)  {  
                ?>
                    <tr>
                    <th scope="row"><?php echo $tracking['BatchGenQC']; ?></th>
                        <td><?php echo $tracking['roundtint']; ?></td>
                        <td><?php echo $tracking['power']; ?></td>
                        <td><?php echo $tracking['lt3']; ?></td>
                        <td><?php echo $tracking['pd3']; ?></td>
                        <td><?php echo $tracking['resulttint3']; ?></td>
                        <td><?php echo $tracking['resulttint']; ?></td>
                        <td><?php echo $tracking['testertint']; ?></td>
                       
    
                       
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DATA TINT 4</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-3">
          </div>
          <form action="search_tint4.php" class="form-group me-2" method="POST">
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
        <table class="table" align="center">
            <thead>
                <tr>
                <th scope="col" style="width: 15%;">BatchGenQC</th>
                <th scope="col" style="width: 15%;">roundtint</th>
                <th scope="col" style="width: 15%;">POWER</th>
                <th scope="col" style="width: 15%;">%LT</th>
                <th scope="col" style="width: 15%;">ปัญหาที่พบ</th>
                <th scope="col" style="width: 15%;">resulttint4</th>
                <th scope="col" style="width: 15%;">resulttint</th>
                <th scope="col" style="width: 15%;">testertint</th>
           
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM tracking_tint");
                    $stmt->execute();
                    $trackings = $stmt->fetchAll();

                    if (!$trackings) {
                        echo "<p><td colspan='8' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($trackings as $tracking)  {  
                ?>
                    <tr>
                    <th scope="row"><?php echo $tracking['BatchGenQC']; ?></th>
                        <td><?php echo $tracking['roundtint']; ?></td>
                        <td><?php echo $tracking['power']; ?></td>
                        <td><?php echo $tracking['lt4']; ?></td>
                        <td><?php echo $tracking['pd4']; ?></td>
                        <td><?php echo $tracking['resulttint4']; ?></td>
                        <td><?php echo $tracking['resulttint']; ?></td>
                        <td><?php echo $tracking['testertint']; ?></td>
                       
    
                       
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DATA TINT 5</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-3">
          </div>
          <form action="search_tint5.php" class="form-group me-2" method="POST">
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
        <table class="table" align="center">
            <thead>
                <tr>
                <th scope="col" style="width: 15%;">BatchGenQC</th>
                <th scope="col" style="width: 15%;">roundtint</th>
                <th scope="col" style="width: 15%;">POWER</th>
                <th scope="col" style="width: 15%;">%LT</th>
                <th scope="col" style="width: 15%;">ปัญหาที่พบ</th>
                <th scope="col" style="width: 15%;">resulttint5</th>
                <th scope="col" style="width: 15%;">resulttint</th>
                <th scope="col" style="width: 15%;">testertint</th>
           
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM tracking_tint");
                    $stmt->execute();
                    $trackings = $stmt->fetchAll();

                    if (!$trackings) {
                        echo "<p><td colspan='8' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($trackings as $tracking)  {  
                ?>
                    <tr>
                    <th scope="row"><?php echo $tracking['BatchGenQC']; ?></th>
                        <td><?php echo $tracking['roundtint']; ?></td>
                        <td><?php echo $tracking['power']; ?></td>
                        <td><?php echo $tracking['lt5']; ?></td>
                        <td><?php echo $tracking['pd5']; ?></td>
                        <td><?php echo $tracking['resulttint5']; ?></td>
                        <td><?php echo $tracking['resulttint']; ?></td>
                        <td><?php echo $tracking['testertint']; ?></td>
                       
    
                       
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>
   

</main>
  </div>
</div>


  
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>

