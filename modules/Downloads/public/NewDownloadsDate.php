<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : NewDownloadsDate.php
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

$dateDB = (date("d-M-Y", $selectdate));
$dateView = (date("F d, Y", $selectdate));
$pagetitle = "- $dateView - $totaldownloads "._NEWDOWNLOADS;
include_once(NUKE_BASE_DIR.'header.php');
menu(1);
echo "<br />";
OpenTable();
$newdownloadDB = Date("Y-m-d", $selectdate);
$result = $db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads WHERE date LIKE '%$newdownloadDB%' AND active>'0'");
$totaldownloads = $db->sql_numrows($result);
title("$dateView - $totaldownloads "._NEWDOWNLOADS);
echo "<table border='0' cellpadding='0' cellspacing='4' width='100%'>\n";
$result = $db->sql_query("SELECT lid FROM ".$prefix."_downloads_downloads WHERE date LIKE '%$newdownloadDB%' AND active>'0' ORDER BY title ASC");
$a = 0;
while(list($lid) = $db->sql_fetchrow($result)) {
  if ($a == 0) { echo "<tr>"; }
  echo "<td valign='top' width='50%'><span class='content'>";
  showresulting($lid);
  echo "</span></td>";
  $a++;
  if ($a == 2) { echo "</tr>"; $a = 0; }
}
if ($a ==1) { echo "<td width=\"50%\">&nbsp;</td></tr>"; } else { echo "</tr>"; }
echo "</table>\n";
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>