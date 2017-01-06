<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Server Info Administration
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : posts.php
   Author(s)     : Technocrat (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 05.19.2005 (mm.dd.yyyy)

   Notes         : Evo User Block Forum Posts Module
************************************************************************/

if(!defined('NUKE_EVO')) {
   die ("Illegal File Access");
}

global $evouserinfo_addons, $evouserinfo_posts;

function evouserinfo_total_posts () {
    global $db, $prefix;
    
    $sql = "SELECT COUNT(*) FROM ".$prefix."_bbposts";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);
    
    return (isset($row[0])) ? $row[0] : '?';
}

function evouserinfo_total_topics () {
    global $db, $prefix;
    
    $sql = "SELECT COUNT(*) FROM ".$prefix."_bbtopics";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);
    
    return (isset($row[0])) ? $row[0] : '?';
}

function evouserinfo_ur_total_topics () {
    global $db, $prefix, $userinfo;
    
    $sql = "SELECT COUNT(*) FROM ".$prefix."_bbtopics WHERE topic_poster='".$userinfo['user_id']."'";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);
    
    return (isset($row[0])) ? number_format($row[0]) : '?';
}

function evouserinfo_posts () {
    global $evouserinfo_posts, $lang_evo_userblock;
    
    $topics = evouserinfo_total_topics();
    $posts = evouserinfo_total_posts();
    
    $evouserinfo_posts = "<img src=\"images/evo_userinfo/posts.png\" alt=\"".$lang_evo_userblock['BLOCK']['POSTS']['FORUMS']."\" border=\"0\">\n";
    $evouserinfo_posts .= "<span style=\"text-decoration:underline; font-weight: bold;\">".$lang_evo_userblock['BLOCK']['POSTS']['FORUMS'].$lang_evo_userblock['BLOCK']['BREAK']."</span>".evouserinfo_expand_collapse_start('posts')."\n";
    $evouserinfo_posts .= "<img src=\"images/evo_userinfo/li.png\" align=\"middle\" alt=\"\">&nbsp;".$lang_evo_userblock['BLOCK']['POSTS']['POSTS'].$lang_evo_userblock['BLOCK']['BREAK']."&nbsp;".number_format($posts)."<br />\n";
    $evouserinfo_posts .= "<img src=\"images/evo_userinfo/li.png\" align=\"middle\" alt=\"\">&nbsp;".$lang_evo_userblock['BLOCK']['POSTS']['TOPICS'].$lang_evo_userblock['BLOCK']['BREAK']."&nbsp;".number_format($topics)."<br />\n";
    if (is_user()) {
        global $userinfo;
        $evouserinfo_posts .= "<img src=\"images/evo_userinfo/li.png\" align=\"middle\" alt=\"\">&nbsp;".$lang_evo_userblock['BLOCK']['POSTS']['UR_TOPICS'].$lang_evo_userblock['BLOCK']['BREAK']."&nbsp;".evouserinfo_ur_total_topics()."<br />\n";
        $evouserinfo_posts .= "<img src=\"images/evo_userinfo/li.png\" align=\"middle\" alt=\"\">&nbsp;".$lang_evo_userblock['BLOCK']['POSTS']['UR_POSTS'].$lang_evo_userblock['BLOCK']['BREAK']."&nbsp;".number_format($userinfo['user_posts'])."<br />\n";
    }
    $evouserinfo_posts .= evouserinfo_expand_collapse_end();
}

evouserinfo_posts();
?>