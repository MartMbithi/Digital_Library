<?php
    session_start();
    include('assets/config/config.php');
    include('assets/config/checklogin.php');
    check_login();

    //update student
    if(isset($_POST['std_update']))
    {

        $id = $_SESSION['s_id'];
        $s_name = $_POST['s_name'];
        $s_email = $_POST['s_email'];
        $s_sex = $_POST['s_sex'];
        $s_phone = $_POST['s_phone'];
        $s_bio = $_POST['s_bio'];
        $s_adr = $_POST['s_adr'];
        $s_dpic  = $_FILES["s_dpic"]["name"];
        move_uploaded_file($_FILES["s_dpic"]["tmp_name"],"../sudo/assets/img/avatars/students/".$_FILES["s_dpic"]["name"]);
        $s_pwd= sha1(md5($_POST['s_pwd']));
        
        //Insert Captured information to a database table
        $query="UPDATE iL_Students SET s_name =?, s_email = ?, s_sex = ?, s_phone = ?, s_bio = ?, s_adr =?, s_dpic =?, s_pwd =? WHERE s_id =?";
        $stmt = $mysqli->prepare($query);
        //bind paramaters
        $rc=$stmt->bind_param('ssssssssi', $s_name, $s_email, $s_sex, $s_phone, $s_bio, $s_adr, $s_dpic, $s_pwd, $id);
        $stmt->execute();
  
        //declare a varible which will be passed to alert function
        if($stmt)
        {
            $success = "Profile Updated" && header("refresh:1;url=pages_std_profile.php");
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

            $ret="SELECT * FROM  iL_Students  WHERE s_id = ? "; 
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i', $id);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            while($row=$res->fetch_object())
            {
                //set automatically logged in user default image if they have not updated their pics
                if($row->s_dpic == '')
                {
                    $profile_picture = "

                        <img src='../sudo/assets/img/avatars/user_icon.png' alt='User Image'>
                        ";
                }
                else
                {
                    $profile_picture = 
                    "
                        <img src='../sudo/assets/img/avatars/students/$row->s_dpic' alt='user avatar'/>
                    ";
                }

        ?>
    <!-- main sidebar end -->
        <div id="page_content">
            <div id="page_content_inner">
                <form method="post" enctype="multipart/form-data" class="uk-form-stacked" id="user_edit_form">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-10-10">
                            <div class="md-card">
                                <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                                    <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <?php
                                                //profile picture
                                                echo $profile_picture;
                                            ?>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div class="user_avatar_controls">
                                            <span class="btn-file">
                                                <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                                <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                                <input type="file" name="s_dpic">
                                            </span>
                                            <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
                                        </div>
                                    </div>
                                    <div class="user_heading_content">
                                        <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"><?php echo $row->s_name;?></span><span class="sub-heading" id="user_edit_position"><?php echo $row->s_number;?></span></h2>
                                    </div>

                                </div>
                                <div class="user_content">
                                    <ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#user_edit_tabs_content'}">
                                        <li class="uk-active"><a href="#"><?php echo $row->s_name;?> Update Your Profile</a></li>
                                    </ul>
                                    <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
                                        <li>
                                            <div class="uk-margin-top">
                                                <h3 class="full_width_in_card heading_c">
                                                    General info
                                                </h3>

                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-3">
                                                        <label for="user_edit_uname_control">Name</label>
                                                        <input class="md-input" required type="text" name="s_name" value="<?php echo $row->s_name;?>" />
                                                    </div>
                                                    <div class="uk-width-medium-1-3">
                                                        <label for="user_edit_position_control">Email</label>
                                                        <input class="md-input" required type="email" value="<?php echo $row->s_email;?>"  name="s_email" />
                                                    </div>
                                                    <div class="uk-width-medium-1-3">
                                                        <label for="user_edit_position_control">Phone Number</label>
                                                        <input type="text" required class="md-input" name="s_phone" value="<?php echo $row->s_phone;?>" />
                                                    </div>
                                                    
                                                </div>
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-3">
                                                        <label for="user_edit_uname_control">Gender</label>
                                                        <select class="md-input" required type="text" name="s_sex" value="<?php echo $row->s_sex;?>" />
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="uk-width-medium-1-3">
                                                        <label for="user_edit_position_control">Address</label>
                                                        <input class="md-input" required type="text" value="<?php echo $row->s_adr;?>"  name="s_adr" />
                                                    </div>
                                                    <div class="uk-width-medium-1-3">
                                                        <label for="user_edit_position_control">Student Number</label>
                                                        <input type="text" required class="md-input" readonly name="s_number" value="<?php echo $row->s_number;?>" />
                                                    </div>
                                                    
                                                </div>

                                                <div class="uk-grid" data-uk-grid-margin>   
                                                        <div class="uk-width-medium-1-3">
                                                            <label for="user_edit_uname_control">Old Password</label>
                                                            <input class="md-input" type="password" required  />
                                                        </div>
                                                        <div class="uk-width-medium-1-3">
                                                            <label for="user_edit_position_control">New Password</label>
                                                            <input class="md-input" type="password"  required  name="s_pwd" />
                                                        </div>
                                                        <div class="uk-width-medium-1-3">
                                                            <label for="user_edit_position_control">Confirm New Password</label>
                                                            <input type="password" class="md-input" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="uk-grid">
                                                    <div class="uk-width-1-1">
                                                        <label for="user_edit_personal_info_control">About | Bio</label>
                                                        <textarea class="md-input" name="s_bio"  cols="30" required rows="4"><?php echo $row->s_bio;?></textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="uk-grid">
                                                    <div class="uk-width-1-1">
                                                        <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-2" data-uk-grid-margin>
                                                            <div>
                                                                
                                                                <div class="uk-input-group">
                                                                    <input type="submit" class="md-btn md-btn-success" name="std_update" value="Update Profile" />
                                                                </div>
                                                            </div>

                                                            <!--
                                                            <div>
                                                                <div class="uk-input-group">
                                                                    <span class="uk-input-group-addon">
                                                                        <i class="md-list-addon-icon uk-icon-facebook-official"></i>
                                                                    </span>
                                                                    <label>Facebook</label>
                                                                    <input type="text" class="md-input" name="user_edit_facebook" value="facebook.com/envato" />
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="uk-input-group">
                                                                    <span class="uk-input-group-addon">
                                                                        <i class="md-list-addon-icon uk-icon-twitter"></i>
                                                                    </span>
                                                                    <label>Twitter</label>
                                                                    <input type="text" class="md-input" name="user_edit_twitter" value="twitter.com/envato" />
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="uk-input-group">
                                                                    <span class="uk-input-group-addon">
                                                                        <i class="md-list-addon-icon uk-icon-linkedin"></i>
                                                                    </span>
                                                                    <label>Linkdin</label>
                                                                    <input type="text" class="md-input" name="user_edit_linkdin" value="linkedin.com/company/envato" />
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="uk-input-group">
                                                                    <span class="uk-input-group-addon">
                                                                        <i class="md-list-addon-icon uk-icon-google-plus"></i>
                                                                    </span>
                                                                    <label>Google+</label>
                                                                    <input type="text" class="md-input" name="user_edit_google_plus" value="plus.google.com/+envato/about" />
                                                                </div>
                                                            </div>
                                                            -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </form>

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

    <!-- page specific plugins -->
    <!-- file input -->
    <script src="assets/js/custom/uikit_fileinput.min.js"></script>

    <!--  user edit functions -->
    <script src="assets/js/pages/page_user_edit.min.js"></script>
    
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

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','http://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-65191727-1', 'auto');
        ga('send', 'pageview');
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