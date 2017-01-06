<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : CategoryTransfer.php
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

$pagetitle = _CATEGORIESADMIN.": "._CATTRANS;
include_once(NUKE_BASE_DIR.'header.php');
OpenTable();
echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=DLMain\">" . _DOWNLOADS_ADMIN_HEADER . "</a></div>\n";
echo "<br /><br />";
echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _DOWNLOADS_RETURNMAIN . "</a> ]</div>\n";
CloseTable();
echo "<br />";
title($pagetitle);
DLadminmain();
echo "<br />\n";
$numrows = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads"));
OpenTable();
if ($numrows>0) {
  echo "<table align='center' cellpadding='2' cellspacing='2' border='0'>\n";
  echo "<form method='post' action='".$admin_file.".php'>\n";
  echo "<tr><td align='center' colspan='2'><strong>"._EZTRANSFERDOWNLOADS."</strong></td></tr>\n";
  echo "<tr><td bgcolor='$bgcolor2'>"._FROM.":</td><td><select name='cidfrom'>\n";
  echo "<option value='0'>"._DL_NONE."</option>\n";
  $result2 = $db->sql_query("SELECT * FROM ".$prefix."_downloads_categories WHERE parentid='0' ORDER BY title");
  while($cidinfo = $db->sql_fetchrow($result2)) {
    $crawled = array($cidinfo['cid']);
    CrawlLevel($cidinfo['cid']);
    $x=0;
    while ($x <= (count($crawled)-1)) {
      list($title,$parentid) = $db->sql_fetchrow($db->sql_query("SELECT title, parentid FROM ".$prefix."_downloads_categories WHERE cid='$crawled[$x]'"));
      if ($x > 0) { $title = getparent($parentid,$title); }
      echo "<option value='$crawled[$x]'>$title</option>\n";
      $x++;
    }
  }
  echo "</select></td></tr>\n";
  echo "<tr><td bgcolor='$bgcolor2'>"._TO.":</td><td><select name='cidto'>\n";
  echo "<option value='0'>"._DL_NONE."</option>\n";
  $result2 = $db->sql_query("SELECT cid, title, parentid FROM ".$prefix."_downloads_categories WHERE parentid='0' ORDER BY title");
  while($cidinfo = $db->sql_fetchrow($result2)) {
    $crawled = array($cidinfo['cid']);
    CrawlLevel($cidinfo['cid']);
    $x=0;
    while ($x <= (count($crawled)-1)) {
      list($title,$parentid) = $db->sql_fetchrow($db->sql_query("SELECT title, parentid FROM ".$prefix."_downloads_categories WHERE cid='$crawled[$x]'"));
      if ($x > 0) { $title = getparent($parentid,$title); }
      echo "<option value='$crawled[$x]'>$title</option>\n";
      $x++;
    }
  }
  echo "</select></td></tr>\n";
  echo "<input type='hidden' name='op' value='DownloadTransfer'>\n";
  echo "<tr><td align='center' colspan='2'><input type='submit' value='"._EZTRANSFER."'></td></tr>\n";
  echo "</form>\n</table>\n";
} else {
  echo "<center><strong>"._NOCATTRANS."</strong></center>\n";
}
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>