<?php

/*********************************************
  CPG Dragonfly™ CMS
  ********************************************
  Copyright (c) 2004 - 2006 by CPG-Nuke Dev Team
  http://dragonflycms.org

  Dragonfly is released under the terms and conditions
  of the GNU GPL version 2 or any later version
  
  $Revision: 9.25 $
  $Author: djmaze $
**********************************************/

/*
    This was orginally derived from DragonFly CMS/CPG Nuke
    but was modified to work with nuke by other coders that 
    removed the copyright information and distributed it
    on other sites.
*/

/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Caching System                           v1.0.0       10/29/2005
 ************************************************************************/

if (!defined('NUKE_EVO')) {
    die("You can't access this file directly...");
}

global $db, $prefix, $smilies_path, $bbbttns_path, $bb_codes, $smilies_close, $bbcode_common, $currentlang, $nukeurl;

if(file_exists(NUKE_LANGUAGE_DIR.'bbcode/lang-'.$currentlang.'.php')) {
    include_once(NUKE_LANGUAGE_DIR.'bbcode/lang-'.$currentlang.'.php');
} else {
    include_once(NUKE_LANGUAGE_DIR.'bbcode/lang-english.php');
}

require_once(NUKE_CLASSES_DIR.'class.nbbcode.php');

$ThemeSel = get_theme();
global $smilies_path;
$smilies_path = (file_exists("themes/$ThemeSel/images/smiles/icon_smile.gif")) ? "themes/$ThemeSel/images/smiles/" : 'modules/Forums/images/smiles/';
$bbbttns_path = 'images/bbcode/';

$bb_codes['quote'] = '<table width="90%" cellspacing="1" cellpadding="3" border="0" align="center" class="bodyline"><tr>
    <td><span class="genmed"><strong>Quote:</strong></span></td>
</tr><tr>
    <td class="quote">';
$bb_codes['quote_name'] = '<table width="90%" cellspacing="1" cellpadding="3" border="0" align="center" class="bodyline"><tr>
    <td><span class="genmed"><strong>\\1 Wrote:</strong></span></td>
</tr><tr>
    <td class="quote">';
$bb_codes['quote_close'] = '</td></tr></table>';
$bb_codes['code_start'] = '<table width="90%" cellspacing="1" cellpadding="3" border="0" align="center" class="bodyline"><tr>
        <td><span class="genmed"><strong>Code:</strong></span></td>
</tr><tr>
    <td class="code"><code>';
$bb_codes['code_end'] =  '</code></td></tr></table>';
$bb_codes['php_start'] = '<table border="0" align="center" width="90%" cellpadding="3" cellspacing="1" class="bodyline"><tr>
    <td><span class="genmed"><strong>PHP:</strong></span></td>
</tr><tr>
    <td class="code">';
$bb_codes['php_end'] = '</td></tr></table>';
$bb_codes['win_start'] = '<html>
<head>
  <title>Smiley Selection</title>
  <link rel="stylesheet" href="themes/'.$ThemeSel.'/style/style.css" type="text/css" />
</head>
<body>
<script language="javascript" type="text/javascript">
<!--
function emoticon(form, field, text) {
    text = \' \' + text + \' \';
    if (opener.document.forms[form].elements[field].createTextRange && opener.document.forms[form].elements[field].caretPos) {
        var caretPos = opener.document.forms[form].elements[field].caretPos;
        caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == \' \' ? text + \' \' : text;
        opener.document.forms[form].elements[field].focus();
    } else {
        opener.document.forms[form].elements[field].value += text;
        opener.document.forms[form].elements[field].focus();
    }
}
//-->
</script>';
$bb_codes['win_end'] = '<br />
<div align="center"><a href="javascript:window.close();" class="genmed">'.$smilies_close.'</a></div>
</body></html>';
if (file_exists('themes/'.$ThemeSel.'/bbcode.inc')) {
    include('themes/'.$ThemeSel.'/bbcode.inc');
}

