<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: block-Calendar_combi.php,v 20.15 2004/08/29 02:00:06 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : block-Calendar_combi.php
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
// The order of the subareas can be configured below!!
$sort = "asc";                                 # Sort list:  asc = ascending / desc = descending
$scrolling = 1;                                # Scroll entries edgeways: 0 = No / 1 = Yes
$scrolldirection = "up";                       # Scroll direction: up / down
$scrollheight = 70;                            # Height of the scrolling area
$scrolldelay = 1;                              # Scroll speed
$scrollamount = 1;                             # Scroll speed
$listcount = 5;                                # Count of entries in the List-Block
$listEnddate = 1;                              # Display the ending Date in List-View: 0 = No / 1 = Yes
$listStarttime = 0;                            # Display the starting Time in List-View: 0 = No / 1 = Yes
$listEndtime = 0;                              # Display the ending Time in List-View: 0 = No / 1 = Yes
$showLegend = 1;                               # Show color legend: 0 = No / 1 = Yes
$showNewlink = 1;                              # Show Link Event: 0 = No / 1 = Yes
######  Settings for the monthly block  #################################################
$bordercolor = $bgcolor1;                      # Border color around days in monthly block
$todaycolor = $textcolor1;                     # Text color TODAY
$todaybackground = $bgcolor1;                  # Background color TODAY
$daycolor = $textcolor2;                       # Text color regular days
$daybackground = $bgcolor2;                    # Background color regular days
$showtodayevents = 1;                          # Display today's events
$showsymbols = 0;                              # Show screen symbols
######### Color and Border Definitions ####################################################################
$listbordercolor = $bgcolor2;                  # List border colors
$listbgcolor1 = $bgcolor1;                     # Background first line ("" = transparent)
$listtxtcolor1 = $textcolor1;                  # Text first line
$listbgcolor2 = $bgcolor2;                     # Background next line
$listtxtcolor2 = $textcolor2;                  # Text next line
$scrollbgcolor = $bgcolor1;                    # Marquee tag background color (Spacing scroll content)
$listtableborder = 0;                          # List HTML border
$listtablecellspacing = 1;                     # Spacing between Events (also border width)
$listtablecellpadding = 2;                     # This will make the Event lines larger or smaller depending on the value
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
if (!calDetectGoodBrowser ()) { $scrolling = 0; }

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
$qrydate = "$curYear-$curMonth-$curDay";
$qry="SELECT COUNT(eid) FROM ".CAL_TABLE_EVENTS." 
WHERE (startDate >= '$qrydate' OR endDate >= '$qrydate') 
AND ($whereoption)";
list($icount) = $db->sql_fetchrow($db->sql_query($qry));
#print "$icount <br /> $qry";
if ($icount>$listcount) $icount=$listcount;

