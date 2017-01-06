<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: functions.php,v 20.31 2004/08/23 14:49:35 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : functions.php
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

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       10/01/2005
-=[Mod]=-
      Advanced Username Color                  v1.0.5       01/31/2006
 ************************************************************************/

if (!defined('CAL_MODULE_NAME')) {
    die ("Illegal File Access");
}

#########################################################################################
// Table & module name definitions
define('CAL_TABLE_EVENTS',$GLOBALS['prefix'].'_events');
define('CAL_TABLE_MX_TOPICS',$GLOBALS['prefix'].'_topics');
define('CAL_TABLE_MX_QUEUE',$GLOBALS['prefix'].'_queue');
define('CAL_TABLE_MX_AUTHORS',$GLOBALS['prefix'].'_authors');
define('CAL_TABLE_MX_USERS',$GLOBALS['user_prefix'].'_users');

// Further module definitions
define('CAL_VERSION','1.4');
define('CAL_MODULE_LINK','modules.php?name='.CAL_MODULE_NAME);
define('CAL_IMAGE_PATH',CAL_MODULE_PATH.'images/');
define('CAL_CMS_VERSION',calDetectVersion());

#########################################################################################
function calDetectVersion() {
    static $version;
    if (isset($version)) return $version;
    if (defined('MX_VERSION')) {
        $version = "mx";
    } else {
        global $db;
        $result = $db->sql_query("SHOW COLUMNS FROM `".CAL_TABLE_MX_USERS."`");
        while (list($fieldname) = $db->sql_fetchrow($result)) {
            $fields[$fieldname] = 1;
        }
        if (isset($fields['uid']) && isset($fields['uname']) && isset($fields['email'])) {
            $version = "55";
        } else {
            $version = "65";
        }
    }
    return $version;
}

#########################################################################################
switch(CAL_CMS_VERSION) {
    case "mx";
        define("CAL_MOD_USERINFO","modules.php?name=Userinfo&amp;uname=");
        define("CAL_MOD_TOPICSEARCH","modules.php?name=News&amp;new_topic=");
        break;
    case "55";
        define("CAL_MOD_USERINFO","modules.php?name=Your_Account&amp;op=userinfo&amp;uname=");
        define("CAL_MOD_TOPICSEARCH","modules.php?name=Search&amp;topic=");
        break;
    case "65";
        define("CAL_MOD_USERINFO","modules.php?name=Your_Account&amp;op=userinfo&amp;username=");
        define("CAL_MOD_TOPICSEARCH","modules.php?name=Search&amp;topic=");
        break;
}
define("CAL_MOD_USERLOGIN","modules.php?name=Your_Account");

#########################################################################################
function calGetEventDates($event){
    setlocale (LC_TIME, _CALLOCALE);
    #mxDebugFuncVars('INPUT:',$event);
    // -------------- Start Times --------------------------------------------------------
    if (empty($event['startTime'])) { $event['startTime'] = '00:00:00'; }
    if (empty($event['startAmPm'])) { $event['startAmPm'] = 0; }
    if (isset($event['fromform'])) { // from POST
        $event['startYear'] = ($event['startYear']<1970) ? 1970 : $event['startYear'];
        $event['startDate'] = sprintf ("%04d-%02d-%02d", $event['startYear'], $event['startMonth'], $event['startDay']);
        $event['startHour'] = ($event['startHour']!=12) ? $event['startHour']+$event['startAmPm'] : $event['startHour'];
        $event['startTime'] = sprintf ("%02d:%02d:00", $event['startHour'], $event['startMin']);
        $event['startTimestamp'] = @mktime($event['startHour'], $event['startMin'], 0, $event['startMonth'], $event['startDay'], $event['startYear']);
    } else { // from DB
        $sqldate = $event['startDate'].' '.$event['startTime'];
        preg_match("/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})/", $sqldate, $x);
        $event['startHour']  = $x[4];
        $event['startMin']   = $x[5];
        $event['startMonth'] = $x[2];
        $event['startDay']   = $x[3];
        $event['startYear']  = ($x[1]<1970) ? 1970 : $x[1];
        $event['startTimestamp'] = @mktime($event['startHour'],$event['startMin'],0,$event['startMonth'],$event['startDay'],$event['startYear']);
        $event['startAmPm']=0;
    }
    $event['startDateShort']    = strftime(_CALSHORTDATEFORMAT, $event['startTimestamp']);
    $event['startDateLong']     = strftime(_CALLONGDATEFORMAT, $event['startTimestamp']);
    $event['startTimeFormat']   = strftime(_CALTIMEFORMAT, $event['startTimestamp']);
    $event['startDateListLink'] = "m=".$event['startMonth']."&amp;d=".$event['startDay']."&amp;y=".$event['startYear']."";

    // -------------- End Times --------------------------------------------------------
    if (empty($event['endTime'])) { $event['endTime'] = '00:00:00'; }
    if (empty($event['endAmPm'])) { $event['endAmPm'] = 0; }
    if (isset($event['fromform'])) { // from POST
        $event['endYear'] = ($event['endYear']<1970) ? 1970 : $event['endYear'];
        $event['endDate'] = sprintf ("%04d-%02d-%02d", $event['endYear'], $event['endMonth'], $event['endDay']);
        $event['endHour'] = ($event['endHour']!=12) ? $event['endHour']+$event['endAmPm'] : $event['endHour'];
        $event['endTime'] = sprintf ("%02d:%02d:00", $event['endHour'], $event['endMin']);
        $event['endTimestamp'] = @mktime($event['endHour'], $event['endMin'], 0, $event['endMonth'], $event['endDay'], $event['endYear']);
    } else { // from DB
        $sqldate = $event['endDate'].' '.$event['endTime'];
        preg_match("/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})/", $sqldate, $x);
        $event['endHour']  = $x[4];
        $event['endMin']   = $x[5];
        $event['endMonth'] = $x[2];
        $event['endDay']   = $x[3];
        $event['endYear']  = ($x[1]<1970) ? 1970 : $x[1];
        $event['endTimestamp'] = @mktime($event['endHour'],$event['endMin'],0,$event['endMonth'],$event['endDay'],$event['endYear']);
        $event['endAmPm']=0;
    }
    $event['endDateShort']    = strftime(_CALSHORTDATEFORMAT, $event['endTimestamp']);
    $event['endDateLong']     = strftime(_CALLONGDATEFORMAT, $event['endTimestamp']);
    $event['endTimeFormat']   = strftime(_CALTIMEFORMAT, $event['endTimestamp']);
    $event['endDateListLink'] = "m=".$event['endMonth']."&amp;d=".$event['endDay']."&amp;y=".$event['endYear']."";

    // -------------- Posting Times --------------------------------------------------------
    if (empty($event['posteddate'])){
        $event['posteddate'] = sprintf ("%04d-%02d-%02d %02d:%02d:00", Date("Y"), Date("m"), Date("d"), Date("H"), Date("i"));
        $event['postDateShort'] = strftime(_CALSHORTDATEFORMAT, time());
    } else {
        preg_match("/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})/", $event['posteddate'], $x);
        $event['postDateShort'] = strftime(_CALSHORTDATEFORMAT, @mktime($x[4],$x[5],0,$x[2],$x[3],$x[1]));
    }

    // -------------- debug & end --------------------------------------------------------
    #ksort($event);
    #mxDebugFuncVars('CONVERTED:',$event);
    #exit;
    // end debug
    setlocale (LC_TIME, $GLOBALS['locale']);
    return $event;
}

