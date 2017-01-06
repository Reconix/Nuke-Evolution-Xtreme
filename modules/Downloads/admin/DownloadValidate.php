<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : DownloadValidate.php
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

@set_time_limit( 600 );
$pagetitle = _DOWNLOADSADMIN.": "._DOWNLOADVALIDATION;
include_once(NUKE_BASE_DIR.'header.php');
OpenTable();
echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=DLMain\">" . _DOWNLOADS_ADMIN_HEADER . "</a></div>\n";
echo "<br /><br />";
echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _DOWNLOADS_RETURNMAIN . "</a> ]</div>\n";
CloseTable();
echo "<br />";
title(_DOWNLOADSADMIN.": "._DOWNLOADVALIDATION);
DLadminmain();
echo "<br />\n";
OpenTable();
$cidtitle = str_replace ("_", "", $ttitle);
echo "<table align='center' cellpadding='2' cellspacing='2' border='0' width='80%'>\n";
if ($cid == 0) {
  echo "<tr><td align='center' colspan='3'><strong>"._CHECKALLDOWNLOADS."</strong><br />"._BEPATIENT."</td></tr>\n";
  $result = $db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads ORDER BY title");
} else {
  echo "<tr><td align='center' colspan='3'><strong>"._VALIDATINGCAT.": $cidtitle</strong><br />"._BEPATIENT."</td></tr>\n";
  $result = $db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads WHERE cid='$cid' ORDER BY title");
}
echo "<tr><td bgcolor='$bgcolor2' align='center'><strong>"._STATUS."</strong></td><td bgcolor='$bgcolor2' width='80%'><strong>"._TITLE."</strong></td><td bgcolor='$bgcolor2' align='center'><strong>"._FUNCTIONS."</strong></td></tr>\n";
while($lidinfo = $db->sql_fetchrow($result)) {
  if (!eregi("http://", $lidinfo['url']) AND !eregi("ftp://", $lidinfo['url'])) { $lidinfo['url'] = $nukeurl."/".$lidinfo['url']; }
  if (!@file($lidinfo['url'])){
    echo "<tr><td align='center' bgcolor='$bgcolor2'><strong>&nbsp;&nbsp;"._FAILED."&nbsp;&nbsp;</strong></td>\n";
    echo "<td>&nbsp;&nbsp;<a href='".$lidinfo['url']."' target='new'>".$lidinfo['title']."</a>&nbsp;&nbsp;</td>\n";
    echo "<td align='center'>&nbsp;&nbsp;[ <a href='".$admin_file.".php?op=DownloadModify&amp;lid=".$lidinfo['lid']."'>"._DL_EDIT."</a>";
    echo " | <a href='".$admin_file.".php?op=DownloadDelete&amp;lid=".$lidinfo['lid']."'>"._DL_DELETE."</a> ]&nbsp;&nbsp;</span></td></tr>\n";
    $date = date("M d, Y g:i:a");
    $sub_ip = $_SERVER['REMOTE_ADDR'];
    $db->sql_query("INSERT INTO ".$prefix."_downloads_mods VALUES (NULL, ".$lidinfo['lid'].", 0, 0, '', '', '', '"._DSCRIPT."<br />$date', '$sub_ip', 1, '".$lidinfo['name']."', '".$lidinfo['email']."', '".$lidinfo['filesize']."', '".$lidinfo['version']."', '".$lidinfo['homepage']."')");
  } else {
    echo "<tr><td align='center'>&nbsp;&nbsp;"._OK."&nbsp;&nbsp;</td>\n";
    echo "<td>&nbsp;&nbsp;<a href='".$lidinfo['url']."' target='new'>".$lidinfo['title']."</a>&nbsp;&nbsp;</td>\n";
    echo "<td align='center'>&nbsp;&nbsp;"._DL_NONE."&nbsp;&nbsp;</td></tr>\n";
  }
}
echo "<tr><td align='center' colspan='3'>"._GOBACK."</td></tr>\n";
echo "</table>\n";
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>