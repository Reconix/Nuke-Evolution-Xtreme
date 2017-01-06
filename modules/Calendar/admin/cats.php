<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: cats.php,v 20.14 2004/04/23 01:43:34 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : cats.php
   Author        : See below
   Improved by   : LombudXa (Rodmar) (www.evolved-Systems.net)
   Version       : 1.4.0c (Based on KalenderMx 1.4b)
   Date          : 06/18/2005 (mm-dd-yyyy)

   Description   : Enhanced Calendar module with a lot of nice
                   features.
                   New Abstraction Layer and Nuke 7.6 Administration
                   System.
************************************************************************/

/************************************************************************/
/* KalenderMx v1.4                                                      */
/* ===================                                                  */
/*  Calendar Module for vkpMx 2.x / pragmaMx & phpNuke 5.5-7.6          */
/*  Copyright (c) 2004 by A.Ellsel (kalender@pragmamx.org)              */
/*  http://www.pragmamx.org & http://www.shiba-design.de                */
/* -------------------------------------------------------------------- */
/* KalenderMx is based on EventCalendar 2.0                             */
/*  Copyright (c) 2001 Originally by Rob Sutton                         */
/*  http://smart.xnettech.net (Nuke Site)                               */
/*  Development continued by Aleks A.-Lessmann                          */
/* Included some ideas and changes by:                                  */
/*  flobee, bulli-frank, kicks, kochloeffel, FrankySz, Jubilee          */
/* -------------------------------------------------------------------- */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 or a newer version.   */
/************************************************************************/

if (!defined('CAL_MODULE_NAME')) {
    die ("Illegal File Access");
}

global $file_mode, $admin_file;

define('_CAL_ADM_SETCOLLINK',$admin_file.'.php?op=CalSetcols');

#error_reporting(E_ALL);
#########################################################################################
if (!isset($calconf)) { 
    include(CAL_MODULE_PATH.'config/config.php');
}
include_once(CAL_MODULE_PATH.'includes/functions.php');
get_lang(CAL_MODULE_NAME);
if ((!calIsAdmin()) || (!defined('ADMIN_FILE'))) {
    $op = "errNoAuthorized";
}

#########################################################################################
function CalSavecols() {
     
	global $file_mode;

    #mxDebugFuncVars($_POST);
    $setfile = CAL_MODULE_PATH.'categories/'.$_POST['x_trs_lng'].'.php';

    $newcols = "";
    foreach($_POST['setcol'] as $i => $caption) {
        $newcols .= "\$caldotcolor[".$i."] = \"".trim(htmlentities($caption, ENT_QUOTES))."\";\n";
    }

    $content = "<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/\n\n";
    $content .= "// write with: \$Id: cats.php,v 20.14 2004/04/23 01:43:34 EllselAn Exp $\n\n";
    $content .= "/************************************************************************\n";
    $content .= "   Nuke-Evolution: KalenderMx Port\n";
    $content .= "   ============================================\n";
    $content .= "   Copyright (c) 2005 by The Nuke-Evolution Team\n\n";
    $content .= "   Filename      : Generated with cats.php\n";
    $content .= "   Author        : See below\n";
    $content .= "   Improved by   : LombudXa (Rodmar) (www.evolved-Systems.net)\n";
    $content .= "   Version       : 1.4.0c (Based on KalenderMx 1.4b)\n";
    $content .= "   Date          : 06/18/2005 (mm-dd-yyyy)\n\n";
    $content .= "   Description   : Enhanced Calendar module with a lot of nice\n";
    $content .= "                   features.\n";
    $content .= "                   New Abstraction Layer and Nuke 7.6 Administration\n";
    $content .= "                   System.\n";
    $content .= "************************************************************************/\n\n";
    $content .= "/************************************************************************/\n";
    $content .= "/* CalendarMx v".substr(CAL_VERSION.str_repeat(' ',10),0,10)."                                               */\n";
    $content .= "/* ===================                                                  */\n";
    $content .= "/*  Calendar Module for vkpMx 2.x / pragmaMx & phpNuke 5.5-7.6          */\n";
    $content .= "/*  Copyright (c) 2004 by A.Ellsel (kalender@pragmamx.org)              */\n";
    $content .= "/*  http://www.pragmamx.org & http://www.shiba-design.de                */\n";
    $content .= "/************************************************************************/\n\n";
    $content .= "/// description of event dots color\n";
    $content .= "/// language: ".$_POST['x_trs_lng']."\n";
    $content .= "\n".$newcols."\n?>";

    #mxDebugFuncVars($content);    #exit;
    $ok = 1;
    @chmod($setfile, $file_mode);
    if (!mxDemoMode()) {
        $file = @fopen($setfile, "w");
        if ($file) {
            $ok = @fwrite($file, $content);
            @fclose($file);
            $ok = (int)$ok + 1;
        }
        @chmod($setfile, $file_mode);
    }
    $msg = ($ok>1) ? _CALCONF2 : _CALCONF1;
    #mxDebugFuncVars($msg, $ok);
    #exit;
    calRedirect(_CAL_ADM_SETCOLLINK.'&amp;trs_lng='.$_REQUEST['trs_lng'].'&amp;src_lng='.$_REQUEST['src_lng'].'&amp;ok='.$ok, $msg, 2);
}

