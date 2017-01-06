<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: configcolors.php,v 20.7 2004/06/11 10:35:14 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : configcolors.php
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

/**** Specific List-View config variables */
$listheadbgcolor = $bgcolor2;                  # Background list header
$listheadtxtcolor = $textcolor2;               # Text list header
$listbgcolor1 = $bgcolor1;                     # Background first line ("" = transparent)
$listtxtcolor1 = $textcolor1;                  # Text first line
$listbgcolor2 = $bgcolor2;                     # Background next line
$listtxtcolor2 = $textcolor2;                  # Text next line
$listbordercolor = $bgcolor3;                  # List border colors
$listtableborder = 0;                          # List HTML border
$listtablecellspacing = 1;                     # Spacing between Events (also border width)
$listtablecellpadding = 2;                     # This will make the Event lines larger or smaller depending on the value

/**** Specific Day-View config variables */
$daybgcolor = $bgcolor2;                       # Background
$daytextcolor = $textcolor2;                   # Regular text
$dayshadetextcolor = $textcolor2;              # Faint text (Morning / Evening)
$dayappbgcolor = $bgcolor1;                    # Background header Events
$dayapptxtcolor = $textcolor1;                 # Text header Events
$dayevebgcolor = $bgcolor1;                    # Background header Events
$dayevetxtcolor = $textcolor1;                 # Text header Events

/**** Specific year config variables */
$yearbgcolor = "#FFFFFF";                      # Background specific days
$yeartextcolor = "#000000";                    # Text specific days
$yeartablebgcolor = $bgcolor2;                 # Month background border
$yearshadedbgcolor = $bgcolor3;                # Background not belonging to month
$yearheadbgcolor = $bgcolor2;                  # Background name of month
$yearheadtxtcolor = $textcolor2;               # Text name of month
$yearcurdaybgcolor = $bgcolor2;                # Background recent day
$yearcurdaytxtcolor = $textcolor2;             # Text recent day
$yeareventbgcolor   = $bgcolor2;               # Background of day number if present
$yeareventtextcolor = $textcolor2;             # Day number if present
$yeareventbordcolor = $bgcolor1;               # Dotted line border of day number if Event is present
$yeartableborder = 0;                          # List HTML border around month
$yeartablecellspacing = 1;                     # Spacing between Events (also border width)
$yeartablecellpadding = 4;                     # This will make the Event lines larger or smaller depending on the value

/**** Specific month config variables */
$monthbgcolor = "#FFFFFF";                     # Background specific days
$monthtextcolor = "#000000";                   # Text specific days
$monthshadedbgcolor = $bgcolor3;               # Background not belonging to month
$monthshadedtextcolor = "#778899";             # Text not belonging to month
$monthtablebgcolor = $bgcolor2;                # Month background border
$monthheadbgcolor = $bgcolor2;                 # Background week day (table header)
$monthheadtxtcolor = $textcolor2;              # Text week day (table header)
$monthcurdaybgcolor = $bgcolor2;               # Background recent day
$monthcurdaytxtcolor = $textcolor2;            # Text recent day
$monthsundaybgcolor = $bgcolor1;               # Background Sunday
$monthsundaytxtcolor = $textcolor1;            # Text Sunday

$monthdayheigth = 50;                          # Height of line in px (Hoehe Linie in px (specific days)

/**** Specific Hover-Popup config variables */
$popupwidth = 400;                             # Width of popup in px (pixel)
$popupdelay = 200;                             # Show popup delay

?>