<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_PUBLIC')) { die("Illegal Access Detected!!!"); }
$request_id = intval($request_id);
$request = pjrequest_info($request_id);
$project = pjproject_info($request['project_id']);
if($project['allowrequests'] > 0) {
  $date = time();
  $stop = "";
  $commenter_ip = $_SERVER['REMOTE_ADDR'];
  if((!$commenter_name) || ($commenter_name=="")) $stop = "<center>"._PJ_ERRORNONAME."</center><br />\n";
  if((!$commenter_email) || ($commenter_email=="")) $stop = "<center>"._PJ_ERRORNOEMAIL."</center><br />\n";
  if((!preg_match("/^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,6}$/i",$commenter_email))) $stop = "<center>"._PJ_ERRORINVALIDEMAIL."</center><br />\n";
  if((!$comment_description) || ($comment_description=="")) $stop = "<center>"._PJ_ERRORNOCOMMENT."</center><br />\n";
  if($stop == "") {
    $commenter_name = htmlentities($commenter_name, ENT_QUOTES);
    $comment_description = htmlentities($comment_description, ENT_QUOTES);
    $db->sql_query("INSERT INTO `".$prefix."_nsnpj_requests_comments` VALUES (NULL, '$request_id', '$commenter_name', '$commenter_email', '$commenter_ip', '$comment_description', '$date')");
    $db->sql_query("UPDATE `".$prefix."_nsnpj_requests` SET `date_commented`='$date' WHERE `request_id`='$request_id'");
    list($submitter_email) = $db->sql_fetchrow($db->sql_query("SELECT `submitter_email` FROM `".$prefix."_nsnpj_requests` WHERE `request_id`='$request_id'"));
    $admin_email = $adminmail;
    $subject = _PJ_NEWREQUESTCOMMENTS;
    $message = _PJ_NEWREQUESTCOMMENT.":\r\n$nukeurl/modules.php?name=$module_name&op=PJRequest&request_id=$request_id";
    $from  = "From: $admin_email\r\n";
    $from .= "Reply-To: $admin_email\r\n";
    $from .= "Return-Path: $admin_email\r\n";
    if($pj_config['notify_request_admin'] == 1) { mail($admin_email, $subject, $message, $from); }
    if($pj_config['notify_request_submitter'] == 1) { mail($submitter_email, $subject, $message, $from); }
    header("Location: modules.php?name=$module_name&op=PJRequest&request_id=$request_id");
  } else {
    $pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_COMMENTADD;
    include("header.php");
    title(_PJ_TITLE." ".$pj_config['version_number'].": "._PJ_COMMENTADD);
    OpenTable();
    echo _PJ_ERRORCOMMENT."<br />\n";
    echo "$stop<br />\n";
    echo _PJ_RETURN;
    CloseTable();
    include("footer.php");
  }
} else {
  header("Location: modules.php?name=$module_name");
}

?>