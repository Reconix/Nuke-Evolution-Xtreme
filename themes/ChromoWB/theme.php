<?php
/*************************************************************************************/
/* ChromoWB v.1.0                                                                    */
/* Designed By: Effectica - www.effectica.com                                        */
/*                                                                                   */
/* ChromoWB v.1.0 - Theme Designed for use with the Nuke-Evolution Software.         */
/* Copyright (c) 2005 - 2008 By Effectica All Rights Reserved                        */
/*                                                                                   */
/* ChromoWB Version Done By: The Mortal - www.realmdesignz.com                       */
/* Permission given by Effectica to do Chromo color version.                         */
/*************************************************************************************/
/* For more commercial and public themes, custom graphics and photoshop tutorials    */
/* visit www.effectica.com                                                           */
/*************************************************************************************/
/* PHP-Nuke Copyright (c) 2005 by Francisco Burzi http://phpnuke.org                 */
/*************************************************************************************/
/* Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System                         */
/*************************************************************************************/
/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       09/29/2005
      Theme Management                         v1.0.2       12/14/2005
 ************************************************************************/

if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    exit('Access Denied');
}

$theme_name = basename(dirname(__FILE__));
/*****[BEGIN]******************************************
 [ Base:    Theme Management                   v1.0.2 ]
 ******************************************************/
include_once(NUKE_THEMES_DIR.$theme_name.'/theme_info.php');
/*****[END]********************************************
 [ Base:    Theme Management                   v1.0.2 ]
 ******************************************************/

/************************************************************/
/* Theme Colors Definition                                  */
/************************************************************/
global $ThemeInfo;
$bgcolor1 = $ThemeInfo['bgcolor1'];
$bgcolor2 = $ThemeInfo['bgcolor2'];
$bgcolor3 = $ThemeInfo['bgcolor3'];
$bgcolor4 = $ThemeInfo['bgcolor4'];
$textcolor1 = $ThemeInfo['textcolor1'];
$textcolor2 = $ThemeInfo['textcolor2'];

/************************************************************/
/* OpenTable Functions                                      */
/************************************************************/
function OpenTable() {
    global $bgcolor1, $bgcolor2;

echo "<table align=\"center\" width=\"99%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "  <tr>\n";
echo "    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "      <tr>\n";
echo "        <td width=\"64\" height=\"54\"><img src=\"themes/ChromoWB/images/tables/tables_01.gif\" alt=\"\" width=\"64\" height=\"54\"></td>\n";
echo "        <td style=\"background-image: url(themes/ChromoWB/images/tables/tables_02.gif)\"><img src=\"themes/ChromoWB/images/tables/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"></td>\n";
echo "        <td width=\"30\" height=\"54\"><img src=\"themes/ChromoWB/images/tables/tables_03.gif\" alt=\"\" width=\"30\" height=\"54\"></td>\n";
echo "      </tr>\n";
echo "    </table>\n";
echo "      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "        <tr>\n";
echo "          <td width=\"28\" style=\"background-image: url(themes/ChromoWB/images/tables/tables_04.gif)\"><img src=\"themes/ChromoWB/images/tables/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"></td>\n";
echo "          <td style=\"background-color: #000000;\">\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;

    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" align=\"center\"><tr><td class=\"extras\">\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\"><tr><td>\n";
}

function CloseTable() {
    echo "</td>\n";
    echo "          <td width=\"28\" style=\"background-image: url(themes/ChromoWB/images/tables/tables_06.gif)\"><img src=\"themes/ChromoWB/images/tables/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"></td>\n";
    echo "        </tr>\n";
    echo "      </table>\n";
    echo "      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
    echo "        <tr>\n";
    echo "          <td width=\"32\" height=\"42\"><img src=\"themes/ChromoWB/images/tables/tables_07.gif\" alt=\"\" width=\"32\" height=\"42\"></td>\n";
    echo "          <td style=\"background-image: url(themes/ChromoWB/images/tables/tables_08.gif)\"><img src=\"themes/ChromoWB/images/tables/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"></td>\n";
    echo "          <td width=\"32\" height=\"42\"><img src=\"themes/ChromoWB/images/tables/tables_09.gif\" alt=\"\" width=\"32\" height=\"42\"></td>\n";
    echo "        </tr>\n";
    echo "      </table>\n";
    echo "  </td>\n";
    echo "  </tr>\n";
    echo "</table>\n";
}

