<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_PUBLIC')) { die("Illegal Access Detected!!!"); }
$project_id = intval($project_id);
$project = pjproject_info($project_id);
if($project['allowrequests'] > 0) {
  $status_id = $pj_config['new_request_status'];
  $date = time();
  $stop = "";
  $submitter_ip = $_SERVER['REMOTE_ADDR'];
  if((!$submitter_name) || ($submitter_name=="")) $stop = "<center>"._PJ_ERRORNONAME."</center><br />\n";
  if((!$submitter_email) || ($submitter_email=="")) $stop = "<center>"._PJ_ERRORNOEMAIL."</center><br />\n";
  if((!preg_match("/^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,6}$/i",$submitter_email))) $stop = "<center>"._PJ_ERRORINVALIDEMAIL."</center><br />\n";
  if((!$request_name) || ($request_name == "")) $stop = "<center>"._PJ_ERRORNOSUMMARY."</center><br />\n";
  if((!$request_description) || ($request_description == "")) $stop = "<center>"._PJ_ERRORNODESCRIPTION."</center><br />\n";
  if($stop == "") {
    $type_id = intval($type_id);
    $submitter_name = htmlentities($submitter_name, ENT_QUOTES);
    $request_name = htmlentities($request_name, ENT_QUOTES);
    $request_description = htmlentities($request_description, ENT_QUOTES);
    $db->sql_query("INSERT INTO `".$prefix."_nsnpj_requests` VALUES (NULL, '$project_id', '$type_id', '$status_id', '$request_name', '$request_description', '$submitter_name', '$submitter_email', '$submitter_ip', '$date', '0', '0')");
    list($request_id) = $db->sql_fetchrow($db->sql_query("SELECT `request_id` FROM `".$prefix."_nsnpj_requests` WHERE `date_submitted`='$date' AND `project_id`='$project_id' AND `type_id`='$type_id' AND `status_id`='$status_id' AND `request_name`='$request_name'"));
    if($pj_config['notify_request_admin'] == 1){
      $admin_email = $adminmail;
      $subject = _PJ_NEWREQUESTMESSAGES;
      $message = _PJ_NEWREQUESTMESSAGE.":\r\n$nukeurl/modules.php?name=$module_name&op=PJRequest&request_id=$request_id";
      $from  = "From: $admin_email\r\n";
      $from .= "Reply-To: $admin_email\r\n";
      $from .= "Return-Path: $admin_email\r\n";
      mail($admin_email, $subject, $message, $from);
    }
    header("Location: modules.php?name=$module_name&op=PJRequest&request_id=$request_id");
  } else {
    $pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REQUESTADD;
    include("header.php");
    title(_PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REQUESTADD);
    OpenTable();
    echo _PJ_ERRORREQUEST."<br />\n";
    echo "$stop<br />\n";
    echo _PJ_RETURN;
    CloseTable();
    include("footer.php");
  }
} else {
  header("Location: modules.php?name=$module_name");
}

?>