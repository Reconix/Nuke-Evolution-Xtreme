<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: copyright.php,v 20.9 2004/09/07 22:58:41 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : copyright.php
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

define('CP_INCLUDE_DIR', dirname(dirname(dirname(__FILE__))));
include(CP_INCLUDE_DIR.'/includes/showcp.php');

// To have the Copyright window work in your module just fill the following
// required information and then copy the file "copyright.php" into your
// module's directory. It's all, as easy as it sounds ;)

$author_name = "Andre&#97;s E&#108;&#108;se&#108;";
$author_email = "&#107;&#97;lend&#101;r&#64;pr&#97;gm&#97;mx&#46;&#111;&#114;&#103;";
$author_homepage = "http://www.pragmamx.org";
$license = "GNU/GPL";
$download_location = "http://vkp.shiba.de/modules.php?name=Downloads";
$module_version = "1.4.b";
$module_description = "CalendarMx<br />based on nukeCalendar 1.1.a<br />Copyright (c) 2004 by A.E&#108;&#108;sel, http://www.shiba-design.de<br />in vkpMx-developer-team, http://maax-design.de<br />based on EventCalendar 2.0<br />Copyright (c) 2001 Originally by Rob Sutton<br />http://smart.xnettech.net (Nuke Site)<br />Development continued by Aleks A.-Lessmann<br />Included some ideas and changes by: flobee, bulli-frank, kicks, kochloeffel, FrankySz, Jubilee, Regs, Einhorn, Ria, MoniK, postnuke-developer-Team, Nuke-Evolution Team<br />Translations by: Zazaeren, Trond Eriksen, Srdjan Segvic, Antonio Andrade, Tomasz Czernecki, CRISTIAN, Djamilo Jacinto, Pedro Telmo, David Petterson, Martin Svitak, LombudXa (Rodmar)";

// DO NOT TOUCH THE FOLLOWING COPYRIGHT CODE. YOU'RE JUST ALLOWED TO CHANGE YOUR "OWN"
// MODULE'S DATA (SEE ABOVE) SO THE SYSTEM CAN BE ABLE TO SHOW THE COPYRIGHT NOTICE
// FOR YOUR MODULE/ADDON. PLAY FAIR WITH THE PEOPLE THAT WORKED CODING WHAT YOU USE!!
// YOU ARE NOT ALLOWED TO MODIFY ANYTHING ELSE THAN THE ABOVE REQUIRED INFORMATION.
// AND YOU ARE NOT ALLOWED TO DELETE THIS FILE NOR TO CHANGE ANYTHING FROM THIS FILE IF
// YOU'RE NOT THIS MODULE'S AUTHOR.

show_copyright($author_name, $author_email, $author_homepage, $license, $download_location, $module_version, $module_description);

?>