function CloseTable2() {
    echo "</td></tr></table></td></tr></table>\n";
}

/************************************************************/
/* Function FormatStory()                                   */
/************************************************************/
function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous;
    if (!empty($notes)) {
        $notes = "<br><br><strong>"._NOTE."</strong> <i>$notes</i>\n";
    } else {
        $notes = "";
    }
    if ($aid == $informant) {
        echo "<span class=\"content\" color=\"#505050\">$thetext$notes</span>\n";
    } else {
        if(defined('WRITES')) {
            if(!empty($informant)) {
                if(is_array($informant)) {
                    $boxstuff = "<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$informant[0]\">$informant[1]</a> ";
                } else {
                    $boxstuff = "<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$informant\">$informant</a> ";
                }
            } else {
                $boxstuff = "$anonymous ";
            }
            $boxstuff .= ""._WRITES." <i>\"$thetext\"</i>$notes\n";
        } else {
            $boxstuff .= "$thetext$notes\n";
        }

        echo "<span class=\"content\" color=\"#505050\">$boxstuff</span>\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/************************************************************/
function themeheader() {
    global $user, $userinfo, $cookie, $prefix, $sitekey, $db, $name, $banners, $user_prefix, $ThemeInfo, $theme_name;

    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }	
$uid = $userinfo['user_id']; $username = $userinfo['username'];
$pms = $db->sql_numrows($db->sql_query("SELECT privmsgs_to_userid FROM ".$prefix."_bbprivmsgs WHERE privmsgs_to_userid='$uid' AND (privmsgs_type='5' OR privmsgs_type='1')"));

    if ($username == "") {
        $username = "Anonymous";
    }
    if ($username == "Anonymous") {
        $theuser = "<table style='width: 100%; border: 0px;' cellpadding='0' cellspacing='0'>
                      <tr>
                        <td style='width: 100%; height: 19px; padding-top:12px; color: #c3c3c3; font-size: 10px;' nowrap><strong>Welcome <font color='#cb0000'>Anonymous!</font></strong> </td>
                        <td style='height: 19px; padding-top:12px; color: #c3c3c3; font-size: 10px;' align='right' nowrap>Please <a href='modules.php?name=Your_Account' class='lowernav'><strong>Login</strong></a> or <a href='modules.php?name=Your_Account&#38;op=new_user' class='lowernav'><strong>Register</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                      </tr>
                    </table>";
    } else {
        if (is_admin($admin)) {
            $theuser = "<table style='width: 100%; border: 0px;' cellpadding='0' cellspacing='0'>
                          <tr>
                            <td style='width: 100%; height: 19px; padding-top:12px; color: #c3c3c3; font-size: 10px;' nowrap><strong>&nbsp;&nbsp;&nbsp;Welcome <font color='#cb0000'>$username</font></strong></td>
                            <td style='height: 19px; padding-right:1px; padding-top:12px; color: #c3c3c3; font-size: 10px;' align='right' nowrap>
                              <a href='modules.php?name=Private_Messages' class='lowernav'> <strong>Private Messages</strong> [ $pms ]&nbsp;<font color='white'><strong>&middot;</strong></font></a>
                              <a href='modules.php?name=Your_Account&#38;op=logout' class='lowernav'> <strong>Logout</strong>&nbsp;<font color='white'><strong>&middot;</strong></font></a>
                              <a href='admin.php' class='lowernav'> <strong>Admin</strong>&nbsp;&nbsp;</a> </td>
                          </tr>
                        </table>";
        } else {
            $theuser = "<table style='width: 100%; border: 0px;' cellpadding='0' cellspacing='0'>
                          <tr>
                            <td style='width: 100%; height: 19px; padding-top:12px; color: #c3c3c3; font-size: 10px;' nowrap><strong>&nbsp;&nbsp;&nbsp;Welcome <font color='#f1d293'>$username</font></strong></td>
                            <td style='height: 19px; padding-right:1px; padding-top:12px; color: #c3c3c3; font-size: 10px;' align='right' nowrap>
                              <a href='modules.php?name=Private_Messages' class='lowernav'> <strong>Private Messages</strong> [ $pms ]&nbsp;<font color='white'><strong>&middot;</strong></font></a>
                              <a href='modules.php?name=Your_Account&#38;op=logout' class='lowernav'> <strong>Logout</strong></a>&nbsp;&nbsp;</td>
                          </tr>
                        </table>";
        }
    }
    echo "<body>\n";

echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "  <tr>\n";
echo "    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "      <tr>\n";
echo "        <td width=\"72\" height=\"34\"><img src=\"themes/ChromoWB/images/hd/hdrtop_01.gif\" alt=\"\" width=\"72\" height=\"34\"></td>\n";
echo "        <td width=\"51\"><img src=\"themes/ChromoWB/images/hd/hdrtop_02.gif\" alt=\"\" width=\"51\" height=\"34\"></td>\n";
echo "        <td style=\"background-image: url(themes/ChromoWB/images/hd/hdrtop_03.gif)\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\">$theuser</td>\n";
echo "        <td width=\"123\" height=\"34\"><img src=\"themes/ChromoWB/images/hd/hdrtop_04.gif\" alt=\"\" width=\"123\" height=\"34\"></td>\n";
echo "      </tr>\n";
echo "    </table>\n";
echo "      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "        <tr>\n";
echo "          <td width=\"398\"><img src=\"themes/ChromoWB/images/hd/logo.jpg\" alt=\"\" width=\"398\" height=\"98\" /></td>\n";
$ads = ads(0);
if(empty($ads)) {
    echo "          <td style=\"background-image: url(themes/ChromoWB/images/hd/hdr_01_stretch.gif)\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"></td>\n";
} else {
    echo "          <td style=\"background-image: url(themes/ChromoWB/images/hd/hdr_01_stretch.gif)\">$ads</td>\n";
}
echo "          <td width=\"37\"><img src=\"themes/ChromoWB/images/hd/hdr_02.gif\" alt=\"\" width=\"37\" height=\"98\"></td>\n";
echo "          <td width=\"61\"><img src=\"themes/ChromoWB/images/hd/hdr_03.jpg\" alt=\"\" width=\"61\" height=\"98\"></td>\n";
echo "        </tr>\n";
echo "      </table>\n";
echo "      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "        <tr>\n";
echo "          <td width=\"72\" height=\"34\"><img src=\"themes/ChromoWB/images/hd/hdr_11.gif\" alt=\"\" width=\"72\" height=\"34\"></td>\n";
echo "          <td style=\"background-image: url(themes/ChromoWB/images/hd/hdr_12_stretch.gif)\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"></td>\n";
echo "          <td width=\"72\"><img src=\"themes/ChromoWB/images/hd/hdr_13.gif\" alt=\"\" width=\"72\" height=\"34\"></td>\n";
echo "        </tr>\n";
echo "      </table>\n";
echo "      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "        <tr>\n";
echo "          <td width=\"91\" height=\"46\"><img src=\"themes/ChromoWB/images/hd/hdrnav_01.jpg\" alt=\"\" width=\"91\" height=\"46\"></td>\n";
echo "          <td style=\"background-image: url(themes/ChromoWB/images/hd/hdrnav_stretch.jpg)\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"></td>\n";
echo "          <td width=\"478\">\n";
echo "          <object type=\"application/x-shockwave-flash\" data=\"themes/ChromoWB/images/FLASH/menu-nav.swf?link1=" . urlencode($ThemeInfo['link1']) . "&amp;link1text=" . urlencode($ThemeInfo['link1text']) . "&amp;link2=" . urlencode($ThemeInfo['link2']) . "&amp;link2text=" . urlencode($ThemeInfo['link2text']) . "&amp;link3=" . urlencode($ThemeInfo['link3']) . "&amp;link3text=" . urlencode($ThemeInfo['link3text']) . "&amp;link4=" . urlencode($ThemeInfo['link4']) . "&amp;link4text=" . urlencode($ThemeInfo['link4text']) . "\" width=\"478\" height=\"46\">\n";
echo "            <param name=\"movie\" value=\"themes/ChromoWB/images/FLASH/menu-nav.swf?link1=" . urlencode($ThemeInfo['link1']) . "&amp;link1text=" . urlencode($ThemeInfo['link1text']) . "&amp;link2=" . urlencode($ThemeInfo['link2']) . "&amp;link2text=" . urlencode($ThemeInfo['link2text']) . "&amp;link3=" . urlencode($ThemeInfo['link3']) . "&amp;link3text=" . urlencode($ThemeInfo['link3text']) . "&amp;link4=" . urlencode($ThemeInfo['link4']) . "&amp;link4text=" . urlencode($ThemeInfo['link4text']) . "\">\n";
echo "            </object>\n";
echo "          </td>\n";
echo "          <td style=\"background-image: url(themes/ChromoWB/images/hd/hdrnav_stretch.jpg)\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"></td>\n";
echo "          <td width=\"91\"><img src=\"themes/ChromoWB/images/hd/hdrnav_02.jpg\" width=\"91\" height=\"46\" alt=\"\"></td>\n";
echo "        </tr>\n";
echo "      </table>\n";
echo "  </td>\n";
echo "  </tr>\n";
echo "</table>\n";

    echo "\n<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\">\n";
    echo "        <tr valign=\"top\">\n";
    echo "        <td style=\"width: 36px; background-image: url(themes/ChromoWB/images/leftside.gif)\" valign=\"top\"><img src=\"themes/".$theme_name."/images/spacer.gif\" width=\"36\" height=\"1\" border=\"0\" alt=\"\"></td>\n";
    echo "        <td valign=\"top\">\n";

    if(blocks_visible('left')) {
        blocks('left');
        echo "    </td>\n";
        echo " <td style=\"width: 10px;\" valign =\"top\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"10\" height=\"1\" border=\"0\"></td>\n";
        echo " <td width=\"100%\">\n";
    } else {
        echo "    </td>\n";
        echo " <td style=\"width: 1px;\" valign =\"top\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\" border=\"0\"></td>\n";
        echo " <td width=\"100%\">\n";
    }
}

