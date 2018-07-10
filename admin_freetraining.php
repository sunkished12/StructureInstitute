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
          $query_fcourse1 = "select course1_desc from free_training order by course_id DESC LIMIT 1";
          $query_fcourse2 = "select course2_desc from free_training order by course_id DESC LIMIT 1";
          $query_fcourse3 = "select course1_name from free_training order by course_id DESC LIMIT 1";
          $query_fcourse4 = "select course2_name from free_training order by course_id DESC LIMIT 1";

          $run_fcourse1 = mysqli_query($conn,$query_fcourse1);
          $run_fcourse2 = mysqli_query($conn,$query_fcourse2);
          $run_fcourse3 = mysqli_query($conn,$query_fcourse3);
          $run_fcourse4 = mysqli_query($conn,$query_fcourse4);


          while($row=mysqli_fetch_array($run_fcourse1)){

          	$fcourse1_desc = $row['course1_desc'];

            while($row=mysqli_fetch_array($run_fcourse2)){

              $fcourse2_desc = $row['course2_desc'];

              while($row=mysqli_fetch_array($run_fcourse3)){

                $fcourse1_name = $row['course1_name'];

                while($row=mysqli_fetch_array($run_fcourse4)){

                  $fcourse2_name = $row['course2_name'];


          ?>


          <!-- <-- GETTING VALUES -- > -->
          <form method = "post" action="admin_freetraining.php" enctype="multipart/form-data">
          <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Free Training</h3>
              </div>
              <div class="panel-body">
                <label>Course 1</label>
                <input type="text" class="form-control" placeholder="Enter Course Name" name="fcourse1_name_text" value = "<?php echo $fcourse1_name; ?>">
                <textarea class="form-control" placeholder="Enter Description" name="fcourse1_desc_text" rows="8"><?php echo $fcourse1_desc; ?></textarea>
              </div>
              <div class="panel-body">
                <label>Course 2</label>
                <input type="text" class="form-control" placeholder="Enter Course Name" name="fcourse2_name_text" value = "<?php echo $fcourse2_name; ?>">
                <textarea class="form-control" placeholder="Enter Description" name="fcourse2_desc_text" rows="8"><?php echo $fcourse2_desc; ?></textarea>
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

              $fcourse1_desc_text= $_POST['fcourse1_desc_text'];
              $fcourse2_desc_text= $_POST['fcourse2_desc_text'];
              $fcourse1_name_text= $_POST['fcourse1_name_text'];
              $fcourse2_name_text= $_POST['fcourse2_name_text'];

              if ($fcourse1_desc_text == '' or $fcourse2_desc_text == '' or $fcourse1_name_text == '' or $fcourse2_name_text == '') {

                  echo "<script>alert('Any of the fields is empty')</script>";
                  exit();
              }

              else {

                  $insert_query_fcourse = "insert into free_training (course1_name, course1_desc, course2_name, course2_desc) values ('$fcourse1_name_text','$fcourse1_desc_text', '$fcourse2_name_text', '$fcourse2_desc_text')";

                  if (mysqli_query($conn, $insert_query_fcourse)) {
                      echo "<script>alert('Saved Successfully!')</script>";
                      echo "<script>window.open('admin_freetraining.php','_self')</script>";
                   }
              }
          }

          ?>
