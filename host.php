
<?php include_once('config/db.php');?>  
<?php include("menu_host.php"); ?>  

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">ข้อมูล Tracking</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-3">
        
         
            
          </button>
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
                <th scope="col" style="width: 10%;">BatchGenQC</th>
                <th scope="col" style="width: 5%;">PSNo</th>
                <th scope="col" style="width: 7%;">HC Machine</th>
                <th scope="col" style="width: 10%;">HC Oven</th>
                <th scope="col" style="width: 10%;">HC Round</th>
                <th scope="col" style="width: 10%;">LensType</th>
                <th scope="col" style="width: 10%;">Material</th>
                <th scope="col" style="width: 10%;">MonomerHC</th>
                <th scope="col" style="width: 10%;">CoatTime</th>
                <th scope="col" style="width: 5%;">Phase</th>
                
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM tracking");
                    $stmt->execute();
                    $trackings = $stmt->fetchAll();

                    if (!$trackings) {
                        echo "<p><td colspan='19' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($trackings as $tracking)  {  
                ?>
                    <tr>
                    <th scope="row"><?php echo $tracking['BatchGenQC']; ?></th>
                        <td><?php echo $tracking['PSNo']; ?></td>
                        
                        <td><?php echo $tracking['HCMachine']; ?></td>
                        <td><?php echo $tracking['HCOven']; ?></td>
                        <td><?php echo $tracking['HCOvenRound']; ?></td>
                        <td><?php echo $tracking['LensType']; ?></td>
                        <td><?php echo $tracking['Material']; ?></td>
                        <td><?php echo $tracking['MonomerHC']; ?></td>
                        <td><?php echo $tracking['CoatTime']; ?></td>
                        <td><?php echo $tracking['Phase']; ?></td>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 0%;"></th>
                
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>

            <h2>หน้าสำหรับผู้ดูข้อมูล</h2>
            <div class="sm-5">
                <a href="user.php" class="btn btn-lg btn-success">กลับหน้าหลัก</a>
            </div>
    </div>

  
</main>
  </div>
</div>


   
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>
