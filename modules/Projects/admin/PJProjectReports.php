<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_PROJECTS.": "._PJ_REPORTLIST;
include("header.php");
$projectresult = $db->sql_query("SELECT `project_name`, `project_description`, `status_id`, `priority_id` FROM `".$prefix."_nsnpj_projects` WHERE `project_id`='$project_id'");
list($project_name, $project_description, $status_id, $priority_id) = $db->sql_fetchrow($projectresult);
pjadmin_menu(_PJ_PROJECTS.": "._PJ_REPORTLIST);
echo "<br />\n";
$reportresult = $db->sql_query("SELECT `report_id`, `report_name`, `type_id`, `status_id` FROM `".$prefix."_nsnpj_reports` WHERE `project_id`='$project_id' ORDER BY `report_name`");
$report_total = $db->sql_numrows($reportresult);
OpenTable();
echo "<table width='100%' border='1' cellspacing='0' cellpadding='2'>\n";
echo "<tr><td colspan='2' bgcolor='$bgcolor2' width='100%'><nobr><b>"._PJ_PROJECT."</b></nobr></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_STATUS."</b></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_PRIORITY."</b></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_FUNCTIONS."</b></td></tr>\n";
$pjimage = pjimage("project.png", $modname);
echo "<tr><td><img src='$pjimage'></td>\n";
echo "<td width='100%'><a href='".$admin_file.".php?op=PJProjectList'>"._PJ_PROJECTS."</a> / <b>$project_name</b></td>\n";
$projectstatus = pjprojectstatus_info($status_id);
if($projectstatus['status_name'] == "") { $projectstatus['status_name'] = _PJ_NA; }
echo "<td align='center'><a href='".$admin_file.".php?op=PJProjectStatusList'>".$projectstatus['status_name']."</a></td>\n";
$projectpriority = pjprojectpriority_info($priority_id);
if($projectpriority['priority_name'] == "") { $projectpriority['priority_name'] = _PJ_NA; }
echo "<td align='center'><a href='".$admin_file.".php?op=PJProjectPriorityList'>".$projectpriority['priority_name']."</a></td>\n";
echo "<td align='center'><nobr>[ <a href='".$admin_file.".php?op=PJProjectEdit&amp;project_id=$project_id'>"._PJ_EDIT."</a> |";
echo " <a href='".$admin_file.".php?op=PJProjectRemove&amp;project_id=$project_id'>"._PJ_DELETE."</a> ]</nobr></td></tr>\n";
echo "<tr><td colspan='5' width='100%' bgcolor='$bgcolor2'><nobr><b>"._PJ_PROJECTOPTIONS."</b></nobr></td></tr>\n";
$pjimage = pjimage("options.png", $modname);
echo "<tr><td><img src='$pjimage'></td><td colspan='4' width='100%'><nobr><a href='".$admin_file.".php?op=PJTaskAdd&amp;project_id=$project_id'>"._PJ_TASKADD."</a></nobr></td></tr>\n";
$pjimage = pjimage("stats.png", $modname);
echo "<tr><td><img src='$pjimage'></td><td colspan='4' width='100%'><nobr>"._PJ_TOTALTASKS.": <b>$task_total</b></nobr></td></tr>\n";
echo "</table>\n";
CloseTable();
echo "<br />\n";
OpenTable();
echo "<table width='100%' border='1' cellspacing='0' cellpadding='2'>\n";
echo "<tr><td colspan='2' bgcolor='$bgcolor2' width='100%'><b>"._PJ_PROJECTREPORTS."</b></a></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_STATUS."</b></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_TYPE."</b></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_FUNCTIONS."</b></td></tr>\n";
if($report_total != 0){
  while(list($report_id, $report_name, $type_id, $status_id) = $db->sql_fetchrow($reportresult)) {
    $pjimage = pjimage("report.png", $modname);
    echo "<tr><td><img src='$pjimage'></td>\n";
    echo "<td width='100%'>$report_name</td>\n";
    $status = pjreportstatus_info($status_id);
    if($status['status_name'] == "") { $status['status_name'] = "<i>N/A</i>"; }
    echo "<td align='center'><a href='".$admin_file.".php?op=PJReportStatusList'>".$status['status_name']."</a></td>\n";
    $type = pjreporttype_info($type_id);
    if($type['type_name'] == "") { $type['type_name'] = "<i>N/A</i>"; }
    echo "<td align='center'><a href='".$admin_file.".php?op=PJReportTypeList'>".$type['type_name']."</a></td>\n";
    echo "<td align='center'><nobr>[ <a href='".$admin_file.".php?op=PJReportEdit&amp;report_id=$report_id'>"._PJ_EDIT."</a>";
    echo " | <a href='".$admin_file.".php?op=PJReportRemove&amp;report_id=$report_id'>"._PJ_DELETE."</a> ]</nobr></td></tr>\n";
  }
} else {
  echo "<tr><td width='100%' colspan='4' align='center'>"._PJ_NOPROJECTREPORTS."</td></tr>\n";
}
echo "</table>\n";
CloseTable();
pj_copy();
include("footer.php");

?>