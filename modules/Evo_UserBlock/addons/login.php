<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Server Info Administration
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : login.php
   Author(s)     : Technocrat (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 05.19.2005 (mm.dd.yyyy)

   Notes         : Evo User Block Login Module
************************************************************************/

if(!defined('NUKE_EVO')) {
   die ("Illegal File Access");
}

global $evouserinfo_login, $lang_evo_userblock;

function evouserinfo_login () {
   global $lang_evo_userblock, $evouserinfo_login;
   
    mt_srand ((double)microtime()*1000000);
    $maxran = 1000000;
    $random_num = mt_rand(0, $maxran);
    $evouserinfo_login .= "<form action=\"modules.php?name=Your_Account\" method=\"post\">\n";
    $evouserinfo_login .= "<table border=\"0\" align=\"center\">";
    $evouserinfo_login .= "<tr><td>\n";
    $evouserinfo_login .= "<img src=\"images/evo_userinfo/arrow.gif\" alt=\"\" align=\"middle\">\n";
    $evouserinfo_login .= "<a href=\"modules.php?name=Your_Account&amp;op=new_user\">".$lang_evo_userblock['BLOCK']['LOGIN']['REG']."</a><br />\n";
    $evouserinfo_login .= "<img src=\"images/evo_userinfo/arrow.gif\" alt=\"\" align=\"middle\">\n";
    $evouserinfo_login .= "<a href=\"modules.php?name=Your_Account&amp;op=pass_lost\">".$lang_evo_userblock['BLOCK']['LOGIN']['LOST']."</a>\n";
    $evouserinfo_login .= "</td></tr>\n<tr><td align=\"center\">\n";
    
    //Login
    $evouserinfo_login .= $lang_evo_userblock['BLOCK']['LOGIN']['USERNAME']."<br /><input type=\"text\" name=\"username\" size=\"15\" maxlength=\"25\"></td></tr>\n";
    $evouserinfo_login .= "<tr><td align=\"center\">".$lang_evo_userblock['BLOCK']['LOGIN']['PASSWORD']."<br /><input type=\"password\" name=\"user_password\" size=\"15\" maxlength=\"20\">\n";
    /*****[BEGIN]******************************************
    [ Mod:     Advanced Security Code Control     v1.0.0 ]
    ******************************************************/
    $gfxchk = array(2,4,5,7);
    $evouserinfo_login .= security_code($gfxchk);
    /*****[END]********************************************
    [ Mod:     Advanced Security Code Control     v1.0.0 ]
    ******************************************************/
    $evouserinfo_login .= "<td align=\"center\">";
    if(!empty($redirect)) {
       $evouserinfo_login .= "<input type=\"hidden\" name=\"redirect\" value=\"$redirect\">\n";
    }
    if(!empty($mode)) {
       $evouserinfo_login .= "<input type=\"hidden\" name=\"mode\" value=\"$mode\">\n";
    }
    if(!empty($f)) {
       $evouserinfo_login .= "<input type=\"hidden\" name=\"f\" value=\"$f\">\n";
    }
    if(!empty($t)) {
       $evouserinfo_login .= "<input type=\"hidden\" name=\"t\" value=\"$t\">\n";
    }
    $evouserinfo_login .= "<input type=\"hidden\" name=\"op\" value=\"login\"></td></tr>\n";
    $evouserinfo_login .= "<tr><td align=\"center\"><input type=\"submit\" value=\"".$lang_evo_userblock['BLOCK']['LOGIN']['LOGIN']."\"></td></tr></table></form>\n";
}


if (!is_user()) {
    evouserinfo_login();
} else {
    $evouserinfo_login .= "<table border=\"0\">";
    $evouserinfo_login .= "<tr><td>\n";
    $evouserinfo_login .= "<img src=\"images/evo_userinfo/arrow.gif\" alt=\"\" align=\"middle\">\n";
    $evouserinfo_login .= "<a href=\"modules.php?name=Your_Account&amp;op=logout\">".$lang_evo_userblock['BLOCK']['LOGIN']['LOGOUT']."</a>\n";
    $evouserinfo_login .= "</td></tr>\n";
    $evouserinfo_login .= "</table>";
}

?>