<?php
    /*
        *   Handle  Authentication Logic Here
    */

    session_start();
    include('assets/config/config.php');

     //password reset token
     $length = 20;    
     $token =  substr(str_shuffle('0123456789QWERTYUIOPLKJHGFDSAZXCVBNM'),1,$length);
     $ln=10;
     $dummy_pwd =  substr(str_shuffle('0123456789QWERTYUIOPLKJHGFDSAZXCVBNM'),1,$ln);

    //signin
    if(isset($_POST['std_login']))
    {
        $s_email = $_POST['s_email'];
        $s_pwd = sha1(md5($_POST['s_pwd']));//double encrypt to increase security
        $stmt=$mysqli->prepare("SELECT s_email, s_number, s_pwd, s_id  FROM iL_Students  WHERE (s_email=? || s_number =?) AND s_pwd=?");//sql to log in user
        $stmt->bind_param('sss',$s_email, $s_email, $s_pwd);//bind fetched parameters
        $stmt->execute();//execute bind
        $stmt -> bind_result($s_email, $s_email, $s_pwd, $id);//bind result
        $rs=$stmt->fetch();
        $_SESSION['s_id'] = $id;//assaign session to sudo id
        
        if($rs)
            {
                //if its sucessfull
                header("location:pages_std_dashboard.php");
            }

        else
            {
                $err = "Access Denied Please Check Your Credentials";
            }
    }
    
    //reset password
    if(isset($_POST['Reset_pwd']))
    {

        $pr_useremail = $_POST['pr_useremail'];
        $pr_usertype =$_POST['pr_usertype'];
        $pr_token = sha1(md5($_POST['pr_token']));
        $pr_dummypwd = $_POST['pr_dummypwd'];
        $pr_status = $_POST['pr_status'];
        
        //Insert Captured information to a database table
        $query="INSERT INTO iL_PasswordResets (pr_useremail, pr_usertype, pr_token, pr_dummypwd, pr_status) VALUES (?,?,?,?,?)";
        $stmt = $mysqli->prepare($query);
        //bind paramaters
        $rc=$stmt->bind_param('sssss', $pr_useremail, $pr_usertype, $pr_token, $pr_dummypwd, $pr_status);
        $stmt->execute();
  
        //declare a varible which will be passed to alert function
        if($stmt)
        {
            $success = "Password Reset Instructions Sent To Your Inbox";
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
//load head partial
 include("assets/inc/head.php");
?>

<body class="login_page">

    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <h2>iLibrary Student Login</h2>
                </div>
                <form method ="post">
                    <div class="uk-form-row">
                        <label for="login_username">Email or Student Number</label>
                        <input class="md-input" required type="text" id="login_username" name="s_email" />
                    </div>
                    <div class="uk-form-row">
                        <label for="login_password">Password</label>
                        <input class="md-input" required type="password" id="login_password" name="s_pwd" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <input type="submit" name="std_login" value="Sign In" class="md-btn md-btn-primary md-btn-block md-btn-large"/>
                    </div>
                    
                </form>
            </div>
            <div class="md-card-content large-padding uk-position-relative" id="register_form" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_b uk-text-success">Can't log in?</h2>
                <p>Here’s the info to get you back in to your account as quickly as possible.</p>
                <p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps Lock is turned off, and that your username is spelled correctly, and then try again.</p>
                <p>If your password still isn’t working, it’s time to <a href="#" id="password_reset_show">Reset Your Student password</a>.</p>
            </div>
            <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
                <form method = "POST">
                    <div class="uk-form-row">
                        <label for="login_email_reset">Your email address</label>
                        <input class="md-input" required name="pr_useremail"  type="email" id="login_email_reset" />
                    </div>
                    <div class="uk-form-row" style="display:none">
                        <label for="login_email_reset">User Type</label>
                        <input class="md-input" name="pr_usertype" value="Student"  type="text" id="login_email_reset" />
                    </div>
                    <div class="uk-form-row" style="display:none">
                        <label for="login_email_reset">Token</label>
                        <input class="md-input" name="pr_token" value="<?php echo $token;?>"   type="text" id="login_email_reset"  />
                    </div>
                    <div class="uk-form-row" style="display:none">
                        <label for="login_email_reset">Your email address</label>
                        <input class="md-input" name="pr_dummypwd" value="<?php echo $dummy_pwd;?>"  type="text" id="login_email_reset" />
                    </div>
                    <div class="uk-form-row" style="display:none">
                        <label for="login_email_reset">Reset Status</label>
                        <input class="md-input" name="pr_status" value="Pending"  type="text" id="login_email_reset" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <input type="submit" value="Reset password" name="Reset_pwd" class="md-btn md-btn-primary md-btn-block"/>
                    </div>
                </form>
            </div>

        </div>
        
        <div class="uk-margin-top uk-text-center">
            <a href="#" id="signup_form_show">Forgot Password</a>
        </div>
        <div class="uk-margin-top uk-text-center">
            <a href="../" >Home</a>
        </div>
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