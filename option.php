<?php session_start();
include("config/db.php");
?>

<body>
<?php include("menu_admin.php"); ?>      
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Round</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_round.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="round" class="col-form-label">Round:</label>
                    <input type="text" required class="form-control" name="round">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>

        </div>
    </div>
    </div>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>ข้อมูล Round</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-whatever="@mdo">Add Round</button>
            </div>
        </div>
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

        <table class="table" align="center">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%;">ID</th>
                    <th scope="col" style="width: 70%;">Round</th>
                    <th scope="col" style="width: 10%;">Edit</th>
                    <th scope="col" style="width: 10%;">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM round");
                    $stmt->execute();
                    $rounds = $stmt->fetchAll();

                    if (!$rounds) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($rounds as $round)  {  
                ?>
                    <tr>
                        <th scope="row"><?php echo $round['id']; ?></th>
                        <td><?php echo $round['round']; ?></td>
        
                        <td>
                            <a href="edit_round.php?id=<?php echo $round['id']; ?>" class="btn btn-warning">Edit</a>
                           
                        </td>
                        <td>
                         <a onclick="return confirm('Are you sure you want to delete?');" href="round_del.php?act=dle&id=<?php echo $round['id']; ?>" class="btn btn-danger">Delete</a>
                         </td>
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>


    <?php 
 //คิวรี่ข้อมูลมาแสดงในตาราง
    include 'config/db.php';
    $stmt = $conn->prepare("SELECT* FROM result");
    $stmt->execute();
    $results = $stmt->fetchAll();
?>

    <div class="modal fade" id="Result" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Result</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_result.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="result" class="col-form-label">Result:</label>
                    <input type="text" required class="form-control" name="result">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>

        </div>
    </div>
    </div>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>ข้อมูล Result</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Result" data-bs-whatever="@mdo">Add Result</button>
            </div>
        </div>
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

        <table class="table" align="center">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%;">ID</th>
                    <th scope="col" style="width: 70%;">Result</th>
                    <th scope="col" style="width: 10%;">Edit</th>
                    <th scope="col" style="width: 10%;">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM result");
                    $stmt->execute();
                    $results = $stmt->fetchAll();

                    if (!$results) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($results as $result)  {  
                ?>
                    <tr>
                        <th scope="row"><?php echo $result['id']; ?></th>
                        <td><?php echo $result['result']; ?></td>
        
                        <td>
                            <a href="edit_result.php?id=<?php echo $result['id']; ?>" class="btn btn-warning">Edit</a>  
                        </td>
                        <td>
                         <a onclick="return confirm('Are you sure you want to delete?');" href="result_del.php?act=dle&id=<?php echo $result['id']; ?>" class="btn btn-danger">Delete</a>
                         </td>
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>

    <?php 
 //คิวรี่ข้อมูลมาแสดงในตาราง
    include 'config/db.php';
    $stmt = $conn->prepare("SELECT* FROM tester");
    $stmt->execute();
    $testers = $stmt->fetchAll();
?>

    <div class="modal fade" id="tester" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Tester</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_tester.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="tester" class="col-form-label">Tester:</label>
                    <input type="text" required class="form-control" name="tester">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>

        </div>
    </div>
    </div>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>ข้อมูล Tester</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tester" data-bs-whatever="@mdo">Add Tester</button>
            </div>
        </div>
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

        <table class="table" align="center">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%;">ID</th>
                    <th scope="col" style="width: 70%;">Tester</th>
                    <th scope="col" style="width: 10%;">Edit</th>
                    <th scope="col" style="width: 10%;">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM tester");
                    $stmt->execute();
                    $testers = $stmt->fetchAll();

                    if (!$testers) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($testers as $tester)  {  
                ?>
                    <tr>
                        <th scope="row"><?php echo $tester['id']; ?></th>
                        <td><?php echo $tester['tester']; ?></td>
        
                        <td>
                            <a href="edit_tester.php?id=<?php echo $tester['id']; ?>" class="btn btn-warning">Edit</a>
                           
                        </td>
                        <td>
                         <a onclick="return confirm('Are you sure you want to delete?');" href="tester_del.php?act=dle&id=<?php echo $tester['id']; ?>" class="btn btn-danger">Delete</a>
                         </td>
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































