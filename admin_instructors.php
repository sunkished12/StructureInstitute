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
          $query_inst_name = "select inst_name from instructor order by inst_id DESC LIMIT 1";
          $query_inst_desc = "select inst_desc from instructor order by inst_id DESC LIMIT 1";
          $query_inst_fb = "select inst_fb from instructor order by inst_id DESC LIMIT 1";
          $query_inst_image = "select inst_image from instructor order by inst_id DESC LIMIT 1";


          $run_inst_name = mysqli_query($conn,$query_inst_name);
          $run_inst_desc = mysqli_query($conn,$query_inst_desc);
          $run_inst_fb = mysqli_query($conn,$query_inst_fb);
          $run_inst_image = mysqli_query($conn,$query_inst_image);



          while($row=mysqli_fetch_array($run_inst_name)){

          	$inst_name = $row['inst_name'];

            while($row=mysqli_fetch_array($run_inst_desc)){

              $inst_desc = $row['inst_desc'];

                while($row=mysqli_fetch_array($run_inst_fb)){

                  $inst_fb = $row['inst_fb'];

                  while($row=mysqli_fetch_array($run_inst_image)){

                    $inst_image = $row['inst_image'];
          ?>


          <!-- <-- GETTING VALUES -- > -->
          <form method = "post" action="admin_instructors.php" enctype="multipart/form-data">
          <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Instructors</h3>
              </div>
              <div class="panel-body">
                <label>Instructor Name</label>
                <input type="text" class="form-control" placeholder="Enter Instructor's Name" name="inst_name_text" rows="8" value = "<?php echo $inst_name; ?>">
              </div>
              <div class="panel-body">
                <label>Instructor Description</label>
                <textarea class="form-control" placeholder="Enter Instructor's Description" name="inst_desc_text" rows="8"><?php echo $inst_desc; ?></textarea>
              </div>
              <div class="panel-body">
                <label>Instructor Facebook</label>
                <input type="text" class="form-control" placeholder="Enter Facebook Link" name="inst_fb_text" value = "<?php echo $inst_fb; ?>">
              </div>
              <div class="panel-body">
                <label>Instructor Image</label>
                <input type="file" name="image">
                <img src="img/<?php echo $inst_image; ?>" width="100" height="100">
              </div>
              <div class="panel-body">
                  <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
              </div>
              </div>
          </div>
        <?php }}}} ?>
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

              $inst_name= $_POST['inst_name_text'];
              $inst_desc= $_POST['inst_desc_text'];
              $inst_fb = $_POST['inst_fb_text'];
              $inst_image = $_FILES['image']['name'];
              $image_tmp= $_FILES['image']['tmp_name'];

              if ($inst_name  == '' or $inst_desc == '' or $inst_fb == '' ) {

                  echo "<script>alert('Any of the fields is empty')</script>";
                  exit();
              }

              else {

                  move_uploaded_file($image_tmp,"img/$inst_image");

                  $insert_query_instructor = "insert into instructor (inst_name, inst_desc, inst_fb, inst_image) values ('$inst_name','$inst_desc','$inst_fb','$inst_image')";

                  if (mysqli_query($conn, $insert_query_instructor)) {
                      echo "<script>alert('Saved Successfully!')</script>";
                      echo "<script>window.open('admin_instructors.php','_self')</script>";
                   }
              }
          }

          ?>
