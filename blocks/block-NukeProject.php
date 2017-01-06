<?php

/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/
/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright (c) 2000-2005 by NukeScripts Network       */
/********************************************************/
/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       10/25/2005
 ************************************************************************/

if(!defined('NUKE_EVO')) exit;
//error_reporting(E_ALL);
global $prefix, $db, $bgcolor2, $pj_config;

$module_name = $pj_config['location'];
?>
<script language='JavaScript' src='proj_tooltip.js'></script>
<?
$content = "<table align='center' border='1' cellpadding='2' cellspacing='0' width='100%'>\n";
$content .= "<tr>\n";
$content .= "<td bgcolor='$bgcolor2' colspan='2' width='100%'><strong>"._PJ_PROJECTNAME."</strong></td>\n";
$content .= "<td align='center' bgcolor='$bgcolor2'><nobr><strong>"._PJ_SITE."</strong></nobr></td>\n";
$content .= "<td align='center' bgcolor='$bgcolor2'><nobr><strong>"._PJ_TASKS."</strong></nobr></td>\n";
$content .= "<td align='center' bgcolor='$bgcolor2'><nobr><strong>"._PJ_REPORTS."</strong></nobr></td>\n";
$content .= "<td align='center' bgcolor='$bgcolor2'><nobr><strong>"._PJ_REQUESTS."</strong></nobr></td>\n";
$content .= "<td align='center' bgcolor='$bgcolor2'><nobr><strong>"._PJ_STATUS."</strong></nobr></td>\n";
$content .= "<td align='center' bgcolor='$bgcolor2'><nobr><strong>"._PJ_PROGRESSBAR."</strong></nobr></td>\n";
$content .= "</tr>\n";

$projectresult = $db->sql_query("SELECT `project_id` FROM `".$prefix."_nsnpj_projects` WHERE `featured`='1' ORDER BY `weight`");
while(list($project_id) = $db->sql_fetchrow($projectresult)) {
  $project = pjprojectpercent_info($project_id);
  $projectstatus = pjprojectstatus_info($project['status_id']);
  $pjimage = pjimage("project.png", $module_name);
    $content .= "<tr><td align='center'><img src='$pjimage' alt='' title=''></td>\n";
    $content .= "<td width='100%'><a href='modules.php?name=$module_name&amp;op=PJProject&amp;project_id=$project_id' onMouseOver=\"Tip('";

$memberresult = $db->sql_query("SELECT `member_id`, `position_id` FROM `".$prefix."_nsnpj_projects_members` WHERE `project_id`='$project_id'");
$member_total = $db->sql_numrows($memberresult);
if($member_total != 0){
  while(list($member_id, $position_id) = $db->sql_fetchrow($memberresult)) {
    $member = pjmember_info($member_id);
    $position = pjmemberposition_info($position_id);
    $pjimage = pjimage("member.png", $module_name);
    $pjimage2 = pjimage("project.png", $module_name);
    list($user_color) = $db->sql_fetchrow($db->sql_query("SELECT `user_color_gc` FROM `".$prefix."_users` WHERE `username` = '".$member['member_name']."'"));
    if(empty($position['position_name'])){ $position['position_name'] = "----------"; }
  }
	$content .="<img src=".$pjimage.">Project Member: <span style=\'COLOR: #".$user_color."\'><strong>".$member['member_name']."</strong></span><br />";
	$content .="</br>";
	$content .="Position: ".$position['position_name']."<br />";
}
	$content .="', TITLE, '<img src=".$pjimage2.">".$project['project_name']."', TITLEBGCOLOR, '#000000', HEIGHT, 90, WIDTH, 300)\">".$project['project_name']."</a></td>\n";
  if($project['project_site'] > "") {
    $pjimage = pjimage("demo.png", $module_name);
    $demo = " <a href='".$project['project_site']."' target='_blank'><img src='$pjimage' border='0' alt='".$project['project_name']." "._PJ_SITE."' title='".$project['project_name']." "._PJ_SITE."'></a>";
  } else {
    $demo = "&nbsp;";
  }
  $content .= "<td align='center'>$demo</td>\n";
  $numtasks = $db->sql_numrows($db->sql_query("SELECT * FROM `".$prefix."_nsnpj_tasks` WHERE `project_id`='$project_id'"));
  if(!$numtasks) { $numtasks = 0; }
  $content .= "<td align='center'>$numtasks</td>\n";
  if($project['allowreports'] > 0) {
    $numreports = $db->sql_numrows($db->sql_query("SELECT * FROM `".$prefix."_nsnpj_reports` WHERE `project_id`='$project_id'"));
    if(!$numreports) { $numreports = 0; }
    $content .= "<td align='center'>$numreports</td>\n";
  } else {
    $content .= "<td align='center'>----</td>\n";
  }
  if($project['allowrequests'] > 0) {
    $numrequests = $db->sql_numrows($db->sql_query("SELECT * FROM `".$prefix."_nsnpj_requests` WHERE `project_id`='$project_id'"));
    if(!$numrequests) { $numrequests = 0; }
    $content .= "<td align='center'>$numrequests</td>\n";
  } else {
    $content .= "<td align='center'>----</td>\n";
  }
  if(empty($projectstatus['status_name'])){ $projectstatus['status_name'] = _PJ_NA; }
  $content .= "<td align='center'>".$projectstatus['status_name']."</td>\n";
  $pjimage = pjimage("bar_left.png", $module_name);
  $content .= "<td><nobr><img src='$pjimage' height='7' width='1'>";
  if($project['project_percent'] == 0){
    $pjimage = pjimage("bar_center_red.png", $module_name);
    $content .= "<img src='$pjimage' height='7' width='100' alt='0"._PJ_PERCENT." "._PJ_COMPLETED."' title='0"._PJ_PERCENT." "._PJ_COMPLETED."'>";
  } else {
    if($project['project_percent'] > 100){ $project_percent = 100; } else { $project_percent = $project['project_percent']; }
    $pjimage = pjimage("bar_center_grn.png", $module_name);
    $content .= "<img src='$pjimage' height='7' width='".$project_percent."' alt='".$project_percent.""._PJ_PERCENT." "._PJ_COMPLETED."' title='".$project_percent.""._PJ_PERCENT." "._PJ_COMPLETED."'>";
    if($project_percent < 100){
      $percent_incomplete = 100 - $project_percent;
      $pjimage = pjimage("bar_center_red.png", $module_name);
      $content .= "<img src='$pjimage' height='7' width='".$percent_incomplete."' alt='".$project_percent.""._PJ_PERCENT." "._PJ_COMPLETED."' title='".$project_percent.""._PJ_PERCENT." "._PJ_COMPLETED."'>";
    }
  }
  $pjimage = pjimage("bar_right.png", $module_name);
  $content .= "<img src='$pjimage' height='7' width='1'></nobr></td>\n";
  $content .= "</tr>\n";
}
$content .=  "</table>\n";
?>