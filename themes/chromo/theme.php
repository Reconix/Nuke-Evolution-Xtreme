<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/*****************************************************************************************/
/* chromo v.1.0   theme designed by effectica    www.effectica.com                       */
/*                                                                                       */
/*                                                                                       */
/* chromo v.1.0  is a free public theme package designed for PHP-Nuke Evolution          */
/* Copyright (c) 2005 by effectica All Rights Reserved                                     */
/*****************************************************************************************/
/* For more commercial and public themes, custom graphics and photoshop tutorials        */
/* visit www.effectica.com                                                               */
/*****************************************************************************************/
/* For support of this great CMS visit Nuke-Evolution http://www.nuke-evolution.com      */
/* For Nuke Evolution blocks, mods and addons, please visit http://Evo-Mods.com          */
/*****************************************************************************************/
/* PHP-Nuke Copyright (c) 2005 by Francisco Burzi http://phpnuke.org                     */
/*****************************************************************************************/


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
    global $bgcolor1, $bgcolor2, $theme_name;

    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
    echo "  <tr>\n";
    echo "    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
    echo "      <tr>\n";
    echo "        <td width=\"57\" height=\"47\"><img src=\"themes/".$theme_name."/images/new_01.gif\" alt=\"\" width=\"57\" height=\"47\" /></td>\n";
    echo "        <td style=\"background-image: url(themes/chromo/images/new_02_tile.gif)\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\" /></td>\n";
    echo "        <td width=\"57\" height=\"47\"><img src=\"themes/".$theme_name."/images/new_03.gif\" alt=\"\" width=\"57\" height=\"47\" /></td>\n";
    echo "      </tr>\n";
    echo "    </table>\n";
    echo "      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
    echo "        <tr>\n";
    echo "          <td width=\"10\" style=\"background-image: url(themes/chromo/images/new_04_bl.gif)\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\" /></td>\n";
    echo "          <td style=\"background-color: #E6E6E6;\">";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;

    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" align=\"center\"><tr><td class=\"extras\">\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\" ><tr><td>\n";
}

function CloseTable() {
    global $theme_name;
    echo "</td>\n";
    echo "          <td width=\"10\" style=\"background-image: url(themes/chromo/images/new_05_br.gif)\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\" /></td>\n";
    echo "        </tr>\n";
    echo "      </table>\n";
    echo "      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
    echo "        <tr>\n";
    echo "          <td width=\"57\" height=\"38\"><img src=\"themes/".$theme_name."/images/new_06.gif\" alt=\"\" width=\"57\" height=\"38\" /></td>\n";
    echo "          <td style=\"background-image: url(themes/chromo/images/new_07_tile.gif)\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\" /></td>\n";
    echo "          <td width=\"57\"><img src=\"themes/".$theme_name."/images/new_08.gif\" alt=\"\" width=\"57\" height=\"38\" /></td>\n";
    echo "        </tr>\n";
    echo "      </table>\n";
    echo "  </td>\n";
    echo "  </tr>\n";
    echo "</table>";

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
        $notes = "<br /><br /><strong>"._NOTE."</strong> <i>$notes</i>\n";
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
    global $user, $cookie, $prefix, $sitekey, $db, $name, $banners, $theme_name;

    echo "<body>\n";

    include_once(NUKE_THEMES_DIR.$theme_name."/header.php");

    echo "\n<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\">\n";
    echo "        <tr valign=\"top\">\n";
    echo "        <td style=\"width: 36px; background-image: url(themes/chromo/images/bord_l.gif)\" valign=\"top\"><img src=\"themes/".$theme_name."/images/spacer.gif\" width=\"36\" height=\"1\" border=\"0\" alt=\"\" /></td>\n";
    echo "        <td valign=\"top\">\n";

    if(blocks_visible('left')) {
        blocks('left');
        echo "    </td>\n";
        echo " <td style=\"width: 10px;\" valign =\"top\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"10\" height=\"1\" border=\"0\" /></td>\n";
        echo " <td width=\"100%\">\n";
    } else {
        echo "    </td>\n";
        echo " <td style=\"width: 1px;\" valign =\"top\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\" border=\"0\" /></td>\n";
        echo " <td width=\"100%\">\n";
    }
}

/************************************************************/
/* Function themefooter()                                   */
/************************************************************/
function themefooter() {
    global $index, $user, $cookie, $banners, $prefix, $db, $admin,  $adminmail, $nukeurl, $theme_name;

    // Banner in the middle of the site

    if (blocks_visible('right') && !defined('ADMIN_FILE')) {
        echo "</td>\n";
        echo "        <td style=\"width: 15px;\" valign=\"top\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"15\" height=\"1\" /></td>\n";
        echo "       <td style=\"width: 168px;\" valign=\"top\">\n";
        blocks('right');
    }
    echo "        </td>\n";
    echo "        <td style=\"width: 36px; background-image: url(themes/chromo/images/bord_r.gif)\" valign=\"top\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\"  width=\"36\" height=\"1\" /></td>\n";
    echo "        </tr>\n";
    echo "</table>\n\n\n";

    include_once(NUKE_THEMES_DIR.$theme_name."/footer.php");

}

/************************************************************/
/* Function themeindex()                                    */
/* This function format the stories on the Homepage         */
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
        $topic_img = "<td width=\"25%\" align=\"center\" class=\"extra\"><a href=\"modules.php?name=News&amp;new_topic=".$topic."\"><img src=\"".$t_image."\" border=\"0\" alt=\"$topictext\" /></a></td>";
    } else {
        $topic_img = "";
    }
    if (!empty($notes)) {
        $notes = "<br /><br /><strong>"._NOTE."</strong> $notes\n";
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
    $tmpl_file = NUKE_THEMES_DIR.$theme_name."/story_home.html";
    $thefile = implode("", file($tmpl_file));
    $thefile = addslashes($thefile);
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    print $r_file;
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
        $topic_img = "<td width=\"25%\" align=\"center\" class=\"extra\"><a href=\"modules.php?name=News&amp;new_topic=".$topic."\"><img src=\"".$t_image."\" border=\"0\" alt=\"$topictext\" /></a></td>";
    } else {
        $topic_img = "";
    }
    $posted = _POSTEDON." $datetime "._BY." ";
    $posted .= get_author($aid);
    if (!empty($notes)) {
        $notes = "<br /><br /><strong>"._NOTE."</strong> <i>$notes</i>\n";
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
    $tmpl_file = NUKE_THEMES_DIR.$theme_name."/story_page.html";
    $thefile = implode("", file($tmpl_file));
    $thefile = addslashes($thefile);
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    print $r_file;
}

function themecenterbox($title, $content) {
    OpenTable();
    echo '<center><span class="option"><strong>'.$title.'</strong></span></center><br />'.$content;
    CloseTable();
    echo '<br />';
}

function themepreview($title, $hometext, $bodytext='', $notes='') {
    echo '<strong>'.$title.'</strong><br /><br />'.$hometext;
    if (!empty($bodytext)) {
        echo '<br /><br />'.$bodytext;
    }
    if (!empty($notes)) {
        echo '<br /><br /><strong>'._NOTE.'</strong> <i>'.$notes.'</i>';
    }
}

/************************************************************/
/* Function themesidebox()                                  */
/************************************************************/
function themesidebox($title, $content, $bid=0) {
    global $theme_name;
    $tmpl_file = NUKE_THEMES_DIR.$theme_name."/blocks.html";
    $thefile = implode("", file($tmpl_file));
    $thefile = addslashes($thefile);
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}

?>