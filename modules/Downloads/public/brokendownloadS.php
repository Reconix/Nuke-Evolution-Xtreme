<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : brokendownloadS.php
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

global $cookie;
$lid = intval($lid);
if(is_user()) {
  $ratinguser = $cookie[1];
} else {
  $ratinguser = $anonymous;
}
$sub_ip = $_SERVER['REMOTE_ADDR'];
$db->sql_query("INSERT INTO ".$prefix."_downloads_mods VALUES (NULL, $lid, 0, 0, '', '', '', '$ratinguser', '$sub_ip', 1, '', '', '', '', '')");
$pagetitle = "- "._REPORTBROKEN;
include_once(NUKE_BASE_DIR.'header.php');
menu(1);
echo "<br />\n";
OpenTable();
echo "<br /><center>"._THANKSFORINFO."<br /><br />"._LOOKTOREQUEST."</center><br />\n";
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>