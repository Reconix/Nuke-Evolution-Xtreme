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
  $date = time();
  $stop = "";
  $commenter_ip = $_SERVER['REMOTE_ADDR'];
  if((!$commenter_name) || ($commenter_name=="")) $stop = "<center>"._PJ_ERRORNONAME."</center><br />\n";
  if((!$commenter_email) || ($commenter_email=="")) $stop = "<center>"._PJ_ERRORNOEMAIL."</center><br />\n";
  if((!preg_match("/^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,6}$/i",$commenter_email))) $stop = "<center>"._PJ_ERRORINVALIDEMAIL."</center><br />\n";
  if((!$comment_description) || ($comment_description=="")) $stop = "<center>"._PJ_ERRORNOCOMMENT."</center><br />\n";
  if($stop == "") {
    $report_id = intval($report_id);
    $commenter_name = htmlentities($commenter_name, ENT_QUOTES);
    $comment_description = htmlentities($comment_description, ENT_QUOTES);
    $db->sql_query("INSERT INTO `".$prefix."_nsnpj_reports_comments` VALUES (NULL, '$report_id', '$commenter_name', '$commenter_email', '$commenter_ip', '$comment_description', '$date')");
    $db->sql_query("UPDATE `".$prefix."_nsnpj_reports` SET `date_commented`='$date' WHERE `report_id`='$report_id'");
    list($submitter_email) = $db->sql_fetchrow($db->sql_query("SELECT `submitter_email` FROM `".$prefix."_nsnpj_reports` WHERE `report_id`='$report_id'"));
    $admin_email = $adminmail;
    $subject = _PJ_NEWREPORTCOMMENTS;
    $message = _PJ_NEWREPORTCOMMENT.":\r\n$nukeurl/modules.php?name=$module_name&op=PJReport&report_id=$report_id";
    $from  = "From: $admin_email\r\n";
    $from .= "Reply-To: $admin_email\r\n";
    $from .= "Return-Path: $admin_email\r\n";
    if($pj_config['notify_report_admin'] == 1) { mail($admin_email, $subject, $message, $from); }
    if($pj_config['notify_report_submitter'] == 1) { mail($submitter_email, $subject, $message, $from); }
    header("Location: modules.php?name=$module_name&op=PJReport&report_id=$report_id");
  } else {
    $pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_COMMENTADD;
    include("header.php");
    title(_PJ_TITLE." ".$pj_config['version_number'].": "._PJ_COMMENTADD);
    OpenTable();
    echo "<center><b>"._PJ_ERRORCOMMENT."</b><br />\n";
    echo "$stop<br />\n";
    echo _PJ_RETURN."</center>";
    CloseTable();
    include("footer.php");
  }
} else {
  header("Location: modules.php?name=$module_name");
}

?>