#########################################################################################
function CalSetcols() {
    global $bgcolor1, $bgcolor2, $bgcolor3;
    $color_src = calgetlangsrc($_REQUEST['src_lng']);
    $color_trs = calgetlangsrc($_REQUEST['trs_lng']);
    $ok = (isset($_REQUEST['ok'])) ? $_REQUEST['ok'] : 0;
    if ($ok == 1) {
        $statmsg = _CALCONF3.' '.CAL_MODULE_PATH.'categories/'.$_REQUEST['trs_lng'].'.php '._CALCONF4;
    } else if ($ok > 1) {
        $statmsg = _CALCONF2;
    }

    #mxDebugFuncVars($_REQUEST);
    $handle = @opendir(CAL_IMAGE_PATH."colors");
    if (!$handle) return;
    while ($file = readdir($handle)) {
        if (preg_match("/^ball_(.+)\.gif$/", $file, $matches)) {
            $imglist[(int)$matches[1]] = $matches[1]."&nbsp;<img src=".CAL_MODULE_PATH."images/colors/".$file." alt=".$matches[1]." width='14' height='14' border='0'>";
        }
    }
    closedir($handle);
    ksort($imglist);
    #mxDebugFuncVars($imglist);

    $GLOBALS['pagetitle']=_CALCATEGORIESADMIN;
    include_once(NUKE_BASE_DIR.'header.php');
    calAdminMenu(_CALCATEGORIESADMIN);
    OpenTable();

    $content = "";
    foreach($imglist as $i => $imgtag) {
        $ctrs = (isset($color_trs[$i])) ? stripslashes($color_trs[$i]) : "";
        $csrc = (isset($color_src[$i])) ? '&nbsp;'.stripslashes($color_src[$i]) : "";
        $csrc = (empty($csrc) && !empty($ctrs)) ? "&nbsp;&nbsp;??" : $csrc;
        $content .= "<tr style='background-color: $bgcolor2;'>
        <td width='10%' align='center' nowrap><span class=\"content\">".$imgtag."&nbsp;</span></td>
        <td width='40%' nowrap><span class=\"content\"><strong>".$csrc."</strong>&nbsp;</span></td>
        <td width='50%' style='background-color: $bgcolor1;'><input type='text' name='setcol[".$i."]' value='".$ctrs."' size='40' maxlength='50'></td>
        </tr>";
    }

    if (isset($statmsg)) {
        OpenTable2();
        echo "<blockquote><span class=\"title\"><strong>$statmsg</strong></span></blockquote>";
        CloseTable2();
        echo "<br />";
    }

    echo "
    <form action='"._CAL_ADM_SETCOLLINK."&amp;trs_lng=".$_REQUEST['trs_lng']."&amp;src_lng=".$_REQUEST['src_lng']."' method='post'>
    <input type='hidden' name='x_trs_lng' value='".$_REQUEST['trs_lng']."'>
    <input type='hidden' name='op' value='CalSavecols'>
    <table width='90%' border='0' cellspacing='1' cellpadding='2' align='center' style='background-color: $bgcolor3;'>
    <tr style='background-color: $bgcolor2;'><th colspan='3'><span class=\"title\">"._CALCATEGORIESLANG."</span></th></tr>
    <tr style='background-color: $bgcolor2;'>
        <td width='50%' align='center' colspan='2'>".calgetlanglist('src')."</td>
        <td width='50%' align='center' style='background-color: $bgcolor1;'>".calgetlanglist('trs')."</td>
    </tr>
    </table><br />
    <table width='90%' border='0' cellspacing='1' cellpadding='2' align='center' style='background-color: $bgcolor3;'>
    <tr>
        <th width='50%' colspan='2' style='background-color: $bgcolor2;'><span class=\"option\">"._CALSOURCE.":&nbsp;<img src='images/language/flag-".$_REQUEST['src_lng'].".png' alt='' width='30' height='16' border='0'>&nbsp;".$_REQUEST['src_lng']."</span></th>
        <th width='50%' colspan='2' style='background-color: $bgcolor1;'><span class=\"option\">"._CALGOAL.":&nbsp;<img src='images/language/flag-".$_REQUEST['trs_lng'].".png' alt='' width='30' height='16' border='0'>&nbsp;".$_REQUEST['trs_lng']."</span></th>
    </tr>
    ".$content."
    <tr style='background-color: $bgcolor2;'><td colspan='2'>&nbsp;</td><td align='center' style='background-color: $bgcolor1;'><input type='submit' value='"._CALSAVESETT."'></td></tr>
    </table>
    </form>
    ";
    CloseTable();
    #echo "<br />";
    include_once(NUKE_BASE_DIR.'footer.php');
    }

