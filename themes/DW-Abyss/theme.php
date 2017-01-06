<?php
/**************************************************************************/
/* DW-Abyss Theme                                                         */
/* Designed By: DesignWicked                                              */
/* Xtreme 2.0 Conversion By: The Mortal @ www.realmdesignz.com            */
/* Converted On: 5 Aug, 2009                                              */
/**************************************************************************/
/* Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System              */
/**************************************************************************/
/* PHP-Nuke Copyright (c) 2005 by Francisco Burzi http://phpnuke.org      */
/**************************************************************************/
/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       09/29/2005
      Theme Management                         v1.0.2       12/14/2005
 ************************************************************************/
if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    exit('Access Denied');
}
$theme_name = basename(dirname(__FILE__));

/************************************************************/
/* Theme Management Section                                 */
/************************************************************/
include_once(NUKE_THEMES_DIR.$theme_name.'/theme_info.php');

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

    echo "<table align=\"center\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
    echo "  <tr>\n";
    echo "    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
    echo "      <tr>\n";
    echo "        <td width=\"44\" height=\"38\"><img src=\"themes/DW-Abyss/images/TBL/table_19.jpg\" alt=\"\" width=\"44\" height=\"38\"></td>\n";
    echo "        <td style=\"background-image: url(themes/DW-Abyss/images/TBL/table_20.jpg)\"><img src=\"themes/DW-Abyss/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"></td>\n";
    echo "        <td width=\"43\" height=\"38\"><img src=\"themes/DW-Abyss/images/TBL/table_21.jpg\" alt=\"\" width=\"43\" height=\"38\"></td>\n";
    echo "      </tr>\n";
    echo "    </table>\n";
    echo "      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
    echo "        <tr>\n";
    echo "          <td width=\"44\" style=\"background-image: url(themes/DW-Abyss/images/TBL/table_24.jpg)\"><img src=\"themes/DW-Abyss/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"></td>\n";
    echo "          <td style=\"background-color: #3e3e3e;\">\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;

    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" align=\"center\"><tr><td class=\"extras\">\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\"><tr><td>\n";
}

