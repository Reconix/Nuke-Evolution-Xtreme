<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: case.calendar.php,v 20.12.4.1 2005/02/16 18:51:45 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : case.php
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
/* KalenderMx v1.4.b                                                    */
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

if (!defined('ADMIN_FILE')) {
    die ("Illegal File Access");
}

define('CAL_MODULE_NAME',basename(dirname(dirname(__FILE__))));
define('CAL_MODULE_PATH','modules/'.CAL_MODULE_NAME.'/');

unset($x_cal_ad_file);

switch($_REQUEST['op']) {
    case "CalendarAdmin":
    case "CalendarPreviewEvent":
    case "CalendarEditEvent":
    case "CalendarPostEvent":
    case "CalendarPostEventGotoMain":
    case "CalendarPostEventGotoCalendar":
    case "CalendarNewEvent":
    case "CalendarDeactivateEvent":
    case "CalendarDeleteEvent":
    case "CalendarConfig":
    case "CalendarConfigSave":
        $x_cal_ad_file = CAL_MODULE_PATH.'admin/main.php';
        break;
    case "CalSetcols":
    case "CalSavecols":
        $x_cal_ad_file = CAL_MODULE_PATH.'admin/cats.php';
        break;
    case "CalSetup":
        $x_cal_ad_file = CAL_MODULE_PATH.'admin/install.php';
        break;
}

if (isset($x_cal_ad_file)) {
    // check php-version
    if (((int)(str_replace(".","",PHP_VERSION))) < 410) {
        die("<h3>Error:</h3>Sorry, PHP-Version > 4.1.0 is required.");
    }
    $x_cal_ad_ok = include($x_cal_ad_file);
    if (!$x_cal_ad_ok) {
        die('<h3>Error:</h3>can\'t find file: '.$x_cal_ad_file.'<br /><br />Check if the file is uploaded and not corrupted ( '.__file__.' )');
    }
    unset($x_cal_ad_ok); unset($x_cal_ad_file);
}

?>