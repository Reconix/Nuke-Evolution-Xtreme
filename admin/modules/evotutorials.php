<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
 ************************************************************************/

if (!defined('ADMIN_FILE')) {
   die ("Illegal File Access");
}

    include(NUKE_BASE_DIR.'header.php');

    OpenTable();
	global $admin_file;
	echo "<center><a href=\"http://evolution-xtreme.com/modules.php?name=Screen_Casts\"><img src=\"images/tutorials-logo.png\" border=\"0\"/></a><br /><br />
	[ <a href=\"$admin_file.php\">Return To Administration Home</a> ]</center>";
	CloseTable();
	
	OpenTable();
	echo "<center><font size=\"3\"><b>About Evo Tutorials</b></font></center><br /><br />";
	echo "Evo Tutorials was designed by killigan the owner of Dark Forge GFX and one of the lead developers for Evolution Xtreme. Long before Xtreme he started
	creating videos for the public to do with Nuke Evolution. The video tutorials supply important step by step instructions ranging from how to install nuke
	evolution to unbanning yourself from your own site.<br /><br />
	
	These tutorials are not only just for installs and such, there are also tutorials for upgrades and even theme upgrades. Killigan also lately has updated his
	Nuke Evolution 2.0.7 install video which has alot more important information in it and supplies more beginners instructions then what his first video had. So if
	your new to Nuke Evolution Basic or Xtreme and you need some know how check out the Evo Tutorials module at Evolution Xtreme Today!<br /><br />
	
	<center><a href=\"http://evolution-xtreme.com/modules.php?name=Screen_Casts\">Visit The Tutorials Today! [Click Me]</a></center>";
	CloseTable();
	
	include(NUKE_BASE_DIR.'footer.php');
	
	
?>