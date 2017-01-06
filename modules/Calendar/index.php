<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: index.php,v 20.23 2004/08/23 14:44:50 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : index.php
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
/* the Free Software Foundation; either version 2 OR a newer version.   */
/************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       10/01/2005
 ************************************************************************/

if (!defined('MODULE_FILE')) {
   die ("You can't access this file directly...");
}

define('CAL_MODULE_NAME',basename(dirname(__FILE__)));
define('CAL_MODULE_PATH','modules/'.CAL_MODULE_NAME.'/');

if (!isset($calconf)) {
    @include(CAL_MODULE_PATH.'config/config.php');
}

if (!defined('CAL_TABLE_EVENTS')) {
    @include_once(CAL_MODULE_PATH.'includes/functions.php');
}

get_lang(CAL_MODULE_NAME);

global $popupwidth, $popupdelay;

#########################################################################################
function calsearchform($req) {
    global $bgcolor1, $bgcolor2, $bgcolor3, $textcolor1, $textcolor2, $calconf;
    #mxDebugFuncVars($req);
    OpenTable();
    echo ""
    ."<form method=\"post\" action=\"modules.php?name=".CAL_MODULE_NAME."&amp;op=result\" name=\"searchform\" id=\"searchform\" style=\"margin-bottom: 0px;\">"
    ."<input type=\"hidden\" name=\"name\" value=\"".CAL_MODULE_NAME."\">"
    ."<input type=\"hidden\" name=\"op\" value=\"result\">"
    ."<div align=\"center\" class=\"title\">"._CALSEARCHTITLE."</div><br />"
    ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" align=\"center\">";

    echo "<tr>"
        ."<td nowrap><span class=\"content\"><strong>"._CALSEARCH."&nbsp;"._CALFOR."</strong>:</span></td>"
        ."<td colspan=\"2\">"
            ."<input type=\"text\" name=\"query\" id=\"query\" size=\"30\" maxlength=\"50\" value=\"". calPrepareDisplay(stripslashes($req['query']))."\">"
            ."&nbsp;<select name=\"bool\" size=\"1\">"
            ."<option value=\"AND\"".(($req['bool']=='AND') ? ' selected' : '').">"._CALALLWORDS."</option>"
            ."<option value=\"OR\"".(($req['bool']=='OR') ? ' selected' : '').">"._CALANYWORDS."</option>"
            ."</select>"
        ."</td>"
    ."</tr>";

    echo "<tr>"
        ."<td nowrap><span class=\"content\"><strong>"._CALSEFROMDATE."</strong>:</span></td>"
        ."<td nowrap>";
        if (_CALINTERNATIONALDATES) {
            echo calBuiltDaySelect("sday",$req['sday']); 
            echo calBuiltMonthSelect("smon",$req['smon']); 
        } else {
            echo calBuiltMonthSelect("smon",$req['smon']); 
            echo calBuiltDaySelect("sday",$req['sday']); 
        }
        echo calBuiltYearSelect("syea",$req['syea']);
        echo "</td>"
        ."<td rowspan=\"3\" valign=\"bottom\"><input type=\"submit\" value=\" "._CALSEARCH." \"></td>"
    ."</tr>";
    $catselect = calBuildCategorieSelect($req['categorie']);
    if ($catselect) {
        echo "<tr>"
        ."<td nowrap><span class=\"content\"><strong>"._CALINTHIS."&nbsp;"._CALBARCOLORTEXT."</strong>:</span></td>"
        ."<td>".$catselect."</td>"
        ."</tr>";
        #."<tr><td colspan=\"2\">".calBuildColorLegend('form',1,0,$req['categorie'])."&nbsp;</td></tr>"
    }
    if ($calconf['usetopics'] && $calconf['searchTopics']) {
        $topselect = calBuildTopicsSelect($req['topic'], 'forsearch');
        if ($topselect) {
            echo "<tr>"
            ."<td nowrap><span class=\"content\"><strong>"._CALINTHIS."&nbsp;"._CALTOPIC."</strong>:</span></td>"
            ."<td>".$topselect."</td>"
            ."</tr>";
        }
    }

    #echo "<tr><th colspan=\"2\"><input type=\"submit\" value=\""._CALSEARCH."\"></th></tr>";
    echo "</table>"
    ."</form>";
    CloseTable();
    echo "\n<script language='JavaScript' type='text/javascript'>\n<!--\ndocument.searchform.query.focus();\n//-->\n</script>\n";
    echo "<br />";
}

#########################################################################################
function calSearch($req) {
    global $bgcolor1, $bgcolor2, $bgcolor3, $textcolor1, $textcolor2, $calconf;
    $req = calgetsearchrequest($req);
    calBuildModusselectors($req['op'], $req['sday'], $req['smon'], $req['syea']);
    echo "<br />";
    calsearchform($req);
}

#########################################################################################
function calgetsearchrequest($req) {
    $req['query'] = (empty($req['query'])) ? '' : calAddSlashes(substr(strip_tags($req['query']),0,50));
    $req['bool']  = (empty($req['bool']))  ? 'AND' : $req['bool'];
    $req['bool']  = ($req['bool']=='AND')  ? 'AND' : 'OR';
    $req['topic'] = (empty($req['topic'])) ? 0 : intval($req['topic']);
    $req['sday'] = (empty($req['sday'])) ? intval($req['d']) : intval($req['sday']);
    $req['smon'] = (empty($req['smon'])) ? intval($req['m']) : intval($req['smon']);
    $req['syea'] = (empty($req['syea'])) ? intval($req['y']) : intval($req['syea']);
    $req['categorie'] = (empty($req['categorie'])) ? intval($req['col']) : intval($req['categorie']);
    return $req;
}

#########################################################################################
function calBuildSearchResult($req) {
    global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $textcolor1, $textcolor2, $calconf;
    global $datestampnext, $icount, $excludes; //  fuer Liste!

    $req = calgetsearchrequest($req);

    $words = explode(' ',$req['query']);
    foreach($words as $word) {
        $word = trim($word);
        if ($word) {
            $part[] = "(hometext LIKE '%".$word."%' OR title LIKE '%".$word."%')";
            $newwords[] = $word;
        }
    }

    $qrycat = (empty($req['categorie'])) ? calGetSqlEventpoints() : calGetSqlEventpoints($req['categorie']);
    $qrydate = $req['syea']."-".$req['smon']."-".$req['sday'];

    $whereoption  = " categorie in(".$qrycat.") AND activ=1";
    $whereoption .= " AND (startDate >= '".$qrydate."' OR endDate >= '".$qrydate."')";
    if ($req['topic']) {
        $whereoption .= ' AND topic='.$req['topic'].' ';
    }
    if (isset($part)) {
        $req['query'] = implode(' ',$newwords); // neu fuer Suchformular
        $whereoption .= ' AND ('.implode(' '.$req['bool'].' ',$part).') ';
    }

    $orgconflistcount = $calconf['listcount']; // zum test ob mehr ergebnisse vorhanden sind erhoehen
    $calconf['listcount'] = $calconf['searchcount'] + 1;
    #$GLOBALS['mxSqlDebug'] =1;

    extract($req);
    calBuildModusselectors($req['op'], $req['sday'], $req['smon'], $req['syea']);
    echo "<br />";
    calsearchform($req);
    OpenTable();
    echo "<div align=\"center\" class=\"title\">"._CALCQUEUE."</div>";
    echo calEventsList($whereoption);
    if ($icount > $calconf['searchcount']) {
        OpenTable2();
        echo "<div align=\"center\" class=\"title\">"._CALTOMUCH1.$calconf['searchcount']._CALTOMUCH2."</div>";
        CloseTable2();
        echo "<br />";
    }
    CloseTable();
    $calconf['listcount'] = $orgconflistcount;
    #$GLOBALS['mxSqlDebug'] =0;

    return;
}

