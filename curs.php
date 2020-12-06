<?php
		if(isset($_GET['id']))
		{
			include_once 'include/dbh.inc.php';
			$id = $_GET['id'];
			if (!get_magic_quotes_gpc())
			{
				$id = addslashes($id);
			}
			$query = "SELECT * from courses,users WHERE id_prof = user_id AND id_course = $id";
			$result = mysqli_query($conn,$query);
			
			if(!$result)
			{
				echo mysqli_errno($conn)." Introdu date valide";
				exit();
			}
			
			$resultCheck = mysqli_num_rows($result);
			if(!$resultCheck){
				echo 'Nu exista cursuri';
				exit();
			}
			else
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$nume = $row['fname'].' '.$row['lname'];
					$pret = $row['pret'];
					$descriere = $row['detalii'];
					$durata = $row['durata'];
					$src = $row['img_src'];
					$title = $row['title'];
				}
			}
			$query = "SELECT count(*) as count,completed  from courses_student WHERE id_course = $id GROUP BY completed ";
			$result = mysqli_query($conn,$query);
			
			if(!$result)
			{
				echo mysqli_errno($conn)." Introdu date valide";
				exit();
			}
			
			$resultCheck = mysqli_num_rows($result);
			if(!$resultCheck){
				$completed = 0; 
				$using = 0;
			}
			else
			{
				while($row=mysqli_fetch_assoc($result))
				{
					if($row['completed'] == 1)
						$completed = $row['count'];
					else
						$using = $row['count'];
				}
			}
			$query = "SELECT * from courses,categories WHERE courses.id_category = categories.id_category AND id_course = $id";
			$result = mysqli_query($conn,$query);
			
			if(!$result)
			{
				echo mysqli_errno($conn)." Introdu date valide";
				exit();
			}
			
			$resultCheck = mysqli_num_rows($result);
			if(!$resultCheck){
				echo 'Nu exista cursuri';
				exit();
			}
			else
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$category = $row['name'];
				}
			}
			$query = "SELECT count(*) as count,completed  from courses_student WHERE id_course = $id GROUP BY completed ";
			$result = mysqli_query($conn,$query);
			
			if(!$result)
			{
				echo mysqli_errno($conn)." Introdu date valide";
				exit();
			}
			
			$resultCheck = mysqli_num_rows($result);
			if(!$resultCheck){
				$completed = 0; 
				$using = 0;
			}
			else
			{
				while($row=mysqli_fetch_assoc($result))
				{
					if($row['completed'] == 1)
						$completed = $row['count'];
					else
						$using = $row['count'];
				}
			}
		}
		else
			header("Location:index.html");
	  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Skilly C5</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/courses_page.css" rel="stylesheet">
  <link href="css/login_style.css" rel="stylesheet">  
  <!-- =======================================================
    Theme Name: Skilly
    Theme URL: https://bootstrapmade.com/Skilly-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
	
    <script src="js/write_login_register.js"></script>
  <!--==========================
    Header
  ============================-->
 <header id="header" class='header-scrolled'>
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="index.html" class="scrollto">Skilly</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>
      
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index.html">Home</a></li>
          <li class="menu-active"><a href="courses.php">Cursuri</a></li>
          <li><a href="profil elev.html">Profil</a></li>
          <li><a href="profil profesor.html">Profil</a></li>
		  <li><button class="open-button" onclick="openForm()">LOGARE</button></li>
          <li><button class="open-button" onclick="openForm_reg()">ÎNREGISTRARE</button></li>
        </ul>

        
      </nav>
    </div>
  </header><!-- #header -->
  
  <!--==========================
    Intro Section
  ============================-->
  <main id="main">
    <!--==========================
      Featured Services Section
    ============================-->
    <div style = "background:#000;">
      <div style = "height:100px; margin:auto;">
      </div>
