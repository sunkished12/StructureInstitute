<?php
session_start();

  if(!isset($_SESSION['user_name'])){
      header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin Navigation</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, <?php echo $_SESSION['user_name']; ?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class = "container">
       <label> </label>
    </div>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Structute Institute</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="admin_dashboard.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="admin_aboutus.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> About Us
              </a>
              <a href="admin_courses.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Courses
              </a>
              <a href="admin_freetraining.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Free Training
              </a>
              <a href="admin_instructors.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Instructors
              </a>
              <a href="admin_contact.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Contact
              </a>
              <a href="admin_gallery.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Gallery
              </a>
            </div>
          </div>

          <!-- <-- GETTING VALUES -- > -->

          <?php

          include("connect.php");
          $conn=mysqli_connect("localhost","root","","structure_institute");
          $query_address = "select con_address from contact order by contact_id DESC LIMIT 1";
          $query_email = "select con_email from contact order by contact_id DESC LIMIT 1";
          $query_telno = "select con_telno from contact order by contact_id DESC LIMIT 1";

          $run_address = mysqli_query($conn,$query_address);
          $run_email = mysqli_query($conn,$query_email);
          $run_telno = mysqli_query($conn,$query_telno);


          while($row=mysqli_fetch_array($run_address)){

          	$con_address = $row['con_address'];

            while($row=mysqli_fetch_array($run_email)){

              $con_email = $row['con_email'];

                while($row=mysqli_fetch_array($run_telno)){

                  $con_telno = $row['con_telno'];
          ?>


          <!-- <-- GETTING VALUES -- > -->
          <form method = "post" action="admin_contact.php" enctype="multipart/form-data">
          <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Contact</h3>
              </div>
              <div class="panel-body">
                <label>Site Address</label>
                <input type = "text" class="form-control" placeholder="Enter Address" name="con_address" rows="8" value = "<?php echo $con_address; ?>">
              </div>
              <div class="panel-body">
                <label>Telephone Number</label>
                <input type = "text" class="form-control" placeholder="Enter Telephone Number" name="con_telno" rows="8" value = "<?php echo $con_telno; ?>">
              </div>
              <div class="panel-body">
                <label>E-mail Address</label>
                <input type = "text" class="form-control" placeholder="Enter E-mail Address  " name="con_email" rows="8" value = "<?php echo $con_email; ?>">
              </div>
              <div class="panel-body">
                  <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
              </div>
              </div>
          </div>
        <?php }}} ?>
        </form>
        </div>
      </div>
    </section>
    <footer id="footer">
      <p>Copyright Structure Institute, &copy; 2018</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

          <?php
          include("connect.php");
          $conn = mysqli_connect("localhost", "root", "", "structure_institute");
          if (isset($_POST['submit'])) {

              $con_address   = $_POST['con_address'];
              $con_telno   = $_POST['con_telno'];
              $con_email = $_POST['con_email'];

              if ($con_address == '' or $con_telno == '' or $con_email == '') {

                  echo "<script>alert('Any of the fields is empty')</script>";
                  exit();
              }

              else {

                  $insert_query = "insert into contact (con_address, con_email, con_telno) values ('$con_address', '$con_email', '$con_telno')";

                       if(mysqli_query($conn, $insert_query)){
                        echo "<script>alert('Saved Successfully!')</script>";
                        echo "<script>window.open('admin_contact.php','_self')</script>";

                   }
              }
          }

          ?>
