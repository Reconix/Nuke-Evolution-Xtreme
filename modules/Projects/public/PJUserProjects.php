<?php



/********************************************************/

/* NukeProject(tm)                                      */

/* By: NukeScripts Network (webmaster@nukescripts.net)  */

/* http://www.nukescripts.net                           */

/* Copyright © 2000-2005 by NukeScripts Network         */

/* Copyright © 2006-2008 by DarkForgeGFX				*/

/* Modified by DarkForgeGFX.com							*/
/********************************************************/


if(!defined('NSNPJ_PUBLIC')) { die("Illegal Access Detected!!!"); }
 
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_PROJECTLIST;
include("header.php");
title(_PJ_TITLE." ".$pj_config['version_number'].": "._PJ_PROJECTLIST."</a>
");

$select_users_form = $db->sql_query("SELECT * FROM `".$prefix."_nsnpj_members` ORDER BY `member_id`");
echo "<br />";
OpenTable();
echo "<center>Select a user to view his projects:
<form action=\"modules.php?name=Projects&op=PJUserProjects\" method=\"POST\" name=\"user_view\">
<select name=\"memberid\">";
while(list($form_user_id, $form_user, $form_user_email) = $db->sql_fetchrow($select_users_form)) {
	echo "<option value=\"".$form_user_id."\">".$form_user."</option>\n";
}
echo"</select><br /><br />
<input type=\"submit\" value=\"View\">
</form>
</center>";
CloseTable();
echo "<br /><br />";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
$member_id = intval($memberid);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
$member_id = htmlentities(strip_tags($_POST['memberid']));
}

echo "<script language='JavaScript' src='includes/tooltip.js'></script>";

$link_echo_p1 = "OnMouseOver=\"return overlib('";
$link_echo_p2 = "ABOVE, LEFT, CAPTION, 'Evolution Xtreme Projects', WIDTH, 280, FGCOLOR, '#ffffff', BGCOLOR, '#000000', TEXTCOLOR, '#000000', CAPCOLOR, '#ffffff', CLOSECOLOR, '#ffffff', CAPICON, '', BORDER, '2')\" OnMouseOut=\"return nd()\">";