function CloseTable() {
    echo "</td>\n";
    echo "          <td width=\"43\" style=\"background-image: url(themes/DW-Abyss/images/TBL/table_26.jpg)\"><img src=\"themes/DW-Abyss/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"></td>\n";
    echo "        </tr>\n";
    echo "      </table>\n";
    echo "      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
    echo "        <tr>\n";
    echo "          <td width=\"44\" height=\"39\"><img src=\"themes/DW-Abyss/images/TBL/table_34.jpg\" alt=\"\" width=\"44\" height=\"39\"></td>\n";
    echo "          <td style=\"background-image: url(themes/DW-Abyss/images/TBL/table_35.jpg)\"><img src=\"themes/DW-Abyss/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\"></td>\n";
    echo "          <td width=\"43\" height=\"39\"><img src=\"themes/DW-Abyss/images/TBL/table_36.jpg\" alt=\"\" width=\"43\" height=\"39\"></td>\n";
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
    global $user, $cookie, $prefix, $sitekey, $db, $user_prefix, $userinfo, $name, $banners, $theme_name, $ThemeInfo;

    echo "<body>\n";

include_once(NUKE_THEMES_DIR.$theme_name."/header.php");

    echo "\n<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\">\n";
    echo "        <tr valign=\"top\">\n";
    echo "        <td style=\"width: 39px; background-image: url(themes/DW-Abyss/images/sbl.jpg)\" valign=\"top\"><img src=\"themes/".$theme_name."/images/spacer.gif\" width=\"39\" height=\"8\" border=\"0\" alt=\"\"></td>\n";
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
    global $index, $user, $banners, $cookie, $prefix, $db, $admin, $adminmail, $nukeurl, $foot1, $foot2, $foot3, $foot4, $ip, $theme_name, $ThemeInfo;

/*****************************************/
/* Number of downloads to display in Box */
/*****************************************/
$maxshow = 18;
$a = 1;
$sql = "SELECT lid, title, hits FROM ".$prefix."_downloads_downloads ORDER BY hits DESC LIMIT 0,$maxshow";
$result = $db->sql_query($sql);
while ($row = $db->sql_fetchrow($result)) {
$title2 = str_replace("_", " ", $row[title]);
	$show2 .= " &nbsp;$a: <a href=\"modules.php?name=Downloads&amp;d_op=viewdownloaddetails&amp;lid=$row[lid]&amp;title=$row[title]\">$title2</a>&nbsp;<br>";
	$showdownloads = " <A name= \"scrollingCodedownloads\"></A><MARQUEE behavior= \"scroll\" align= \"left\" direction= \"up\" width=\"153\" height=\"37\" scrollamount= \"1\" scrolldelay= \"30\" onmouseover='this.stop()' onmouseout='this.start()'>$show2";
    $a++;
}
$db->sql_freeresult($result);

/*****************************************/
/* Number of Web Links to display in Box */
/*****************************************/
$maxshow = 18;
$a = 1;
$result = $db->sql_query("select lid, title, hits from ".$prefix."_links_links order by date DESC limit 0,$maxshow");
while(list($lid, $title, $hits) = $db->sql_fetchrow($result)) {
$title2 = str_replace("_", " ", "$title");
	$show .= "&nbsp;$a: <a href=\"modules.php?name=Web_Links&amp;l_op=visit&amp;lid=$lid\">$title2</a>&nbsp;&nbsp;<strong><font color=\"#606060\">$hits</strong>Times</font><br>";
	$showlinks = "<A name= \"scrollingCode\"></A><MARQUEE behavior= \"scroll\" align= \"left\" direction= \"up\" width=\"153\" height=\"37\" scrollamount= \"1\" scrolldelay= \"30\" onmouseover='this.stop()' onmouseout='this.start()'>$show";

    $a++;
}
$db->sql_freeresult($result);

    if (blocks_visible('right') && !defined('ADMIN_FILE')) {
        echo "</td>\n";
        echo "        <td style=\"width: 10px;\" valign=\"top\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\" width=\"10\" height=\"1\"></td>\n";
        echo "       <td style=\"width: 200px;\" valign=\"top\">\n";
        blocks('right');
    }
    echo "        </td>\n";
    echo "        <td style=\"width: 41px; background-image: url(themes/DW-Abyss/images/sbr.jpg)\" valign=\"top\"><img src=\"themes/".$theme_name."/images/spacer.gif\" alt=\"\"  width=\"41\" height=\"8\"></td>\n";
    echo "        </tr>\n";
    echo "</table>\n\n\n";

$footer_message = "$foot1<br>$foot2<br>$foot3<br>$copyright";

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
echo "<table width='100%' border='0' cellpadding='0' cellspacing='0'>
	<tr>
		<td rowspan='5'>
			<img src='themes/DW-Abyss/images/ST/story_22.jpg' width='35' height='67' alt=''></td>
            <td width='100%' height='30' valign='bottom' background='themes/DW-Abyss/images/ST/story_23.jpg'><div align='left'><span class='title'>$title</span></div></td>
		<td rowspan='5'>
			<img src='themes/DW-Abyss/images/ST/story_24.jpg' width='32' height='67' alt=''></td>
	</tr>
	<tr>
		<td background='themes/DW-Abyss/images/ST/story_26.jpg' width='100%' height='37' alt=''></td>
	</tr></table>
<table width='100%' border='0' cellpadding='0' cellspacing='0'>
	<tr>
		<td background='themes/DW-Abyss/images/ST/story_33.jpg' width='35' height='100%' alt=''></td>
		<td background='themes/DW-Abyss/images/ST/story_34.jpg'><table border='0' cellpadding='3' cellspacing='0' width='100%'>
        <tbody>
          <tr>
             <td align='center' width='25%'> <span class='block_content'><font face='verdana,arial,helvetica' size='1'><a href='modules.php?name=News&amp;new_topic=$topic'><img src='$t_image' border='0' alt='$topictext'></a><br>
                <a href='modules.php?name=News&amp;new_topic=$topic'><strong>$topictext</strong></a> </font></span></td>
             <td width='75%' align='left' valign='top' class='blocks_content'><font face='verdana,arial,helvetica' size='1'><span class='content'>$content</span></font> </td>
          </tr>
        </tbody>
              </table></td>
		<td background='themes/DW-Abyss/images/ST/story_35.jpg' width='32' height='100%' alt=''></td>
	</tr>
	<tr>
		<td><img src='themes/DW-Abyss/images/ST/story_42.jpg' width='35' height='25' alt=''></td>
		<td background='themes/DW-Abyss/images/ST/st1.jpg' width='100%' height='25' alt=''></td>
		<td><img src='themes/DW-Abyss/images/ST/story_44.jpg' width='32' height='25' alt=''></td>
	</tr>
	<tr>
		<td><img src='themes/DW-Abyss/images/ST/story_49.jpg' width='35' height='26' alt=''></td>
		<td background='themes/DW-Abyss/images/ST/st2.jpg' width='100%' height='26'><div align='left'><font face='verdana,arial,helvetica' size='1'><span class='content'>$posted<br> $datetime | $morelink</span></font></div>
		<td><img src='themes/DW-Abyss/images/ST/story_51.jpg' width='32' height='26' alt=''></td>
	</tr>
	<tr>
		<td><img src='themes/DW-Abyss/images/ST/story_53.jpg' width='35' height='20' alt=''></td>
		<td background='themes/DW-Abyss/images/ST/st3.jpg' width='100%' height='20' alt=''></td>
		<td><img src='themes/DW-Abyss/images/ST/story_55.jpg' width='32' height='20' alt=''></td>
	</tr>
</table>";
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
echo "<table width='100%' border='0' cellpadding='0' cellspacing='0'>
	<tr>
		<td rowspan='5'>
			<img src='themes/DW-Abyss/images/ST/story_22.jpg' width='35' height='67' alt=''></td>
            <td width='100%' height='30' valign='bottom' background='themes/DW-Abyss/images/ST/story_23.jpg'><div align='left'><span class='title'>$title</span></div></td>
		<td rowspan='5'>
			<img src='themes/DW-Abyss/images/ST/story_24.jpg' width='32' height='67' alt=''></td>
	</tr>
	<tr>
		<td background='themes/DW-Abyss/images/ST/story_26.jpg' width='100%' height='37' alt=''></td>
	</tr></table>
<table width='100%' border='0' cellpadding='0' cellspacing='0'>
	<tr>
		<td background='themes/DW-Abyss/images/ST/story_33.jpg' width='35' height='100%' alt=''></td>
		<td background='themes/DW-Abyss/images/ST/story_34.jpg'><table border='0' cellpadding='3' cellspacing='0' width='100%'>
        <tbody>
          <tr>
             <td align='center' width='25%'> <span class='block_content'><font face='verdana,arial,helvetica' size='1'><a href='modules.php?name=News&amp;new_topic=$topic'><img src='$t_image' border='0' alt='$topictext'></a><br>
                <a href='modules.php?name=News&amp;new_topic=$topic'><strong>$topictext</strong></a> </font></span></td>
             <td width='75%' align='left' valign='top' class='blocks_content'><font face='verdana,arial,helvetica' size='1'><span class='content'>$content</span></font> </td>
          </tr>
        </tbody>
              </table></td>
		<td background='themes/DW-Abyss/images/ST/story_35.jpg' width='32' height='100%' alt=''></td>
	</tr>
	<tr>
		<td><img src='themes/DW-Abyss/images/ST/story_42.jpg' width='35' height='25' alt=''></td>
		<td background='themes/DW-Abyss/images/ST/st1.jpg' width='100%' height='25' alt=''></td>
		<td><img src='themes/DW-Abyss/images/ST/story_44.jpg' width='32' height='25' alt=''></td>
	</tr>
	<tr>
		<td><img src='themes/DW-Abyss/images/ST/story_49.jpg' width='35' height='26' alt=''></td>
		<td background='themes/DW-Abyss/images/ST/st2.jpg' width='100%' height='26'><div align='left'><font face='verdana,arial,helvetica' size='1'><span class='content'>$posted </span></font></div>
		<td><img src='themes/DW-Abyss/images/ST/story_51.jpg' width='32' height='26' alt=''></td>
	</tr>
	<tr>
		<td><img src='themes/DW-Abyss/images/ST/story_53.jpg' width='35' height='20' alt=''></td>
		<td background='themes/DW-Abyss/images/ST/st3.jpg' width='100%' height='20' alt=''></td>
		<td><img src='themes/DW-Abyss/images/ST/story_55.jpg' width='32' height='20' alt=''></td>
	</tr>
</table>";
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
        echo '<br><br><strong>'._NOTE.'</strong> <i>'.$notes.'</i>';
    }
}