function get_codelang($var, $array) {
    return (isset($array[$var])) ? $array[$var] : $var;
}

function smilies_table($mode, $field='message', $form='post')
{
    global $bb_codes, $db, $prefix, $smilies_path, $nukeurl;
    global $smilies_more, $smilies_desc, $bbcode_common;
    $url = $nukeurl.'/modules.php?name=Forums&file=posting&amp;mode=smilies&amp;popup=1';

    $inline_cols = 4;
    $inline_rows = 5;
    $window_cols = 8;

    $content = '';
    if ($mode == 'window') {
        $content = $bb_codes['win_start'];
    } else if (!defined('BBCODE_JS_ACTIVE')) {
        $content .= '<script language="JavaScript" type="text/javascript">
                    b_help = "'. $bbcode_common['bold'][0].' '.$bbcode_common['bold'][1].'";
                    i_help = "'. $bbcode_common['italic'][0].' '.$bbcode_common['italic'][1].'";
                    u_help = "'. $bbcode_common['underline'][0].' '.$bbcode_common['underline'][1].'";
                    quote_help = "'. $bbcode_common['quote'][0].' '.$bbcode_common['quote'][1].'";
                    code_help = "'. $bbcode_common['code'][0].' '.$bbcode_common['code'][1].'";
                    php_help = "'. $bbcode_common['php'][0].' '.$bbcode_common['php'][1].'";
                    img_help = "'. $bbcode_common['img'][0].' '.$bbcode_common['img'][1].'";
					lytebox_help = "'. $bbcode_common['lytebox'][0].' '.$bbcode_common['lytebox'][1].'";
                    fc_help = "'. $bbcode_common['fc'][0].' '.$bbcode_common['fc'][1].'";
                    fs_help = "'. $bbcode_common['fs'][0].' '.$bbcode_common['fs'][1].'";
                    ft_help = "'. $bbcode_common['ft'][0].' '.$bbcode_common['ft'][1].'";
                    rtl_help = "'. $bbcode_common['rtl'][0].' '.$bbcode_common['rtl'][1].'";
                    ltr_help = "'. $bbcode_common['ltr'][0].' '.$bbcode_common['ltr'][1].'";
                    mail_help = "'. $bbcode_common['mail'][0].' '.$bbcode_common['mail'][1].'";
                    url_help= "'. $bbcode_common['url'][0].' '.$bbcode_common['url'][1].'";
                    right_help= "'. $bbcode_common['right'][0].' '.$bbcode_common['right'][1].'";
                    left_help= "'. $bbcode_common['left'][0].' '.$bbcode_common['left'][1].'";
                    center_help= "'. $bbcode_common['center'][0].' '.$bbcode_common['center'][1].'";
                    justify_help= "'. $bbcode_common['justify'][0].' '.$bbcode_common['justify'][1].'";
                    marqr_help= "'. $bbcode_common['marqr'][0].' '.$bbcode_common['marqr'][1].'";
                    marql_help= "'. $bbcode_common['marql'][0].' '.$bbcode_common['marql'][1].'";
                    marqu_help= "'. $bbcode_common['marqu'][0].' '.$bbcode_common['marqu'][1].'";
                    marqd_help= "'. $bbcode_common['marqd'][0].' '.$bbcode_common['marqd'][1].'";
                    hr_help= "'. $bbcode_common['hr'][0].' '.$bbcode_common['hr'][1].'";
                    video_help="'. $bbcode_common['video'][0].' '.$bbcode_common['video'][1].'";
                    flash_help="'. $bbcode_common['flash'][0].' '.$bbcode_common['flash'][1].'";</script>
                    <script language="JavaScript" src="includes/bbcode.js" type="text/javascript"></script>';
        define('BBCODE_JS_ACTIVE', 1);
    }
    if ($mode == 'onerow') {
        $content .= '
<table width="450" border="0" cellspacing="0" cellpadding="0">';
    } else {
        $content .= '
<table width="100" border="0" cellspacing="0" cellpadding="5">';
    }
    $smilies = get_smilies();
    if (is_array($smilies)) {
        $num_smilies = 0;
        $rowset = array();
        for ($i=0; $i<count($smilies); ++$i) {
            if (empty($rowset[$smilies[$i]['smile_url']])) {
                $rowset[$smilies[$i]['smile_url']]['code'] = str_replace("'", "\\'", str_replace('\\', '\\\\', $smilies[$i]['code']));
                $rowset[$smilies[$i]['smile_url']]['emoticon'] = get_codelang($smilies[$i]['emoticon'],$smilies_desc);
                $num_smilies++;
            }
        }

        if ($num_smilies) {
            $smilies_count = ($mode == 'inline') ? min(19, $num_smilies) : $num_smilies;
            $smilies_split_row = ($mode == 'inline') ? $inline_cols - 1 : $window_cols - 1;

            $s_colspan = $row = $col = 0;

            while (list($smile_url, $data) = each($rowset)) {
                if (!$col) {
                    $content .= '<tr align="center" valign="middle">';
                }
                $content .= "<td><a href=\"javascript:emoticon('".$form."', '".$field."', '".$data['code']."')\"><img src=\"" . $smilies_path . $smile_url . "\" border=\"0\" alt=\"".$data['emoticon']."\" title=\"".$data['emoticon']."\" /></a></td>";
                $s_colspan = max($s_colspan, $col + 1);

                if ($mode == 'onerow') {
                    if ($col >= 15) {
                        if ($num_smilies > 15) {
                            $content .= "<td colspan=\"$s_colspan\" class=\"nav\"><a href=\"$url\" onclick=\"window.open('$url', '_smilies', 'HEIGHT=200,resizable=yes,scrollbars=yes,WIDTH=230');return false;\" target=\"_smilies\" class=\"nav\">$smilies_more</a></td>";
                        }
                        break;
                    }
                    $col++;
                }
                else if ($col == $smilies_split_row) {
                    $content .= '</tr>';
                    $col = 0;
                    if ($mode == 'inline' && $row == $inline_rows - 1) {
                        break;
                    }
                    $row++;
                }
                else { $col++; }
            }
            if ($col > 0) { $content .= '</tr>'; }

            if ($mode == 'inline' && $num_smilies > $inline_rows * $inline_cols) {
                $content .= "<tr align=\"center\">
                    <td colspan=\"$s_colspan\" class=\"nav\"><a href=\"$url\" onclick=\"window.open('$url', '_smilies', 'HEIGHT=200,resizable=yes,scrollbars=yes,WIDTH=230');return false;\" target=\"_smilies\" class=\"nav\">$smilies_more</a></td>
                </tr>";
            }
        }
    }
    $content .= "\n</table>\n";
    if ($mode == 'window') { $content .= $bb_codes['win_end']; }
    return $content;
}
if(!function_exists('bbcode_table')){
    function bbcode_table($field='message', $form='post', $allowed=0)
    {
        global $bbbttns_path, $color_desc, $font_desc, $textcolor1, $bbcode_common;
        $content = '';
        if (!defined('BBCODE_JS_ACTIVE')) {
            $content .= '<script language="JavaScript" src="includes/bbcode.js" type="text/javascript"></script>';
            define('BBCODE_JS_ACTIVE', 1);
        }
        $content .= '<table cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td>
            <img alt="'.$bbcode_common['bold'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'b\')" onclick="BBCcode(\''.$form.'\',\''.$field.'\',this)" name="b" src="'.$bbbttns_path.'b.gif" border="0" />
            <img alt="'.$bbcode_common['italic'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'i\')" onclick="BBCcode(\''.$form.'\',\''.$field.'\',this)" name="i" src="'.$bbbttns_path.'i.gif" border="0" />
            <img alt="'.$bbcode_common['underline'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'u\')" onclick="BBCcode(\''.$form.'\',\''.$field.'\',this)" name="u" src="'.$bbbttns_path.'u.gif" border="0" />
    &nbsp;&nbsp;
            <img alt="'.$bbcode_common['ltr'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'ltr\')" onclick="BBCdir(\''.$form.'\',\''.$field.'\',\'ltr\')" name="dirltr" src="'.$bbbttns_path.'ltr.gif" border="0" />
            <img alt="'.$bbcode_common['rtl'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'rtl\')" onclick="BBCdir(\''.$form.'\',\''.$field.'\',\'rtl\')" name="dirrtl" src="'.$bbbttns_path.'rtl.gif" border="0" />
    &nbsp;&nbsp;
            <img alt="'.$bbcode_common['url'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'url\')" onclick="BBCurl(\''.$form.'\',\''.$field.'\')" name="url" src="'.$bbbttns_path.'url.gif" border="0" />
            <img alt="'.$bbcode_common['mail'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'mail\')" onclick="BBCwmi(\''.$form.'\',\''.$field.'\',\'email\')" name="email" src="'.$bbbttns_path.'email.gif" border="0" />';
    if ($allowed) {
            $content .= '
    &nbsp;&nbsp;
            <img alt="'.$bbcode_common['justify'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'justify\')" onclick="BBCode(\''.$form.'\',\''.$field.'\',\'align\',this)" name="justify" src="'.$bbbttns_path.'align_justify.gif" border="0" />
            <img alt="'.$bbcode_common['left'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'left\')" onclick="BBCode(\''.$form.'\',\''.$field.'\',\'align\',this)" name="left" src="'.$bbbttns_path.'align_left.gif" border="0" />
            <img alt="'.$bbcode_common['center'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'center\')" onclick="BBCode(\''.$form.'\',\''.$field.'\',\'align\',this)" name="center" src="'.$bbbttns_path.'align_center.gif" border="0" />
            <img alt="'.$bbcode_common['right'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'right\')" onclick="BBCode(\''.$form.'\',\''.$field.'\',\'align\',this)" name="right" src="'.$bbbttns_path.'align_right.gif" border="0" />';
    }
        $content .= '
    &nbsp;&nbsp;
            <select onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'fc\')" onchange="BBCfc(\''.$form.'\',\''.$field.'\',this)" title="'.$color_desc['color'].'">
                <option class="genmed" value="'.$textcolor1.'" style="color: black; background-color: rgb(250, 250, 250);">'.$color_desc['Default'].'</option>
                <option class="genmed" value="maroon" style="color: maroon; background-color: rgb(250, 250, 250);">'.$color_desc['Dark Red'].'</option>
                <option class="genmed" value="red" style="color: red; background-color: rgb(250, 250, 250);">'.$color_desc['Red'].'</option>
                <option class="genmed" value="orange" style="color: orange; background-color: rgb(250, 250, 250);">'.$color_desc['Orange'].'</option>
                <option class="genmed" value="brown" style="color: brown; background-color: rgb(250, 250, 250);">'.$color_desc['Brown'].'</option>
                <option class="genmed" value="yellow" style="color: yellow; background-color: rgb(250, 250, 250);">'.$color_desc['Yellow'].'</option>
                <option class="genmed" value="green" style="color: green; background-color: rgb(250, 250, 250);">'.$color_desc['Green'].'</option>
                <option class="genmed" value="olive" style="color: olive; background-color: rgb(250, 250, 250);">'.$color_desc['Olive'].'</option>
                <option class="genmed" value="cyan" style="color: cyan; background-color: rgb(250, 250, 250);">'.$color_desc['Cyan'].'</option>
                <option class="genmed" value="blue" style="color: blue; background-color: rgb(250, 250, 250);">'.$color_desc['Blue'].'</option><option class="genmed" value="darkblue" style="color: darkblue; background-color: rgb(250, 250, 250);">'.$color_desc['Dark Blue'].'</option>
                <option class="genmed" value="indigo" style="color: indigo; background-color: rgb(250, 250, 250);">'.$color_desc['Indigo'].'</option>
                <option class="genmed" value="violet" style="color: violet; background-color: rgb(250, 250, 250);">'.$color_desc['Violet'].'</option>
                <option class="genmed" value="white" style="color: white; background-color: rgb(250, 250, 250);">'.$color_desc['White'].'</option>
                <option class="genmed" value="black" style="color: black; background-color: rgb(250, 250, 250);">'.$color_desc['Black'].'</option>
            </select>';
        if ($allowed) {
            $content .= '
        </td>
    </tr><tr>
        <td>
            <img alt="'.$bbcode_common['img'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'img\')" onclick="BBCwmi(\''.$form.'\',\''.$field.'\',\'img\')" name="img" src="'.$bbbttns_path.'img.gif" border="0" />
            <img alt="'.$bbcode_common['flash'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'flash\')" onclick="BBCmm(\''.$form.'\',\''.$field.'\',\'flash\')" name="flash" src="'.$bbbttns_path.'flash.gif" border="0" />
            <img alt="'.$bbcode_common['video'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'video\')" onclick="BBCmm(\''.$form.'\',\''.$field.'\',\'video\')" name="video" src="'.$bbbttns_path.'video.gif" border="0" />
    &nbsp;&nbsp;
            <img alt="'.$bbcode_common['quote'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'quote\')" onclick="BBCcode(\''.$form.'\',\''.$field.'\',this)" name="quote" src="'.$bbbttns_path.'quote.gif" border="0" />
            <img alt="'.$bbcode_common['code'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'code\')" onclick="BBCcode(\''.$form.'\',\''.$field.'\',this)" name="code" src="'.$bbbttns_path.'code.gif" border="0" />
            <img alt="'.$bbcode_common['php'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'php\')" onclick="BBCcode(\''.$form.'\',\''.$field.'\',this)" name="php" src="'.$bbbttns_path.'php.gif" border="0" />
        &nbsp;&nbsp;
            <img alt="'.$bbcode_common['hr'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'hr\')" onclick="BBChr(\''.$form.'\',\''.$field.'\')" name="hr" src="'.$bbbttns_path.'hr.gif" border="0" />
			<img alt="'.$bbcode_common['lytebox'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'lytebox\')" onclick="BBClytebox(\''.$form.'\',\''.$field.'\',\'lytebox\')" name="lytebox" src="'.$bbbttns_path.'lytebox.gif" border="0" />
    &nbsp;&nbsp;
            <img alt="'.$bbcode_common['marqd'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'marqd\')" onclick="BBCode(\''.$form.'\',\''.$field.'\',\'marq\',this)" name="down" src="'.$bbbttns_path.'marq_down.gif" border="0" />
            <img alt="'.$bbcode_common['marqu'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'marqu\')" onclick="BBCode(\''.$form.'\',\''.$field.'\',\'marq\',this)" name="up" src="'.$bbbttns_path.'marq_up.gif" border="0" />
            <img alt="'.$bbcode_common['marql'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'marql\')" onclick="BBCode(\''.$form.'\',\''.$field.'\',\'marq\',this)" name="left" src="'.$bbbttns_path.'marq_left.gif" border="0" />
            <img alt="'.$bbcode_common['marqr'][0].'" class="bbcbutton" onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'marqr\')" onclick="BBCode(\''.$form.'\',\''.$field.'\',\'marq\',this)" name="right" src="'.$bbbttns_path.'marq_right.gif" border="0" />
    &nbsp;&nbsp;
            <select onmouseover="helpline(\''.$form.'\',\''.$field.'\',\'fs\')" onchange="BBCfs(\''.$form.'\',\''.$field.'\',this)" title="'.get_codelang('size', $font_desc).'">
            <option value="7" class="genmed">'.get_codelang('Tiny', $font_desc).'</option>
            <option value="9" class="genmed">'.get_codelang('Small', $font_desc).'</option>
            <option value="12" class="genmed" selected="selected">'.get_codelang('Normal', $font_desc).'</option>
            <option value="18" class="genmed">'.get_codelang('Large', $font_desc).'</option>
            <option  value="24" class="genmed">'.get_codelang('Huge', $font_desc).'</option>
            </select>';
        }
        $content .= '
        </td>
    </tr><tr>
        <td>
            <input type="text" name="help'.$field.'" size="66" maxlength="100" value="Tip: Styles can be applied quickly to selected text" class="helpline" />
        </td>
      </tr>
    </table>';

        return $content;
    }
}

