<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REPORTS.": "._PJ_CONFIG;
include("header.php");
pjadmin_menu(_PJ_REPORTS.": "._PJ_CONFIG);
echo "<br />\n";
OpenTable();
echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
echo "<form method='post' action='".$admin_file.".php'>\n";
echo "<input type='hidden' name='op' value='PJReportConfigUpdate'>\n";
echo "<tr><td bgcolor='$bgcolor2'><b>"._PJ_ADMINEMAIL.":</b></td>\n";
echo "<td><input type='text' name='admin_report_email' value=\"".$pj_config['admin_report_email']."\" size='30'></td></tr>\n";
if($pj_config['notify_report_admin'] == 1) { $notify_a = " selected"; $notify_b = ""; } else { $notify_a = ""; $notify_b = " selected"; }
echo "<tr><td bgcolor='$bgcolor2'><b>"._PJ_NOTIFYADMIN.":</b></td>\n";
echo "<td><select name='notify_report_admin'><option value='1'$notify_a>"._PJ_YES."</option>\n";
echo "<option value='0'$notify_b>"._PJ_NO."</option></select></td></tr>\n";
if($pj_config['notify_report_submitter'] == 1) { $notify_a = " selected"; $notify_b = ""; } else { $notify_a = ""; $notify_b = " selected"; }
echo "<tr><td bgcolor='$bgcolor2'><b>"._PJ_NOTIFYSUBMITTER.":</b></td>\n";
echo "<td><select name='notify_report_submitter'><option value='1'$notify_a>"._PJ_YES."</option>\n";
echo "<option value='0'$notify_b>"._PJ_NO."</option></select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'><b>"._PJ_NEWREPORTSTATUS.":</b></td>\n";
echo "<td><select name='new_report_status'>\n";
$status = $db->sql_query("SELECT `status_id`, `status_name` FROM `".$prefix."_nsnpj_reports_status` ORDER BY `status_weight`");
while(list($status_id, $status_name) = $db->sql_fetchrow($status)) {
    if($pj_config['new_report_status'] == $status_id) { $sel = " selected"; } else { $sel = ""; }
    echo "<option value='$status_id' $sel>$status_name</option>\n";
}
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'><b>"._PJ_NEWREPORTTYPE.":</b></td>\n";
echo "<td><select name='new_report_type'>\n";
$type = $db->sql_query("SELECT `type_id`, `type_name` FROM `".$prefix."_nsnpj_reports_types` ORDER BY `type_weight`");
while(list($type_id, $type_name) = $db->sql_fetchrow($type)) {
    if($pj_config['new_report_type'] == $type_id) { $sel = " selected"; } else { $sel = ""; }
    echo "<option value='$type_id' $sel>$type_name</option>\n";
}
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2' valign='top'><b>"._PJ_DATEFORMAT.":</b></td>\n";
echo "<td><input type='text' name='report_date_format' value=\"".$pj_config['report_date_format']."\" size='30'><br />("._PJ_DATENOTE.")</td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'><b>"._PJ_NEWREPORTPOSITION.":</b></td>\n";
echo "<td><select name='new_report_position'>\n";
$position = $db->sql_query("SELECT `position_id`, `position_name` FROM `".$prefix."_nsnpj_members_positions` ORDER BY `position_name`");
while(list($position_id, $position_name) = $db->sql_fetchrow($position)) {
    if($pj_config['new_report_position'] == $position_id) { $sel = " selected"; } else { $sel = ""; }
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