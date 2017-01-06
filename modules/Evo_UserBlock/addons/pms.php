<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Server Info Administration
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : pms.php
   Author(s)     : Technocrat (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 05.19.2005 (mm.dd.yyyy)

   Notes         : Evo User Block PMs Module
************************************************************************/

if(!defined('NUKE_EVO')) {
   die ("Illegal File Access");
}

global $evouserinfo_addons, $evouserinfo_pms, $lang_evo_userblock;

if (is_user()) {
    global $userinfo;
    $pms = intval($userinfo['user_new_privmsg']);
    $evouserinfo_pms .= "<img src=\"images/evo_userinfo/li.png\" alt=\"\" align=\"middle\">\n";
    $evouserinfo_pms .= $lang_evo_userblock['BLOCK']['PMS']['INBOX'].$lang_evo_userblock['BLOCK']['BREAK']."<span style=\"font-weight: bold;\"><a title=\"".$lang_evo_userblock['BLOCK']['PMS']['OPEN_INBOX']."\" href=\"modules.php?name=Private_Messages\">&nbsp;".$pms."</a></span><br />\n";
}

?>