/************************************************************/
/* Function themefooter()                                   */
/************************************************************/
function themefooter() {
    global $index, $userinfo, $cookie, $banners, $db, $admin, $adminmail, $nukeurl, $theme_name;

    // Banner in the middle of the site

    if (blocks_visible('right') && !defined('ADMIN_FILE')) {
        echo "</td>\n";
        echo "        <td style=\"width: 15px;\" valign=\"top\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"15\" height=\"1\"></td>\n";
        echo "       <td style=\"width: 168px;\" valign=\"top\">\n";
        blocks('right');
    }
    echo "        </td>\n";
    echo "        <td style=\"width: 36px; background-image: url(themes/ChromoWB/images/rightside.gif)\" valign=\"top\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\"  width=\"36\" height=\"1\"></td>\n";
    echo "        </tr>\n";
    echo "</table>\n\n\n";

echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "  <tr>\n";
echo "		<td>\n";
echo "			<img src=\"themes/ChromoWB/images/ft/footertop_01.gif\" width=\"63\" height=\"15\" alt=\"\"></td>\n";
echo "		<td style=\"width: 100%; background-image: url(themes/ChromoWB/images/ft/footertop_stretch.gif)\"></td>\n";
echo "		<td>\n";
echo "			<img src=\"themes/ChromoWB/images/ft/footertop_03.gif\" width=\"59\" height=\"15\" alt=\"\"></td>\n";
echo "      </tr>\n";
echo "    </table>\n";
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "  <tr>\n";
echo "		<td>\n";
echo "			<img src=\"themes/ChromoWB/images/ft/footer_01.gif\" width=\"60\" height=\"48\" alt=\"\"></td>\n";
/*********************************************/
/* COPYRIGHTS: DO NOT REMOVE, EDIT OR MODIFY */
/*********************************************/
echo "		<td style=\"width: 100%; background-image: url(themes/ChromoWB/images/ft/footer_stretch.gif)\" height=\"48\">\n";
echo "<center><font color=\"#e2e2e2\" class=\"ftrt\"><strong>PHP-Nuke Copyright &copy; 2006 By: Francisco Burzi.<br>
ChromoWB Color Version By: The Mortal @ <a href=\"http://www.realmdesignz.com\" target=\"_blank\">Realm Designz</a><br><a href=\"http://www.evolution-xtreme.com\" title=\"Xtreme 2.0 Edition\">Xtreme 2.0 Edition</a></strong></font></center></td>\n";
echo "		<td>\n";
echo "			<img src=\"themes/ChromoWB/images/ft/footer_03.gif\" width=\"60\" height=\"48\" alt=\"\"></td>\n";
echo "    </tr>\n";
echo "</table>\n";
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "  <tr>\n";
echo "		<td>\n";
echo "			<a href=\"http://www.nuke-evolution.com\" target=\"_blank\"><img src=\"themes/ChromoWB/images/ft/footerbtm_01.gif\" width=\"252\" height=\"25\" border=\"0\" alt=\"Powered By: Nuke Evolution\" title=\"Nuke-Evolution Site Engine\"></a></td>\n";
echo "		<td style=\"width: 100%; background-image: url(themes/ChromoWB/images/ft/footerbtm_stretch.gif)\" height=\"25\"></td>\n";
echo "		<td>\n";
echo "			<a href=\"http://effectica.com\" target=\"_blank\"><img src=\"themes/ChromoWB/images/ft/footerbtm_03.gif\" width=\"230\" height=\"25\" border=\"0\" alt=\"Chromo Theme Version By: Effectica\" title=\"Chromo Theme Version By: Effectica\"></a></td>\n";
echo "    </tr>\n";
echo "</table>\n";
}

