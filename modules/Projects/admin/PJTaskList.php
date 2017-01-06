<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_TASKS.": "._PJ_TASKLIST;
if(!$page) $page = 1;
if(!$per_page) $per_page = 25;
if(!$column) $column = "project_id";
if(!$direction) $direction = "desc";
include("header.php");
pjadmin_menu(_PJ_TASKS.": "._PJ_TASKLIST);
echo "<br />\n";
OpenTable();
echo "<table width='100%' border='1' cellspacing='0' cellpadding='2'>\n";
echo "<tr><td colspan='3' bgcolor='$bgcolor2'><nobr><b>"._PJ_TASKOPTIONS."</b></nobr></td></tr>\n";
$pjimage = pjimage("options.png", $modname);
echo "<tr><td><img src='$pjimage'></td><td colspan='2' width='100%'><nobr><a href='".$admin_file.".php?op=PJTaskAdd'>"._PJ_TASKADD."</a></nobr></td></tr>\n";
$taskrows = $db->sql_numrows($db->sql_query("SELECT `task_id` FROM `".$prefix."_nsnpj_tasks`"));
$pjimage = pjimage("stats.png", $modname);
echo "<tr><td><img src='$pjimage'></td><td colspan='2' width='100%'><nobr>"._PJ_TOTALTASKS.": <b>$taskrows</b></nobr></td></tr>\n";
echo "</table>\n";
//CloseTable();
echo "<br />\n";
$total_pages = ($taskrows / $per_page);
$total_pages_quotient = ($taskrows % $per_page);
if($total_pages_quotient != 0){ $total_pages = ceil($total_pages); }
$start_list = ($per_page * ($page-1));
$end_list = $per_page;
//OpenTable();
echo "<table width='100%' border='1' cellspacing='0' cellpadding='2'>\n";
echo "<tr><td bgcolor='$bgcolor2' width='100%' colspan='2'><nobr><b>"._PJ_TASKS."</b></nobr></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_PROJECT."</b></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_STATUS."</b></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_PRIORITY."</b></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_FUNCTIONS."</b></td></tr>\n";
if($taskrows > 0){
  $reviewresult = $db->sql_query("SELECT `task_id`, `task_name`, `project_id`, `priority_id`, `status_id` FROM `".$prefix."_nsnpj_tasks` ORDER BY `$column` $direction LIMIT $start_list, $end_list");
  while(list($task_id, $task_name, $project_id, $priority_id, $status_id) = $db->sql_fetchrow($reviewresult)){
    $taskstatus = pjtaskstatus_info($status_id);
    $project = pjproject_info($project_id);
    $taskpriority = pjtaskpriority_info($priority_id);
    $members = $db->sql_numrows($db->sql_query("SELECT `member_id` FROM `".$prefix."_nsnpj_tasks_members` WHERE `task_id`='$task_id'"));
    $pjimage = pjimage("task.png", $modname);
    echo "<tr><td><img src='$pjimage'></td><td width='100%'>$task_name</td>\n";
    echo "<td align='center'><nobr><a href='".$admin_file.".php?op=PJProjectList'>".$project['project_name']."</a></nobr></td>\n";
    if($taskstatus['status_name'] == ''){ $taskstatus['status_name'] = _PJ_NA; }
    echo "<td align=center><nobr><a href='".$admin_file.".php?op=PJTaskStatusList'>".$taskstatus['status_name']."</a></nobr></td>\n";
    echo "";
    if($taskpriority['priority_name'] == ""){ $taskpriority['priority_name'] = _PJ_NA; }
    echo "<td align=center><nobr><a href='".$admin_file.".php?op=PJTaskPriorityList'>".$taskpriority['priority_name']."</a></nobr></td>\n";
    echo "<td align=center><nobr>[ <a href='".$admin_file.".php?op=PJTaskEdit&amp;task_id=$task_id'>"._PJ_EDIT."</a>";
    echo " | <a href='".$admin_file.".php?op=PJTaskRemove&amp;task_id=$task_id'>"._PJ_DELETE."</a> ]</td></tr>\n";
  }
  echo "<form method='post' action='".$admin_file.".php'>\n";
  echo "<input type='hidden' name='op' value='PJTaskList'>\n";
  echo "<input type='hidden' name='column' value='$column'>\n";
  echo "<input type='hidden' name='direction' value='$direction'>\n";
  echo "<input type='hidden' name='per_page' value='$per_page'>\n";
  echo "<tr><td colspan='6' width='100%' bgcolor='$bgcolor2'>\n";
  echo "<table width='100%'><tr><td bgcolor='$bgcolor2'><b>"._PJ_PAGE."</b> <select name='page' onChange='submit()'>\n";
  for($i=1; $i<=$total_pages; $i++){
    if($i==$page){ $sel = "SELECTed"; } else { $sel = ""; }
    echo "<option value='$i' $sel>$i</option>\n";
  }
  echo "</select> <b>"._PJ_OF." $total_pages</b></td>\n";
  echo "</form>\n";
  echo "<form method='post' action='".$admin_file.".php'>\n";
  echo "<input type='hidden' name='op' value='PJTaskList'>\n";
  echo "<td align='right' bgcolor='$bgcolor2'><b>"._PJ_SORT.":</b> <select name='column'>\n";
  if($column == "task_id") $selcolumn1 = "SELECTed";
  echo "<option value='task_id' $selcolumn1>"._PJ_TASKID."</option>\n";
  if($column == "project_id") $selcolumn2 = "SELECTed";
  echo "<option value='project_id' $selcolumn2>"._PJ_PROJECTID."</option>\n";
  if($column == "status_id") $selcolumn3 = "SELECTed";
  echo "<option value='status_id' $selcolumn3>"._PJ_STATUSID."</option>\n";
  if($column == "priority_id") $selcolumn4 = "SELECTed";
  echo "<option value='priority_id' $selcolumn4>"._PJ_PRIORITYID."</option>\n";
  echo "</select> <select name='direction'>\n";
  if($direction == "asc") $seldirection1 = "SELECTed";
  echo "<option value='asc' $seldirection1>"._PJ_ASC."</option>\n";
  if($direction == "desc") $seldirection2 = "SELECTed";
  echo "<option value='desc' $seldirection2>"._PJ_DESC."</option>\n";
  echo "</select> <select name='per_page'>\n";
  if($per_page == 5) $selperpage1 = "SELECTed";
  echo "<option value='5' $selperpage1>5</option>\n";
  if($per_page == 10) $selperpage2 = "SELECTed";
  echo "<option value='10' $selperpage2>10</option>\n";
  if($per_page == 25) $selperpage3 = "SELECTed";
  echo "<option value='25' $selperpage3>25</option>\n";
  if($per_page == 50) $selperpage4 = "SELECTed";
  echo "<option value='50' $selperpage4>50</option>\n";
  if($per_page == 100) $selperpage5 = "SELECTed";
  echo "<option value='100' $selperpage5>100</option>\n";
  if($per_page == 200) $selperpage6 = "SELECTed";
  echo "<option value='200' $selperpage6>200</option>\n";
  echo "</select> <input type='submit' value='"._PJ_SORT."'></td>\n";
  echo "</form>\n";
  echo "</tr></table>\n";
  echo "</td></tr>\n";
} else {
  echo "<tr><td colspan='6' width='100%' align='center'>"._PJ_NOTASKS."</td></tr>\n";
}
echo "</table>\n";
CloseTable();
pj_copy();
include("footer.php");

?>