#########################################################################################
function calBuiltNextEventsList($req) {
    global $db, $calconf;
    global $datestampnext, $icount, $excludes; //  fuer Liste!
    #mxDebugFuncVars($req);
    extract($req);
    if (!isset($caldotcolor)) $caldotcolor = calGetDotColors();
    include(CAL_MODULE_PATH.'config/configcolors.php');
    setlocale (LC_TIME, _CALLOCALE);
    #$calIsAdmin=calIsAdmin();

    $icount = 0;
    $qryexclude = '';
    $qrydate = "$y-$m-$d";
    $qrycat = (empty($col)) ? calGetSqlEventpoints() : calGetSqlEventpoints($col);

    if (isset($xn)) {
        $xn = urldecode($xn);
        if (is_numeric(str_replace('.','',$xn))) {
            $qryexclude = ' AND eid NOT in('.str_replace('.',',',$xn).')';
        }
    }

    if (isset($xp)) {
        $xp = urldecode($xp);
        if (is_numeric(str_replace('.','',$xp))) {
            $qryexclude = ' AND eid NOT in('.str_replace('.',',',$xp).')';
        }
        $qry="SELECT startDate
        FROM ".CAL_TABLE_EVENTS."
        WHERE (startDate <= '".$qrydate."' OR endDate <= '".$qrydate."') AND categorie in(".$qrycat.") AND activ=1 ".$qryexclude." 
        ORDER BY startDate DESC, endDate DESC
        LIMIT 0,".$calconf['listcount']."";
        #print "<br />$qry<br />";
        $result=$db->sql_query($qry);
        // bis zum letzten Datensatz, der mit dem niedrigsten Datum
        while (list($dbqrydate) = $db->sql_fetchrow($result)) {
            if (!empty($dbqrydate)) $yqrydate[] = $dbqrydate;
        }

        if (empty($yqrydate)) {
            $noevents = 1;
        } else {
            $qrydate = end($yqrydate);
            preg_match("/([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})/", $qrydate, $tmp);
            #$tmp = explode("-",$qrydate);
            $y = intval($tmp[1]);
            $m = intval($tmp[2]);
            $d = intval($tmp[3]);
        }
    }

    $reqdate = @mktime(0, 0, 0, $m, $d, $y);
    $curdate = ("$y$m$d" == Date("Ymd")) ? _CALTODAY : strftime(_CALSHORTDATEFORMAT, $reqdate);
    $linkdate = "&amp;d=$d&amp;m=$m&amp;y=$y";

    if (empty($noevents)) {
        $whereoption = "(startDate >= '".$qrydate."' OR endDate >= '".$qrydate."') AND categorie in(".$qrycat.") AND activ=1 ".$qryexclude."";
        $listout = calEventsList($whereoption);
    } else {
        $listout = "<br /><br /><span class=\"content\"><strong>"._CAL0EVENTS.".</strong></span><br /><br />";
    }
    calBuildModusselectors($op, $d, $m, $y);
    echo "<br />";
    OpenTable();
    echo "<center><span class=\"title\"><strong>"._CALLISTDESCRIPTION1." ".$icount."&nbsp;"._CALLISTDESCRIPTION2.", "._CALLISTSTART." ".$curdate.".</strong></span></center><br />\n";
    echo calBuildColorLegend("legend", 1, 0, $col, $linkdate);
    echo "<br />";

    echo $listout;

    if (!calIsPrintView()) {
        $nexttext = "".$calconf['listcount']." "._CALNAVINEXT."<img src=\"".CAL_IMAGE_PATH."next.gif\" width=\"16\" height=\"14\" border=\"0\" hspace=\"5\" alt=\"".$calconf['listcount']." "._CALNAVINEXT."\">";
        $prevtetx = "<img src=\"".CAL_IMAGE_PATH."back.gif\" width=\"16\" height=\"14\" border=\"0\" hspace=\"5\" alt=\"".$calconf['listcount']." "._CALNAVIPREV."\">".$calconf['listcount']." "._CALNAVIPREV."";
        $excludi = (isset($excludes)) ? urlencode(implode('.',$excludes)) : "";
        #mxDebugFuncVars($excludes);
        if ($icount >= $calconf['listcount'] || isset($xp)) {
            $dnext = (empty($datestampnext)) ? $d : (int)Date("d", $datestampnext);
            $mnext = (empty($datestampnext)) ? $m : (int)Date("m", $datestampnext);
            $ynext = (empty($datestampnext)) ? $y : (int)Date("Y", $datestampnext);
            $navinext = "<a href=\"".CAL_MODULE_LINK."&amp;op=list&amp;d=$dnext&amp;m=$mnext&amp;y=$ynext&amp;col=$col&amp;xn=$excludi#caltop\">$nexttext</a>";
        } else {
            $navinext = $nexttext;
        }
        if (!empty($icount) || isset($xn) || (empty($icount) && !isset($xp))) {
            $naviprev = "<a href=\"".CAL_MODULE_LINK."&amp;op=list&amp;d=$d&amp;m=$m&amp;y=$y&amp;col=$col&amp;xp=$excludi#caltop\">$prevtetx</a>";
        } else {
            $naviprev = $prevtetx;
        }

        echo "\n<table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\">\n<tr>\n";
        echo "<td nowrap><span class=\"content\">$naviprev &nbsp;|&nbsp; $navinext</span></td>\n";
        echo "<td align=\"right\" nowrap><br /><span class=\"tiny\"><a href=\"http://www.pragmamx.org\" target=\"_blank\" class=\"tiny\" style=\"text-decoration: none; font-weight: lighter;\" title=\"KalenderMx v".CAL_VERSION." by shiba-design.de\">&copy; &AElig;</a></span></td>\n";
        echo "</tr>\n</table>\n";
    }
    CloseTable();
    setlocale (LC_TIME, $GLOBALS['locale']);
}

