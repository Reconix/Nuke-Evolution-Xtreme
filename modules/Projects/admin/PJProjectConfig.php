<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_PROJECTS.": "._PJ_CONFIG;
include("header.php");
pjadmin_menu(_PJ_PROJECTS.": "._PJ_CONFIG);
echo "<br />\n";
OpenTable();
echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
echo "<form method='post' action='".$admin_file.".php'>\n";
echo "<input type='hidden' name='op' value='PJProjectConfigUpdate'>\n";

echo "<tr><td bgcolor='$bgcolor2'><b>"._PJ_NEWPROJECTSTATUS.":</b></td>\n";
echo "<td><select name='new_project_status'>\n";
$status = $db->sql_query("SELECT `status_id`, `status_name` FROM `".$prefix."_nsnpj_projects_status` ORDER BY `status_weight`");
while(list($status_id, $status_name) = $db->sql_fetchrow($status)) {
    if($pj_config['new_project_status'] == $status_id) { $sel = " selected"; } else { $sel = ""; }
    echo "<option value='$status_id' $sel>$status_name</option>\n";
}
echo "</select></td></tr>\n";

echo "<tr><td bgcolor='$bgcolor2'><b>"._PJ_NEWPROJECTPRIORITY.":</b></td>\n";
echo "<td><select name='new_project_priority'>\n";
$priority = $db->sql_query("SELECT `priority_id`, `priority_name` FROM `".$prefix."_nsnpj_projects_priorities` ORDER BY `priority_weight`");
while(list($priority_id, $priority_name) = $db->sql_fetchrow($priority)) {
    if($pj_config['new_project_priority'] == $priority_id) { $sel = " selected"; } else { $sel = ""; }
    echo "<option value='$priority_id' $sel>$priority_name</option>\n";
}
echo "</select></td></tr>\n";

echo "<tr><td bgcolor='$bgcolor2' valign='top'><b>"._PJ_DATEFORMAT.":</b></td>\n";
echo "<td><input type='text' name='project_date_format' value=\"".$pj_config['project_date_format']."\" size='30'><br />("._PJ_DATENOTE.")</td></tr>\n";

echo "<tr><td bgcolor='$bgcolor2'><b>"._PJ_NEWPROJECTPOSITION.":</b></td>\n";
echo "<td><select name='new_project_position'>\n";
$position = $db->sql_query("SELECT `position_id`, `position_name` FROM `".$prefix."_nsnpj_members_positions` ORDER BY `position_weight`");
while(list($position_id, $position_name) = $db->sql_fetchrow($position)) {
    if($pj_config['new_project_position'] == $position_id) { $sel = " selected"; } else { $sel = ""; }
    echo "<option value='$position_id' $sel>$position_name</option>\n";
}
echo "</select></td></tr>\n";

echo "<tr><td colspan='2' align='center'><input type='submit' value='"._PJ_CONFIGUPDATE."'></td></tr>\n";
echo "</form>\n";
echo "</table>\n";
CloseTable();
pj_copy();
include("footer.php");

?>