OpenTable();
echo "<table align='center' width='100%' border='1' cellspacing='0' cellpadding='2'>\n";
echo "<tr>\n";
echo "<td width='100%' bgcolor='$bgcolor2' colspan='2'><b>"._PJ_PROJECTNAME."</b></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_SITE."</b></nobr></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_TASKS."</b></nobr></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_STATUS."</b></nobr></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_PRIORITY."</b></nobr></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_MEMBERS."</b></nobr></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><nobr><b>"._PJ_PROGRESSBAR."</b></nobr></td>\n";
echo "</tr>\n";
$member_get_result = $db->sql_query("SELECT project_id FROM nuke_nsnpj_projects_members WHERE member_id = ".$member_id."");
if ($db->sql_numrows($member_get_result) == '0') {
	exit("ERROR");
}
while (list($project_member_id) = $db->sql_fetchrow($member_get_result)) {
$projectresult = $db->sql_query("SELECT * FROM `".$user_prefix."_nsnpj_projects` WHERE `project_id` = '".$project_member_id."' ORDER BY `weight`");
while(list($project_id, $project_name, $project_description, $project_site, $priority_id, $status_id, $project_percent, $weight, $featured, $allowreports, $allowrequests, $date_created, $date_started, $date_finished) = $db->sql_fetchrow($projectresult)) {
  $taskresult = $db->sql_query("SELECT `task_id`, `status_id` FROM `".$prefix."_nsnpj_tasks` WHERE `project_id`='$project_id' ORDER BY `task_name`");
  $taskrows = $db->sql_numrows($taskresult);
  $reportresult = $db->sql_query("SELECT `report_id` FROM `".$prefix."_nsnpj_reports` WHERE `project_id`='$project_id'");
  $report_total = $db->sql_numrows($reportresult);
  $requestresult = $db->sql_query("SELECT `request_id` FROM `".$prefix."_nsnpj_requests` WHERE `project_id`='$project_id'");
  $request_total = $db->sql_numrows($requestresult);
  $projectstatus = pjprojectstatus_info($status_id);
  $memberresult = $db->sql_query("SELECT `member_id` FROM `".$prefix."_nsnpj_projects_members` WHERE `project_id`='$project_id' ORDER BY `member_id`");
  $member_total = $db->sql_numrows($memberresult);
  $projectpriority = pjprojectpriority_info($priority_id);
  echo "<tr>\n";
  if($featured > 0) {
    $pjimage = pjimage("project_featured.png", $module_name);
  } else {
    $pjimage = pjimage("project.png", $module_name);
  }
  echo "<td align='center'>";
  echo "<img src='$pjimage'></td><td width='100%'>";
  $memberresult = $db->sql_query("SELECT `member_id`, `position_id` FROM `".$prefix."_nsnpj_projects_members` WHERE `project_id`='$project_id'");
  $task_query = $db->sql_query("SELECT `task_name`, `task_percent` FROM ".$prefix."_nsnpj_tasks WHERE `project_id` = ".$project_id."");			    
  			echo "<a href='modules.php?name=$module_name&amp;op=PJProject&amp;project_id=$project_id'".$link_echo_p1."";
				   while(list($member_id, $position_id) = $db->sql_fetchrow($memberresult)) {

						$member = pjmember_info($member_id);
						list($user_color) = $db->sql_fetchrow($db->sql_query("SELECT `user_color_gc` FROM `".$prefix."_users` WHERE `username` = '".$member['member_name']."'"));

				   }
				   
				   	echo "Project: <b>".$project_name."</b><br /><br />";
					echo "Project Members:<br>";
					echo "<img src=".$pjimage.">Project Member: <span style=\'COLOR: #".$user_color."\'><strong>".$member['member_name']."</strong></span><br />";
					echo "<br />";
				   	echo "<br />Project Tasks:<br />";
					
				while(list($task_name, $task_percent) = $db->sql_fetchrow($task_query)) {
					echo "- ".$task_name." (".$task_percent."%)<br>";
					
					}
					

						
	echo "<br />Project Status: ";
	if($projectstatus['status_name'] == ""){ $projectstatus['status_name'] = _PJ_NA; }
	echo "<b>".$projectstatus['status_name']."<b><br />";
	echo "', ".$link_echo_p2."".$project_name."</a>\n";
  
   echo "</td>"; 
  if($project_site > "") {
    $pjimage = pjimage("demo.png", $module_name);
    $demo = " <a href='".$project['project_site']."' target='_blank'><img src='$pjimage' border='0' alt='".$project['project_name']." "._PJ_SITE."' title='".$project_name." "._PJ_SITE."'></a>";
  } else {
    $demo = "&nbsp;";
  }
  echo "<td align='center'>$demo</td>\n";
  echo "<td align='center'>$taskrows</a></td>\n";
  if($projectstatus['status_name'] == ""){ $projectstatus['status_name'] = _PJ_NA; }
  echo "<td align='center'>".$projectstatus['status_name']."</td>\n";
  if($projectpriority['priority_name'] == ""){ $projectpriority['priority_name'] = _PJ_NA; }
  echo "<td align='center'><nobr>".$projectpriority['priority_name']."</nobr></td>\n";
  echo "<td align='center'><nobr>$member_total</nobr></td>\n";
  $wbprogress = pjprogress($project_percent);
  echo "<td align='center'><nobr>$wbprogress</nobr></td>\n";
  echo "</tr>\n";
}
}
echo "<tr><td bgcolor='$bgcolor2' colspan='10' align='right'>\n";
echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'><tr>\n";
echo "<td align='center' width='33%'><a href='modules.php?name=$module_name&amp;op=PJTaskMap'><b>"._PJ_TASKMAP."</b></a></td>\n";
echo "<td align='center' width='33%'><a href='modules.php?name=$module_name&amp;op=PJReportMap'><b>"._PJ_REPORTMAP."</b></a></td>\n";
echo "<td align='center' width='33%'><a href='modules.php?name=$module_name&amp;op=PJRequestMap'><b>"._PJ_REQUESTMAP."</b></a></td>\n";
echo "</tr></table>\n";
echo "</td></tr>\n";
echo "</table>\n";
CloseTable();

include("footer.php");

?>