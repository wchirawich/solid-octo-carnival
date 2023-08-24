<?php session_start(); include("config/db.php"); ?> 
<?php  include("menu_user.php"); ?> 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">STATUS TINT</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-3"> 
            
          </button>
          </div>
          <form action="search_user_tint.php" class="form-group me-2" method="POST">
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
       <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add BatchGenQC</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_input_tint.php" method="post" enctype="multipart/form-data">
                <label for="BatchGenQC" class="col-form-label">BatchGenQC:</label>
                    <input type="text"  value="" required class="form-control" name="BatchGenQC" >
                 
                    <label for="HCMachine" class="col-form-label"> HCMachine :</label>
                    <input type="text" value="" required class="form-control" name="HCMachine" >
                   
                    <label for="LensType" class="col-form-label"> LensType :</label>
                    <input type="text" value="" required class="form-control" name="LensType" >
                    <label for="Material" class="col-form-label"> Material :</label>
                    <input type="text" value="" required class="form-control" name="Material" >
                    <label for="MonomerHC" class="col-form-label"> HcLacker :</label>
                    <input type="text" value="" required class="form-control" name="MonomerHC" >
                    
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        
        </div>
    </div>
</div>
        
        
    <div class="container mt-1">
    
        <hr>
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

        <table class="table">
            <thead>
                <tr role="row" class="info" align="center" >
                <th scope="col" >ID</th>
                        <th   scope="col" >BatchGenQC</th>
                        <th   scope="col" >MonomerHC</th>
                        <th  scope="col" ></th>
                        <th  scope="col" ></th>
                        <th  scope="col" ></th>
                        <th  scope="col" ></th>
                        <th  scope="col" ></th>
                        <th  scope="col" ></th>
                        <th  scope="col" ></th>
                        <th  scope="col" ></th>
                        <th  scope="col" ></th>
                        <th  scope="col" ></th>
                        <th  scope="col" ></th>
                        <th  scope="col" ></th>
                    
                      
                </tr>
            </thead>
            <tbody  align="center" >
                <?php 
                    $stmt = $conn->query("SELECT * FROM tracking_tint ");
                    $stmt->execute();
                    $trackings = $stmt->fetchAll();

                    if (!$trackings) {
                        echo "<p><td colspan='15' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($trackings as $tracking)  {  
                ?>
                    <tr>
                    <th scope="id"><?php echo $tracking['id']; ?></th>
                    <td><?php echo $tracking['BatchGenQC']; ?></td>
                    <td><?php echo $tracking['MonomerHC']; ?></td>  
                
                    <td> TAPE TEST
                        <?php 
                       if ($tracking['resulttape']  == "PASS") {
                            echo "<td style='color:green'>".$tracking['resulttape']."</td>";
                             } 
                        if ($tracking['resulttape']  == "FAIL") {
                            echo "<td style='color:#FF0000'>".$tracking['resulttape']."</td>";
                             } 
                      if ($tracking['resulttape']  == "FAIL REJECT") {
                            echo "<td style='color:#CC0000'>".$tracking['resulttape']."</td>";
                             } 
                         ?>
                     </td>


                    <td> STEEL WOOL
                    <?php 
                       if ($tracking['resultsteel']  == "PASS") {
                            echo "<td style='color:green'>".$tracking['resultsteel']."</td>";
                             } 
                        if ($tracking['resultsteel']  == "FAIL") {
                            echo "<td style='color:#FF0000'>".$tracking['resultsteel']."</td>";
                             } 
                      if ($tracking['resultsteel']  == "FAIL REJECT") {
                            echo "<td style='color:#CC0000'>".$tracking['resultsteel']."</td>";
                             } 
                         ?>
                    </td>
                    <td>BOILING WATER
                    <?php 
                       if ($tracking['resultboling']  == "PASS") {
                            echo "<td style='color:green'>".$tracking['resultboling']."</td>";
                             } 
                        if ($tracking['resultboling']  == "FAIL") {
                            echo "<td style='color:#FF0000'>".$tracking['resultboling']."</td>";
                             } 
                      if ($tracking['resultboling']  == "FAIL REJECT") {
                            echo "<td style='color:#CC0000'>".$tracking['resultboling']."</td>";
                             } 
                         ?>
                         </td>
                      <td>TINT   
                    <?php 
                       if ($tracking['resulttint']  == "PASS") {
                            echo "<td style='color:green'>".$tracking['resulttint']."</td>";
                             } 
                        if ($tracking['resulttint']  == "FAIL") {
                            echo "<td style='color:#FF0000'>".$tracking['resulttint']."</td>";
                             } 
                      if ($tracking['resulttint']  == "FAIL REJECT") {
                            echo "<td style='color:#CC0000'>".$tracking['resulttint']."</td>";
                             } 
                         ?>
              </td>                    
   
                    <td>
                    <a href="tape_user_tint.php?id=<?php echo $tracking['id']; ?>" class="btn btn-warning">Tape_Test</a>
                    </td>
                    <td>
                    <?php if ($tracking['resulttape'] == 'PASS') { ?>
                      <a href="steel_user_tint.php?id=<?php echo $tracking['id']; ?>" class="btn btn-warning">Steel_Wool</a>
                    <?php } ?>
                  
                    </td>
                    <td>
                    <?php if ($tracking['resulttape'] == 'PASS') { ?>
                    <a href="boling_user_tint.php?id=<?php echo $tracking['id']; ?>" class="btn btn-warning">Boling_Water</a>
                    <?php } ?>
                    </td>
                    <td>
                    <?php if ($tracking['resulttape'] == 'PASS') { ?>
                    <a href="tint_user.php?id=<?php echo $tracking['id']; ?>" class="btn btn-warning">Tint</a>
                    <?php } ?>
                    </td>
                    </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>
             <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-whatever="@mdo">เพิ่มงาน</button>
            </div> 
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
