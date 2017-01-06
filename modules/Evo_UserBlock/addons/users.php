<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Server Info Administration
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : users.php
   Author(s)     : Technocrat (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 05.19.2005 (mm.dd.yyyy)

   Notes         : Evo User Block Users Module
************************************************************************/

if(!defined('NUKE_EVO')) {
   die ("Illegal File Access");
}

global $evouserinfo_addons, $evouserinfo_users;

function evouserinfo_newest_user () {
    global $db, $user_prefix;

    $sql = "SELECT username FROM ".$user_prefix."_users WHERE user_active = 1 AND user_level > 0 ORDER BY user_id DESC LIMIT 1";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);

    return (isset($row[0])) ? $row[0] : '?';
}

function evouserinfo_new_today () {
    global $user_prefix, $db;

    $sql = "SELECT COUNT(*) FROM ".$user_prefix."_users WHERE user_regdate='".date("M d, Y")."'";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);

    return (isset($row[0])) ? $row[0] : '?';
}

function evouserinfo_new_yesterday () {
    global $user_prefix, $db;

    $sql = "SELECT COUNT(*) FROM ".$user_prefix."_users WHERE user_regdate='".date("M d, Y", time()-86400)."'";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);

    return (isset($row[0])) ? $row[0] : '?';
}

function evouserinfo_waiting () {
    global $user_prefix, $db;

    $sql = "SELECT COUNT(*) FROM ".$user_prefix."_users_temp";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);

    return (isset($row[0])) ? $row[0] : '?';
}

function evouserinfo_total () {
    global $user_prefix, $db;

    $sql = "SELECT COUNT(*) FROM ".$user_prefix."_users WHERE user_id > 1";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);

    return (isset($row[0])) ? $row[0] : '?';
}

function evouserinfo_users () {
    global $evouserinfo_users, $lang_evo_userblock;

    $today = evouserinfo_new_today();
    $yesterday = evouserinfo_new_yesterday();
    $new_user = UsernameColor(evouserinfo_newest_user());
    $waiting = evouserinfo_waiting();
    $total = evouserinfo_total();

    $evouserinfo_users = "<a href=\"modules.php?name=Members_List\" title=\"".$lang_evo_userblock['BLOCK']['USERS']['MEMBERSHIPS']."\"><img src=\"images/evo_userinfo/members.png\" alt=\"".$lang_evo_userblock['BLOCK']['USERS']['MEMBERSHIPS']."\" border=\"0\"></a>\n";
    $evouserinfo_users .= "<span style=\"text-decoration:underline; font-weight: bold;\">".$lang_evo_userblock['BLOCK']['USERS']['MEMBERSHIPS'].$lang_evo_userblock['BLOCK']['BREAK']."</span>".evouserinfo_expand_collapse_start('users')."\n";
    $evouserinfo_users .= "<img src=\"images/evo_userinfo/li.png\" align=\"middle\" alt=\"\">&nbsp;".$lang_evo_userblock['BLOCK']['USERS']['NEW_TODAY'].$lang_evo_userblock['BLOCK']['BREAK']."&nbsp;".number_format($today)."<br />\n";
    $evouserinfo_users .= "<img src=\"images/evo_userinfo/li.png\" align=\"middle\" alt=\"\">&nbsp;".$lang_evo_userblock['BLOCK']['USERS']['NEW_YESTERDAY'].$lang_evo_userblock['BLOCK']['BREAK']."&nbsp;".number_format($yesterday)."<br />\n";
    $evouserinfo_users .= "<img src=\"images/evo_userinfo/li.png\" align=\"middle\" alt=\"\">&nbsp;".$lang_evo_userblock['BLOCK']['USERS']['WAITING'].$lang_evo_userblock['BLOCK']['BREAK']."&nbsp;".number_format($waiting)."<br />\n";
    $evouserinfo_users .= "<img src=\"images/evo_userinfo/li.png\" align=\"middle\" alt=\"\">&nbsp;".$lang_evo_userblock['BLOCK']['USERS']['TOTAL'].$lang_evo_userblock['BLOCK']['BREAK']."&nbsp;".number_format($total)."<br />\n";
    $evouserinfo_users .= "<img src=\"images/evo_userinfo/li.png\" align=\"middle\" alt=\"\">&nbsp;".$lang_evo_userblock['BLOCK']['USERS']['LATEST'].$lang_evo_userblock['BLOCK']['BREAK']."&nbsp;<strong>".$new_user."</strong><br />\n";
    $evouserinfo_users .= evouserinfo_expand_collapse_end();
}

if (is_user()) {
    evouserinfo_users();
}

?>