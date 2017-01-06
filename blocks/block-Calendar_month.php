<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: block-Calendar_month.php,v 20.12 2004/08/29 02:00:06 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : block-Calendar_month.php
   Author        : See below
   Improved by   : LombudXa (Rodmar) (www.evolved-Systems.net)
   Version       : 1.4.0c (Based on KalenderMx 1.4b)
   Date          : 06/18/2005 (mm-dd-yyyy)

   Description   : Enhanced Calendar module which a lot of nice
                   features.
                   New Abstraction Layer and Nuke 7.6 Administration
                   System.
************************************************************************/

/************************************************************************/
/* KalenderMx v1.4.a                                                    */
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
 ************************************************************************/

if(!defined('NUKE_EVO')) exit;

### !!!! Do not change this line !!!! ###########################################
global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $textcolor1, $textcolor2, $db;
#################################################################################

$mxblockcache = FALSE;

######  Block Settings  #################################################################
// CHANGE THIS IF YOU CHANGE THE CALENDAR'S MODULE FOLDER NAME
define('CAL_MODULE_NAME','Calendar');
#########################################################################################
// Miscellaneous Settings
$bordercolor = $bgcolor2;                      # Border color around days
$todaycolor = $textcolor2;                     # Text color TODAY
$todaybackground = $bgcolor2;                  # Background color TODAY
$daycolor = $textcolor1;                       # Text color regular days
$daybackground = $bgcolor1;                    # Background color regular days
$showtodayevents = 1;                          # Display today's events
$showLegend = 0;                               # Show color legend: 0 = No / 1 = Yes
$showNewlink = 1;                              # Show Link Event: 0 = No / 1 = Yes
$showsymbols = 1;                              # Show screen symbols
###### End of Block Settings: Please do not alter anything below unless you know what you are doing !! #####

$conftest =  @include('modules/'.CAL_MODULE_NAME.'/config/config.php');
if (!$conftest) {
    $content = "<strong>Error!</strong><br />You must change the constant '\"CAL_MODULE_NAME\"' in file: <br />".__file__."";
    return;
}

get_lang(CAL_MODULE_NAME);
define('CAL_MODULE_PATH','modules/'.CAL_MODULE_NAME.'/');
@include_once(CAL_MODULE_PATH.'includes/functions.php');

$showNewlink = (calIsPostAllowed() && $showNewlink) ? 1 : 0;

$curMonth = (int)Date("m");
$curDay = (int)Date("d");
$curYear = (int)Date("Y");

/**** Get the Day (Integer) for the first day in the month */
$First_Day_of_Month_Date = @mktime(0, 0, 0, $curMonth, 1, $curYear);
$Day_of_First_Week = Date("w",$First_Day_of_Month_Date)-_CALWEEKBEGINN;
if ($Day_of_First_Week < 0) $Day_of_First_Week=6;
$day_of_week = $Day_of_First_Week + 1;

/**** Find the last day of the month */
$lastday = (int)Date("t",$First_Day_of_Month_Date);
$curMonthName = calGetMonthName($curMonth)." $curYear";

$whereoption= "categorie in(".calGetSqlEventpoints().") AND activ=1";
$qry ="SELECT startDate, endDate
FROM ".CAL_TABLE_EVENTS."
WHERE (((startDate <= '$curYear-$curMonth-01') Or (startDate >= '$curYear-$curMonth-01' AND startDate <= '$curYear-$curMonth-$lastday')) AND (endDate >= '$curYear-$curMonth-01') 
AND ($whereoption))
ORDER BY startDate, endDate";
$result = $db->sql_query($qry);
while(list($startDate, $endDate) = $db->sql_fetchrow($result)) {
    $aStartDate = explode("-",$startDate);
    $startDay = (int)$aStartDate[2];
    $startMon = (int)$aStartDate[1];
    $startYea = (int)$aStartDate[0];
    if ($startDate != $endDate) {
        $aEndDate = explode("-",$endDate);
        $endDay = (int)$aEndDate[2];
        $endMon = (int)$aEndDate[1];
        $endYea = (int)$aEndDate[0];
        $lday = ($curMonth < $endMon || $curYear < $endYea) ? $lastday : $endDay;
        $fday = ($curMonth > $startMon || $curYear > $startYea) ? 1 : $startDay;
        for ($countDay = $fday ; $countDay <= $lday ; $countDay++) {
            $daycount[$countDay] = (empty($daycount[$countDay])) ? 1 : $daycount[$countDay]+1;
        }
    } else {
        if ($curYear == $startYea && $curMonth == $startMon) {
            $daycount[$startDay] = (empty($daycount[$startDay])) ? 1 : $daycount[$startDay]+1;
        }
    }
}

