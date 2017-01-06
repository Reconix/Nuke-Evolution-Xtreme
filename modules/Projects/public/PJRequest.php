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
  $pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REQUESTVIEW;
  include("header.php");
  title(_PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REQUESTVIEW);
  
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
  
  $project = pjproject_info($request['project_id']);
  $requeststatus = pjrequeststatus_info($request['status_id']);
  $requesttype = pjrequesttype_info($request['type_id']);
  if($requeststatus['status_name'] == ""){ $requeststatus['status_name'] = _PJ_NA; }
  if($requesttype['type_name'] == ""){ $requesttype['type_name'] = _PJ_NA; }
  OpenTable();
  echo "<center><table width='100%' border='1' cellspacing='0' cellpadding='2'>\n";
  echo "<tr><td bgcolor='$bgcolor2' colspan='4' width='100%'><nobr><b>"._PJ_PROJECTNAME."</b></nobr></td></tr>\n";
  $pjimage = pjimage("project.png", $module_name);
  echo "<tr><td align='center'><img src='$pjimage'></td>\n";
  echo "<td colspan='3' width='100%'><nobr><a href='modules.php?name=$module_name&amp;op=PJProject&amp;project_id=".$project['project_id']."'>".$project['project_name']."</a></nobr></td></tr>\n";
  echo "<tr><td bgcolor='$bgcolor2' colspan='2' width='100%'><nobr><b>"._PJ_REQUESTINFO."</b></nobr></td>\n";
  echo "<td bgcolor='$bgcolor2' align='center'><b>"._PJ_STATUS."</b></td>\n";
  echo "<td bgcolor='$bgcolor2' align='center'><b>"._PJ_TYPE."</b></td></tr>\n";
  $pjimage = pjimage("request.png", $module_name);
  echo "<tr><td align='center'><img src='$pjimage'></td><td width='100%'><nobr>".$request['request_name']."</nobr></td>\n";
  echo "<td align='center'><nobr>".$requeststatus['status_name']."</nobr></td>\n";
  echo "<td align='center'><nobr>".$requesttype['type_name']."</nobr></td></tr>\n";
  if($request['request_description'] != ""){
    $pjimage = pjimage("description.png", $module_name);
    echo "<tr><td align='center' valign='top'><img src='$pjimage'></td>\n";
    echo "<td colspan='3' width='100%'>".nl2br($request['request_description'])."</td></tr>";
  }
  $pjimage = pjimage("requester.png", $module_name);
  echo "<tr><td align='center'><img src='$pjimage'></td>\n";
  echo "<td colspan='3' width='100%'><nobr>"._PJ_REQUESTEDBY.": <b><a href='mailto:".pjencode_email($request['submitter_email'])."'>".$request['submitter_name']."</a></b></nobr></td></tr>\n";
  if($request['date_submitted'] != '0'){
    $submit_date = date($pj_config['request_date_format'], $request['date_submitted']);
  } else {
    $submit_date = _PJ_NA;
  }
  $pjimage = pjimage("date.png", $module_name);
  echo "<tr><td align='center'><img src='$pjimage'></td>\n";
  echo "<td colspan='3' width=100%><nobr>"._PJ_SUBMITTED.": <b>$submit_date</b></nobr></td></tr>\n";
  if($request['date_modified'] != '0'){
    $modify_date = date($pj_config['request_date_format'], $request['date_modified']);    
  } else {
    $modify_date =  _PJ_NA;    
  }
  $pjimage = pjimage("date.png", $module_name);
  echo "<tr><td align='center'><img src='$pjimage'></td>\n";
  echo "<td colspan='3' width='100%'><nobr>"._PJ_MODIFIED.": <b>$modify_date</b></nobr></td></tr>\n";
  echo "<tr><td bgcolor='$bgcolor2' colspan='3' width='100%'><nobr><b>"._PJ_REQUESTMEMBERS."</b></nobr></td>";
  echo "<td bgcolor='$bgcolor2' align='center'><b>"._PJ_POSITION."</b></td></tr>\n";
  $memberresult = $db->sql_query("SELECT `member_id`, `position_id` FROM `".$prefix."_nsnpj_requests_members` WHERE `request_id`='$request_id' ORDER BY `member_id`");
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
    echo "<tr><td align='center' colspan='4' width='100%'><nobr>"._PJ_NOREQUESTMEMBERS."</nobr></td></tr>\n";
  }
  if(is_admin($admin)) {
    echo "<tr><td bgcolor='$bgcolor2' colspan='4' width='100%'><nobr><b>"._PJ_ADMINFUNCTIONS."</b></nobr></td></tr>\n";
    $pjimage = pjimage("options.png", $module_name);
    echo "<tr><td align='center'><img src='$pjimage'></td>\n";
    echo "<td colspan='3' width='100%'><nobr><a href='".$admin_file.".php?op=PJRequestEdit&amp;request_id=$request_id'>"._PJ_REQUESTEDIT."</a>";
    echo ", <a href='".$admin_file.".php?op=PJRequestRemove&amp;request_id=$request_id'>"._PJ_DELETEREQUEST."</a>";
    echo ", <a href='".$admin_file.".php?op=PJRequestImport&amp;request_id=$request_id'>"._PJ_IMPORTTOTASK."</a>";
    echo ", <a href='".$admin_file.".php?op=PJRequestPrint&amp;request_id=$request_id'>"._PJ_REQUESTPRINT."</a></nobr></td></tr>\n";
  }
  echo "</table>\n";
  CloseTable();
  echo "<br />\n";
  $commentresult = $db->sql_query("SELECT `comment_id` FROM `".$prefix."_nsnpj_requests_comments` WHERE `request_id`='$request_id' ORDER BY `date_commented` asc");
  $comment_total = $db->sql_numrows($commentresult);
  OpenTable();
  echo "<table border='1' cellpadding='2' cellspacing='0' width='100%'>\n";
  echo "<tr><td bgcolor='$bgcolor2' width='100%'><nobr><b>"._PJ_COMMENTS."</b> <b>(</b> <a href='modules.php?name=$module_name&amp;op=PJRequestCommentSubmit&amp;request_id=$request_id'>"._PJ_COMMENTADD."</a> <b>)</b></nobr></td><tr>\n";
  if($comment_total > 0){
    while(list($comment_id) = $db->sql_fetchrow($commentresult)) {
      $comment = pjrequestcomment_info($comment_id);
      $comment_date = date($pj_config['request_date_format'], $comment['date_commented']);    
      echo "<tr><td bgcolor='$bgcolor2'><nobr><b><a href='mailto:".pjencode_email($comment['commenter_email'])."'>".$comment['commenter_name']."</a> @ $comment_date</b>";
      if(is_admin($admin)) {
        echo " - (<a href='".$admin_file.".php?op=PJRequestCommentEdit&amp;comment_id=".$comment['comment_id']."'>"._PJ_EDIT."</a>, <a href='".$admin_file.".php?op=PJRequestCommentRemove&amp;comment_id=".$comment['comment_id']."'>"._PJ_DELETE."</a>)";
      }
      echo "</nobr></td></tr>\n";
      echo "<tr><td>".nl2br($comment['comment_description'])."</td></tr>\n";
    }
  } else {
    echo "<tr><td align='center'><nobr>"._PJ_NOREQUESTCOMMENTS."</nobr></td></tr>\n";
  }
  echo "</table>\n";
  CloseTable();
  include("footer.php");
} else {
  header("Location: modules.php?name=$module_name");
}

?>