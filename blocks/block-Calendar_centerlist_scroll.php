<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: block-Calendar_centerlist_scroll.php,v 20.15 2004/08/29 02:00:06 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : block-Calendar_centerlist_scroll.php
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
 ************************************************************************/

if(!defined('NUKE_EVO')) exit;

### !!!! Do not change this line !!!! ###########################################
global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $textcolor1, $textcolor2, $db;
#################################################################################

$mxblockcache = FALSE;

######  Block Settings  #################################################################
// CHANGE THIS IF YOU CHANGE THE CALENDAR'S MODULE FOLDER NAME
define("CAL_MODULE_NAME","Calendar");
#########################################################################################
// Miscellaneous Settings
$sort = "asc";                                 # Sort list:  asc = ascending / desc = descending
$scrolling = 1;                                # Scroll entries edgeways: 0 = No / 1 = Yes
$scrolltype = "scroll";                        # Scroll type: scroll / alternate
$scrolldelay = 1;                              # Scroll speed
$scrollamount = 1;                             # Scroll speed
$listcount = 10;                               # Count of entries in the List-Block
$listStarttime = 0;                            # Display the starting Time in List-View: 0 = No / 1 = Yes
$listEndtime = 0;                              # Display the ending Time in List-View: 0 = No / 1 = Yes
$listtimebreak = 0;                            # Wrap start/end time after date: 0 = No / 1 = Yes (increases the row!)
$eventwidth = 200;                             # Width of single Events while scrolling
$showTitle = 0;                                # Show block title: 0 = No / 1 = Yes
$scrolltopmargin = -2;                         # Scrolling spacing from top: Any integer value in px (pixel)
$showHeader = 0;                               # Show table header: 0 = No / 1 = Yes
$showLegend = 0;                               # Show color legend: 0 = No / 1 = Yes
$showNewlink = 0;                              # Show Link Event: 0 = No / 1 = Yes
$showalldot = 0;                               # Dots for all Events: 0 = No / 1 = Yes
$legendCols = 0;                               # Amount of columns in the category list. Leave it blank if you like to use the calendar settings
######### Color and Border Definitions ####################################################################
$listheadbgcolor = $bgcolor2;                  # Background list header
$listheadtxtcolor = $textcolor2;               # Text list header
$listbgcolor1 = $bgcolor1;                     # Background first line
$listtxtcolor1 = $textcolor1;                  # Text first line
$listbgcolor2 = $bgcolor2;                     # Background next line
$listtxtcolor2 = $textcolor2;                  # Text next line
$listbordercolor = $bgcolor2;                  # List border colors
$scrollbgcolor = $bgcolor1;                    # Marquee tag background color (Spacing scroll content)
$listtableborder = 0;                          # List HTML border
$listtablecellspacing = 1;                     # Spacing between Events (also border width)
$listtablecellpadding = 2;                     # This will make the Event lines larger or smaller depending on the value
$listheadbold = 1;                             # Bold titles in list: 0 = No / 1 = Yes
###### End of Block Settings: Please do not alter anything below unless you know what you are doing !! #####

$listheadbold1 = ($listheadbold) ? "<strong>" : "";
$listheadbold2 = ($listheadbold) ? "</strong>" : "";
$timebreak    = ($listtimebreak) ? "<br />\n" : "";

global $calconf;
$conftest = True;

if (!isset($calconf)) {
    $conftest =  @include('modules/'.CAL_MODULE_NAME.'/config/config.php');
}

if (!$conftest) {
    $content = "<strong>Error!</strong><br />You must change the constant '\"CAL_MODULE_NAME\"' in file: <br />".__file__."";
    return;
}

if (!empty($legendCols)) {
    $calconf['catListCols'] = $legendCols;
}

get_lang(CAL_MODULE_NAME);
define('CAL_MODULE_PATH','modules/'.CAL_MODULE_NAME.'/');
@include_once(CAL_MODULE_PATH.'includes/functions.php');

$showNewlink = (calIsPostAllowed() && $showNewlink) ? 1 : 0;

