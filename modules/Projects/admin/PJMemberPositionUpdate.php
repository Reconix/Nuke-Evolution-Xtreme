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
$position_name = htmlentities($position_name, ENT_QUOTES);
$db->sql_query("UPDATE `".$prefix."_nsnpj_members_positions` SET `position_name`='$position_name' WHERE `position_id`='$position_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_members_positions`");
header("Location: ".$admin_file.".php?op=PJMemberPositionList");

?>