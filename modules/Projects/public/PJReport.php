<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_PUBLIC')) { die("Illegal Access Detected!!!"); }
$report_id = intval($report_id);
$report = pjreport_info($report_id);
$project = pjproject_info($report['project_id']);
if($project['allowreports'] > 0) {
  $pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REPORTVIEW;
  include("header.php");
  title(_PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REPORTVIEW);
  
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
  
  $project = pjproject_info($report['project_id']);
  $reportstatus = pjreportstatus_info($report['status_id']);
  $reporttype = pjreporttype_info($report['type_id']);
  if($reportstatus['status_name'] == ""){ $reportstatus['status_name'] = _PJ_NA; }
  if($reporttype['type_name'] == ""){ $reporttype['type_name'] = _PJ_NA; }
  OpenTable();
  echo "<center><table border='1' cellpadding='2' cellspacing='0' width='100%'>\n";
  echo "<tr><td bgcolor='$bgcolor2' colspan='4' width='100%'><nobr><b>"._PJ_PROJECTNAME."</b></nobr></td></tr>\n";
  $pjimage = pjimage("project.png", $module_name);
  echo "<tr><td align='center'><img src='$pjimage'></td>\n";
  echo "<td colspan='3' width='100%'><nobr><a href='modules.php?name=$module_name&amp;op=PJProject&amp;project_id=".$project['project_id']."'>".$project['project_name']."</a></nobr></td></tr>\n";
  echo "<tr><td bgcolor='$bgcolor2' colspan='2' width='100%'><nobr><b>"._PJ_REPORTINFO."</b></nobr></td>\n";
  echo "<td bgcolor='$bgcolor2' align='center'><b>"._PJ_STATUS."</b></td>\n";
  echo "<td bgcolor='$bgcolor2' align='center'><b>"._PJ_TYPE."</b></td></tr>\n";
  $pjimage = pjimage("report.png", $module_name);
  echo "<tr><td align='center'><img src='$pjimage'></td><td width='100%'><nobr>".$report['report_name']."</nobr></td>\n";
  echo "<td align='center'><nobr>".$reportstatus['status_name']."</nobr></td>\n";
  echo "<td align='center'><nobr>".$reporttype['type_name']."</nobr></td></tr>\n";
  if($report['report_description'] != ""){
    $pjimage = pjimage("description.png", $module_name);
    echo "<tr><td align='center' valign='top'><img src='$pjimage'></td>\n";
    echo "<td colspan='3' width='100%'>".nl2br($report['report_description'])."</td></tr>\n";
  }
  $pjimage = pjimage("reporter.png", $module_name);
  echo "<tr><td align='center'><img src='$pjimage'></td>\n";
  echo "<td colspan='3' width='100%'><nobr>"._PJ_REPORTEDBY.": <b><a href='mailto:".pjencode_email($report['submitter_email'])."'>".$report['submitter_name']."</a></b></nobr></td></tr>\n";
  if($report['date_submitted'] != '0'){
    $submit_date = date($pj_config['report_date_format'], $report['date_submitted']);
  } else {
    $submit_date = _PJ_NA;
  }
  $pjimage = pjimage("date.png", $module_name);
  echo "<tr><td align='center'><img src='$pjimage'></td>\n";
  echo "<td colspan='3' width='100%'><nobr>"._PJ_SUBMITTED.": <b>$submit_date</b></nobr></td></tr>\n";
  if($report['date_modified'] != '0'){
    $modify_date = date($pj_config['report_date_format'], $report['date_modified']);    
  } else {
    $modify_date = _PJ_NA;    
  }
  $pjimage = pjimage("date.png", $module_name);
  echo "<tr><td align='center'><img src='$pjimage'></td>\n";
  echo "<td colspan='3' width='100%'><nobr>"._PJ_MODIFIED.": <b>$modify_date</b></nobr></td></tr>\n";
  echo "<tr><td bgcolor='$bgcolor2' colspan='3' width='100%'><nobr><b>"._PJ_REPORTMEMBERS."</b></nobr></td>";
  echo "<td bgcolor='$bgcolor2' align='center'><b>"._PJ_POSITION."</b></td></tr>\n";
  $memberresult = $db->sql_query("SELECT `member_id`, `position_id` FROM `".$prefix."_nsnpj_reports_members` WHERE `report_id`='$report_id' ORDER BY `member_id`");
  $member_total = $db->sql_numrows($memberresult);
  if($member_total != 0){
    while(list($member_id, $position_id) = $db->sql_fetchrow($memberresult)) {
      $pjimage = pjimage("member.png", $module_name);
      $member = pjmember_info($member_id);
      $position = pjmemberposition_info($position_id);
      echo "<tr><td><img src='$pjimage'></td><td colspan='2' width='100%'><a href='mailto:".pjencode_email($member['member_email'])."'>".$member['member_name']."</a></td>\n";
      if($position['position_name'] == ""){ $position['position_name'] = "----------"; }
      echo "<td align='center'><nobr>".$position['position_name']."</nobr></td></tr>\n";
    }
  } else {
    echo "<tr><td align='center' colspan='4' width='100%'><nobr>"._PJ_NOREPORTMEMBERS."</nobr></td></tr>\n";
  }
  if(is_admin($admin)) {
    echo "<tr><td bgcolor='$bgcolor2' colspan='4' width='100%'><nobr><b>"._PJ_ADMINFUNCTIONS."</b></nobr></td></tr>\n";
    $pjimage = pjimage("options.png", $module_name);
    echo "<tr><td align='center'><img src='$pjimage'></td>\n";
    echo "<td colspan='3' width='100%'><nobr><a href='".$admin_file.".php?op=PJReportEdit&amp;report_id=$report_id'>"._PJ_REPORTEDIT."</a>";
    echo ", <a href='".$admin_file.".php?op=PJReportRemove&amp;report_id=$report_id'>"._PJ_DELETEREPORT."</a>";
    echo ", <a href='".$admin_file.".php?op=PJReportImport&amp;report_id=$report_id'>"._PJ_IMPORTTOTASK."</a>";
    echo ", <a href='".$admin_file.".php?op=PJReportPrint&amp;report_id=$report_id'>"._PJ_REPORTPRINT."</a></nobr></td></tr>\n";
  }
  echo "</table>\n";
  CloseTable();
  echo "<br />\n";
  $commentresult = $db->sql_query("SELECT `comment_id` FROM `".$prefix."_nsnpj_reports_comments` WHERE `report_id`='$report_id' ORDER BY `date_commented` asc");
  $comment_total = $db->sql_numrows($commentresult);
  OpenTable();
  echo "<table border='1' cellpadding='2' cellspacing='0' width='100%'>\n";
  echo "<tr><td bgcolor='$bgcolor2' width='100%'><nobr><b>"._PJ_COMMENTS."</b> <b>(</b> <a href='modules.php?name=$module_name&amp;op=PJReportCommentSubmit&amp;report_id=$report_id'>"._PJ_COMMENTADD."</a> <b>)</b></nobr></td><tr>\n";
  if($comment_total > 0){
    while(list($comment_id) = $db->sql_fetchrow($commentresult)) {
      $comment = pjreportcomment_info($comment_id);
      $comment_date = date($pj_config['report_date_format'], $comment['date_commented']);    
      echo "<tr><td bgcolor='$bgcolor2'><nobr><b><a href='mailto:".pjencode_email($comment['commenter_email'])."'>".$comment['commenter_name']."</a> @ $comment_date</b>";
      if(is_admin($admin)) {
        echo " - (<a href='".$admin_file.".php?op=PJReportCommentEdit&amp;comment_id=".$comment['comment_id']."'>"._PJ_EDIT."</a>, <a href='".$admin_file.".php?op=PJReportCommentRemove&amp;comment_id=".$comment['comment_id']."'>"._PJ_DELETE."</a>)";
      }
      echo "</nobr></td></tr>\n";
      echo "<tr><td>".nl2br($comment['comment_description'])."</td></tr>\n";
    }
  } else {
    echo "<tr><td align='center'><nobr>"._PJ_NOREPORTCOMMENTS."</nobr></td></tr>\n";
  }
  echo "</table>\n";
  CloseTable();
  include("footer.php");
} else {
  header("Location: modules.php?name=$module_name");
}

?>