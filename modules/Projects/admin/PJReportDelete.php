<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$report_id = intval($report_id);
$report = pjreport_info($report_id);
$db->sql_query("DELETE FROM `".$prefix."_nsnpj_reports` WHERE `report_id`='$report_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_reports`");
$db->sql_query("DELETE FROM `".$prefix."_nsnpj_reports_comments` WHERE `report_id`='$report_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_reports_comments`");
$db->sql_query("DELETE FROM `".$prefix."_nsnpj_reports_members` WHERE `report_id`='$report_id'");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnpj_reports_members`");
header("Location: modules.php?name=$modname&op=PJProject&project_id=".$report['project_id']);

?>