<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Server Info Administration
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : online.php
   Author(s)     : Technocrat (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 05.19.2005 (mm.dd.yyyy)

   Notes         : Evo User Block Who Is Online Module
************************************************************************/

if(!defined('NUKE_EVO')) {
   die ("Illegal File Access");
}

global $evouserinfo_addons, $evouserinfo_online;

function evouserinfo_get_members_online () {
    global $prefix, $db, $lang_evo_userblock, $user_prefix;
    $sql = "SELECT w.uname, w.module, w.url, u.user_rank, u.user_id, u.user_level, u.user_allow_viewonline FROM ".$prefix."_session AS w LEFT JOIN ".$user_prefix."_users AS u ON u.username = w.uname WHERE w.guest = '0' OR w.guest = '2' ORDER BY u.user_level DESC, u.user_rank DESC, u.username";
    $result = $db->sql_query($sql);
    $i = 1;
    $hidden = 0;
    $out = array();
    $out['text'] = '';
    while ($session = $db->sql_fetchrow($result)) {
        if($i < 10) {
            $num = '0'.$i;
        } else {
            $num = $i;
        }
        $uname = $session['uname'];
        $uname_color = UsernameColor($session['uname']);
        $level = $session['user_level'];
        $module = $session['module'];
        $url = $session['url'];
        $url = str_replace("&", "&amp;", $url);
        $where = "<a href=\"$url\" title=\"$module\">$num</a>.&nbsp;";
        if($session['user_allow_viewonline']) {
            if ($level == 2) {
                $out['text'] .= "$where<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$uname\" title=\"".$lang_evo_userblock['BLOCK']['ONLINE']['VIEW']."&nbsp;".$uname."'s ".$lang_evo_userblock['BLOCK']['ONLINE']['PROFILE']."\">$uname_color</a>&nbsp;<img src=\"images/evo_userinfo/admin.gif\" alt=\"\"><br />\n";
            } elseif ($level == 3) {
                $out['text'] .= "$where<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$uname\" title=\"".$lang_evo_userblock['BLOCK']['ONLINE']['VIEW']."&nbsp;".$uname."'s ".$lang_evo_userblock['BLOCK']['ONLINE']['PROFILE']."\">$uname_color</a>&nbsp;<img src=\"images/evo_userinfo/staff.gif\" alt=\"\"><br />\n";
            } else {
                $out['text'] .= "$where<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$uname\" title=\"".$lang_evo_userblock['BLOCK']['ONLINE']['VIEW']."&nbsp;".$uname."'s ".$lang_evo_userblock['BLOCK']['ONLINE']['PROFILE']."\">$uname_color</a><br />\n";
            }
        } else if(is_admin()){
            if ($level == 2) {
                $out['text'] .= "$where<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$uname\" title=\"".$lang_evo_userblock['BLOCK']['ONLINE']['VIEW']."&nbsp;".$uname."'s ".$lang_evo_userblock['BLOCK']['ONLINE']['PROFILE']."\"><i>$uname_color</i></a>&nbsp;<img src=\"images/evo_userinfo/admin.gif\" alt=\"\"><br />\n";
            } elseif ($level == 3) {
                $out['text'] .= "$where<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$uname\" title=\"".$lang_evo_userblock['BLOCK']['ONLINE']['VIEW']."&nbsp;".$uname."'s ".$lang_evo_userblock['BLOCK']['ONLINE']['PROFILE']."\"><i>$uname_color</i></a>&nbsp;<img src=\"images/evo_userinfo/staff.gif\" alt=\"\"><br />\n";
            } else {
                $out['text'] .= "$where<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$uname\" title=\"".$lang_evo_userblock['BLOCK']['ONLINE']['VIEW']."&nbsp;".$uname."'s ".$lang_evo_userblock['BLOCK']['ONLINE']['PROFILE']."\"><i>$uname_color</i></a><br />\n";
            }
            $hidden++;
        } else {
            $hidden++;
        }
        $i++;
    }
    $i--;
    $out['hidden'] = $hidden;
    $out['total'] = $i;
    $out['visible'] = $i-$hidden;
    $db->sql_freeresult($result);
    return $out;
}

function evouserinfo_get_guests_online ($start) {
    global $prefix, $db, $lang_evo_userblock, $identify;
    $result = $db->sql_query("SELECT uname, url, module FROM ".$prefix."_session WHERE guest='1' OR guest='3'");
    $out['total'] = $db->sql_numrows($result);
    $out['text'] = '';
    $i = $start;
    while ($session = $db->sql_fetchrow($result)) {
        if($i < 10) {
            $num = '0'.$i;
        } else {
            $num = $i;
        }
        $module = $session['module'];
        $url = $session['url'];
        $url = str_replace("&", "&amp;", $url);
        $where = "<a href=\"$url\" title=\"$module\">$num</a>.&nbsp;";
        if(!is_admin()) {
            $out['text'] .= "<br />".$where.$lang_evo_userblock['BLOCK']['ONLINE']['GUEST']."\n";
        } else {
            $user_agent = $identify->identify_agent();
            if($user_agent['engine'] == 'bot') {
                $out['text'] .= "<br />".$where.$user_agent['ua']."\n";
            } else {
                $out['text'] .= "<br />".$where.$session['uname']."\n";
            }
        }
        $i++;
    }
    $db->sql_freeresult($result);
    return $out;
}

function evouserinfo_online_display ($members, $guests) {
    global $lang_evo_userblock, $evouserinfo_addons;
    $out = '';
    if($evouserinfo_addons['online_show_members'] == 'yes') {
        $out .= "<img src=\"images/evo_userinfo/group.png\" alt=\"\">&nbsp;&nbsp;<span style=\"text-decoration:underline; font-weight: bold;\">".$lang_evo_userblock['BLOCK']['ONLINE']['STATS'].$lang_evo_userblock['BLOCK']['BREAK']."</span>".evouserinfo_expand_collapse_start('online_amount')."\n";
        $out .= "<img src=\"images/evo_userinfo/li.png\" alt=\"\">&nbsp;&nbsp;".$lang_evo_userblock['BLOCK']['ONLINE']['MEMBERS'].$lang_evo_userblock['BLOCK']['BREAK']."&nbsp;".$members['total']."<br />\n";
        if($evouserinfo_addons['online_show_hv'] == 'yes') {
            $out .= "&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"images/evo_userinfo/li.png\" alt=\"\">&nbsp;<span style=\"font-weight: bold;\">".$lang_evo_userblock['BLOCK']['ONLINE']['VISIBLE'].$lang_evo_userblock['BLOCK']['BREAK']."</span>&nbsp;".$members['visible']."<br />\n";
            $out .= "&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"images/evo_userinfo/li.png\" alt=\"\">&nbsp;<span style=\"font-style: italic; font-weight: bold;\">".$lang_evo_userblock['BLOCK']['ONLINE']['HIDDEN'].$lang_evo_userblock['BLOCK']['BREAK']."</span>&nbsp;".$members['hidden']."<br />\n";
        }
        $out .= "<img src=\"images/evo_userinfo/li.png\" alt=\"\">&nbsp;&nbsp;".$lang_evo_userblock['BLOCK']['ONLINE']['GUESTS'].$lang_evo_userblock['BLOCK']['BREAK']."&nbsp;".$guests['total']."<br />\n";
        $out .= "<img src=\"images/evo_userinfo/li.png\" alt=\"\">&nbsp;&nbsp;".$lang_evo_userblock['BLOCK']['ONLINE']['TOTAL'].$lang_evo_userblock['BLOCK']['BREAK']."&nbsp;".($guests['total']+$members['total'])."<hr /><br />\n";
        $out .= evouserinfo_expand_collapse_end();
    }
    $out .= "<img src=\"images/evo_userinfo/online.png\" alt=\"\">&nbsp;<span style=\"text-decoration:underline; font-weight: bold;\">".$lang_evo_userblock['BLOCK']['ONLINE']['ONLINE'].$lang_evo_userblock['BLOCK']['BREAK']."</span>".evouserinfo_expand_collapse_start('online')."\n";
    if($evouserinfo_addons['online_scroll'] == 'yes') {
        $out .= "<div style=\"overflow:auto; height:65px; width:140px\">\n";
        $out .= $lang_evo_userblock['BLOCK']['ONLINE']['MEMBERS'].$lang_evo_userblock['BLOCK']['BREAK']."<br />".$members['text']."<br />".$lang_evo_userblock['BLOCK']['ONLINE']['GUESTS'].$lang_evo_userblock['BLOCK']['BREAK'].$guests['text'];

        $out .= "</div>\n";
    } else {
        $out .= $lang_evo_userblock['BLOCK']['ONLINE']['MEMBERS'].$lang_evo_userblock['BLOCK']['BREAK']."<br />".$members['text']."<br />".$lang_evo_userblock['BLOCK']['ONLINE']['GUESTS'].$lang_evo_userblock['BLOCK']['BREAK'].$guests['text'];
    }
    $out .= evouserinfo_expand_collapse_end();
    return $out;
}

$evouserinfo_online_members = evouserinfo_get_members_online();
$evouserinfo_online_guests = evouserinfo_get_guests_online($evouserinfo_online_members['total']+1);

$evouserinfo_online = evouserinfo_online_display($evouserinfo_online_members, $evouserinfo_online_guests);

?>