/************************************************************/
/* Function themeindex()                                    */
/************************************************************/
function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath, $theme_name, $sid;

    $ThemeSel = get_theme();
    if(!empty($topicimage)) {
        if (file_exists("themes/$ThemeSel/images/topics/$topicimage")) {
            $t_image = "themes/$ThemeSel/images/topics/$topicimage";
        } else {
            $t_image = "$tipath$topicimage";
        }
        $topic_img = "<td width=\"25%\" align=\"center\" class=\"extra\"><a href=\"modules.php?name=News&amp;new_topic=".$topic."\"><img src=\"".$t_image."\" border=\"0\" alt=\"$topictext\" title=\"$topictext\"></a></td>";
    } else {
        $topic_img = "";
    }
    if (!empty($notes)) {
        $notes = "<br><br><strong>"._NOTE."</strong> $notes\n";
    } else {
        $notes = "";
    }
    $content = '';
    if ($aid == $informant) {
        $content = "$thetext$notes\n";
    } else {
        if(defined('WRITES')) {
            if(!empty($informant)) {
                if(is_array($informant)) {
                    $content = "<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$informant[0]\">$informant[1]</a> ";
                } else {
                    $content = "<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$informant\">$informant</a> ";
                }
            } else {
                $content = "$anonymous ";
            }
            $content .= _WRITES." \"$thetext\"$notes\n";
        } else {
            $content .= "$thetext$notes\n";
        }
    }
    $posted = _POSTEDBY." ";
    $posted .= get_author($aid);
    $posted .= " "._ON." $time  ";
    $datetime = substr($morelink, 0, strpos($morelink, "|") - strlen($morelink));
    $morelink = substr($morelink, strlen($datetime) + 2);
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "  <tr>\n";
echo "  <td><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n";
echo "  <tr>\n";
echo "  <td width=\"64\"><img src=\"themes/ChromoWB/images/news/news_01.gif\" width=\"64\" height=\"54\" alt=\"\"></td>\n";
echo "  <td height=\"54\" style=\"background-image: url(themes/ChromoWB/images/news/news_02.gif)\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "  <tr>\n";
echo "  <td align=\"center\"><font class=\"storytitle\"><a href=\"modules.php?name=News&amp;new_topic=".$topic."\" alt=\"$topictext\" title=\"$topictext\"><strong><font color=\"black\">".$topictext."</font></strong></a> : &nbsp;&nbsp;<strong>".$title."</strong></font></td>\n";
echo "  </tr>\n";
echo "</table></td>\n";
echo "  <td width=\"30\"><img src=\"themes/ChromoWB/images/news/news_03.gif\" width=\"30\" height=\"54\" alt=\"\"></td>\n";
echo "  </tr>\n";
echo "</table>\n";
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "  <tr>\n";
echo "  <td style=\"width: 28px; background-image: url(themes/ChromoWB/images/news/news_04.gif)\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"></td>\n";
echo "  <td bgcolor=\"#000000\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">\n";
echo " <tr>\n";
echo "      ".$topic_img."\n";
echo "	<td width=\"75%\" class=\"content\" valign=\"top\">".$content."<br></td>\n";
echo "  </tr>\n";
echo "</table></td>\n";
echo "  <td style=\"width: 28px; background-image: url(themes/ChromoWB/images/news/news_06.gif)\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\" /></td>\n";
echo "  </tr>\n";
echo "</table>\n";
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "  <tr>\n";
echo "  <td width=\"32\"><img src=\"themes/ChromoWB/images/news/news_07.gif\" width=\"32\" height=\"76\" alt=\"\"></td>\n";
echo "  <td height=\"76\" style=\"width: 100%; background-image: url(themes/ChromoWB/images/news/news_08.gif)\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\" /><hr><div style=\"padding-bottom:4px;\" align=\"right\">".$posted."<br>".$datetime." ".$topictext." | ".$morelink."</div></td>\n";
echo "  <td width=\"32\"><img src=\"themes/ChromoWB/images/news/news_09.gif\" width=\"32\" height=\"76\" alt=\"\"></td>\n";
echo "  </tr>\n";
echo "</table>\n";
echo "  </td>\n";
echo "  </tr>\n";
echo "</table><br>\n";
}

