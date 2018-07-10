<?php

  session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Structure Institute</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="body">
  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">

        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="#body" class="scrollto"><img src="img/logo.png" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#body">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Courses</a></li>
          <li><a href="#training">Free Training</a></li>
          <li><a href="#team">Instructors</a></li>
          <li><a href="#testimonials">FAQ</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#portfolio">Gallery</a></li>
          <!-- <li class="menu-has-children"><a href="">Gallery</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->
          <li><a href="#register">Register</a></li>
          <!-- <li><a href="login.php">Admin</a></li> -->
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-content">
      <h2>Bridging the gap between<br> <span>Academe</span> and the <span>Industry</span>!</h2>
      <div>
        <a href="#about" class="btn-get-started scrollto">About Us</a>
        <a href="#portfolio" class="btn-projects scrollto">Courses Offered</a>
      </div>
    </div>

    <div id="intro-carousel" class="owl-carousel" >
      <div class="item" style="background-image: url('img/intro-carousel/1.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/2.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/3.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/4.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/5.jpg');"></div>
    </div>

  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Section
    ============================-->

    <?php
    // ABOUT US SECTION

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


    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="img/structurephoto1.png" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>Our Vision</h2>
            <h3><?php echo $mission_text; ?></h3>
            <h2>Our Mision</h2>
            <h3><?php echo $vision_text; ?></h3>
            <h2>Our Core Values</h2>
            <ul>
              <li><i class="ion-android-checkmark-circle"></i> <?php echo $core_text; ?></li>
              <li><i class="ion-android-checkmark-circle"></i> <?php echo $core2_text; ?></li>
              <li><i class="ion-android-checkmark-circle"></i> <?php echo $core3_text; ?></li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- #about -->
    <?php
    }}}}}
    ?>

    <!--==========================
      Services Section
    ============================-->
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

    <section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Courses</h2>
          <p>We at Structure Institute aim to produce topnotch civil engineers. In line with this, we offer the following courses and software trainings:</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="fa fa-bar-chart"></i></div>
              <h4 class="title"><a href=""><?php echo $course1_name; ?></a></h4>
              <p class="description"><?php echo $course1_desc; ?></p><br><br>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="fa fa-picture-o"></i></div>
              <h4 class="title"><a href=""><?php echo $course2_name; ?></a></h4>
              <p class="description"><?php echo $course3_desc; ?></p><br><br>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInLeft" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-shopping-bag"></i></div>
              <h4 class="title"><a href=""><?php echo $course3_name; ?></a></h4>
              <p class="description"><?php echo $course3_desc; ?></p><br><br>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-map"></i></div>
              <h4 class="title"><a href=""><?php echo $course4_name; ?></a></h4>
              <p class="description"><?php echo $course4_desc; ?></p><br><br>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInLeft" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-shopping-bag"></i></div>
              <h4 class="title"><a href=""><?php echo $course5_name; ?></a></h4>
              <p class="description"><?php echo $course5_desc; ?></p><br><br>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #services -->

  <?php }}}}}}}}}} ?>
    <!--==========================
      Courses Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
        	<div class="box wow fadeInLeft" data-wow-delay="0.2s">
          		<div class="col-lg-12 content">
            		<h2>Course Description</h2>
            		<h3>Structral Modeling, Analysis and Design of Buildings using Etabs 2016 software</h3>
            		<h2>Course Code</h2>
            		<h3>SI-SAB Advanced</h3>
            		<h2>Coverage</h2>
            		<ul>
              			<li><i class="ion-android-checkmark-circle"></i> Applied to Ten (10) Storey  Residential Building.</li>
              			<li><i class="ion-android-checkmark-circle"></i> Applied to Ten (10) Storey Steel Building.</li>
              			<li><i class="ion-android-checkmark-circle"></i> Applied to Dual System (Shearwall + Moment Frame).</li>
            		</ul>
            		<h2>On ETABS Modeling Techniques</h2>
            		<h3>· ETABS modeling techniques (e.g. import DXF by Floor Plan, by Architectural)</h3>
            		<h3>· Edit commands (e.g. replicate, extrude, merge, move, divide & join frames, etc.)</h3>
            		<h3>· End fixity definitions (e.g. moment & shear releases, rigid zone factor, etc.)</h3>
            		<h3>· Mesh options (e.g. manual and auto mesh)</h3>
            		<h2>On ETABS Seismic Analysis Input and Earthquake Engineering </h2>
            		<h3>· Static – Equivalent Lateral Force</h3>
            		<h3>· Modal Analysis (e.g. bldg period, mode shapes, modal mass participation factor, etc.)</h3>
            		<h3>· Derivation of Response Spectrum Concept</h3>
            		<h3>· Dynamic – Response Spectrum Method </h3>
            		<h3>· Excitation Angle  </h3>
            		<h3>· Base Shear Scaling (Vstatic / Vdynamic) </h3>
            		<h3>· 25% Backup Frame Check</h3>
            		<h2>On NSCP 2015 Code Design Provisions and Requirements</h2>
            		<h3>· Load combination derivations (NSCP 2015, UBC 97, ASCE 7)</h3>
            		<h3>· Property modifiers for cracked section properties</h3>
            		<h3>· Probable shear on girders</h3>
            		<h3>· Strong column – weak beam on columns and girders</h3>
            		<h3>· Column slenderness and magnified moment on sway frames</h3>
            		<h3>· Member design using ETABS</h3>
            <!-- <h2>Our Core Values</h2>
            <ul>
              <li><i class="ion-android-checkmark-circle"></i> Maintaining quality trainings in structural analysis and design of buildings.</li>
              <li><i class="ion-android-checkmark-circle"></i> Constantly looking for innovations and advancements in structural engineering.</li>
              <li><i class="ion-android-checkmark-circle"></i> Geared not to do different things but to do things differently.</li>
            </ul> -->

          			</div>
        		</div>
        	</div>
      </div>
    </section><!-- #about -->

    <!-- ==========================
      Clients Section
    ============================ -->
    <!-- <section id="clients" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Clients</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>

        <div class="owl-carousel clients-carousel">
          <img src="img/clients/client-1.png" alt="">
          <img src="img/clients/client-2.png" alt="">
          <img src="img/clients/client-3.png" alt="">
          <img src="img/clients/client-4.png" alt="">
          <img src="img/clients/client-5.png" alt="">
          <img src="img/clients/client-6.png" alt="">
          <img src="img/clients/client-7.png" alt="">
          <img src="img/clients/client-8.png" alt="">
        </div>

      </div>
    </section> -->
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

    <section id="training">
      <div class="container">
        <div class="section-header">
          <h2>Free Training</h2>
          <p>Structure Institute also provides free training on the following softwares:</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="fa fa-bar-chart"></i></div>
              <h4 class="title"><a href=""><?php echo $fcourse1_name; ?></a></h4>
              <p class="description"><?php echo $fcourse1_desc; ?></p><br><br>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="fa fa-picture-o"></i></div>
              <h4 class="title"><a href=""><?php echo $fcourse2_name; ?></a></h4>
              <p class="description"><?php echo $fcourse2_desc; ?></p><br><br>
            </div>
          </div>
        </div>

      </div>
    </section>

    <?php }}}} ?>
    <!--==========================
      Our Portfolio Section
    ============================-->


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