function get_smilies() {
   global $db, $prefix, $cache;
   static $smilies;
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
    if(($smilies = $cache->load('smilies', 'config')) === false) {
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
        $smilies = $db->sql_ufetchrowset('SELECT * FROM '.$prefix.'_bbsmilies');
        if(count($smilies))
        {
            usort($smilies, 'sort_smiley');
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
            $cache->save('smilies', 'config', $smilies);
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
        }
    }
    return $smilies;
}

function set_smilies($message, $url='') {
    static $orig, $repl;
    if (!isset($orig)) {
        global $smilies_path, $smilies_desc, $nukeurl;
        $orig = $repl = array();
        $smilies = get_smilies();
        $url = (empty($url)) ? $nukeurl : $url;
        if (!empty($url) && substr($url, -1) != '/') { $url .= '/'; }
        for ($i = 0; $i < count($smilies); $i++) {
            $smilies[$i]['code'] = str_replace('#', '\#', preg_quote($smilies[$i]['code']));
            $orig[] = "#([\s])".$smilies[$i]['code']."([\s<])#si";
            $repl[] = '\\1<img src="' . $url . $smilies_path . $smilies[$i]['smile_url'] . '" alt="'.get_codelang($smilies[$i]['emoticon'],$smilies_desc).'" title="'.get_codelang($smilies[$i]['emoticon'],$smilies_desc).'" border="0" />\\2';
        }
    }
    if (count($orig)) {
        $message = preg_replace($orig, $repl, " $message ");
        $message = substr($message, 1, -1);
    }
    return $message;
}

