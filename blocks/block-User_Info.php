<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************/
/* Updated for PHP-Nuke 5.6 -  18 Jun 2002 NukeScripts                  */
/* website http://www.nukescripts.com                                   */
/*                                                                      */
/* Updated for PHP-Nuke 5.5 - 24/03/2002 Rugeri                         */
/* website http://newsportal.homip.net                                  */
/*                                                                      */
/* (C) 2002                                                             */
/* All rights beyond the GPL are reserved                               */
/*                                                                      */
/* Please give a link back to my site somewhere in your own             */
/************************************************************************/
/*         Additional security & Abstraction layer conversion           */
/*                           2003 chatserv                              */
/*      http://www.nukefixes.com -- http://www.nukeresources.com        */
/************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
      NukeSentinel                             v2.5.00      07/11/2006
      Caching System                           v1.0.0       10/31/2005
-=[Mod]=-
      Avatar Addon                             v1.0.0       07/02/2005
      Advanced Security Code Control           v1.0.0       12/17/2005
      Advanced Username Color                  v1.0.5       07/05/2005
      phpBB User Groups Integration            v1.0.0       08/26/2005
      IP Addon                                 v1.0.0       01/17/2006
 ************************************************************************/

if(!defined('NUKE_EVO')) exit;

global $prefix, $user_prefix, $db, $anonymous, $board_config, $userinfo;

/*****[BEGIN]******************************************
 [ Mod:    Avatar Addon                        v1.0.0 ]
 ******************************************************/
$useavatars = 1; //1 to Show Avatars - 0 is off
/*****[END]********************************************
 [ Mod:    Avatar Addon                        v1.0.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:    IP Addon                            v1.0.0 ]
 ******************************************************/
$showip = 0; //1 to Show your current IP address - 0 is off
/*****[END]********************************************
 [ Mod:    IP Addon                            v1.0.0 ]
 ******************************************************/

$content = '';

list($lastuser) = $db->sql_ufetchrow("SELECT username FROM ".$user_prefix."_users WHERE user_active = 1 AND user_level > 0 ORDER BY user_id DESC LIMIT 1", SQL_NUM);
list($numrows) = $db->sql_ufetchrow("SELECT COUNT(*) FROM ".$user_prefix."_users WHERE user_id > 1 AND user_level > 0", SQL_NUM);
$result = $db->sql_query("SELECT uname, guest FROM ".$prefix."_session WHERE guest='0' OR guest='2'");
$member_online_num = $db->sql_numrows($result);

