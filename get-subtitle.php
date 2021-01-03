<?php require_once("template/core.header.php"); ?>
<!-- Main Header -->
<header id="main_header">
	<h1 class="heading">Free online subtitle translation tool</h1>
	<p class="sub_heading">Translate multiple subtitle files at the same time into 80 different languages. It supports SubRip (.srt), WebVTT (.vtt), Spruce Subtitle File (.stl), Youtube Subtitles (.sbv), SubViewer (.sub) and Advanced Sub Station (.ass) formats.</p>
</header>
<!-- Upload Section -->
<section id="upload_section">
	<!-- Progress Bar -->
	<div id="steps">
		<span class="active">
			<span class="symbol">&#10003;</span>
			<span class="steps_tooltip">Upload</span>
		</span>
		<span class="active">
			<span class="symbol">&#10003;</span>
			<span class="steps_tooltip">Edit / Translate</span>
		</span>
		<span class="active">
			<span class="symbol">&#10003;</span>
			<span class="steps_tooltip">&nbsp;&nbsp;&nbsp;Save</span>
		</span>
	</div>
	<a class="notranslate" href="<?php echo BASE_URL."add-subtitles.php" ?>"><button class="btn"><span class="symbol fix_symbol">&#8592;</span> Back</button></a>
	<h2 class="heading">Let's Download!</h2>
	<p class="sub_heading">To get started, click on the button below to download your translated/edited subtitle.</p>
	<!-- Upload button container -->
	<div id="upload_btn_container">
		<button class="download_btn" id="final_download">Download</button>
	</div>
</section>
<!-- Description Section -->
<section id="site_description">
	<article class="descr_container">
		<h1 class="title">About Subtitles Translator</h1>
		<div class="description">
			Subtitles Translator is a free online tool to translate subtitles from one language to another. With Subtitles Translator you can quickly translate multiple subtitles files with support for 6 different files formats.
		</div>
	</article>
	<article class="descr_container">
		<h1 class="title">Reach a Larger Audience With Your Videos</h1>
		<div class="description">
			If you produce videos for the internet, such as on Youtube, you can reach a much larger audience by using subtitles in your videos. With Subtitles Translator you can reach virtually the entire world with your videos. All you have to do is create subtitles in the language you master and then translate them into any language you want using our tool.
		</div>
	</article>
</section>
<?php require_once("template/core.footer.php"); ?>