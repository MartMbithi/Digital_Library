<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php");?>

<body>
<div id="loader-wrapper">
	<div id="loader"></div>

	<div class="loader-section section-left"></div>
	<div class="loader-section section-right"></div>

</div>
<!--WRAPPER START-->
<div class="wrapper">
	<!--HEADER START-->
	<header class="header-1">
    	<div class="top-strip">
        	<div class="container">
            	<div class="pull-left">
                	<p>Welcome to iLibrary The Digital Library Management System</p>
                </div>
            	<ul class="my-account">
                        
                        <li><a href="lib_user/"><i class="fa fa-user"></i> My Account</a></li>
                        
                        <li><a target = "_blank" href="librarian/"><i class="fa fa-sign-in"></i> Librarian</a></li>
                        <li><a target = "_blank"  href="sudo/pages_sudo_index.php"><i class="fa fa-user-secret"></i> Super User</a></li>                        
                    </ul>
            </div>
        </div>

    </header>
    <!--HEADER END-->
    <!--BANNER START-->
    <div class="kode-banner">
    	<ul class="bxslider">
        	<li>
            	<img src="images/banner-1.png" alt="">
                <div class="kode-caption-2">
                	<h2>Digital Library Management System</h2>
                </div>
            </li>
            
            <li>
            	<img src="images/banner-3.png" alt="">
                <div class="kode-caption-2">
                	<h2>Digital Libray Management System</h2>
                    <p>Digital Library Management System is an open, editable library catalog, building towards a web page for every book ever published</p>
                    				
                </div>
            </li>
        </ul>
    </div>
    
    <!--BANNER END-->
    <!--BUT NOW START-->
	<div class="search-section">
		<div class="container">
			<!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
				<li role="presentation"><a href="lib_user/">Library User</a></li>
				<li role="presentation" class="active"><a href="librarian/">Librarian</a></li>
				<li role="presentation"><a href="sudo/pages_sudo_index.php" >Administrator</a></li>
			  </ul>
			
			 
		</div>
	</div>
	<!--BUT NOW END-->
    <!--CONTENT START-->
    <div class="kode-content">
    	
    </div>
    <!--CONTENT END-->
    <footer class="footer-2">
    	<div class="container">
        	<div class="lib-copyrights">
                <p>Copyrights © <?php echo date('Y');?>  Digital Library Management System. All rights reserved. This Template made with <i class="fa fa-heartbeat"></i> <i class="fa fa-coffee"></i> by <a target="_blank" href="martmbithi.github.io">MartDevelopers</a></p>
                <div class="social-icon">
                	<ul>
                    	<li><a href="#" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" title="Tumblr"><i class="fa fa-tumblr"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
<!--WRAPPER END-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/modernizr.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="js/bootstrap-slider.js"></script>
<script src="js/waypoints.min.js"></script> 
<script src="js/jquery.counterup.min.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/dl-menu/modernizr.custom.js"></script>
<script src="js/dl-menu/jquery.dlmenu.js"></script>
<script type="text/javascript" src="lib/hash.js"></script>
<script type="text/javascript" src="lib/booklet-lib.js"></script>
<script src="js/jquerypp.custom.js"></script>
<script src="js/jquery.bookblock.js"></script>
<script src="js/functions.js"></script>
</body>

</html>