/************************************************************/
/* Function themesidebox()                                  */
/************************************************************/
function themesidebox($title, $content, $bid=0) {
echo "<table width='200' border='0' cellspacing='0' cellpadding='0'>
  <tr>
  <td>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='46'><img src='themes/DW-Abyss/images/BLK/blk_01.jpg' width='46' height='39'></td>
    <td valign='top' class='blk' style='background-image:url(themes/DW-Abyss/images/BLK/blk_02.jpg)'><div align='center'>$title</div></td>
    <td width='45'><img src='themes/DW-Abyss/images/BLK/blk_04.jpg' width='45' height='39'></td>
  </tr>
</table>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='72'><img src='themes/DW-Abyss/images/BLK/blk_05.jpg' width='72' height='40'></td>
    <td style='background-image:url(themes/DW-Abyss/images/BLK/blk_06.gif)'><img src='themes/DW-Abyss/images/BLK/blk_06.gif' width='1' height='40'></td>
    <td width='45'><img src='themes/DW-Abyss/images/BLK/blk_07.jpg' width='45' height='40'></td>
    <td style='background-image:url(themes/DW-Abyss/images/BLK/blk_08.gif)'><img src='themes/DW-Abyss/images/BLK/blk_08.gif' width='1' height='40'></td>
    <td width='72'><img src='themes/DW-Abyss/images/BLK/blk_09.jpg' width='72' height='40'></td>    
  </tr>
</table>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='24' style='background-image:url(themes/DW-Abyss/images/BLK/blk_10.jpg)'><img src='themes/DW-Abyss/images/BLK/blk_10.jpg' width='24' height='66'></td>
    <td style='background-image:url(themes/DW-Abyss/images/BLK/blk_11.jpg)'>$content</td>
    <td width='25' style='background-image:url(themes/DW-Abyss/images/BLK/blk_12.jpg)'><img src='themes/DW-Abyss/images/BLK/blk_12.jpg' width='25' height='66'></td>
  </tr>
</table>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='94'><img src='themes/DW-Abyss/images/BLK/blk_13.jpg' width='94' height='37'></td>
    <td style='background-image:url(themes/DW-Abyss/images/BLK/blk_14.jpg)'><img src='themes/DW-Abyss/images/BLK/blk_14.jpg' width='3' height='37'></td>
    <td width='94'><img src='themes/DW-Abyss/images/BLK/blk_15.jpg' width='94' height='37'></td>
  </tr>
</table>
</td>
</tr>
</table><br>";
}
?>