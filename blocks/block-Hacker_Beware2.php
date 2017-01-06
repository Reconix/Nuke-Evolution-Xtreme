<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/********************************************************/
/* NukeSentinel(tm)                                     */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright (c) 2000-2005 by NukeScripts Network         */
/********************************************************/
/* Hacker Beware center block        (SQL Programing)   */
/* By: Stephen2417 (Orignal Code) &    xfsunolesphp     */
/* http://stephen2417.com          http://xfsunoles.com */
/* Copyright (c) 2004 by Stephen2417 & xfsunolesphp       */
/********************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
 ************************************************************************/

if(!defined('NUKE_EVO')) exit;

global $admin_file, $db, $prefix, $ab_config, $currentlang;

$result = $db->sql_query("SELECT * FROM `".$prefix."_nsnst_blocked_ips`");
$total_ips = $db->sql_numrows($result);
$db->sql_freeresult($result);
if(!$total_ips) { $total_ips = 0; }
global $admin;
if(is_admin()) {
    $total_ips = '<strong><u><a href="'.$admin_file.'.php?op=ABBlockedIP">'.intval($total_ips).'</a></u></strong>';
} else {
    $total_ips = intval($total_ips);
}
$content  = "<center><img src=\"images/nukesentinel/Sentinel_Medium.png\" alt=\" "._AB_WARNED."\" title=\" "._AB_WARNED."\"><br />"._AB_CAUGHT." ".$total_ips." "._AB_SHAME."</center>";
$content .= "<hr /><center><a href=\"http://www.nukescripts.net\">"._AB_NUKESENTINEL." ".$ab_config['version_number']."</a></center>\n";

?>