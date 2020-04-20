<?php
    //Handle sudo profile logic
    session_start();
    include('assets/config/config.php');
    include('assets/config/checklogin.php');
    check_login();

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
        $id = $_SESSION['id'];
        $ret="SELECT * FROM  iL_sudo  WHERE id = ? "; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->bind_param('i', $id);
        $stmt->execute() ;//ok
        $res=$stmt->get_result();
        while($row=$res->fetch_object())
        {
            //set automatically logged in user default image if they have not updated their pics
            if($row->profile_pic == '')
            {
                $profile_picture = "

                    <img src='assets/img/avatars/user_icon.png' alt='User Image'>
                    ";
            }
            else
            {
                $profile_picture = 
                "
                    <img src='assets/img/avatars/sudo/$row->profile_pic' alt='user avatar'/>
                ";
            }

        ?>

        <div id="page_content">
            <div id="page_content_inner">
                <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
                    <div class="uk-width-large-7-10">
                        <div class="md-card">

                            <div class="user_heading user_heading_bg" style="background-image: url('assets/img/gallery/Image10.jpg')">

                                <div class="bg_overlay">
                                    <div class="user_heading_menu hidden-print">
                                        <div class="uk-display-inline-block"><i class="md-icon md-icon-light material-icons" id="page_print">&#xE8ad;</i></div>
                                    </div>
                                    <div class="user_heading_avatar">
                                        <div class="thumbnail">                                         
                                            <?php 
                                                echo $profile_picture;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="user_heading_content">
                                        <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate"><?php echo $row->username;?></span><span class="sub-heading">Administrator @iLibrary Inc</span></h2>
                                        <!--
                                        <ul class="user_stats">
                                            <li>
                                                <h4 class="heading_a">842 <span class="sub-heading">Posts</span></h4>
                                            </li>
                                            <li>
                                                <h4 class="heading_a">81 <span class="sub-heading">Photos</span></h4>
                                            </li>
                                            <li>
                                                <h4 class="heading_a">1407 <span class="sub-heading">Following</span></h4>
                                            </li>
                                        </ul>
                                        -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card">
                            <div class="user_heading">

                            <!--
                                <div class="user_heading_menu hidden-print">
                                    <div class="uk-display-inline-block" data-uk-dropdown="{pos:'left-top'}">
                                    </div>
                                    <div class="uk-display-inline-block"><i class="md-icon md-icon-light material-icons" id="page_print">&#xE8ad;</i></div>
                                </div>
                                <div class="user_heading_avatar">
                                    <div class="thumbnail">
                                        <?php
                                            echo $profile_picture;
                                        ?>
                                    </div>
                                </div>

                                <div class="user_heading_content">
                                    <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate">Kenyatta Raynor</span><span class="sub-heading">Land acquisition specialist</span></h2>
                                    <ul class="user_stats">
                                        <li>
                                            <h4 class="heading_a">2391 <span class="sub-heading">Posts</span></h4>
                                        </li>
                                        <li>
                                            <h4 class="heading_a">120 <span class="sub-heading">Photos</span></h4>
                                        </li>
                                        <li>
                                            <h4 class="heading_a">284 <span class="sub-heading">Following</span></h4>
                                        </li>
                                    </ul>
                                </div>
                                <a class="md-fab md-fab-small md-fab-accent hidden-print" href="page_user_edit.html">
                                    <i class="material-icons">&#xE150;</i>
                                </a>
                                -->

                            </div>
                            <div class="user_content">
                                <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" data-uk-sticky="{ top: 48, media: 960 }">
                                    <li class="uk-active"><a href="#">Profile</a></li>
                                </ul>
                                <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                                    <?php 
                                        echo $row->bio;
                                    ?>
                                    <li>
                                        <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                                            <div class="uk-width-large-1-2">
                                                <h4 class="heading_c uk-margin-small-bottom">Contact Info</h4>
                                                <ul class="md-list md-list-addon">
                                                    <li>
                                                        <div class="md-list-addon-element">
                                                            <i class="md-list-addon-icon uk-text-primary material-icons">&#xE158;</i>
                                                        </div>
                                                        <div class="md-list-content">
                                                            <span class="md-list-heading"><?php echo $row->email;?></span>
                                                            <span class="uk-text-small uk-text-muted">Email</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="md-list-addon-element">
                                                            <i class="md-list-addon-icon uk-text-primary  material-icons">settings_phone</i>
                                                        </div>
                                                        <div class="md-list-content">
                                                            <span class="md-list-heading"><?php echo $row->phone;?></span>
                                                            <span class="uk-text-small uk-text-muted">Phone</span>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="uk-width-large-1-2">
                                                <h4 class="heading_c uk-margin-small-bottom"></h4>
                                                <br>
                                                <ul class="md-list md-list-addon">
                                                    <li>
                                                        <div class="md-list-addon-element">
                                                            <i class="md-list-addon-icon material-icons uk-text-primary">verified_user</i>
                                                        </div>
                                                        <div class="md-list-content">
                                                            <span class="md-list-heading"><?php echo $row->number;?></span>
                                                            <span class="uk-text-small uk-text-muted">Sudo Number</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="md-list-addon-element">
                                                            <i class="md-list-addon-icon uk-text-primary material-icons">&#xe8a6;</i>
                                                        </div>
                                                        <div class="md-list-content">
                                                            <span class="md-list-heading"><?php echo $row->username;?></span>
                                                            <span class="uk-text-small uk-text-muted">Username</span>
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </div>

                                        </div>
                                        <!--
                                        <h4 class="heading_c uk-margin-bottom">Timeline</h4>
                                        <div class="timeline">
                                            <div class="timeline_item">
                                                <div class="timeline_icon timeline_icon_success"><i class="material-icons">&#xE85D;</i></div>
                                                <div class="timeline_date">
                                                    09 <span>Mar</span>
                                                </div>
                                                <div class="timeline_content">Created ticket <a href="#"><strong>#3289</strong></a></div>
                                            </div>
                                            <div class="timeline_item">
                                                <div class="timeline_icon timeline_icon_danger"><i class="material-icons">&#xE5CD;</i></div>
                                                <div class="timeline_date">
                                                    15 <span>Mar</span>
                                                </div>
                                                <div class="timeline_content">Deleted post <a href="#"><strong>Laborum dolorem officiis magnam illo incidunt.</strong></a></div>
                                            </div>
                                            <div class="timeline_item">
                                                <div class="timeline_icon"><i class="material-icons">&#xE410;</i></div>
                                                <div class="timeline_date">
                                                    19 <span>Mar</span>
                                                </div>
                                                <div class="timeline_content">
                                                    Added photo
                                                    <div class="timeline_content_addon">
                                                        <img src="assets/img/gallery/Image16.jpg" alt=""/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline_item">
                                                <div class="timeline_icon timeline_icon_primary"><i class="material-icons">&#xE0B9;</i></div>
                                                <div class="timeline_date">
                                                    21 <span>Mar</span>
                                                </div>
                                                <div class="timeline_content">
                                                    New comment on post <a href="#"><strong>Doloribus quibusdam quisquam suscipit.</strong></a>
                                                    <div class="timeline_content_addon">
                                                        <blockquote>
                                                            Aut qui dolor ducimus libero nobis et quo fugiat eos nesciunt et inventore laboriosam debitis esse non quis in perspiciatis autem esse.&hellip;
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline_item">
                                                <div class="timeline_icon timeline_icon_warning"><i class="material-icons">&#xE7FE;</i></div>
                                                <div class="timeline_date">
                                                    29 <span>Mar</span>
                                                </div>
                                                <div class="timeline_content">
                                                    Added to Friends
                                                    <div class="timeline_content_addon">
                                                        <ul class="md-list md-list-addon">
                                                            <li>
                                                                <div class="md-list-addon-element">
                                                                    <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_02_tn.png" alt=""/>
                                                                </div>
                                                                <div class="md-list-content">
                                                                    <span class="md-list-heading">Jazmyn Crona</span>
                                                                    <span class="uk-text-small uk-text-muted">Aliquid id aspernatur.</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    

                                    <li>
                                        <div id="user_profile_gallery" data-uk-check-display class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid="{gutter: 4}">
                                            <div>
                                                <a href="assets/img/gallery/Image01.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image01.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image02.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image02.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image03.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image03.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image04.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image04.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image05.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image05.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image06.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image06.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image07.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image07.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image08.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image08.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image09.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image09.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image10.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image10.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image11.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image11.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image12.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image12.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image13.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image13.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image14.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image14.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image15.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image15.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image16.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image16.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image17.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image17.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image18.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image18.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image19.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image19.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image20.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image20.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image21.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image21.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image22.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image22.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image23.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image23.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="assets/img/gallery/Image24.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                    <img src="assets/img/gallery/Image24.jpg" alt=""/>
                                                </a>
                                            </div>
                                        </div>
                                        <ul class="uk-pagination uk-margin-large-top">
                                            <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
                                            <li class="uk-active"><span>1</span></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><span>&hellip;</span></li>
                                            <li><a href="#">20</a></li>
                                            <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <ul class="md-list">
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Aut id cupiditate perspiciatis et tempora iste.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">16 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">24</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">119</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Ut fugiat iure iusto laboriosam corrupti.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">04 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">11</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">516</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Sunt aut corporis dolores reiciendis.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">14 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">3</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">305</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Est aspernatur quis odio a eum architecto.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">09 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">12</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">465</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Tempore quaerat in non totam qui ea animi.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">09 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">6</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">426</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Explicabo ad porro ut ut est et consectetur.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">10 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">5</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">271</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Illum error assumenda consequatur est rerum aut.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">09 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">24</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">928</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Vel est non doloremque animi nisi iusto incidunt.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">09 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">6</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">420</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Iure sint aut et quia amet rerum recusandae suscipit.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">23 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">27</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">776</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Autem minus consequatur illum quia odio incidunt beatae.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">23 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">25</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">987</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Cum consequuntur nihil voluptatem dolor omnis eligendi.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">05 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">17</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">267</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Culpa deserunt amet et.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">07 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">8</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">444</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Praesentium et consequatur eum ipsum.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">05 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">1</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">874</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Quo atque illo ad qui praesentium.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">28 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">13</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">539</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Eveniet quis id iste rerum fuga.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">13 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">14</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">317</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Reprehenderit quos quia eius omnis et sit.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">23 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">23</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">502</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Pariatur mollitia id necessitatibus voluptatem et.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">04 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">26</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">265</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Autem impedit nulla distinctio doloribus.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">21 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">25</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">661</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Aut dolor dicta labore numquam.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">19 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">10</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">661</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">Ipsum nemo omnis quae omnis veritatis illum amet.</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">06 Mar 2019</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">20</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">222</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                        -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-large-3-10 hidden-print">
                        <div class="md-card">
                            <div class="md-card-content">
                                <div class="uk-margin-medium-bottom">
                                    <h3 class="heading_c uk-margin-bottom">Alerts | Notifications</h3>
                                    <ul class="md-list md-list-addon">
                                        <?php

                                            //display all notifications
                                            $id = $_SESSION['id'];
                                            $ret="SELECT * FROM  iL_notifications  WHERE user_id = ? "; 
                                            $stmt= $mysqli->prepare($ret) ;
                                            $stmt->bind_param('i', $id);
                                            $stmt->execute() ;//ok
                                            $res=$stmt->get_result();
                                            while($row=$res->fetch_object())
                                            {
                                                //Trim timestamp to DD:MM:YYYY - h:m
                                                $time = $row->created_at;

                                                
                                        ?>

                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons uk-text-success">&#xE88F;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><?php echo date("d-M-Y h:m:s", strtotime($time));?></span>
                                                    <span class="uk-text-small uk-text-muted "><?php echo $row->content;?></span>
                                                </div>
                                            </li>

                                        <?php }?>  

                                    </ul>
                                </div>

                                <h3 class="heading_c uk-margin-bottom">Sudo Users(Admins) Accounts</h3>
                                <ul class="md-list md-list-addon uk-margin-bottom">
                                    <?php
                                            $ret="SELECT * FROM  iL_sudo"; 
                                            $stmt= $mysqli->prepare($ret) ;
                                            //$stmt->bind_param('i', $id);
                                            $stmt->execute() ;//ok
                                            $res=$stmt->get_result();
                                            while($row=$res->fetch_object())
                                            {
                                                //set automatically logged in user default image if they have not updated their pics
                                                if($row->profile_pic == '')
                                                {
                                                    $profile_picture = "

                                                        <img class='md-user-image md-list-addon-avatar' src='assets/img/avatars/user_icon.png' alt='User Image'>
                                                        ";
                                                }
                                                else
                                                {
                                                    $profile_picture = 
                                                    "
                                                        <img  class='md-user-image md-list-addon-avatar' src='assets/img/avatars/sudo/$row->profile_pic' alt='user avatar'/>
                                                    ";
                                                }

                                            ?>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <?php
                                                            echo $profile_picture
                                                        ?>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <a href="pages_sudo_sudoers.php?sudo_id=<?php echo $row->id;?>">
                                                            <span class="md-list-heading"><?php echo $row->username;?></span>
                                                        </a>
                                                        <span class="uk-text-small uk-text-muted"><?php echo $row->email;?></span>
                                                    </div>
                                                </li>

                                            <?php }?>    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
    <!--Footer-->
    <?php require_once('assets/inc/footer.php');?>
    <!--Footer-->

    <!-- google web fonts -->
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
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