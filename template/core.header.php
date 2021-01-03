<?php require_once("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-72933123-6"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-72933123-6');
	</script>
	<meta charset="utf-8">
	<meta name="theme-color" content="#ff6600">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="copyright" content="© 2020 Subtitle Translator" />
	<meta name="rating" content="general" />

	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://subtitletranslator.online/">
	<meta property="og:title" content="Subtitle Translator - Translate Subtitle .srt File for Free [2020]">
	<meta property="og:description" content="If you are looking for Free Subtitle Translator website then this is for you with the help of this you can easily translate your Subtitle in any Language.">
	<meta property="og:image" content="<?php echo BASE_URL; ?>assets/images/website.PNG">

	<!-- Twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="https://subtitletranslator.online/">
	<meta property="twitter:title" content="Subtitle Translator - Translate Subtitle .srt File for Free [2020]">
	<meta property="twitter:description" content="If you are looking for Free Subtitle Translator website then this is for you with the help of this you can easily translate your Subtitle in any Language.">
	<meta property="twitter:image" content="<?php echo BASE_URL; ?>assets/images/website.PNG">
	<?php
		// Different meta tag for each page
		$script = trim($_SERVER['PHP_SELF'], '/');
		// die($script);
		switch($script){
			case 'index.php':
			echo '  
				<title>Subtitle Translator - Translate Subtitle .srt File for Free [2020]</title>
				<meta name="title" content="Subtitle Translator - Translate Subtitle .srt File for Free [2020]">
				<meta name="description" content="If you are looking for Free Subtitle Translator website then this is for you with the help of this you can easily translate your Subtitle in any Language.">
				<meta name="keywords" content="Subtitle Translator, Translate Subtitle, Subtitles">
				<meta name="robots" content="index, follow">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<meta name="language" content="English">
				<meta name="revisit-after" content="1 days">
				<meta name="author" content="subtitletranslator">
				<link rel="canonical" href="https://subtitletranslator.online"/>
			';
			break;

			case 'about-us.php':
			echo '
				<title>About Subtitle Translation Tool | subtitletranslator.online</title>
				<meta name="description" content="This is About us page of subtitletranslator.online where you get all the information about Subtitles and how this website works.">
			';
			break;

			case 'add-subtitles.php':
			echo '
				<title>Add Subtitles And Start Translating | subtitletranslator.online</title>
				<meta name="description" content="Add Your Subtitles Here.">
			';
			break;

			case 'contact-us.php':
			echo '
				<title>Contact Us For Any Subtitle Translation Issues | subtitletranslator.online</title>
				<meta name="description" content="Feel Free to Contact us on jp024556@gmail.com for any Query related to subtitles and how to translate it.">
			';
			break;

			case 'disclaimer.php':
			echo '
				<title>Disclaimer | subtitletranslator.online</title>
				<meta name="description" content="If you require further information or have any questions about our site disclaimer, please feel free to contact us by email at jp024556@gmail.com.">
			';
			break;

			case 'get-subtitle.php':
			echo '
				<title>Get Translated Subtitle | subtitletranslator.online</title>
			';
			break;

			case 'faq.php':
			echo '
				<title>Frequently Asked Questions | subtitletranslator.online</title>
				<meta name="description" content="Feel Free to ask any Question any time realted to Subtitle Translation.">
			';
			break;

			case 'privacy-policy.php':
			echo '
				<title>Privacy Policy | subtitletranslator.online</title>
				<meta name="description" content="At subtitletranslator, accessible from https://subtitletranslator.online/, one of our main priorities is the privacy of our visitors.">
			';
			break;

			case 'subtitle-translator.php':
			echo '
				<title>Translate And Edit Subtitle | subtitletranslator.online</title>
				<meta name="description" content="Translate & get your subtitle Online for Free">
			';
			break;

			default:
			echo '
				<title>Free Subtitle Translator And Editor Tool | subtitletranslator.online</title>
			';
		}
	?>
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="css/light.css">
	<meta name="google-site-verification" content="IRGgFh-NGdS16Zxw8fppOelkigHxs6gyGZQfZiuPQ1Q" />
</head>
<body>
	<!-- Main Container -->
	<div id="main_container">
		<!-- Upper Menu -->
		<nav id="upper_menu" class="notranslate">
			<!-- Logo -->
			<div id="logo"><a href="<?php echo BASE_URL; ?>">Subtitle Translator</a></div>
			<!-- Upper Menu Links -->
			<div id="upper_links">
				<ul>
					<li><a href="<?php echo BASE_URL; ?>add-subtitles.php">Add Subtitles</a></li>
					<li><a href="<?php echo BASE_URL; ?>about-us.php">About</a></li>
					<li><a href="<?php echo BASE_URL; ?>contact-us.php">Contact</a></li>
				</ul>
			</div>
		</nav>