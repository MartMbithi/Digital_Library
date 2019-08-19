<?php
session_start();
include('includes/config.php');

    if(isset($_POST['lib_user_update_profile']))
{
    $id=$_SESSION['client_id'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $id_no=$_POST['id_no'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=sha1($_POST['password']);
    //$acc_status=$_POST['acc_status'];
    $dpic=$_FILES["dpic"]["name"];
    move_uploaded_file($_FILES["dpic"]["tmp_name"],"img/".$_FILES["dpic"]["name"]);
    

//sql to inset the values to the database
    $query="update client set  fname=?, lname=?, id_no=?, email=?, username=?, password=?, dpic=?  where client_id=?";
    $stmt = $mysqli->prepare($query);
    //bind the submitted values with the matching columns in the database.
    $rc=$stmt->bind_param('sssssssi',$fname, $lname, $id_no, $email, $username, $password, $dpic, $id);
    $stmt->execute();
    //if binding is successful, then indicate that a new value has been added.
    echo"<script>alert('Success! Profile Updated ');</script>";
}
?>

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
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard / Catalog / Comics  </h1>
           
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-secret fa-sm text-white-50"></i> <?php echo $row->username;?></a>
          </div>

         <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Book ISBN Number</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php
                    
                    $ret="SELECT * FROM book where category = 'Comics' ";
                    $stmt= $mysqli->prepare($ret) ;
                    //$stmt->bind_param('i',$aid);
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    $cnt=1;
                    while($row=$res->fetch_object())
                        {
                        ?>
                    <tbody>
                        <tr>
                        <th scope="row"><?php echo $cnt;?></th>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->isbn_no;?></td>
                        <td><a  class="btn btn-outline-success"  href='lib_user_borrow_book.php?id=<?php echo $row->id;?>'>Borrow</a></td>
                        </tr>
                       
                    </tbody>
                    <?php $cnt=$cnt+1; } ?>
                </table>
                 
                  
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


</body>

          <?php }?>
</html>
