<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : FilesizeValidate.php
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

$pagetitle = _DOWNLOADSADMIN.": "._FILESIZEVALIDATION;
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
OpenTable();
$cidtitle = str_replace ("_", "", $ttitle);
echo "<table align='center' cellpadding='2' cellspacing='2' border='0' width='80%'>\n";
if ($cid == 0) {
  echo "<tr><td align='center' colspan='3'><strong>"._CHECKALLDOWNLOADS."</strong><br />"._BEPATIENT."</td></tr>\n";
  $result = $db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads WHERE active>'0' ORDER BY title");
} else {
  echo "<tr><td align='center' colspan='3'><strong>"._VALIDATINGCAT.": $cidtitle</strong><br />"._BEPATIENT."</td></tr>\n";
  $result = $db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads WHERE cid='$cid' AND active>'0' ORDER BY title");
}
echo "<tr bgcolor='$bgcolor2'><td width='70%' valign='bottom'><strong>"._FILENAME."</strong></td>\n";
echo "<td align='right' width='15%'><strong>"._OLDSIZE."<br />"._INBYTES."</strong></td>\n";
echo "<td align='right' width='15%'><strong>"._NEWSIZE."<br />"._INBYTES."</strong></td></tr>\n";
while($dresult = $db->sql_fetchrow($result)) {
  echo "<tr bgcolor='$bgcolor1'><td>".stripslashes($dresult['title'])."</td>\n";
  echo "<td align='right'>".number_format($dresult['filesize'])."</td>\n";
  if (!eregi("http",$dresult['url'])) {
    if (!file_exists($dresult['url'])) {
      echo "<td align='right'>"._FAILED."</td></tr>\n";
      $date = date("M d, Y g:i:a");
      $sub_ip = $_SERVER['REMOTE_ADDR'];
      $db->sql_query("INSERT INTO ".$prefix."_downloads_mods VALUES (NULL, ".$dresult['lid'].", 0, 0, '', '', '', '"._DSCRIPT."<br />$date', '$sub_ip', 1, '".$dresult['name']."', '".$dresult['email']."', '".$dresult['filesize']."', '".$dresult['version']."', '".$dresult['homepage']."')");
    } else {
      $newsize = filesize($dresult['url']);
      echo "<td align='right'>".number_format($newsize)."</td></tr>\n";
      $db->sql_query("UPDATE ".$prefix."_downloads_downloads SET filesize='$newsize' WHERE lid='".$dresult['lid']."'");
    }
  } else {
    echo "<td align='right'>"._NOTLOCAL."</td></tr>\n";
  }
}
echo "</table>\n";
echo "<br /><center>"._GOBACK."</center>\n";
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>