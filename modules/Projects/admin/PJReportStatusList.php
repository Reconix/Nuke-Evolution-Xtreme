<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REPORTS.": "._PJ_STATUSLIST;
include("header.php");
pjadmin_menu(_PJ_REPORTS.": "._PJ_STATUSLIST);
echo "<br />\n";
$statusresult = $db->sql_query("SELECT * FROM `".$prefix."_nsnpj_reports_status` WHERE `status_weight` > 0 ORDER BY `status_weight`");
$status_total = $db->sql_numrows($statusresult);
OpenTable();
echo "<table width='100%' border='1' cellspacing='0' cellpadding='2'>\n";
echo "<tr><td colspan='3' width='100%' bgcolor='$bgcolor2'><nobr><b>"._PJ_STATUSOPTIONS."</b></nobr></td></tr>\n";
$pjimage = pjimage("options.png", $modname);
echo "<tr><td><img src='$pjimage'></td><td colspan='2' width='100%'><nobr><a href='".$admin_file.".php?op=PJReportStatusAdd'>"._PJ_STATUSADD."</a></nobr></td></tr>\n";
$pjimage = pjimage("stats.png", $modname);
echo "<tr><td><img src='$pjimage'></td><td colspan='2' width='100%'><nobr>"._PJ_TOTALSTATUSES.": <b>$status_total</b></nobr></td></tr>\n";
echo "</table>\n";
//CloseTable();
echo "<br />\n";
//OpenTable();
echo "<table width='100%' border='1' cellspacing='0' cellpadding='2'>\n";
echo "<tr><td colspan='2' bgcolor='$bgcolor2' width='100%'><b>"._PJ_STATUSLIST."</b></a></td>";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_WEIGHT."</b></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_FUNCTIONS."</b></td></tr>\n";
if($status_total != 0){
  while($status_row = $db->sql_fetchrow($statusresult)) {
    $pjimage = pjimage("status.png", $modname);
    echo "<tr><td><img src='$pjimage'></td><td width='100%'>".$status_row['status_name']."</td>";
    $weight1 = $status_row['status_weight'] - 1;
    $weight3 = $status_row['status_weight'] + 1;
    list($pid1) = $db->sql_fetchrow($db->sql_query("SELECT `status_id` FROM `".$prefix."_nsnpj_reports_status` WHERE `status_weight`='$weight1'"));
    list($pid2) = $db->sql_fetchrow($db->sql_query("SELECT `status_id` FROM `".$prefix."_nsnpj_reports_status` WHERE `status_weight`='$weight3'"));
    echo "<td align='center'><nobr>";
    if($pid1 AND $pid1 > 0) {
      echo "<a href='".$admin_file.".php?op=PJReportStatusOrder&amp;weight=".$status_row['status_weight']."&amp;pid=".$status_row['status_id']."&amp;weightrep=$weight1&amp;pidrep=$pid1'><img src='modules/$modname/images/weight_up.png' border='0' hspace='3' alt='"._PJ_UP."' title='"._PJ_UP."'></a>";
    } else {
      echo "<img src='modules/$modname/images/weight_up_no.png' border='0' hspace='3' alt='' title=''>";
    }
    if($pid2) {
      echo "<a href='".$admin_file.".php?op=PJReportStatusOrder&amp;weight=".$status_row['status_weight']."&amp;pid=".$status_row['status_id']."&amp;weightrep=$weight3&amp;pidrep=$pid2'><img src='modules/$modname/images/weight_dn.png' border='0' hspace='3' alt='"._PJDOWN."' title='"._PJ_DOWN."'></a>";
    } else {
      echo "<img src='modules/$modname/images/weight_dn_no.png' border='0' hspace='3' alt='' title=''>";
    }
    echo"</nobr></td>\n";
    echo "<td align='center'><nobr>[ <a href='".$admin_file.".php?op=PJReportStatusEdit&amp;status_id=".$status_row['status_id']."'>"._PJ_EDIT."</a>";
    echo " | <a href='".$admin_file.".php?op=PJReportStatusRemove&amp;status_id=".$status_row['status_id']."'>"._PJ_DELETE."</a> ]</nobr></td></tr>\n";
  }
  echo "<tr><td align='center' colspan='4'><a href='".$admin_file.".php?op=PJReportStatusFix'>"._PJ_FIXWEIGHT."</a></td></tr>\n";
} else {
  echo "<tr><td width='100%' colspan='3' align='center'>"._PJ_NOREPORTSTATUSES."</td></tr>\n";
}
echo "</table>\n";
CloseTable();
pj_copy();
include("footer.php");

?>