<?php

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
/* Tutorials Module v.1.1.2                                   COPYRIGHT */
/*                                                                      */
/* Copyright (c) 2004 - 2006 by http://www.techgfx.com                  */
/*     Techgfx - Graeme Allan                       (goose@techgfx.com) */
/*                                                                      */
/* Copyright (c) 2002 - 2006 by http://www.portedmods.com               */
/*     Mighty_Y - Yannick Reekmans             (mighty_y@portedmods.com)*/
/*                                                                      */
/* See TechGFX.com for detailed information on the Tutorials Module     */
/*                                                                      */
/* TechGFX: Your dreams, Our imagination                                */
/************************************************************************/

$author_name = "Mighty_Y - Yannick Reekmans";
$author_email = "";
$author_homepage = "http://www.portedmods.com";
$dev_name = "TechGFX - Graeme Allan";
$dev_email = "";
$dev_homepage = "http://www.techgfx.com";
$module_version = "1.1.2";
$module_description = "Tutorials Module with a lot of features (see for yourself :D )";
function show_copyright() {
    global $author_name, $author_email, $author_homepage,$dev_name, $dev_email, $dev_homepage, $module_version, $module_description;
    $module_name = basename(dirname(__FILE__));
    $module_name = eregi_replace("_", " ", $module_name);
    echo "<html>\n"
	."<body bgcolor=\"#F6F6EB\" link=\"#363636\" alink=\"#363636\" vlink=\"#363636\">\n"
	."<title>PMT Tutorials Module: Copyright Information</title>\n"
	."<font size=\"2\" color=\"#363636\" face=\"Verdana, Helvetica\">\n"
	."<center><b>Module Copyright &copy; Information</b><br>"
	."$module_name module for <a href=\"http://phpnuke.org\" target=\"new\">PHP-Nuke</a><br><br></center>\n"
	."<img src=\"../../images/arrow.gif\" border=\"0\">&nbsp;<b>Module's Name:</b> PMT Tutorials Module<br>\n"
	."<img src=\"../../images/arrow.gif\" border=\"0\">&nbsp;<b>Module's Version:</b> $module_version<br>\n"
	."<img src=\"../../images/arrow.gif\" border=\"0\">&nbsp;<b>Module's Description:</b> $module_description<br>\n"
	."<img src=\"../../images/arrow.gif\" border=\"0\">&nbsp;<b>Author's Name:</b> $author_name<br>\n"
	."<img src=\"../../images/arrow.gif\" border=\"0\">&nbsp;<b>Author's HomePage:</b> <a href=\"$author_homepage\" target=\"new\">$author_homepage</a><br>\n"
	."<img src=\"../../images/arrow.gif\" border=\"0\">&nbsp;<b>Graphics & Ideas:</b> $dev_name<br>\n"
	."<img src=\"../../images/arrow.gif\" border=\"0\">&nbsp;<b>TechGFX's HomePage:</b> <a href=\"$dev_homepage\" target=\"new\">$dev_homepage</a><br><br>\n"
        ."<center>[ <a href=\"javascript:void(0)\" onClick=javascript:self.close()>Close</a> ]</center>\n"
	."</font>\n"
	."</body>\n"
	."</html>";
}

show_copyright();

?>