function sort_smiley($a, $b)
{
    if (strlen($a['code']) == strlen($b['code'])) { return 0; }
    return (strlen($a['code']) > strlen($b['code'])) ? -1 : 1;
}

# bbencode_first_pass() prepare bbcode for db insert
function encode_bbcode($text)
{
    return BBCode::encode($text);
}
function decode_bb_all($text, $allowed=0, $allow_html=false, $url='') {
    return set_smilies(decode_bbcode($text, $allowed, $allow_html), $url);
}
function decode_bbcode($text, $allowed=0, $allow_html=false)
{
    return BBCode::decode($text, $allowed, $allow_html);
}

function shrink_url($url) {
    $url = preg_replace("#(^[\w]+?://)#", '', $url);
    return (strlen($url) > 35) ? substr($url,0,22).'...'.substr($url,-10) : $url;
}

function makeclickable($text)
{
    $ret = ' ' . $text;
    $ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t<]*)#ise", "'\\1<a href=\"\\2\" rel=\"nofollow\" title=\"\\2\" target=\"_blank\">'.shrink_url('\\2').'</a>'", $ret);
    $ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r<]*)#ise", "'\\1<a href=\"http://\\2\" rel=\"nofollow\" target=\"_blank\" title=\"\\2\">'.shrink_url('\\2').'</a>'", $ret);
    $ret = preg_replace("#(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1 \\2 &#64; \\3", $ret);
    $ret = substr($ret, 1);
    return($ret);
}

