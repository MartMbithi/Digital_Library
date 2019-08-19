<!--PHP CODE TO GET SESSION-->
<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

?>
<!--------------------->
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
            
            <!-- Header top area end-->
            <?php include("includes/headbar.php");?>
            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list map-mg-t-40-gl shadow-reset">
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
                                            <li><a href="admin_dashboard.php">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod"> Admin Dashboard</span>
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
            <div class="breadcome-area des-none mg-b-30">
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
                                            <li><span class="bread-blod">Dashboard</span>
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
            <!-- income order visit user Start -->
            <div class="income-order-visit-user-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="income-dashone-total shadow-reset nt-mg-b-30">
                                <?php
                                //code for getting all library employees
                                $result ="SELECT count(*) FROM librarian ";
                                $stmt = $mysqli->prepare($result);
                                $stmt->execute();
                                $stmt->bind_result($employees);
                                $stmt->fetch();
                                $stmt->close();
                                ?>
                                <div class="income-title">
                                    <div class="main-income-head">
                                        <h2>Library </h2>
                                        <div class="main-income-phara">
                                            <p>Employees</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="income-dashone-pro">
                                    <div class="income-rate-total">
                                        <div class="price-adminpro-rate">
                                            <h3><span></span><span class="counter"><?php echo $employees;?></span></h3>
                                        </div>
                                        <div class="price-graph">
                                            <span id="sparkline1"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="income-dashone-total shadow-reset nt-mg-b-30">
                            <?php
                                //code for getting all Book Categories
                                $result ="SELECT count(*) FROM book_category ";
                                $stmt = $mysqli->prepare($result);
                                $stmt->execute();
                                $stmt->bind_result($b_cat);
                                $stmt->fetch();
                                $stmt->close();
                                ?>
                                <div class="income-title">
                                    <div class="main-income-head">
                                        <h2>Book </h2>
                                        <div class="main-income-phara order-cl">
                                            <p>Categories</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="income-dashone-pro">
                                    <div class="income-rate-total">
                                        <div class="price-adminpro-rate">
                                            <h3><span class="counter"><?php echo $b_cat;?></span></h3>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="income-dashone-total shadow-reset nt-mg-b-30">
                            <?php
                                //code for getting all Book Categories
                                $result ="SELECT count(*) FROM client ";
                                $stmt = $mysqli->prepare($result);
                                $stmt->execute();
                                $stmt->bind_result($lib_users);
                                $stmt->fetch();
                                $stmt->close();
                                ?>
                                <div class="income-title">
                                    <div class="main-income-head">
                                        <h2>Library</h2>
                                        <div class="main-income-phara visitor-cl">
                                            <p>Users</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="income-dashone-pro">
                                    <div class="income-rate-total">
                                        <div class="price-adminpro-rate">
                                            <h3><span class="counter"><?php echo $lib_users;?></span></h3>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="income-dashone-total shadow-reset nt-mg-b-30">
                            <?php
                                //code for getting all Book Categories
                                $result ="SELECT count(*) FROM client WHERE acc_status = 'Approved' ";
                                $stmt = $mysqli->prepare($result);
                                $stmt->execute();
                                $stmt->bind_result($verified_lib_users);
                                $stmt->fetch();
                                $stmt->close();
                                ?>
                                <div class="income-title">
                                    <div class="main-income-head">
                                        <h2> Active Library </h2>
                                        <div class="main-income-phara low-value-cl">
                                            <p>Users </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="income-dashone-pro">
                                    <div class="income-rate-total">
                                        <div class="price-adminpro-rate">
                                            <h3><span class="counter"><?php echo $verified_lib_users;?></span></h3>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- income order visit user End -->
            <div class="dashtwo-order-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashtwo-order-list shadow-reset">
                                <div class="row">

                                <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>                                
                                <script>
                            window.onload = function () {

                            var chart = new CanvasJS.Chart("chartContainer", {
                                theme: "light2",
                                animationEnabled: true,
                                title: {
                                    text: "Percentage Of Available Books By Category"
                                },
                                subtitles: [{
                                    text: "Digital Library Management System, <?php echo date ('Y');?>",
                                    fontSize: 16
                                }],
                                data: [{
                                        type: "pie",
                                        indexLabelFontSize: 18,
                                        radius: 80,
                                        indexLabel: "{label} - {y}",
                                        yValueFormatString: "###0.0'%'",
                                        click: explodePie,
                                        dataPoints: [
                                            { y:
                                                <?php
                                                //code for getting all books under fiction category
                                                $result ="SELECT count(*)  FROM book where category = 'Fiction'  ";
                                                $stmt = $mysqli->prepare($result);
                                                $stmt->execute();
                                                $stmt->bind_result($fiction);
                                                $stmt->fetch();
                                                $stmt->close();?>
                                                <?php echo $fiction;?> , label: "Fiction" },

                                            { y: 
                                                <?php
                                                //code for getting all books under Business category
                                                $result ="SELECT count(*)  FROM book where category = 'Business'  ";
                                                $stmt = $mysqli->prepare($result);
                                                $stmt->execute();
                                                $stmt->bind_result($bussiness);
                                                $stmt->fetch();
                                                $stmt->close();?>
                                                <?php echo $bussiness;?> , label: "Business"},


                                            { y: 
                                                <?php
                                                //code for getting all books under Biography category
                                                $result ="SELECT count(*)  FROM book where category = 'Biography'  ";
                                                $stmt = $mysqli->prepare($result);
                                                $stmt->execute();
                                                $stmt->bind_result($bio);
                                                $stmt->fetch();
                                                $stmt->close();?>
                                                <?php echo $bio;?>, label: "Biography" },

                                                { y: 
                                                <?php
                                                //code for getting all books under Arts And MUsic Category category
                                                $result ="SELECT count(*)  FROM book where category = 'Arts | Music'  ";
                                                $stmt = $mysqli->prepare($result);
                                                $stmt->execute();
                                                $stmt->bind_result($am);
                                                $stmt->fetch();
                                                $stmt->close();?>
                                                <?php echo $am;?>, label: "Arts | Music" },

                                                { y: 
                                                <?php
                                                //code for getting all books under Comics category
                                                $result ="SELECT count(*)  FROM book where category = 'Comics'  ";
                                                $stmt = $mysqli->prepare($result);
                                                $stmt->execute();
                                                $stmt->bind_result($comics);
                                                $stmt->fetch();
                                                $stmt->close();?>
                                                <?php echo $comics;?>, label: "Comics" },

                                                { y: 
                                                <?php
                                                //code for getting all books under Science Fiction category
                                                $result ="SELECT count(*)  FROM book where category = 'Science Fiction'  ";
                                                $stmt = $mysqli->prepare($result);
                                                $stmt->execute();
                                                $stmt->bind_result($scify);
                                                $stmt->fetch();
                                                $stmt->close();?>
                                                <?php echo $scify;?>, label: "Science Fiction" },



                                            { y: 
                                                <?php
                                                //code for getting all books under fiction category
                                                $result ="SELECT count(*)  FROM book where category = 'Computer And Tech'  ";
                                                $stmt = $mysqli->prepare($result);
                                                $stmt->execute();
                                                $stmt->bind_result($comptech);
                                                $stmt->fetch();
                                                $stmt->close();?>
                                                <?php echo $comptech;?>, label: "Computer And Tech" },
                                            
                                        ]
                                        }]
                                        
                                    });
                                    chart.render();

                                    function explodePie(e) {
                                        for(var i = 0; i < e.dataSeries.dataPoints.length; i++) {
                                            if(i !== e.dataPointIndex)
                                                e.dataSeries.dataPoints[i].exploded = false;
                                        }
                                    }
                                    
                                    }
                                    </script>
    
                                <!--
                                    <div class="col-lg-9">
                                        <div class="flot-chart flot-chart-dashtwo">
                                        <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                                       </div>
                                    </div>


                                    <div class="col-lg-3">
                                        <div class="skill-content-3">
                                            <div class="skill">
                                                <div class="progress">
                                                    <div class="lead-content">
                                                        <h3>2,346</h3>
                                                        <p>Total Books Borrowed</p>
                                                    </div>
                                                    <div class="progress-bar wow fadeInLeft" data-progress="95%" style="width: 95%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span>95%</span>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="lead-content">
                                                        <h3>9,346</h3>
                                                        <p>Total Library Users</p>
                                                    </div>
                                                    <div class="progress-bar wow fadeInLeft" data-progress="85%" style="width: 85%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>85%</span> </div>
                                                </div>
                                                <div class="progress progress-bt">
                                                    <div class="lead-content">
                                                        <h3>2,34,600</h3>
                                                        <p>Most Borrowed Book Category</p>
                                                    </div>
                                                    <div class="progress-bar wow fadeInLeft" data-progress="93%" style="width: 93%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>93%</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
           
            <!-- Transitions Start-->
            <div class="transition-world-area">
               
            </div>
            <!-- Transitions End-->
        </div>
    </div>
    <!-- Footer Start-->
    <?php include("includes/footer.php");?>
    <!-- Footer End-->

    <!-- Chat Box Start-->
    
    <!-- Chat Box End-->
    <!-- jquery
    
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
        <script src="js/canvasjs.min.js"></script>
        <script type="text/javascript" src="js/canvas/canvasjs.min.js"></script>  
        <script type="text/javascript" src="js/canvas/jquery.canvasjs.min.js"></script> 

    <!--PIE CHART JS------------------------------->
 
<!------------------------------------------------------->

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
    <!-- scrollUp JS
		============================================ -->
    <script src="js/wow/wow.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/jvectormap/jvectormap-active.js"></script>
    <!-- peity JS
		============================================ -->
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/flot/jquery.flot.spline.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/jquery.flot.pie.js"></script>
    <script src="js/flot/jquery.flot.symbol.js"></script>
    <script src="js/flot/jquery.flot.time.js"></script>
    <script src="js/flot/dashtwo-flot-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    
		<!--============================================ -->
    
</body>

</html>