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
          $query_mission = "select * from about_us_mission order by mission_id DESC LIMIT 1";
          $query_vision = "select * from about_us_vision order by vision_id DESC LIMIT 1";
          $query_core = "select core_text from about_us_core order by core_id DESC LIMIT 1";
          $query_core2 = "select core2_text from about_us_core order by core_id DESC LIMIT 1";
          $query_core3 = "select core3_text from about_us_core order by core_id DESC LIMIT 1";

          $run_mission = mysqli_query($conn,$query_mission);
          $run_vision = mysqli_query($conn,$query_vision);
          $run_core = mysqli_query($conn,$query_core);
          $run_core2 = mysqli_query($conn,$query_core2);
          $run_core3 = mysqli_query($conn,$query_core3);


          while($row=mysqli_fetch_array($run_mission)){

          	$mission_text = $row['mission_text'];

            while($row=mysqli_fetch_array($run_vision)){

              $vision_text = $row['vision_text'];

                while($row=mysqli_fetch_array($run_core)){

                  $core_text = $row['core_text'];

                  while($row=mysqli_fetch_array($run_core2)){

                    $core2_text = $row['core2_text'];

                    while($row=mysqli_fetch_array($run_core3)){

                      $core3_text = $row['core3_text'];
          ?>


          <!-- <-- GETTING VALUES -- > -->
          <form method = "post" action="admin_aboutus.php" enctype="multipart/form-data">
          <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">About Us</h3>
              </div>
              <div class="panel-body">
                <label>Our Vision</label>
                <textarea class="form-control" placeholder="Enter Vision" name="mission_text" rows="8"><?php echo $mission_text; ?></textarea>
              </div>
              <div class="panel-body">
                <label>Our Mission</label>
                <textarea class="form-control" placeholder="Enter Mission" name="vision_text" rows="8"><?php echo $vision_text; ?></textarea>
              </div>
              <div class="panel-body">
                <label>Core Values</label>
                <input type ="text" class="form-control" placeholder="Enter Core Values" name="values_text" rows="8" value = "<?php echo $core_text; ?>">
                <input type ="text" class="form-control" placeholder="Enter Core Values" name="values2_text" rows="8" value = "<?php echo $core2_text; ?>">
                <input type ="text" class="form-control" placeholder="Enter Core Values" name="values3_text" rows="8" value = "<?php echo $core3_text; ?>">
              </div>
              <div class="panel-body">
                  <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
              </div>
              </div>
          </div>
        <?php }}}}} ?>
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

              $mission_text   = $_POST['mission_text'];
              $vision_text   = $_POST['vision_text'];
              $values_text = $_POST['values_text'];
              $values2_text = $_POST['values2_text'];
              $values3_text = $_POST['values3_text'];

              if ($mission_text == '' or $vision_text == '' or $values_text == '' or $values2_text == '' or $values3_text == '') {

                  echo "<script>alert('Any of the fields is empty')</script>";
                  exit();
              }

              else {

                  $insert_query_mission = "insert into about_us_mission (mission_text) values ('$mission_text')";
                  $insert_query_vision = "insert into about_us_vision (vision_text) values ('$vision_text')";
                  $insert_query_core = "insert into about_us_core (core_text, core2_text, core3_text) values ('$values_text', '$values2_text', '$values3_text')";

                  if (mysqli_query($conn, $insert_query_mission)) {
                     if(mysqli_query($conn, $insert_query_vision)){
                       if(mysqli_query($conn, $insert_query_core)){
                        echo "<script>alert('Saved Successfully!')</script>";
                        echo "<script>window.open('admin_aboutus.php','_self')</script>";
                       }
                     }
                   }
              }
          }

          ?>