/**** Build Current Month */
$cmonth = "";
for ($day = 1; $day <= $lastday; $day++) {
    if ($day_of_week == 1) {
        $cmonth .= "<tr>\n";
    }
    $dayrows = (isset($daycount[$day])) ? $daycount[$day] : 0;
    $dayrows = ($dayrows >= 4) ? 4 : $dayrows;
    $bgcolor = ($day == Date("d")) ? $todaybackground : $daybackground;
    $fncolor = ($day == Date("d")) ? $todaycolor : $daycolor;
    $xday    = ($day == Date("d")) ? "<strong>$day</strong>" : $day;
    $imgprops= "width=\"14\" height=\"14\" border=\"0\"";
    $cmonth .= "<td align=\"center\" style=\"background-color: $bgcolor;\">";
    $cmonth .= "<a href=\"".CAL_MODULE_LINK."&amp;m=$curMonth&amp;d=$day&amp;y=$curYear&amp;op=day\" style=\"text-decoration: none;\">";
    $cmonth .= "<span style=\"color: $fncolor;\" class=\"tiny\">$xday</span>";
    if($showsymbols) $cmonth .= "<br /><img src=\"".CAL_IMAGE_PATH."events".$dayrows.".gif\" $imgprops>";
    $cmonth .= "</a></td>\n";
    if ($day_of_week == 7) {
        $day_of_week = 0;
        $cmonth .= "</tr>\n";
    }
    $day_of_week += 1;
}

/**** Build Month */
$content = "\n<!-- $thisfile output start -->\n<table border=\"0\" cellspacing=\"1\" cellpadding=\"2\" style=\"background-color: $bordercolor;\" width=\"100%\">";
$content .= "\n<tr>\n<th colspan=\"7\" style=\"background-color: $bgcolor2;\">";
$content .= "<span class=\"tiny\"><a href=\"".CAL_MODULE_LINK."&amp;m=$curMonth&amp;d=1&amp;y=$curYear&amp;op=month\">";
$content .= "$curMonthName</a></span></th>\n</tr>\n";
$content .= "\n<tr>";
/**** Previous Greyed month days */
if ($Day_of_First_Week != 0) {
    $content .= "\n<td colspan=\"$Day_of_First_Week\" style=\"background-color: $daybackground;\">&nbsp;</td>\n";
}
$content .= $cmonth;
/**** Next Greyed month days */
#$day = 1;
if ($day_of_week != 1) {
    $tmp = 8 - $day_of_week;
    $content .= "<td colspan=\"$tmp\" style=\"background-color: $daybackground;\">&nbsp;</td>\n</tr>\n";
}
$content .= "</table>\n";

// List of daily events
if ($showtodayevents) {
    $todayeventscount = (isset($daycount[$curDay])) ? $daycount[$curDay] : 0;
    if ($todayeventscount==0) {
        $content .= "<center><span class=\"boxcontent\">"._CALNOTODAYEVENTS."</span></center>";
    } else {
        $qry = "SELECT eid,title,startTime,endTime,categorie FROM ".CAL_TABLE_EVENTS." 
        WHERE (startDate <= '$curYear-$curMonth-$curDay' AND endDate >= '$curYear-$curMonth-$curDay') 
        AND ($whereoption) 
        ORDER BY startTime, endTime ASC";
        $eventsresult = $db->sql_query($qry);
        $imgprops= "width=\"9\" height=\"9\" border=\"0\" hspace=\"2\"";
        $content .= "<span class=\"boxcontent\">&nbsp;"._CALTODAY.":</span><span class=\"tiny\">";
        while(list($eid, $title, $startTime, $endTime, $categorie) = $db->sql_fetchrow($eventsresult)){
            $title = htmlspecialchars(strip_tags(stripslashes($title)), ENT_QUOTES);
            $content .= "<br /><img src=\"".calGetBarImage("ball",$categorie)."\" $imgprops>&nbsp;<a href=\"".CAL_MODULE_LINK."&amp;op=view&amp;eid=$eid\">$title</a>";
        }
        $content .= "</span>";
    }
}
if ($showtodayevents && $showNewlink) {
    $content.="<hr size=\"1\" style=\"color: $daybackground;\" width=\"100%\" noshade>";
}
if ($showNewlink) {
    $content.="<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td><a href=\"".CAL_MODULE_LINK."&amp;file=submit\"><img src=\"".CAL_IMAGE_PATH."sign.gif\" alt=\""._CALSUBMITEVENT."\" width=\"16\" height=\"16\" border=\"0\" align=\"middle\" hspace=\"0\" vspace=\"1\"></a></td><td valign=\"middle\"><span class=\"tiny\">&nbsp;<a href=\"".CAL_MODULE_LINK."&amp;file=submit\">"._CALSUBMITEVENT."</a></span></td></tr></table>";
}
if (($showtodayevents || $showNewlink) && $showLegend) {
    $content.="<hr size=\"1\" style=\"color: $daybackground;\" width=\"100%\" noshade>";
}
if ($showLegend) {
    $imgprops= "align=\"middle\" hspace=\"6\" vspace=\"3\" width=\"9\" height=\"9\" border=\"0\" alt=\"\"";
    $content.=calBuildColorLegendSideBlocks();
}
$content .= "\n<!-- $thisfile output end -->\n<!-- KalenderMx &copy; by shiba-design.de -->\n";
$content = str_replace("\t","",$content);

// The block title is controlled by the language file of the calendar.
// If you like to use the settings of the admin menu instead
// simply delete the following line or comment it out.
$blockfiletitle = _CALNAME;

?>