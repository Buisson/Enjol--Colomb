<?php
	//Navbar
	$home = "Accueil";
	$about = "A propos";
	$contact = "Contact";
	$local = "";
	
	
	//Home
	$homeTxt = "Nous Testons La Securit&eacute;<br /> De Votre Site Internet<br />Gratuitement";
	$ask = "Demandez Nous";
	$getTested = "Faites Vous Tester";
	$report = "Compte Rendu Gratuit";
	
	//About
	$aboutTxt = '<h1>Comment ça marche ?</h1>
		<p class="paragraphe">Vous <a href="contact.php">nous contactez</a> pour un audit gratuit de la sécurité de votre site Web. Nous effectuerons une series de test afin de tenter de "pirater" votre site. Apr&egrave;s cela nous vous envoyons un rapport d&eacute;taill&eacute; sur les diff&eacute;rentes failles que nous avons trouvé (Si nous en trouvons !), ainsi que des conseils pour la sécurisation de votre application.</p>
		<h1>Pour qui ?</h1>
		<p class="paragraphe">Tous le monde ! Du simple portfolio au complexe site d\'icommerce. </p>
		<h1>Est-ce dangereux ?</h1>
		<p class="paragraphe">Pas du tout ! Parce que nous ne somme pas de r&eacute;el hackers nous n\'exploitons pas les failles que nous d&eacute;couvrons. Cependant nous utilisons divers outils qui peuvent cr&eacute;er des entr&eacute;es &eacute;trange dans votre base de donn&eacute;e, nous vous recommandons de cr&eacute;er un backup de cette derni&egrave;re avant de nous soumettre votre site. 
		Vous pouvez aussi nous envoyer une copie de votre site ainsi que de sa base de donn&eacute;e pour que nous effectuions les tests en local sans toucher a votre site en ligne.</p>
		<h1>Pourquoi gratuit ?</h1>
		<p class="paragraphe">Nous faisons cela principalement pour le fun et pour apprendre. Nous sommes loin d\'&ecirc; tre des professionnel et nous n\'estimons pas fournir un service sans failles. Nous vous aidons a s&eacute;curiser votre site, en contre partie vous nous aidez a nous am&eacute;liorer. </p>
		<h1>A propos de nous</h1>	
		<p class="paragraphe">Nous sommes deux &eacute;tudiant en informatique de 20 et 21 ans. Nous participons a ce projet afin d\'am&eacute;liorer nos connaissance en s&eacute;curiter informatique.</p>';
	
	//Contact
	$contactTitle = "Nous contacter";
	$byMail = "Par mail :";
	$bySite = "Par le site :";
	$name = "Nom: *";
	$websiteURL = "URL du site: *";
	$comment = "Commentaire: ";
	$captchaPwd = "Mot de passe CAPTCHA: *";
	$send = "envoyer";
	
	$error = "Pas de bots SVP ! UA reported as: ".$_SERVER['HTTP_USER_AGENT'];
	$error2 = "Veuillez remplir tout les champs qui sont demandés et envoyez de nouveau.";
	$error3 = "The name field must not contain special characters.\r\n";
	$error4 = "E-mail invalide.\r\n";
	$error5 = "URL invalid.\r\n";
	$error6 = "The session key (random) does not exist, please go back and reload form.\r\n";
	$error7 = "You entered the wrong password. Aren't you human? Please use back button and reload.\r\n";
	$error8 = 'Your mail could not be sent this time. ';//['.$points.']';
	$error9 = 'Your mail looks too much like spam, and could not be sent this time.';// ['.$points.']';
?>