<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : CategoryDelete.php
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

$pagetitle = _CATEGORIESADMIN;
$categoryinfo = getcategoryinfo($cid);
include_once(NUKE_BASE_DIR.'header.php');
OpenTable();
echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=DLMain\">" . _DOWNLOADS_ADMIN_HEADER . "</a></div>\n";
echo "<br /><br />";
echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _DOWNLOADS_RETURNMAIN . "</a> ]</div>\n";
CloseTable();
echo "<br />";
title(_CATEGORIESADMIN);
DLadminmain();
echo "<br />\n";
OpenTable();
echo "<center>\n";
echo "<strong>"._EZTHEREIS." ".$categoryinfo['categories']." "._EZSUBCAT." "._EZATTACHEDTOCAT."</strong><br />\n";
echo "<strong>"._EZTHEREIS." ".$categoryinfo['downloads']." "._DOWNLOADS." "._EZATTACHEDTOCAT."</strong><br />\n";
echo "<br /><strong>"._DELEZDOWNLOADSCATWARNING."</strong><br /><br />\n";
echo "[ <a href='".$admin_file.".php?op=CategoryDeleteSave&amp;cid=$cid'>"._YES."</a> | <a href='".$admin_file.".php?op=Categories'>"._NO."</a> ]\n";
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>