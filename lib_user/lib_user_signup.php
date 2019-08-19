<!--PHP CODE TO CAPTURE LIBRARY USERS DETAILS-->
<?php
session_start();
include('includes/config.php');
    if(isset($_POST['add_lib_user']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $id_no=$_POST['id_no'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=sha1($_POST['password']);
    //$acc_status=$_POST['acc_status'];
    //$dpic=$_FILES["dpic"]["name"];
    //move_uploaded_file($_FILES["dpic"]["tmp_name"],"../client/img/".$_FILES["dpic"]["name"]);
    

//sql to inset the values to the database
    $query="insert into client (fname, lname, id_no, email, username, password, acc_status) values(?,?,?,?,?,?,'pending')";
    $stmt = $mysqli->prepare($query);
    //bind the submitted values with the matching columns in the database.
    $rc=$stmt->bind_param('ssssss',$fname, $lname, $id_no, $email, $username, $password);
    $stmt->execute();
    //if binding is successful, then indicate that a new value has been added.
    echo"<script>alert('Success!  Account Created Proceed To Log In ');</script>";
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
                    <h1 class="h4 text-gray-900 mb-4">Create Account With Us</h1>

                  </div>
                  <form method="POST" action="#" class="user">

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="fname" required id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Your First Name">
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="lname" required id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Your Last Name">
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="id_no" required id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Student ID Or National ID Number">
                    </div>

                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" required id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email  Your Address">
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" required id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email  Your Username">
                    </div>

                    <div class="form-group">
                      <input type="password"name="password"  class="form-control form-control-user" required id="exampleInputPassword" placeholder="Password">
                    </div>

                    <input type="submit" name="add_lib_user" value="Sign Up" class="btn btn-outline-primary btn-user "/>
                        
                    <hr>
                    
                  </form>
                  <hr>
                  
                  <div class="text-center">
                    <a class="small" href="index.php">Login!</a>
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
