<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright � 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REQUESTS.": "._PJ_TYPEEDIT;
$type_id = intval($type_id);
if($type_id < 1) { header("Location: ".$admin_file.".php?op=PJRequestTypeList"); }
include("header.php");
$type = pjrequesttype_info($type_id);
pjadmin_menu(_PJ_REQUESTS.": "._PJ_TYPEEDIT);
echo "<br />";
OpenTable();
echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>";
echo "<form method='post' action='".$admin_file.".php'>";
echo "<input type='hidden' name='op' value='PJRequestTypeUpdate'>";
echo "<input type='hidden' name='type_id' value='$type_id'>";
echo "<tr><td bgcolor='$bgcolor2'>"._PJ_TYPE.":</td>";
echo "<td><input type='text' name='type_name' value=\"".$type['type_name']."\" size='30'></td></tr>";
echo "<tr><td colspan='2' align='center'><input type='submit' value='"._PJ_TYPEUPDATE."'></td></tr>";
echo "</form>";
echo "</table>";
CloseTable();
pj_copy();
include("footer.php");

?>