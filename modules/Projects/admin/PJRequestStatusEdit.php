<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright � 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REQUESTS.": "._PJ_STATUSEDIT;
$status_id = intval($status_id);
if($status_id < 1) { header("Location: ".$admin_file.".php?op=PJRequestStatusList"); }
include("header.php");
$status = pjrequeststatus_info($status_id);
pjadmin_menu(_PJ_REQUESTS.": "._PJ_STATUSEDIT);
echo "<br />";
OpenTable();
echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>";
echo "<form method='post' action='".$admin_file.".php'>";
echo "<input type='hidden' name='op' value='PJRequestStatusUpdate'>";
echo "<input type='hidden' name='status_id' value='$status_id'>";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_STATUS.":</td>";
echo "<td><input type='text' name='status_name' size='30' value=\"".$status['status_name']."\"></td></tr>";
echo "<tr><td colspan='2' align='center'><input type='submit' value='"._PJ_STATUSUPDATE."'></td></tr>";
echo "</form>";
echo "</table>";
CloseTable();
pj_copy();
include("footer.php");

?>