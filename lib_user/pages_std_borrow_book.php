<?php 
    session_start();
    include('assets/config/config.php');
    include('assets/config/checklogin.php');
    check_login();
 
    //generate libratu operation  number
    $length = 6;    
    $Number =  substr(str_shuffle('0123456789'),1,$length);
    $length= 20;
    $checksum = substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm'),1,$length);


    //borrow book
    if(isset($_POST['borrow_book']))
    {
        $b_title  = $_GET['b_title'];
        $b_isbn_no = $_GET['b_isbn_no'];
        $bc_id = $_GET['bc_id'];
        $bc_name = $_GET['bc_name'];
        $lo_type = $_GET['lo_type'];
        //$bc_code = $_POST['bc_code'];   
        $b_id = $_GET['b_id'];
        $lo_number = $_POST['lo_number'];
        $id = $_SESSION['s_id'];
        $s_name = $_POST['s_name'];
        $s_number = $_POST['s_number'];
        $lo_checksum = sha1($_POST['lo_checksum']);
        $b_copies = $_POST['b_copies'];
        $lo_return_date = $_POST['lo_return_date'];

        //---Post a notification that someone has borrowed a book--//
        $content = $_POST['content'];
        $user_id = $_SESSION['s_id'];
        //Insert Captured information to a database table -->insert to library operations table
        $query="INSERT INTO iL_LibraryOperations (b_title, b_isbn_no, bc_id, bc_name, lo_type, b_id, lo_number, s_id, s_name, s_number, lo_checksum, lo_return_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        //update book table and minus one book
        $book_borrow = "UPDATE iL_Books SET b_copies = ? WHERE  b_id = ?";
        //give a notification that some one has borrowed a book
        $notif = "INSERT INTO iL_notifications (content,user_id) VALUES(?,?)";
        $stmt1= $mysqli->prepare($book_borrow);
        $stmt = $mysqli->prepare($query);
        $stmt2 = $mysqli->prepare($notif);
        //bind paramaters
        $rc=$stmt->bind_param('ssssssssssss', $b_title, $b_isbn_no, $bc_id, $bc_name, $lo_type, $b_id, $lo_number, $id, $s_name, $s_number, $lo_checksum, $lo_return_date);
        $rc = $stmt1->bind_param('si', $b_copies ,$b_id);
        $rc = $stmt2->bind_param('si', $content, $user_id);

        $stmt->execute();
        $stmt1 ->execute();
        $stmt2 ->execute();
  
        //declare a varible which will be passed to alert function
        if($stmt && $stmt1 && $stmt2)
        {
            $success = "Book Borrowed.Please Proceed To Library Premises To Collect Your Book"
            && header("refresh:1;url=pages_std_new_library_book_borrow_operation.php");

        }
        else 
        {
            $err = "Please Try Again Or Try Later";
        }      
    }
?>

<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<?php
    include("assets/inc/head.php");
