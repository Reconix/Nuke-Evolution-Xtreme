<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Server Info Administration
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : avatar.php
   Author(s)     : Technocrat (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 05.19.2005 (mm.dd.yyyy)

   Notes         : Evo User Block Avatar Module
************************************************************************/

if(!defined('NUKE_EVO')) {
   die ("Illegal File Access");
}

global $evouserinfo_avatar;

$evouserinfo_avatar = "<div align=\"center\">";
if (is_user()) {
    global $userinfo, $board_config;
    if ($userinfo['user_allowavatar']) {
        if ($userinfo['user_avatar_type'] == 1)  {
            $evouserinfo_avatar .= "<img src=\"".$board_config['avatar_path']."/".$userinfo['user_avatar']."\" alt=\"\">";
        } elseif ($userinfo['user_avatar_type'] == 2) {
            $evouserinfo_avatar .= avatar_resize($userinfo['user_avatar']);
        } elseif ($userinfo['user_avatar'] == '') {
            $evouserinfo_avatar .= "<img src=\"".$board_config['avatar_gallery_path']."/gallery/blank.gif\" alt=\"\">";
        } elseif ($userinfo['user_avatar'] == $board_config['avatar_gallery_path']."/gallery/blank.gif") {
            $evouserinfo_avatar .= "<img src=\"".$board_config['avatar_gallery_path']."/gallery/blank.gif\" alt=\"\">";
        } elseif ($userinfo['user_avatar'] == $board_config['avatar_gallery_path']."/blank.gif") {
            $evouserinfo_avatar .= "<img src=\"".$board_config['avatar_gallery_path']."/blank.gif\" alt=\"\">";
        } else {
            $evouserinfo_avatar .= "<img src=\"".$board_config['avatar_gallery_path']."/".$userinfo['user_avatar']."\" alt=\"\">";
        }
    }   
} else {
    global $board_config;
    $evouserinfo_avatar .= "<img src=\"".$board_config['avatar_gallery_path']."/gallery/blank.gif\" alt=\"\">";
}
$evouserinfo_avatar .= "</div><br />";

?>