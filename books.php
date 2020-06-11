<?php
 require_once('sudo/assets/config/config.php');
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Books - Digital Library - Automated and digital ways of mantaining libraries</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/ico" href="images/favicon.png" />

    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/icofont.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/cardslider.css">
    <link rel="stylesheet" href="css/responsiveslides.css">

    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/overright.css">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body data-spy="scroll" data-target="#mainmenu" data-offset="50">
   
    <header class="relative" id="sc1">
        <!-- Header-background-markup -->
        <div class="overlay-bg relative">
            <img src="images/slide/slide1.jpg" alt="">
        </div>
        <!-- Mainmenu-markup-start -->
        <div class="mainmenu-area navbar-fixed-top" data-spy="affix" data-offset-top="10">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-header">
                        <div class="space-10"></div>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainmenu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!--Logo-->
                        <a href="#sc1" class="navbar-left show"><img src="images/logo.png" alt="library"></a>
                        <div class="space-10"></div>
                    </div>
                    <!--Toggle-button-->

                    <!--Mainmenu list-->
                    <div class="navbar-right in fade" id="mainmenu">
                        <ul class="nav navbar-nav nav-white text-uppercase">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="books.php">Books</a>
                            </li>
                            <li>
                                <a href="lib_user/pages_std_index.php">Library User Login</a>
                            </li>
                            <li>
                                <a href="staff/pages_staff_index.php">Staff Login</a>
                            </li>
                            <li>
                                <a href="sudo/pages_sudo_index.php">Admin Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="space-100"></div>
        <!-- Mainmenu-markup-end -->
        <!-- Header-jumbotron -->
        <div class="space-100"></div>
        <div class="header-text">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-center">
                        <div class="jumbotron">
                            <h1 class="text-white">Choose Your Book and Proceed To Borrowing It</h1>
                        </div>
                        <div class="title-bar white">
                            <ul class="list-inline list-unstyled">
                                <li><i class="icofont icofont-square"></i></li>
                                <li><i class="icofont icofont-square"></i></li>
                            </ul>
                        </div>
                        <div class="space-40"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-100"></div>
        <!-- Header-jumbotron-end -->
    </header>
    <section>
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-10 pull-right">
                    <h4>Search Box</h4>
                    <div class="space-5"></div>
                    <form action="books.php">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter book name">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="icofont icofont-search-alt-2"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="space-30"></div>
                    <div class="row">
                        <div class="pull-right col-xs-12 col-sm-7 col-md-6">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-xs-4" for="sort">Sont By : </label>
                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            <select name="sort" id="sort" class="form-control">
                                                <option value="">Best Match</option>
                                                <option value="">Best Book</option>
                                                <option value="">Latest Book</option>
                                                <option value="">Old Book</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="space-20"></div>
                    <div class="row">
                        <!--Books-->
                        <?php
                            $ret="SELECT * FROM  iL_Books"; 
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->execute() ;//ok
                            $res=$stmt->get_result();
                            while($row=$res->fetch_object())
                            {
                                /*
                                if($row->b_coverimage == '')
                                {
                                    $cover_image = "<img src='sudo/assets/img/books/Image12.jpg'  class='media-object'  alt='Book Image'>";
                                }
                                else
                                {
                                 $cover_image = "<img src='sudo/assets/img/books/$row->b_coverimage'  class='media-object' alt='Book Image'>";
                                }
                                */
                                
                        ?>
                            <div class="col-xs-12 col-md-6">
                                <div class="category-item well yellow">
                                    <div class="media">
                                        <div class="media-left">
                                        </div>
                                        <div class="media-body">
                                            <h5><?php echo $row->b_title;?></h5>
                                            <h6>By <?php echo $row->b_author;?></h6>
                                            <h6>Category: <?php echo $row->bc_name;?></h6>
                                            <div class="space-10"></div>
                                            <ul class="list-inline list-unstyled rating-star">
                                                <li class="active"><i class="icofont icofont-star"></i></li>
                                                <li class="active"><i class="icofont icofont-star"></i></li>
                                                <li class="active"><i class="icofont icofont-star"></i></li>
                                                <li class="active"><i class="icofont icofont-star"></i></li>
                                                <li><i class="icofont icofont-star"></i></li>
                                            </ul>
                                            <div class="space-10"></div>
                                            <a href="book.php?book_id=<?php echo $row->b_id;?>" class="text-primary">View Book</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        <!--Book-->

                    </div>
                    <div class="space-60"></div>
                </div>
                <!-- Sidebar-Start -->
                <div class="col-xs-12 col-md-2">
                    <aside>
                        <h3><i class="icofont icofont-filter"></i> Filter By</h3>
                        <div class="space-30"></div>
                        <div class="sigle-sidebar">
                            <h4>Book Category</h4>
                            <hr>
                            <ul class="list-unstyled menu-tip">
                            <?php
                                //Fetch all book categories
                                $ret="SELECT * FROM  iL_BookCategories"; 
                                $stmt= $mysqli->prepare($ret) ;
                                $stmt->execute() ;//ok
                                $res=$stmt->get_result();
                                while($row=$res->fetch_object())
                                {
                            ?>
                                <li><a href="#"><?php echo $row->bc_name;?></a></li>
                            <?php }?>
                            </ul>
                            <a href="#" class="btn btn-primary btn-xs">See All</a>
                        </div>
                        <div class="space-20"></div>
                    </aside>
                </div>
                <!-- Sidebar-End -->
            </div>
        </div>
        <div class="space-80"></div>
    </section>

    <!--Footer-->
    <?php require_once('partials/footer.php');?>
    <!-- Footer-Area-End -->

    <!-- Vandor-JS -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <!-- Plugin-JS -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/responsiveslides.min.js"></script>
    <script src="js/jquery.cardslider.min.js"></script>
    <script src="js/pagination.js"></script>
    <script src="js/scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/plugins.js"></script>
    <!-- Active-JS -->
    <script src="js/main.js"></script>

</body>


</html>