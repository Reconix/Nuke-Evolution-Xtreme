<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

global $admin_file;
if(!$admin_file OR $admin_file == "") { $admin_file = "admin"; }

if(!defined('ADMIN_FILE')) { die("Illegal Access Detected!!!"); }

$modname = "Projects";
$aid = substr($aid, 0,25);
$query = $db->sql_query("SELECT `title`, `admins` FROM `".$prefix."_modules` WHERE `title`='$modname'");
list($title, $admins) = $db->sql_fetchrow($query);
$db->sql_freeresult($query);
$query2 = $db->sql_query("SELECT `name`, `radminsuper` FROM `".$prefix."_authors` WHERE `aid`='$aid'");
list($rname, $radminsuper) = $db->sql_fetchrow($query2);
$db->sql_freeresult($query2);
$admins = explode(",", $admins);
$auth_user = 0;
for($i=0; $i < sizeof($admins); $i++) { if($rname == $admins[$i] AND !empty($admins)) { $auth_user = 1; } }
if($radminsuper == 1 || $auth_user == 1) {
  adminmenu($admin_file.".php?op=PJMain", _PJ_TITLE, "nukeproject.png");
}

?>
