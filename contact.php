<?php
require 'CaptchasDotNet.php';

// Required Parameters
// Replace the values you receive upon registration at http://captchas.net.
//
//   client: 'demo'
//
//   secret: 'secret'
//
// Optional Parameters and defaults
//
//   repository_prefix: '/tmp/captchasnet-random-strings' path to repository
//   ATTENTION SAFE-MODE, YOU HAVE TO CHOOSE SOMETHING LIKE
//   '/writable/path/captchasnet-random-strings'
//
//   cleanup_time: '3600' (means max 1 hour between query and check)
//
//   alphabet: 'abcdefghijklmnopqrstuvwxyz' (Used characters in captcha)
//   We recommend alphabet without ijl: 'abcdefghkmnopqrstuvwxyz'
//
//   letters: '6' (Number of characters in captcha)
//
//   width: '240' (image width)
//
//   height: '80' (image height)
//
//   color: '000000' (image color in rgb)
//
//   language: 'en' (audio language, append &language=fr/de/it/nl to audio-url)
//
//   Usage
//   $captchas = new CaptchasDotNet (<client>, <secret>,
//                                   <repository_prefix>, <cleanup_time>,
//                                   <alphabet>,<letters>,
//                                   <height>,<width>,<color>);
//
// Don't forget same settings in check.php

// Construct the captchas object.

$captchas = new CaptchasDotNet ('demo', 'secret',
                                'tmp/c4ptch4-h1d3!','3600',
                                'abcdefghkmnopqrstuvwxyz','4',
                                '240','80','000088');
								
								
								
								
// OPTIONS - PLEASE CONFIGURE THESE BEFORE USE!

$yourEmail = "random@randum.dur"; // the email address you wish to receive these mails through
$yourWebsite = "WEBSITE NAME"; // the name of your website
$thanksPage = ''; // URL to 'thanks for sending mail' page; leave empty to keep message on the same page 
$maxPoints = 4; // max points a person can hit before it refuses to submit - recommend 4
$requiredFields = "name,email,url,password"; // names of the fields you'd like to be required as a minimum, separate each field with a comma


// DO NOT EDIT BELOW HERE
$error_msg = array();
$result = null;

$requiredFields = explode(",", $requiredFields);

