<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : DownloadBrokenDelete.php
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

$db->sql_query("DELETE FROM ".$prefix."_downloads_mods WHERE lid='$lid'");
$db->sql_query("OPTIMIZE TABLE ".$prefix."_downloads_mods");
$db->sql_query("DELETE FROM ".$prefix."_downloads_downloads WHERE lid='$lid'");
$db->sql_query("OPTIMIZE TABLE ".$prefix."_downloads_downloads");
redirect($admin_file.".php?op=DownloadBroken");

?>