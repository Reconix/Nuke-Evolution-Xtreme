<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
include_once("includes/counter.php");
$request = pjrequest_info($request_id);
$Theme_Sel = get_theme();
echo "<html>\n";
echo "<head>\n";
echo "<title>"._PJ_REQUESTVIEW.": ".$request['request_name']."</title>\n";
echo "</head>\n";
echo "<body>\n";
require_once("themes/$Theme_Sel/theme.php");
echo "<center><h3>"._PJ_REQUESTVIEW.": ".$request['request_name']."</h3></center>\n";
echo "<br />\n";
$project = pjproject_info($request['project_id']);
$requeststatus = pjrequeststatus_info($request['status_id']);
$requesttype = pjrequesttype_info($request['type_id']);
if($requeststatus['status_name'] == ""){ $requeststatus['status_name'] = _PJ_NA; }
if($requesttype['type_name'] == ""){ $requesttype['type_name'] = _PJ_NA; }
echo "<center><table width='100%' border='1' cellspacing='0' cellpadding='2'>\n";
echo "<tr><td colspan='4' width='100%'><nobr><b>"._PJ_PROJECTNAME."</b></nobr></td></tr>\n";
$pjimage = pjimage("project.png", $modname);
echo "<tr><td align='center'><img src='$pjimage'></td>\n";
echo "<td colspan='3' width='100%'><nobr>".$project['project_name']." (".$request['project_id'].")</nobr></td></tr>\n";
echo "<tr><td colspan='2' width='100%'><nobr><b>"._PJ_REQUESTINFO."</b></nobr></td>\n";
echo "<td align='center'><b>"._PJ_STATUS."</b></td>\n";
echo "<td align='center'><b>"._PJ_TYPE."</b></td></tr>\n";
$pjimage = pjimage("request.png", $modname);
echo "<tr><td align='center'><img src='$pjimage'></td><td width='100%'><nobr>".$request['request_name']."</nobr></td>\n";
echo "<td align='center'><nobr>".$requeststatus['status_name']."</nobr></td>\n";
echo "<td align='center'><nobr>".$requesttype['type_name']."</nobr></td></tr>\n";
if($request['request_description'] != ""){
  $pjimage = pjimage("description.png", $modname);
  echo "<tr><td align='center' valign='top'><img src='$pjimage'></td>\n";
  echo "<td colspan='3' width='100%'>".nl2br($request['request_description'])."</td></tr>";
}
$pjimage = pjimage("requester.png", $modname);
echo "<tr><td align='center'><img src='$pjimage'></td>\n";
echo "<td colspan='3' width='100%'><nobr>"._PJ_REQUESTEDBY.": <b>".$request['submitter_email']."</b></nobr></td></tr>\n";
if($request['date_submitted'] != '0'){
  $submit_date = date($pj_config['request_date_format'], $request['date_submitted']);
  $pjimage = pjimage("date.png", $modname);
  echo "<tr><td align='center'><img src='$pjimage'></td>\n";
  echo "<td colspan='3' width=100%><nobr>"._PJ_SUBMITTED.": <b>$submit_date</b></nobr></td></tr>\n";
}
if($request['date_modified'] != '0'){
  $modify_date = date($pj_config['request_date_format'], $request['date_modified']);    
  $pjimage = pjimage("date.png", $modname);
  echo "<tr><td align='center'><img src='$pjimage'></td>\n";
  echo "<td colspan='3' width='100%'><nobr>"._PJ_MODIFIED.": <b>$modify_date</b></nobr></td></tr>\n";
}
$memberresult = $db->sql_query("SELECT `member_id` FROM `".$prefix."_nsnpj_requests_members` WHERE `request_id`='$request_id' ORDER BY `member_id`");
$member_total = $db->sql_numrows($memberresult);
echo "<tr><td colspan='4' width='100%'><nobr><b>"._PJ_REQUESTMEMBERS."</b></nobr></td></tr>\n";
if($member_total != 0){
  while(list($member_id) = $db->sql_fetchrow($memberresult)) {
    $pjimage = pjimage("member.png", $modname);
    $member = pjmember_info($member_id);
    echo "<tr><td><img src='$pjimage'></td><td colspan='3' width='100%'>".$member['member_name']." (".$member['member_email'].")</td></tr>\n";
  }
} else {
  echo "<tr><td align='center' colspan='4' width='100%'><nobr>"._PJ_NOREQUESTMEMBERS."</nobr></td></tr>\n";
}
echo "</table>\n";
echo "<br />\n";
$commentresult = $db->sql_query("SELECT `comment_id` FROM `".$prefix."_nsnpj_requests_comments` WHERE `request_id`='$request_id' ORDER BY `date_commented` asc");
$comment_total = $db->sql_numrows($commentresult);
echo "<table border='1' cellpadding='2' cellspacing='0' width='100%'>\n";
echo "<tr><td width='100%'><nobr><b>"._PJ_COMMENTS."</b></nobr></td><tr>\n";
if($comment_total > 0){
  while(list($comment_id) = $db->sql_fetchrow($commentresult)) {
    $comment = pjrequestcomment_info($comment_id);
    $comment_date = date($pj_config['request_date_format'], $comment_date);    
    echo "<tr><td><nobr><b>".$comment['commenter_email']." @ $comment_date</b>";
    echo "</nobr></td></tr>\n";
    echo "<tr><td>".nl2br($comment['comment_description'])."</td></tr>\n";
  }
} else {
  echo "<tr><td align='center'><nobr>"._PJ_NOREQUESTCOMMENTS."</nobr></td></tr>\n";
}
echo "</table>\n";
echo "</body>\n";
echo "</html>\n";

?>