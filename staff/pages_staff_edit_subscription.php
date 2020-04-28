<?php 
    session_start();
    include('assets/config/config.php');
    include('assets/config/checklogin.php');
    check_login();

    //generate random subcription issue
    $length = 5;    
    $code =  substr(str_shuffle('0123456789'),1,$length);

    //update subscription
    if(isset($_POST['update_subscribed_media']))
    {
        $s_id = $_GET['s_id'];
        $s_title = $_POST['s_title'];
        $s_code  = $_POST['s_code'];
        $s_category = $_POST['s_category'];
        $s_desc = $_POST['s_desc'];

        $s_cover_img = $_FILES["s_cover_img"]["name"];
        move_uploaded_file($_FILES["s_cover_img"]["tmp_name"],"../sudo/assets/magazines/".$_FILES["s_cover_img"]["name"]);

        $s_file = $_FILES["s_file"]["name"];
        move_uploaded_file($_FILES["s_file"]["tmp_name"],"./sudo/assets/magazines/".$_FILES["s_file"]["name"]);
        
        $s_publisher = $_POST['s_publisher'];
        $s_year = $_POST['s_year'];
        
        //Insert Captured information to a database table
        $query="UPDATE iL_Subscriptions SET s_title=?, s_code=?, s_category=?, s_desc=?, s_cover_img=?, s_file=?, s_publisher=?, s_year=? WHERE s_id = ?";
        $stmt = $mysqli->prepare($query);
        //bind paramaters
        $rc=$stmt->bind_param('ssssssssi',$s_title, $s_code, $s_category, $s_desc, $s_cover_img, $s_file, $s_publisher, $s_year, $s_id);
        $stmt->execute();
  
        //declare a varible which will be passed to alert function
        if($stmt)
        {
            $success = "Subscription Media Updated" && header("refresh:1;url=pages_staff_manage_subscriptions.php");
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
    <?php
        $s_id = $_GET['s_id'];
        $ret="SELECT * FROM  iL_Subscriptions WHERE s_id = ?"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->bind_param('i', $s_id);
        $stmt->execute() ;//ok
        $res=$stmt->get_result();
        while($row=$res->fetch_object())
        {
    ?>
        <div id="page_content">
            <!--Breadcrums-->
            <div id="top_bar">
                <ul id="breadcrumbs">
                    <li><a href="pages_staff_dashboard.php">Dashboard</a></li>
                    <li><a href="#">Subscribed Media</a></li>
                    <li><a href="pages_staff_manage_subscriptions.php">Manage Subscribed Media</a></li>
                    <li><span>Update <?php echo $row->s_title;?></span></li>
                </ul>
            </div>

            <div id="page_content_inner">

                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_a">Please Fill All Fields</h3>
                        <hr>
                        <form method="post" enctype="multipart/form-data">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-2-2">
                                    <div class="uk-form-row">
                                        <label>Title</label>
                                        <input type="text" value="<?php echo $row->s_title;?>" required name="s_title" class="md-input" />
                                    </div>
                                    <div class="uk-form-row">
                                        <label>Code</label>
                                        <input type="text" required readonly value="SUB-<?php echo $code;?>" name="s_code" class="md-input label-fixed" />
                                    </div>
                                    <div class="uk-form-row">
                                        <label>Publisher</label>
                                        <input type="text" required  value="<?php echo $row->s_publisher;?>" name="s_publisher" class="md-input label-fixed" />
                                    </div>
                                    <div class="uk-form-row">
                                        <label>Year Published</label>
                                        <input type="text" required value="<?php echo $row->s_year;?>"  name="s_year" class="md-input label-fixed" />
                                    </div>
                                    <div class="uk-form-row">
                                        <label>Category</label>
                                        <select name="s_category"class="md-input">
                                            <option>Art & Architecture</option>
                                            <option>Boating & Aviation</option>
                                            <option>Business & Finance</option>
                                            <option>Cars & Motorcycles</option>
                                            <option>Celebrity & Gossip</option>
                                            <option>Comics & Manga</option>
                                            <option>Crafts</option>
                                            <option>Culture & Literature</option>
                                            <option>Family & Parenting</option>
                                            <option>Fashion</option>
                                            <option>Food & Wine</option>
                                            <option>Health & Fitness</option>
                                            <option>Home & Garden</option>
                                            <option>Hunting & Fishing</option>
                                            <option>Kids & Teens</option>
                                            <option>Luxury</option>
                                            <option>Men's Lifestyle</option>
                                            <option>Movies, TV & Music</option>
                                            <option>News & Politics</option>
                                            <option>Photography</option>
                                            <option>Science</option>
                                            <option>Sports</option>
                                            <option>Tech & Gaming</option>
                                            <option>Travel & Outdoor</option>
                                            <option>Women's Lifestyle</option>
                                            <option>Adult</option>
                                        </select>
                                    </div>
                                
                                </div>

                                <div class="uk-width-medium-2-2">
                                    <div id="file_upload-drop" class="uk-file-upload">
                                        <p class="uk-text">Drop Media (Subscribed Magazine) Image</p>
                                        <p class="uk-text-muted uk-text-small uk-margin-small-bottom">or</p>
                                        <a class="uk-form-file md-btn">Choose File<input id="file_upload-select" name="s_cover_img" type="file"></a>
                                    </div>
                                    <div id="file_upload-progressbar" class="uk-progress uk-hidden">
                                        <div class="uk-progress-bar" style="width:0">0%</div>
                                    </div>
                                </div>

                                <div class="uk-width-medium-2-2">
                                    <div id="file_upload-drop" class="uk-file-upload">
                                        <p class="uk-text">Drop Media File (Only In PDF Formart)</p>
                                        <p class="uk-text-muted uk-text-small uk-margin-small-bottom">or</p>
                                        <a class="uk-form-file md-btn">Choose Pdf File<input id="file_upload-select" name="s_file" type="file"></a>
                                    </div>
                                    <div id="file_upload-progressbar" class="uk-progress uk-hidden">
                                        <div class="uk-progress-bar" style="width:0">0%</div>
                                    </div>
                                </div>

                                <div class="uk-width-medium-2-2">
                                    <div class="uk-form-row">
                                        <label>Description</label>
                                        <textarea cols="30" rows="4" class="md-input" name="s_desc"><?php echo $row->s_desc;?></textarea>
                                    </div>
                                </div>

                                <div class="uk-width-medium-2-2">
                                    <div class="uk-form-row">
                                        <div class="uk-input-group">
                                            <input type="submit" class="md-btn md-btn-success" name="update_subscribed_media" value="Upate Subscribed Media" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    <?php }?>
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