if (!calDetectGoodBrowser ()) { $scrolling = 0; }
$whereoption= " categorie in(".calGetSqlEventpoints().") AND activ=1";
$d = (int)Date("d"); 
$m = (int)Date("m"); 
$y = (int)Date("Y");
$qrydate = "$y-$m-$d";
$qry="SELECT COUNT(eid) FROM ".CAL_TABLE_EVENTS." 
WHERE (startDate >= '$qrydate' OR endDate >= '$qrydate') 
AND ($whereoption)";
list($icount) = $db->sql_fetchrow($db->sql_query($qry));
if ($icount>$listcount) $icount=$listcount;
$content = "\n<!-- $thisfile output start -->\n";
$i = 0;
if ($icount) {
    setlocale (LC_TIME, _CALLOCALE);
    $imgprops= "align=\"middle\" hspace=\"6\" vspace=\"4\" width=\"9\" height=\"9\" border=\"0\" alt=\"\"";
    if ($scrolling) {
        srand((double)microtime()*1000000);
        $randmarq = 'm'.md5(uniqid(rand(),1));
        $content.="<div style=\"position: relative; top: $scrolltopmargin;\">
        <marquee id='".$randmarq."' behavior='$scrolltype' direction='left' hspace='0' vspace='0' scrollamount='$scrollamount' scrolldelay='$scrolldelay' loop='0' dir='ltr' onMouseOver='this.stop()' onMouseOut='this.start()'>
        <table cellspacing=\"$listtablecellspacing\" cellpadding=\"$listtablecellpadding\" style=\"background-color: $listbordercolor; border: ${listtableborder}px solid $listbordercolor;\" border=\"$listtableborder\">
        <tr>";
    } else {
        $content.="<table width=\"100%\" border=\"$listtableborder\" cellspacing=\"$listtablecellspacing\" cellpadding=\"$listtablecellpadding\" style=\"background-color: $listbordercolor; border: ${listtableborder}px solid $listbordercolor;\">";
        if ($showHeader) {
            $content.="<tr style=\"background-color: $listheadbgcolor;\"><td colspan=\"3\" width=\"25%\"><span style=\"color: $listheadtxtcolor;\" class=\"boxcontent\">$listheadbold1"._CALEVENTDATETEXT."$listheadbold2</span></td>\n<td width=\"75%\"><span style=\"color: $listheadtxtcolor;\" class=\"boxcontent\">$listheadbold1"._CALSUBTITLE."$listheadbold2</span></td>\n</tr>\n";
        }
        #$content.="<tr style=\"background-color: $listbgcolor2;\"><td width=\"10%\" height=\"1\"></td><td width=\"5%\"></td><td width=\"10%\"></td><td width=\"75%\"></td></tr>\n";
    }
    $content.="";
    $qry="SELECT eid, title, hometext, posteddate, topic, informant, year(startDate), month(startDate), dayofmonth(startDate), hour(startTime), minute(startTime), year(endDate), month(endDate), dayofmonth(endDate), hour(endTime), minute(endTime), alldayevent, categorie FROM ".CAL_TABLE_EVENTS." 
    WHERE (startDate >= '$qrydate' OR endDate >= '$qrydate') 
    AND ($whereoption) 
    ORDER BY startDate $sort, endDate $sort 
    LIMIT 0,$icount";
    $result=$db->sql_query($qry);
    while (list($eid, $title, $hometext, $posteddate, $topic, $informant, $y1, $m1, $d1, $h1, $mi1, $y2, $m2, $d2, $h2, $mi2, $alldayevent, $categorie) = $db->sql_fetchrow($result)) {
        $title = htmlspecialchars(strip_tags(stripslashes($title)), ENT_QUOTES);
        $fontstyle = ($listStarttime) ? "tiny" : "boxcontent";
        $dateStart = strftime(_CALSHORTDATEFORMAT, @mktime(0, 0, 0, $m1, $d1, $y1));
        if ($listStarttime && !$alldayevent) {
            $dateStart.= "$timebreak ".strftime(_CALTIMEFORMAT, @mktime($h1, $mi1, 0, $m1, $d1, $y1));
        }
        $dateEnd = strftime(_CALSHORTDATEFORMAT, @mktime(0, 0, 0, $m2, $d2, $y2));
        if ($listEndtime && !$alldayevent) {
            $dateEnd.= "$timebreak ".strftime(_CALTIMEFORMAT, @mktime($h2, $mi2, 0, $m2, $d2, $y2));
        }
        $bgcolornew = ($i==0) ? $listbgcolor1 : $listbgcolor2;
        $txtcolornew = ($i==0) ? $listtxtcolor1 : $listtxtcolor2;
        $i = ($i==0) ? 1 : 0;
        if ($scrolling) {
            $content.="<td style=\"background-color: $bgcolornew;\" nowrap width=\"$eventwidth\" align=\"center\"><span style=\"color: $txtcolornew;\" class=\"tiny\">
            <img src=\"".calGetBarImage("ball",$categorie)."\" $imgprops>$dateStart "._CALLISTRANGE." $dateEnd</span><br />\n
            <span style=\"color: $txtcolornew;\" class=\"boxcontent\">&nbsp;<a href=\"".CAL_MODULE_LINK."&amp;op=view&amp;eid=$eid\">$title</a></span></td>\n";
        } else {
            $alttext = ($hometext) ? substr(htmlentities(strip_tags(stripslashes($hometext))),0,70).'...' : "";
            $content.="<tr style=\"background-color: $bgcolornew;\">
            <td nowrap width=\"10%\"><span style=\"color: $txtcolornew;\" class=\"$fontstyle\">$dateStart</span></td>\n
            <td align=\"center\" width=\"5%\"><span style=\"color: $txtcolornew;\" class=\"tiny\">"._CALLISTRANGE."</span></td>\n
            <td nowrap width=\"10%\"><span style=\"color: $txtcolornew;\" class=\"$fontstyle\">$dateEnd</span></td>\n
            <td width=\"75%\"><span style=\"color: $txtcolornew;\" class=\"boxcontent\"><img src=\"".calGetBarImage("ball",$categorie)."\" $imgprops>&nbsp;<a href=\"".CAL_MODULE_LINK."&amp;op=view&amp;eid=$eid\" title=\"$alttext\">$title</a></span></td>\n
            </tr>\n";
        }
    }
    if ($scrolling) {
        // Mozilla causes troubles while scrolling, explicit start
        $content .= "</tr>\n</table></marquee></div>
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
} else {
    $content.= "<span class=\"tiny\">"._CAL0EVENTSBLOCK."<br /></span>\n";
}
if ($showLegend) {
    $link = CAL_MODULE_LINK."&amp;op=list";
    $content.=calBuildColorLegend("centerblock",$showalldot,$showNewlink);
}

$content .= "\n<!-- $thisfile output end -->\n<!-- KalenderMx &copy; by shiba-design.de -->\n";
$content=str_replace("\t","",$content);

// The block title is controlled by the language file of the calendar.
// If you like to use the settings of the admin menu instead
// simply delete the following line or comment it out.
$blockfiletitle = ($showTitle) ? ""._CALLISTDESCRIPTION1." $icount "._CALLISTDESCRIPTION2."." : "";

?>