<section id="portfolio" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Gallery</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="portfolio/<?php echo $image1; ?>" class="portfolio-popup">
                <img src="portfolio/<?php echo $image1; ?>" alt="" width="800" height="200">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp"></h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="portfolio/<?php echo $image2; ?>" class="portfolio-popup">
                <img src="portfolio/<?php echo $image2; ?>" alt="" width="800" height="200">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp"></h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="portfolio/<?php echo $image3; ?>" class="portfolio-popup">
                <img src="portfolio/<?php echo $image3; ?>" alt="" width="800" height="200">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp"></h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="portfolio/<?php echo $image4; ?>" class="portfolio-popup">
                <img src="portfolio/<?php echo $image4; ?>" alt="" width="800" height="200">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp"></h2></div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php }}}} ?>
    <!--==========================
      Testimonials Section
    ============================-->
    <section id="testimonials" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>F.A.Q.</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>
        <div class="owl-carousel testimonials-carousel">

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                2F Concepcion-Villaroman Bldg, Espana Ave., Corner P. Campa St., Sampaloc, Metro Manila (near Morayta Footbridge and St. Thomas Square Bldg.)
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <h3>Where is the location of the training center?</h3>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                No need to bring laptops, desktops are ready to use in the training center.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <h3>Are we going to bring our laptops?</h3>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                No weekday classes for the time being.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <h3>Are there weekday classes?</h3>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
				The trainings are only held in the training center address
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <h3>Are there trainings in other places outside Metro Manila?</h3>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Kindly refer to software Course Registration tab.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <h3>How to reserve and how much?</h3>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Yes.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <h3>Do you issue Training Certificates?</h3>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Yes. Please contact us.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <h3>Do you accept one-on-one trainings?</h3>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Yes. Please contact us.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <h3>Can you do group trainings in our office</h3>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Yes. We will give hand-outs in pdf formats
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <h3>Will you give Hand-outs for the training courses?</h3>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Please visit the CSI America website for free downloads.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <h3>Will you give free software installers?</h3>
            </div>
        </div>

      </div>
    </section><!-- #testimonials -->

    <!--==========================
      Call To Action Section
    ============================-->

    <!--==========================
      Our Team Section
    ============================-->
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

    <section id="team" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>The Instructor</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/<?php echo $inst_image;?>" alt=""></div>
              <div class="details">
                <h4><?php echo $inst_name; ?></h4>
                <span><?php echo $inst_desc; ?></span>
                <div class="social">
                  <a href="<?php echo $inst_fb; ?>"><i class="fa fa-facebook"></i></a>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section><!-- #team -->
