<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Account Login</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <?php
      session_start();
    ?>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Back to Main Website</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"><img src="img/logo.png">  &nbspAccount Login </h1>

          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form method = "POST" action = "login.php" class="well">
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" class="form-control" placeholder="Enter Email" name= "user_name">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="user_pass">
                  </div>
                  <input type="submit" class="btn btn-default btn-block" value="Login" name="login">
              </form>
          </div>
        </div>
      </div>

      <?php
      include("connect.php");

      if(isset($_POST['login'])){
        	$conn=mysqli_connect("localhost","root","","structure_institute");
        	$user_name = mysqli_real_escape_string($conn,$_POST['user_name']);
        	$user_pass = mysqli_real_escape_string($conn,$_POST['user_pass']);

        	$encrypt = md5($user_pass);

        	$admin_query = "select * from admin_login where user_name='$user_name' AND user_pass='$user_pass'";

        	$run = mysqli_query($conn,$admin_query);

        	if(mysqli_num_rows($run)>0){
            	$_SESSION['user_name'] = $user_name;
              echo "<script>window.open('admin.php','_self')</script>";
        	}else {
            	echo "<script>alert('User name or password is incorrect')</script>";
        	}
      }
      ?>
    </section>

    <footer id="footer">
    </footer>

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
