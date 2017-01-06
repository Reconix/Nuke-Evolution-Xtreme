<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$db->sql_query("INSERT INTO `".$prefix."_nsnpj_members` VALUES (NULL, '$member_name', '$member_email')");
header("Location: ".$admin_file.".php?op=PJMemberList");

?>