?>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
        <?php 
            include("assets/inc/nav.php");
        ?>
    <!-- main header end -->
    <!-- main sidebar -->
        <?php
            include("assets/inc/sidebar.php");
        ?>
    <!-- main sidebar end -->

    <div id="page_content">
     <!--Breadcrums-->
            <div id="top_bar">
                <ul id="breadcrumbs">
                    <li><a href="pages_std_dashboard.php">Dashboard</a></li>
                    <li><a href="pages_std_new_library_book_borrow_operation.php">Library Operations</a></li>
                    <li><span>Borrow Book</span></li>
                </ul>
            </div>

        <div id="page_content_inner">

            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">Please Fill All Fields</h3>
                    <hr>
                    <?php
                        $b_id = $_GET['b_id'];
                        $ret="SELECT * FROM  iL_Books WHERE b_id =?"; 
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->bind_param('i', $b_id);
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        while($row=$res->fetch_object())
                        {
                            //decrement book count by one
                            $initialBookCount = $row->b_copies;
                            $newBookCount = $initialBookCount - 1 ;
                    ?>

                        <form method="post">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-2-2">
                                    <div class="uk-form-row">
                                        <label>Book Title</label>
                                        <input type="text" value="<?php echo $row->b_title;?>" required name="b_title" class="md-input" />
                                    </div>
                                    <div class="uk-form-row">
                                        <label>Book ISBN No</label>
                                        <input type="text" required value="<?php echo $row->b_isbn_no;?>" name="b_isbn_no" class="md-input label-fixed" />
                                    </div>
                                    <div class="uk-form-row">
                                        <label>Book Category</label>
                                        <input type="text" required name="bc_name" value="<?php echo $row->bc_name;?>" class="md-input"  />
                                    </div>
                                    <!--Notification Content-->
                                    <div class="uk-form-row" style="display:none">
                                        <label>Content</label>
                                        <input type="text" required name="content" value="<?php echo $row->b_title;?>, ISBN NO: <?php echo $row->b_isbn_no;?> Has been borrowed" class="md-input"  />
                                    </div>
                                    
                                </div>

                                <div class="uk-width-medium-2-2">
                                    <div class="uk-form-row">
                                        <label>Library Operation Number</label>
                                        <input type="text" required class="md-input" readonly name="lo_number" value=<?php echo $Number;?> />
                                    </div>
                                    <div class="uk-form-row" style="display:none">
                                        <label>Library Operation Checksum</label>
                                        <input type="text" required class="md-input" readonly name="lo_checksum" value=<?php echo $checksum;?> />
                                    </div>
                                    <div class="uk-form-row">
                                        <label>Date Book To Be Returned( Max Of 2 Weeks)</label>
                                        <input type="date" required class="md-input"  name="lo_return_date"  />
                                    </div>
                                    <div class="uk-form-row" style="display:none">
                                        <label>Remaining Book Copies</label>
                                        <input type="text" value="<?php echo $newBookCount;?>" required name="b_copies" class="md-input"  />
                                    </div>
                                    <?php
                                        $ret="SELECT * FROM  iL_Students WHERE s_id = ?"; 
                                        $stmt= $mysqli->prepare($ret) ;
                                        $stmt->bind_param('i', $id);
                                        $stmt->execute() ;//ok
                                        $res=$stmt->get_result();
                                        while($row=$res->fetch_object())
                                        {
                                    ?>
                                    <div class="uk-form-row">
                                        <label>Student Name</label>
                                        <input type="text" value="<?php echo $row->s_name;?>" required name="s_name" class="md-input"  />
                                    </div>

                                    <div class="uk-form-row" style="display:non">
                                        <label>Student Number</label>
                                        <input type="text" value="<?php echo $row->s_number;?>" required name="s_number" class="md-input"  />
                                    </div>

                                    <?php }?>

                                </div>
                                <div class="uk-width-medium-2-2">
                                    <div class="uk-form-row">
                                        <div class="uk-input-group">
                                            <input type="submit" class="md-btn md-btn-success" name="borrow_book" value="Borrow Book" />
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
    <!--Footer-->
    <?php require_once('assets/inc/footer.php');?>
    <!--Footer-->

    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- common functions -->
    <script src="assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="assets/js/altair_admin_common.min.js"></script>


    <script>
        $(function() {
            if(isHighDensity()) {
                $.getScript( "assets/js/custom/dense.min.js", function(data) {
                    // enable hires images
                    altair_helpers.retina_images();
                });
            }
            if(Modernizr.touch) {
                // fastClick (touch devices)
                FastClick.attach(document.body);
            }
        });
        $window.load(function() {
            // ie fixes
            altair_helpers.ie_fix();
        });
    </script>

   

    <div id="style_switcher">
        <div id="style_switcher_toggle"><i class="material-icons">&#xE8B8;</i></div>
        <div class="uk-margin-medium-bottom">
            <h4 class="heading_c uk-margin-bottom">Colors</h4>
            <ul class="switcher_app_themes" id="theme_switcher">
                <li class="app_style_default active_theme" data-app-theme="">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_a" data-app-theme="app_theme_a">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_b" data-app-theme="app_theme_b">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_c" data-app-theme="app_theme_c">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_d" data-app-theme="app_theme_d">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_e" data-app-theme="app_theme_e">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_f" data-app-theme="app_theme_f">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_g" data-app-theme="app_theme_g">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_h" data-app-theme="app_theme_h">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_i" data-app-theme="app_theme_i">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_dark" data-app-theme="app_theme_dark">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
            </ul>
        </div>
        <div class="uk-visible-large uk-margin-medium-bottom">
            <h4 class="heading_c">Sidebar</h4>
            <p>
                <input type="checkbox" name="style_sidebar_mini" id="style_sidebar_mini" data-md-icheck />
                <label for="style_sidebar_mini" class="inline-label">Mini Sidebar</label>
            </p>
            <p>
                <input type="checkbox" name="style_sidebar_slim" id="style_sidebar_slim" data-md-icheck />
                <label for="style_sidebar_slim" class="inline-label">Slim Sidebar</label>
            </p>
        </div>
        <div class="uk-visible-large uk-margin-medium-bottom">
            <h4 class="heading_c">Layout</h4>
            <p>
                <input type="checkbox" name="style_layout_boxed" id="style_layout_boxed" data-md-icheck />
                <label for="style_layout_boxed" class="inline-label">Boxed layout</label>
            </p>
        </div>
        <div class="uk-visible-large">
            <h4 class="heading_c">Main menu accordion</h4>
            <p>
                <input type="checkbox" name="accordion_mode_main_menu" id="accordion_mode_main_menu" data-md-icheck />
                <label for="accordion_mode_main_menu" class="inline-label">Accordion mode</label>
            </p>
        </div>
    </div>

    <script>
        $(function() {
            var $switcher = $('#style_switcher'),
                $switcher_toggle = $('#style_switcher_toggle'),
                $theme_switcher = $('#theme_switcher'),
                $mini_sidebar_toggle = $('#style_sidebar_mini'),
                $slim_sidebar_toggle = $('#style_sidebar_slim'),
                $boxed_layout_toggle = $('#style_layout_boxed'),
                $accordion_mode_toggle = $('#accordion_mode_main_menu'),
                $html = $('html'),
                $body = $('body');


            $switcher_toggle.click(function(e) {
                e.preventDefault();
                $switcher.toggleClass('switcher_active');
            });

            $theme_switcher.children('li').click(function(e) {
                e.preventDefault();
                var $this = $(this),
                    this_theme = $this.attr('data-app-theme');

                $theme_switcher.children('li').removeClass('active_theme');
                $(this).addClass('active_theme');
                $html
                    .removeClass('app_theme_a app_theme_b app_theme_c app_theme_d app_theme_e app_theme_f app_theme_g app_theme_h app_theme_i app_theme_dark')
                    .addClass(this_theme);

                if(this_theme == '') {
                    localStorage.removeItem('altair_theme');
                    $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.material.min.css');
                } else {
                    localStorage.setItem("altair_theme", this_theme);
                    if(this_theme == 'app_theme_dark') {
                        $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.materialblack.min.css')
                    } else {
                        $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.material.min.css');
                    }
                }

            });

            // hide style switcher
            $document.on('click keyup', function(e) {
                if( $switcher.hasClass('switcher_active') ) {
                    if (
                        ( !$(e.target).closest($switcher).length )
                        || ( e.keyCode == 27 )
                    ) {
                        $switcher.removeClass('switcher_active');
                    }
                }
            });

            // get theme from local storage
            if(localStorage.getItem("altair_theme") !== null) {
                $theme_switcher.children('li[data-app-theme='+localStorage.getItem("altair_theme")+']').click();
            }


        // toggle mini sidebar

            // change input's state to checked if mini sidebar is active
            if((localStorage.getItem("altair_sidebar_mini") !== null && localStorage.getItem("altair_sidebar_mini") == '1') || $body.hasClass('sidebar_mini')) {
                $mini_sidebar_toggle.iCheck('check');
            }

            $mini_sidebar_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_mini", '1');
                    localStorage.removeItem('altair_sidebar_slim');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                });

        // toggle slim sidebar

            // change input's state to checked if mini sidebar is active
            if((localStorage.getItem("altair_sidebar_slim") !== null && localStorage.getItem("altair_sidebar_slim") == '1') || $body.hasClass('sidebar_slim')) {
                $slim_sidebar_toggle.iCheck('check');
            }

            $slim_sidebar_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_slim", '1');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_sidebar_slim');
                    location.reload(true);
                });

        // toggle boxed layout

            if((localStorage.getItem("altair_layout") !== null && localStorage.getItem("altair_layout") == 'boxed') || $body.hasClass('boxed_layout')) {
                $boxed_layout_toggle.iCheck('check');
                $body.addClass('boxed_layout');
                $(window).resize();
            }

            $boxed_layout_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_layout", 'boxed');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_layout');
                    location.reload(true);
                });

        // main menu accordion mode
            if($sidebar_main.hasClass('accordion_mode')) {
                $accordion_mode_toggle.iCheck('check');
            }

            $accordion_mode_toggle
                .on('ifChecked', function(){
                    $sidebar_main.addClass('accordion_mode');
                })
                .on('ifUnchecked', function(){
                    $sidebar_main.removeClass('accordion_mode');
                });


        });
    </script>
</body>

</html>