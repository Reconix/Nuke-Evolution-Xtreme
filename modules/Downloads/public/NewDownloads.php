<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : NewDownloads.php
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

$pagetitle = "- "._NEWDOWNLOADS;
include_once(NUKE_BASE_DIR.'header.php');
menu(1);
echo "<br />";
title(_NEWDOWNLOADS);
OpenTable();
$counter = 0;
$allweekdownloads = 0;
while ($counter <= 7-1){
  $newdownloaddayRaw = (time()-(86400 * $counter));
  $newdownloadDB = Date("Y-m-d", $newdownloaddayRaw);
  $totaldownloads = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads WHERE date LIKE '%$newdownloadDB%' AND active>'0'"));
  $counter++;
  $allweekdownloads = $allweekdownloads + $totaldownloads;
}
$counter = 0;
$allmonthdownloads = 0;
while ($counter <=30-1){
  $newdownloaddayRaw = (time()-(86400 * $counter));
  $newdownloadDB = Date("Y-m-d", $newdownloaddayRaw);
  $totaldownloads = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads WHERE date LIKE '%$newdownloadDB%' AND active>'0'"));
  $allmonthdownloads = $allmonthdownloads + $totaldownloads;
  $counter++;
}
echo "<center><strong>"._TOTALNEWDOWNLOADS.":</strong> "._LASTWEEK." - $allweekdownloads \ "._LAST30DAYS." - $allmonthdownloads<br />\n";
echo ""._SHOW.": <a href='modules.php?name=$module_name&amp;op=NewDownloads&amp;newdownloadshowdays=7'>"._1WEEK."</a> - <a href='modules.php?name=$module_name&amp;op=NewDownloads&amp;newdownloadshowdays=14'>"._2WEEKS."</a> - <a href='modules.php?name=$module_name&amp;op=NewDownloads&amp;newdownloadshowdays=30'>"._30DAYS."</a>\n";
echo "</center><br />\n";
if (!isset($newdownloadshowdays)) { $newdownloadshowdays = 7; }
echo "<br /><center><strong>"._DTOTALFORLAST." $newdownloadshowdays "._DAYS.":</strong><br /><br />\n";
$counter = 0;
$allweekdownloads = 0;
while ($counter <= $newdownloadshowdays-1) {
  $newdownloaddayRaw = (time()-(86400 * $counter));
  $newdownloadDB = Date("Y-m-d", $newdownloaddayRaw);
  $totaldownloads = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads WHERE date LIKE '%$newdownloadDB%' AND active>'0'"));
  $counter++;
  $allweekdownloads = $allweekdownloads + $totaldownloads;
  echo "<strong><big>&middot;</big></strong> <a href='modules.php?name=$module_name&amp;op=NewDownloadsDate&amp;selectdate=$newdownloaddayRaw'>$newdownloadDB</a>&nbsp($totaldownloads)<br />\n";
}
$counter = 0;
$allmonthdownloads = 0;
echo "</center>\n";
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>