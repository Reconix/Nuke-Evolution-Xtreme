<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/*********************************************************************************/
/* CNB Your Account: An Advanced User Management System for phpnuke             */
/* ============================================                                 */
/*                                                                              */
/* Copyright (c) 2004 by Comunidade PHP Nuke Brasil                             */
/* http://dev.phpnuke.org.br & http://www.phpnuke.org.br                        */
/*                                                                              */
/* Contact author: escudero@phpnuke.org.br                                      */
/* International Support Forum: http://ravenphpscripts.com/forum76.html         */
/*                                                                              */
/* This program is free software. You can redistribute it and/or modify         */
/* it under the terms of the GNU General Public License as published by         */
/* the Free Software Foundation; either version 2 of the License.               */
/*                                                                              */
/*********************************************************************************/
/* CNB Your Account it the official successor of NSN Your Account by Bob Marion    */
/*********************************************************************************/

/********************************************************/
/* User Login Block for PHP-Nuke                        */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright (c) 2000-2004 by NukeScripts Network         */
/********************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
      Caching System                           v1.0.0       10/31/2005
-=[Mod]=-
      Advanced Username Color                  v1.0.5       06/11/2005
      Advanced Security Code Control           v1.0.0       12/17/2005
 ************************************************************************/

if(!defined('NUKE_EVO')) exit;

global $redirect, $mode, $f, $t, $sitekey, $nukeurl, $user, $cookie, $prefix, $user_prefix, $db, $anonymous, $userinfo, $evoconfig;

$content = '';

// User Login
if (is_user()) {
/*****[BEGIN]******************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
    //$memname = $cookie[1];
    $memname = UsernameColor($userinfo['username']);
/*****[END]********************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
    $content .= _BWEL.", <strong>$memname</strong>.<br />(<a href=\"modules.php?name=Your_Account&amp;op=logout\">"._BLOGOUT."</a>)\n";
    $content .= "<hr noshade size=\"1\" />\n";
    if(is_active('Private_Messages')) {
        list($uid) = $db->sql_fetchrow($db->sql_query("select user_id from $user_prefix"._users." where username='$memname'"));
        $newpms = $db->sql_numrows($db->sql_query("select privmsgs_to_userid from $prefix"._bbprivmsgs." where privmsgs_to_userid='$uid' and (privmsgs_type='1' OR privmsgs_type='5')"));
        $savpms = $db->sql_numrows($db->sql_query("select privmsgs_to_userid from $prefix"._bbprivmsgs." where privmsgs_to_userid='$uid' and privmsgs_type='3'"));
        $oldpms = $db->sql_numrows($db->sql_query("select privmsgs_to_userid from $prefix"._bbprivmsgs." where privmsgs_to_userid='$uid' and privmsgs_type='0'"));
        $totpms = $newpms + $oldpms + $savpms;
        $content .= "<a href=\"modules.php?name=Private_Messages\"><strong>"._BPM.":</strong></a><br />\n";
        $content .= "<big><strong>&middot;</strong></big> "._BUNREAD.": <strong>$newpms</strong><br />\n";
        $content .= "<big><strong>&middot;</strong></big> "._BREAD.": <strong>$oldpms</strong><br />\n";
        $content .= "<big><strong>&middot;</strong></big> "._BSAVED.": <strong>$savpms</strong><br />\n";
        $content .= "<big><strong>&middot;</strong></big> "._BTT.": <strong>$totpms</strong><br />\n";
        $content .= "<hr noshade size=\"1\">\n";
    }
} else {
    mt_srand ((double)microtime()*1000000);
    $maxran = 10 * intval($ya_config['codesize']);
    $random_num = mt_rand(0, $maxran);
    $content .= _BWEL.", <strong>$anonymous</strong><br />\n<br />\n";
    $content .= "<table border=0 cellpadding=0 cellspacing=0>\n";
    $content .= "<tr><td align=\"center\"><form action=\"modules.php?name=Your_Account\" method=\"post\">\n";
    $content .= _NICKNAME.": <input type=\"text\" name=\"username\" size=\"10\" maxlength=\"25\" /><br />\n";
    $content .= _PASSWORD.": <input type=\"password\" name=\"user_password\" size=\"10\" maxlength=\"20\" /><br />\n";
/*****[BEGIN]******************************************
 [ Mod:     Advanced Security Code Control     v1.0.0 ]
 ******************************************************/
    $gfxchk = array(2,4,5,7);
    $content .= security_code($gfxchk);
/*****[END]********************************************
 [ Mod:     Advanced Security Code Control     v1.0.0 ]
 ******************************************************/
   if(!empty($redirect)) {
       $content .= "<input type=\"hidden\" name=\"redirect\" value=\"$redirect\" />\n";
   }
   if(!empty($mode)) {
       $content .= "<input type=\"hidden\" name=\"mode\" value=\"$mode\" />\n";
   }
   if(!empty($f)) {
       $content .= "<input type=\"hidden\" name=\"f\" value=\"$f\" />\n";
   }
   if(!empty($t)) {
       $content .= "<input type=\"hidden\" name=\"t\" value=\"$t\" />\n";
   }
    $content .="<input type=\"hidden\" name=\"op\" value=\"login\" />\n";
    $content .= "<input type=\"submit\" value=\""._LOGIN."\" /> (<a href=\"modules.php?name=Your_Account&amp;op=new_user\">"._BREG."</a>)\n";
    $content .= "</form></td>\n";
    $content .= "</tr>\n";
    $content .= "</table>\n";
}

?>