$who_online_now = "";
$i = 1;
while ($session = $db->sql_fetchrow($result, SQL_ASSOC)) {
/*****[BEGIN]******************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
    $username2=UsernameColor($session['uname']);
    if (isset($session['guest']) and $session['guest'] == 0 && !empty($username2)) {
        if ($i < 10) {
            $who_online_now .= "0" .$i.".&nbsp;<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$session[uname]\">$username2</a><br />\n";
        } else {
            $who_online_now .= $i.".&nbsp;<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$session[uname]\">$username2</a><br />\n";
/*****[END]********************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
        }
        $who_online_now .= ($i != $member_online_num ? "  " : "");
        $i++;
    }
}
$db->sql_freeresult($result);

/*****[BEGIN]******************************************
 [ Mod:    IP Addon                            v1.0.0 ]
 ******************************************************/
if ($showip == 1) {
    $ip = identify::get_ip();
    $content .= "<br /><br /><center>"._YOURIP.": ".$ip."</center>";
}
/*****[END]********************************************
 [ Mod:    IP Addon                            v1.0.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:    Avatar Addon                        v1.0.0 ]
 ******************************************************/
if ($useavatars == 1) {
    //Avatars...
    if ($userinfo['user_allowavatar']) {
    //if ($userinfo['user_avatar_type'] == 1)  {
        $content .= "<br /><br /><center><img src=\"".$board_config['avatar_path']."/".$userinfo['user_avatar']."\" alt=\"\" /></center><br />\n";
    } elseif ($userinfo['user_avatar_type'] == 2) {
        $content .= "<br /><br /><center><img src=\"".$userinfo['user_avatar']."\" alt=\"\" /></center><br />\n";
    } elseif (empty($userinfo['user_avatar'])) {
        $content .= "<br /><br /><center><img src=\"".$board_config['avatar_gallery_path']."/gallery/blank.gif\" alt=\"\" /></center>\n";
    } else {
        $content .= "<br /><br /><center><img src=\"".$board_config['avatar_gallery_path']."/".$userinfo['user_avatar']."\" alt=\"\" /></center><br />\n";
    }
}
//}
/*****[END]********************************************
 [ Mod:    Avatar Addon                        v1.0.0 ]
 ******************************************************/

// Formatting date - Fix
$month = date('M');
$curDate2 = "%".$month[0].$month[1].$month[2]."%".date('d')."%".date('Y')."%";
$ty = time() - 86400;
$preday = strftime('%d', $ty);
$premonth = strftime('%B', $ty);
$preyear = strftime('%Y', $ty);
$curDateP = "%".$premonth[0].$premonth[1].$premonth[2]."%".$preday."%".$preyear."%";

//Select new today
//Select new yesterday
list($userCount) = $db->sql_ufetchrow("SELECT COUNT(*) FROM ".$user_prefix."_users WHERE user_regdate LIKE '$curDate2'", SQL_NUM);
list($userCount2) = $db->sql_ufetchrow("SELECT COUNT(*) FROM ".$user_prefix."_users WHERE user_regdate LIKE '$curDateP'", SQL_NUM);
//end

list($guest_online_num) = $db->sql_ufetchrow("SELECT COUNT(*) FROM ".$prefix."_session WHERE guest='1' OR guest='3'", SQL_NUM);
list($member_online_num) = $db->sql_ufetchrow("SELECT COUNT(*) FROM ".$prefix."_session WHERE guest='0' OR guest='2'", SQL_NUM);

$who_online_num = $guest_online_num + $member_online_num;
$who_online_num = intval($who_online_num);
$content .= "<form onsubmit=\"this.submit.disabled='true'\" action=\"modules.php?name=Your_Account\" method=\"post\">";

if (is_user()) {
/*****[BEGIN]******************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
    $uname = $userinfo['username'];
    $uname_color = UsernameColor($uname);
    $content .= "<br /><img src=\"images/blocks/group-4.gif\" height=\"14\" width=\"17\" alt=\"\" /> "._BWEL.", <strong>$uname_color</strong>.<br />\n<hr />\n";
/*****[END]********************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
    $uid = $userinfo['user_id'];
    list($newpms) = $db->sql_ufetchrow("SELECT COUNT(*) FROM ".$prefix."_bbprivmsgs WHERE privmsgs_to_userid='$uid' AND (privmsgs_type='5' OR privmsgs_type='1')");
    list($oldpms) = $db->sql_ufetchrow("SELECT COUNT(*) FROM ".$prefix."_bbprivmsgs WHERE privmsgs_to_userid='$uid' AND privmsgs_type='0'");
    $content .= "<img src=\"images/blocks/email-y.gif\" height=\"10\" width=\"14\" alt=\"\" /> <a href=\"modules.php?name=Private_Messages\"><strong>"._BPM."</strong></a><br />\n";
    $content .= "<img src=\"images/blocks/email-r.gif\" height=\"10\" width=\"14\" alt=\"\" /> "._BUNREAD.": <strong>".intval($newpms)."</strong><br />\n";
    $content .= "<img src=\"images/blocks/email-g.gif\" height=\"10\" width=\"14\" alt=\"\" /> "._BREAD.": <strong>".intval($oldpms)."</strong><br />\n<hr noshade='noshade' />\n";
/*****[BEGIN]******************************************
 [ Mod:    phpBB User Groups Integration       v1.0.0 ]
 ******************************************************/
    if (is_user()) {
        $content .= "<u><strong>"._GRMEMBERSHIPS.":</strong></u><br />\n";
        $result = $db->sql_query("SELECT group_name FROM ".$prefix."_bbgroups LEFT JOIN ".$prefix."_bbuser_group on ".$prefix."_bbuser_group.group_id=".$prefix."_bbgroups.group_id WHERE ".$prefix."_bbuser_group.user_id='$uid' and ".$prefix."_bbgroups.group_description != 'Personal User'");
        if ($db->sql_numrows($result) == 0) {
           $content .= "<img src=\"images/arrow.gif\" align=\"middle\" alt=\"\" /> "._GRNONE."<br />";
        } else {
           while(list($gname) = $db->sql_fetchrow($result, SQL_NUM)) {
              $gname = GroupColor($gname);
              $content .= "<img src=\"images/arrow.gif\" align=\"middle\" alt=\"\" /> $gname<br />";
           }
        }
        $db->sql_freeresult($result);
        $content .= "<hr noshade='noshade' />";
    }
/*****[END]********************************************
 [ Mod:    phpBB User Groups Integration       v1.0.0 ]
 ******************************************************/
} else {
    $content .= "<img src=\"images/blocks/group-4.gif\" height=\"14\" width=\"17\" alt=\"\" /> "._BWEL.", <strong>$anonymous</strong>\n<hr />";
    $content .= _NICKNAME." <input type=\"text\" name=\"username\" size=\"10\" maxlength=\"25\" /><br />";
    $content .= _PASSWORD." <input type=\"password\" name=\"user_password\" size=\"10\" maxlength=\"20\" /><br />";
/*****[BEGIN]******************************************
 [ Mod:     Advanced Security Code Control     v1.0.0 ]
 ******************************************************/
    $gfxchk = array(2,4,5,7);
    $content .= security_code($gfxchk, 'stacked');
/*****[END]********************************************
 [ Mod:     Advanced Security Code Control     v1.0.0 ]
 ******************************************************/
    $content .= "<input type=\"hidden\" name=\"op\" value=\"login\" />";
    $content .= "<input type=\"submit\" value=\""._LOGIN."\">\n (<a href=\"modules.php?name=Your_Account&amp;op=new_user\" />"._BREG."</a>)<hr />";
}
$content .= "<img src=\"images/blocks/group-2.gif\" height=\"14\" width=\"17\" alt=\"\" /> <strong><u>"._BMEMP.":</u></strong><br />\n";
$content .= "<img src=\"images/blocks/ur-moderator.gif\" height=\"14\" width=\"17\" alt=\"\" /> "._BLATEST.": <a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$lastuser\"><strong>$lastuser</strong></a><br />\n";
$content .= "<img src=\"images/blocks/ur-author.gif\" height=\"14\" width=\"17\" alt=\"\" /> "._BTD.": <strong>$userCount</strong><br />\n";
$content .= "<img src=\"images/blocks/ur-admin.gif\" height=\"14\" width=\"17\" alt=\"\" /> "._BYD.": <strong>$userCount2</strong><br />\n";
$content .= "<img src=\"images/blocks/ur-guest.gif\" height=\"14\" width=\"17\" alt=\"\" /> "._BOVER.": <strong>$numrows</strong><br />\n<hr />\n";
$content .= "<img src=\"images/blocks/group-3.gif\" height=\"14\" width=\"17\" alt=\"\" /> <strong><u>"._BVISIT.":</u></strong>\n<br />\n";
$content .= "<img src=\"images/blocks/ur-anony.gif\" height=\"14\" width=\"17\" alt=\"\" /> "._BVIS.": <strong>$guest_online_num</strong><br />\n";
$content .= "<img src=\"images/blocks/ur-member.gif\" height=\"14\" width=\"17\" alt=\"\" /> "._BMEM.": <strong>$member_online_num</strong><br />\n";
$content .= "<img src=\"images/blocks/ur-registered.gif\" height=\"14\" width=\"17\" alt=\"\" /> "._BTT.": <strong>$who_online_num</strong><br />\n";
$content .= "<hr noshade='noshade' />\n<img src=\"images/blocks/group-1.gif\" height=\"14\" width=\"17\" alt=\"\" /> <strong><u>"._BON.":</u></strong><br />$who_online_now";
$content .= "</form>";

?>