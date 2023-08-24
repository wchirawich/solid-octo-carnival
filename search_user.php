<?php
include("config/db.php");
$emp_data = $_POST["emp_data"];
$sql = "SELECT * FROM tracking WHERE BatchGenQC LIKE '%$emp_data%' OR PSNo LIKE '%$emp_data%' ORDER BY BatchGenQC ASC "; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
$result = mysqli_query($con, $sql); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql
$count = mysqli_num_rows($result); //เก็บผลที่ได้จากคำสั่ง $result เก็บไว้ในตัวแปร $count
$order = 1; //ให้เริ่มนับแถวจากเลข 1
?>
<?php session_start(); include("config/db.php"); ?> 
<?php  include("menu_user.php"); ?> 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">LENS NON TINT</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-3">
        
         
            
          </button>
          </div>
          <form action="search_user.php" class="form-group me-2" method="POST">
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
                        <th scope="col" style="width: 0%;">ID</th>
                
                        <th   scope="col" style="width: 5%;">BatchGenQC</th>
                        <th   scope="col" style="width: 10%;">HC Machine</th>  
                        <th  scope="col" style="width: 5%;">LensType</th>
                        <th  scope="col" style="width: 5%;">Material</th>
                        <th   scope="col" style="width: 5%;">MonomerHC</th>
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
          <?php while ($tracking = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <th scope="id"><?php echo $tracking['id']; ?></th>
                    <td><?php echo $tracking['BatchGenQC']; ?></td>
                    <td><?php echo $tracking['MonomerHC']; ?></td>                                          
                    
                    <td>TAPR TEST
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
                        if ($tracking['resultsteel']  == "FAIL") {
                            echo "<td style='color:#FF0000'>".$tracking['resultsteel']."</td>";   
                        if ($tracking['resultsteel']  == "FAIL REJECT") {
                            echo "<td style='color:#CC0000'>".$tracking['resultsteel']."</td>";      
                    }}}  ?>
                   
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
   
                    <td>
                        <a href="tape_user.php?id=<?php echo $tracking['id']; ?>" class="btn btn-success">TAPE_TEST</a>  
                </td>
                    <td>
                    <?php if ($tracking['resulttape'] == 'PASS') { ?>
                        <a href="steel_user.php?id=<?php echo $tracking['id']; ?>" class="btn btn-success">STEEL_WOOL</a>
                        <?php } ?>
                    </td>
                    <td>
                   
                    <?php if ($tracking['resulttape'] == 'PASS') { ?>
                        <a href="boling_user.php?id=<?php echo $tracking['id']; ?>" class="btn btn-success">BOILING_WATER</a>
                        <?php } ?>
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
   

 
 <a href="user.php" class="btn btn-success">กลับหน้าแรก</a>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>