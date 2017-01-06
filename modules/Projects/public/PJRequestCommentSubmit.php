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
  $pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_COMMENTADD;
  include("header.php");
  $userinfo = getusrinfo($user);
  title(_PJ_TITLE." ".$pj_config['version_number'].": "._PJ_COMMENTADD." - ".$request['request_name']);
  
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
  
  OpenTable();
  echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
  echo "<form action='modules.php?name=$module_name' method='post'>\n";
  echo "<input type='hidden' name='op' value='PJRequestCommentInsert'>\n";
  echo "<input type='hidden' name='request_id' value='$request_id'>\n";
  echo "<tr><td align='center' colspan='2' class='title'>"._PJ_INPUTNOTE."</td></tr>\n";
  echo "<tr><td bgcolor='$bgcolor2'>"._PJ_USERNAME.":</td>\n";
  echo "<td><input type='text' name='commenter_name' size='30' value='".$userinfo['username']."'></td></tr>\n";
  echo "<tr><td bgcolor='$bgcolor2'>"._PJ_EMAILADDRESS.":</td>\n";
  echo "<td><input type='text' name='commenter_email' size='30' value='".$userinfo['user_email']."'></td></tr>\n";
  echo "<tr><td bgcolor='$bgcolor2' valign='top'>"._PJ_COMMENT.":</td>\n";
  echo "<td><textarea name='comment_description' cols='60' rows='10' wrap='virtual'></textarea></td></tr>\n";
  echo "<tr><td align='center' colspan='2'><input type='submit' value='"._PJ_COMMENTADD."'></td></tr>\n";
  echo "</form>\n";
  echo "</table>\n";
  CloseTable();
  include("footer.php");
} else {
  header("Location: modules.php?name=$module_name");
}

?>