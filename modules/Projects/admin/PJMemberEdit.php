<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_MEMBERS.": "._PJ_EDITMEMBER;
include("header.php");
$member = pjmember_info($member_id);
pjadmin_menu(_PJ_MEMBERS.": "._PJ_EDITMEMBER);
echo "<br />\n";
OpenTable();
echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
echo "<form method='post' action='".$admin_file.".php'>\n";
echo "<input type='hidden' name='op' value='PJMemberUpdate'>\n";
echo "<input type='hidden' name='member_id' value='$member_id'>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_MEMBERNAME.":</td>\n";
echo "<td><input type='text' name='member_name' size='30' value=\"".$member['member_name']."\"></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_MEMBEREMAIL.":</td>\n";
echo "<td><input type='text' name='member_email' size='30' value=\"".$member['member_email']."\"></td></tr>\n";
echo "<tr><td colspan='2' align='center'><input type='submit' value='"._PJ_UPDATEMEMBER."'></td></tr>\n";
echo "</form>\n";
echo "</table>\n";
CloseTable();
pj_copy();
include("footer.php");

?>