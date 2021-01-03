; /*== Global Variables ==*/
BASE_URL = window.location.origin + "/";
MAX_UPLOAD_LIMIT = 10;
alreadyAvailableFiles = [];

// Add files to processing list if available
if ($("table_contents") && localStorage.files != undefined) {
    var file_list = JSON.parse(localStorage.getItem("files"));
    var list = "";
    for (var i = 0; i < file_list.length; i++) {
        list += '<tr>';
        list += '<td>';
        list += i + 1;
        list += '</td>';
        list += '<td>';
        list += file_list[i].file_name;
        list += '</td>';
        list += '<td>';
        list += file_list[i].file_size;
        list += '</td>';
        list += '<td>';
        list += '<div class="d-flex">';
        list += '<button class="edit_btn" onClick="dispatchFile(' + i + ')" id="' + file_list[i].file_id + '">Translate</button>&nbsp;&nbsp;';
        list += '<button class="del_btn" onClick="delSubtitle(' + i + ')" id="' + file_list[i].file_id + '">Delete</button>&nbsp;&nbsp;';
        if (file_list[i].is_translated === "yes")
            list += '<button class="download_btn" onClick="downloadSubtitle(' + i + ')" id="' + file_list[i].file_id + '">Download</button>&nbsp;&nbsp;';
        list += '</div>';
        list += '</td>';
        list += '</tr>';
    }

    $("table_contents").innerHTML = list;
}

// Process file to be translated
if ($("translation_contents")) {
    if (!sessionStorage.file_id) {
        window.history.back();
    } else {
        var file_id = sessionStorage.file_id;
        var file = JSON.parse(localStorage.getItem("files"))[file_id];
        $("file_name").innerHTML = file.file_name;
        var contents = file.file_contents;
        contents = contents.trim().split(/\n\s*\n/);
        var temp = "";
        var content = "";
        for (var i = 0; i < contents.length; i++) {
            temp = contents[i].trim().split("\n");
            content += "<tr>";
            content += "<td class='notranslate'>" + temp[0] + "</td><td class='notranslate'>" + temp[1] + "</td>";
            temp.splice(0, 2);
            content += "<td><div class='editable' contenteditable>" + temp[0] + "</div></td>";
            content += "</tr>";
        }

        $("translation_contents").innerHTML = content;
    }
}

// Ask for save confirmation
function askSaveConfirmation() {
    alertPopup("Do you want to continue to save?<br />Note: Before saving, You can also first edit your file then translate or first translate then edit your file.", "", scrollPage, "");
}

// Function to scroll page before translation
function scrollPage() {
    $("popup").style.display = "flex";
    var px = 0;
    scrollDelay = setInterval(function() {
        px = px + 500;
        window.scrollTo(0, px);
        if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
            clearInterval(scrollDelay);
            saveTranslation();
            $("popup").style.display = "none";
            window.scrollTo(0, 0);
        }
    }, 500);
}

// Method to save translation
function saveTranslation() {
    var file_id = sessionStorage.file_id;
    var file_list = JSON.parse(localStorage.getItem("files"));

    var tds = $("translation_contents").getElementsByTagName("TD");
    var temp = "";
    for (var i = 0; i < tds.length; i++) {
        if ((i + 1) % 3 === 0)
            temp += tds[i].innerText + "\n\n";
        else
            temp += tds[i].innerText + "\n";
    }
    temp.trim();
    file_list[file_id].file_translated_contents = temp;
    file_list[file_id].is_translated = "yes";
    localStorage.files = JSON.stringify(file_list);
    alertPopup("Your file processed successfully :)", "alert", "");
    sessionStorage.isTranslatedId = file_id;
}

// Method to initialize google translator
function googleTranslateElementInit() {
    new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE }, 'g_translate_btn');
}

// Method to handle deleting of subtitles from list
function delSubtitle(id) {
    alertPopup("Do you really want to delete this subtitle from the list?", "", delSubtitleHelper, id);
}

// Subtitle Delete Helper Method
function delSubtitleHelper(id) {
    var file_list = JSON.parse(localStorage.getItem("files"));
    file_list.splice(id, 1);
    localStorage.files = JSON.stringify(file_list);
    location.reload();
}

