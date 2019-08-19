<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

?>
<?
//delete or remove library user  php code
if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$adn="delete from book_category where id=?";
		$stmt= $mysqli->prepare($adn);
		$stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	   
        echo "<script>alert('Success! Category removed');</script>" ;
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
                                            <li><span class="bread-blod"> Book</span> /
                                            </li>
                                            <li><span class="bread-blod">Manage Book Category</span>
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
                                            <li><a href="admin_dashboard.php">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Book</span> /
                                            </li>
                                            <li><span class="bread-blod">Manage Book Category</span>
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
                            <div class="sparkline12-list shadow-reset  mg-t-30">
                                <div class="sparkline12-hd">
                                    <div class="main-sparkline12-hd">
                                        <h1>Book Category  Details :</h1>
                                        <div class="sparkline12-outline-icon">
                                            <span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline12-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="sparkline10-graph">
                                    <div class="static-table-list">
                                        <table class="table border-table">
                                            <thead>
                                            <tr>
                                                    <th>#</th>
                                                    <th>Category Name</th>
                                                    <th>Category Description</th>
                                                    <th>Action</th>
                                                                                                        
                                                </tr>
                                                </tr>
                                            </thead>
                                            <?php
                                            
                                            $ret="SELECT * FROM book_category ";
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
                                                <td><?php echo $cnt;?></td>
                                                    <td><?php echo $row->name;?></td>
                                                    <td><?php echo $row->description;?></td>
                                                    <td><a  class="fa fa-trash-o" href='librarian_manage_category.php?del=<?php echo $row->id;?>' onClick= "return confirm('Remove  This Record?');"></a>
                                                    <a  class="fa fa-check-circle"  href='librarian_update_category_record.php?id=<?php echo $row->id;?>'></a></td>


                                                    
                                                    
                                                </tr>
                                               
                                            </tbody>
                                            <?php $cnt=$cnt+1; } ?>
                                        </table>
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