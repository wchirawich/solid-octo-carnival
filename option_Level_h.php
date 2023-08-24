<?php session_start();
include("config/db.php");?>

<body>
<?php include("menu_host.php"); ?>  

    <div class="modal fade" id="steel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Steel Wool </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_steel.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="steel" class="col-form-label">Steel Wool:</label>
                    <input type="text" required class="form-control" name="steel">
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
                <h1>ข้อมูล Steel Wool</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#steel" data-bs-whatever="@mdo">Add Steel Wool </button>
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
                    <th scope="col" style="width: 70%;"> Steel Wool</th>
                    <th scope="col" style="width: 10%;">Edit</th>
                    <th scope="col" style="width: 10%;">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM steel");
                    $stmt->execute();
                    $steels = $stmt->fetchAll();

                    if (!$steels) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($steels as $steel)  {  
                ?>
                    <tr>
                        
                        <td><?php echo $steel['id']; ?></td>
                        <td><?php echo $steel['steel']; ?></td>
                        <td>
                            <a href="edit_steel.php?id=<?php echo $steel['id']; ?>" class="btn btn-warning">Edit</a>
                           
                        </td>
                        <td>
                         <a onclick="return confirm('Are you sure you want to delete?');" href="steel_del.php?act=dle&id=<?php echo $steel['id']; ?>" class="btn btn-danger">Delete</a>
                         </td>
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>


    <?php 
 //คิวรี่ข้อมูลมาแสดงในตาราง
    include 'config/db.php';
    $stmt = $conn->prepare("SELECT* FROM tape ");
    $stmt->execute();
    $tapes = $stmt->fetchAll();
?>

    <div class="modal fade" id="tape" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Tape</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_tape.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="tape" class="col-form-label">Tape:</label>
                    <input type="text" required class="form-control" name="tape">
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
                <h1>ข้อมูล Tape</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tape" data-bs-whatever="@mdo">Add Tape</button>
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
                    <th scope="col" style="width: 70%;">Tape</th>
                    <th scope="col" style="width: 10%;">Edit</th>
                    <th scope="col" style="width: 10%;">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM tape");
                    $stmt->execute();
                    $tapes = $stmt->fetchAll();

                    if (!$tapes) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($tapes as $tape)  {  
                ?>
                    <tr>
                        <th scope="row"><?php echo $tape['id']; ?></th>
                        <td><?php echo $tape['tape']; ?></td>
        
                        <td>
                            <a href="edit_tape.php?id=<?php echo $tape['id']; ?>" class="btn btn-warning">Edit</a>
                           
                        </td>
                        <td>
                         <a onclick="return confirm('Are you sure you want to delete?');" href="tape_del.php?act=dle&id=<?php echo $tape['id']; ?>" class="btn btn-danger">Delete</a>
                         </td>
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>


<?php 
 //คิวรี่ข้อมูลมาแสดงในตาราง
 include 'config/db.php';
    $stmt = $conn->prepare("SELECT* FROM peeling");
    $stmt->execute();
    $peelings = $stmt->fetchAll();
?>

    <div class="modal fade" id="peeling" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Peeling</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_peeling.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="peeling" class="col-form-label">peeling:</label>
                    <input type="text" required class="form-control" name="peeling">
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
                <h1>ข้อมูล Peeling</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#peeling" data-bs-whatever="@mdo">Add Peeling</button>
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
                    <th scope="col" style="width: 70%;">Peeling</th>
                    <th scope="col" style="width: 10%;">Edit</th>
                    <th scope="col" style="width: 10%;">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM peeling");
                    $stmt->execute();
                    $peelings = $stmt->fetchAll();

                    if (!$peelings) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($peelings as $peeling)  {  
                ?>
                    <tr>
                        <th scope="row"><?php echo $peeling['id']; ?></th>
                        <td><?php echo $peeling['peeling']; ?></td>
        
                        <td>
                            <a href="edit_peeling.php?id=<?php echo $peeling['id']; ?>" class="btn btn-warning">Edit</a>
                           
                        </td>
                        <td>
                         <a onclick="return confirm('Are you sure you want to delete?');" href="peeling_del.php?act=dle&id=<?php echo $peeling['id']; ?>" class="btn btn-danger">Delete</a>
                         </td>
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>

    <?php 
 //คิวรี่ข้อมูลมาแสดงในตาราง
 include 'config/db.php';
    $stmt = $conn->prepare("SELECT* FROM break");
    $stmt->execute();
    $breaks = $stmt->fetchAll();
?>

    <div class="modal fade" id="Crack" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Crack </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_break.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="break" class="col-form-label">Crack:</label>
                    <input type="text" required class="form-control" name="break">
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
                <h1>ข้อมูล Crack</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Crack" data-bs-whatever="@mdo">Add Crack</button>
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
                    <th scope="col" style="width: 70%;">Crack </th>
                    <th scope="col" style="width: 10%;">Edit</th>
                    <th scope="col" style="width: 10%;">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM break");
                    $stmt->execute();
                    $breaks = $stmt->fetchAll();

                    if (!$breaks) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($breaks as $break)  {  
                ?>
                    <tr>
                        
                        <td><?php echo $break['id']; ?></td>
                        <td><?php echo $break['break']; ?></td>
                        <td>
                            <a href="edit_break.php?id=<?php echo $break['id']; ?>" class="btn btn-warning">Edit</a>
                           
                        </td>
                        <td>
                         <a onclick="return confirm('Are you sure you want to delete?');" href="break_del.php?act=dle&id=<?php echo $break['id']; ?>" class="btn btn-danger">Delete</a>
                         </td>
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>


    <?php 
 //คิวรี่ข้อมูลมาแสดงในตาราง
 include 'config/db.php';
    $stmt = $conn->prepare("SELECT* FROM abruptly");
    $stmt->execute();
    $abruptlys = $stmt->fetchAll();
?>

    <div class="modal fade" id="Wrinkle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Wrinkle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_abruptly.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="abruptly" class="col-form-label">Wrinkle:</label>
                    <input type="text" required class="form-control" name="abruptly">
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
                <h1>ข้อมูล Wrinkle</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Wrinkle" data-bs-whatever="@mdo">Add Wrinkle</button>
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
                    <th scope="col" style="width: 70%;">Wrinkle</th>
                    <th scope="col" style="width: 10%;">Edit</th>
                    <th scope="col" style="width: 10%;">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM abruptly");
                    $stmt->execute();
                    $abruptlys = $stmt->fetchAll();

                    if (!$abruptlys) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($abruptlys as $abruptly)  {  
                ?>
                    <tr>
                        
                        <td><?php echo $abruptly['id']; ?></td>
                        <td><?php echo $abruptly['abruptly']; ?></td>
                        <td>
                            <a href="edit_abruptly.php?id=<?php echo $abruptly['id']; ?>" class="btn btn-warning">Edit</a>
                           
                        </td>
                        <td>
                         <a onclick="return confirm('Are you sure you want to delete?');" href="abruptly_del.php?act=dle&id=<?php echo $abruptly['id']; ?>" class="btn btn-danger">Delete</a>
                         </td>
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>




    <?php 
 //คิวรี่ข้อมูลมาแสดงในตาราง
 include 'config/db.php';
    $stmt = $conn->prepare("SELECT* FROM cx");
    $stmt->execute();
    $cxs = $stmt->fetchAll();
?>
    <div class="modal fade" id="cx" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add CX  </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_cx.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="cx" class="col-form-label"> CX:</label>
                    <input type="text" required class="form-control" name="cx">
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
                <h1>ข้อมูล  CX </h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cx" data-bs-whatever="@mdo">Add CX </button>
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
                    <th scope="col" style="width: 70%;"> CX </th>
                    <th scope="col" style="width: 10%;">Edit</th>
                    <th scope="col" style="width: 10%;">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM cx");
                    $stmt->execute();
                    $cxs = $stmt->fetchAll();

                    if (!$cxs) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($cxs as $cx)  {  
                ?>
                    <tr>
                        
                        <td><?php echo $cx['id']; ?></td>
                        <td><?php echo $cx['cx']; ?></td>
                        <td>
                            <a href="edit_cx.php?id=<?php echo $cx['id']; ?>" class="btn btn-warning">Edit</a>
                           
                        </td>
                        <td>
                         <a onclick="return confirm('Are you sure you want to delete?');" href="cx_del.php?act=dle&id=<?php echo $cx['id']; ?>" class="btn btn-danger">Delete</a>
                         </td>
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>


    <?php 
 //คิวรี่ข้อมูลมาแสดงในตาราง
 include 'config/db.php';
    $stmt = $conn->prepare("SELECT* FROM cc");
    $stmt->execute();
    $ccs = $stmt->fetchAll();
?>

    <div class="modal fade" id="cc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add CC  </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_cc.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="cc" class="col-form-label"> CC :</label>
                    <input type="text" required class="form-control" name="cc">
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
                <h1>ข้อมูล  CC </h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cc" data-bs-whatever="@mdo">Add CC </button>
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
                    <th scope="col" style="width: 70%;"> CC </th>
                    <th scope="col" style="width: 10%;">Edit</th>
                    <th scope="col" style="width: 10%;">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM cc");
                    $stmt->execute();
                    $ccs = $stmt->fetchAll();

                    if (!$ccs) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($ccs as $cc)  {  
                ?>
                    <tr>
                        
                        <td><?php echo $cc['id']; ?></td>
                        <td><?php echo $cc['cc']; ?></td>
                        <td>
                            <a href="edit_cc.php?id=<?php echo $cc['id']; ?>" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                         <a onclick="return confirm('Are you sure you want to delete?');" href="cc_del.php?act=dle&id=<?php echo $cc['id']; ?>" class="btn btn-danger">Delete</a>
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































</body>
</html>
