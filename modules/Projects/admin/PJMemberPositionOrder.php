<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pidrep = intval($pidrep);
$pid = intval($pid);
$result = $db->sql_query("UPDATE `".$prefix."_nsnpj_members_positions` SET `position_weight`='$weight' WHERE `position_id`='$pidrep'");
$result2 = $db->sql_query("UPDATE `".$prefix."_nsnpj_members_positions` SET `position_weight`='$weightrep' WHERE `position_id`='$pid'");
header("Location: ".$admin_file.".php?op=PJMemberPositionList");

?>