/************************************************************/
/* Function themearticle()                                  */
/************************************************************/
function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath, $theme_name;

    $ThemeSel = get_theme();
    if(!empty($topicimage)) {
        if (file_exists("themes/$ThemeSel/images/topics/$topicimage")) {
            $t_image = "themes/$ThemeSel/images/topics/$topicimage";
        } else {
            $t_image = "$tipath$topicimage";
        }
        $topic_img = "<td width=\"25%\" align=\"center\" class=\"extra\"><a href=\"modules.php?name=News&amp;new_topic=".$topic."\"><img src=\"".$t_image."\" border=\"0\" alt=\"$topictext\" title=\"$topictext\"></a></td>";
    } else {
        $topic_img = "";
    }
    $posted = _POSTEDON." $datetime "._BY." ";
    $posted .= get_author($aid);
    if (!empty($notes)) {
        $notes = "<br><br><strong>"._NOTE."</strong> <i>$notes</i>\n";
    } else {
        $notes = "";
    }
    $content = '';
    if ($aid == $informant) {
        $content = "$thetext$notes\n";
    } else {
        if(defined('WRITES')) {
            if(!empty($informant)) {
                if(is_array($informant)) {
                    $content = "<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$informant[0]\">$informant[1]</a> ";
                } else {
                    $content = "<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$informant\">$informant</a> ";
                }
            } else {
                $content = "$anonymous ";
            }
            $content .= ""._WRITES." <i>\"$thetext\"</i>$notes\n";
        } else {
            $content .= "$thetext$notes\n";
        }
    }
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "  <tr>\n";
echo "  <td><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n";
echo "  <tr>\n";
echo "  <td width=\"64\"><img src=\"themes/ChromoWB/images/news/news_01.gif\" width=\"64\" height=\"54\" alt=\"\"></td>\n";
echo "  <td height=\"54\" style=\"background-image: url(themes/ChromoWB/images/news/news_02.gif)\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "  <tr>\n";
echo "  <td align=\"center\"><font class=\"storytitle\"><a href=\"modules.php?name=News&amp;new_topic=".$topic."\" alt=\"$topictext\" title=\"$topictext\"><strong><font color=\"black\">".$topictext."</font></strong></a> : &nbsp;&nbsp;<strong>".$title."</strong></font></td>\n";
echo "  </tr>\n";
echo "</table></td>\n";
echo "  <td width=\"30\"><img src=\"themes/ChromoWB/images/news/news_03.gif\" width=\"30\" height=\"54\" alt=\"\"></td>\n";
echo "  </tr>\n";
echo "</table>\n";
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "  <tr>\n";
echo "  <td style=\"width: 28px; background-image: url(themes/ChromoWB/images/news/news_04.gif)\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"></td>\n";
echo "  <td bgcolor=\"#000000\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">\n";
echo " <tr>\n";
echo "      ".$topic_img."\n";
echo "	<td width=\"75%\" class=\"content\" valign=\"top\">".$content."<br></td>\n";
echo "  </tr>\n";
echo "</table></td>\n";
echo "  <td style=\"width: 28px; background-image: url(themes/ChromoWB/images/news/news_06.gif)\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"></td>\n";
echo "  </tr>\n";
echo "</table>\n";
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "  <tr>\n";
echo "  <td width=\"32\"><img src=\"themes/ChromoWB/images/news/news_07.gif\" width=\"32\" height=\"76\" alt=\"\"></td>\n";
echo "  <td height=\"76\" style=\"width: 100%; background-image: url(themes/ChromoWB/images/news/news_08.gif)\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"><hr><div style=\"padding-bottom:4px;\" align=\"right\">".$posted."</div></td>\n";
echo "  <td width=\"32\"><img src=\"themes/ChromoWB/images/news/news_09.gif\" width=\"32\" height=\"76\" alt=\"\"></td>\n";
echo "  </tr>\n";
echo "</table>\n";
echo "  </td>\n";
echo "  </tr>\n";
echo "</table><br>\n";
}

