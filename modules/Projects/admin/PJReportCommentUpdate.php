<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$comment_description = htmlentities($comment_description, ENT_QUOTES);
$commenter_name = htmlentities($commenter_name, ENT_QUOTES);
$db->sql_query("UPDATE `".$prefix."_nsnpj_reports_comments` SET `commenter_email`='$commenter_email', `commenter_name`='$commenter_name', `comment_description`='$comment_description' WHERE `comment_id`='$comment_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_reports_comments`");
header("Location: modules.php?name=$modname&op=PJReport&report_id=$report_id");

?>