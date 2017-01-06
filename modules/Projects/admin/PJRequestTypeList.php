<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright � 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REQUESTS.": "._PJ_TYPELIST;
include("header.php");
pjadmin_menu(_PJ_REQUESTS.": "._PJ_TYPELIST);
echo "<br />";
$typeresult = $db->sql_query("SELECT * FROM `".$prefix."_nsnpj_requests_types` WHERE `type_weight` > 0 ORDER BY `type_weight`");
$type_total = $db->sql_numrows($typeresult);
OpenTable();
echo "<table width='100%' border='1' cellspacing='0' cellpadding='2'>";
echo "<tr><td colspan='3' width='100%' bgcolor='$bgcolor2'><nobr><b>"._PJ_TYPEOPTIONS."</b></nobr></td></tr>";
$pjimage = pjimage("options.png", $modname);
echo "<tr><td><img src='$pjimage'></td><td colspan='2' width='100%'><nobr><a href='".$admin_file.".php?op=PJRequestTypeAdd'>"._PJ_TYPEADD."</a></nobr></td></tr>";
$pjimage = pjimage("stats.png", $modname);
echo "<tr><td><img src='$pjimage'></td><td colspan='2' width='100%'><nobr>"._PJ_TOTALTYPES.": <b>$type_total</b></nobr></td></tr>";
echo "</table>";
//CloseTable();
echo "<br />";
//OpenTable();
echo "<table width='100%' border='1' cellspacing='0' cellpadding='2'>";
echo "<tr><td colspan='2' bgcolor='$bgcolor2' width='100%'><b>"._PJ_TYPELIST."</b></a></td>";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_WEIGHT."</b></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_FUNCTIONS."</b></td></tr>";
if($type_total != 0){
  while($type_row = $db->sql_fetchrow($typeresult)) {
    $pjimage = pjimage("type.png", $modname);
    echo "<tr><td><img src='$pjimage'></td><td width='100%'>".$type_row['type_name']."</td>";
    $weight1 = $type_row['type_weight'] - 1;
    $weight3 = $type_row['type_weight'] + 1;
    list($pid1) = $db->sql_fetchrow($db->sql_query("SELECT `type_id` FROM `".$prefix."_nsnpj_requests_types` WHERE `type_weight`='$weight1'"));
    list($pid2) = $db->sql_fetchrow($db->sql_query("SELECT `type_id` FROM `".$prefix."_nsnpj_requests_types` WHERE `type_weight`='$weight3'"));
    echo "<td align='center'><nobr>";
    if($pid1 AND $pid1 > 0) {
      echo "<a href='".$admin_file.".php?op=PJRequestTypeOrder&amp;weight=".$type_row['type_weight']."&amp;pid=".$type_row['type_id']."&amp;weightrep=$weight1&amp;pidrep=$pid1'><img src='modules/$modname/images/weight_up.png' border='0' hspace='3' alt='"._PJ_UP."' title='"._PJ_UP."'></a>";
    } else {
      echo "<img src='modules/$modname/images/weight_up_no.png' border='0' hspace='3' alt='' title=''>";
    }
    if($pid2) {
      echo "<a href='".$admin_file.".php?op=PJRequestTypeOrder&amp;weight=".$type_row['type_weight']."&amp;pid=".$type_row['type_id']."&amp;weightrep=$weight3&amp;pidrep=$pid2'><img src='modules/$modname/images/weight_dn.png' border='0' hspace='3' alt='"._PJDOWN."' title='"._PJ_DOWN."'></a>";
    } else {
      echo "<img src='modules/$modname/images/weight_dn_no.png' border='0' hspace='3' alt='' title=''>";
    }
    echo"</nobr></td>\n";
    echo "<td align='center'><nobr>[ <a href='".$admin_file.".php?op=PJRequestTypeEdit&amp;type_id=".$type_row['type_id']."'>"._PJ_EDIT."</a>";
    echo " | <a href='".$admin_file.".php?op=PJRequestTypeRemove&amp;type_id=".$type_row['type_id']."'>"._PJ_DELETE."</a> ]</nobr></td></tr>\n";
  }
  echo "<tr><td align='center' colspan='4'><a href='".$admin_file.".php?op=PJRequestTypeFix'>"._PJ_FIXWEIGHT."</a></td></tr>\n";
} else {
  echo "<tr><td width='100%' colspan='3' align='center'>"._PJ_NOREQUESTTYPES."</td></tr>";
}
echo "</table>";
CloseTable();
pj_copy();
include("footer.php");

?>