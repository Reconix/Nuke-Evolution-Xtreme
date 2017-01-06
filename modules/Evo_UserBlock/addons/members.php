<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Server Info Administration
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : members.php
   Author(s)     : Technocrat (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 05.19.2005 (mm.dd.yyyy)

   Notes         : Evo User Block Members Module
************************************************************************/

if(!defined('NUKE_EVO')) {
   die ("Illegal File Access");
}

global $evouserinfo_addons, $evouserinfo_members;

function evouserinfo_members () {
    global $userinfo, $db, $prefix, $user_prefix, $evouserinfo_members, $lang_evo_userblock;
    
    $evouserinfo_members = "";
    $evouserinfo_members .= "<span style=\"text-decoration:underline; font-weight: bold;\">".$lang_evo_userblock['BLOCK']['MEMBERS']['MEMBERS'].$lang_evo_userblock['BLOCK']['BREAK']."</span>".evouserinfo_expand_collapse_start('members')."\n";
    list($uid) = $db->sql_fetchrow($db->sql_query("select user_id from ".$user_prefix."_users where username='".$userinfo['username']."'"));
    $result = $db->sql_query("SELECT group_name FROM ".$prefix."_bbgroups LEFT JOIN ".$prefix."_bbuser_group on ".$prefix."_bbuser_group.group_id=".$prefix."_bbgroups.group_id WHERE ".$prefix."_bbuser_group.user_id='$uid' and ".$prefix."_bbgroups.group_description != 'Personal User'");
    if ($db->sql_numrows($result) == 0) {
          $evouserinfo_members .= "<img src=\"images/evo_userinfo/li.png\" align=\"middle\" alt=\"\">&nbsp;"._GRNONE."<br />\n";
    } else {
        while(list($group_name) = $db->sql_fetchrow($result)) {
            $group_name = GroupColor($group_name);
            $evouserinfo_members .= "<img src=\"images/evo_userinfo/li.png\" align=\"middle\" alt=\"\">&nbsp;".$group_name."<br />\n";
        }
        $db->sql_freeresult($result);
    }
    $evouserinfo_members .= evouserinfo_expand_collapse_end();
}

if (is_user()) {
    evouserinfo_members();
} else {
    $evouserinfo_members = '';
}

?>