function htmlprepare($str, $nl2br=false, $spchar=ENT_QUOTES, $nohtml=false) {
    if ($nohtml) { $str = strip_tags($str, $nohtml); } # $nohtml : <a><br><strong><i><img><li><ol><p><strong><u><ul>
    $str = htmlspecialchars($str,$spchar,'utf-8'); # htmlentities sucks cos it converts all chars
    if ($nl2br) { $str = nl2br($str); }
    return trim($str);
}

function htmlunprepare($str, $nl2br=false) {
    $unhtml_specialchars_match = array('#&gt;#', '#&lt;#', '#&quot;#', '#&\#039;#', '#&amp;#');
    $unhtml_specialchars_replace = array('>', '<', '"', '\'', '&');
    if ($nl2br) {
        $unhtml_specialchars_match[] = "#<br />\n#";
        $unhtml_specialchars_replace[] = "\n";
    }
    return preg_replace($unhtml_specialchars_match, $unhtml_specialchars_replace, $str);
}

function html2bb($text) {
    $text = preg_replace('/</', ' <', $text);
    $text = preg_replace('/<ol type="([a1])">/si', '/\[list=\\1\]', $text);
    $text = preg_replace('/<(b|u|i|hr)>/sie', "'['.strtolower(\\1).']'", $text);
    $text = preg_replace('/<\/(b|u|i|hr)>/sie', "'[/'.strtolower(\\1).']'", $text);
    $text = preg_replace('#<img(.*?)src="(.*?)\.(gif|png|jpg|jpeg)"(.*?)>#si', '[img]\\2.\\3[/img]', $text);
    $text = str_replace('<ul>', '[list]', $text);
    $text = str_replace('<li>', '[*]', $text);
    $text = str_replace('</ul>', '[/list:u]', $text);
    $text = str_replace('</ol>', '[/list:o]', $text);
    $text = strip_tags($text, '<br><p><strong>');
    return trim($text);
}