function themecenterbox($title, $content) {
    OpenTable();
    echo '<center><span class="option"><strong>'.$title.'</strong></span></center><br>'.$content;
    CloseTable();
    echo '<br>';
}

function themepreview($title, $hometext, $bodytext='', $notes='') {
    echo '<strong>'.$title.'</strong><br><br>'.$hometext;
    if (!empty($bodytext)) {
        echo '<br><br>'.$bodytext;
    }
    if (!empty($notes)) {
        echo '<br><br><strong>'._NOTE.'</strong>&nbsp;<i>'.$notes.'</i>';
    }
}

/************************************************************/
/* Function themesidebox()                                  */
/************************************************************/
function themesidebox($title, $content, $bid=0) {
    global $theme_name;

echo "<table width=\"188\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "	<tr>\n";
echo "    <td><table width=\"188\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "  <tr>\n";
echo "    <td bgcolor=\"#000000\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "        <tr>\n";
echo "          <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "              <tr>\n";
echo "                <td width=\"188\" align=\"center\" height=\"56\" style=\"background-image: url(themes/ChromoWB/images/blocks/blocks_01.gif)\"><div style=\"padding-bottom:1px;\" align=\"center\"><font class=\"blocktitle\">".$title."</font></div></td>\n";
echo "              </tr>\n";
echo "              <tr>\n";
echo "                <td style=\"background-image: url(themes/ChromoWB/images/blocks/blocks_02.gif)\"><table width=\"72%\" align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "                    <tr>\n";
echo "                      <td>".$content."</td>\n";
echo "                    </tr>\n";
echo "                  </table></td>\n";
echo "              </tr>\n";
echo "              <tr>\n";
echo "                <td height=\"41\" width=\"188\"><img src=\"themes/ChromoWB/images/blocks/blocks_03.gif\" border=\"0\" alt=\"\"></td>\n";
echo "              </tr>\n";
echo "            </table></td>\n";
echo "        </tr>\n";
echo "      </table></td>\n";
echo "  </tr>\n";
echo "</table>\n";
echo "</td>\n";
echo "  </tr>\n";
echo "</table><br>\n";
}
?>