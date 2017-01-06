<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$db->sql_query("UPDATE `".$prefix."_nsnpj_members` SET `member_name`='$member_name', `member_email`='$member_email' WHERE `member_id`='$member_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_members`");
header("Location: ".$admin_file.".php?op=PJMemberList");

?>