<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// write with: $Id: main.php,v 20.25 2004/07/18 14:03:00 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : Generated with main.php
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
/* CalendarMx v1.4                                                      */
/* ===================                                                  */
/*  Calendar Module for vkpMx 2.x / pragmaMx & phpNuke 5.5-7.6          */
/*  Copyright (c) 2004 by A.Ellsel (kalender@pragmamx.org)              */
/*  http://www.pragmamx.org & http://www.shiba-design.de                */
/************************************************************************/

if (!defined('CAL_MODULE_NAME')) {
    die ('Illegal File Access');
}

$index = 0;
$calconf['defaultview']     = 'list';
$calconf['minuterange']     = '15';
$calconf['usetopics']       = '1';
$calconf['searchTopics']    = '1';
$calconf['searchcount']     = '40';
$calconf['allowaddarticle'] = '1';
$calconf['allowuserpost']   = '0';
$calconf['userautoactive']  = '0';
$calconf['allowanonpost']   = '0';
$calconf['anonautoactive']  = '0';
$calconf['AdminEditAll']    = '1';
$calconf['AdminMenu']       = '0';
$calconf['AdminType']       = 'radminsuper';
$calconf['listcount']       = '20';
$calconf['listStarttime']   = '1';
$calconf['listEnddate']     = '1';
$calconf['listEndtime']     = '1';
$calconf['listEnddate2']    = '0';
$calconf['listBrTime']      = '1';
$calconf['catListCols']     = '5';
$calconf['listshowlinks']   = '1';
$calconf['TextEvents']      = '0';
$calconf['ShowPopup']       = '1';
$calconf['showlinks']       = '1';
$calconf['TimeArray']       = array('09:00:00','10:00:00','11:00:00','12:00:00','14:00:00','16:00:00','18:00:00','19:00:00','20:00:00');
$calconf['AllowableHTML']   = array('img','a','u','b','i','em','ol','ul','li','tt','blockquote');

?>