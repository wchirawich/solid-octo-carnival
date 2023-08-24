
<?php include_once('config/db.php'); ?> 
<?php  include("menu_admin.php"); ?> 

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
                <th scope="col" style="width: 7%;">Tape Test</th>
                <th scope="col" style="width: 10%;">Steel Wool</th>
                <th scope="col" style="width: 10%;">Boiling</th>
                   
                </tr>
            </thead>
            <tbody>
                
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
                    <th scope="row"><?php echo $tracking['BatchGenQC']; ?></th>
                        <td><?php echo $tracking['PSNo']; ?></td>
                        <td><?php echo $tracking['resulttape']; ?></td>
                        <td><?php echo $tracking['resultsteel']; ?></td>
                        <td><?php echo $tracking['resultboling']; ?></td>
                      
                        </tr>
                <?php }  } ?>
            </tbody>
        </table>

       
            <h2>หน้าสำหรับผู้ดูแลระบบ</h2>
            <div class="sm-5">
                <a href="user.php" class="btn btn-lg btn-success">กลับหน้าหลัก</a>
            </div>
</div>
    

    <!-- JavaScript Bundle with Popper -->
     
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>