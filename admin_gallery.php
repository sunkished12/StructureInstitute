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
          $query_image1 = "select image1 from gallery order by gallery_id DESC LIMIT 1";
          $query_image2 = "select image2 from gallery order by gallery_id DESC LIMIT 1";
          $query_image3 = "select image3 from gallery order by gallery_id DESC LIMIT 1";
          $query_image4 = "select image4 from gallery order by gallery_id DESC LIMIT 1";

          $run_image1 = mysqli_query($conn,$query_image1);
          $run_image2 = mysqli_query($conn,$query_image2);
          $run_image3 = mysqli_query($conn,$query_image3);
          $run_image4 = mysqli_query($conn,$query_image4);


          while($row=mysqli_fetch_array($run_image1)){

          	$image1 = $row['image1'];

            while($row=mysqli_fetch_array($run_image2)){

              $image2 = $row['image2'];

                while($row=mysqli_fetch_array($run_image3)){

                  $image3 = $row['image3'];

                  while($row=mysqli_fetch_array($run_image4)){

                    $image4 = $row['image4'];
          ?>


          <!-- <-- GETTING VALUES -- > -->
          <form method = "post" action="admin_gallery.php" enctype="multipart/form-data">
          <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Instructors</h3>
              </div>
              <div class="panel-body">
                <label>Image 1</label>
                <input type="file" name="image1">
                <img src="portfolio/<?php echo $image1; ?>" width="400" height="200"><br />
                <label>Image 2</label>
                <input type="file" name="image2">
                <img src="portfolio/<?php echo $image2; ?>" width="400" height="200"><br />
                <label>Image 3</label>
                <input type="file" name="image3">
                <img src="portfolio/<?php echo $image3; ?>" width="400" height="200"><br />
                <label>Image 4</label>
                <input type="file" name="image4">
                <img src="portfolio/<?php echo $image4; ?>" width="400" height="200">
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

    $image1 = $_FILES['image1']['name'];
    $image_tmp1= $_FILES['image1']['tmp_name'];

    $image2 = $_FILES['image2']['name'];
    $image_tmp2= $_FILES['image2']['tmp_name'];

    $image3 = $_FILES['image3']['name'];
    $image_tmp3= $_FILES['image3']['tmp_name'];

    $image4 = $_FILES['image4']['name'];
    $image_tmp4= $_FILES['image4']['tmp_name'];




        move_uploaded_file($image_tmp,"img/$image1");
        move_uploaded_file($image_tmp2,"img/$image2");
        move_uploaded_file($image_tmp3,"img/$image3");
        move_uploaded_file($image_tmp4,"img/$image4");

        $insert_query_gallery = "insert into gallery (image1, image2, image3, image4) values ('$image1','$image2','$image3','$image4')";

        if (mysqli_query($conn, $insert_query_gallery)) {
            echo "<script>alert('Saved Successfully!')</script>";
            echo "<script>window.open('admin_gallery.php','_self')</script>";
         }

}

?>
