<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$position_id = intval($position_id);
if($position_id < 1) { header("Location: ".$admin_file.".php?op=PJMemberPositionList"); }
$position = pjmemberposition_info($position_id);
$db->sql_query("DELETE FROM `".$prefix."_nsnpj_members_positions` WHERE `position_id`='$position_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_members_positions`");
$db->sql_query("UPDATE `".$prefix."_nsnpj_projects_members` SET `position_id`='$swap_position_id' WHERE `position_id`='$position_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_projects_members`");
$db->sql_query("UPDATE `".$prefix."_nsnpj_reports_members` SET `position_id`='$swap_position_id' WHERE `position_id`='$position_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_reports_members`");
$db->sql_query("UPDATE `".$prefix."_nsnpj_requests_members` SET `position_id`='$swap_position_id' WHERE `position_id`='$position_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_requests_members`");
$db->sql_query("UPDATE `".$prefix."_nsnpj_tasks_members` SET `position_id`='$swap_position_id' WHERE `position_id`='$position_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_tasks_members`");
$positionresult = $db->sql_query("SELECT `position_id`, `position_weight` FROM `".$prefix."_nsnpj_members_positions` WHERE `position_weight`>='".$position['position_weight']."'");
while(list($p_id, $weight) = $db->sql_fetchrow($projectresult)) {
  $new_weight = $weight - 1;
  $db->sql_query("UPDATE `".$prefix."_nsnpj_members_positions` SET `position_weight`='$new_weight' WHERE `position_id`='$p_id'");
  $db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_members_positions`");
}
header("Location: ".$admin_file.".php?op=PJMemberPositionList");

?>