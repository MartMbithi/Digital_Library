<?php
    /*
    *Handle SUDO DASHBOARD page logic
    */
    session_start();
    include('assets/config/config.php');
    include('assets/config/checklogin.php');
    check_login();

    
    /*
    Statics logic
        1.Books
            1.0 : Number of all book categories in the library
            1.1 : Number of all books no matter what category
            1.2 : Number of all Borrowed Books no matter what category
            1.3 : Number of all Lost Books no matter what category

        2.Library Users(Students and Librarians)
            2.0 : Number of Employed Librarians
            2.1 : Number of all Enrolled Students
            2.2 : Number of all Enrolled Students with pending account activation
            2.3 : Number of all Employed Librarians with pending accounts activations
        3.Misc
            3.0 : Number of all Librarians requestings for Password Resets
            3.1 : Number of all students requesting for password resets
            3.2 : Number of Unread Messsanges inbox
            3.3 : Number of all amount paid by students as a fine of loosing and damaging any book

    Charts
         1.Books
            1.0 : Number Of Books Per Book Category ->PieChart
            1.1 : Number of Borrowed Books Per Books Category ->Piechart or Donought Chart



    */
     //1.Books

    //1.0 : Number of all book categories in the library
    $result ="SELECT count(*) FROM iL_BookCategories";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($book_categories);
    $stmt->fetch();
    $stmt->close();

    //1.1 : Number of all books no matter what category
    $result ="SELECT count(*) FROM iL_Books";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($books);
    $stmt->fetch();
    $stmt->close();

    //1.2 : Number of all Borrowed Books no matter what category
    $result ="SELECT count(*) FROM iL_Books WHERE b_status = 'Borrowed'";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($borrowed_books);
    $stmt->fetch();
    $stmt->close();

    //1.3 : Number of all Lost Books no matter what category
    $result ="SELECT count(*) FROM iL_Books WHERE b_status = 'Lost' ||  b_status = 'Damanged' ";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($damanged_and_lost_books);
    $stmt->fetch();
    $stmt->close();


    //2.Library Users(Students and Librarians)
    //2.0 : Number of Employed Librarians
    $result ="SELECT count(*) FROM iL_Librarians WHERE l_acc_status = 'Active' ";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($librarians);
    $stmt->fetch();
    $stmt->close();

    //2.1 : Number of all Enrolled Students
    $result ="SELECT count(*) FROM iL_Students WHERE s_acc_status = 'Active' ";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($students);
    $stmt->fetch();
    $stmt->close();

    //2.2 : Number of all Enrolled Students with pending account activation
    $result ="SELECT count(*) FROM iL_Students WHERE s_acc_status = 'Pending' ";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($pending_students);
    $stmt->fetch();
    $stmt->close();

    //2.3 : Number of all Employed Librarians with pending accounts activations
    $result ="SELECT count(*) FROM iL_Librarians WHERE l_acc_status = 'Pending' ";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($pending_librarians);
    $stmt->fetch();
    $stmt->close();

    // 3.Misc

    //3.0 : Number of all Librarians requestings for Password Resets
    $result ="SELECT count(*) FROM iL_PasswordResets WHERE pr_usertype = 'Librarian' AND pr_status='Pending' ";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($pending_librarians_pwd_resets);
    $stmt->fetch();
    $stmt->close();

    //3.1 : Number of all students requesting for password resets
    $result ="SELECT count(*) FROM iL_PasswordResets WHERE pr_usertype = 'Student' AND pr_status='Pending' ";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($pending_student_pwd_resets);
    $stmt->fetch();
    $stmt->close();

    //3.2 : Number of Unread Messsanges inbox
    $id = $_SESSION['id'];
    $result ="SELECT count(*) FROM iL_messages WHERE receiver_id = ? ";
    $stmt = $mysqli->prepare($result);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($inbox);
    $stmt->fetch();
    $stmt->close();

    //3.3 : Number of all amount paid by students as a fine of loosing and damaging any book
    $result ="SELECT SUM(f_amt) FROM iL_Fines WHERE f_status = 'Paid' ";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($fines);
    $stmt->fetch();
    $stmt->close();


    /*
        The following block of codes implements Books Charts

        -->Books Category Will be HardCoded so my bad<--
    */

    //1.0.1 : Number Of Books under Non-fiction Category
    $result ="SELECT COUNT(*) FROM iL_Books WHERE bc_name = 'Non-fiction' ";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($non_fiction);
    $stmt->fetch();
    $stmt->close();

    //1.0.2 : Number Of Books under Fiction Category
    $result ="SELECT COUNT(*) FROM iL_Books WHERE bc_name = 'Fiction' ";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($fiction);
    $stmt->fetch();
    $stmt->close();

    //1.0.3 : Number Of Books under References Category
    $result ="SELECT COUNT(*) FROM iL_Books WHERE bc_name = 'References' ";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($References);
    $stmt->fetch();
    $stmt->close();

    //1.1.0 : Number of Borrowed Books Per Books in Non-fiction Category ->Piechart or Donought Chart
    $result ="SELECT COUNT(*) FROM iL_LibraryOperations WHERE bc_name = 'Non-fiction' AND lo_type ='Borrowed' ";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($borrowed_non_fiction);
    $stmt->fetch();
    $stmt->close();

    //1.1.1 : Number of Borrowed Books Per Books in fiction Category ->Piechart or Donought Chart
    $result ="SELECT COUNT(*) FROM iL_LibraryOperations WHERE bc_name = 'Fiction' AND lo_type ='Borrowed' ";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($borrowed_fiction);
    $stmt->fetch();
    $stmt->close();

    //1.1.2 : Number of Borrowed Books Per Books in References Category ->Piechart or Donought Chart
    $result ="SELECT COUNT(*) FROM iL_LibraryOperations WHERE bc_name = 'References' AND lo_type ='Borrowed' ";
    $stmt = $mysqli->prepare($result);
    $stmt->execute();
    $stmt->bind_result($borrowed_references);
    $stmt->fetch();
    $stmt->close();
    
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
        <div id="page_content_inner">

            <!--1.Books-->
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"></div>
                            <span class="uk-text-muted uk-text-small">Book Categories</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $book_categories;?></noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"></div>
                            <span class="uk-text-muted uk-text-small">Books</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $books;?></noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"></div>
                            <span class="uk-text-muted uk-text-small">Borrowed Books</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $borrowed_books;?></noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"></div>
                            <span class="uk-text-muted uk-text-small">Lost | Damaged Books</span>
                            <h2 class="uk-margin-remove"><?php echo $damanged_and_lost_books;?></h2>
                        </div>
                    </div>
                </div>
            </div>

            <!--2.Library Users(Students and Librarians)-->
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"></div>
                            <span class="uk-text-muted uk-text-small">Librarians</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $librarians;?></noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"></div>
                            <span class="uk-text-muted uk-text-small">Enrolled Students</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $students;?></noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"></div>
                            <span class="uk-text-muted uk-text-small">Pending Librarians Accounts</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $pending_librarians;?></noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"></div>
                            <span class="uk-text-muted uk-text-small">Pending Students Accounts</span>
                            <h2 class="uk-margin-remove"><?php echo $pending_students;?></h2>
                        </div>
                    </div>
                </div>
            </div>

            <!--3.Misc-->
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"></div>
                            <span class="uk-text-muted uk-text-small">Pending Lib's Password Resets</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $pending_librarians_pwd_resets;?></noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"></div>
                            <span class="uk-text-muted uk-text-small">Pending Students Password Resets</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $pending_student_pwd_resets;?></noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"></div>
                            <span class="uk-text-muted uk-text-small">Inbox</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $inbox;?></noscript></span> Msgs</h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"></div>
                            <span class="uk-text-muted uk-text-small">Library Fines</span>
                            <h2 class="uk-margin-remove">Ksh <?php echo $fines;?></h2>
                        </div>
                    </div>
                </div>
            </div>
          
            <!-- Pie Charts-->
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
                                <i class="md-icon material-icons">&#xE5D5;</i>
                                
                            </div>
                        </div>

                        <div class="md-card-content">
                            <div class="mGraph-wrapper">
                                <div id="PieChart" class="mGraph" style="height: 400px; max-width: 500px; margin: 0px auto;"></div>
                            </div>

                            <div class="md-card-fullscreen-content">
                                <div class="uk-overflow-container">
                                    <table class="uk-table uk-table-no-border uk-text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Category</th>
                                            <th>ISBN No.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $ret="SELECT * FROM  iL_Books"; 
                                            $stmt= $mysqli->prepare($ret) ;
                                            $stmt->execute() ;//ok
                                            $res=$stmt->get_result();
                                            while($row=$res->fetch_object())
                                            {
                                        ?>
                                            <tr>
                                                <td><?php echo $row->b_title;?></td>
                                                <td><?php echo $row->b_author;?></td>
                                                <td><?php echo $row->bc_name;?></td>
                                                <td class="uk-text-success"><?php echo $row->b_isbn_no;?></td>
                                            </tr>

                                        <?php }?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Donought chart-->
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
                                <i class="md-icon material-icons">&#xE5D5;</i>
                                
                            </div>
                            
                        </div>

                        <div class="md-card-content">
                            <div class="mGraph-wrapper">
                                <div id="BooksBorrowedPerCategory" class="mGraph" style="height: 400px; max-width: 500px; margin: 0px auto;"></div>
                                
                            </div>

                            <div class="md-card-fullscreen-content">
                                <div class="uk-overflow-container">
                                    <table class="uk-table uk-table-no-border uk-text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Number</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Category</th>
                                            <th>ISBN No.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $ret="SELECT * FROM  iL_LibraryOperations"; 
                                            $stmt= $mysqli->prepare($ret) ;
                                            $stmt->execute() ;//ok
                                            $res=$stmt->get_result();
                                            while($row=$res->fetch_object())
                                            {
                                        ?>
                                            <tr>
                                                <td><?php echo $row->s_name;?></td>
                                                <td><?php echo $row->s_number;?></td>
                                                <td><?php echo $row->b_title;?></td>
                                                <td><?php echo $row->b_author;?></td>
                                                <td><?php echo $row->bc_name;?></td>
                                                <td class="uk-text-success"><?php echo $row->b_isbn_no;?></td>
                                            </tr>

                                        <?php }?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- info cards 
            <div class="uk-grid uk-grid-medium uk-grid-width-medium-1-2 uk-grid-width-large-1-3" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}">
                <div>
                    <div class="md-card">
                        <div class="md-card-head md-bg-light-blue-600">
                            <div class="md-card-head-menu" data-uk-dropdown="{pos:'bottom-right'}">
                                <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav">
                                        <li><a href="#">User profile</a></li>
                                        <li><a href="#">User permissions</a></li>
                                        <li><a href="#" class="uk-text-danger">Delete user</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="uk-text-center">
                                <img class="md-card-head-avatar" src="assets/img/avatars/avatar_11.png" alt=""/>
                            </div>
                            <h3 class="md-card-head-text uk-text-center md-color-white">
                                Abbey Trantow                                <span><a href="cdn-cgi/l/email-protection.html" class="__cf_email__" data-cfemail="3f5e534b5a51485a4d4b571152464d565e527f57504b525e5653115c5052">[email&#160;protected]</a></span>
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <ul class="md-list md-list-addon">
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons">&#xE158;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><a href="cdn-cgi/l/email-protection.html" class="__cf_email__" data-cfemail="45282c2e243c29246b2e2028282037052724292c36313720372c372a2923362a2b6b2c2b232a">[email&#160;protected]</a></span>
                                        <span class="uk-text-small uk-text-muted">Email</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">409-109-3543x864</span>
                                        <span class="uk-text-small uk-text-muted">Phone</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon uk-icon-facebook-official"></i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">facebook.com/envato</span>
                                        <span class="uk-text-small uk-text-muted">Facebook</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon uk-icon-twitter"></i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">twitter.com/envato</span>
                                        <span class="uk-text-small uk-text-muted">Twitter</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-head md-bg-grey-900">
                            <div class="uk-cover uk-position-relative uk-height-1-1 transform-origin-50" id="video_player">
                                <iframe width="300" height="150" src="about:blank" data-uk-cover frameborder="0" allowfullscreen style="max-height:100%"></iframe>
                            </div>
                        </div>
                        <div class="md-card-content">
                            <ul class="md-list md-list-addon md-list-interactive" id="video_player_playlist">
                                <li data-video-src="-CYs99M7hzA">
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons">&#xE037;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">Unboxing the HERO4</span>
                                        <span class="uk-text-small uk-text-muted">Mashable</span>
                                    </div>
                                </li>
                                <li data-video-src="te689fEo2pY">
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons">&#xE037;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">Apple Watch Unboxing & Setup</span>
                                        <span class="uk-text-small uk-text-muted">Unbox Therapy</span>
                                    </div>
                                </li>
                                <li data-video-src="7AFJeaYojhU">
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons">&#xE037;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">Energous WattUp Power Transmitter</span>
                                        <span class="uk-text-small uk-text-muted">TechCrunch</span>
                                    </div>
                                </li>
                                <li data-video-src="hajnEpCq5SE">
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons">&#xE037;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">The new MacBook - Design</span>
                                        <span class="uk-text-small uk-text-muted">Apple</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-head head_background" style="background-image: url('assets/img/gallery/Image17.jpg')">
                            <div class="md-card-head-menu">
                                <i class="md-icon material-icons md-icon-light">&#xE5D5;</i>
                            </div>
                            <h3 class="md-card-head-text">
                                Some City
                            </h3>
                            <div class="md-card-head-subtext">
                                <i class="md-card-head-icon wi wi-day-sunny-overcast uk-margin-right"></i>
                                <span>14&deg;</span>
                            </div>
                        </div>
                        <div class="md-card-content">
                            <ul class="md-list md-list-addon">
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon wi wi-day-sunny-overcast"></i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">22&deg; Mostly Sunny</span>
                                        <span class="uk-text-small uk-text-muted">7 Mar (Thursday)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon wi wi-cloudy"></i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">19&deg; Partly Cloudy</span>
                                        <span class="uk-text-small uk-text-muted">8 Mar (Friday)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon wi wi-day-rain"></i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">16&deg; Rainy</span>
                                        <span class="uk-text-small uk-text-muted">9 Mar (Saturday)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon wi wi-day-sunny uk-text-warning"></i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">24&deg; Sunny</span>
                                        <span class="uk-text-small uk-text-muted">9 Mar (Saturday)</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            -->

        </div>
    </div>

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

<!--Load Canvas JS -->
<script src="assets/js/canvasjs.min.js"></script>
<!--Load Few Charts-->
  <script>
      window.onload = function () {

      var Piechart = new CanvasJS.Chart("PieChart", {
        exportEnabled: false,
        animationEnabled: true,
        title:{
          text: "Books Per Category"
        },
        legend:{
          cursor: "pointer",
          itemclick: explodePie
        },
        data: [{
          type: "pie",
          showInLegend: true,
          toolTipContent: "{name}: <strong>{y}%</strong>",
          indexLabel: "{name} - {y}%",
          dataPoints: [
            { y: <?php echo $non_fiction;?> , name: "Non Fiction", exploded: true },

            { y: <?php echo $fiction;?> , name: " Fiction", exploded: true },

            { y:<?php echo $References;?> , name: "Refrences", exploded: true }
          ]
        }]
      });

      var borrowChart = new CanvasJS.Chart("BooksBorrowedPerCategory", {
        exportEnabled: false,
        animationEnabled: true,
        title:{
          text: "Book Borrowing Trend"
        },
        legend:{
          cursor: "pointer",
          itemclick: explodePie
        },
        data: [{
          type: "pie",
          showInLegend: true,
          toolTipContent: "{name}: <strong>{y}%</strong>",
          indexLabel: "{name} - {y}%",
          dataPoints: [
            { y:<?php echo $borrowed_non_fiction;?>, name: "Non Fiction", exploded: true },
            { y:<?php echo $borrowed_fiction;?>, name: "Fiction", exploded: true },
            { y:<?php echo $borrowed_references;?>, name: "Refrences", exploded: true }
          ]
        }]
      });
      Piechart.render();
      borrowChart.render();
      }

      function explodePie (e) {
        if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
          e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
        } else {
          e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
        }
        e.chart.render();

      }
  </script>

    <!-- common functions -->
    <script src="assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
        <!-- d3 -->
        <script src="bower_components/d3/d3.min.js"></script>
        <!-- metrics graphics (charts) -->
        <script src="bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>
        <!-- chartist (charts) -->
        <script src="bower_components/chartist/dist/chartist.min.js"></script>
        <script src="bower_components/maplace-js/dist/maplace.min.js"></script>
        <!-- peity (small charts) -->
        <script src="bower_components/peity/jquery.peity.min.js"></script>
        <!-- easy-pie-chart (circular statistics) -->
        <script src="bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <!-- countUp -->
        <script src="bower_components/countUp.js/dist/countUp.min.js"></script>
        <!-- handlebars.js -->
        <script src="bower_components/handlebars/handlebars.min.js"></script>
        <script src="assets/js/custom/handlebars_helpers.min.js"></script>
        <!-- CLNDR -->
        <script src="bower_components/clndr/clndr.min.js"></script>

        <!--  dashbord functions -->
        <script src="assets/js/pages/dashboard.min.js"></script>
    
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