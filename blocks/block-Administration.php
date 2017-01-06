<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Content Management System
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : block-Administration.php
   Author        : Nuke-Evolution Team
   Version       : 1.5.0
   Date          : 06/10/2005 (dd-mm-yyyy)

   Notes         : Quick Admin Navigation Block which lets you quickly
                   run / view the specific option available.
************************************************************************/

if(!defined('NUKE_EVO')) exit;

if (is_admin()) {
    global $db, $admin_file, $currentlang;


    $content = "<center><strong><u><span class=\"content\">"._ADMIN_BLOCK_TITLE."</span>:</u></strong></center><br />";

    $links = array(
        // Admin [Nuke-Evo]
        _ADMIN_BLOCK_NUKE => $admin_file.".php",
        // Admin [Forums]
        _ADMIN_BLOCK_FORUMS => $admin_file.".php?op=forums",
        // Line Break
        'BREAK1' => '<hr />',
        // Cache
        _CACHE_ADMIN => $admin_file.".php?op=cache",
        // Blocks
        _ADMIN_BLOCK_BLOCKS => $admin_file.".php?op=blocks",
        // Modules
        _ADMIN_BLOCK_MODULES => $admin_file.".php?op=modules",
        // Settings
        _ADMIN_BLOCK_SETTINGS => $admin_file.".php?op=Configure",
        // Themes
        _THEMES => $admin_file.".php?op=themes",
        // Line Break
        'BREAK2' => '<hr />',
        // Downloads
        _ADMIN_BLOCK_DOWNLOADS => $admin_file.".php?op=Downloads",
        // Evolution UserInfo Block
        _ADMIN_BLOCK_EVO_USER => $admin_file.".php?op=evo-userinfo",
        // Messages
        _ADMIN_BLOCK_MSGS => $admin_file.".php?op=messages",
        // Module Block Admin
        _ADMIN_BLOCK_MODULE_BLOCK => $admin_file.".php?op=modules&amp;area=block",
        // Nuke Sentinel
        _AB_NUKESENTINEL => $admin_file.".php?op=ABMain",
        // News
        _ADMIN_BLOCK_NEWS => $admin_file.".php?op=adminStory",
        // Reviews
        _ADMIN_BLOCK_REVIEWS => $admin_file.".php?op=reviews",
        // CNBYA
        _ADMIN_BLOCK_CNBYA => "modules.php?name=Your_Account&amp;file=admin",
        // Web Links
        _ADMIN_BLOCK_WEBLINKS => $admin_file.".php?op=Links",
        // Line Break
        'BREAK3' => '<hr />',
        // Clear Cache
        _CACHE_CLEAR => $admin_file.".php?op=cache_clear",
        // Error Log
        _ADMIN_BLOCK_ERRORLOG => $admin_file.".php?op=viewadminlog&amp;log=error",
        // System Info
        _ADMIN_BLOCK_SYSTEMINFO => $admin_file.".php?op=info",
        // Logout
        _ADMIN_BLOCK_LOGOUT => $admin_file.".php?op=logout",
    );

    if (is_array($links)) {
        foreach($links as $text => $link) {
            if ($link != '<hr />') {
                $content .= "<img src=\"images/blocks/modules/arrow.gif\" border=\"0\" alt=\"\" />&nbsp;<a href='" . $link . "'>".$text."</a><br />";
            } else {
                $content .= $link;
            }
        }
    }

} else {
    global $admin_file;
    $content ="<center><strong>"._ADMIN_BLOCK_LOGIN."</strong></center><br /><br />";
    $content .= "<form action=\"".$admin_file.".php\" method=\"post\">"
               ."<table border=\"0\">"
               ."<tr><td>"._ADMIN_ID."</td>"
               ."<td><input type=\"text\" name=\"aid\" size=\"8\" maxlength=\"25\" /></td></tr>"
               ."<tr><td>"._ADMIN_PASS."</td>"
               ."<td><input type=\"password\" name=\"pwd\" size=\"8\" maxlength=\"40\" /></td></tr>";
    $gfxchk = array(1,5,6,7);
    $content .= security_code($gfxchk);
    $content .= "<tr><td>"
               ."<input type=\"hidden\" name=\"op\" value=\"login\" />"
               ."<input type=\"submit\" value=\""._LOGIN."\" />"
               ."</td></tr></table>"
               ."</form>";
}

?>