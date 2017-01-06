<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$result = $db->sql_query("SELECT * FROM `".$prefix."_nsnpj_projects` ORDER BY `project_id` ASC");
$weight = 0;
while($row = $db->sql_fetchrow($result)) {
  $xid = intval($row['project_id']);
  $weight++;
  $db->sql_query("UPDATE `".$prefix."_nsnpj_projects` SET `weight`='$weight' WHERE `project_id`='$xid'");
}
header("Location: ".$admin_file.".php?op=PJProjectList");

?>