<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : DownloadBroken.php
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

$pagetitle = _DOWNLOADSADMIN.": "._DUSERREPBROKEN;
include_once(NUKE_BASE_DIR.'header.php');
OpenTable();
echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=DLMain\">" . _DOWNLOADS_ADMIN_HEADER . "</a></div>\n";
echo "<br /><br />";
echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _DOWNLOADS_RETURNMAIN . "</a> ]</div>\n";
CloseTable();
echo "<br />";
$result = $db->sql_query("SELECT * FROM ".$prefix."_downloads_mods WHERE brokendownload='1' ORDER BY rid");
$totalbroken = $db->sql_numrows($result);
title("$pagetitle ($totalbroken)");
DLadminmain();
echo "<br />\n";
OpenTable();
echo "<center>"._DIGNOREINFO."<br />\n"._DDELETEINFO."</center><br />\n";
echo "<table align='center' width='80%' cellpadding='2' cellspacing='0'>";
if ($totalbroken==0) {
  echo "<tr><td align='center'><strong>"._DNOREPORTEDBROKEN."<strong></td></tr>\n";
} else {
  $colorswitch = $bgcolor2;
  echo "<tr>\n";
  echo "<td><strong>"._DOWNLOAD."</strong></td>\n";
  echo "<td><strong>"._SUBMITTER."</strong></td>\n";
  echo "<td><strong>"._DOWNLOADOWNER."</strong></td>\n";
  echo "<td><strong>"._IGNORE."</strong></td>\n";
  echo "<td><strong>"._DL_DELETE."</strong></td>\n";
  echo "<td><strong>"._DL_EDIT."</strong></td>\n";
  echo "</tr>\n";
  while($ridinfo = $db->sql_fetchrow($result)) {
    $lidinfo = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads WHERE lid='".$ridinfo['lid']."'"));
    list($memail) = $db->sql_fetchrow($db->sql_query("SELECT user_email FROM ".$user_prefix."_users WHERE username='".$ridinfo['modifier']."'"));
    list($oemail) = $db->sql_fetchrow($db->sql_query("SELECT user_email FROM ".$user_prefix."_users WHERE username='".$lidinfo['name']."'"));
    echo "<tr>\n";
    echo "<td bgcolor='$colorswitch'><a href='".$lidinfo['url']."'>".$lidinfo['title']."</a></td>\n";
    echo "<td bgcolor='$colorswitch'>";
    if ($memail=='') { echo $ridinfo['modifier']; } else { echo "<a href='mailto:$memail'>".$ridinfo['modifier']."</a>"; }
    echo "</td>\n";
    echo "<td bgcolor='$colorswitch'>";
    if ($oemail=='') { echo $lidinfo['name']; } else { echo "<a href='mailto:$oemail'>".$lidinfo['name']."</a>"; }
    echo "</td>\n";
    echo "<td bgcolor='$colorswitch' align='center'><a href='".$admin_file.".php?op=DownloadBrokenIgnore&amp;lid=".$ridinfo['lid']."'>X</a></td>\n";
    echo "<td bgcolor='$colorswitch' align='center'><a href='".$admin_file.".php?op=DownloadBrokenDelete&amp;lid=".$ridinfo['lid']."'>X</a></td>\n";
    echo "<td bgcolor='$colorswitch' align='center'><a href='".$admin_file.".php?op=DownloadModify&amp;lid=".$ridinfo['lid']."'>X</a></td>\n";
    echo "</tr>\n";
    if ($colorswitch == $bgcolor2) { $colorswitch = $bgcolor1; } else { $colorswitch = $bgcolor2; }
  }
}
echo "</table>\n";
CloseTable();
$cache->delete('numbrokend', 'submissions');
include_once(NUKE_BASE_DIR.'footer.php');

?>