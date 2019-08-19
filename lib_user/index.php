<!--PHP CODE TO LOG IN library user-->
<?php
session_start();
include('includes/config.php');
    if(isset($_POST['lib_user_login']))
        {
            $email=$_POST['email'];
            $password=sha1($_POST['password']);
            $stmt=$mysqli->prepare("SELECT email,password, client_id FROM client WHERE email=? and password=? ");
			$stmt->bind_param('ss',$email,$password);
			$stmt->execute();
            $stmt -> bind_result($email,$password,$client_id);
            $rs=$stmt->fetch();
            $_SESSION['client_id']=$client_id;
            $uip=$_SERVER['REMOTE_ADDR'];
            $ldate=date('d/m/Y h:i:s', time());
            if($rs)
				{
               
					header("location:lib_user_dashboard.php");
				}

				else
				{
					echo "<script>alert('Invalid Credentials Try Again');</script>";
				}
		}
?>
<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php");?>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Digital Library Management System</h1>
                    <h1 class="h4 text-gray-900 mb-4">Welcome<h1>
                  </div>
                  <form method="POST" action="#" class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" required id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password"name="password"  class="form-control form-control-user" required id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="submit" name="lib_user_login" value="Login" class="btn btn-outline-success btn-user "/>
                        
                    <hr>
                    
                  </form>
                  <hr>
                  
                  <div class="text-center">
                    <a class="small" href="lib_user_signup.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
