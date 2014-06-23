<?php
    //Navbar
	$home = "Home";
	$about = "About";
	$contact = "Contact";
	$local = "?local=en";
	
	//Home
	$homeTxt = "We Test Your<br />Website's Security<br />For Free";
	$ask = "Ask Us";
	$getTested = "Get Tested";
	$report = "Free Report";
	
	//About
	$aboutTxt = '<h1>How it works ?</h1>
		<p class="paragraphe">You <a href="contact.php">contact us</a> for a free security audit of your website. We will test it in the next few days and try to break into your application. After that we send you a report containing all security breach we found (if we found any!) and advices on how to fix it.</p>
		<h1>Who is it for ?</h1>
		<p class="paragraphe">Everyone ! From personal simple portfolio to complexe profesionnal webstores. </p>
		<h1>Is it risky ?</h1>
		<p class="paragraphe">Not at all ! Because we are not real attackers we will not exploit breach we found on your website. However we are using some automated scripts that may add strange entry into your databse, we recommand that you make a backup of your database. You can also
	    send us a copy of you website and databse and we will host it on our computers for the test, making sure your online website stay untouched.</p>
		<h1>Why free ?</h1>
		<p class="paragraphe">We are doing this mostly for fun and learning purpose. As we are still learning, the service we provide is nowhere close to profesionnal security audits. We are helping you securing your website and you are helping us learning and practicing. </p>
		<h1>About Us</h1>	
		<p class="paragraphe">We are two students in computer science of 20 and 21 years olds. We are starting that little project in order to improve our knowledge in web security and helping people.</p>';
		
	//Contact
	$contactTitle = "Contact us";
	$byMail = "By mail :";
	$bySite = "Use our website :";
	$name = "Name: *";
	$websiteURL = "Website URL: *";
	$comment = "Comment: ";
	$captchaPwd = "CAPTCHA password: *";
	$send = "send";
	
	$error = "No bots please! UA reported as: ".$_SERVER['HTTP_USER_AGENT'];
	$error2 = "Please fill in all the required fields and submit again.";
	$error3 = "The name field must not contain special characters.\r\n";
	$error4 = "That is not a valid e-mail address.\r\n";
	$error5 = "Invalid website url.\r\n";
	$error6 = "The session key (random) does not exist, please go back and reload form.\r\n";
	$error7 = "You entered the wrong password. Aren't you human? Please use back button and reload.\r\n";
	$error8 = 'Your mail could not be sent this time.\r\n';
	$error9 = 'Your mail looks too much like spam, and could not be sent this time.\r\n';
	$success = "Your mail was successfully sent.\r\n";

?>