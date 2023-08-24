
<?php include_once('config/db.php'); ?>  
<?php include("menu_host.php"); ?>  
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="register_action.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="u_fullname" class="col-form-label">Full Name:</label>
                    <input type="text" required class="form-control" name="u_fullname">
                </div>
                <div class="mb-3">
                    <label for="u_username" class="col-form-label">User Name:</label>
                    <input type="text" required class="form-control" name="u_username">
                </div>
                <div class="mb-3">
                    <label for="u_password" class="col-form-label">Password:</label>
                    <input type="u_password" required class="form-control" name="u_password">
                </div>
              
                <div class="form-group">
        <label for="u_level">ระดับผู้ใช้งาน <i class='bx bxs-user-pin'></i></label>
        <select name="u_level" class="form-control" required>
          <option value="">--เลือกระดับผู้ใช้งาน--</option>
          <option value="host">host</option>
          <option value="admin">admin</option>
          <option value="user">user</option>
        </select>
      </div>
                <p>
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
        <div class="row">
            <div class="col-md-6">
                <h1>ข้อมูล Account</h1>
            </div>
     <div class="col-md-6 d-flex justify-content-end">
      <form action="search_data.php" class="form-group my-3" method="POST">
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
                <th scope="col" >ID</th>
                <th scope="col">ชื่อ-นามสกุล</th>
                
                <th scope="col" >ชื่อผู้ใช้</th>
                <th scope="col">รหัสผ่าน</th>
                <th scope="col" >ระดับ</th>
                
                
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM user");
                    $stmt->execute();
                    $users = $stmt->fetchAll();

                    if (!$users) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($users as $user)  {  
                ?>
                    <tr>
                    <th scope="row"><?php echo $user['u_id']; ?></th>
                        <td><?php echo $user['u_fullname']; ?></td>
                        <td><?php echo $user['u_username']; ?></td>
                        <td><?php echo $user['u_password']; ?></td>
                        <td><?php echo $user['u_level']; ?></td>
    
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 0%;"></th>
                
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-whatever="@mdo">Add User</button>
            </div> 
  
</main>
  </div>
</div>


   
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>
