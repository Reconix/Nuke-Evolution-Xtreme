<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_MEMBERS.": "._PJ_MEMBERLIST;
include("header.php");
pjadmin_menu(_PJ_MEMBERS.": "._PJ_MEMBERLIST);
echo "<br />\n";
$memberresult = $db->sql_query("SELECT `member_id`, `member_name` FROM `".$prefix."_nsnpj_members` ORDER BY `member_name`");
$member_total = $db->sql_numrows($memberresult);
OpenTable();
echo "<table width='100%' border='1' cellspacing='0' cellpadding='2'>\n";
echo "<tr><td colspan='3' width='100%' bgcolor='$bgcolor2'><nobr><b>"._PJ_MEMBEROPTIONS."</b></nobr></td></tr>\n";
$pjimage = pjimage("options.png", $modname);
echo "<tr><td><img src='$pjimage'></td><td colspan=2 width='100%'><nobr><a href='".$admin_file.".php?op=PJMemberAdd'>"._PJ_MEMBERADD."</a></nobr></td></tr>\n";
$pjimage = pjimage("stats.png", $modname);
echo "<tr><td><img src='$pjimage'></td><td colspan=2 width='100%'><nobr>"._PJ_MEMBERS.": <b>$member_total</b></nobr></td></tr>\n";
echo "</table>\n";
//CloseTable();
echo "<br />\n";
//OpenTable();
echo "<table width='100%' border='1' cellspacing='0' cellpadding='2'>\n";
echo "<tr><td colspan='2' bgcolor='$bgcolor2' width='100%'><b>"._PJ_MEMBERS."</b></a></td><td align='center' bgcolor='$bgcolor2'><b>"._PJ_FUNCTIONS."</b></td></tr>\n";
if($member_total != 0){
  while(list($member_id, $member_name) = $db->sql_fetchrow($memberresult)) {
    $pjimage = pjimage("member.png", $modname);
    echo "<tr><td><img src='$pjimage'></td><td width='100%'>" . UsernameColor($member_name) . "</td>\n";
    echo "<td align='center'><nobr>[ <a href='".$admin_file.".php?op=PJMemberEdit&amp;member_id=$member_id'>"._PJ_EDIT."</a>";
    echo " | <a href='".$admin_file.".php?op=PJMemberRemove&amp;member_id=$member_id'>"._PJ_DELETE."</a> ]</nobr></td></tr>\n";
  }
} else {
  echo "<tr><td width='100%' colspan='3' align='center'>"._PJ_NOMEMBERS."</td></tr>\n";
}
echo "</table>\n";
CloseTable();
pj_copy();
include("footer.php");

?>