#########################################################################################
function calEventView($event) {
    global $calconf, $db, $admin_file;
    global $bgcolor1,$bgcolor2,$bgcolor3,$textcolor1,$textcolor2;
    $eventsdates = calGetEventDates($event);
    $event = array_merge($event,$eventsdates);

    if (!empty($calconf['showlinks'])) {
    $event['startDateLong']="<a href=\"".CAL_MODULE_LINK."&amp;op=day&".$event['startDateListLink']."\">".$event['startDateLong']."</a>";
        $event['endDateLong']="<a href=\"".CAL_MODULE_LINK."&amp;op=day&".$event['endDateListLink']."\">".$event['endDateLong']."</a>";
    }

    $event['informant']   = (empty($event['informant'])) ? $GLOBALS['anonymous'] : $event['informant'];
    $event['alldayevent'] = (empty($event['alldayevent'])) ? 0 : 1;
    $event['categorie'] = calGetCurrentEventPoint($event['categorie']);
    $categoriealt = calGetBarColorAlt($event['categorie']);
    $event['title'] = strip_tags($event['title']);
    if (empty($event['title'])) {$event['title'] = "<img src=\"".CAL_IMAGE_PATH."caution.gif\" alt=\"\" width=\"10\" height=\"21\" border=\"0\" align=\"middle\" vspace=\"5\" hspace=\"5\"> "._CALNOSUBJECT."";}
    $event['hometext'] = nl2br(strip_tags($event['hometext'],calGetAllowedtags()));
    $event['hometext'] = (empty($event['hometext'])) ? $event['title'] : $event['hometext'];
    if ($calconf['usetopics'] > 0) {
        if (empty($event['topic'])) {
            if (calIsAdmin()) {
                if ($event['eid']){
                    $topicimage="<a href=\"".$admin_file.".php?op=CalendarEditEvent&eid=".$event['eid']."\"><img src=\"".$GLOBALS['tipath']."AllTopics.gif\" border=\"0\"><br /><span class='tiny'><img src=\"".CAL_IMAGE_PATH."caution.gif\" alt=\"\" width=\"10\" height=\"21\" border=\"0\" align=\"middle\" vspace=\"5\" hspace=\"5\">"._CALSELECTTOPIC."!</span></a>";
                } else {
                    $topicimage="<img src=\"".$GLOBALS['tipath']."AllTopics.gif\" border=\"0\"><br /><span class='tiny'><img src=\"".CAL_IMAGE_PATH."caution.gif\" alt=\"\" width=\"10\" height=\"21\" border=\"0\" align=\"middle\" vspace=\"5\" hspace=\"5\">"._CALSELECTTOPIC."</span>";
                }
            } else {
                $topicimage="<img src=\"".CAL_IMAGE_PATH."calendar.gif\" width=\"32\" height=\"32\" border=\"0\">";
            }
        } else {
          $result = $db->sql_query("SELECT topicimage, topictext from ".CAL_TABLE_MX_TOPICS." WHERE topicid=".$event['topic']."");
          list($topicimage, $topictext) = $db->sql_fetchrow($result);
                    $topicimage ="<a href=\"".CAL_MOD_TOPICSEARCH.$event['topic']."\"><img src=\"".$GLOBALS['tipath']."".$topicimage."\" border=\"0\" alt=\"".strip_tags($topictext)."\" title=\"".strip_tags($topictext)."\"></a>";
        }
    } else {
        $topicimage ="<img src=\"".CAL_IMAGE_PATH."calendar.gif\" width=\"32\" height=\"32\" border=\"0\">";
    }
    $colspan = ($event['alldayevent']) ? "colspan=\"3\"" : "";
    $rowspan = ($event['startTimestamp'] == $event['endTimestamp']) ? "rowspan=\"2\"" : "";

    OpenTable();
    echo "<center>";
    echo "<table width=\"90%\" border=\"0\" cellspacing=\"1\" cellpadding=\"4\" style=\"background-color: $bgcolor3;\">\n";
    echo "<tr valign=\"top\"><td align=\"center\" colspan=\"5\" style=\"background-color: $bgcolor2;\"><br /><span class=\"title\">".$event['title']."</span><br /><br /></td></tr>";
    echo "<tr valign=\"top\">";
    echo "<td nowrap style=\"background-color: $bgcolor2;\" $rowspan><span class=\"content\"><strong>"._CALEVENTDATETEXT."</strong>:</span></td>";
    echo "<td nowrap style=\"background-color: $bgcolor1;\" $colspan $rowspan><span class=\"content\">".$event['startDateLong']."</span></td>";
    if (!$event['alldayevent']) {
        echo "<td nowrap style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>"._CALSTARTTIME."</strong>:</span></td>";
        echo "<td style=\"background-color: $bgcolor1;\"><span class=\"content\">".$event['startTimeFormat']."</span></td>";
    }
    echo "<td rowspan=\"4\" valign=\"top\" align=\"center\" style=\"background-color: $bgcolor2;\">$topicimage</td></tr>";
    echo "<tr valign=\"top\">";
    if ($event['startTimestamp'] != $event['endTimestamp']) {
        echo "<td style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>"._CALENDDATEPREVIEW."</strong>:</span></td>";
        echo "<td nowrap style=\"background-color: $bgcolor1;\" $colspan><span class=\"content\">".$event['endDateLong']."</span></td>";
    }
    if (!$event['alldayevent']) {
        echo "<td nowrap style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>"._CALENDTIME."</strong>:</span></td>";
        echo "<td style=\"background-color: $bgcolor1;\"><span class=\"content\">".$event['endTimeFormat']."</span></td>";
    }
    echo "</tr>";
    echo "<tr valign=\"top\"><td style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>"._CALBARCOLORTEXT."</strong>:</span></td><td colspan=\"3\" style=\"background-color: $bgcolor1;\"><span class=\"content\"><img src=\"".calGetBarImage("ball", $event['categorie'])."\" align=\"middle\" alt=\"$categoriealt\" title=\"$categoriealt\">&nbsp;&nbsp;&nbsp;<a href=\"".CAL_MODULE_LINK."&amp;op=list&".$event['startDateListLink']."&amp;col=".$event['categorie']."\">$categoriealt</a></span></td></tr>";
    echo "<tr valign=\"top\"><td style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>"._CALARTICLETEXT."</strong>:</span></td><td colspan=\"3\" style=\"background-color: $bgcolor1;\"><span class=\"content\">".$event['hometext']."</span></td></tr>";

    echo "<tr valign=\"top\"><td nowrap colspan=\"5\" align=\"center\" style=\"background-color: $bgcolor2;\"><span class=\"tiny\">";
    if (!empty($calconf['showlinks']) && $event['informant']!=$GLOBALS['anonymous']){
/*****[BEGIN]******************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
        echo ""._CALPOSTEDBY." <a href=\"".CAL_MOD_USERINFO.$event['informant']."\"><span class=\"tiny\">".UsernameColor($event['informant'])."</span></a> "._CALPOSTEDON." ".$event['postDateShort']." ";
/*****[END]********************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
    }
    else{
/*****[BEGIN]******************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
        echo ""._CALPOSTEDBY." ".UsernameColor($event['informant'])." "._CALPOSTEDON." ".$event['postDateShort']." ";
/*****[END]********************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
    }
    if ($event['aid'] != $event['informant'] && $event['aid']) {
/*****[BEGIN]******************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
        echo ""._CALACCEPTEDBY." ".UsernameColor($event['aid'])."";
/*****[END]********************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
    }
    echo "</span>";
    echo "</td></tr>";
    echo "</table></center>";
    CloseTable();
    echo "<br />";
}

#########################################################################################
function calCheckEventData($event){
    global $calconf;
    if (empty($event['title'])) {
      $msg[1] = _CALVALIDSUBJECT.' (1)';                         // The field 'Subject' is necessary.
    }
    if (!checkdate($event['startMonth'], $event['startDay'], $event['startYear'])) {
        $msg[2] = _CALVALIDEVENTDATE.' (2)';                     // The 'End Date' has got a valid entry.
    }
    if (!checkdate($event['endMonth'], $event['endDay'], $event['endYear'])) {
      $msg[3] = _CALVALIDENDDATE.' (3)';                         // The 'End Date' has got an invalid entry.
    }
    if (($event['startTimestamp'] > $event['endTimestamp']) && !$event['alldayevent']) {
      $msg[4] = _CALVALIDDATES.' (4)';                           // The 'End Date' has to be equal or before the 'Event Date'.
    }
    if ((@mktime(00, 00, 00, $event['startMonth'], $event['startDay'], $event['startYear']) > @mktime(00, 00, 00, $event['endMonth'], $event['endDay'], $event['endYear'])) && $event['alldayevent']) {
      #print '<br />start: '.mktime(00, 00, 00, $event['startMonth'], $event['startDay'], $event['startYear']);
        #print '<br />ende: '.mktime(00, 00, 00, $event['endMonth'], $event['endDay'], $event['endYear']);
        #print '<br />';
        $msg[5] = _CALVALIDDATES.' (5)';                         // The 'End Date' has to be equal or after the 'Event Date'.
    }
    if ($calconf['usetopics']>1 && empty($event['topic'])) {
      $msg[6] = _CALVALIDTOPIC.' (6)';                           // PLEASE CHOOSE A CATEGORY!
    }
    $outmsg = "";
    if (isset($msg)) {
        $outmsg = implode("<br />",$msg);
    }
    #mxDebugFuncVars('calCheckEventData', $outmsg, $event);
    #exit;
    return $outmsg;
}

#########################################################################################
function calGetAllowedtags($entities=0) {
    global $calconf;
    $allowedtags="";
    foreach($calconf['AllowableHTML'] as $varname => $val) {
        $allowedtags .= ($entities) ? "&nbsp;&lt;$val&gt;" : "<$val>";
    }
    return $allowedtags;
}

#########################################################################################
function calBuildModusselectors($op, $tag, $monat, $jahr) {
    global $index, $calconf, $col, $admin_file;
    if (calIsPrintView()) return;
    if (count($_GET)) {
        foreach ($_GET as $key => $value) {
            $parts[$key] = $key."=".$value;
        }
    }
    $parts['name'] = 'name='.CAL_MODULE_NAME;
    $printerlink = "modules.php?".implode("&amp;",$parts);
    $printerlink .= "&amp;cprint=1";
    $reqfile = (isset($_REQUEST['file'])) ? $_REQUEST['file'] : "";
    $op = (empty($op)) ? $calconf['defaultview'] : $op;

    OpenTable();
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">
    <tr><td colspan=\"2\"><span class=\"content\"><a name=\"caltop\">&nbsp;</a><strong>"._CALJUMPTOTEXT."</strong>:</span></td>";
    $nextcolspan = 2;
    if (!$index){
        echo "<td width=\"10%\" rowspan=\"2\"><a href=\"".CAL_MODULE_LINK."&amp;op=".$calconf['defaultview']."\"><img  src=\"".CAL_IMAGE_PATH."calendar.png\" width=\"35\" height=\"35\" border=\"0\" alt=\""._CALLISTLINK."\" title=\""._CALLISTLINK."\"></a></td>\n";
        $nextcolspan = 3;
    }
    echo "</tr><tr>
    <td width=\"30%\" nowrap>
    <form action=\"modules.php\" method=\"GET\" name=\"jump\" style=\"margin-bottom: 0px;\">&nbsp;";
    if (_CALINTERNATIONALDATES) {
        echo calBuiltDaySelect("d",$tag);
        echo calBuiltMonthSelect("m",$monat);
        echo calBuiltYearSelect("y",$jahr);
    } else {
        echo calBuiltMonthSelect("m",$monat);
        echo calBuiltDaySelect("d",$tag);
        echo calBuiltYearSelect("y",$jahr);
    }
    echo "&nbsp;<select name=\"op\" onChange=\"location.href='".CAL_MODULE_LINK."&amp;op=' + document.jump.op.options[document.jump.op.options.selectedIndex].value + '&amp;m=' + document.jump.m.options[document.jump.m.options.selectedIndex].value + '&amp;d=' + document.jump.d.options[document.jump.d.options.selectedIndex].value + '&amp;y=' + document.jump.y.options[document.jump.y.options.selectedIndex].value;\">\n<!-- KalenderMx v".CAL_VERSION." &copy; by shiba-design.de -->\n
    <option ".(($op == "list") ? "selected " : "")."value=\"list\">"._CALLISTLINK."</option>\n
    <option ".(($op == "day") ? "selected " : "")."value=\"day\">"._CALDAYLINK."</option>\n
    <option ".(($op == "month") ? "selected " : "")."value=\"month\">"._CALMONTHLINK."</option>\n
    <option ".(($op == "year") ? "selected " : "")."value=\"year\">"._CALYEARLINK."</option>\n
    </select>\n
    &nbsp;<input type=\"submit\" value=\""._CALJUMPBUTTON."\">
    <input type=\"hidden\" name=\"name\" value=\"".CAL_MODULE_NAME."\">
    <input type=\"hidden\" name=\"col\" value=\"$col\">
    </form></td>";
    if ($op == "view") { $op="day"; }
    echo "<td width=\"60%\">
    <form action=\"modules.php\" method=\"GET\" name=\"jumptoday\" style=\"margin-bottom: 0px;\">
    <input type=\"submit\" value=\""._CALTODAY."\">
    <input type=\"hidden\" name=\"name\" value=\"".CAL_MODULE_NAME."\">
    <input type=\"hidden\" name=\"d\" value=\"".Date("d")."\">
    <input type=\"hidden\" name=\"m\" value=\"".Date("m")."\">
    <input type=\"hidden\" name=\"y\" value=\"".Date("Y")."\">
    <input type=\"hidden\" name=\"op\" value=\"$op\">
    <input type=\"hidden\" name=\"col\" value=\"$col\">
    </form></td>\n</tr>\n";
    echo "<tr><td class='content' colspan='".$nextcolspan."'>";
    echo "<a href=\"".CAL_MODULE_LINK."&amp;op=search&amp;sd=$jahr-$monat-$tag\"><img src=\"".CAL_IMAGE_PATH."info.gif\" alt=\""._CALSEARCHEVENT."\" width=\"16\" height=\"16\" border=\"0\" align=\"middle\" hspace=\"5\">"._CALSEARCHEVENT."</a>";
    if ($printerlink && $reqfile != 'submit') {
        echo "&nbsp;&nbsp;<a href='".$printerlink."' target='calprintwin' onClick=\"window.open('".$printerlink."','calprintwin','left=10, top=10, width=640,height=480,toolbar=1,location=0,directories=0,status=1,menubar=1,scrollbars=1,resizable=1,copyhistory=0'); return false;\">";
        echo "<img src='".CAL_IMAGE_PATH."print.gif' alt='"._CALPRINTER1."' width='17' height='16' hspace='5' border='0' align='middle' title='"._CALPRINTER2."'>"._CALPRINTER1."";
        echo "</a>";
    }
    if (calIsPostAllowed()) echo "&nbsp;&nbsp;<a href=\"".CAL_MODULE_LINK."&amp;file=submit&amp;sd=$jahr-$monat-$tag\"><img src=\"".CAL_IMAGE_PATH."sign.gif\" alt=\""._CALSUBMITEVENT."\" width=\"16\" height=\"16\" border=\"0\" align=\"middle\" hspace=\"5\">"._CALSUBMITEVENT."</a>";
    if (calIsAdmin()) echo "&nbsp;&nbsp;<a href=\"".$admin_file.".php?op=CalendarAdmin\" title=\""._CALNEWSUBMISSIONS."\"><img src=\"".CAL_IMAGE_PATH."waiting.gif\" alt=\""._CALNEWSUBMISSIONS."\" width=\"16\" height=\"16\" border=\"0\" align=\"middle\" hspace=\"5\">"._CALSUBMISSIONSADMIN."</a>";
    #echo "&nbsp;</td><td align='right' class='content'>";
    echo "</td>";
    echo "</tr></table>";
    CloseTable();
}

#########################################################################################
function calGetTimeFormated($time) {
    if (preg_match("/([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})/", $time, $tmp)) {
        $tmptime = @mktime($tmp[1],$tmp[2],0,Date("m"),Date("d"),Date("Y"));
    } else {
        $tmptime = time();
    }
    return strftime(_CALTIMEFORMAT, $tmptime);
}

#########################################################################################
function calIsAdmin() {
    global $db, $calconf;
    static $admintest;
    if (!isset($admintest)) {
        if (!isset($calconf)) {
            include(CAL_MODULE_PATH.'config/config.php');
        }
        if (function_exists('mxGetAdminData')) {
            $adata = mxGetAdminData();
            $admintest = (mxGetAdminPref($calconf['AdminType'])) ? $adata['aid'] : 0;
        } else if (isset($GLOBALS['admin'])) {
            if ($calconf['AdminType'] == 'radmincalendar') { // falls Grundeinstellung von vkpMx
                $calconf['AdminType'] = 'radminsuper';
            }
            if (is_array($GLOBALS['admin'])) {
                $yadmin = $GLOBALS['admin'];
            } else {
                $xadmin = base64_decode($GLOBALS['admin']);
                $yadmin = explode(":", $xadmin);
            }
            $xaid = (empty($yadmin[0])) ? "" : substr($yadmin[0],0,25);
            $xpwd = (empty($yadmin[1])) ? "" : $yadmin[1];
            if ($xaid && $xpwd) {
                $result = $db->sql_query("SELECT aid, pwd, ".$calconf['AdminType'].", radminsuper from ".CAL_TABLE_MX_AUTHORS." WHERE aid='".$xaid."'");
                list($aid, $pwd, $CalendarAdmin, $radminsuper) = $db->sql_fetchrow($result);
                $admintest = (($pwd == $xpwd && !empty($pwd)) && (($CalendarAdmin==1) || ($radminsuper==1))) ? $aid : 0;
                if(!$admintest) {
                    global $prefix;
                    $module_name = basename(dirname(dirname(__FILE__)));
                    $row = $db->sql_fetchrow($db->sql_query("SELECT title, admins FROM ".$prefix."_modules WHERE title='$module_name'"));
                    $admins = explode(",", $row['admins']);
                    $auth_user = 0;
                    for ($i=0; $i < count($admins); $i++) {
                        if ($admdata['name'] == $admins[$i] && !empty($row['admins'])) {
                            $admintest = 1;
                        }
                    }
                }
            } else {
                $admintest = 0;
            }
        } else {
            $admintest = 0;
        }
    }
    return $admintest;
}

#########################################################################################
function calGetBarColorAlt ($categorie) {
    static $lastcat, $caption;
    if ($categorie == $lastcat && isset($caption)) {
        return $caption;
    }
    $points = calGetEventpoints();
    $categorie = calGetCurrentEventPoint($categorie);
    $caption = $points[$categorie];
    return $caption;
}

#########################################################################################
function calGetBarImage($picname, $categorie) {
    static $lastcat, $lastpic, $pic;
    if ($categorie == $lastcat && $picname == $lastpic && isset($pic)) {
        return $pic;
    }
    if (!is_numeric($categorie)) $categorie = calGetOldColors($categorie);
    $categorie = (int)$categorie;
    $xcategorie = ($categorie<10) ? "0$categorie" : "$categorie";
    $pic = "".CAL_IMAGE_PATH."colors/${picname}_${xcategorie}.gif";
    return $pic;
}

#########################################################################################
// Downward Compatibility:
// identifies the new numerical value of the old color letters
function calGetOldColors($categorie = 'b') {
    if      ($categorie == "b") return 1;
    else if ($categorie == "c") return 2;
    else if ($categorie == "g") return 3;
    else if ($categorie == "o") return 4;
    else if ($categorie == "r") return 5;
    else if ($categorie == "u") return 6;
    else if ($categorie == "w") return 7;
    else if ($categorie == "y") return 8;
    else                        return 1;
}

#########################################################################################
// Downward Compatibility:
// identifies the old color letters of the new numerical value
function calSetOldColors($categorie = 0) {
    if      ($categorie == 1) return "b";
    else if ($categorie == 2) return "c";
    else if ($categorie == 3) return "g";
    else if ($categorie == 4) return "o";
    else if ($categorie == 5) return "r";
    else if ($categorie == 6) return "u";
    else if ($categorie == 7) return "w";
    else if ($categorie == 8) return "y";
    else                      return "b";
}

#########################################################################################
// Returns the array which is defined in the language files
// only the keys with values will be considered, index stays the same
function calGetEventpoints() {
    static $points;
    if (empty($points)) {
        global $caldotcolor;
        if (!isset($caldotcolor)) {
            $caldotcolor = calGetDotColors();
        }
        $points = array();
        foreach($caldotcolor as $index => $caption) {
            $caption=trim($caption);
            if (!empty($caption)) {
                $points[$index] = $caption;
                #print "\$points[$index] = $caption;<br />";
            }
        }
        asort($points);
    }
    return $points;
}

#########################################################################################
function calGetSqlEventpoints($categorie = 0){
    if ($categorie) {
        $categorie = (int)$categorie;
        $points[$categorie] = calGetCurrentEventPoint($categorie);
    } else {
        $points = calGetEventpoints();
    }
    foreach($points as $index => $caption) {
        $vari[] = $index;
        if ($index < 10) $vari[] = "0$index";
        if ($index<=8) {
            $vari[] = calSetOldColors($index);
        }
    }
    $xvari = "'".implode("','",$vari)."'";
    return $xvari;
}

#########################################################################################
// Identifies the index of the first defined category from the language files
function calGetFirstEventPoint(){
    static $firstpoint;
    if (empty($firstpoint)) {
        $points = calGetEventpoints();
        reset($points);
        $firstpoint = key($points);
    }
    return $firstpoint;
}

#########################################################################################
// Identifies the valid index of the assigned color value
function calGetCurrentEventPoint($categorie){
    static $lastcategorie;
    $categorie = (is_numeric($categorie)) ? $categorie : calGetOldColors($categorie);
    $categorie = (int)$categorie;
    if (empty($lastcategorie) || empty($categorie) || ($categorie != $lastcategorie)) {
        $points = calGetEventpoints();
        $points = array_flip($points);
        if (empty($categorie) || (!in_array ($categorie, $points))) {
            $categorie = calGetFirstEventPoint();
        }
        $lastcategorie = $categorie;
    }
    return $categorie;
}

#########################################################################################
function calBuildColorLegend($modus, $showalldot = 0, $showNewlink = 0, $categorie = "", $linkdate = "") {
    global $calconf;
    $maxcols = (empty($calconf['catListCols'])) ? 6 : $calconf['catListCols'];
    $maxcols = ($modus=="form") ? $maxcols-1 : $maxcols;

    $eventpoints = calGetEventpoints();
    #mxDebugFuncVars($eventpoints);
    $catcountall = count($eventpoints);
    if ($showalldot) $catcountall++;
    if ($showNewlink) $catcountall++;
    $catcount=0;
    $rowcount=1;
    $link = CAL_MODULE_LINK."&amp;op=list$linkdate";
    $legend="\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n<tr valign=\"top\">";

    if ($showalldot && !calIsPrintView()) {
        if ($catcount==$maxcols) {
            $legend.="</tr>\n<tr valign=\"top\">";
            $catcount=0;
        }
        $catcount++;
        $imgprops= "align=\"middle\" hspace=\"1\" width=\"16\" height=\"14\" border=\"0\" vspace=\"0\" alt=\""._CALDOTCOLORALL."\"";
        $legend.="<td nowrap><span class=\"tiny\">";
        if ($modus=="form") {
            $sel = (empty($categorie)) ? "checked" : "";
            $legend.="<input type=\"radio\" $sel name=\"categorie\" value=\"0\" style=\"background-color: transparent;\">&nbsp;<img src=\"".CAL_IMAGE_PATH."star.gif\" $imgprops>"._CALDOTCOLORALL."";
        } else {
            if (empty($categorie)) {
                $legend.="<strong><img src=\"".CAL_IMAGE_PATH."star.gif\" $imgprops>"._CALDOTCOLORALL."</strong>";
            } else {
                $legend.="<a href=\"$link\"><img src=\"".CAL_IMAGE_PATH."star.gif\" $imgprops>"._CALDOTCOLORALL."</a>";
            }
        }
        $legend.="</span></td>\n";
    }

    $imgprops= "hspace=\"4\" vspace=\"4\" width=\"9\" height=\"9\" border=\"0\" alt=\"\" align=\"middle\"";
    foreach($eventpoints as $index => $caption) {
        $catcount++;
        $image = calGetBarImage("ball", $index);
        $legend.="<td nowrap><span class=\"tiny\">";

        if ($modus=="centerblock") {
            $legend.="<a href=\"$link&amp;col=$index\"><img src=\"$image\" $imgprops>$caption</a>";
        } else if ($modus == "form") {
            $sel = ((int)$categorie==(int)$index) ? "checked" : "";
            $legend.="<input type=\"radio\" $sel name=\"categorie\" value=\"$index\" style=\"background-color: transparent;\">&nbsp;<img src=\"$image\" $imgprops>$caption";
        } else {
            if ($index == $categorie) {
                $legend.="<img src=\"$image\" $imgprops><strong>$caption</strong>";
            } else {
                $legend.="<a href=\"$link&amp;col=$index\"><img src=\"$image\" $imgprops>$caption</a>";
            }
        }

        $legend.="</span></td>";
        if ($catcount==$maxcols) {
            $legend.="</tr>\n<tr valign=\"top\">";
            $catcount=0;
        }
    }
    if ($showNewlink && calIsPostAllowed() && !calIsPrintView()) {
        if ($catcount==$maxcols){
            $legend.="</tr>\n<tr valign=\"top\">";
            $catcount=0;
        }
        $catcount++;
        $imgprops= "width=\"16\" height=\"16\" border=\"0\" align=\"middle\" hspace=\"3\" vspace=\"0\" alt=\""._CALSUBMITEVENT."\"";
        $legend.="<td nowrap><span class=\"tiny\"><a href=\"".CAL_MODULE_LINK."&amp;file=submit\"><img src=\"".CAL_IMAGE_PATH."sign.gif\" $imgprops>"._CALSUBMITEVENT."</a></span></td>\n";
    }
    $colspan = $maxcols - $catcount;
    if ($colspan && $colspan < $maxcols) {
        $legend.="<td colspan=\"$colspan\">&nbsp;</td>\n";
    }
    $legend.="</tr>\n</table>\n";
    return $legend;
}

#########################################################################################
function calBuildColorLegendSideBlocks() {
    $link = CAL_MODULE_LINK."&amp;op=list";
    $eventpoints = calGetEventpoints();
    $imgprops= "hspace=\"2\" width=\"9\" height=\"9\" border=\"0\" alt=\"\"";
    $legend="<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
    foreach($eventpoints as $index => $caption) {
        $image = calGetBarImage("ball", $index);
        $legend.="<tr><td><img src=\"$image\" $imgprops></td><td valign=\"top\"><span class=\"tiny\">";
        $legend.="<a href=\"$link&amp;col=$index\">$caption</a>\n";
        $legend.="</span></td></tr>";
    }
    $legend.="</table>";
    return $legend;
}

#########################################################################################
function calBuildTopicsSelect($topic = 0, $forsearch = '') {
    global $db;
    if ($forsearch) {
        $qry = "SELECT DISTINCT t.topicid, t.topictext
        FROM ".CAL_TABLE_MX_TOPICS." AS t INNER JOIN ".CAL_TABLE_EVENTS." AS e ON t.topicid = e.topic
        WHERE (t.topictext <> '')";
    } else {
        $qry = "SELECT topicid, topictext from ".CAL_TABLE_MX_TOPICS." WHERE topictext <> ''";
    }
    $result = $db->sql_query($qry);
    $option['00'] = "<option value=\"\">- "._CALSELECTTOPIC."</option>\n";
    while(list($topicid, $topics) = $db->sql_fetchrow($result)) {
        $option[$topics] = "<option value=\"".$topicid."\"".(($topicid==$topic) ? " selected" : "").">".calPrepareDisplay(strip_tags($topics))."</option>\n";
    }
    $out = '';
    if (count($option) > 1) {
        if (function_exists('array_change_key_case')) {
            $option = array_change_key_case($option, CASE_UPPER);
        }
        ksort($option, SORT_STRING);
        #mxDebugFuncVars($option);
        $out .= "\n<select name=\"topic\" id=\"topic\" title=\""._CALSELECTTOPIC."\">\n";
        $out .= implode('',$option);
        $out .= "</select>\n";
    } else if (!$forsearch) {
        $out .= "<strong>"._CALNOTOPICS."</strong>";
    }
    return $out;
}

#########################################################################################
function calBuildCategorieSelect($categorie=0) {
    global $db;
    $eventpoints = calGetEventpoints();
    $whereoption = '';
    if (count($eventpoints)) {
        $whereoption = ' AND categorie in ('.implode(',',array_keys($eventpoints)).')';
    }
    $toplist = $db->sql_query("SELECT DISTINCT categorie FROM ".CAL_TABLE_EVENTS." WHERE (activ=1)".$whereoption."");
    $option['00'] = "<option value=\"\">- "._CALSELCATEGORY."</option>\n";
    while(list($col) = $db->sql_fetchrow($toplist)) {
        $option[$eventpoints[$col]] = "<option value=\"".$col."\"".(($col==$categorie) ? " selected" : "").">".calPrepareDisplay(strip_tags($eventpoints[$col]))."</option>\n";
    }
    $out = '';
    if (count($option) > 2) {
        if (function_exists('array_change_key_case')) {
            $option = array_change_key_case($option, CASE_UPPER);
        }
        ksort($option);
        #mxDebugFuncVars($option);
        $out .= "\n<select name=\"categorie\" id=\"categorie\" title=\""._CALSELCATEGORY."\">\n";
        $out .= implode('',$option);
        $out .= "</select>\n";
    }
    return $out;
}

#########################################################################################
function calBuiltMonthSelect($name, $month) {
    $out = "<select name=\"$name\" id=\"$name\" title=\""._CALMONTHS."\">\n";
    for ($i = 1; $i <= 12; $i++) {
        $out .= "<option value=\"".$i."\"".(($i == $month) ? " selected" : "").">".calGetMonthName($i)."</option>\n";
    }
    $out .= "</select>&nbsp;\n";
    return $out;
}

#########################################################################################
function calBuiltDaySelect($name, $day) {
    $out = "<select name=\"".$name."\" id=\"".$name."\" title=\""._CALDAYS."\">\n";
    for ($i = 1; $i <= 31; $i++) {
        $out .= "<option value=\"".$i."\"".(($i == $day) ? " selected" : "").">".sprintf("%02d", $i)."</option>\n";
    }
    $out .= "</select>&nbsp;\n";
    return $out;
}

#########################################################################################
function calBuiltYearSelect($name, $year) {
    global $db;
    static $minyear;
    $yrange = intval(Date("Y"));
    $startyear = $yrange-10;
    if (!isset($minyear)) {
        $result = $db->sql_query("SELECT MIN(Year(startDate)) AS minyear FROM ".CAL_TABLE_EVENTS." WHERE (Year(startDate)>=1975)");
        list($minyear) = $db->sql_fetchrow($result);
    }
    if ($minyear <= $startyear ) {
        $startyear = $minyear-5;
    }
    #mxDebugFuncVars($startyear, $minyear);
    $out = "<select name=\"".$name."\" id=\"".$name."\" title=\""._CALYEARS."\">\n";
    for ($i = $startyear; $i <= $yrange+30; $i++) {
        $out .= "<option value=\"".$i."\"".(($i == $year) ? " selected" : "").">".$i."</option>\n";
    }
    $out .= "</select>&nbsp;\n";
    return $out;
}

#########################################################################################
function calBuildMinuteSelect($name, $min) {
    global $calconf;
    #mxDebugFuncVars($calconf['minuterange'], $name, $min);
    $out = "<select name=\"$name\" id=\"$name\" title=\""._CALMINUTES."\">\n";
    for ($i = 0; $i <= (60-$calconf['minuterange']);) {
        $out .= "<option value=\"".$i."\" ".(($i == $min) ? " selected" : "").">:".sprintf("%02d", $i)."</option>\n";
        $i = $i + $calconf['minuterange'];
    }
    $out .= "</select>&nbsp;\n";
    return $out;
}

#########################################################################################
function calBuildHourSelect($name, $hour, $ampm) {
    if (_CALTIME24HOUR) {
        $range = 23;
    } else {
        $range = 12;
        $hour = ($hour!=12) ? $hour-$ampm : $hour;
    }
    $out = "<select name=\"".$name."\" id=\"".$name."\" title=\""._CALHOURS."\">\n";
    for ($i = 0; $i <= $range; $i++) {
        $out .= "<option value=\"".$i."\"".(($i == $hour) ? "selected " : "").">".sprintf("%02d", $i)."</option>\n";
    }
    $out .= "</select>&nbsp;\n";
    return $out;
}

#########################################################################################
//// wird nicht mehr verwendet
function calBuildAmPmSelect($name, $hour=0) {
    if (_CALTIME24HOUR) {
        $out = "<input type=\"hidden\" name=\"".$name."\" value=\"0\">\n";
    } else {
        $out = "<select name=\"".$name."\" id=\"".$name."\">";
        $out .= "<option value=\"0\"".(($hour < 12) ? "selected" : "").">AM</option>\n";
        $out .= "<option value=\"12\"".(($hour >= 12) ? "selected" : "").">PM</option>\n";
        $out .= "</select>&nbsp;\n";
    }
    return $out;
}

#########################################################################################
function calGetMonthName($month) {
    $month = intval($month);
    if     (empty($month)) { return "";      }
    elseif ($month == 1)   { return _CALJAN; }
    elseif ($month == 2)   { return _CALFEB; }
    elseif ($month == 3)   { return _CALMAR; }
    elseif ($month == 4)   { return _CALAPR; }
    elseif ($month == 5)   { return _CALMAY; }
    elseif ($month == 6)   { return _CALJUN; }
    elseif ($month == 7)   { return _CALJUL; }
    elseif ($month == 8)   { return _CALAUG; }
    elseif ($month == 9)   { return _CALSEP; }
    elseif ($month == 10)  { return _CALOCT; }
    elseif ($month == 11)  { return _CALNOV; }
    elseif ($month == 12)  { return _CALDEC; }
    else                   { return "";      }
}

#########################################################################################
function calGetLongDayName($Date) {
    $day = intval(Date("w",$Date)-_CALWEEKBEGINN);
    if ($day < 0) $day = 6;
    if     ($day == 0) { return _CALLONGFIRSTDAY; }
    elseif ($day == 1) { return _CALLONGSECONDDAY; }
    elseif ($day == 2) { return _CALLONGTHIRDDAY; }
    elseif ($day == 3) { return _CALLONGFOURTHDAY; }
    elseif ($day == 4) { return _CALLONGFIFTHDAY; }
    elseif ($day == 5) { return _CALLONGSIXTHDAY; }
    elseif ($day == 6) { return _CALLONGSEVENTHDAY; }
    else               { return ""; }
}

#########################################################################################
function calIsPostAllowed() {
    global $calconf;
    static $oki;
    if (isset($oki)) return $oki;
    if (calIsAdmin()) {
        $oki = 1;
        return $oki;
    }
    $user = (isset($GLOBALS['user'])) ? $GLOBALS['user'] : "";
    if (is_user()) {
        $oki = ($calconf['allowuserpost']) ? 1 : 0;
    } else {
        $oki = ($calconf['allowanonpost']) ? 1 : 0;
    }
    return $oki;
}

######################################################################################
function calGetDotColors($language = "") {
    static $caldotcolor;
    if (empty($caldotcolor)) {
        $caldotcolor = array();
        $language = (empty($language)) ? $GLOBALS['currentlang'] : $language;
        if (@file_exists(CAL_MODULE_PATH.'categories/$language.php')) {
            include(CAL_MODULE_PATH.'categories/$language.php');
        } else {
            include(CAL_MODULE_PATH.'categories/english.php');
        }
    }
    return $caldotcolor;
}

#########################################################################################
function calGetUserData($uname){
    static $username, $userdat;
    if (empty($username) || $uname != $username) {
        global $db;
        $uname = substr($uname,0,25);
        $username = $uname; // static!
        if (CAL_CMS_VERSION == '65') {
            $qry = "SELECT user_id, user_email, username from ".CAL_TABLE_MX_USERS." WHERE username='".$uname."'";
        } else {
            $qry = "SELECT uid, email, uname from ".CAL_TABLE_MX_USERS." WHERE uname='".$uname."'";
        }
        $result = $db->sql_query($qry);
        list($userdat['uid'], $userdat['email'], $userdat['uname']) = $db->sql_fetchrow($result);
    }
    return $userdat;
}

#########################################################################################
function calAddArticle($event){
    global $calconf, $db;
    $categoriealt = calGetBarColorAlt($event['categorie']);
    // The following lines formats the article text
    $story="<img src=\"".calGetBarImage("ball", $event['categorie'])."\" align=\"middle\" alt=\"$categoriealt\" title=\"$categoriealt\">&nbsp;&nbsp;<a href=\"".CAL_MODULE_LINK."&".$event['startDateListLink']."&amp;col=".$event['categorie']."\">$categoriealt</a>";
    $story.="\n"._CALEVENTDATETEXT.": <a href=\"".CAL_MODULE_LINK."&amp;op=day&".$event['startDateListLink']."\">".$event['startDateLong']."</a>";
    if (!$event['alldayevent']) {
        $story.="&nbsp;&nbsp;"._CALSTARTTIME.": ".$event['startTimeFormat']."";
    }
    if ($event['startTimestamp'] != $event['endTimestamp']) {
        $story.="\n"._CALENDDATEPREVIEW.": <a href=\"".CAL_MODULE_LINK."&amp;op=day&".$event['endDateListLink']."\">".$event['endDateLong']."</a>";
    }
    if (!$event['alldayevent']) {
        $story.="&nbsp;&nbsp;"._CALENDTIME.": ".$event['endTimeFormat']."";
    }
    $story = calAddSlashes($story."\n").$event['hometext'];
    if (CAL_CMS_VERSION!='mx') {
        $story = nl2br($story);
    }
    # End of formatting
    $qry="INSERT INTO ".CAL_TABLE_MX_QUEUE." SET
    uid       = ".$event['uid'].",
    uname     = '".$event['informant']."',
    subject   = '".$event['title']."',
    story     = '".$story."',
    timestamp = '".$event['posteddate']."',
    topic     = ".$event['topic']."
    ;";
    $result = $db->sql_query($qry);
}

#########################################################################################
function calErrmsg($text) {
    OpenTable();
    echo "<center><span class=\"content\"><img src=\"".CAL_IMAGE_PATH."caution.gif\" alt=\"\" width=\"10\" height=\"21\" border=\"0\" align=\"middle\" vspace=\"5\" hspace=\"5\">"._CALVALIDERRORMSG."<img src=\"".CAL_IMAGE_PATH."caution.gif\" alt=\"\" width=\"10\" height=\"21\" border=\"0\" align=\"middle\" vspace=\"5\" hspace=\"5\"><br />";
    echo "<strong>$text</strong><br />";
    echo "<br />"._CALVALIDFIXMSG."</span></center>";
    CloseTable();
    echo "<br />";
    }

#################################################################################################
function calErrAdminMsg($msg, $title = "") {
    $title = (empty($title)) ? _CALSUBMISSIONSADMIN : $title;
    $GLOBALS['pagetitle']= $title;
    if (empty($GLOBALS['header'])) include_once(NUKE_BASE_DIR."header.php");
    if (calIsAdmin()) {
        calAdminMenu($title);
    }
    OpenTable();
    echo "<center>".$msg."<br /><br />"._GOBACK."</center>";
    CloseTable();
    include (NUKE_BASE_DIR."footer.php");
    exit;
}

#########################################################################################
function calAdminMenu($thetitle) {
    global $calconf, $admin_file;
    if ($calconf['AdminMenu'] && function_exists('GraphicAdmin')) {
        OpenTable();
        echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=sommaire\">" . _CAL_ADMIN_HEADER . "</a></div>\n";
        echo "<br /><br />";
        echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _CAL_RETURNMAIN . "</a> ]</div>\n";
        CloseTable();
        echo "<br />";
    } else {
        $part1[] = "<a href=\"".$admin_file.".php\">"._CALADMINMENU."</a>";
    }

    $part1[] = "<a href=\"".CAL_MODULE_LINK."\">"._CALNAME."</a>";
    $part1[] = "<a href=\"".CAL_MODULE_LINK."&amp;file=submit\">"._CALOK."</a>";
    $part1[] = "<a href=\"".CAL_MODULE_LINK."&amp;op=search\">"._CALSEARCH."</a>";
    $part2[] = "<a href=\"".$admin_file.".php?op=CalendarAdmin\">"._CALSUBMISSIONSADMIN."</a>";
    $part2[] = "<a href=\"".$admin_file.".php?op=CalendarConfig\">"._CALCALENDARCONFIG."</a>";
    $part2[] = "<a href=\"".$admin_file.".php?op=CalSetcols\">"._CALCATEGORIESADMIN."</a>";
    OpenTable();
    echo "<center>\n<span class=\"title\">".$thetitle."</span><br /><br />\n";
    echo "<table><tr><td align='center'>";
    echo implode(" | ",$part1);
    echo "</td></tr>\n<tr><td align='center'>";
    echo implode(" | ",$part2);
    echo "</td></tr></table>";
    echo "</center>";
    CloseTable();
    echo "<br />";
}

#################################################################################################
function calDetectGoodBrowser() {
    static $good;
    if (isset($good)) return $good;
    $agent = strtolower(getenv("HTTP_USER_AGENT"));
    $good = 0;
    if (strpos($agent, "gecko"))
        $good = 1;
    else if (strpos($agent, "msie") || strpos($agent, "explorer"))
        $good = 1;
    else if (strpos($agent, "konqueror"))
        $good = 1;
    /*
    else if ((strpos($agent, "nav")) || (strpos($agent, "gold")) || (strpos($agent, "x11")) || (strpos($agent, "mozilla")) || (strpos($agent, "netscape")) AND (!strpos($agent, "msie") AND (!strpos($agent, "konqueror"))))
        $good = 0;
    else if (strpos($agent, "lynx"))
        $good = 0;
    else if (strpos($agent, "opera"))
        $good = 0;
    else if (strpos($agent, "webtv"))
        $good = 0;
    else if (strpos($agent, "konqueror"))
        $good = 0;
    else if ((strpos($agent, "bot")) || (strpos($agent, "google")) || (strpos($agent, "slurp")) || (strpos($agent, "scooter")) || (strpos($agent, "spider")) || (strpos($agent, "infoseek")))
        $good = 0;
     */
    return $good;
}

#########################################################################################
function calValueToText($tmp) {
    $tmp = str_replace(10,"",$tmp);
    $tmp = str_replace(9,"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$tmp);
    $tmp = str_replace("<","&lt;",$tmp);
    $tmp = str_replace(">","&gt;",$tmp);
    $tmp = str_replace("\"","&quot;",$tmp);
    $tmp = str_replace("\'","&quot;",$tmp);
    $tmp = str_replace("\&\#039;","&quot;",$tmp);
    $tmp = str_replace(13," ",$tmp);
    $tmp = nl2br($tmp);
    return $tmp;
}

#########################################################################################
function calGetSqlQuery($event, $mode) {
    $fields[] = "aid = '".$event['aid']."'";
    $fields[] = "title = '".$event['title']."'";
    $fields[] = "hometext = '".$event['hometext']."'";
    $fields[] = "topic = ".$event['topic']."";
    $fields[] = "informant = '".$event['informant']."'";
    $fields[] = "startDate = '".$event['startDate']."'";
    $fields[] = "endDate = '".$event['endDate']."'";
    $fields[] = "startTime = '".$event['startTime']."'";
    $fields[] = "endTime = '".$event['endTime']."'";
    $fields[] = "alldayevent = ".$event['alldayevent']."";
    $fields[] = "categorie = '".$event['categorie']."'";
    $fields[] = "activ = ".$event['activ']."";

    /// periodic
    #$fields[] = "rec_period = '".$event['rec_period']."'";
    #$fields[] = "rec_type = '".$event['rec_type']."'";
    /// periodic

    if ($mode == "insert") {
        $fields[] = "posteddate = '".$event['posteddate']."'";
        $qry="INSERT INTO ".CAL_TABLE_EVENTS." SET ".implode(', ',$fields)."";
    } else {
        $qry="UPDATE ".CAL_TABLE_EVENTS." SET ".implode(', ',$fields)." WHERE eid = ".$event['eid']."";
    }
    return $qry;
}

#########################################################################################
function calPrepareEventForSql($event) {
    global $calconf;
    $event['categorie'] = calGetCurrentEventPoint($event['categorie']);
    if (!empty($event['informant'])) {
        $userdata = calGetUserData($event['informant']);
        $event['informant'] = ($event['informant'] != $userdata['uname']) ? "" : $userdata['uname'];
        $event['uid']       = ($event['informant'] != $userdata['uname']) ? 0  : $userdata['uid'];
    }
    $event['uid']          = (empty($event['uid']))          ? 0 : (int)$event['uid'];
    $event['aid']          = (empty($event['aid']))          ? calIsAdmin() : $event['aid'];
    $event['eid']          = (empty($event['eid']))          ? 0 : (int)$event['eid'];
    $event['addasarticle'] = (empty($event['addasarticle'])) ? 0 : (int)$event['addasarticle'];
    $event['topic']        = (empty($event['topic']))        ? 0 : (int)$event['topic'];
    $event['alldayevent']  = (empty($event['alldayevent']))  ? 0 : 1;
    $event['activ']        = (empty($event['activ']))        ? 0 : $event['activ'];

    /// periodic
    #$event['rec_period'] = (empty($event['rec_period'])) ? 0 : $event['rec_period'];
    #$event['rec_type']   = (empty($event['rec_type']) || empty($event['rec_period'])) ? "" : $event['rec_type'];
    /// periodic

    $eventsdates = calGetEventDates($event);
    $event = array_merge($event,$eventsdates);
    #mxDebugFuncVars('FOR-SQL:'$event); #exit;
    $errormsg = calCheckEventData($event);           // Check dates
    if ($errormsg) {
        $event = calStripSlashes($event);
        $GLOBALS['pagetitle']=_CALSUBMITNAME;
        if (empty($GLOBALS['header'])) include_once(NUKE_BASE_DIR."header.php");
        calBuildModusselectors($event['op'], $event['startDay'], $event['startMonth'], $event['startYear']);
        title(_CALSUBMITNAME);
        calErrmsg($errormsg);
        calSubmitForm($event);
        include(NUKE_BASE_DIR."footer.php");
        exit;
    }
    $event['title']    = strip_tags($event['title']);
    $event['hometext'] = strip_tags($event['hometext'],calGetAllowedtags());

    foreach($event as $varname => $value) {
        $event[$varname] = trim(calAddSlashes($value));
    }
    return $event;
}

#########################################################################################
function calSubmitForm($event){
    global $user, $cookie, $calconf, $admin_file, $module_name;
    global $bgcolor1,$bgcolor2,$bgcolor3,$textcolor1,$textcolor2;
    $eventsdates = calGetEventDates($event);
    $event = array_merge($event,$eventsdates);
    #mxDebugFuncVars($event);

    $event['title']     = strip_tags($event['title']);
  $event['hometext']  = strip_tags($event['hometext'], calGetAllowedtags());
    $event['categorie'] = calGetCurrentEventPoint($event['categorie']);
    $event['eid']       = (empty($event['eid'])) ? 0 : $event['eid'];
    $event['aid']       = (empty($event['aid'])) ? calIsAdmin() : $event['aid'];
    $event['informant'] = (empty($event['informant']) || $event['informant']==$GLOBALS['anonymous']) ? "" : $event['informant']; // make sure that informant isn't $GLOBALS['anonymous']
    $event['posteddate']= (empty($event['posteddate'])) ? 0 : $event['posteddate'];
    $checkalldayevent   = (empty($event['alldayevent'])) ? "" : "checked";
    $checkaddarticle    = (empty($event['addasarticle'])) ? "" : "checked";
    $namecaption        = (empty($event['eid'])) ? _CALYOURNAME : _CALNAMEFIELD;

    // build Start and End Event Select
    if (_CALINTERNATIONALDATES) {
        $eventstart  = calBuiltDaySelect("startDay",$event['startDay']);
        $eventstart .= calBuiltMonthSelect("startMonth",$event['startMonth']);
        $eventend    = calBuiltDaySelect("endDay",$event['endDay']);
        $eventend   .= calBuiltMonthSelect("endMonth",$event['endMonth']);
    } else {
        $eventstart  = calBuiltMonthSelect("startMonth",$event['startMonth']);
        $eventstart .= calBuiltDaySelect("startDay",$event['startDay']);
        $eventend    = calBuiltMonthSelect("endMonth",$event['endMonth']);
        $eventend   .= calBuiltDaySelect("endDay",$event['endDay']);
    }
    $eventstart .= calBuiltYearSelect("startYear",$event['startYear']);
    $eventstart .= calBuildHourSelect("startHour",$event['startHour'],$event['startAmPm']);
    $eventstart .= calBuildMinuteSelect("startMin",$event['startMin']);
    $eventstart .= calBuildAmPmSelect("startAmPm",$event['startHour']);

    $eventend   .= calBuiltYearSelect("endYear",$event['endYear']);
    $eventend   .= calBuildHourSelect("endHour",$event['endHour'],$event['endAmPm']);
    $eventend   .= calBuildMinuteSelect("endMin",$event['endMin']);
    $eventend   .= calBuildAmPmSelect("endAmPm",$event['endHour']);

    /// periodic
    #$event['rec_period'] = (empty($event['rec_period'])) ? 0 : $event['rec_period'];
    #$event['rec_type']   = (empty($event['rec_type']))   ? CAL_PERIOD_DEFAULT : $event['rec_type'];
    #$eventperiod = calBuiltRecTypeSelect($event['rec_period'], $event['rec_type']);
    /// periodic

    $user = (isset($GLOBALS['user'])) ? $GLOBALS['user'] : "";
    if (is_user()) {
/*****[BEGIN]******************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
        $namefield = "<a href=\"".CAL_MOD_USERLOGIN."\"><strong>".UsernameColor($event['informant'])."</strong></a>";
/*****[END]********************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
        $autoactive = (empty($calconf['userautoactive'])) ? 0 : 1;
    } else {
        $namefield = "".$GLOBALS['anonymous']." [ <a href=\"".CAL_MOD_USERLOGIN."\">"._CALLOGIN."</a> ]";
        $autoactive = (empty($calconf['anonautoactive'])) ? 0 : 1;
    }

    if ($event['op'] == "CalendarPreviewEvent" || $event['op'] == "CalendarEditEvent" || $event['op'] == "CalendarNewEvent" || $event['op'] == "CalendarPostEvent") {
        $actionfile = "".$admin_file.".php";
        $hiddenfields  = "<input type=\"hidden\" name=\"name\" value=\"".CAL_MODULE_NAME."\">\n";
        $hiddenfields .= "<input type=\"hidden\" name=\"file\" value=\"submit\">\n";
        $hiddenfields .= "<input type=\"hidden\" value=\"".$event['posteddate']."\" name=\"posteddate\">";

        $submitoptions  = "<option value=\"CalendarPreviewEvent\">"._CALPREVIEWSTORY."</option>\n";
        $submitoptions .= "<option value=\"CalendarPostEvent\" selected>"._CALPOSTSTORY." &raquo; "._CALGOTOEDIT."</option>\n";
        $submitoptions .= "<option value=\"CalendarPostEventGotoMain\">"._CALPOSTSTORY." &raquo; "._CALGOTOADMIN."</option>\n";
        $submitoptions .= "<option value=\"CalendarPostEventGotoCalendar\">"._CALPOSTSTORY." &raquo; "._CALGOTOCALENDAR."</option>\n";
        if (!empty($event['eid'])) $submitoptions .= "<option value=\"CalendarDeleteEvent\">"._CALDELETESTORY."</option>\n";

        $xactiv = (empty($event['activ'])) ? "<strong> (New Date)</strong>" : "";
        $event['activ']  = (empty($event['activ'])) ? 1 : $event['activ'];
        $selactiv1 = ($event['activ'] == 1) ? "checked" : "";
        $selactiv2 = ($event['activ'] != 1) ? "checked" : "";
        if ($event['informant'] && $event['op'] != "CalendarNewEvent") {
            $userdata = calGetUserData($event['informant']);
            $event['informant'] = $userdata['uname']; // If username doesn't exist anymore, set "".
            if ($event['informant']){
                $namefield .= "&nbsp; <span class=\"tiny\">[ <a href=\"".CAL_MOD_USERINFO.$event['informant']."\" target=\"_blank\">Userinfo</a> | <a href=\"mailto:".$userdata['email']."\">Email User</a>";
                $namefield .= " ]</span>";
            }
        }
    } else {
        $actionfile = "modules.php?name=".$module_name."";
        $hiddenfields  = "<input type=\"hidden\" name=\"name\" value=\"".CAL_MODULE_NAME."\">\n";
        $hiddenfields .= "<input type=\"hidden\" name=\"file\" value=\"submit\">\n";
        $hiddenfields .= "<input type=\"hidden\" value=\"".$event['posteddate']."\" name=\"posteddate\">";
        $hiddenfields .= "<input type=\"hidden\" name=\"activ\" value=\"".$autoactive."\">\n";
        $submitoptions  = "<option value=\"calNewEventPreview\" selected>"._CALPREVIEW."</option>\n";
        $submitoptions .= "<option value=\"calNewEventSubmit\">"._CALOK."</option>\n";
        $event['activ']  = 0;
    }
    if (empty($calconf['allowaddarticle'])) {
        $hiddenfields  .= "<input type=\"hidden\" name=\"addasarticle\" value=\"0\">\n";
    }
    $usermsg1 = (empty($event['activ'])) ? "<br />"._CALSUBMITADVICE2 : "";
############## Beginn Form view #####################
    OpenTable();
    echo "<center>";
    echo "<form action=\"".$actionfile."\" method=\"post\" name=\"inputform\" id=\"inputform\" style=\"margin-bottom: 0px;\">\n";
    echo "<table width=\"90%\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" style=\"background-color: $bgcolor3;\">\n";
    echo "<tr valign=\"top\"><td colspan=\"2\" style=\"background-color: $bgcolor2;\"><span class=\"content\">";
    echo " <img src=\"".CAL_IMAGE_PATH."sign.gif\" alt=\""._CALSUBMITEVENT."\" width=\"16\" height=\"16\" border=\"0\" align=\"middle\" hspace=\"5\" vspace=\"3\"><strong>"._CALSUBMITADVICE1."</strong>".$usermsg1."</span></td>\n</tr>\n";
    echo "<tr valign=\"top\"><td style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>".$namecaption."</strong>:</span></td>\n";
    echo " <td style=\"background-color: $bgcolor1;\"><span class=\"content\">".$namefield."</span></td>\n</tr>\n";
    echo "<tr valign=\"top\"><td style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>"._CALSUBTITLE."</strong>:</span></td>\n";
    echo " <td style=\"background-color: $bgcolor1;\"><span class=\"tiny\"><input type=\"text\" name=\"title\" id=\"title\" size=\"50\" maxlength=\"80\" value=\"".calPrepareDisplay($event['title'])."\">\n<br />"._CALBEDESCRIPTIVE."</span></td>\n</tr>\n";
    echo "<tr valign=\"top\"><td style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>"._CALEVENTDATETEXT."</strong>:</span></td>\n";# _CALSTARTTIME
    echo " <td style=\"background-color: $bgcolor1;\"><span class=\"tiny\">".$eventstart."</span></td>\n</tr>\n";
    echo "<tr valign=\"top\"><td style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>"._CALENDDATETEXT."</strong>:</span></td>\n"; # _CALENDTIME
    echo " <td style=\"background-color: $bgcolor1;\"><span class=\"tiny\">".$eventend."</span></td>\n</tr>\n";
    echo "<tr valign=\"top\"><td style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>"._CALALLDAYEVENT."</strong>:</span></td>\n";
    echo " <td style=\"background-color: $bgcolor1;\"><span class=\"tiny\"><input type=\"checkbox\" name=\"alldayevent\" $checkalldayevent value=\"1\" style=\"background-color: transparent;\">&nbsp;&nbsp;"._CALTIMEIGNORED."</span></td>\n</tr>\n";

    /// periodic
    #echo "<tr valign=\"top\"><td style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>"._CALEVENTPERIODTEXT."</strong>:</span></td>\n"; # _CALENDTIME
    #echo " <td style=\"background-color: $bgcolor1;\"><span class=\"tiny\">".$eventperiod."</span></td>\n</tr>\n";
    /// periodic

    echo "<tr valign=\"top\"><td style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>"._CALARTICLETEXT."</strong>:</span></td>\n";
    echo " <td style=\"background-color: $bgcolor1;\"><span class=\"tiny\"><textarea cols=\"70\" rows=\"7\" name=\"hometext\">".calPrepareDisplay($event['hometext'])."</textarea><br />"._CALHTMLISFINE."<br />"._CALALLOWEDHTML.": ".calGetAllowedtags(1)."</span></td>\n</tr>\n";
    echo "<tr valign=\"top\"><td style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>"._CALBARCOLORTEXT."</strong>:</span></td>\n";
    echo " <td style=\"background-color: $bgcolor1;\">".calBuildColorLegend("form","","",$event['categorie'])."</td>\n</tr>\n";
    if ($calconf['usetopics'] > 0) {
        echo "<tr valign=\"top\"><td style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>"._CALTOPIC."</strong>:</span></td>\n";
        echo " <td style=\"background-color: $bgcolor1;\"><span class=\"tiny\">".calBuildTopicsSelect($event['topic'])."</span></td>\n</tr>\n";
    }
    if ($calconf['allowaddarticle']) {
        echo "<tr valign=\"top\"><td style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>"._CALADDASARTICLE."</strong>:</span></td>\n";
        echo " <td style=\"background-color: $bgcolor1;\"><span class=\"tiny\"><input type=\"checkbox\" name=\"addasarticle\" value=\"1\" style=\"background-color: transparent;\" ".$checkaddarticle.">&nbsp;&nbsp;"._CALADDASARTICLE2."</span></td>\n</tr>\n";
    }
    if ($event['activ']) {
        echo "<tr valign=\"top\"><td style=\"background-color: $bgcolor2;\"><span class=\"content\"><strong>"._CALACTIV."</strong>:</span></td>\n";
        echo " <td style=\"background-color: $bgcolor1;\"><span class=\"content\"><input type=\"radio\" name=\"activ\" value=\"1\" $selactiv1>"._CALYES." &nbsp;<input type=\"radio\" name=\"activ\" value=\"2\" $selactiv2>"._CALNO." &nbsp; $xactiv</span></td>\n</tr>\n";
    }
    echo "<tr valign=\"top\"><td style=\"background-color: $bgcolor2;\" colspan=\"2\"><select name=\"op\">".$submitoptions."</select>&nbsp;&nbsp;<input type=\"submit\" value=\""._CALSEND."\">";
    echo " <br /><span class=\"tiny\">"._CALCHECKSTORY."</span></td>\n</tr>\n";
    echo "</table>";
    echo "".$hiddenfields."<input type=\"hidden\" name=\"informant\" value=\"".$event['informant']."\">\n";
    echo "<input type=\"hidden\" value=\"".$event['aid']."\" name=\"aid\">\n";
    echo "<input type=\"hidden\" value=\"".$event['eid']."\" name=\"eid\">\n";
    echo "<input type=\"hidden\" value=\"1\" name=\"fromform\">\n";
    echo "</form>";
    echo "</center>";
    CloseTable();
    #echo "<br />";
    echo "\n<script language='JavaScript' type='text/javascript'>\n<!--\ndocument.inputform.title.focus();\n//-->\n</script>\n";
}

#########################################################################################
function calStripSlashes(&$what) {
    // if $what is empty, return empty string
    if (empty($what)) return "";
    // create explicit identifier
    static $entity;
    if (empty($entity)) {
        mt_srand((double)microtime()*1000000);
        $entity = md5(mt_rand());
    }
    if(is_array($what)) {
        array_walk($what,'calStripSlashes');
    } else {
        // convert desired back slashes in unique string
        $what = str_replace("\\\\", $entity, $what);
        // remove all the other back slashes
        $what = stripslashes($what);
        // retransform desired back slashes
        $what = str_replace($entity, "\\", $what);
    }
    return $what;
}

#########################################################################################
function calAddSlashes($what){
    // if $what is numeric or empty, return as is
    if (is_numeric($what) || empty($what)) return $what;
    static $entity;
    if (empty($entity)) {
        // create explicit identifier
        mt_srand((double)microtime()*1000000);
        $entity = md5(mt_rand());
        }
    // if $what an array, that runs through the array
    // and call function recursive
    if (is_array($what)) {
        foreach ($what as $key => $value) {
            $what[$key] = calAddSlashes($value);
        }
    // if string
    } else {
        // convert desired back slashes in unique string
        $what = str_replace("\\\\", $entity, $what);
        // remove all the other back slashes
        $what = stripslashes($what);
        // retransform desired back slashes
        $what = str_replace($entity, "\\", $what);
        // make sure, that the correct amount of back slashes get inserted again
        $what = addslashes($what);
    }
    return $what;
}

#########################################################################################
function calPrepareDisplay() {
    // This search and replace finds the text 'x@y' and replaces
    // it with HTML entities, this provides protection against
    // email harvesters
    static $search = array('/(.)@(.)/se');
    static $replace = array('"&#" .sprintf("%03d", ord("\\1")) .";&#064;&#" .sprintf("%03d", ord("\\2")) . ";";');
    $resarray = array();
    foreach (func_get_args() as $var) {
        $var = htmlspecialchars($var, ENT_QUOTES);// Prepare var
        $var = preg_replace($search, $replace, $var);
        $var = preg_replace('/&amp;#/', '&#', $var);
        $var = str_replace("&amp;nbsp;","&nbsp;",$var);
        $var = str_replace("&amp;amp;","&amp;",$var);
        $resarray[] = $var;// Add to array
    }
    if (func_num_args() == 1) {// Return vars
        return $resarray[0];
    } else {
        return $resarray;
    }
}

#########################################################################################
function calIsPrintView() {
    return defined('CAL_PRINTERPAGE');
}

#########################################################################################
function calRedirect($url, $message = "", $delay = 3) {
    $url = str_replace('&amp;','&',$url);
    if (function_exists('mxRedirect')) {
        mxRedirect($url, $message, $delay);
    } else {
        @session_write_close();
        header("Location: ".$url);
    }
    exit;
}

#########################################################################################
if (!function_exists('mxDemoMode')) {
    function mxDemoMode() {
        return false;
    }
}

?>