#########################################################################################
function calEventsList($whereoption) {
    global $db, $calconf, $admin_file;
    global $datestampnext, $icount, $excludes;
    include(CAL_MODULE_PATH.'config/configcolors.php');
    $calIsAdmin=calIsAdmin();

    $timebreak = ($calconf['listBrTime']) ? "<br />" : "";
    $icolor = 0;
    $imgprops= "align=\"middle\" hspace=\"6\" vspace=\"4\" width=\"9\" height=\"9\" border=\"0\"";
    $listtablecellspacing = (calIsPrintView()) ? 0 : $listtablecellspacing;
    $listout = "<table class=\"tblistview\" width=\"100%\" border=\"$listtableborder\" cellspacing=\"$listtablecellspacing\" cellpadding=\"$listtablecellpadding\" style=\"background-color: $listbordercolor;  border: ${listtableborder}px solid $listbordercolor;\">";
    if (!calIsPrintView()) {
        if ($calconf['listEnddate']) {
            $listout .= "<tr style=\"background-color: $listheadbgcolor;\"><td colspan=\"3\" width=\"25%\"><span style=\"color: $listheadtxtcolor;\" class=\"content\"><strong>"._CALEVENTDATETEXT."</strong></span></td><td width=\"75%\"><span style=\"color: $listheadtxtcolor;\" class=\"content\"><strong>"._CALSUBTITLE."</strong></span></td></tr>";
        } else {
            $listout .= "<tr style=\"background-color: $listheadbgcolor;\"><td width=\"10%\"><span style=\"color: $listheadtxtcolor;\" class=\"content\"><strong>"._CALEVENTDATETEXT."</strong></span></td><td width=\"90%\"><span style=\"color: $listheadtxtcolor;\" class=\"content\"><strong>"._CALSUBTITLE."</strong></span></td></tr>";
        }
        if ($calconf['ShowPopup']) {
            calOverlibDiv();
            $cal_overlib = new Overlib();
            $cal_overlib -> ol_width = $popupwidth;
            $cal_overlib -> ol_delay = $popupdelay;
            $cal_overlib -> ol_hauto = "True";
            $cal_overlib -> ol_vauto = "True";
        }
    }
    $qry="SELECT eid, aid, title, hometext, topic, informant, year(startDate), month(startDate), dayofmonth(startDate), hour(startTime), minute(startTime), year(endDate), month(endDate), dayofmonth(endDate), hour(endTime), minute(endTime), alldayevent, categorie FROM ".CAL_TABLE_EVENTS." 
    WHERE $whereoption 
    ORDER BY startDate, startTime, endDate 
    LIMIT 0,".$calconf['listcount']."";
    #print "<br />$qry<br />";
    $result=$db->sql_query($qry);
    if (!$result) {
        $mmsg = (calIsAdmin()) ? '<br /><br /><a href='.$admin_file.'.php?op=CalSetup><strong>goto Setup</strong></a><br /><br />' : '';
        calErrAdminMsg(_CALERRSQLERROR.$mmsg);
        }
    while(list($eid, $aid, $title, $hometext, $topic, $informant, $y1, $m1, $d1, $h1, $mi1, $y2, $m2, $d2, $h2, $mi2, $alldayevent, $categorie) = $db->sql_fetchrow($result)) {
        $icount++;
        $title = calPrepareDisplay(strip_tags($title));
        $categorie = calGetCurrentEventPoint($categorie);
        $categoriealt = calGetBarColorAlt ($categorie);
        $popuptext = "";
        if (calIsPrintView()) {
            $title = "<strong>".$title."</strong>";
            $hometext = ($hometext) ? "<br />".$hometext : "";
        } else {
            if ($calconf['ShowPopup']) {
                $hometext = ($hometext) ? $categoriealt.":<br />".$hometext : $categoriealt;
                $cal_overlib -> ol_capicon = "".calGetBarImage("ball", $categorie)."";
                $popuptext = $cal_overlib -> vover(calValueToText($hometext),calValueToText($title));
            }
        }
        $excludes[] = $eid; // vor/zurueck Ausschluss
        $timestamp = @mktime(0, 0, 0, $m1, $d1, $y1);

        $datestampnext = (empty($datestampnext)) ? $timestamp : $datestampnext; 
        $datestampnext = ($datestampnext > $timestamp) ? $datestampnext : $timestamp;

        $dateStart = strftime(_CALSHORTDATEFORMAT, $timestamp);
        if ($calconf['listshowlinks']) {
            $dateStart = "<a href=\"".CAL_MODULE_LINK."&amp;m=".$m1."&amp;d=".$d1."&amp;y=".$y1."&amp;op=day\" title=\""._CALDAYLINK."\">".$dateStart."</a>";
        }
        if ($calconf['listStarttime'] && !$alldayevent) {
            $dateStart.= " ".$timebreak."<span class=\"tiny\">".strftime(_CALTIMEFORMAT, @mktime($h1, $mi1, 0, $m1, $d1, $y1))."</span>";
        }

        $dateEnd = strftime(_CALSHORTDATEFORMAT, @mktime(0, 0, 0, $m2, $d2, $y2));
        if ($calconf['listshowlinks']) {
            $dateEnd = "<a href=\"".CAL_MODULE_LINK."&amp;m=".$m2."&amp;d=".$d2."&amp;y=".$y2."&amp;op=day\" title=\""._CALDAYLINK."\">".$dateEnd."</a>";
        }
        if ($calconf['listEndtime'] && !$alldayevent) {
            if (!$calconf['listEnddate2'] && $m1 == $m2 && $d1 == $d2 && $y1 == $y2) { $dateEnd = ""; }
            $dateEnd.= " ".$timebreak."<span class=\"tiny\">".strftime(_CALTIMEFORMAT, @mktime($h2, $mi2, 0, $m2, $d2, $y2))."</span>";
        }
        $bgcolornew = ($icolor==0) ? $listbgcolor1 : $listbgcolor2;
        $txtcolornew = ($icolor==0) ? $listtxtcolor1 : $listtxtcolor2;
        $icolor = ($icolor==0) ? 1 : 0;
        $listout .= "<tr valign='top' style=\"background-color: $bgcolornew;\">";
        if ($calconf['listEnddate']) {
            $listout .= "<td nowrap class='tdlistview'><span style=\"color: $txtcolornew;\" class=\"content\">".$dateStart."</span></td>";
            $listout .= "<td align='center' class='tdlistview'><span style=\"color: $txtcolornew;\" class=\"tiny\">"._CALLISTRANGE."</span></td>";
            $listout .= "<td nowrap class='tdlistview'><span style=\"color: $txtcolornew;\" class=\"content\">".$dateEnd."</span></td>";
        } else {
            $listout .= "<td nowrap class='tdlistview'><span style=\"color: $txtcolornew;\" class=\"content\">".$dateStart."</span></td>";
        }
        $listout .= "<td class='tdlistview'><span style=\"color: $txtcolornew;\" class=\"content\">";
        if ($calIsAdmin && !calIsPrintView()) {
            $listout .= "<a href=\"".$admin_file.".php?op=CalendarDeleteEvent&amp;eid=$eid\"><img src=\"".CAL_IMAGE_PATH."delete.gif\" alt=\""._CALDELETESTORY."\" width=\"20\" height=\"16\" border=\"0\" align=\"right\"></a>";
            $listout .= "<a href=\"".$admin_file.".php?op=CalendarEditEvent&amp;eid=$eid\"><img src=\"".CAL_IMAGE_PATH."edit.gif\" alt=\""._EDIT."\" width=\"19\" height=\"17\" border=\"0\" align=\"right\"></a>";
        }
        $listout .= "<img src=\"".calGetBarImage("ball",$categorie)."\" alt=\"".$categoriealt."\" title=\"".$categoriealt."\" ".$imgprops.">&nbsp;";
        $listout .= "<a href=\"".CAL_MODULE_LINK."&amp;op=view&amp;eid=".$eid."\" ".$popuptext.">".$title."</a></span>";
        if (calIsPrintView()) {
            $listout .= $hometext;
        }
        $listout .= "</td></tr>";
    }
    $listout .= "</table>";

    $icount = (empty($icount)) ? 0 : $icount;
    if (empty($icount)) {
        $listout = "<br /><br /><span class=\"content\"><strong>"._CAL0EVENTS.".</strong></span><br /><br />";
    }
    return $listout;
}