#########################################################################################
function calgetlangsrc($lang) {
    $ok =    @include(CAL_MODULE_PATH.'categories/'.$lang.'.php');
    if ($ok) return $caldotcolor;
    return array();
    }

#########################################################################################
function calgetlanglist($mode) {
    static $linklist;
    if (!isset($linklist)) {
        $handle = @opendir('language');
        if (!$handle) return;
        while ($file = readdir($handle)) {
            if (preg_match("#^lang\-(.+)\.php$#", $file, $matches)) {
                $linklist[$matches[1]] = ucwords(str_replace("_"," ", str_replace("german","deutsch", $matches[1])));
                }
            }
        closedir($handle);
        ksort($linklist);
        }
    $content = "";
    $pre = "border=\"0\" hspace=\"3\" vspace=\"3\"";
    foreach($linklist as $langu => $alt) {
        $to = ($mode=='src') ? "src_lng=".$langu."&amp;trs_lng=".$_REQUEST['trs_lng']."" : "trs_lng=".$langu."&amp;src_lng=".$_REQUEST['src_lng']."";
        $content .= "<a href='"._CAL_ADM_SETCOLLINK."&amp;".$to."' title='".$alt."'><img src='images/language/flag-".$langu.".png' alt='".$langu."' width='30' height='16' border='0'></a> ";
        }
    return $content;
    }

#########################################################################################

$_REQUEST['src_lng'] = (isset($_REQUEST['src_lng'])) ? $_REQUEST['src_lng'] : $GLOBALS['currentlang'];
$_REQUEST['trs_lng'] = (isset($_REQUEST['trs_lng'])) ? $_REQUEST['trs_lng'] : $GLOBALS['language'];

$op = (isset($_REQUEST['op'])) ? $_REQUEST['op'] : "CalSetcols";
switch($op) {
    case "CalSavecols":
        CalSavecols($op);
        exit;
    case "CalSetcols":
        CalSetcols();
        exit;
    default:
        CalSetcols();
        exit;
    }

?>