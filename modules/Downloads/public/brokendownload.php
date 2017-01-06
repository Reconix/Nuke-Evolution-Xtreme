<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : brokendownload.php
   Author        : Quake (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 11.21.2005 (mm.dd.yyyy)

   Notes         : Advanced Downloads module with BBGroups Integration
                   based on NSN GR Downloads.
************************************************************************/

/********************************************************/
/* Based on NSN GR Downloads                            */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright (c) 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('IN_DOWNLOADS')) {
  exit('Access Denied');
}

$lid = intval($lid);
$pagetitle = "- "._REPORTBROKEN;
include_once(NUKE_BASE_DIR.'header.php');
menu(1);
echo "<br />\n";
OpenTable();
echo "<center><span class='option'><strong>"._REPORTBROKEN."</strong></span><br /><br /><br /><span class='content'>\n";
echo "<form action='modules.php?name=$module_name' method='post'>\n";
echo "<input type='hidden' name='lid' value='$lid'>\n";
echo ""._THANKSBROKEN."<br />"._SECURITYBROKEN."<br /><br />\n";
echo "<input type='hidden' name='op' value='brokendownloadS'><input type='submit' value='"._REPORTBROKEN."'></center></form>\n";
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>