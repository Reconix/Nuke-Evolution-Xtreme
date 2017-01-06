<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : modifydownloadrequestS.php
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
$cat = intval($cat);
$filesize = str_replace(',', '', $filesize);
$filesize = str_replace('.', '', $filesize);
$filesize = intval($filesize);
if(is_user()) {
  $ratinguser = $cookie[1];
} else {
  $ratinguser = $anonymous;
}
if ($dl_config['blockunregmodify'] == 1 && !is_user()) {
  include_once(NUKE_BASE_DIR.'header.php');
  menu(1);
  echo "<br />\n";
  OpenTable();
  echo "<center><span class='content'>"._DONLYREGUSERSMODIFY."</span></center>\n";
  CloseTable();
  include_once(NUKE_BASE_DIR.'footer.php');
} else {
  $title = Fix_Quotes($title);
  $url = Fix_Quotes($url);
  $description = Fix_Quotes($description);
  $sub_ip = $_SERVER['REMOTE_ADDR'];
  $db->sql_query("INSERT INTO ".$prefix."_downloads_mods VALUES (NULL, $lid, $cat, 0, '$title', '$url', '$description', '$ratinguser', '$sub_ip', 0, '$auth_name', '$email', '$filesize', '$version', '$homepage')");
  include_once(NUKE_BASE_DIR.'header.php');
  menu(1);
  echo "<br />\n";
  OpenTable();
  echo "<center><span class='content'>"._THANKSFORINFO." "._LOOKTOREQUEST."</span></center>\n";
  CloseTable();
  include_once(NUKE_BASE_DIR.'footer.php');
}

?>