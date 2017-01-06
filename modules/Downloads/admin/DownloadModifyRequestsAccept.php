<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : DownloadModifyRequestsAccept.php
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

$result = $db->sql_query("SELECT rid, lid, cid, sid, title, url, description, name, email, filesize, version, homepage FROM ".$prefix."_downloads_mods WHERE rid='$rid'");
while(list($rid, $lid, $cid, $sid, $title, $url, $description, $aname, $email, $filesize, $version, $homepage) = $db->sql_fetchrow($result)) {
  $title = stripslashes($title);
  $title = addslashes($title);
  $description = stripslashes($description);
  $description = addslashes($description);
  $db->sql_query("UPDATE ".$prefix."_downloads_downloads SET cid=$cid, sid=$sid, title='$title', url='$url', description='$description', name='$aname', email='$email', filesize='$filesize', version='$version', homepage='$homepage' WHERE lid='$lid'");
  $db->sql_query("DELETE FROM ".$prefix."_downloads_mods WHERE rid='$rid'");
  $db->sql_query("OPTIMIZE TABLE ".$prefix."_downloads_mods");
}
redirect($admin_file.".php?op=DownloadModifyRequests");

?>