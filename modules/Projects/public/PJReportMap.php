<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_PUBLIC')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REPORTMAP;
include("header.php");
title(_PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REPORTMAP);

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
  $project = pjproject_info($project_id);
  $projectstatus = pjprojectstatus_info($project['status_id']);
  $projectpriority = pjprojectpriority_info($project['priority_id']);
  if($project['allowreports'] > 0) {
    $reportresult = $db->sql_query("SELECT `report_id`, `report_name`, `status_id`, `type_id` FROM `".$prefix."_nsnpj_reports` WHERE `project_id`='$project_id' ORDER BY `report_name`");
    $report_total = $db->sql_numrows($reportresult);
    OpenTable();
    echo "<table align='center' border='1' cellpadding='2' cellspacing='0' width='100%'>\n";
    echo "<tr>\n<td bgcolor='$bgcolor2' colspan='2' width='100%'><b>"._PJ_PROJECT."</b></td>\n";
    echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_SITE."</b></nobr></td>\n";
    echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_STATUS."</b></nobr></td>\n";
    echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_PRIORITY."</b></nobr></td>\n";
    echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_REPORTS."</b></nobr></td>\n";
    echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_LASTSUBMISSION."</b></nobr></td>\n</tr>\n";
    $pjimage = pjimage("project.png", $module_name);
    if($project['featured'] > 0) { $project['project_name'] = "<b>".$project['project_name']."</b>"; }
    echo "<tr>\n<td align='center'><img src='$pjimage'></td>\n";
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
    echo "<td align='center'><nobr>$report_total</nobr></td>\n";
    if($report_total > 0){
      list($last_date) = $db->sql_fetchrow($db->sql_query("SELECT `date_submitted` FROM `".$prefix."_nsnpj_reports` WHERE `project_id`='$project_id' ORDER BY `date_submitted` desc"));
      $last_date = date($pj_config['report_date_format'], $last_date);    
    } else {
      $last_date = _PJ_NA;
    }
    echo "<td align='center'><nobr>$last_date</nobr></td>\n</tr>\n";
    echo "<tr>\n<td bgcolor='$bgcolor2' colspan='3'><b>"._PJ_REPORTS."</b></td>\n";
    echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_STATUS."</b></td>\n";
    echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_TYPE."</b></td>\n";
    echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_COMMENTS."</b></td>\n";
    echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_LASTSUBMISSION."</b></td>\n</tr>\n";
    if($report_total != 0){
      while(list($report_id, $report_name, $status_id, $type_id) = $db->sql_fetchrow($reportresult)) {
        $reportcommentresult = $db->sql_query("SELECT `report_id` FROM `".$prefix."_nsnpj_reports_comments` WHERE `report_id`='$report_id'");
        $reportcomment_total = $db->sql_numrows($reportcommentresult);
        $reportstatus = pjreportstatus_info($status_id);
        $reporttype = pjreporttype_info($type_id);
        if($report_name == "") { $report_name = "----------"; }
        $pjimage = pjimage("report.png", $module_name);
        echo "<tr>\n<td><img src='$pjimage'></td>\n";
        echo "<td width='100%' colspan='2'><a href='modules.php?name=$module_name&amp;op=PJReport&amp;report_id=$report_id'>$report_name</a></td>\n";
        if($reportstatus['status_name'] == ""){ $reportstatus['status_name'] = _PJ_NA; }
        echo "<td align='center'><nobr>".$reportstatus['status_name']."</nobr></td>\n";
        if($reportpriority['priority_name'] == ""){ $reportpriority['priority_name'] = _PJ_NA; }
        echo "<td align='center'><nobr>".$reportpriority['priority_name']."</nobr></td>\n";
        echo "<td align='center'><nobr>$reportcomment_total</nobr></td>\n";
        if($reportcomment_total > 0){
          list($last_date) = $db->sql_fetchrow($db->sql_query("SELECT `date_commented` FROM `".$prefix."_nsnpj_reports_comments` WHERE `report_id`='$report_id' ORDER BY `date_commented` desc"));
          $last_date = date($pj_config['report_date_format'], $last_date);    
        } else {
          $last_date = _PJ_NA;
        }
        echo "<td align='center'><nobr>$last_date</nobr></td>\n</tr>\n";
      }
    } else {
      echo "<tr>\n<td align='center' colspan='7' width='100%'><nobr>"._PJ_NOPROJECTREPORTS."</nobr></td>\n</tr>\n";
    }
    echo "</table>\n";
    CloseTable();
    echo "<br />\n";
  }
}
include("footer.php");

?>