<?php session_start(); // เปิดใช้งาน session ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP login</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/dist/css/style.css" rel="stylesheet">
</head>

<body class="text-center">



    <div class="card card-info" align="center">
        <form action="login_action.php" method="post">
            <h1>
            </h1>
             <img class="mt-4" src="img/123.jpg" alt="" width="230" height="230">
         
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <P></P>
            <div class="col-md-4">
                <label for="floatingInput">Username</label> 
                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username">
            </div>
            <div class="col-md-4"> 
                <label for="floatingPassword">Password</label>
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
               
            </div>
             <p></p>
            <button  type="submit" class="btn btn-primary"align="center">เข้าสู่ระบบ</button>
            
            

        
        </form>
        <div align="center">
         <a> &copy; 2023 </a>
         </div>
    
    
      </main>
  </div>


      <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>

