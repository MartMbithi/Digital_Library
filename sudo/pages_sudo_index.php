<?php
    /*
     *   Handle Super User Authentication Logic Here
    */

    session_start();
    include('assets/config/config.php');

    //signin
    if(isset($_POST['sudo_login']))
    {
        $email = $_POST['email'];
        $password = sha1(md5($_POST['password']));//double encrypt to increase security
        $stmt=$mysqli->prepare("SELECT email, password, id  FROM iL_sudo  WHERE email=? AND password=?");//sql to log in user
        $stmt->bind_param('ss',$email, $password);//bind fetched parameters
        $stmt->execute();//execute bind
        $stmt -> bind_result($email, $password, $id);//bind result
        $rs=$stmt->fetch();
        $_SESSION['id'] = $id;//assaign session to sudo id
        
        if($rs)
            {
                //if its sucessfull
                header("location:pages_sudo_dashboard.php");
            }

        else
            {
                $err = "Access Denied Please Check Your Credentials";
            }
    }

    //Register new super user account
    if(isset($_POST['sudo_signup']))
    {

        $username = $_POST['username'];
        $email =$_POST['email'];
        $password = sha1(md5($_POST['password']));
        $number = $_POST['number'];
        
        //Insert Captured information to a database table
        $query="INSERT INTO iL_sudo (username, email, password, number) VALUES (?,?,?,?)";
        $stmt = $mysqli->prepare($query);
        //bind paramaters
        $rc=$stmt->bind_param('ssss', $username, $email, $password, $number);
        $stmt->execute();
  
        //declare a varible which will be passed to alert function
        if($stmt)
        {
            $success = "Super User Account Created";
        }
        else 
        {
            $err = "Please Try Again Or Try Later";
        }      
    }
        //random sudo number generator
        $length = 5;    
        $sudoNumber =  substr(str_shuffle('0123456789QWERTYUIOPLKJHGFDSAZXCVBNM'),1,$length);

?>
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->

<?php
//load head partial
 include("assets/inc/head.php");
?>

<body class="login_page">

    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <div class="user_avatar"></div>
                </div>
                <form method ="post">
                    <div class="uk-form-row">
                        <label for="login_username">Email</label>
                        <input class="md-input" required type="email" id="login_username" name="email" />
                    </div>
                    <div class="uk-form-row">
                        <label for="login_password">Password</label>
                        <input class="md-input" required type="password" id="login_password" name="password" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <input type="submit" name="sudo_login" value="Sign In" class="md-btn md-btn-primary md-btn-block md-btn-large"/>
                    </div>
                    
                </form>
            </div>
            <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_b uk-text-success">Can't log in?</h2>
                <p>Here’s the info to get you back in to your account as quickly as possible.</p>
                <p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps Lock is turned off, and that your username is spelled correctly, and then try again.</p>
                <p>If your password still isn’t working, it’s time to <a href="#" id="password_reset_show">reset your password</a>.</p>
            </div>
            <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
                <form>
                    <div class="uk-form-row">
                        <label for="login_email_reset">Your email address</label>
                        <input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <a href="index-2.html" class="md-btn md-btn-primary md-btn-block">Reset password</a>
                    </div>
                </form>
            </div>

            <div class="md-card-content large-padding" id="register_form" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-medium-bottom">Create an account</h2>
                <form method="post">
                    <div class="uk-form-row">
                        <label for="register_username">Username</label>
                        <input class="md-input" type="text" id="register_username" name="username" />
                    </div>
                    <div class="uk-form-row">
                        <label for="register_email">E-mail</label>
                        <input class="md-input" type="text" id="register_email" name="email" />
                    </div>
                    <div class="uk-form-row">
                        <label for="register_password">Password</label>
                        <input class="md-input" type="password" id="register_password" name="password" />
                    </div>
                    <div class="uk-form-row" style="display:none">
                        <label for="register_email">Super User Number</label>
                        <input class="md-input" type="text" id="register_email" value="<?php echo $sudoNumber;?>" readonly name="number" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <input type="submit" name="sudo_signup" class="md-btn md-btn-primary md-btn-block md-btn-large" value="Sign Up"/>
                    </div>
                </form>
            </div>
        </div>
        <!--
            Super user account is system generated 
            Uncomment this block of code to enable super users to create account

        <div class="uk-margin-top uk-text-center">
            <a href="#" id="signup_form_show">Create Super User Account</a>
        </div>
        -->
    </div>
    <!--Footer-->
    <?php require_once('assets/inc/footer.php');?>
    <!--Footer-->

    <!-- common functions -->
    <script src="assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="assets/js/uikit_custom.min.js"></script>
    <!-- altair core functions -->
    <script src="assets/js/altair_admin_common.min.js"></script>

    <!-- altair login page functions -->
    <script src="assets/js/pages/login.min.js"></script>

    <script>
        // check for theme
        if (typeof(Storage) !== "undefined") {
            var root = document.getElementsByTagName( 'html' )[0],
                theme = localStorage.getItem("altair_theme");
            if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
                root.className += ' app_theme_dark';
            }
        }
    </script>

    
</body>

</html>