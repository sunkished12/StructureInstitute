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
          $query_course1 = "select course1_name from courses order by course_id DESC LIMIT 1";
          $query_course2 = "select course1_desc from courses order by course_id DESC LIMIT 1";
          $query_course3 = "select course2_name from courses order by course_id DESC LIMIT 1";
          $query_course4 = "select course2_desc from courses order by course_id DESC LIMIT 1";
          $query_course5 = "select course3_name from courses order by course_id DESC LIMIT 1";
          $query_course6 = "select course3_desc from courses order by course_id DESC LIMIT 1";
          $query_course7 = "select course4_name from courses order by course_id DESC LIMIT 1";
          $query_course8 = "select course4_desc from courses order by course_id DESC LIMIT 1";
          $query_course9 = "select course5_name from courses order by course_id DESC LIMIT 1";
          $query_course10 = "select course5_desc from courses order by course_id DESC LIMIT 1";


          $run_course1 = mysqli_query($conn,$query_course1);
          $run_course2 = mysqli_query($conn,$query_course2);
          $run_course3 = mysqli_query($conn,$query_course3);
          $run_course4 = mysqli_query($conn,$query_course4);
          $run_course5 = mysqli_query($conn,$query_course5);
          $run_course6 = mysqli_query($conn,$query_course6);
          $run_course7 = mysqli_query($conn,$query_course7);
          $run_course8 = mysqli_query($conn,$query_course8);
          $run_course9 = mysqli_query($conn,$query_course9);
          $run_course10 = mysqli_query($conn,$query_course10);


          while($row=mysqli_fetch_array($run_course1)){

          	$course1_name = $row['course1_name'];

            while($row=mysqli_fetch_array($run_course2)){

              $course1_desc = $row['course1_desc'];

              while($row=mysqli_fetch_array($run_course3)){

                $course2_name = $row['course2_name'];

                while($row=mysqli_fetch_array($run_course4)){

                  $course2_desc = $row['course2_desc'];

                  while($row=mysqli_fetch_array($run_course5)){

                    $course3_name = $row['course3_name'];

                    while($row=mysqli_fetch_array($run_course6)){

                      $course3_desc = $row['course3_desc'];

                      while($row=mysqli_fetch_array($run_course7)){

                        $course4_name = $row['course4_name'];

                        while($row=mysqli_fetch_array($run_course8)){

                          $course4_desc = $row['course4_desc'];

                          while($row=mysqli_fetch_array($run_course9)){

                            $course5_name = $row['course5_name'];

                            while($row=mysqli_fetch_array($run_course10)){

                              $course5_desc = $row['course5_desc'];
          ?>
          <!-- <-- GETTING VALUES -- > -->

          <form method = "post" action="admin_courses.php" enctype="multipart/form-data">
          <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Courses</h3>
              </div>
              <div class="panel-body">
                <label>Course 1</label>
                <input type="text" class="form-control" placeholder="Enter Course Name" name="course1_name_text" value = "<?php echo $course1_name; ?>">
                <textarea class="form-control" placeholder="Enter Description" name="course1_desc_text" rows="8"><?php echo $course1_desc; ?></textarea>
              </div>
              <div class="panel-body">
                <label>Course 2</label>
                <input type="text" class="form-control" placeholder="Enter Course Name" name="course2_name_text" value = "<?php echo $course2_name; ?>">
                <textarea class="form-control" placeholder="Enter Description" name="course2_desc_text" rows="8"><?php echo $course2_desc; ?></textarea>
              </div>
              <div class="panel-body">
                <label>Course 3</label>
                <input type="text" class="form-control" placeholder="Enter Course Name" name="course3_name_text" value = "<?php echo $course3_name; ?>">
                <textarea class="form-control" placeholder="Enter Description" name="course3_desc_text" rows="8"><?php echo $course3_desc; ?></textarea>
              </div>
              <div class="panel-body">
                <label>Course 4</label>
                <input type="text" class="form-control" placeholder="Enter Course Name" name="course4_name_text" value = "<?php echo $course4_name; ?>">
                <textarea class="form-control" placeholder="Enter Description" name="course4_desc_text" rows="8"><?php echo $course4_desc; ?></textarea>
              </div>
              <div class="panel-body">
                <label>Course 5</label>
                <input type="text" class="form-control" placeholder="Enter Course Name" name="course5_name_text" value = "<?php echo $course5_name; ?>">
                <textarea class="form-control" placeholder="Enter Description" name="course5_desc_text" rows="8"><?php echo $course5_desc; ?></textarea>
              </div>
              <div class="panel-body">
                  <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
              </div>
              </div>
          </div>
        <?php }}}}}}}}}}?>
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

              $course1_desc_text= $_POST['course1_desc_text'];
              $course1_name_text= $_POST['course1_name_text'];
              $course2_desc_text= $_POST['course2_desc_text'];
              $course2_name_text= $_POST['course2_name_text'];
              $course3_desc_text= $_POST['course3_desc_text'];
              $course3_name_text= $_POST['course3_name_text'];
              $course4_desc_text= $_POST['course4_desc_text'];
              $course4_name_text= $_POST['course4_name_text'];
              $course5_desc_text= $_POST['course5_desc_text'];
              $course5_name_text= $_POST['course5_name_text'];


              if ($course1_desc_text == '' or $course2_desc_text == '' or $course1_name_text == '' or $course2_name_text == ''  ) {

                  echo "<script>alert('Any of the fields is empty')</script>";
                  exit();
              }

              else {

                  $insert_query_fcourse = "insert into courses (course1_name, course1_desc, course2_name, course2_desc, course3_name, course3_desc, course4_name, course4_desc, course5_name, course5_desc) values ('$course1_name_text','$course1_desc_text', '$course2_name_text', '$course2_desc_text', '$course3_name_text','$course3_desc_text', '$course4_name_text', '$course4_desc_text', '$course5_name_text','$course5_desc_text')";

                  if (mysqli_query($conn, $insert_query_fcourse)) {
                      echo "<script>alert('Saved Successfully!')</script>";
                      echo "<script>window.open('admin_courses.php','_self')</script>";
                   }
              }
          }

          ?>
