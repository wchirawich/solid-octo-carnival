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

<?php include("menu_qp.php"); ?>  
        
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
    </div>
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item"><a class="page-link" href="data_tint1_p.php">NO.1 </a></li>
    <li class="page-item"><a class="page-link" href="data_tint2_p.php">NO.2 </a></li>
    <li class="page-item"><a class="page-link" href="data_tint3_p.php">NO.3 </a></li>
    <li class="page-item"><a class="page-link" href="data_tint4_p.php">NO.4 </a></li>
    <li class="page-item"><a class="page-link" href="data_tint5_p.php">NO.5 </a></li>
  </ul>
</nav>
    
</main>
  </div>
</div>


<script src="assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>

