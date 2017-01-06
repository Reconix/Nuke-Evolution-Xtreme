<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright � 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_TASKS.": "._PJ_TASKADD;
include("header.php");
pjadmin_menu(_PJ_TASKS.": "._PJ_TASKADD);
echo "<br />\n";
OpenTable();
echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
echo "<form method='post' action='".$admin_file.".php'>\n";
echo "<input type='hidden' name='op' value='PJTaskInsert'>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_PROJECT.":</td>\n";
echo "<td><select name='project_id'>\n";
$projectlist = $db->sql_query("SELECT `project_id`, `project_name` FROM `".$prefix."_nsnpj_projects` ORDER BY `project_name`");
while(list($s_project_id, $s_project_name) = $db->sql_fetchrow($projectlist)){
  if($s_project_id == $project_id){ $sel = "SELECTed"; } else { $sel = ""; }
  echo "<option value='$s_project_id' $sel>$s_project_name</option>\n";
}
echo "</select></td></tr>\n";        
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_TASKNAME.":</td>\n";
echo "<td><input type='text' name='task_name' size='30'></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2' valign='top'>"._PJ_TASKDESCRIPTION.":</td>\n";
echo "<td><textarea name='task_description' cols='60' rows='10'></textarea></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_PRIORITY.":</td>\n";
echo "<td><select name='priority_id'>\n";
$prioritylist = $db->sql_query("SELECT `priority_id`, `priority_name` FROM `".$prefix."_nsnpj_tasks_priorities` ORDER BY `priority_weight`");
while(list($s_priority_id, $s_priority_name) = $db->sql_fetchrow($prioritylist)){
  echo "<option value='$s_priority_id'>$s_priority_name</option>\n";
}
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_STATUSPERCENT.":</td>\n";
echo "<td><input type='text' name='task_percent' size='4'>%</td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_STATUS.":</td>\n";
echo "<td><select name='status_id'>\n";
$statuslist = $db->sql_query("SELECT `status_id`, `status_name` FROM `".$prefix."_nsnpj_tasks_status` ORDER BY `status_weight`");
while(list($s_status_id, $s_status_name) = $db->sql_fetchrow($statuslist)){
  echo "<option value='$s_status_id'>$s_status_name</option>\n";
}
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_STARTDATE.":</td>\n";
echo "<td><select name='task_start_month'><option value='00'>--</option>\n";
for($i = 1; $i <= 12; $i++){
  if($i == date("m")){ $sel = "SELECTed"; } else { $sel = ""; }
  echo "<option value='$i' $sel>$i</option>\n";
}
echo "</select><select name='task_start_day'><option value='00'>--</option>\n";
for($i = 1; $i <= 31; $i++){
  if($i == date("d")){ $sel = "SELECTed"; } else { $sel = ""; }
  echo "<option value='$i' $sel>$i</option>\n";
}
echo "</select><input type=text name='task_start_year' value='".date("Y")."' size='4' maxlength='4'></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_FINISHDATE.":</td>\n";
echo "<td><select name='task_finish_month'><option value='00'>--</option>\n";
for($i = 1; $i <= 12; $i++){
  echo "<option value='$i'>$i</option>\n";
}
echo "</select><select name='task_finish_day'><option value='00'>--</option>\n";
for($i = 1; $i <= 31; $i++){
  echo "<option value='$i'>$i</option>\n";
}
echo "</select><input type=text name='task_finish_year' value='0000' size='4' maxlength='4'></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2' valign='top'>"._PJ_ASSIGNMEMBERS.":</td>\n";
echo "<td><select name='member_ids[]' size='10' multiple>\n";
$memberlistresult = $db->sql_query("SELECT `member_id`, `member_name` FROM `".$prefix."_nsnpj_members` ORDER BY `member_name`");
while(list($member_id, $member_name) = $db->sql_fetchrow($memberlistresult)) {
  echo "<option value='$member_id'>$member_name</option>\n";
}
echo "</select></td></tr>\n";
echo "<tr><td align='center' colspan='2'><input type='submit' value='"._PJ_TASKADD."'></td></tr>\n";
echo "</form>\n";
echo "</table>\n";
CloseTable();
pj_copy();
include("footer.php");

?>