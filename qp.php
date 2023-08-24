
<?php  include("config/db.php"); ?> 
<?php  include("menu_qp.php"); ?> 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">STATUS LENS</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-3">
        
         
            
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

       <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add BatchGenQC</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_input.php" method="post" enctype="multipart/form-data">
                <label for="BatchGenQC" class="col-form-label">BatchGenQC:</label>
                    <input type="text"  value="" required class="form-control" name="BatchGenQC" >
                 
                    <label for="HCMachine" class="col-form-label"> HCMachine :</label>
                    <input type="text" value="" required class="form-control" name="HCMachine" >
                   
                    <label for="LensType" class="col-form-label"> LensType :</label>
                    <input type="text" value="" required class="form-control" name="LensType" >
                    <label for="Material" class="col-form-label"> Material :</label>
                    <input type="text" value="" required class="form-control" name="Material" >
                    <label for="MonomerHC" class="col-form-label"> HC LACKER :</label>
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
                        <th scope="col" style="width: 0%;">ID</th>
                        <th   scope="col" style="width: 5%;">BatchGenQC</th>
                        <th   scope="col" style="width: 10%;">HC Machine</th>  
                        <th  scope="col" style="width: 5%;">LensType</th>
                        <th  scope="col" style="width: 5%;">Material</th>
                        <th   scope="col" style="width: 5%;">MonomerHC</th>
                        <th  scope="col" style="width: 0%;"></th>
                        <th   scope="col" style="width: 10%;">Tape Test</th>
                        <th  scope="col" style="width: 0%;"></th>
                        <th  scope="col" style="width: 10%;">Steel Wool</th>
                        <th  scope="col" style="width: 0%;"></th>
                        <th  scope="col" style="width:  10%;">Boling Water</th>
      
                        <th   scope="col" style="width: 10%;">Tape Test</th>
                        <th  scope="col" style="width: 10%;">Steel Wool</th>
                        <th  scope="col" style="width: 10%;">Boling Water</th>
            
                </tr>
            </thead>
            <tbody  align="center" >
                <?php 
                    $stmt = $conn->query("SELECT * FROM tracking");
                    $stmt->execute();
                    $trackings = $stmt->fetchAll();

                    if (!$trackings) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($trackings as $tracking)  {  
                ?>
                    <tr>
                    <th scope="id"><?php echo $tracking['id']; ?></th>
                    <td><?php echo $tracking['BatchGenQC']; ?></td>
                    <td><?php echo $tracking['HCMachine']; ?></td>
                    <td><?php echo $tracking['LensType']; ?></td>
                    <td><?php echo $tracking['Material']; ?></td>
                    <td><?php echo $tracking['MonomerHC']; ?></td>                                          
                    <td> 
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


                    <td>
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
                    <td>
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
   
                    <td>
                    <a href="tape_user.php?id=<?php echo $tracking['id']; ?>" class="btn btn-warning">Tape Test</a>
                    </td>
                    <td>
                    <?php if ($tracking['resulttape'] == 'PASS') { // แสดงลิงค์ไปยังหน้าผู้ดูแลระบบเมื่อผู้ใช้เป็นแอดมิน ?>
                        <a href="steel_user.php?id=<?php echo $tracking['id']; ?>" class="btn btn-warning">Steel Wool</a>
                    </td>
                    <td>
                    <a href="boling_user.php?id=<?php echo $tracking['id']; ?>" class="btn btn-warning">Boling Water</a>
                    </td>
                        
                        
                    </tr>
                <?php }  } ?>
            </tbody>
            </table>
   
            </div>  
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-whatever="@mdo">เพิ่มงาน</button>
            </div> 
      
    
          
       
    </div>
  </div>
    
  

    </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
