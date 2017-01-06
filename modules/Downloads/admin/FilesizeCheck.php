<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : FilesizeCheck.php
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
echo "<table align='center' width='100%' cellpadding='2' cellspacing='2' border='0'>\n";
echo "<tr><td align='center'><a href='".$admin_file.".php?op=FilesizeValidate&amp;cid=0'>"._CHECKALLDOWNLOADS."</a><br /><br /></td></tr>\n";
echo "<tr><td align='center'><strong>"._CHECKCATEGORIES."</strong><br />"._INCLUDESUBCATEGORIES."<br /><br /></td></tr>\n";
$result = $db->sql_query("SELECT * FROM ".$prefix."_downloads_categories ORDER BY parentid,title");
while($cidinfo = $db->sql_fetchrow($result)) {
  if ($cidinfo['parentid'] != 0) { $cidinfo['title'] = getparent($cidinfo['parentid'],$cidinfo['title']); }
  $transfertitle = str_replace (" ", "_", $cidinfo['title']);
  echo "<tr><td align='center'><a href='".$admin_file.".php?op=FilesizeValidate&amp;cid=".$cidinfo['cid']."&amp;ttitle=$transfertitle'>".$cidinfo['title']."</a></td></tr>\n";
}
echo "</table>\n";
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>