function clean($data) {
	$data = trim(stripslashes(strip_tags($data)));
	return $data;
}
function isBot() {
	$bots = array("Indy", "Blaiz", "Java", "libwww-perl", "Python", "OutfoxBot", "User-Agent", "PycURL", "AlphaServer", "T8Abot", "Syntryx", "WinHttp", "WebBandit", "nicebot", "Teoma", "alexa", "froogle", "inktomi", "looksmart", "URL_Spider_SQL", "Firefly", "NationalDirectory", "Ask Jeeves", "TECNOSEEK", "InfoSeek", "WebFindBot", "girafabot", "crawler", "www.galaxy.com", "Googlebot", "Scooter", "Slurp", "appie", "FAST", "WebBug", "Spade", "ZyBorg", "rabaz");

	foreach ($bots as $bot)
		if (stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== false)
			return true;

	if (empty($_SERVER['HTTP_USER_AGENT']) || $_SERVER['HTTP_USER_AGENT'] == " ")
		return true;
	
	return false;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isBot() !== false)
		$error_msg[] = "No bots please! UA reported as: ".$_SERVER['HTTP_USER_AGENT'];
		
	$password = $_REQUEST['password'];	
	$random_string = $_REQUEST['random'];
	
	// lets check a few things - not enough to trigger an error on their own, but worth assigning a spam score.. 
	// score quickly adds up therefore allowing genuine users with 'accidental' score through but cutting out real spam :)
	$points = (int)0;
	
	$badwords = array("adult", "beastial", "bestial", "blowjob", "clit", "cum", "cunilingus", "cunillingus", "cunnilingus", "cunt", "ejaculate", "fag", "felatio", "fellatio", "fuck", "fuk", "fuks", "gangbang", "gangbanged", "gangbangs", "hotsex", "hardcode", "jism", "jiz", "orgasim", "orgasims", "orgasm", "orgasms", "phonesex", "phuk", "phuq", "pussies", "pussy", "spunk", "xxx", "viagra", "phentermine", "tramadol", "adipex", "advai", "alprazolam", "ambien", "ambian", "amoxicillin", "antivert", "blackjack", "backgammon", "texas", "holdem", "poker", "carisoprodol", "ciara", "ciprofloxacin", "debt", "dating", "porn", "link=", "voyeur", "content-type", "bcc:", "cc:", "document.cookie", "onclick", "onload", "javascript");

	foreach ($badwords as $word)
		if (
			strpos(strtolower($_POST['comments']), $word) !== false || 
			strpos(strtolower($_POST['name']), $word) !== false
		)
			$points += 2;
	
	if (strpos($_POST['comments'], "http://") !== false || strpos($_POST['comments'], "www.") !== false)
		$points += 2;
	if (isset($_POST['nojs']))
		$points += 1;
	if (preg_match("/(<.*>)/i", $_POST['comments']))
		$points += 2;
	if (strlen($_POST['name']) < 3)
		$points += 1;
	if (strlen($_POST['comments']) < 15 || strlen($_POST['comments'] > 1500))
		$points += 2;
	if (preg_match("/[bcdfghjklmnpqrstvwxyz]{7,}/i", $_POST['comments']))
		$points += 1;
	// end score assignments

	foreach($requiredFields as $field) {
		trim($_POST[$field]);
		
		if (!isset($_POST[$field]) || empty($_POST[$field]) && array_pop($error_msg) != "Please fill in all the required fields and submit again.\r\n")
			$error_msg[] = "Please fill in all the required fields and submit again.";
	}

	if (!empty($_POST['name']) && !preg_match("/^[a-zA-Z-'\s]*$/", stripslashes($_POST['name'])))
		$error_msg[] = "The name field must not contain special characters.\r\n";
	if (!empty($_POST['email']) && !preg_match('/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])(([a-z0-9-])*([a-z0-9]))+' . '(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i', strtolower($_POST['email'])))
		$error_msg[] = "That is not a valid e-mail address.\r\n";
	if (!empty($_POST['url']) && !preg_match('/^(http|https):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(:(\d+))?\/?/i', $_POST['url']))
		$error_msg[] = "Invalid website url.\r\n";
		
	//CAPTCHA
	if (!empty($_POST['password']) && !$captchas->validate ($random_string))
		$error_msg[] = "The session key (random) does not exist, please go back and reload form.\r\n";
	elseif (!empty($_POST['password']) && !$captchas->verify ($password))
		$error_msg[] = "You entered the wrong password. Aren't you human? Please use back button and reload.\r\n";
		
	
	if ($error_msg == NULL && $points <= $maxPoints) {
		$subject = "Automatic Form Email";
		
		$message = "You received this e-mail message through your website: \n\n";
		foreach ($_POST as $key => $val) {
			if (is_array($val)) {
				foreach ($val as $subval) {
					$message .= ucwords($key) . ": " . clean($subval) . "\r\n";
				}
			} else {
				$message .= ucwords($key) . ": " . clean($val) . "\r\n";
			}
		}
		$message .= "\r\n";
		$message .= 'IP: '.$_SERVER['REMOTE_ADDR']."\r\n";
		$message .= 'Browser: '.$_SERVER['HTTP_USER_AGENT']."\r\n";
		$message .= 'Points: '.$points;

		if (strstr($_SERVER['SERVER_SOFTWARE'], "Win")) {
			$headers   = "From: $yourEmail\r\n";
		} else {
			$headers   = "From: $yourWebsite <$yourEmail>\r\n";	
		}
		$headers  .= "Reply-To: {$_POST['email']}\r\n";

		if (mail($yourEmail,$subject,$message,$headers)) {
			if (!empty($thanksPage)) {
				header("Location: $thanksPage");
				exit;
			} else {
				$result = 'Your mail was successfully sent.';
				$disable = true;
			}
		} else {
			$error_msg[] = 'Your mail could not be sent this time. ['.$points.']';
		}
	} else {
		if (empty($error_msg))
			$error_msg[] = 'Your mail looks too much like spam, and could not be sent this time. ['.$points.']';
	}
}
function get_data($var) {
	if (isset($_POST[$var]))
		echo htmlspecialchars($_POST[$var]);
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

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
	<link href="css/form.css" rel="stylesheet">

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
		  <img height="150" src="Images/logo.png"/>
          
        </div>
		
        <div class="collapse navbar-collapse" style="width:90%;">
		
          <ul class="nav navbar-nav navbar-right">
            <li class="menu"><a href="index.html">Home</a></li>
            <li class="menu"><a href="about.html">About</a></li>
            <li class="menu"><a href="contact.php" style="color: #59CEE5">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
		
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
		<br>
		<br>
        <h1>Nous contacter</h1>
        <p class="lead">Par mail :</p>
			<p class="paragraphe"><a href="mailto:random@mail.com"><img src="Images/mail.png"></a></p>
		<div class="spacer1">&nbsp;</div>
		<p class="lead">Par le site :</p>
		<?php
			if (!empty($error_msg)) {
				echo '<p class="error">ERROR: '. implode("<br />", $error_msg) . "</p>";
			}
			if ($result != NULL) {
				echo '<p class="success">'. $result . "</p>";
			}
		?>
		<form action="<?php echo basename(__FILE__); ?>" method="post">
			<noscript>
				<p><input type="hidden" name="nojs" id="nojs" /></p>
			</noscript>
			<input type="hidden" name="random" value="<?= $captchas->random () ?>" />
			<p>
			<div class="form-group">
				<label for="name">Name: *</label> 
				<input class="form-control" type="text" name="name" id="name" value="<?php get_data("name"); ?>" /><br />
			</div>
			<div class="form-group">
				<label for="email">E-mail: *</label> 
				<input class="form-control" type="text" name="email" id="email" value="<?php get_data("email"); ?>" /><br />
			</div>
			<div class="form-group">
				<label for="url">Website URL: *</label> 
				<input class="form-control" type="text" name="url" id="url" value="<?php get_data("url"); ?>" /><br />
			</div>
			<div class="form-group">
				<label for="comments">Comments: </label>
				<textarea class="form-control" name="comments" id="comments" rows="5" cols="20"><?php get_data("comments"); ?></textarea><br />
			</div>
			</p>
			<p>
			 <p><?= $captchas->image () ?> <a href="javascript:captchas_image_reload('captchas.net')">Reload Image</a> </p>
				<label for="password">CAPTCHA password : </label>
				<input type="text" name="password" size="32">
			</p>
			<p>
				<input class="btn btn-default" type="submit" name="submit" id="submit" value="Send" <?php if (isset($disable) && $disable === true) echo ' disabled="disabled"'; ?> />
			</p>

		</form>
		
		
		
		
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
  </body>
</html>
