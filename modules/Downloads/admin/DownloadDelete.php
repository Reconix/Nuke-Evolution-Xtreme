<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : DownloadDelete.php
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

	list($url, $ss1, $ss2, $ss3, $ss4, $sname) = $db->sql_fetchrow($db->sql_query("SELECT url, screenshot1, screenshot2, screenshot3, screenshot4, submitter FROM ".$prefix."_downloads_downloads WHERE lid='$lid'"));
	$db->sql_query("UPDATE ".$prefix."_downloads_accesses SET uploads=uploads-1 WHERE username='$sname'");
	$db->sql_query("DELETE FROM ".$prefix."_downloads_downloads WHERE lid='$lid'");
	$db->sql_query("OPTIMIZE TABLE ".$prefix."_downloads_downloads");
	@unlink($url);
	@unlink($ss1);
	@unlink($ss2);
	@unlink($ss3);
	@unlink($ss4);
	redirect($admin_file.".php?op=Downloads&min=$min");

?>