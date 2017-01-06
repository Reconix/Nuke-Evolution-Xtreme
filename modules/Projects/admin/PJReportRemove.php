<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REPORTS.": "._PJ_DELETEREPORT;
include("header.php");
$report = pjreport_info($report_id);
pjadmin_menu(_PJ_REPORTS.": "._PJ_DELETEREPORT);
echo "<br />\n";
OpenTable();
echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
echo "<form method='post' action='".$admin_file.".php'>\n";
echo "<input type='hidden' name='op' value='PJReportDelete'>\n";
echo "<input type='hidden' name='report_id' value='$report_id'>\n";
echo "<input type='hidden' name='project_id' value='".$report['project_id']."'>";
echo "<tr><td align='center'><b>"._PJ_REPORTCONFIRMDELETE."</b></td></tr>\n";
echo "<tr><td align='center'><b><i>".$report['report_name'].":</i></b></td></tr>\n";
echo "<tr><td align='center'><i>".$report['report_description']."</i></td></tr>\n";
echo "<tr><td align='center'><br /><br /><input type='submit' value='"._PJ_DELETEREPORT."'></td></tr>\n";
echo "</form>\n";
echo "</table>\n";
CloseTable();
pj_copy();
include("footer.php");

?>