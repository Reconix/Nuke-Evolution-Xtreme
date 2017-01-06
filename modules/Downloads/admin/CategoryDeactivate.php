<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : CategoryDeactivate.php
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

$crawled = array($cid);
CrawlLevel($cid);
$x=0;
while ($x <= (count($crawled)-1)) {
  $db->sql_query("UPDATE ".$prefix."_downloads_categories SET active='0' WHERE cid='$crawled[$x]'");
  $db->sql_query("UPDATE ".$prefix."_downloads_downloads SET active='0' WHERE cid='$crawled[$x]'");
  $x++;
}
redirect($admin_file.".php?op=Categories&min=$min");

?>