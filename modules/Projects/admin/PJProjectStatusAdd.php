<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright � 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_PROJECTS.": "._PJ_STATUSADD;
include("header.php");
pjadmin_menu(_PJ_PROJECTS.": "._PJ_STATUSADD);
echo "<br />\n";
OpenTable();
echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
echo "<form method='post' action='".$admin_file.".php'>\n";
echo "<input type='hidden' name='op' value='PJProjectStatusInsert'>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_STATUSNAME.":</td>\n";
echo "<td><input type='text' name='status_name' size='30'></td></tr>\n";
echo "<tr><td colspan='2' align='center'><input type='submit' value='"._PJ_STATUSADD."'></td></tr>\n";
echo "</form>\n";
echo "</table>\n";
CloseTable();
pj_copy();
include("footer.php");

?>