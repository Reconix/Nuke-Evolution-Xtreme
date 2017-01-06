<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$member_id = intval($member_id);
$db->sql_query("DELETE FROM `".$prefix."_nsnpj_members` WHERE `member_id`='$member_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_members`");
$db->sql_query("UPDATE `".$prefix."_nsnpj_projects_members` SET `member_id`='$swap_member_id' WHERE `member_id`='$member_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_projects_members`");
$db->sql_query("UPDATE `".$prefix."_nsnpj_tasks_members` SET `member_id`='$swap_member_id' WHERE `member_id`='$member_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_tasks_members`");
$db->sql_query("UPDATE `".$prefix."_nsnpj_reports_members` SET `member_id`='$swap_member_id' WHERE `member_id`='$member_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_reports_members`");
$db->sql_query("UPDATE `".$prefix."_nsnpj_requests_members` SET `member_id`='$swap_member_id' WHERE `member_id`='$member_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_requests_members`");
header("Location: ".$admin_file.".php?op=PJMemberList");

?>