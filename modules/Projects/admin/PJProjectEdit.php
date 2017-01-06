<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright � 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_PROJECTS.": "._PJ_EDITPROJECT;
include("header.php");
$project = pjproject_info($project_id);
pjadmin_menu(_PJ_PROJECTS.": "._PJ_EDITPROJECT);
echo "<br />\n";
OpenTable();
echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
echo "<form method='post' action='".$admin_file.".php'>\n";
echo "<input type='hidden' name='op' value='PJProjectUpdate'>\n";
echo "<input type='hidden' name='project_id' value='$project_id'>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_PROJECTNAME.":</td>\n";
echo "<td><input type='text' name='project_name' size='30' value=\"".$project['project_name']."\"></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_PROJECTSITE.":</td>\n";
echo "<td><input type='text' name='project_site' size='30' value=\"".$project['project_site']."\"></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2' valign='top'>"._PJ_PROJECTDESCRIPTION.":</td>\n";
echo "<td><textarea name='project_description' cols='60' rows='10' wrap='virtual'>".$project['project_description']."</textarea></td></tr>\n";
$sel1 = $sel2 = $sel3 = $sel4 = "";
if($project['featured'] == 0) { $sel1 = " selected"; } else { $sel2 = " selected"; }
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_FEATUREDBLOCK.":</td>\n";
echo "<td><select name='featured'><option value='0'$sel1>"._PJ_NO."</option>\n";
echo "<option value='1'$sel2>"._PJ_YES."</option></select></td></tr>\n";
$repn = $repy = "";
if($project['allowreports'] == 0) { $repn = " selected"; } else { $repy = " selected"; }
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_ACTIVATEREPORTS.":</td>\n";
echo "<td><select name='allowreports'><option value='0'$repn>"._PJ_NO."</option>\n";
echo "<option value='1'$repy>"._PJ_YES."</option></select></td></tr>\n";
$reqn = $reqy = "";
if($project['allowrequests'] == 0) { $reqn = " selected"; } else { $reqy = " selected"; }
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_ACTIVATEREQUESTS.":</td>\n";
echo "<td><select name='allowrequests'><option value='0'$reqn>"._PJ_NO."</option>\n";
echo "<option value='1'$reqy>"._PJ_YES."</option></select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_PRIORITY.":</td>\n";
echo "<td><select name='priority_id'>\n";
$prioritylist = $db->sql_query("SELECT `priority_id`, `priority_name` FROM `".$prefix."_nsnpj_projects_priorities` ORDER BY `priority_weight`");
while(list($s_priority_id, $s_priority_name) = $db->sql_fetchrow($prioritylist)){
  if($s_priority_id == $project['priority_id']){ $sel = "SELECTed"; } else { $sel = ""; }
  echo "<option value='$s_priority_id' $sel>$s_priority_name</option>\n";
}
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_STATUSPERCENT.":</td>\n";
echo "<td><input type='text' name='project_percent' size='4' value='".$project['project_percent']."'>% "._PJ_STATUSPERCENT_CALCULATE."</td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_STATUS.":</td>\n";
echo "<td><select name='status_id'>\n";
$statuslist = $db->sql_query("SELECT `status_id`, `status_name` FROM `".$prefix."_nsnpj_projects_status` ORDER BY `status_weight`");
while(list($s_status_id, $s_status_name) = $db->sql_fetchrow($statuslist)){
  if($s_status_id == $project['status_id']){ $sel = "SELECTed"; } else { $sel = ""; }
  echo "<option value='$s_status_id' $sel>$s_status_name</option>\n";
}
echo "</select></td></tr>\n";
if($project['date_started'] > 0) {
  $sday = date("j",$project['date_started']);
  $smon = date("n",$project['date_started']);
  $syear = date("Y",$project['date_started']);
} else {
  $sday = "00";
  $smon = "00";
  $syear = "0000";
}
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_STARTDATE.":</td>\n";
echo "<td><select name='project_start_month'>\n<option value='00'>--</option>\n";
for($i = 1; $i <= 12; $i++){
  if($i == $smon){ $sel = "SELECTed"; } else { $sel = ""; }
  echo "<option value='$i' $sel>$i</option>\n";
}
echo "</select><select name='project_start_day'>\n<option value='00'>--</option>\n";
for($i = 1; $i <= 31; $i++){
  if($i == $sday){ $sel = "SELECTed"; } else { $sel = ""; }
  echo "<option value='$i' $sel>$i</option>\n";
}
echo "</select><input type=text name='project_start_year' value='".$syear."' size=4 maxlength=4></td></tr>\n";
if($project['date_finished'] > 0) {
  $fday = date("j",$project['date_finished']);
  $fmon = date("n",$project['date_finished']);
  $fyear = date("Y",$project['date_finished']);
} else {
  $fday = "00";
  $fmon = "00";
  $fyear = "0000";
}
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_FINISHDATE.":</td>\n";
echo "<td><select name='project_finish_month'>\n<option value='00'>--</option>\n";
for($i = 1; $i <= 12; $i++){
  if($i == $fmon){ $sel = "SELECTed"; } else { $sel = ""; }
  echo "<option value='$i' $sel>$i</option>\n";
}
echo "</select><select name='project_finish_day'>\n<option value='00'>--</option>\n";
for($i = 1; $i <= 31; $i++){
  if($i == $fday){ $sel = "SELECTed"; } else { $sel = ""; }
  echo "<option value='$i' $sel>$i</option>\n";
}
echo "</select><input type=text name='project_finish_year' value='".$fyear."' size='4' maxlength='4'></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2' valign='top'>"._PJ_ASSIGNMEMBERS.":</td>\n";
echo "<td><select name='member_ids[]' size='10' multiple>\n";
$memberlistresult = $db->sql_query("SELECT `member_id`, `member_name` FROM `".$prefix."_nsnpj_members` ORDER BY `member_name`");
while(list($member_id, $member_name) = $db->sql_fetchrow($memberlistresult)) {
  $memberexresult = $db->sql_query("SELECT `member_id` FROM `".$prefix."_nsnpj_projects_members` WHERE `member_id`='$member_id' AND `project_id`='$project_id'");
  $numrows = $db->sql_numrows($memberexresult);
  if($numrows < 1){
    echo "<option value='$member_id'>" . $member_name . "</option>\n";
  }
}
echo "</select></td></tr>\n";
echo "<tr><td colspan='2' align='center'><input type='submit' value='"._PJ_UPDATEPROJECT."'></td></tr>\n";
echo "</form>\n";
echo "</table>\n";
CloseTable();
echo "<br />";
OpenTable();
echo "<table width='100%' border='1' cellspacing='0' cellpadding='2'>";
echo "<form method='post' action='".$admin_file.".php'>";
echo "<input type='hidden' name='op' value='PJProjectMembers'>";
echo "<input type='hidden' name='project_id' VALUE='$project_id'>";
echo "<tr><td align='left' bgcolor='$bgcolor2' width='100%' colspan='2'><b>"._PJ_PROJECTMEMBERS."</b></td>";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_POSITION."</b></td>";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_DELETE."</b></td></tr>";
$membersresult = $db->sql_query("SELECT `member_id`, `position_id` FROM `".$prefix."_nsnpj_projects_members` WHERE `project_id`='$project_id'");
$numrows = $db->sql_numrows($membersresult);
if($numrows > 0){
  while(list($member_id, $position_id) = $db->sql_fetchrow($membersresult)){
    $member = pjmember_info($member_id);
    $position = pjmemberposition_info($position_id);
    echo "<tr>";
    $pjimage = pjimage("member.png", $modname);
    echo "<td><img src='$pjimage'></td><td width='100%'>" . UsernameColor($member['member_name']) . "</td>";
    echo "<td><input type='hidden' name='member_ids[]' VALUE='$member_id'><select name='position_ids[]'>";
    $positionlistresult = $db->sql_query("SELECT `position_id`, `position_name` FROM `".$prefix."_nsnpj_members_positions` ORDER BY `position_weight`");
    while(list($l_position_id, $l_position_name) = $db->sql_fetchrow($positionlistresult)) {
      if($l_position_id == $position_id){ $sel = "SELECTed"; } else { $sel = ""; }
      echo "<option value='$l_position_id' $sel>$l_position_name</option>";
    }
    echo "</select></td>";
    echo "<td align=center><nobr><input name='delete_member_ids[]' type='checkbox' value='$member_id'></td>";
    echo "</tr>";
  }
  echo "<tr><td colspan='4' width='100%' align=right bgcolor='$bgcolor2'><input type='submit' value='"._PJ_UPDATE."'>";
  echo "<input type='submit' value='"._PJ_DELETE."'></td></tr>";
} else {
  echo "<tr><td colspan='4' width='100%' align=center>"._PJ_NOPROJECTMEMBERS."</td></tr>";
}
echo "</form></TABLE>";
CloseTable();
pj_copy();
include("footer.php");

?>