<?php require_once("template/core.header.php"); ?>
<!-- Main Header -->
<header id="main_header" class="notranslate">
	<!-- <h1 class="heading">Free online subtitle translation tool</h1> -->
	<!-- <p class="sub_heading">Translate multiple subtitle files at the same time into 80 different languages. It supports SubRip (.srt), WebVTT (.vtt), Spruce Subtitle File (.stl), Youtube Subtitles (.sbv), SubViewer (.sub) and Advanced Sub Station (.ass) formats.</p> -->
</header>
<!-- Upload Section -->
<section id="upload_section">
	<!-- Progress Bar -->
	<div id="steps" class="notranslate">
		<span class="active">
			<span class="symbol">&#10003;</span>
			<span class="steps_tooltip">Upload</span>
		</span>
		<span class="active">
			<span class="symbol">&#10003;</span>
			<span class="steps_tooltip">Edit / Translate</span>
		</span>
		<span><span class="steps_tooltip">&nbsp;&nbsp;&nbsp;Save</span>3</span>
	</div>
	<h2 class="heading notranslate" id="file_name"></h2>
	<p class="sub_heading notranslate process_cycle">[<mark>Translate &#8644; Edit &#8644; Save</mark>] &#8658; Download</p>
	<a class="notranslate" href="<?php echo BASE_URL."add-subtitles.php" ?>"><button class="btn"><span class="symbol fix_symbol">&#8592;</span> Back</button></a>
	<!-- Add more button -->
	<div class="d-flex tools_wrapper">
		<div id="g_translate_btn"></div>
		<div class="notranslate">
			<button class="edit_btn" id="save" onClick="askSaveConfirmation()">Save</button>
			<button class="download_btn" id="goto_download">Get Your File</button>
		</div>
	</div>
	<!-- File List Table -->
	<table id="file_list" class="table">
	  <thead class="notranslate">
	  	  <tr>
		    <th>S.N</th>
		    <th>Timeline</th>
		    <th>Subtitle Text (Editable)</th>
		  </tr>
	  </thead>
	  <tbody id="translation_contents"></tbody>
	</table>
</section>
<!-- Description Section -->
<section id="site_description" class="notranslate">
	<!-- <article class="descr_container">
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
	</article> -->
</section>
<!-- Google Translate JS -->
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<?php require_once("template/core.footer.php"); ?>