<?php }}}} ?>
    <!--==========================
      Contact Section
    ============================-->

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

    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Contact Us</h2>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address><?php echo $con_address; ?></address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:<?php echo $con_telno; ?>"><?php echo $con_telno; ?></a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:<?php echo $con_email; ?>"><?php echo $con_email; ?></a></p>
            </div>
          </div>

        </div>
      </div>
      <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>
      </section><!-- #contact -->

        <?php }}} ?>


<!--==========================
          Register
============================-->

      <section id="register" class="wow fadeInUp">
      <div class="container">
        <div class="form">
          <div class="section-header">
            <h2>Register</h2>
          </div>
          <form method = "post" action="index.php" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="reg_name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="reg_email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="reg_number" id="subject" placeholder="Contact No." data-rule="minlen:4" data-msg="Please enter a valid number" />
              <div class="validation"></div>
            </div>
            <!-- <div class="form-group">
              <input type="text" class="form-control" name="reg_subject" id="subject" placeholder="Subject" data-rule="minlen:2" data-msg="Please enter a valid subject" />
              <div class="validation"></div>
            </div> -->
            <div class="form-group">
              <select name = "reg_subject">
                <option value="">Select Subject </option>
                <option value="ETABS">ETABS</option>
                <option value="SAFE">SAFE</option>
                <option value="SAP2000">SAP2000</option>
                <option value="PERFORM 3D">PERFORM 3D</option>
                <option value="CSI COL">CSI COL</option>
                <option value="F_ETABS">Free Training: ETABS</option>
                <option value="F_SAFE">Free Training: SAFE</option>
              </select>

            </div>
            <div class="text-center"><button type="submit" name="submit">Register</button></div>
          </form>

          <?php
            include ("connect.php");
            $conn = mysqli_connect("localhost", "root", "", "structure_institute");
            if (isset($_POST['submit'])) {

              $reg_name   = $_POST['reg_name'];
              $reg_email  = $_POST['reg_email'];
              $reg_number = $_POST['reg_number'];
              $reg_subject = $_POST['reg_subject'];

              if ($reg_name == '' or $reg_email == '' or $reg_subject == '' or $reg_number == '') {
                  echo "<script>alert('Any of the fields is empty')</script>";
                  exit();
              }
              else {
                  $insert_query = "insert into registrants (reg_name, reg_email, reg_number, reg_subject) values ('$reg_name', '$reg_email', '$reg_number', '$reg_subject')";
                       if(mysqli_query($conn, $insert_query)){
                        echo "<script>alert('Registered Successfully!')</script>";
                        echo "<script>window.open('index.php','_self')</script>";
                   }
                }
            }
          ?>


        </div>
      </div>
    </section>
  </main>



  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Reveal</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Reveal
        -->
        <a href="https://bootstrapmade.com/">Free Bootstrap Templates</a> by BootstrapMade
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="lib/sticky/sticky.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
