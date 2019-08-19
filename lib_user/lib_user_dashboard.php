<!--PHP CODE TO GET SESSION-->
<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

?>
<!--------------------->

<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php");?>



<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("includes/navbar.php");?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
       <?php include("includes/headbar.php");?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <?php
            $aid=$_SESSION['client_id'];
            $ret="select * from client where client_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
      	 //$cnt=1;
      	   while($row=$res->fetch_object())
      	  {
      	  	?>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-secret fa-sm text-white-50"></i> <?php echo $row->username;?></a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                                <?php
                                //code for getting all Books
                                $result ="SELECT count(*) FROM book ";
                                $stmt = $mysqli->prepare($result);
                                $stmt->execute();
                                $stmt->bind_result($book);
                                $stmt->fetch();
                                $stmt->close();
                                ?>
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Available Books</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $book;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                                <?php
                                //code for getting all Books
                                $result ="SELECT count(*) FROM book_category ";
                                $stmt = $mysqli->prepare($result);
                                $stmt->execute();
                                $stmt->bind_result($book_c);
                                $stmt->fetch();
                                $stmt->close();
                                ?>
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Book Categories</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $book_c;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-cogs fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Borrowed Books</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">1</div>
                        </div>
                        <div class="col">
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Book Returns</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">My Library Usage Trend</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Books Categories</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    

                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>

          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include("includes/footer.php");?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Its Pleasure To Have You As Our Library User.....See You Soon.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="includes/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script>
                        // Set new default font family and font color to mimic Bootstrap's default styling
                        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                        Chart.defaults.global.defaultFontColor = '#858796';

                        // Pie Chart Example
                        var ctx = document.getElementById("myPieChart");
                        var myPieChart = new Chart(ctx, {
                          type: 'doughnut',
                          data: {
                            labels: ["Arts| Music", "Biographies", "Comics", "Computer| Tech", "Fiction", "Science Fiction"],
                            datasets: [{
                                                <?php
                                                //code for getting all books under Arts category
                                                $result ="SELECT count(*)  FROM book where category = 'Arts | Music'  ";
                                                $stmt = $mysqli->prepare($result);
                                                $stmt->execute();
                                                $stmt->bind_result($arts);
                                                $stmt->fetch();
                                                $stmt->close();?>

                                                <?php
                                                //code for getting all books under Biography category
                                                $result ="SELECT count(*)  FROM book where category = 'Biography'  ";
                                                $stmt = $mysqli->prepare($result);
                                                $stmt->execute();
                                                $stmt->bind_result($bio);
                                                $stmt->fetch();
                                                $stmt->close();?>

                                                <?php
                                                //code for getting all books under Comics category
                                                $result ="SELECT count(*)  FROM book where category = 'Comics'  ";
                                                $stmt = $mysqli->prepare($result);
                                                $stmt->execute();
                                                $stmt->bind_result($comics);
                                                $stmt->fetch();
                                                $stmt->close();?>

                                                <?php
                                                //code for getting all books under Computer category
                                                $result ="SELECT count(*)  FROM book where category = 'Computer | Tech'  ";
                                                $stmt = $mysqli->prepare($result);
                                                $stmt->execute();
                                                $stmt->bind_result($compTech);
                                                $stmt->fetch();
                                                $stmt->close();?>

                                                <?php
                                                //code for getting all books under  Fiction  category
                                                $result ="SELECT count(*)  FROM book where category = 'Fiction'  ";
                                                $stmt = $mysqli->prepare($result);
                                                $stmt->execute();
                                                $stmt->bind_result($fiction);
                                                $stmt->fetch();
                                                $stmt->close();?>

                                                <?php
                                                //code for getting all books under sci fi Category category
                                                $result ="SELECT count(*)  FROM book where category = 'Science Fiction'  ";
                                                $stmt = $mysqli->prepare($result);
                                                $stmt->execute();
                                                $stmt->bind_result($scifi);
                                                $stmt->fetch();
                                                $stmt->close();?>


                              data: [<?php echo $arts;?>,
                                     <?php echo $bio;?>,
                                     <?php echo $comics;?>,
                                     <?php echo $compTech;?>,
                                     <?php echo $fiction;?>,
                                     <?php echo $scifi;?>],
                              backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#1cc88a','#4e73df', '#1cc88a'],
                              hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#2e59d9','#17a673', '#2c9faf' ],
                              hoverBorderColor: "rgba(234, 236, 244, 1)",
                            }],
                          },
                          options: {
                            maintainAspectRatio: false,
                            tooltips: {
                              backgroundColor: "rgb(255,255,255)",
                              bodyFontColor: "#858796",
                              borderColor: '#dddfeb',
                              borderWidth: 1,
                              xPadding: 15,
                              yPadding: 15,
                              displayColors: false,
                              caretPadding: 10,
                            },
                            legend: {
                              display: false
                            },
                            cutoutPercentage: 80,
                          },
                        });

  </script>

</body>

          <?php }?>
</html>