$i = 0; $ievents = 0;
$content_list = '';
if ($icount) {
    setlocale (LC_TIME, _CALLOCALE);
    $imgprops= "align=\"middle\" hspace=\"1\" vspace=\"2\" width=\"9\" height=\"9\" border=\"0\" alt=\"\"";
    if ($icount < 3) { $scrolling = 0; }
    if ($scrolling) {
        srand((double)microtime()*1000000);
        $randmarq = 'm'.md5(uniqid(rand(),1));
        $content_list.="<div style='overflow: hidden; height: ${scrollheight}px;'><marquee id='".$randmarq."' behavior='scroll' direction='$scrolldirection' height='$scrollheight' hspace='0' vspace='5' loop='0' scrollamount='$scrollamount' scrolldelay='$scrolldelay' onMouseOver='this.stop()' onMouseOut='this.start()'>";
    }
    $content_list.="<table cellspacing=\"$listtablecellspacing\" cellpadding=\"$listtablecellpadding\" style=\"background-color: $listbordercolor; border: ${listtableborder}px solid $listbordercolor;\" border=\"$listtableborder\" width=\"100%\">";
    $qry="SELECT eid, title, hometext, posteddate, topic, informant, year(startDate), month(startDate), dayofmonth(startDate), hour(startTime), minute(startTime), year(endDate), month(endDate), dayofmonth(endDate), hour(endTime), minute(endTime), alldayevent, categorie FROM ".CAL_TABLE_EVENTS." 
    WHERE (startDate >= '$qrydate' OR endDate >= '$qrydate') 
    AND ($whereoption) 
    ORDER BY startDate $sort, endDate $sort 
    LIMIT 0,$icount";
    $result=$db->sql_query($qry);
    while (list($eid, $title, $hometext, $posteddate, $topic, $informant, $y1, $m1, $d1, $h1, $mi1, $y2, $m2, $d2, $h2, $mi2, $alldayevent, $categorie) = $db->sql_fetchrow($result)) {
        $title = htmlspecialchars(strip_tags(stripslashes($title)), ENT_QUOTES);
        $fontstyle = ($listStarttime) ? "tiny" : "content";
        $dateStart = strftime(_CALSHORTDATEFORMAT, @mktime(0, 0, 0, $m1, $d1, $y1));
        if ($listStarttime && !$alldayevent) {
            $dateStart.= " ".strftime(_CALTIMEFORMAT, @mktime($h1, $mi1, 0, $m1, $d1, $y1));
        }
        $dateEnd = ($listEnddate) ? strftime(_CALSHORTDATEFORMAT, @mktime(0, 0, 0, $m2, $d2, $y2)) : "";
        if ($listEndtime && !$alldayevent) {
            $dateEnd.= " ".strftime(_CALTIMEFORMAT, @mktime($h2, $mi2, 0, $m2, $d2, $y2));
        }
        $bgcolornew = ($i==0) ? $listbgcolor1 : $listbgcolor2;
        $txtcolornew = ($i==0) ? $listtxtcolor1 : $listtxtcolor2;
        $i = ($i==0) ? 1 : 0;
        $alttext = ($hometext && !$scrolling) ? substr(htmlentities(strip_tags(stripslashes($hometext))),0,70).'...' : "";
        $content_list.="<tr style=\"background-color: $bgcolornew;\">
        <td valign=\"top\"><img src=\"".calGetBarImage("ball",$categorie)."\" $imgprops></td>\n
        <td><div title=\"$alttext\"><span style=\"color: $txtcolornew;\" class=\"tiny\">$dateStart - $dateEnd<br />\n
        <a href=\"".CAL_MODULE_LINK."&amp;op=view&amp;eid=$eid\" style=\"text-decoration: none;\">$title</a></span></div></td>\n</tr>\n";
        $ievents++;
    }
    if ($scrolling) {
        // Mozilla causes troubles while scrolling, explicit start
        $content_list .= "</table></marquee></div>
        <script language='JavaScript1.2'>
        <!--
        if (document.getElementById) { document.getElementById('".$randmarq."').start(); }
        //-->
        </script>
        ";
    } else {
        $content.= "</table>";
        }
    setlocale (LC_TIME, $GLOBALS['locale']);
    }
$bgcolornew = ($i==1) ? $listbgcolor2 : $listbgcolor1;

###############################
/**** Build Month */
$qry ="SELECT startDate, endDate
FROM ".CAL_TABLE_EVENTS."
WHERE (((startDate <= '$curYear-$curMonth-01') OR (startDate >= '$curYear-$curMonth-01' AND startDate <= '$curYear-$curMonth-$lastday')) AND (endDate >= '$curYear-$curMonth-01') 
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
        for ($countDay = $fday ; $countDay <= $lday ; $countDay++){
            $daycount[$countDay] = (empty($daycount[$countDay])) ? 1 : $daycount[$countDay]+1;
            }
        }
    else {
        if ($curYear == $startYea && $curMonth == $startMon) {
            $daycount[$startDay] = (empty($daycount[$startDay])) ? 1 : $daycount[$startDay]+1;
            }
        }
    }

/**** Build Current Month */
$cmonth = "";
for ($day = 1 ; $day <= $lastday ; $day++){
    if ($day_of_week == 1){
        $cmonth .= "<tr>\n";
        }
    $dayrows = (isset($daycount[$day])) ? $daycount[$day] : 0;
    $dayrows = ($dayrows >= 4) ? 4 : $dayrows;
    $bgcolor = ($day == Date("d")) ? $todaybackground : $daybackground;
    $fncolor = ($day == Date("d")) ? $todaycolor : $daycolor;
    $xday    = ($day == Date("d")) ? "<strong>$day</strong>" : $day;
    $imgprops= "width=\"13\" height=\"14\" border=\"0\"";
    $cmonth .= "<td align=\"center\" style=\"background-color: $bgcolor;\">";
    $cmonth .= "<a href=\"".CAL_MODULE_LINK."&amp;m=$curMonth&amp;d=$day&amp;y=$curYear&amp;op=day\" style=\"text-decoration: none;\">";
    $cmonth .= "<span style=\"color: $fncolor;\" class=\"tiny\">$xday</span>";
    if($showsymbols) $cmonth .= "<br /><img src=\"".CAL_IMAGE_PATH."events".$dayrows.".gif\" $imgprops>";
    $cmonth .= "</a></td>\n";
    if ($day_of_week == 7){
        $day_of_week = 0;
        $cmonth .= "</tr>\n";
        }
    $day_of_week += 1;
    }

