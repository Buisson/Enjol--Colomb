<?php
if(isset($_GET['local']) && $_GET['local']="en") {
	require('en.php');
}else{
	require('fr.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>FriendlySec: Home</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<div class="spacer1">&nbsp;</div>
    <div class="navbar navbar-inverse navbar-top navbarperso" style="border:none;" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <!-- <img height="150" src="Images/logo.png"/> -->
          
        </div>
		
        <div class="collapse navbar-collapse">
		
          <ul class="nav navbar-nav navbar-right">
            <li class="menu"><a href="index.php<?php echo $local; ?>"  style="color: #59CEE5"><?php echo $home; ?></a></li>
            <li class="menu"><a href="about.php<?php echo $local; ?>"><?php echo $about; ?></a></li>
            <li class="menu"><a href="contact.php<?php echo $local; ?>"><?php echo $contact; ?></a></li>
			<a href="<?php echo basename(__FILE__); ?>"><img src="Images/fr.png"></a> 
			<a href="<?php echo basename(__FILE__); ?>?local=en"><img src="Images/en.png"></a>
          </ul>
        </div><!--/.nav-collapse -->
		
      </div>
    </div>


    <div class="container">

      <div class="homeTxt">
		<br>
		<br>
        <!--<h1>Welcome!!</h1> -->
        <span class="homeText"><?php echo $homeTxt; ?></span>
      </div>
	

	
    </div><!-- /.container -->
	
	<div class="spacer2">&nbsp;</div>
	<div class="bottom-banner">
		<div class="imageBanner-Wrapper">
			<div class="imageBanner">
					<a href="contact.php<?php echo $local;?>"><img src="Images/ask.png"></a>
			</div>
			<div class="imageBanner">
				<a href="about.php<?php echo $local; ?>"><img src="Images/tested.png"></a>
			</div>
			<div class="imageBanner">
				<a href="about.php<?php echo $local; ?>"><img src="Images/report.png"></a>
			</div>
		</div>
			
			<!-- new row -->
			<div class="imageText"><a href="contact.php<?php echo $local; ?>"><?php echo $ask ?></a></div>
			<div class="imageText"><a href="about.php<?php echo $local; ?>"><?php echo $getTested; ?></a></div>
			<div class="imageText"><a href="about.php<?php echo $local; ?>"><?php echo $report; ?></a></div>
			
		

		
		
	</div>
	
	<footer>	
		<?php echo $footer; ?>
	</footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
  </body>
</html>