</div>
    <div style = "background-image: url('<?php echo $src?>');background-color: rgba(255,255,255,0.6);background-size : 100% 100%;background-blend-mode: lighten;">
          <header class="section-header" style="height : 400px">
            <h3><br><br><?php echo $title ?></h3>
            <p style = "font-weight: bold; font-size: 25px;"><?php
			if($pret == 0 )
				echo "Curs light - gratuit";
			else
				if($pret > 0  and $pret < 100)
					echo "Curs standard - $pret lei";
				else
					echo "Curs premium -$pret lei";
			?></p>
              <div class="container">
        
                <header class="section-header wow fadeInUp">
                  <h3><a href="aplicare.html">Vreau sa invat!!</a></h3>
                </header>
        
              </div>
          </header>      
    </div>
    <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
            <i class="ion-ios-bookmarks-outline"></i>
            <h4 class="title"><a href="">Cine sunt?</a></h4>
            <p class="description"><?php echo $nume ?></p>
          </div>

          <div class="col-lg-4 box box-bg">
            <i class="ion-ios-stopwatch-outline"></i>
            <h4 class="title" style = "color:#fff">Cat va dura?</h4>
            <p class="description">Va dura <?php echo $durata ?></p>
          </div>

          <div class="col-lg-4 box">
            <i class="ion-ios-heart-outline"></i>
            <h4 class="title"style = "color:#fff">Categorie</a></h4>
            <p class="description"><?php echo $category?></p>
          </div>

        </div>
      </div>
    </section><!-- #featured-services -->

    <!--==========================
      About Us Section
    ============================-->
    <section id="courses_page_info" class="wow fadeIn">
      <div class="container text-center">
        <section id="about">
          <div class="container">
    
            <header class="section-header">
              <h3>Despre acest curs</h3>
              <p><?php echo $descriere ?></p>
            </header>
			<header class="section-header">
              <h3>Skills</h3>
              <ul style="list-style-type:none;">
				<?php
				$id = $_GET['id'];
				if (!get_magic_quotes_gpc())
				{
					$id = addslashes($id);
				}
				$query = "SELECT * from courses_skills,skills WHERE courses_skills.id_course = $id AND courses_skills.id_skill = skills.id_skill";
				$result = mysqli_query($conn,$query);
				
				if(!$result)
				{
					echo mysqli_errno($conn)." Introdu date valide";
					exit();
				}
				
				$resultCheck = mysqli_num_rows($result);
				if(!$resultCheck){
					echo 'Nu exista skills';
				}
				else
				{
					while($row=mysqli_fetch_assoc($result))
					{
						echo "<li>$row[name]</li>";
					}
				}
				
                ?>
              </ul>
              
            </header>
            <header class="section-header">
              <h3>De pus in CV</h3>
              <ul style="list-style-type:none;">
                <li>Acest curs garanteaza primirea unei diplome ce va putea fi utilizata in domeniul IT, in profesiile:</li>
                <li>QA tester for Google</li>
                <li>QA tester for Bosch</li>
                <li>QA tester for Facebook</li>
              </ul>
              
            </header>
            <header class="section-header wow fadeInUp">
              <h3>
                <p>Cat de bun a fost acest curs:</p>
                <span class="fa fa-star" style = "color: orange;"></span>
                <span class="fa fa-star" style = "color: orange;"></span>
                <span class="fa fa-star" style = "color: orange;"></span>
                <span class="fa fa-star" style = "color: orange;"></span>
                <span class="fa fa-star" style = "color: orange;"></span>
              </h3>
            </header>
            
        </section><!-- #about -->
    
        <!--==========================
          Clients Section
        ============================-->
        <section id="facts"  class="wow fadeIn">
          <div class="container">
    
            <header class="section-header">
              <h3>Clientii</h3>
              <p>Ce spun statisticile despre cursul meu?</p>
            </header>
    
            <div class="row counters">
              <div class="col-lg-3 col-6 text-center">
              </div>
              <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up"><?php echo $completed?></span>
                <p>Cursuri terminate</p>
              </div>
              <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up"><?php echo $using ?></span>
                <p>Cursuri in desfasurare</p>
              </div>
              
            </div>
          </div>
        </section><!-- #facts -->
        <!--==========================
          Services Section
        ============================-->
        <div style = "background:#fff;">
          <div style = "height:100px; margin:auto;">
          </div>
        </div>
        <section id="services" style = "background: #fff;">
          <div class="container">
    
            <header class="section-header wow fadeInUp">
              <h3><a href="aplicare.html">Vreau sa invat!!</a></h3>
            </header>
    
          </div>
        </section><!-- #services -->
        <div style = "background:#fff;">
          <div style = "height:100px; margin:auto;">
          </div>
        </div>  
    
      </div>
    </section><!-- #courses_page_info -->
    
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>Skilly</h3>
            <p>Ne unește pe timp de pandemie.</p>
          </div>
          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong>0762511992<br>
              <strong>Email:</strong>skilly@pandemic.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Abonează-te</h4>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit"  value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Skilly</strong>. All Rights Reserved
      </div>
      <div class="credits">
        
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script src="js/login.js"></script>

</body>
</html>