// Method to dispatch file for translating
function dispatchFile(id) {
    sessionStorage.setItem("file_id", id);
    window.location.href = BASE_URL + "subtitle-translator.php";

}

// Method to handle downloading of file using
function downloadSubtitle(id) {
    alertPopup("Do you want to download this subtitle?", "", downloadSubtitleHelper, id);
}

// Subtitle Download Helper Method
function downloadSubtitleHelper(id) {
    var file_list = JSON.parse(localStorage.getItem("files"));
    var a = document.createElement("a");
    document.body.appendChild(a);
    a.style.display = "none";
    blob = new Blob([file_list[id].file_translated_contents], { type: "octet/stream" });
    url = window.URL.createObjectURL(blob);
    a.href = url;
    a.download = file_list[id].file_name;
    a.click();
    window.URL.revokeObjectURL(url);
    document.body.removeChild(a);
}

// Final step
if ($("final_download")) {
    if (!sessionStorage.file_id) {
        window.location.href = BASE_URL + "add-subtitles.php";
    } else {
        $("final_download").onclick = function(e) {
            e.preventDefault();
            downloadSubtitle(sessionStorage.file_id);
        }
    }
}

// Go to download
if ($("goto_download")) {
    $("goto_download").onclick = function(e) {
        e.preventDefault();
        if (!sessionStorage.isTranslatedId || sessionStorage.isTranslatedId !== file_id) {
            alertPopup("Have you finished translation?<br />You have not saved your subtitle after translation!<br />Do you want to <strong>Save</strong> now?", "", askSaveConfirmation, "");
        } else {
            sessionStorage.removeItem("isTranslatedId");
            window.location.href = BASE_URL + "get-subtitle.php";
        }
    }
}


// Handle transfer of file to be translated
if ($("main_upload_btn")) {
    $("main_upload_btn").onclick = function(e) {
        e.preventDefault();

        // Fire file reader when file chosen
        $("trigger_file_dialog").onchange = function(e) {
            getAllFiles(e);
        }

        // Open file dialog
        $("trigger_file_dialog").click();
    }
}

// Function to extract file contents
function extractFileContents(file, reload) {
    if (file.name.split(".").pop().toLowerCase().trim() !== "srt") {
        alertPopup("Only .srt files are allowed !", "alert", "")
        return;
    }
    var reader = new FileReader();
    reader.onload = function() {
        var contents = {
            "file_id": new Date().getTime(),
            "file_name": file.name,
            "file_size": Math.ceil(file.size / 1000) + " KB",
            "is_translated": "no",
            "file_contents": reader.result
        };
        alreadyAvailableFiles.push(contents);
        if (reload) {
            // Saving data to session storage at last iteration
            localStorage.setItem("files", JSON.stringify(alreadyAvailableFiles));
            window.location.href = BASE_URL + "add-subtitles.php";
        }
    }
    reader.readAsText(file, "UTF-8");
}

// Function to get files
function getAllFiles(e) {

    // Checking total length of files selected for processing
    var totalFiles = e.target.files.length;
    if (totalFiles.length > MAX_UPLOAD_LIMIT) {
        alertPopup("Only " + MAX_UPLOAD_LIMIT + " files can be added at a time !", "alert", "");
        if (location.href.indexOf("processor") === -1)
            window.location.href = BASE_URL + "add-subtitles.php";
        return;
    }

    // Checking total length of already added files and newly selected files for processing
    if (localStorage.getItem("files") !== null) {
        var alreadyStoredFiles = JSON.parse(localStorage.getItem("files")).length;
        if ((alreadyStoredFiles + totalFiles) > MAX_UPLOAD_LIMIT) {
            alertPopup("Only " + (MAX_UPLOAD_LIMIT - alreadyStoredFiles) + " more file(s) can be added !<br />Delete some files from list to add more.", "alert", "");
            if (location.href.indexOf("processor") === -1)
                window.location.href = BASE_URL + "add-subtitles.php";
            return;
        }
    }

    // Getting already stored files reference
    if (localStorage.getItem("files") !== null) {
        alreadyAvailableFiles = JSON.parse(localStorage.getItem("files"));
    }

    // Iterating over all selected files for processing
    for (var i = 0; i < totalFiles; i++) {
        if (i === (totalFiles - 1))
            extractFileContents(e.target.files[i], true)
        else
            extractFileContents(e.target.files[i], false)
    }
}

