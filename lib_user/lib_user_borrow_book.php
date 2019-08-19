<?php
session_start();
include('includes/config.php');

    if(isset($_POST['lib_user_borrow_book']))
{
    $cid=$_SESSION['client_id'];
    $book_name=$_POST['book_name'];
    $category=$_POST['category'];
    $isbn_no=$_POST['isbn_no'];
    $date_borrowed=$_POST['date_borrowed'];
   

//sql to inset the values to the database
    $query="update client set  book_name=?, category=?, isbn_no=?, date_borrowed=? where client_id=?";
    $stmt = $mysqli->prepare($query);
    //bind the submitted values with the matching columns in the database.
    $rc=$stmt->bind_param('ssssi',$book_name, $category, $isbn_no, $date_borrowed, $cid);
    $stmt->execute();
    //if binding is successful, then indicate that a new value has been added.
    echo"<script>alert('Success! You Have Borrowed This Book');</script>";
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
        
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard / Profile / Update </h1>
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
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-secret fa-sm text-white-50"></i> <?php echo $row->username;?></a><?php }?>
          </div>

         <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <?php	
                $id=$_GET['id'];
                $ret="select * from book where id=?";
                //code for getting rooms using a certain id
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$id);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
                {
                                                    ?>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Borrow <?php echo $row->name;?></h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  
              
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Book Title</label>
                        <input type="text" class="form-control" readonly name="book_name" id="book_name" aria-describedby="emailHelp" value="<?php echo $row->name;?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Book Category</label>
                        <input type="text"  class="form-control"  readonly name="category" id="category" aria-describedby="emailHelp"  value="<?php echo $row->category;?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ISBN Number</label>
                        <input type="text" readonly  name="isbn_no" readonly class="form-control" id="isbn_no" aria-describedby="emailHelp" value="<?php echo $row->isbn_no;?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Date Borrowed</label>
                        <input type="text"   name="date_borrowed"   class="form-control" id="date_borrowed" value="<?php echo date('M D Y');?>" aria-describedby="emailHelp">
                    </div>
                    
                    
                   
                    <input type="submit" name="lib_user_borrow_book" class="btn btn-primary" value="Borrow Book" /> 
                </form>
            <?php }?>
                  
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

</html>
