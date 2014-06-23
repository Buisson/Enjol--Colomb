<?php
	//Navbar
	$home = "Accueil";
	$about = "A propos";
	$contact = "Contact";
	$local = "";
	
	//footer
	$footer = "&copy; Copyright Example.com ".date('Y');
	
	//Home
	$homeTxt = "Nous Testons La Securit&eacute;<br /> De Votre Site Internet<br />Gratuitement";
	$ask = "Demandez Nous";
	$getTested = "Faites Vous Tester";
	$report = "Compte Rendu Gratuit";
	
	//About
	$aboutTxt = '<h1>Comment ça marche ?</h1>
		<p class="paragraphe">Vous <a href="contact.php">nous contactez</a> pour un audit gratuit de la s&eacute;curit&eacute; de votre site Web. Nous effectuerons une s&eacute;rie de test afin de tenter de "pirater" votre site. Apr&egrave;s cela nous vous envoyons un rapport d&eacute;taill&eacute; sur les diff&eacute;rentes failles que nous avons trouvé (Si nous en trouvons !), ainsi que des conseils pour la s&eacute;curisation de votre application.</p>
		<h1>Pour qui ?</h1>
		<p class="paragraphe">Tout le monde ! Du simple portfolio au complexe site de e-commerce. </p>
		<h1>Est-ce dangereux ?</h1>
		<p class="paragraphe">Pas du tout ! Nous ne somme pas de r&eacute;el hackers nous n\'exploitons pas les failles que nous d&eacute;couvrons. Cependant nous utilisons divers outils qui peuvent cr&eacute;er des entr&eacute;es &eacute;trange dans votre base de donn&eacute;e, nous vous recommandons de cr&eacute;er un backup de cette derni&egrave;re avant de nous soumettre votre site. 
		Vous pouvez aussi nous envoyer une copie de votre site ainsi que de sa base de donn&eacute;e pour que nous effectuions les tests en local sans toucher a votre site en ligne.</p>
		<h1>Pourquoi gratuit ?</h1>
		<p class="paragraphe">Nous faisons cela principalement pour le fun et pour apprendre. Nous sommes loin d\'&ecirc; tre des professionnel et nous n\'estimons pas fournir un service sans failles. Nous vous aidons a s&eacute;curiser votre site, en contre partie vous nous aidez a nous am&eacute;liorer. </p>
		<h1>A propos de nous</h1>	
		<p class="paragraphe">Nous sommes deux &eacute;tudiant en informatique de 21 et 22 ans. Nous participons a ce projet afin d\'am&eacute;liorer nos connaissances en s&eacute;curit&eacute; informatique.</p>';
	
	//Contact
	$contactTitle = "Nous contacter";
	$byMail = "Par mail :";
	$bySite = "Par le site :";
	$name = "Nom: *";
	$websiteURL = "URL du site: *";
	$comment = "Commentaire: ";
	$captchaPwd = "Mot de passe CAPTCHA: *";
	$send = "envoyer";
	
	$error = "Pas de bots SVP ! (".$_SERVER['HTTP_USER_AGENT'].")";
	$error2 = "Veuillez remplir tout les champs qui sont demand&eacute;s et envoyez de nouveau.\r\n";
	$error3 = "Charact&egrave;res sp&ecute;ciaux interdit pour \"Nom\".\r\n";
	$error4 = "E-mail invalide.\r\n";
	$error5 = "URL invalid.\r\n";
	$error6 = "Erreur d'initialisation du CAPTCHA.\r\n";
	$error7 = "Mauvais CAPTCHA.\r\n";
	$error8 = 'Nous ne pouvons recevoir votre requete (erreur)';
	$error9 = 'Votre message ressemble trop a du spam.';
	
	$success = "Nous avons bien re&ccedil;u votre demande.\r\n";
?>