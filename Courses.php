<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="utf-8">
  <title>Cursuri</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

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
  <link href="css/styleP.css" rel="stylesheet">
  <link href="css/styleC.css" rel="stylesheet">
  <link href="css/login_style.css" rel="stylesheet">  
  <link href="css/botstrap.min.css" rel="stylesheet">
  <link href="css/login_style.css" rel="stylesheet">
  
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
          <li class="menu-active"><a href="cursuri.html">Cursuri</a></li>
          <li><a href="profil elev.html">Profil</a></li>
          <li><a href="profil profesor.html">Profil</a></li>
		  <li><button class="open-button" onclick="openForm()">LOGARE</button></li>
          <li><button class="open-button" onclick="openForm_reg()">ÎNREGISTRARE</button></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

 
	<!--=============================
		Cursuri
	==============================-->
	
	
	<div>
	<br></br>
	</div>
	
	 <!--==========================
      About Section
    ============================-->
	<section id="courses_page_info" class="wow fadeIn">
		<div class="container text-center">
			 <section id="about">
			  <div class="container">

				<header class="section-header">
				  <h3>Cursuri</h3>
				  </header>
				 <form method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="category" class="form-control" id="name" placeholder="Categorie" autocomplete='off'/>
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="TEXT" class="form-control" name="skill" placeholder="Skills" autocomplete='off'/>
              </div>
            </div>
            <div class="text-center"><input type="submit" name="submit" value='Filtreaza'></div>
			</br>
          </form>
				<div class="row about-cols">
				
				<div class="col-xl-12">
				<?php
include_once 'include/dbh.inc.php';
	
	
	if(!isset($_POST['submit']) or (empty($_POST['category']) and empty($_POST['skill'])))
	{
		$query = "SELECT * FROM courses,users where id_prof = user_id";
		
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
				$name = $row['fname'].' '.$row['lname'];
				$img = $row['img_src'];
				$id = $row['id_course'];
				$detalii = $row['detalii'];
				$pret = $row['pret'];
				$title = $row['title'];
				if($id %2 )
					$color = 'blue';
				else
					$color = 'yellow';
				echo "<div class='media-boxes'>
						  
							<div class='media'>
							  <img src='$img' style = 'width:140px;heigth:140px' alt='Image' class='mr-3'>
							  <div class='media-body tm-bg-$color-light'>
								<div class='tm-description-box'>
								  <h4 class='tm-text-$color'>$title</h5>
								  <h5 class = 'tm-text-$color'>$name</h6>
								  <p class='mb-0'>$detalii</p>
								</div>
								<div class='tm-buy-box'>
								  <a href='curs.php?id=$id' class='tm-bg-$color tm-text-white tm-buy'>cumpara</a>
								  <span class='tm-text-$color tm-price-tag'>$pret lei</span>
								</div>
							  </div>
							</div>
						</div>";
			}
			
		}
	}
	else
	{
		if(!empty($_POST['category']))
		{
			$category = $_POST['category'];
			if (!get_magic_quotes_gpc())
			{
				$category = addslashes($category);
			}	
			$where= "categories.name LIKE '%$category%'";
			$query = "SELECT * FROM courses,users,categories where id_prof = user_id AND courses.id_category = categories.id_category AND ".$where;
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
					$name = $row['fname'].' '.$row['lname'];
					$img = $row['img_src'];
					$id = $row['id_course'];
					$detalii = $row['detalii'];
					$pret = $row['pret'];
					if($id %2 )
						$color = 'blue';
					else
						$color = 'yellow';
					echo "<div class='media-boxes'>
						  
							<div class='media'>
							  <img src='$img' style = 'width:140px;heigth:140px' alt='Image' class='mr-3'>
							  <div class='media-body tm-bg-$color-light'>
								<div class='tm-description-box'>
								  <h5 class='tm-text-$color'>$name</h5>
								  <p class='mb-0'>$detalii</p>
								</div>
								<div class='tm-buy-box'>
								<a href='curs.php?id=$id' class='tm-bg-$color tm-text-white tm-buy'>cumpara</a>
								<span class='tm-text-$color tm-price-tag'>$pret lei</span>
								</div>
							  </div>
							</div>";
				}
				
			}
		}
		else
		{
			$skills = $_POST['skill'];
			if (!get_magic_quotes_gpc())
			{
				$skills = addslashes($skills);					
			}
			$query = "SELECT * FROM skills,courses_skills where skills.id_skill = courses_skills.id_skill AND skills.name LIKE '%$skills%'";
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
					
					$id = $row['id_course'];
					
					$query2 = "SELECT * FROM courses,users WHERE id_prof = user_id AND id_course = $id";
					$result2 = mysqli_query($conn,$query2);
					if(!$result2)
					{
						echo mysqli_errno($conn)." Introdu date valide";
						exit();
					}
			
					$resultCheck2 = mysqli_num_rows($result2);
					if(!$resultCheck2){
						echo 'Nu exista cursuri';
						exit();
					}
					else
						while($row = mysqli_fetch_assoc($result2))
						{ 
							$name = $row['fname'].' '.$row['lname'];
							$img = $row['img_src'];
							$id = $row['id_course'];
							$detalii = $row['detalii'];
							$pret = $row['pret'];
							if($id %2 )
								$color = 'blue';
							else
								$color = 'yellow';
						  echo "<div class='media-boxes'>
						  
							<div class='media'>
							  <img src='$img' style = 'width:140px;heigth:140px' alt='Image' class='mr-3'>
							  <div class='media-body tm-bg-$color-light'>
								<div class='tm-description-box'>
								  <h5 class='tm-text-$color'>$name</h5>
								  <p class='mb-0'>$detalii</p>
								</div>
								<div class='tm-buy-box'>
								<a href='curs.php?id=$id' class='tm-bg-$color tm-text-white tm-buy'>cumpara</a>
								<span class='tm-text-$color tm-price-tag'>$pret lei</span>
								</div>
							  </div>
							</div>";
													}
				}
				
			}
				
			}
			
	}

					?>
					</div>
				</div>
				</div>
			</div>
	  </section>
	  </div>
    </section><!-- #about -->


   <!--==========================
    Footer
  ============================-->
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

  <!-- Main Javascript File -->
  <script src="js/mainP.js"></script>
  <script src="js/login.js"></script>

</body>
</html>
