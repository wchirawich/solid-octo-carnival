
<?php include_once('config/db.php');?> 
<?php  include("menu_qp.php"); ?> 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">STATUS LENS NON TINT</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
  
        <table class="table">
          <thead>
            <tr>
              <th scope="col">BatchGenQC</th>
                <th scope="col" >Hc Lacker</th>
                <th scope="col" ></th>
                <th scope="col" >Tape Test</th>
                <th scope="col" ></th>
                <th scope="col" >Steel Wool</th>
                <th scope="col" ></th>
                <th scope="col" >Boiling</th>
                <th scope="col" ></th>
            </tr>
          </thead>
          <tbody>
          <?php 
                    $stmt = $conn->query("SELECT * FROM tracking");
                    $stmt->execute();
                    $trackings = $stmt->fetchAll();

                    if (!$trackings) {
                      echo "<p><td colspan='11' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($trackings as $tracking)  {  
                ?>
                    <tr>
                    <th scope="row"><?php echo $tracking['BatchGenQC']; ?></th>
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
                      
                        </tr>
                <?php }  } ?>
          </tbody>
        </table>
      
      <h1 class="h2">STATUS LENS TINT</h1>
      
        <table class="table ">
          <thead>
            <tr>
              <th scope="col">BatchGenQC</th>
                <th scope="col" >MonomerHC</th>
                <th scope="col" ></th>
                <th scope="col" >Tape Test</th>
                <th scope="col" ></th>
                <th scope="col" >Steel Wool</th>
                <th scope="col" ></th>
                <th scope="col" >Boiling</th>
                <th scope="col" ></th>
                <th scope="col" >Tint</th>
                <th scope="col" ></th>
            </tr>
          </thead>
          <tbody>
          <?php 
                    $stmt = $conn->query("SELECT * FROM tracking_tint");
                    $stmt->execute();
                    $trackings = $stmt->fetchAll();

                    if (!$trackings) {
                        echo "<p><td colspan='11' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($trackings as $tracking)  {  
                ?>
                    <tr>
                    <th scope="row"><?php echo $tracking['BatchGenQC']; ?></th>
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
                        </tr>
                <?php }  } ?>
          </tbody>
        </table>
      

      </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
