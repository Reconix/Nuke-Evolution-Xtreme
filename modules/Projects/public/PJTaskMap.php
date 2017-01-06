<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_PUBLIC')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_TASKMAP;
include("header.php");
title(_PJ_TITLE." ".$pj_config['version_number'].": "._PJ_TASKMAP);

$select_users_form = $db->sql_query("SELECT * FROM `".$prefix."_nsnpj_members` ORDER BY `member_id`");
echo "<br />";
OpenTable();
echo "<center>Select a user to view his projects:<br /><br />";
echo "<form action=\"modules.php?name=Projects&op=PJUserProjects\" method=\"POST\" name=\"user_view\"";
echo "<select name=\"memberid\"";
while(list($form_user_id, $form_user, $form_user_email) = $db->sql_fetchrow($select_users_form)) {
	echo "<option value=\"".$form_user_id."\">".$form_user."</option>";
}
echo "</select><br /><br />";
echo "<input type=\"submit\" value=\"View\">";
echo "</form>";
echo "</center>";
CloseTable();
echo "<br /><br />";

$projectresult = $db->sql_query("SELECT `project_id` FROM `".$prefix."_nsnpj_projects` ORDER BY `weight`");
while(list($project_id) = $db->sql_fetchrow($projectresult)) {
  $project = pjprojectpercent_info($project_id);
  $projectstatus = pjprojectstatus_info($project['status_id']);
  $projectpriority = pjprojectpriority_info($project['priority_id']);
  $memberresult = $db->sql_query("SELECT `member_id` FROM `".$prefix."_nsnpj_projects_members` WHERE `project_id`='$project_id' ORDER BY `member_id`");
  $member_total = $db->sql_numrows($membersresult);
  OpenTable();
  echo "<table align='center' width='100%' border='1' cellspacing='0' cellpadding='2'>\n";
  echo "<tr>\n";
  echo "<td width='100%' bgcolor='$bgcolor2' colspan='2'><b>"._PJ_PROJECT."</b></td>\n";
  echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_SITE."</b></nobr></td>\n";
  echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_STATUS."</b></nobr></td>\n";
  echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_PRIORITY."</b></nobr></td>\n";
  echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_PROGRESSBAR."</b></nobr></td>\n";
  echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_MEMBERS."</b></nobr></td>\n";
  echo "</tr>\n";
  $pjimage = pjimage("project.png", $module_name);
  if($project['featured'] > 0) { $project['project_name'] = "<b>".$project['project_name']."</b>"; }
  echo "<tr><td align='center'><img src='$pjimage'></td>\n";
  echo "<td width='100%'><a href='modules.php?name=$module_name&amp;op=PJProject&amp;project_id=$project_id'>".$project['project_name']."</a></td>\n";
  if($project['project_site'] > "") {
    $pjimage = pjimage("demo.png", $module_name);
    $demo = " <a href='".$project['project_site']."' target='_blank'><img src='$pjimage' border='0' alt='".$project['project_name']." "._PJ_SITE."' title='".$project['project_name']." "._PJ_SITE."'></a>";
  } else {
    $demo = "&nbsp;";
  }
  echo "<td align='center'>$demo</td>\n";
  if($projectstatus['status_name'] == ""){ $projectstatus['status_name'] = _PJ_NA; }
  echo "<td align='center'><nobr>".$projectstatus['status_name']."</nobr></td>\n";
  if($projectpriority['priority_name'] == ""){ $projectpriority['priority_name'] = _PJ_NA; }
  echo "<td align='center'><nobr>".$projectpriority['priority_name']."</nobr></td>\n";
  $wbprogress = pjprogress($project['project_percent']);
  echo "<td align='center'><nobr>$wbprogress</nobr></td>\n";
  echo "<td align='center'><nobr>$member_total</nobr></td></tr>\n";
  echo "<tr><td width='100%' bgcolor='$bgcolor2' colspan='7'><b>"._PJ_PROJECTTASKS."</b></td></tr>\n";
  $taskresult = $db->sql_query("SELECT `task_id`, `task_name`, `task_percent`, `priority_id`, `status_id` FROM `".$prefix."_nsnpj_tasks` WHERE `project_id`='$project_id' ORDER BY `task_name`");
  $task_total = $db->sql_numrows($taskresult);
  if($task_total != 0){
    while(list($task_id, $task_name, $task_percent, $priority_id, $status_id) = $db->sql_fetchrow($taskresult)) {
      $memberresult = $db->sql_query("SELECT `member_id` FROM `".$prefix."_nsnpj_tasks_members` WHERE `task_id`='$task_id' ORDER BY `member_id`");
      $member_total = $db->sql_numrows($membersresult);
      $taskstatus = pjtaskstatus_info($status_id);
      $taskpriority = pjtaskpriority_info($priority_id);
      $pjimage = pjimage("task.png", $module_name);
      echo "<tr><td><img src='$pjimage'></td>\n";
      echo "<td colspan='2' width='100%'><a href='modules.php?name=$module_name&amp;op=PJTask&amp;task_id=$task_id'>$task_name</a></td>\n";
      if($taskstatus['status_name'] == ""){ $taskstatus['status_name'] = _PJ_NA; }
      echo "<td align='center'><nobr>".$taskstatus['status_name']."</nobr></td>\n";
      if($taskpriority['priority_name'] == ""){ $taskpriority['priority_name'] = _PJ_NA; }
      echo "<td align='center'><nobr>".$taskpriority['priority_name']."</nobr></td>\n";
      $wbprogress = pjprogress($task_percent);
      echo "<td align='center'><nobr>$wbprogress</nobr></td>\n";
      echo "<td align='center'><nobr>$member_total</nobr></td></tr>\n";
    }
  } else {
    echo "<tr>\n";
    echo "<td width='100%' colspan='7' align='center'><nobr>"._PJ_NOTASKS."</nobr></td>\n";
    echo "</tr>\n";
  }
  echo "</table>\n";
  CloseTable();
  echo "<br />\n";
}
include("footer.php");

?>