# prepare_message(
function message_prepare($message, $html_on, $bbcode_on)
{
    global $board_config;
    #
    # Clean up the message
    #
    $message = trim($message);
    if ($html_on) {
        $allowed_html_tags = split(',', $board_config['allow_html_tags']);
        $end_html = 0;
        $start_html = 1;
        $tmp_message = '';
        $message = ' ' . $message . ' ';
        while ($start_html = strpos($message, '<', $start_html)) {
            $tmp_message .= BBCode::encode_html(substr($message, $end_html + 1, ($start_html - $end_html - 1)));
            if ($end_html = strpos($message, '>', $start_html)) {
                $length = $end_html - $start_html + 1;
                $hold_string = substr($message, $start_html, $length);
                if (($unclosed_open = strrpos(' ' . $hold_string, '<')) != 1) {
                    $tmp_message .= BBCode::encode_html(substr($hold_string, 0, $unclosed_open - 1));
                    $hold_string = substr($hold_string, $unclosed_open - 1);
                }
                $tagallowed = false;
                for ($i = 0; $i < count($allowed_html_tags); $i++) {
                    $match_tag = trim($allowed_html_tags[$i]);
                    if (preg_match('#^<\/?' . $match_tag . '[> ]#i', $hold_string)) {
                        $tagallowed = (preg_match('#^<\/?' . $match_tag . ' .*?(style[ ]*?=|on[\w]+[ ]*?=)#i', $hold_string)) ? false : true;
                    }
                }
                $tmp_message .= ($length && !$tagallowed) ? BBCode::encode_html($hold_string) : $hold_string;
                $start_html += $length;
            } else {
                $tmp_message .= BBCode::encode_html(substr($message, $start_html));
                $start_html = strlen($message);
                $end_html = $start_html;
            }
        }
        if ($end_html != strlen($message) && $tmp_message != '') {
            $tmp_message .= BBCode::encode_html(substr($message, $end_html + 1));
        }
        $message = ($tmp_message != '') ? trim($tmp_message) : trim($message);
    } else {
        $message = BBCode::encode_html($message);
    }
    if ($bbcode_on) {
        $message = BBCode::encode($message);
    }
    return $message;
}

?>