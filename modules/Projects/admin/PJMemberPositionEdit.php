<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright � 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_MEMBERS.": "._PJ_EDITPOSITION;
$position_id = intval($position_id);
if($position_id < 1) { header("Location: ".$admin_file.".php?op=PJMemberPositionList"); }
include("header.php");
$position = pjmemberposition_info($position_id);
pjadmin_menu(_PJ_MEMBERS.": "._PJ_EDITPOSITION);
echo "<br />\n";
OpenTable();
echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
echo "<form method='post' action='".$admin_file.".php'>\n";
echo "<input type='hidden' name='op' value='PJMemberPositionUpdate'>\n";
echo "<input type='hidden' name='position_id' value='$position_id'>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_POSITIONNAME.":</td>\n";
echo "<td><input type='text' name='position_name' size='30' value=\"".$position['position_name']."\"></td></tr>\n";
echo "<tr><td colspan='2' align='center'><input type='submit' value='"._PJ_UPDATEPOSITION."'></td></tr>\n";
echo "</form>\n";
echo "</table>\n";
CloseTable();
pj_copy();
include("footer.php");

?>