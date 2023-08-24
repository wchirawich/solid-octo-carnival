<?php 

    session_start();

    include_once('config/db.php');

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


<?php include("menu_user.php"); ?>  

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3border-bottom">
         <h1 class="h2">DATA BOILING WATER 2</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-3">
          </div>
          <form action="search_boiling2.php" class="form-group me-2" method="POST">
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
                <th scope="col" style="width: 5%;">roundboling</th>
                
                <th scope="col" style="width: 5%;">Wrinkle_cc2</th>
               
                <th scope="col" style="width: 5%;">Crack_cc2</th>
               
                <th scope="col" style="width: 5%;">peeling_cc2</th>
              
                <th scope="col" style="width: 5%;">tape_cc2</th>
           
                <th scope="col" style="width: 5%;">Wrinkle_cx2</th>
         
                <th scope="col" style="width: 5%;">Crack_cx2</th>
             
                <th scope="col" style="width: 5%;">peeling_cx2</th>
            
                <th scope="col" style="width: 5%;">tape_cx2</th>
                <th scope="col" style="width: 5%;">resultboling</th>
                <th scope="col" style="width: 5%;">testerboling</th>
                              
                </tr>
            </thead>
            <tbody align="center" >
                <?php 
                    $stmt = $conn->query("SELECT * FROM tracking");
                    $stmt->execute();
                    $trackings = $stmt->fetchAll();

                    if (!$trackings) {
                        echo "<p><td colspan='20' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($trackings as $tracking)  {  
                ?>
                    <tr>
                    <th scope="row"><?php echo $tracking['BatchGenQC']; ?></th>
                        <td><?php echo $tracking['roundboling']; ?></td>
                       
                        <td><?php echo $tracking['abruptly_cc2']; ?></td>
              
                        <td><?php echo $tracking['break_cc2']; ?></td>
                       
                        <td><?php echo $tracking['peeling_cc2']; ?></td>
                      
                        <td><?php echo $tracking['tape_cc2']; ?></td>
                 
                        <td><?php echo $tracking['abruptly_cx2']; ?></td>
                   
                        <td><?php echo $tracking['break_cx2']; ?></td>
   
                        <td><?php echo $tracking['peeling_cx2']; ?></td>
                 
                        <td><?php echo $tracking['tape_cx2']; ?></td>
                        <td><?php echo $tracking['resultboling']; ?></td>
                        <td><?php echo $tracking['testerboling']; ?></td>
                       
                       
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>DATA BOILING WATER 2 TINT</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-3">
            
          </div>
          <form action="search_boiling2_tint.php" class="form-group me-2" method="POST">
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
                <th scope="col" style="width: 10%;">BatchGenQC</th>
                <th scope="col" style="width: 5%;">roundboling</th>
                
                <th scope="col" style="width: 5%;">Wrinkle_cc2</th>
               
                <th scope="col" style="width: 5%;">Crack_cc2</th>
               
                <th scope="col" style="width: 5%;">peeling_cc2</th>
              
                <th scope="col" style="width: 5%;">tape_cc2</th>
           
                <th scope="col" style="width: 5%;">Wrinkle_cx2</th>
         
                <th scope="col" style="width: 5%;">Crack_cx2</th>
             
                <th scope="col" style="width: 5%;">peeling_cx2</th>
            
                <th scope="col" style="width: 5%;">tape_cx2</th>
                <th scope="col" style="width: 5%;">resultboling</th>
                <th scope="col" style="width: 5%;">testerboling</th>
                              
                </tr>
            </thead>
            <tbody align="center" >
                <?php 
                    $stmt = $conn->query("SELECT * FROM tracking_tint");
                    $stmt->execute();
                    $trackings = $stmt->fetchAll();

                    if (!$trackings) {
                        echo "<p><td colspan='20' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($trackings as $tracking)  {  
                ?>
                    <tr>
                    <th scope="row"><?php echo $tracking['BatchGenQC']; ?></th>
                        <td><?php echo $tracking['roundboling']; ?></td>
                       
                        <td><?php echo $tracking['abruptly_cc2']; ?></td>
              
                        <td><?php echo $tracking['break_cc2']; ?></td>
                       
                        <td><?php echo $tracking['peeling_cc2']; ?></td>
                      
                        <td><?php echo $tracking['tape_cc2']; ?></td>
                 
                        <td><?php echo $tracking['abruptly_cx2']; ?></td>
                   
                        <td><?php echo $tracking['break_cx2']; ?></td>
   
                        <td><?php echo $tracking['peeling_cx2']; ?></td>
                 
                        <td><?php echo $tracking['tape_cx2']; ?></td>
                        <td><?php echo $tracking['resultboling']; ?></td>
                        <td><?php echo $tracking['testerboling']; ?></td>
                       
                       
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
  
    <li class="page-item"><a class="page-link" href="data_boling1.php">CYCLE 1 </a></li>
  </ul>
</nav>
   
</main>
  </div>
</div>



<script src="assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>

