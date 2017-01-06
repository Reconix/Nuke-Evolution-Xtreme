<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Server Info Administration
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : mostever.php
   Author(s)     : Technocrat (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 05.19.2005 (mm.dd.yyyy)

   Notes         : Evo User Block Most Ever Online Module
************************************************************************/

if(!defined('NUKE_EVO')) {
   die ("Illegal File Access");
}

global $evouserinfo_addons, $evouserinfo_mostever;

function evouserinfo_get_mostonline () {
    global $db, $prefix;
    
    $result = $db->sql_query("SELECT total, members, nonmembers FROM ".$prefix."_mostonline");
    $mostonline = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);
    $out['total'] = (is_integer(intval($mostonline['total']))) ? intval($mostonline['total']) : 0;
    $out['members'] = (is_integer(intval($mostonline['members']))) ? intval($mostonline['members']) : 0;
    $out['nonmembers'] = (is_integer(intval($mostonline['nonmembers']))) ? intval($mostonline['nonmembers']) : 0;
    $result = $db->sql_query("SELECT COUNT(*) FROM `".$prefix."_session` WHERE `guest`='0' OR `guest`='2'");
    $row = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);
    $users = $row[0];
    $result = $db->sql_query("SELECT COUNT(*) FROM `".$prefix."_session` WHERE `guest`='1' OR `guest`='3'");
    $row = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);
    $guests = $row[0];
    $total = $users + $guests;
    
    if ($total > $out['total']) {
        $db->sql_query("DELETE FROM `".$prefix."_mostonline` WHERE `total`='".$out['total']."' LIMIT 1");
        $db->sql_query("INSERT INTO `".$prefix."_mostonline` VALUES ('".$total."','".$users."','".$guests."')");
    }

    return $out;
}


global $userinfo, $lang_evo_userblock;
$block_mostever = evouserinfo_get_mostonline();
$evouserinfo_mostever .= "<a href=\"modules.php?name=Statistics\" title=\"".$lang_evo_userblock['BLOCK']['MOST']['STATS']."\"><img src=\"images/evo_userinfo/stats.png\" alt=\"\" border=\"0\"></a>\n";
$evouserinfo_mostever .= "<span style=\"text-decoration:underline; font-weight: bold;\">".$lang_evo_userblock['BLOCK']['MOST']['MOST'].$lang_evo_userblock['BLOCK']['BREAK']."</span>".evouserinfo_expand_collapse_start('mostever')."\n";
$evouserinfo_mostever .= "<img src=\"images/evo_userinfo/li.png\" align=\"middle\" alt=\"\">&nbsp;".$lang_evo_userblock['BLOCK']['ONLINE']['GUESTS'].$lang_evo_userblock['BLOCK']['ONLINE']['BREAK']."&nbsp;".number_format($block_mostever['nonmembers'])."<br />\n";
$evouserinfo_mostever .= "<img src=\"images/evo_userinfo/li.png\" align=\"middle\" alt=\"\">&nbsp;".$lang_evo_userblock['BLOCK']['ONLINE']['MEMBERS'].$lang_evo_userblock['BLOCK']['ONLINE']['BREAK']."&nbsp;".number_format($block_mostever['members'])."<br />\n";
$evouserinfo_mostever .= "<img src=\"images/evo_userinfo/li.png\" align=\"middle\" alt=\"\">&nbsp;".$lang_evo_userblock['BLOCK']['ONLINE']['TOTAL'].$lang_evo_userblock['BLOCK']['ONLINE']['BREAK']."&nbsp;".number_format($block_mostever['total']).evouserinfo_expand_collapse_end()."\n";


?>