#########################################################################################
function calBuiltMonth($req) {
    global $db, $calconf, $admin_file;#, $op, $caldotcolor;
    extract($req);
    if (!isset($caldotcolor)) $caldotcolor = calGetDotColors();
    include(CAL_MODULE_PATH.'config/configcolors.php');
    if (!calDetectGoodBrowser() || calIsPrintView()) { $calconf['TextEvents'] = 1; }

    /**** Get todays date */
    $Today_d = (int)Date("d");
    $Today_m = (int)Date("m");
    $Today_y = (int)Date("Y");

    $pd = @mktime(0, 0, 0, $m - 1, $d, $y);
    $Prev_Date="m=".Date("m",$pd)."&amp;d=".Date("d",$pd)."&amp;y=".Date("Y",$pd);
    $var = (Date("Y",$pd)!=$y) ? " ".Date("Y",$pd) : "";
    $Prev_Month = calGetMonthName(Date("m",$pd)).$var;

    $nd = @mktime(0, 0, 0, $m + 1, $d, $y);
    $Next_Date="m=".Date("m",$nd)."&amp;d=".Date("d",$nd)."&amp;y=".Date("Y",$nd);
    $var = (Date("Y",$nd)!=$y) ? " ".Date("Y",$nd) : "";
    $Next_Month = calGetMonthName(Date("m",$nd)).$var;

    $showmonth = calGetMonthName($m)." $y";

    /**** Get the Day (Integer) for the first day in the month */
    $First_Day_of_Month_Date = @mktime(0, 0, 0, $m, 1, $y);
    $Day_of_First_Week = Date("w",$First_Day_of_Month_Date)-_CALWEEKBEGINN;
    if ($Day_of_First_Week < 0) $Day_of_First_Week = 6;
    /**** Find the last day of the month */
    $lastday = (int)Date("t",$First_Day_of_Month_Date);
    /**** Set up data */

    $picheight = 9;
    calBuildModusselectors($op, $d, $m, $y);
    echo "<br />";
    if (!calIsPrintView() && $calconf['ShowPopup']) {
        calOverlibDiv();
        $cal_overlib = new Overlib();
        $cal_overlib -> ol_width = $popupwidth;
        $cal_overlib -> ol_delay = $popupdelay;
        $cal_overlib -> ol_hauto = "True";
        $cal_overlib -> ol_vauto = "True";
    }
    $result = $db->sql_query("SELECT eid,title,hometext,startDate,endDate,categorie FROM ".CAL_TABLE_EVENTS." 
    WHERE (((startDate >= '$y-$m-1' AND startDate <= '$y-$m-$lastday') 
    OR (endDate >= '$y-$m-1' AND endDate <= '$y-$m-$lastday') 
    OR (endDate >= '$y-$m-$lastday' AND startDate <= '$y-$m-1')) 
    AND alldayevent=1) 
    AND (categorie in(".calGetSqlEventpoints().")) 
    AND activ=1
    ORDER BY startDate ASC");
    if (!$result) {
        $mmsg = (calIsAdmin()) ? '<br /><br /><a href='.$admin_file.'.php?op=CalSetup><strong>goto Setup</strong></a><br /><br />' : '';
        calErrAdminMsg(_CALERRSQLERROR.$mmsg);
    }
    $count = -1;
    while(list($arr_eid[], $arr_title[], $arr_hometext[], $arr_startDate[], $arr_endDate[], $arr_categorie[]) = $db->sql_fetchrow($result)) {
        $count++;
    }
    /**** Build Month */
    $tdwidth = (int)(100 / 7);
    $tblwidth = 7 * $tdwidth;
    OpenTable();
    echo "<center>";
    echo "\n<table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\">\n<tr valign=\"top\">";
    if (!calIsPrintView()) echo "<td width=\"25%\" nowrap><a href=\"".CAL_MODULE_LINK."&amp;$Prev_Date&amp;op=month\" title=\"".$Prev_Month."\"><span class=\"content\"><img src=\"".CAL_IMAGE_PATH."back.gif\" alt=\"".$Prev_Month."\" width=\"16\" height=\"14\" border=\"0\" hspace=\"5\">".$Prev_Month."</span></a></td>\n";
    echo "<td width=\"50%\" align=\"center\" nowrap><span class=\"title\"><strong>".$showmonth."</strong></span></td>\n";
    if (!calIsPrintView()) echo "<td width=\"25%\" align=\"right\" nowrap><a href=\"".CAL_MODULE_LINK."&amp;$Next_Date&amp;op=month\" title=\"".$Next_Month."\"><span class=\"content\">".$Next_Month."<img src=\"".CAL_IMAGE_PATH."next.gif\" alt=\"".$Next_Month."\" width=\"16\" height=\"14\" border=\"0\" hspace=\"5\"></span></a></td>\n";
    echo "</tr>\n</table>\n";
    echo "<table style=\"background-color: $monthtablebgcolor;\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" width=\"${tblwidth}%\" class=\"tbmonthview\">";
    $day_of_week = 1;

    echo "<tr style=\"background-color: $monthheadbgcolor;\">
        <th width=\"$tdwidth%\" class=\"thmonthview\"><span style=\"color: $monthheadtxtcolor;\" class=\"content\">"._CALFIRSTDAY."</span></th>
        <th width=\"$tdwidth%\" class=\"thmonthview\"><span style=\"color: $monthheadtxtcolor;\" class=\"content\">"._CALSECONDDAY."</span></th>
        <th width=\"$tdwidth%\" class=\"thmonthview\"><span style=\"color: $monthheadtxtcolor;\" class=\"content\">"._CALTHIRDDAY."</span></th>
        <th width=\"$tdwidth%\" class=\"thmonthview\"><span style=\"color: $monthheadtxtcolor;\" class=\"content\">"._CALFOURTHDAY."</span></th>
        <th width=\"$tdwidth%\" class=\"thmonthview\"><span style=\"color: $monthheadtxtcolor;\" class=\"content\">"._CALFIFTHDAY."</span></th>
        <th width=\"$tdwidth%\" class=\"thmonthview\"><span style=\"color: $monthheadtxtcolor;\" class=\"content\">"._CALSIXTHDAY."</span></th>
        <th width=\"$tdwidth%\" class=\"thmonthview\"><span style=\"color: $monthheadtxtcolor;\" class=\"content\">"._CALSEVENTHDAY."</span></th>
    </tr>";

    /**** Previous Greyed month days */
    while ($day_of_week < ($Day_of_First_Week + 1)) {
        if ($day_of_week == 1) {
            echo "\n<tr valign=\"top\">";
        }
        $Tmp_Date = @mktime(0, 0, 0, $m, 1 - (($Day_of_First_Week + 1) - $day_of_week), $y);
        $Tmp_Day = Date("d",$Tmp_Date);
        echo "<td style=\"background-color: $monthshadedbgcolor;\" align=\"center\" height=\"$monthdayheigth\" class=\"tdmonthview2\"><span style=\"color: $monthshadedtextcolor;\" class=\"content\">$Tmp_Day</span></td>";
        $day_of_week += 1;
    }
    $usedcount = 0;
    $cellcount = 0;
    /**** Build Current Month */
    for ($day = 1 ; $day <= $lastday ; $day++) {
        if ($day_of_week == 1) {
            echo "\n<tr valign=\"top\">";
        }
        $xDate = @mktime(0, 0, 0, $m, $day, $y);
        $xday = getdate($xDate);
        if (($day == $Today_d) && ($m == $Today_m) && ($y == $Today_y)) {
            $bcol = $monthcurdaybgcolor;
            $tcol = $monthcurdaytxtcolor;
        } else if ($xday['weekday']=="Sunday") {
            $bcol = $monthsundaybgcolor;
            $tcol = $monthsundaytxtcolor;
        } else {
            $bcol = $monthbgcolor;
            $tcol = $monthtextcolor;
        }
        echo "\n<td height=\"$monthdayheigth\" style=\"background-color: $bcol;\" class=\"tdmonthview1\"><center><a href=\"".CAL_MODULE_LINK."&amp;m=$m&amp;d=$day&amp;y=$y&amp;op=day\"><span style=\"color: $tcol;\" class=\"content\"><strong>$day</strong></span></a></center>";
        /************************/
        /**** SET UP DATA!!! ****/
        /************************/
        /**** Reset Cell Array */
        $cellDate = @mktime (0, 0, 0, $m, $day, $y);
        for ($i=0;$i <= $cellcount - 1;$i++) {
            $tmpEndDate_Array = explode("-", $cellArrayEndDate[$i]);
            $tmpEndDate = @mktime (0, 0, 0, $tmpEndDate_Array[1], $tmpEndDate_Array[2], $tmpEndDate_Array[0]);
            if ($tmpEndDate < $cellDate) {
                $cellArray[$i] = "FALSE";
            }
        }
        /**** Clean out Cell Array */
        if ($cellcount != 0) {
            $j = $cellcount;
            for ($i=$cellcount - 1;$i >= 0;$i--) {
                if ($cellArray[$i] == "FALSE") {
                    Array_pop($cellArray);
                    Array_pop($cellArrayTitle);
                    Array_pop($cellArrayEventDate);
                    Array_pop($cellArrayEndDate);
                    Array_pop($cellArrayBarColor);
                    Array_pop($cellArrayDesc);
                    $j--;
                } else {
                    break;
                }
            }
            $cellcount = $j;
        }
        /**** Add neccessary additions to cellArray */
        if (isset($arr_startDate[$usedcount])) {
            while ((strtotime($arr_startDate[$usedcount]) <= strtotime("$y-$m-$day")) && ($usedcount <= $count)) {
                $added = "FALSE";
                /**** First Try to find a spot in the cell for the event */
                for ($i=0;$i <= $cellcount - 1;$i++) {
                    if ($cellArray[$i] == "FALSE") {
                        /**** Found spot in cellArray */
                        $cellArray[$i] = $arr_eid[$usedcount];
                        $cellArrayTitle[$i] = $arr_title[$usedcount];
                        $cellArrayEventDate[$i] = $arr_startDate[$usedcount];
                        $cellArrayEndDate[$i] = $arr_endDate[$usedcount];
                        $cellArrayBarColor[$i] = $arr_categorie[$usedcount];
                        $cellArrayDesc[$i] = $arr_hometext[$usedcount];
                        $added = "TRUE";
                        break 1;
                    }
                }
                /**** If all spots are taken in the current cellArray then add it to the end */
                if ($added == "FALSE") {
                    $cellArray[] = $arr_eid[$usedcount];
                    $cellArrayTitle[] = $arr_title[$usedcount];
                    $cellArrayEventDate[] = $arr_startDate[$usedcount];
                    $cellArrayEndDate[] = $arr_endDate[$usedcount];
                    $cellArrayBarColor[] = $arr_categorie[$usedcount];
                    $cellArrayDesc[] = $arr_hometext[$usedcount];
                    $cellcount++;  /**** Increase cell count since added to the end of the array */
                }
                $usedcount++;
                if (empty($arr_startDate[$usedcount])) break;
            }
        }
        /**************************************/
        /**** INSERT DATA INTO CALENDAR!!! ****/
        /**************************************/
        for ($i=0; $i <= $cellcount - 1; $i++) {
            $categorie = calGetCurrentEventPoint($cellArrayBarColor[$i]);
            $popuptext = "";
            if (!calIsPrintView() && $calconf['ShowPopup']) {
                $categoriealt = calGetBarColorAlt($categorie);
                $poptitle = calValueToText($cellArrayTitle[$i]);
                $poptext = ($cellArrayDesc[$i]) ? calValueToText("$categoriealt:<br />$cellArrayDesc[$i]") : calValueToText($categoriealt);
                $cal_overlib -> ol_capicon = "".calGetBarImage("ball", $categorie)."";
                $popuptext = $cal_overlib -> vover($poptext,$poptitle);
            }
            if (!$calconf['TextEvents']) {
                echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr $popuptext>";
            }

            if ($cellArray[$i] != "FALSE") {
                $link="".CAL_MODULE_LINK."&amp;op=view&amp;eid=$cellArray[$i]";
                $tmpEventDate_Array = explode("-", $cellArrayEventDate[$i]);
                $tmpEventDate = @mktime (0, 0, 0, $tmpEventDate_Array[1], $tmpEventDate_Array[2], $tmpEventDate_Array[0]);
                $tmpEndDate_Array = explode("-", $cellArrayEndDate[$i]);
                $tmpEndDate = @mktime (0, 0, 0, $tmpEndDate_Array[1], $tmpEndDate_Array[2], $tmpEndDate_Array[0]);
                if ($calconf['TextEvents']) {
                    echo "<img src=\"".calGetBarImage("ball",$categorie)."\" height=\"".$picheight."\" width=\"".$picheight."\" border=\"0\" hspace=\"2\" alt=\"\"><a href=\"$link\" $popuptext><span class=\"tiny\">".$cellArrayTitle[$i]."</span></a><br />";
                } else {
                    if (($cellDate == $tmpEndDate) && ($tmpEndDate == $tmpEventDate)) {
                        echo "<td height=\"".$picheight."\"><a href=\"$link\"><img src=\"".calGetBarImage("leftbar",$categorie)."\" height=\"".$picheight."\" width=\"40\" border=\"0\"></a></td><td align=\"left\" width=\"100%\" background=\"".calGetBarImage("mainbar",$categorie)."\"><a href=\"$link\"><img src=\"".calGetBarImage("mainbar",$categorie)."\" height=\"".$picheight."\" width=\"100%\" border=\"0\"></a></td><td align=\"right\"><img src=\"".calGetBarImage("rightbarcap",$categorie)."\" height=\"".$picheight."\" width=\"5\" border=\"0\"></td>";
                    } elseif ($cellDate == $tmpEventDate) {
                        echo "<td height=\"".$picheight."\"><a href=\"$link\"><img src=\"".calGetBarImage("leftbar",$categorie)."\" height=\"".$picheight."\" width=\"40\" border=\"0\"></a></td><td align=\"left\" width=\"100%\" background=\"".calGetBarImage("mainbar",$categorie)."\"><a href=\"$link\"><img src=\"".calGetBarImage("mainbar",$categorie)."\" height=\"".$picheight."\" width=\"100%\" border=\"0\"></a></td>";
                    } elseif ($cellDate == $tmpEndDate) {
                        echo "<td align=\"right\" width=\"100%\" background=\"".calGetBarImage("mainbar",$categorie)."\" height=\"".$picheight."\"><a href=\"$link\"><img src=\"".calGetBarImage("mainbar",$categorie)."\" height=\"".$picheight."\" width=\"100%\" border=\"0\"></a></td><td><a href=\"$link\"><img src=\"".calGetBarImage("rightbar",$categorie)."\" height=\"".$picheight."\" width=\"40\" border=\"0\"></a></td>";
                    } else {
                        if ($day == 1) {
                            echo "<td height=\"".$picheight."\"><a href=\"$link\"><img src=\"".calGetBarImage("leftbar",$categorie)."\" height=\"".$picheight."\" width=\"40\" border=\"0\"></a></td><td align=\"left\" width=99% background=\"".calGetBarImage("mainbar",$categorie)."\"><a href=\"$link\"><img src=\"".calGetBarImage("mainbar",$categorie)."\" height=\"".$picheight."\" width=\"100%\" border=\"0\"></a></td>";
                        } else {
                            echo "<td align=\"center\" background=\"".calGetBarImage("mainbar",$categorie)."\" height=\"".$picheight."\"><a href=\"$link\"><img src=\"".calGetBarImage("mainbar",$categorie)."\" height=\"".$picheight."\" width=\"100%\" border=\"0\"></a></td>";
                        }
                    }
                }
            } else {
                if (!$calconf['TextEvents']) {
                    echo "<td width=\"100%\"><img src=\"".CAL_IMAGE_PATH."blankbar.gif\" height=\"".$picheight."\" border=0></td>";
                }
            }
            if (!$calconf['TextEvents']) {
                echo "</tr></table>";
            }
        }
        $cevents = 0;
        $onedayevents = ($calconf['TextEvents']) ? "" : "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">";
        $resultAPPT = $db->sql_query("SELECT eid,title,hometext,startDate,endDate,startTime,endTime,categorie FROM ".CAL_TABLE_EVENTS." 
        WHERE (startDate <= '$y-$m-$day' 
        AND endDate >= '$y-$m-$day' 
        AND alldayevent='0') 
        AND (categorie in(".calGetSqlEventpoints().")) 
        AND activ=1
        ORDER BY startTime, endTime ASC");
        while(list($eid, $title, $hometext, $startDate, $endDate, $startTime, $endTime, $categorie) = $db->sql_fetchrow($resultAPPT)) {
            $cevents ++;
            $title = strip_tags($title);
            #$hometext = calPrepareDisplay($hometext);
            $startTime = calGetTimeFormated($startTime);
            $endTime = ($startDate != $endDate) ? "" : "-".calGetTimeFormated($endTime);
            $categorie = calGetCurrentEventPoint($categorie);
            $popuptext = "";
            if (!calIsPrintView() && $calconf['ShowPopup']) {
                $categoriealt = calGetBarColorAlt($categorie);
                $poptitle = calValueToText($title);
                $poptext = ($hometext) ? calValueToText("$categoriealt:<br />$hometext") : calValueToText($categoriealt);
                $cal_overlib -> ol_capicon = "".calGetBarImage("ball", $categorie)."";
                $popuptext = $cal_overlib -> vover($poptext,$poptitle);
            }
            if ($calconf['TextEvents']) {
                $onedayevents .= "<a href=\"".CAL_MODULE_LINK."&amp;op=view&amp;eid=$eid\" $popuptext>";
                $onedayevents .= "<img src=\"".calGetBarImage("ball",$categorie)."\" height=\"".$picheight."\" width=\"".$picheight."\" border=\"0\" hspace=\"2\" alt=\"\">";
                $onedayevents .= "<span class=\"tiny\">".$startTime.$endTime."<br />$title</span></a><br />";
            } else {
                $onedayevents .= "<tr $popuptext valign=\"top\"><td width=\"".$picheight."\"><img src=\"".calGetBarImage("ball",$categorie)."\" height=\"".$picheight."\" width=\"".$picheight."\" border=\"0\" vspace=\"3\" alt=\"\"></td>";
                $onedayevents .= "<td><a href=\"".CAL_MODULE_LINK."&amp;op=view&amp;eid=$eid\">";
                $onedayevents .= "<span class=\"tiny\">".$startTime.$endTime."<br />".calPrepareDisplay($title)."</span></a></td></tr>";
            }
        }
        $onedayevents .= ($calconf['TextEvents']) ? "" : "</table>";
        if ($cevents) echo $onedayevents;

        echo "<br /></td>";
        if ($day_of_week == 7) {
            $day_of_week = 0;
            echo "\n</tr>";
        }
        $day_of_week += 1;
    }
    /**** Next Greyed month days */
    $day = 1;
    while (($day_of_week <= 7) && ($day_of_week != 1)) {
        echo "<td style=\"background-color: $monthshadedbgcolor;\" align=\"center\" class=\"tdmonthview2\"><span style=\"color: $monthshadedtextcolor;\" class=\"content\">$day</span></td>";
        $day_of_week += 1;
        $day += 1;
    }
    echo "\n</tr>\n</table><br />";
    echo "<div align=\"center\" style=\"width: ${tblwidth}%;\">";
    echo calBuildColorLegend("legend");
    echo "</div>";
    echo "</center>";
    CloseTable();
}

#########################################################################################
function calBuiltDay($req) {
    global $calconf, $db, $admin_file;#, $op;
    include(CAL_MODULE_PATH.'config/configcolors.php');
    setlocale (LC_TIME, _CALLOCALE);
    extract($req);
    $resultevents = $db->sql_query("SELECT eid,title,categorie,hometext FROM ".CAL_TABLE_EVENTS." 
    WHERE (startDate <= '$y-$m-$d' 
    AND endDate >= '$y-$m-$d' 
    AND alldayevent='1') 
    AND (categorie in(".calGetSqlEventpoints().")) 
    AND activ=1 
    ORDER BY title ASC");
    if (!$resultevents) {
        $mmsg = (calIsAdmin()) ? '<br /><br /><a href='.$admin_file.'.php?op=CalSetup><strong>goto Setup</strong></a><br /><br />' : '';
        calErrAdminMsg(_CALERRSQLERROR.$mmsg);
    }
    $pd = @mktime(0, 0, 0, $m, $d - 1, $y);
    $Prev_Date="m=".Date("m",$pd)."&amp;d=".Date("d",$pd)."&amp;y=".Date("Y",$pd);
    $nd = @mktime(0, 0, 0, $m, $d + 1, $y);
    $Next_Date="m=".Date("m",$nd)."&amp;d=".Date("d",$nd)."&amp;y=".Date("Y",$nd);
    calBuildModusselectors($op, $d, $m, $y);
    if (!calIsPrintView() && $calconf['ShowPopup']) {
        calOverlibDiv();
        $cal_overlib = new Overlib();
        $cal_overlib -> ol_width = $popupwidth;
        $cal_overlib -> ol_delay = $popupdelay;
        $cal_overlib -> ol_hauto = "True";
        $cal_overlib -> ol_vauto = "True";
    }
    echo "<br />";
    OpenTable();
    echo "\n<table width=\"100%\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\">\n<tr>";
    /**** Print Previous Day Button */
    if (!calIsPrintView()) echo "\n<td width=\"100\"><a href=\"".CAL_MODULE_LINK."&amp;$Prev_Date&amp;op=day\" title=\"".strftime(_CALLONGDATEFORMAT, $pd)."\"><span class=\"content\"><img src=\"".CAL_IMAGE_PATH."back.gif\" alt=\""._CALPREVIOUS."\" width=\"16\" height=\"14\" border=\"0\" hspace=\"5\">"._CALPREVIOUS."</span></a></td>";
    /**** Print Month Name AND Year */
    echo "\n<td align=\"center\"><span class=\"title\"><strong>";
    echo strftime(_CALLONGDATEFORMAT, @mktime(0, 0, 0, $m, $d, $y));
    echo "</strong></span></td>";
    /**** Print Next Day Button */
    if (!calIsPrintView()) echo "\n<td width=\"100\" align=\"right\"><a href=\"".CAL_MODULE_LINK."&amp;$Next_Date&amp;op=day\" title=\"".strftime(_CALLONGDATEFORMAT, $nd)."\"><span class=\"content\">"._CALNEXT."<img src=\"".CAL_IMAGE_PATH."next.gif\" alt=\""._CALNEXT."\" width=\"16\" height=\"14\" border=\"0\" hspace=\"5\"></span></a></td>";
    echo "\n</tr>\n</table><br />";
    echo "\n<table border=\"0\" cellspacing=\"1\" cellpadding=\"6\" width=\"100%\" style=\"background-color: $bgcolor2;\" class=\"tbdayview\">\n<tr>";
    /**** Appointments */
    echo "\n<td width=\"50%\" valign=\"top\" style=\"background-color: $daybgcolor;\" class=\"tbdayview\">";
    echo "\n<table width=\"100%\" style=\"background-color: $dayevebgcolor;\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\"><tr><td style=\"background-color: $dayappbgcolor;\"><span style=\"color: $dayapptxtcolor;\" class=\"content\"><strong>"._CALHEADAPPOINTM."</strong></span></td></tr></table>";
    echo "\n<span style=\"color: $dayshadetextcolor;\" class=\"content\">"._CALDAYMORNING."</span>";
    $qry = "SELECT eid, title, hometext, startDate, startTime, endDate, endTime, categorie FROM ".CAL_TABLE_EVENTS." 
    WHERE (startDate<='$y-$m-$d' 
    AND endDate >='$y-$m-$d' 
    AND alldayevent='0' 
    AND startTime < '".$calconf['TimeArray'][0]."') 
    AND activ=1
    ORDER BY startTime, endTime ASC";
    calPrintAppt($qry, $daytextcolor);
    $i = 0;
    while ($calconf['TimeArray'][$i]) {
        calAddTimeRange($calconf['TimeArray'][$i],$calconf['TimeArray'][$i+1],$y,$m,$d,$daytextcolor);
        $i++;
        if (!isset($calconf['TimeArray'][$i+1])) {
            break;
        }
    }
    echo "\n<br /><br /><span style=\"color: $dayshadetextcolor;\" class=\"content\">"._CALDAYEVENING."</span>";
    $qry = "SELECT eid, title, hometext, startDate, startTime, endDate, endTime, categorie FROM ".CAL_TABLE_EVENTS." 
    WHERE (startDate <= '$y-$m-$d' 
    AND endDate >= '$y-$m-$d' 
    AND alldayevent='0' 
    AND startTime >= '".$calconf['TimeArray'][$i]."') 
    AND (categorie in(".calGetSqlEventpoints().")) 
    AND activ=1
    ORDER BY startTime, endTime ASC;";
    calPrintAppt($qry, $daytextcolor);
    echo "\n</td>";

    /**** Events */
    echo "\n<td width=\"50%\" valign=\"top\" style=\"background-color: $daybgcolor;\" class=\"tbdayview\">";
    echo "\n<table width=\"100%\" style=\"background-color: $dayappbgcolor;\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\"><tr><td style=\"background-color: $dayevebgcolor;\"><span style=\"color: $dayevetxtcolor;\" class=\"content\"><strong>"._CALDAYEVENTS."</strong></span></td></tr></table>";
    $out1 = "";
    while (list($eid, $title, $categorie, $hometext) = $db->sql_fetchrow($resultevents)) {
        $title = calPrepareDisplay(strip_tags($title));
        $categorie = calGetCurrentEventPoint($categorie);
        $popuptext = "";
        if (!calIsPrintView() && $calconf['ShowPopup']) {
            $categoriealt = calGetBarColorAlt($categorie);
            $poptitle = calValueToText($title);
            $poptext = ($hometext) ? calValueToText("$categoriealt:<br />".$hometext."") : calValueToText($categoriealt);
            $cal_overlib -> ol_capicon = "".calGetBarImage("ball", $categorie)."";
            $popuptext = $cal_overlib -> vover($poptext,$poptitle);
        }
        $out1 .= "<tr valign='top'>
        <td><img src='".calGetBarImage("ball",$categorie)."' alt='' hspace='3' vspace='3' border='0'></td>
        <td><a href=\"".CAL_MODULE_LINK."&amp;op=view&amp;eid=".$eid."\"".$popuptext.">".$title."</a></td>
        </tr>";
    }
    if ($out1) {
        echo "<table border='0' cellspacing='0' cellpadding='3'>".$out1."</table>";
    }
    echo "\n</td>\n</tr>";
    echo "\n</table>\n<br />";
    echo calBuildColorLegend("legend");
    CloseTable();
    setlocale (LC_TIME, $GLOBALS['locale']);
}

#########################################################################################
function calViewEvent($req) {
    global $db, $admin_file;
    #mxDebugFuncVars($req);
    extract($req);
    $eid = intval($eid);
    $qry="SELECT * FROM ".CAL_TABLE_EVENTS." WHERE eid=$eid AND activ=1";
    $result = $db->sql_query($qry);
    if (!$result) {
        $mmsg = (calIsAdmin()) ? '<br /><br /><a href='.$admin_file.'.php?op=CalSetup><strong>goto Setup</strong></a><br /><br />' : '';
        calErrAdminMsg(_CALERRSQLERROR.$mmsg);
    }
    $event  = $db->sql_fetchrow($result);
    $arrtmp = calGetEventDates($event, 'start');
    calBuildModusselectors($op, intval($arrtmp['startDay']), intval($arrtmp['startMonth']), intval($arrtmp['startYear']));
    echo "<br />";
    calEventView($event);
    if (calIsAdmin() && !calIsPrintView()) {
    OpenTable();
        echo "<center><a href=\"".$admin_file.".php?op=CalendarEditEvent&amp;eid=".$eid."\"><img src=\"".CAL_IMAGE_PATH."edit.gif\" alt=\""._EDIT."\" width=\"19\" height=\"17\" border=\"0\"></a> <a href=\"".$admin_file.".php?op=CalendarDeleteEvent&amp;eid=".$eid."\"><img src=\"".CAL_IMAGE_PATH."delete.gif\" alt=\""._CALDELETESTORY."\" width=\"20\" height=\"16\" border=\"0\"></a>\n</center>";
    CloseTable();
    }
}

#########################################################################################
function calBuiltYear($req) {
    global $db, $admin_file;
    extract($req);
    $qry = "SELECT UNIX_TIMESTAMP( startDate ) AS u, ( TO_DAYS( endDate ) - TO_DAYS( startDate ) ) AS days
                    FROM ".CAL_TABLE_EVENTS."
                    WHERE Year( startDate ) <= ".$y." AND Year( endDate ) >= ".$y." AND categorie IN (".calGetSqlEventpoints().") AND activ =1";
    #mxDebugFuncVars($qry);
    $result = $db->sql_query($qry);
    if (!$result) {
        $mmsg = (calIsAdmin()) ? '<br /><br /><a href='.$admin_file.'.php?op=CalSetup><strong>goto Setup</strong></a><br /><br />' : '';
        calErrAdminMsg(_CALERRSQLERROR.$mmsg);
    }
    while ($row = $db->sql_fetchrow($result)) {
        for ($i = 0; $i <= $row['days']; $i++) {
            $dat = Date("Y-m-d",$row['u']+($i * 86400));
            $dbdate[$dat] = isset($dbdate[$dat]) ? $dbdate[$dat]+1 : 1;
        }
    }
    #mxDebugFuncVars($dbdate);
    include(CAL_MODULE_PATH.'config/configcolors.php');
    calBuildModusselectors($op, $d, $m, $y);
    echo "<br />";
    OpenTable();
    $pd = @mktime(0, 0, 0, $m, $d, $y - 1);
    $Prev_Date="m=$m&amp;d=$d&y=".Date("Y",$pd);
    $nd = @mktime(0, 0, 0, $m, $d, $y + 1);
    $Next_Date="m=$m&amp;d=$d&y=".Date("Y",$nd);
    /**** Get todays date */
    $Today_d = (int)Date("d");
    $Today_m = (int)Date("m");
    $Today_y = (int)Date("Y");
    echo "\n<table width=\"100%\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\">\n<tr>";
    if (!calIsPrintView()) echo "<td width=\"100\"><a href=\"".CAL_MODULE_LINK."&amp;$Prev_Date&amp;op=year\" title=\"".Date("Y",$pd)."\"><span class=\"content\"><img src=\"".CAL_IMAGE_PATH."back.gif\" alt=\""._CALPREVIOUS."\" width=\"16\" height=\"14\" border=\"0\" hspace=\"5\">"._CALPREVIOUS."</span></a></td>";
    echo "<td align=\"center\"><span class=\"title\"><strong>$y</strong></span></td>";
    if (!calIsPrintView()) echo "<td width=\"100\" align=\"right\"><a href=\"".CAL_MODULE_LINK."&amp;$Next_Date&amp;op=year\" title=\"".Date("Y",$nd)."\"><span class=\"content\">"._CALNEXT."<img src=\"".CAL_IMAGE_PATH."next.gif\" alt=\""._CALNEXT."\" width=\"16\" height=\"14\" border=\"0\" hspace=\"5\"></span></a></td>";
    echo "</tr>\n</table>";
    echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\"><tr>";
    for ($i = 1; $i < 13; $i++) {
        /**** Get the Day (Integer) for the first day in the month */
        $First_Day_of_Month_Date = @mktime(0, 0, 0, $i, 1, $y);
        $Date = $First_Day_of_Month_Date;
        $m = $i;
        $Day_of_First_Week = Date("w",$First_Day_of_Month_Date)-_CALWEEKBEGINN;
        if ($Day_of_First_Week<0) $Day_of_First_Week=6;
        /**** Find the last day of the month */
        $Month = Date("m",$Date);
        $lastday = (int)Date("t",$Date);
        /**** Build Month */
        if (($i == 4) || ($i == 7) || ($i == 10)) {
            echo "</tr><tr><td colspan=3><br /></td></tr><tr>";
        }
        echo "\n<td valign=\"top\" align=\"center\">
        <table class=\"tbyearview\" style=\"background-color: $yeartablebgcolor;\" border=\"$yeartableborder\" cellspacing=\"$yeartablecellspacing\" cellpadding=\"$yeartablecellpadding\">
        <tr style=\"background-color: $yearheadbgcolor;\">\n<td colspan=\"7\" align=\"center\">
        <a href=\"".CAL_MODULE_LINK."&amp;m=$i&amp;d=$d&amp;y=$y&amp;op=month\">
        <span style=\"color: $yearheadtxtcolor;\" class=\"content\"><strong>". calGetMonthName($i)."</strong></span></a>
        </td>\n</tr>";
        /**** Previous Greyed month days */
        echo "\n";
        if ($Day_of_First_Week > 0) {
            echo "\n<tr style=\"background-color: $yearbgcolor;\" align=\"center\"><td colspan=\"$Day_of_First_Week\" style=\"background-color: $yearshadedbgcolor;\">&nbsp;</td>";
        }
        $day_of_week = $Day_of_First_Week + 1;
        /**** Build Current Year */
        for ($day = 1 ; $day <= $lastday ; $day++) {
            $tdate = sprintf ("%04d-%02d-%02d", $y, $Month, $day);
            if (($day == $Today_d) && ($m == $Today_m) && ($y == $Today_y)){
                $ctxt = $yearcurdaytxtcolor;
                $cbgc = " style=\"background-color: $yearcurdaybgcolor;\"";
            } else {
                $ctxt = $yeartextcolor;
                $cbgc = "";
            }
            $evformat = '';
            $evtitle = '';
            if (isset($dbdate[$tdate])) {
                $evformat = " border: 1px dotted $yeareventbordcolor; background-color: $yeareventbgcolor;";
                $evtitle = ($dbdate[$tdate]>1) ? " title=\"".$dbdate[$tdate]." "._CAL2EVENT."\"" : " title=\"".$dbdate[$tdate]." "._CAL1EVENT."\"";
                $ctxt = $yeareventtextcolor;
            }

            if ($day_of_week == 1) {
                echo "\n<tr style=\"background-color: $yearbgcolor;\" align=\"center\">";
            }
            echo "\n<td width=10".$cbgc."><a href=\"".CAL_MODULE_LINK."&amp;m=$m&amp;d=$day&amp;y=$y&amp;op=day\"><span style=\"color: ".$ctxt.";".$evformat."\" class=\"tiny\"".$evtitle.">".$day."</span></a></td>";
            if ($day_of_week == 7) {
                $day_of_week = 0;
                echo "\n</tr>";
            }
            $day_of_week ++;
        }
        /**** Next Greyed month days */
        $day = 1;
        if ($day_of_week != 1) {
            $tmp = 8 - $day_of_week;
            echo "\n<td colspan=$tmp style=\"background-color: $yearshadedbgcolor;\">&nbsp;</td>";
        }
        if ($day_of_week != 1) {
            echo "\n</tr>";
        }
        echo "\n</table>\n</td>";
    }
    echo "</tr></table>";
    CloseTable();
}

#########################################################################################
function calAddTimeRange($startTime,$endTime,$year,$month,$day,$daytextcolor) {
    $tmpTime = calGetTimeFormated($startTime);
    $tmpTime2 = calGetTimeFormated($endTime);
    echo "\n<br /><br /><span style=\"color: $daytextcolor;\" class=\"content\">".$tmpTime." - ".$tmpTime2."</span>";
    $qry = "SELECT eid, title, hometext, startDate, startTime, endDate, endTime, categorie FROM ".CAL_TABLE_EVENTS." 
    WHERE(startDate <= '$year-$month-$day' 
    AND endDate >='$year-$month-$day' 
    AND alldayevent='0' 
    AND startTime >= '$startTime' 
    AND startTime <'$endTime' 
    AND activ=1) 
    ORDER BY startTime, endTime ASC";
    calPrintAppt($qry, $daytextcolor);
}

#########################################################################################
function calPrintAppt($qry, $daytextcolor) {
    global $db, $calconf;
    static $popupwidth, $popupdelay, $cal_overlib;
    if ((!isset($popupwidth) || !isset($popupdelay) || !isset($cal_overlib)) && !calIsPrintView()) {
        include(CAL_MODULE_PATH.'config/configcolors.php');
        if ($calconf['ShowPopup']) {
            $cal_overlib = new Overlib();
            $cal_overlib -> ol_width = $popupwidth;
            $cal_overlib -> ol_delay = $popupdelay;
            $cal_overlib -> ol_hauto = "True";
            $cal_overlib -> ol_vauto = "True";
        }
    }
    $out = "";
    $result = $db->sql_query($qry);
    while ($event = $db->sql_fetchrow($result)) {
        $event = calGetEventDates($event);
        $categorie = calGetCurrentEventPoint($event['categorie']);
        $title = calPrepareDisplay(strip_tags($event['title']));
        $popuptext = "";
        if (!calIsPrintView() && $calconf['ShowPopup']) {
            $categoriealt = calGetBarColorAlt($categorie);
            if ($event['startDate'] != $event['endDate']) {
                $poptitle = calValueToText($title."<br /><span class=\"tiny\">(".$event['startDateShort']."&nbsp;".$event['startTimeFormat']."&nbsp;-&nbsp;".$event['endDateShort']."&nbsp;".$event['endTimeFormat'].")</span>");
            } else {
                $poptitle = calValueToText($title);
            }
            $poptext = ($event['hometext']) ? calValueToText($categoriealt.":<br />".$event['hometext']."") : calValueToText($categoriealt);
            $cal_overlib -> ol_capicon = "".calGetBarImage("ball", $categorie)."";
            $popuptext = $cal_overlib -> vover($poptext,$poptitle);
        }
        $view = "<a href=\"".CAL_MODULE_LINK."&amp;op=view&amp;eid=".$event['eid']."\"".$popuptext.">".$event['startTimeFormat'];
        $view .= ($event['startDate'] != $event['endDate']) ? "" : "&nbsp;-&nbsp;".$event['endTimeFormat'];
        $view .= ", <strong>".$title."</strong></a>";
        $out .= "<tr valign='top'>
        <td><img src='".calGetBarImage("ball",$categorie)."' alt='' hspace='3' vspace='3' border='0'></td>
        <td><span style=\"color: $daytextcolor;\" class=\"content\">".$view."</span></td>
        </tr>";
    }
    if ($out) {
        echo "<table border='0' cellspacing='0' cellpadding='3'>".$out."</table>";
    } else {
        echo "<br />";
    }
}

######################################################################
# wird benoetigt zur Kompatibilitaet mit Original phpNuke
# den benoetigten Code fuer die Klasse overlib nur einmal ausgeben
if (!function_exists("calOverlibDiv")){
    function calOverlibDiv() {
        if (!defined("_Overlib_Div")) { // diese Konstante wird ab Mx2.2 automatisch definiert, wenn die Klasse vorhanden ist
            $folder = (@file_exists('includes/javascript/class.overlib.php')) ? 'includes/javascript' : CAL_MODULE_PATH.'overlib';
            define("_Overlib_Div",2);
            include_once($folder.'/class.overlib.php');
            echo "<div id=\"overDiv\" style=\"position:absolute; visibility: hidden; z-index: 1000; background: transparent;\"></div>\n";
            echo "<script language=\"javascript\" src=\"".$folder."/overlib.js\" type=\"text/javascript\">\n</script>\n";
            echo "<script language=\"javascript\" src=\"".$folder."/overlib_hideform.js\" type=\"text/javascript\">\n</script>\n";
        }
    }
}

######################################################################
// wandelt die uebergebenen Datumwerte in erforderliche Werte um
// Wird kein gueltiges Datum uebergeben, wird HEUTE verwendet 
// Ausserdem werden bestimmte Defaultwerte gesetzt
function calGetRequestVals($req) {
    global $calconf;
    if (empty($req['op'])) {
        $req['op'] = (isset($req['type'])) ? $req['type'] : $calconf['defaultview'];
    } else if ($req['op']=="modload") {
        $req['op'] = (isset($req['type'])) ? $req['type'] : $calconf['defaultview'];
    }
    if (isset($req['eid'])) $req['eid'] = (int)$req['eid'];
    if (isset($req['d']))   $req['d']   = (int)$req['d'];
    if (isset($req['m']))   $req['m']   = (int)$req['m'];
    if (isset($req['y']))   $req['y']   = (int)$req['y'];
    if (isset($req['col'])) $req['col'] = (int)$req['col'];
    if (empty($req['col'])) $req['col'] = "";

    if (empty($req['d']) || empty($req['m']) || empty($req['y'])) {
        if (isset($req['Date'])) { # kompatibilitaet mit aelteren Links?
            $arrdate = explode("/", $req['Date']); # m/d/y
            $req['d']=(int)$arrdate[1];
            $req['m']=(int)$arrdate[0];
            $req['y']=(int)$arrdate[2];
        } else { # Heute als Datum
            $req['d']=(int)Date("d");
            $req['m']=(int)Date("m");
            $req['y']=(int)Date("Y");
        }
    }
    return $req;
}

#### main ##########################################################################
$req = array_merge($_GET, $_POST);
$req = array_merge($req, calGetRequestVals($req));
#print_r($req);
$GLOBALS['pagetitle'] = _CALNAME;
if (isset($_GET['cprint'])) {
    include(CAL_MODULE_PATH.'includes/printer.php');
    print_header();
} else {
    include_once(NUKE_BASE_DIR.'header.php');
}
title(_CALNAME);
#if ($req['y'] < 1970) {
#    OpenTable();
#    echo "<center><strong>ERROR!</strong><br /><br />System can not interpret dates before 01/01/1970, <br />If you've used a 2 digit year please use a 4 digit one.<br /><br />"._GOBACK."</center>";
#    CloseTable();
#} else {
    #$Date = @mktime(0, 0, 0, $m, $d, $y);
    if ($req['op'] == "month") {
        calBuiltMonth($req);
    } elseif ($req['op'] == "day") {
        calBuiltDay($req);
    } elseif ($req['op'] == "year") {
        calBuiltYear($req);
    } elseif ($req['op'] == "view") {
        calViewEvent($req);
    } elseif ($req['op'] == "list") {
        calBuiltNextEventsList($req);
    } elseif ($req['op'] == "search") {
        calSearch($req);
    } elseif ($req['op'] == "result") {
        calBuildSearchResult($req);
    } else {
        $req['op'] = "list";
        calBuiltNextEventsList($req);
    }

#}

if (isset($_GET['cprint'])) {
    print_footer();
} else {
    include_once(NUKE_BASE_DIR.'footer.php');
}

/* CVS-Log:
$Log: index.php,v $
Revision 20.23  2004/08/23 14:44:50  EllselAn
plugin hide_form eingebaut

Revision 20.22  2004/07/18 14:03:00  EllselAn
versch. Fehlermeldungen unterdrückt

Revision 20.21  2004/05/27 16:13:24  EllselAn
vermeiden von Fehlermeldungen

Revision 20.20  2004/04/29 14:37:27  EllselAn
Fehler in Jahresansicht bei Terminen vor dem 10. des Monats

Revision 20.19  2004/04/18 22:26:05  EllselAn
Fehler in qry für Jahresansicht bei langen Terminen

Revision 20.18  2004/04/16 17:18:50  EllselAn
optische Anpassungen, unnötige Zeilen nach Formularen entfernt

Revision 20.17  2004/04/15 21:19:35  EllselAn
optische Probleme mit dunklen themes gefixt

Revision 20.16  2004/04/15 19:23:43  EllselAn
vergessene debugausgabe in zeile 174

Revision 20.15  2004/04/15 16:59:42  EllselAn
Fehler in Tagesansicht, zus. Option in Listenansicht, kleine Codeoptimierungen

Revision 20.14  2004/04/13 23:00:55  EllselAn
überarbeitet, Stand v1.4-Beta1

Revision 20.12  2004/01/11 10:45:02  EllselAn
sql_freeresult entfernt

Revision 20.11  2004/01/10 16:15:54  EllselAn
sql-injection besser abgesichert

Revision 20.10  2004/01/08 22:43:31  EllselAn
popups umgebaut in druckfunktion und zum abschalten

Revision 20.9  2004/01/07 22:10:22  EllselAn
weitere Pfadanpassungen und Konstanten umgelagert

Revision 20.8  2004/01/06 23:14:59  EllselAn
Pfade angepasst

Revision 20.7  2004/01/05 14:33:46  EllselAn
Copyrighthinweise verändert

Revision 20.6  2004/01/04 00:38:18  EllselAn
versch. Kleinigkeiten

Revision 20.4  2003/11/16 19:19:35  EllselAn
Kalender etwas überarbeitet,
neuer Header, da neuer Name
kleine Fehler gefixt

Revision 20.3  2003/09/12 12:16:11  EllselAn
Javascript-popups etwas überarbeitet

Revision 20.2  2003/09/01 14:50:34  EllselAn
function join() / implode() falsch verwendet
*/

?>