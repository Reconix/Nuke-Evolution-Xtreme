<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
for($i = 0; $i < count($delete_member_ids); $i++){
  $db->sql_query("DELETE FROM `".$prefix."_nsnpj_tasks_members` WHERE `member_id`='".$delete_member_ids[$i]."' AND `task_id`='$task_id'");
}
for($i = 0; $i < count($member_ids); $i++){
  $db->sql_query("UPDATE `".$prefix."_nsnpj_tasks_members` SET `position_id`='".$position_ids[$i]."' WHERE `task_id`='$task_id' AND `member_id`='".$member_ids[$i]."'");
}
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_tasks_members`");
header("Location: ".$admin_file.".php?op=PJTaskEdit&task_id=$task_id");

?>