// Automatically open language selector first time
if ($("g_translate_btn")) {
    var checkGExists = setInterval(function() {
        if ($_("goog-te-menu-value").length > 0) {
            $_("goog-te-menu-value")[0].click();
            clearInterval(checkGExists);
        }
    }, 4000)
}

/*== Disable some keys for privacy reason ==*/

// Create context layout if it doesn't exist
if (!$("custom_menu")) {
    var menuEl = document.createElement("DIV");
    menuEl.id = "custom_menu";
    menuEl.innerHTML = '<p id="copy">Copy</p><p id="reload">Reload</p>';
    document.body.appendChild(menuEl);
}

// Trigger custom menu
if (document.addEventListener) {
    document.addEventListener('contextmenu', function(e) {
        triggerCustomMenu(e);
        e.preventDefault();
    }, false);
} else {
    document.attachEvent('oncontextmenu', function() {
        triggerCustomMenu(e);
        window.event.returnValue = false;
    });
}

// Show Custom Menu on Right Click
function triggerCustomMenu(e) {
    var menu = document.getElementById("custom_menu");
    menu.style.left = e.clientX + "px";
    menu.style.top = e.clientY + "px";
    menu.style.display = "block";
}

// Hide Context Menu When Clicked Outside
window.document.onmouseup = function(e) {
    var menu = document.getElementById("custom_menu");
    if (e.target !== menu && !menu.contains(e.target))
        menu.style.display = "none";
}

// Method to copy
function copySelection() {
    document.getElementById("custom_menu").style.display = "none";
    if (window.getSelection().toString() !== "") {
        document.execCommand("copy");
        alertPopup("Selected text copied successfully :)", "alert", "");
    } else {
        alertPopup("First select some text then click on Copy !", "alert", "");
    }
}

// Method to refresh
function reloadPage() {
    location.reload();
}

// Copy selected text
var copy = document.getElementById("copy");
copy.onmousedown = function(e) {
    e.preventDefault();
    copySelection();
}

// Reload current page
var reload = document.getElementById("reload");
reload.onclick = function() {
    document.getElementById("custom_menu").style.display = "none";
    alertPopup("This action will reload this page.<br />Do you really want to continue?", "", reloadPage);
}

// Block user clicks
document.onkeydown = function(e) {
    if (e.ctrlKey && e.keyCode === 85) {
        alertPopup("Sorry, this action is disabled on this site !", "alert", "");
        return false;
    } else if (e.ctrlKey && e.shiftKey && e.keyCode === 73) {
        alertPopup("Sorry, this action is disabled on this site !", "alert", "");
        return false;
    } else if (e.keyCode === 123) {
        alertPopup("Sorry, this action is disabled on this site !", "alert", "");
        return false;
    } else {
        return true;
    }
}

/*== Helper Methods ==*/

function $(id) {
    return document.getElementById(id);
}

function $_(cl) {
    return document.getElementsByClassName(cl);
}

function alertPopup(msg, type, callback, param) {
    $("main_container").style.pointerEvents = "none";
    $("msg").innerHTML = msg;
    if (type === "alert") {
        $("msg_buttons").style.justifyContent = "center";
        $("msg_buttons").innerHTML = '<button id="yes_msg">OK</button>';
    } else {
        $("msg_buttons").style.justifyContent = "space-between";
        $("msg_buttons").innerHTML = '<button id="yes_msg">YES</button><button id="no_msg">NO</button>';
    }
    $("alert_popup").style.display = "flex";

    $("yes_msg").onclick = function(e) {
        $("alert_popup").style.display = "none";
        $("main_container").style.pointerEvents = "auto";
        if (callback !== "")
            callback(param);
    }

    if ($("no_msg")) {
        $("no_msg").onclick = function(e) {
            $("alert_popup").style.display = "none";
            $("main_container").style.pointerEvents = "auto";
        }
    }
}