/**** Build Month */
$content_month  = "\n<table border=\"0\" cellspacing=\"1\" cellpadding=\"2\" style=\"background-color: $bordercolor;\" width=\"100%\">";
$content_month .= "\n<tr>\n<th colspan=\"7\" style=\"background-color: $bgcolor2;\">";
$content_month .= "<span class=\"tiny\"><a href=\"".CAL_MODULE_LINK."&amp;m=$curMonth&amp;d=1&amp;y=$curYear&amp;op=month\">";
$content_month .= "$curMonthName</a></span></th>\n</tr>\n";
$content_month .= "\n<tr>";

/**** Previous Greyed month days */
if ($Day_of_First_Week != 0){
    $content_month .= "\n<td colspan=\"$Day_of_First_Week\" style=\"background-color: $daybackground;\">&nbsp;</td>\n";
}
$content_month .= $cmonth;

/**** Next Greyed month days */
#$day = 1;
if ($day_of_week != 1){
    $tmp = 8 - $day_of_week;
    $content_month .= "<td colspan=\"$tmp\" style=\"background-color: $daybackground;\">&nbsp;</td>\n</tr>\n";
}
$content_month .= "</table>\n";

$content = "\n<!-- $thisfile output start -->\n";

////////////////////////////////////////////////////////////////////////////////
/// Starting with the actual output
/// If you like to change the display order, simply move around the blocks below.
////////////////////////////////////////////////////////////////////////////////


/// Output block area 'Month' //////////////////////////////////////////////////
$content .= $content_month;
////////////////////////////////////////////////////////////////////////////////

/// Separator between 'Month' and 'List' ///////////////////////////////////////
if (!$scrolling && $content_list) {
    $content .= "<hr size=\"1\" style=\"color: $listbgcolor2;\" width=\"100%\" noshade>";
}

/// Block output 'List' ////////////////////////////////////////////////////////
$content .= $content_list;
////////////////////////////////////////////////////////////////////////////////

/// Separator between block area and category list /////////////////////////////
if ($showLegend) {
    $content.="<hr size=\"1\" style=\"color: $listbgcolor2;\" width=\"100%\" noshade>";
}
////////////////////////////////////////////////////////////////////////////////

/// Category List //////////////////////////////////////////////////////////////
if ($showLegend) {
    $imgprops = "align=\"middle\" hspace=\"6\" vspace=\"3\" width=\"9\" height=\"9\" border=\"0\" alt=\"\"";
    $content .=calBuildColorLegendSideBlocks();
}
////////////////////////////////////////////////////////////////////////////////

/// Add link to Event //////////////////////////////////////////////////////////
if ($showNewlink) {
    #$content_month.="<hr size=\"1\" style=\"color: $listbgcolor2;\" width=\"100%\" noshade>";
    $content.="<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td><a href=\"".CAL_MODULE_LINK."&amp;file=submit\"><img src=\"".CAL_IMAGE_PATH."sign.gif\" alt=\""._CALSUBMITEVENT."\" width=\"16\" height=\"16\" border=\"0\" align=\"middle\" hspace=\"0\" vspace=\"1\"></a></td><td valign=\"middle\"><span class=\"tiny\">&nbsp;<a href=\"".CAL_MODULE_LINK."&amp;file=submit\">"._CALSUBMITEVENT."</a></span></td></tr></table>";
}
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
$content .= "\n<!-- $thisfile output end -->\n<!-- KalenderMx &copy; by shiba-design.de -->\n";
$content=str_replace("\t","",$content);


// The block title is controlled by the language file of the calendar.
// If you like to use the settings of the admin menu instead
// simply delete the following line or comment it out.
if ($ievents==0){
    $blockfiletitle = _CALNAME;
} else {
    if (empty($icount)) { $icount = ""; }
    $blockfiletitle = _CALNEXT." $icount "._CALLISTDESCRIPTION2;
}

?>