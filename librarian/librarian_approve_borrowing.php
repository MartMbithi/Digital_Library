<?php
session_start();
include('includes/config.php');
    if(isset($_POST['approve_borr']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $bookname=$_POST['bookname'];
    $isbn_number=$_POST['isbn_number'];
    $date_issued=$_POST['date_issued'];
    $status=($_POST['status']);
       

//sql to inset the values to the database
    $query="insert into book_issues (fname, lname, bookname, isbn_number, date_issued, status ) values(?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    //bind the submitted values with the matching columns in the database.
    $rc=$stmt->bind_param('ssssss',$fname, $lname, $bookname, $isbn_number, $date_issued, $status);
    $stmt->execute();
    //if binding is successful, then indicate that a new value has been added.
    echo"<script>alert('Success! Approved Book Borrowing ');</script>";
}
?>

<!doctype html>
<html class="no-js" lang="en">

<?php include("includes/header.php");?>

<body class="materialdesign">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Header top area start-->
    <div class="wrapper-pro">
        <?php include("includes/navbar.php");?>
        <!-- Header top area start-->
        <div class="content-inner-all">
            <?php include("includes/headbar.php");?>
            <!-- Header top area end-->
            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
												<input type="text" placeholder="Search..." class="form-control">
												<a href=""><i class="fa fa-search"></i></a>
											</form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Issue Books</span> /
                                            </li>
                                            <li><span class="bread-blod">Approve Borrowing </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
            <!-- Mobile Menu start -->
           <?php include("includes/mobile_navbar.php");?>
            <!-- Mobile Menu end -->
            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 des-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
												<input type="text" placeholder="Search..." class="form-control">
												<a href=""><i class="fa fa-search"></i></a>
											</form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="librarian_dashboard.php">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Issue Books </span>/
                                            </li>
                                            <li><span class="bread-blod">Approve Borrowing</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
            <!-- Basic Form Start -->
            <div class="basic-form-area mg-b-15">
                <div class="container-fluid">
                   
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline12-list shadow-reset mg-t-30">
                                <div class="sparkline12-hd">
                                    <div class="main-sparkline12-hd">
                                        <h1>Fill All Details:</h1>
                                        <div class="sparkline12-outline-icon">
                                            <span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline12-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline12-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                        <div class="col-lg-12">
                                                <div class="all-form-element-inner">
                                                <?php	
                                                $id=$_GET['client_id'];
                                                $ret="select * from client where client_id=?";
                                                //code for getting rooms using a certain id
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->bind_param('i',$id);
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                //$cnt=1;
                                                while($row=$res->fetch_object())
                                                {
                                                    ?>
                                                    <form  method ="POST"  enctype="multipart/form-data" action="#">
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Library User First Name</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text"  value="<?php echo $row->fname;?>" readonly name= "fname" id="fname" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Library User Last Name</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text"  value="<?php echo $row->lname;?>" readonly  name= "lname" id="lname" required class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Library User  National ID Number | Student Admn Number</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" value="<?php echo $row->id_no;?>" readonly  name= "id_no" id="id_no" required class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Library User Email <Address></Address></label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="email"  value="<?php echo $row->email;?>" readonly  name= "email" id="email" required class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Borrowed Book</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text"  name= "book_name" hide id="book_name" value="<?php echo $row->book_name;?>" readonly required class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Borrowed Book Category</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text"  name= "category" id="category" value="<?php echo $row->category;?>" readonly required class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Book ISBN Number</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text"  name= "isbn_no" hide id="isbn_no" value="<?php echo $row->isbn_no;?>" readonly required class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Book Status</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text"  name= "book_status" hide id="book_status" value="Approved" readonly required class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group-inner">
                                                            <div class="login-btn-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3"></div>
                                                                    <div class="col-lg-9">
                                                                        <div class="login-horizental cancel-wp pull-left">
                                                                            <button class="btn btn-white" type="submit">Cancel</button>
                                                                            <button class="btn btn-sm btn-primary login-submit-cs" type="submit" name="approve_borrowing">Approve Borrowing</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Form End-->

        </div>
    </div>
    <!-- Footer Start-->
    <?php include("includes/footer.php");?>
    <!-- Footer End-->
    
    <
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <!-- modal JS
		============================================ -->
    <script src="js/modal-active.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>