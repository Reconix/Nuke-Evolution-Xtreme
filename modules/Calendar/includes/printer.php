<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: printer.php,v 20.10 2004/04/13 23:03:06 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : printer.php
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

### !!!! Do not change these lines !!!! #########################################
if (!defined('CAL_MODULE_NAME')) {
    die ("Illegal File Access");
}

global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $textcolor1, $textcolor2;
#################################################################################

//// Used default colors in the system and modules
$bgcolor1   = "#ffffff";
$bgcolor2   = "#ffffff";
$bgcolor3   = "#ffffff";
$bgcolor4   = "#ffffff";

$textcolor1 = "#000000";
$textcolor2 = "#000000";

define("CAL_PRINTERPAGE","1");

#########################################################################################
function print_header() {
    //global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $textcolor1, $textcolor2;
    global $ThemeSel;
    $ThemeSel = get_theme();
    if (!headers_sent()) {
        header ('Content-Type:text/html; charset='._CHARSET);
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header ('Cache-Control: no-store, no-cache, max-age=1, s-maxage=1, must-revalidate, post-check=0, pre-check=0');
        header ("Pragma: no-cache");
    }

    echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n";
    echo "<html lang=\""._LANGCODE."\">\n";
    echo "<head>\n";
    echo "<title>".$GLOBALS['pagetitle']."</title>\n";
    //echo "<link href=\"".CAL_MODULE_PATH."style/screen.css\" rel=\"stylesheet\" type=\"text/css\">\n";
    //echo "<link href=\"".CAL_MODULE_PATH."style/print.css\" rel=\"stylesheet\" type=\"text/css\" media=\"print\">\n";
    echo "<link rel=\"stylesheet\" href=\"themes/".$ThemeSel."/style/style.css\" type=\"text/css\">\n";
    echo "</head>\n";
    echo "<body>\n";
    echo "<div align=\"center\" id=\"printform\"><form><input type=\"button\" value=\""._CALPRINTER2."\" onClick=\"window.print()\"></form></div>\n";
    echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><tr><td>\n";
}

#########################################################################################
function print_footer() {
    //global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $textcolor1, $textcolor2;
    echo "</td></tr></table>\n";
    echo "<br /><br /><div align=\"center\" class=\"footmsg\">KalenderMx v".CAL_VERSION." &copy; by shiba-design.de</div>\n";
    echo "</body></html>\n";
    // die()
    exit;
}

#########################################################################################
if (!function_exists('OpenTable')) {
    function OpenTable() {
        //global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $textcolor1, $textcolor2;
        echo "<div class='opentable'>";
    }
}

#########################################################################################
if (!function_exists('CloseTable')) {
    function CloseTable() {
        //global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $textcolor1, $textcolor2;
        echo "</div>";
    }
}

#########################################################################################
if (!function_exists('OpenTable2')) {
    function OpenTable2() {
        //global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $textcolor1, $textcolor2;
        echo "<div class='opentable'>";
    }
}

#########################################################################################
if (!function_exists('CloseTable2')) {
    function CloseTable2() {
        //global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $textcolor1, $textcolor2;
        echo "</div>";
    }
}

?>