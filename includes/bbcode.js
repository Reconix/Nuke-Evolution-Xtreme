b_help = "Bold: [B]text[/B]";
i_help = "Italic: [I]text[/I]";
u_help = "Under Line: [U]text[/U]";
quote_help = "Quote: [quote]text[/quote]";
code_help = "Code: [code]code[/code]";
php_help = "PHP: [php]code[/php]";
img_help = "Insert Image: [img]http://image path[/img]";
lytebox_help = "Insert Image: [lytebox width=# height=#]image path[/lytebox]";
fc_help = "Font Color: [color=red]text[/color] You can use HTML color=#FF0000";
fs_help = "Font Size: [size=9]Very Small[/size]";
ft_help = "Font type: [font=Andalus]text[/font]";
rtl_help = "Make message box align from Right to Left";
ltr_help = "Make message box align from Left to Right";
mail_help = "Insert Email: [email]Email Here[/email]";
url_help="Insert Web Page: [url=Page URL]Page name[/url]";
right_help="set text align to right: [align=right]text[/align]";
left_help="set text align to left: [align=left]text[/align]";
center_help="set text align to center: [align=center]text[/align]";
justify_help="justify text: [align=justify]text[/align]";
marqr_help="Marque text to Right: [marq=right]text[/marq]";
marql_help="Marque text to Left: [marq=left]text[/marq]";
marqu_help="Marque text to up: [marq=up]text[/marq]";
marqd_help="Marque text to down: [marq=down]text[/marq]";
hr_help="Insert H-Line [hr]";
video_help="Insert video file: [video width=# height=#]file URL[/video]";
flash_help="Insert flash file: [flash width=# height=#]flash URL[/flash]";

var bbcode = new Array();
var theSelection = false;

function helpline(form, field, help) {
    document.forms[form].elements["help"+field].value = eval(help + "_help");
    document.forms[form].elements["help"+field].readOnly = "true";
}

function emoticon(form, field, text) { BBCwrite(form, field, '', ' '+text+' ', true); }
function BBChr(form, field) { BBCwrite(form, field, '', "[hr]", true); }
function BBCdir(form, field, dirc) { document.forms[form].elements[field].dir=(dirc); }
function BBCft(form, field, box) { BBCfont(form, field, "font", box); }
function BBCfs(form, field, box) { BBCfont(form, field, "size", box); }
function BBCfc(form, field, box) { BBCfont(form, field, "color", box); }
function BBCfont(form, field, code, box) { BBCwrite(form, field, "["+code+"="+box.value+"]", "[/"+code+"]", true); }

function BBCwmi(form, field, type) {
    if (type == 'img') { var URL = prompt("Please enter image URL","http://"); }
    else { var URL = prompt("Enter the Email Address",""); }
    if (URL == null) { return; }
    if (!URL) { return alert("Error : You didn't write the Address"); }
    BBCwrite(form, field, '', "["+type+"]"+URL+"[/"+type+"]", true);
}

function BBCode(form, field, code, img) {
    var type = img.name;
    if (BBCwrite(form, field, "["+code+"="+type+"]", "[/"+code+"]")) { return; }
    if (bbcode[code+type+form+field] == null) {
        ToAdd = "["+code+"="+type+"]";
        re = new RegExp(type+".(\\w+)$");
        img.src = img.src.replace(re, type+"1.$1");
        bbcode[code+type+form+field] = 1;
    } else {
        ToAdd = "[/"+code+"]";
        re = new RegExp(type+"1.(\\w+)$");
        img.src = img.src.replace(re, type+".$1");
        bbcode[code+type+form+field] = null;
    }
    BBCwrite(form, field, '', ToAdd, true);
}

function BBCcode(form, field, img) {
    var code = img.name;
    if (BBCwrite(form, field, "["+code+"]", "[/"+code+"]")) { return; }
    if (bbcode[form+field+code] == null) {
        ToAdd = "["+code+"]";
        re = new RegExp(code+".(\\w+)$");
        img.src = img.src.replace(re, code+"1.$1");
        bbcode[form+field+code] = 1;
    } else {
        ToAdd = "[/"+code+"]";
        re = new RegExp(code+"1.(\\w+)$");
        img.src = img.src.replace(re, code+".$1");
        bbcode[form+field+code] = null;
    }
    BBCwrite(form, field, '', ToAdd, true);
}

function BBCmm(form, field, type) {
    var URL = prompt("Enter the "+type+" file URL", "http://");
    if (URL == null) { return; }
    if (!URL) { return alert("Error: You didn't write the "+type+" file URL"); }
    var WS = prompt("Enter the "+type+" width", "250");
    if (WS == null) { return; }
    if (!WS) { WS = 250; }
    var HS = prompt("Enter the "+type+" height", "200");
    if (HS == null) { return; }
    if (!HS) { HS = 200; }
    BBCwrite(form, field, '', "["+type+" width="+WS+" height="+HS+"]"+URL+"[/"+type+"]", true);
}

function BBClytebox(form, field, type) {
    var URL = prompt("Enter the "+type+" file URL", "http://");
    if (URL == null) { return; }
    if (!URL) { return alert("Error: You didn't write the "+type+" file URL"); }
    var WS = prompt("Enter the thumbnail width", "160");
    if (WS == null) { return; }
    if (!WS) { WS = 160; }
    var HS = prompt("Enter the thumbnail height", "120");
    if (HS == null) { return; }
    if (!HS) { HS = 120; }
    BBCwrite(form, field, '', "["+type+" width="+WS+" height="+HS+"]"+URL+"[/"+type+"]", true);
}

function BBCurl(form, field) {
    var URL = prompt("Enter the URL", "http://");
    if (URL == null) { return; }
    if (!URL) { return alert("Error: You didn't write the URL "); }
    if (BBCwrite(form, field, "[url="+URL+"]", "[/url]")) { return; }
    var TITLE = prompt("Enter the page name", "Web Page Name");
    if (TITLE == null) { return; }
    var Add = "]"+URL;
    if (TITLE) { Add = "="+URL+"]"+TITLE; }
    BBCwrite(form, field, '', "[url"+Add+"[/url]", true);
}

function BBCwrite(form, field, start, end, force) {
    var textarea = document.forms[form].elements[field];
    if (textarea.caretPos) {
      textarea.focus();
        // Attempt to create a text range (IE).
        theSelection = document.selection.createRange().text;
        if (force || theSelection != '') {
            document.selection.createRange().text = start + theSelection + end;
            textarea.focus();
            return true;
        }
    } else if (typeof(textarea.selectionStart) != "undefined") {
        // Mozilla text range replace.
        var text = new Array();
        text[0] = textarea.value.substr(0, textarea.selectionStart);
        text[1] = textarea.value.substr(textarea.selectionStart, textarea.selectionEnd-textarea.selectionStart);
        text[2] = textarea.value.substr(textarea.selectionEnd);
        caretPos = textarea.selectionEnd+start.length+end.length;
        if (force || text[1] != '') {
            textarea.value = text[0]+start+text[1]+end+text[2];
            if (textarea.setSelectionRange) {
                textarea.focus();
                textarea.setSelectionRange(caretPos, caretPos);
            }
            return true;
        }
    } else if (force) {
        // Just put it on the end.
        textarea.value += start+end;
        textarea.focus(textarea.value.length-1);
        return true;
    }
    return false;
}

function storeCaret(text) {
    if (text.createTextRange) text.caretPos = document.selection.createRange().duplicate();
}

function bbstyle(bbnumber) {
    return true;
}