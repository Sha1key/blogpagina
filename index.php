<?php

include 'includes/login.inc.php';
include 'includes/speedblog.php';

?>
<!DOCTYPE html>
<html>

<head>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="814655207846-nad93g326rqjdpluhp162scmqr7ncll3.apps.googleusercontent.com">
</head>

<body>
	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper grey darken-4"> <a href="#!" class="brand-logo">CEEMES ? CEEMES : ZEEMES ;</a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="pages/bloggies.php">Blog</a>
					</li>
					<li><a href="pages/category.php">Category</a>
					</li>

					<?php if(isset($_SESSION['name'])){ ?>
          <li>
						<a href="includes/logout.php" style="text-decoration:none">Logout</a>
					</li>
<?php }else{ ?>
		<li><a class="modal-trigger" href="#modal1">Inloggen</a>
<?php } ?>
					</li>
					 <li><a href="pages/posts.php"><i class="material-icons">account_circle</i></a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="pages/blog.php">Blog</a>
					</li>
					<li><a href="pages/category.php">Category</a>
					</li>

					<li><a href="mobile.html">Mobile</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>



 <!-- Modal Structure -->
 <div id="modal1" class="modal">
	 <div class="modal-content">
		 <div class="row">
    <!--<form class="col s12"> -->

						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

							<?php if ( isset($errMSG) ) {
								?>

						   <div class="form-group">
							   <div class="alert alert-danger">
			           <span><?php echo $errMSG; ?></span>
								</div>
							 </div>

						  <?php
		          }
		          ?>

						<input type="email" name="email" placeholder="E-Mail" value="<?php echo $email; ?>" maxlength="40">
									<input type="password" name="password" placeholder="Password">
									<span class="text-danger"><?php echo $passError; ?></span>
									<button class="btn waves-effect waves-light" type="submit" name="btn-login">Inloggen
						    <i class="material-icons right">send</i></button>

							</form>

  			</div>
      </div>
			<!-- <div class="g-signin2" data-onsuccess="onSignIn"></div> -->



	 <div class="modal-footer">
		 nogGeenAccount?
		 <a href="pages/registreren.php" class="modal-action modal-close waves-effect waves-green btn-flat">Registreren</a>
	 </div>
 </div>



	<div class="parallax-container">
		<div class="parallax">
			<img src="img/2.jpg">
		</div>
		<h1>Hello world</h1>
    <a href="#introduction" class="waves-effect waves-light light-blue darken-1 btn-large">Lees meer...</a>
	</div>
	<div class="section">
		<div class="row container section scrollspy" id="introduction" >
			<h5 class="header">Recente Blogs</h5>

<div class="row">

			<?php
			for($i = 1; $i<=3; $i++){
			?>



        <div class="col m4 s12">
          <div class="card">
            <div class="card-image">
              <img src="<?php echo $image[$i]; ?>" onerror="this.src='img/2.jpg'" width="100%" height="100%">
              <span class="card-title"><?php echo $title[$i]; ?></span>
            </div>
            <div class="card-content">
              <p><?  custom_echo($body[$i], ""); ?></p>
            </div>
            <div class="card-action light-blue darken-1">
              <a href="pages/blog.php?blogid=<?php echo $blogid[$i]; ?>">Lees verder</a>
            </div>
          </div>
        </div>



			<?php
			}
			?>
</div>
</div>
</div>


	<div class="parallax-container">
		<div class="parallax">
			<img src="img/1.jpg">

			</div>
			<div class="container">
				<div class="row">
					<div class="col m4 offset-m4">

		</div>
		</div>
		</div>
	</div>




	<footer class="page-footer grey darken-4">
		<div class="container">
			<div class="row">
				<div class="col l3 s12">
					<h5 class="white-text">Footer Content</h5>
					<p class="grey-text text-lighten-4">You can use rows and columns here
            to organize your footer content.</p>
				</div>
				<div class="col l3 s12">
					<h5 class="white-text">Meest recent</h5>
					<p class="grey-text text-lighten-4">You can use rows and columns here
            to organize your footer content.</p>
						<button class="box foo"></button>
				</div>
				<div class="col l3 s12">
					<h5 class="white-text">Tags</h5>
					<div class="chip"><i class="close material-icons">code</i>HTML</div>
					<div class="chip"><i class="close material-icons">code</i>Css</div>
					<div class="chip"><i class="close material-icons">code</i>Javascript</div>
				</div>
				<div class="col l3  s12">
					<h5 class="white-text">Links</h5>
					<ul>
						<li><a class="grey-text text-lighten-3" href="#!">Link 1</a>
						</li>
						<li><a class="grey-text text-lighten-3" href="#!">Link 2</a>
						</li>
						<li><a class="grey-text text-lighten-3" href="#!">Link 3</a>
						</li>
						<li><a class="grey-text text-lighten-3" href="#!">Link 4</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright light-blue darken-1">
			<div class="container">© 2017 Copyright Text <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
			</div>
		</div>
	</footer>



	<script type="text/javascript">
		  $( document ).ready(function()
		  {
		  $(".button-collapse").sideNav();
			$('select').material_select();
			$('.modal').modal();
		  $('.carousel.carousel-slider').carousel({fullWidth: true});
		  $('.parallax').parallax();
          $('.scrollspy').scrollSpy({scrollOffset: 50});
					$('.datepicker').pickadate({
			    selectMonths: true, // Creates a dropdown to control month
			    selectYears: 15, // Creates a dropdown of 15 years to control year,
			    today: 'Today',
			    clear: 'Clear',
			    close: 'Ok',
			    closeOnSelect: false // Close upon selecting a date,
  		});
		  });
	</script>
	<!--Import jQuery before materialize.js-->

</body>

</html>
