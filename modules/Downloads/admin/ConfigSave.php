<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : ConfigSave.php
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

downloads_save_config("admperpage",$xadmperpage);
downloads_save_config("blockunregmodify",$xblockunregmodify);
downloads_save_config("dateformat",$xdateformat);
downloads_save_config("mostpopular",$xmostpopular);
downloads_save_config("mostpopulartrig",$xmostpopulartrig);
downloads_save_config("perpage",$xperpage);
downloads_save_config("popular",$xpopular);
downloads_save_config("results",$xresults);
downloads_save_config("show_download",$xshow_download);
downloads_save_config("show_links_num",$xshow_links_num);
downloads_save_config("usegfxcheck",$xusegfxcheck);
redirect($admin_file.".php?op=DLConfig");

?>