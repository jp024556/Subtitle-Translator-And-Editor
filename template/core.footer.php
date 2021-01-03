		<!-- Footer -->
		<footer id="main_footer" class="notranslate">
			<div id="left_footer">
				<ul id="pages">
					<li><a href="<?php echo BASE_URL; ?>disclaimer.php">Disclaimer</a></li>
					<li><a href="https://www.facebook.com/SubtitleTranslator-118453846662137/" title="Our Facebook Page">Facebook</a></li>
				</ul>
			</div>
			<div id="middle_footer">
				<ul id="social">
					<li><a href="<?php echo BASE_URL; ?>privacy-policy.php">Privacy Policy</a></li>
					<li><a href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fsubtitletranslator.online%2F&text=Subtitle%20Translator%20-%20Free%20online%20subtitles%20translator%20and%20editor%20tool%21" title="Share and spread words on twitter">Twitter</a></li>
				</ul>
			</div>
			<div id="right_footer">
				<ul id="more_links">
					<li><a href="<?php echo BASE_URL; ?>faq.php">FAQ</a></li>
					<li><a href="https://paypal.me/jp024556" title="Donate with Paypal">Donate</a></li>
				</ul>
			</div>
		</footer>
	</div>
	<!-- POPUP Window -->
	<div id="popup" class="notranslate">
		<h2 class="heading">Please wait while we process your file :)</h2>
		<div style="position: relative;">
			<div class="loader">Processing...</div>
			<div class="mover"></div>
		</div>
	</div>
	<!-- Alert Popup DIV -->
	<div id="alert_popup" class="notranslate">
		<div id="msg"></div>
		<div id="msg_buttons">
			<button id="yes_msg">YES</button>
			<button id="no_msg">NO</button>
		</div>
	</div>
	<!-- Load Main JS File -->
	<script>
		var myScript = document.createElement("script");
		myScript.setAttribute("src", "/js/app.js");
		document.body.appendChild(myScript);
	</script>
</body>
</html>