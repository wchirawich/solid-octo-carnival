<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hard Coat Test Report</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<?php 
 //คิวรี่ข้อมูลมาแสดงในตาราง
 include_once('config/db.php');
    $stmt = $conn->prepare("SELECT* FROM cc");
    $stmt->execute();
    $ccs = $stmt->fetchAll();
?>
<?php include("menu_host.php"); ?>  
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <section class="content">
      <div class="container-fluid">

    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-whatever="@mdo">Add CC </button>
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

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php include("nav_cc_host.php"); ?>  
</section>
</main>
</div>
</body>
</html>
