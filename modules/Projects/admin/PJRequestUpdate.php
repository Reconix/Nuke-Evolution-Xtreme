<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$date = time();
$request_name = htmlentities($request_name, ENT_QUOTES);
$request_description = htmlentities($request_description, ENT_QUOTES);
$submitter_name = htmlentities($submitter_name, ENT_QUOTES);
$db->sql_query("UPDATE `".$prefix."_nsnpj_requests` SET `project_id`='$project_id', `type_id`='$type_id', `request_name`='$request_name', `request_description`='$request_description', `submitter_name`='$submitter_name', `submitter_email`='$submitter_email', `status_id`='$status_id', `date_modified`='$date' WHERE `request_id`='$request_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_requests`");
if(implode("", $member_ids) > "") {
  while(list($null, $member_id) = each($member_ids)) {
    $numrows = $db->sql_numrows($db->sql_query("SELECT * FROM `".$prefix."_nsnpj_requests_members` WHERE `request_id`='$request_id' AND `member_id`='$member_id'"));
    if($numrows == 0) {
      $db->sql_query("INSERT INTO `".$prefix."_nsnpj_requests_members` VALUES ('$request_id', '$member_id', '".$pj_config['new_request_position']."')");
    }
  }
}
list($submitter_email) = $db->sql_fetchrow($db->sql_query("SELECT `submitter_email` FROM `".$prefix."_nsnpj_requests` WHERE `request_id`='$request_id'"));
$admin_email = $adminmail;
$subject = _PJ_NEWREQUESTUPDATEDS;
$message = _PJ_NEWREQUESTUPDATED.":\r\n$nukeurl/modules.php?name=$modname&op=PJRequest&request_id=$request_id";
$from  = "From: $admin_email\r\n";
$from .= "Reply-To: $admin_email\r\n";
$from .= "Return-Path: $admin_email\r\n";
if($pj_config['notify_request_admin'] == 1) { @mail($admin_email, $subject, $message, $from); }
if($pj_config['notify_request_submitter'] == 1) { @mail($submitter_email, $subject, $message, $from); }
header("Location: ".$admin_file.".php?op=PJRequestEdit&request_id=$request_id");

?>