<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       09/29/2005
 ************************************************************************/

if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    exit('Access Denied');
}

global $ThemeInfo, $sitename;

echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "  <tr>\n";
echo "    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "      <tr>\n";
echo "        <td width=\"72\" height=\"34\"><img src=\"themes/chromo/images/bnr_01.gif\" alt=\"\" width=\"72\" height=\"34\" /></td>\n";
echo "        <td width=\"51\"><img src=\"themes/chromo/images/bnr_02.gif\" alt=\"\" width=\"51\" height=\"34\" /></td>\n";
echo "        <td style=\"background-image: url(themes/chromo/images/bnr_03_tile.gif)\"><img src=\"themes/chromo/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\" /></td>\n";
echo "        <td width=\"51\"><img src=\"themes/chromo/images/bnr_04.gif\" alt=\"\" width=\"51\" height=\"34\" /></td>\n";
echo "        <td width=\"72\" height=\"34\"><img src=\"themes/chromo/images/bnr_05.gif\" alt=\"\" width=\"72\" height=\"34\" /></td>\n";
echo "      </tr>\n";
echo "    </table>\n";
echo "      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "        <tr>\n";
echo "          <td width=\"61\" height=\"98\"><img src=\"themes/chromo/images/bnr_06.jpg\" alt=\"\" width=\"61\" height=\"98\" /></td>\n";
echo "          <td width=\"317\"><img src=\"themes/chromo/images/bnr_07_logo.jpg\" alt=\"$sitename\" width=\"317\" height=\"98\" /></td>\n";
$ads = ads(0);
if(empty($ads)) {
    echo "          <td style=\"background-image: url(themes/chromo/images/bnr_08_tile.gif)\"><img src=\"themes/chromo/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\" /></td>\n";
} else {
    echo "          <td style=\"background-image: url(themes/chromo/images/bnr_08_tile.gif)\">$ads</td>\n";
}
echo "          <td width=\"62\"><img src=\"themes/chromo/images/bnr_09.gif\" alt=\"\" width=\"62\" height=\"98\" /></td>\n";
echo "          <td width=\"61\"><img src=\"themes/chromo/images/bnr_10.jpg\" alt=\"\" width=\"61\" height=\"98\" /></td>\n";
echo "        </tr>\n";
echo "      </table>\n";
echo "      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "        <tr>\n";
echo "          <td width=\"72\" height=\"34\"><img src=\"themes/chromo/images/bnr_11.gif\" alt=\"\" width=\"72\" height=\"34\" /></td>\n";
echo "          <td style=\"background-image: url(themes/chromo/images/bnr_12_tile.gif)\"><img src=\"themes/chromo/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\" /></td>\n";
echo "          <td width=\"72\"><img src=\"themes/chromo/images/bnr_13.gif\" alt=\"\" width=\"72\" height=\"34\" /></td>\n";
echo "        </tr>\n";
echo "      </table>\n";
echo "      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
echo "        <tr>\n";
echo "          <td width=\"91\" height=\"46\"><img src=\"themes/chromo/images/bnr_14.jpg\" alt=\"\" width=\"91\" height=\"46\" /></td>\n";
echo "          <td style=\"background-image: url(themes/chromo/images/bnr_14_tile.jpg)\"><img src=\"themes/chromo/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\" /></td>\n";
echo "          <td width=\"478\">\n";
echo "          <object type=\"application/x-shockwave-flash\" data=\"themes/chromo/images/bnrnav.swf?link1=" . urlencode($ThemeInfo['link1']) . "&amp;link1text=" . urlencode($ThemeInfo['link1text']) . "&amp;link2=" . urlencode($ThemeInfo['link2']) . "&amp;link2text=" . urlencode($ThemeInfo['link2text']) . "&amp;link3=" . urlencode($ThemeInfo['link3']) . "&amp;link3text=" . urlencode($ThemeInfo['link3text']) . "&amp;link4=" . urlencode($ThemeInfo['link4']) . "&amp;link4text=" . urlencode($ThemeInfo['link4text']) . "\" width=\"478\" height=\"46\">\n";
echo "            <param name=\"movie\" value=\"themes/chromo/images/bnrnav.swf?link1=" . urlencode($ThemeInfo['link1']) . "&amp;link1text=" . urlencode($ThemeInfo['link1text']) . "&amp;link2=" . urlencode($ThemeInfo['link2']) . "&amp;link2text=" . urlencode($ThemeInfo['link2text']) . "&amp;link3=" . urlencode($ThemeInfo['link3']) . "&amp;link3text=" . urlencode($ThemeInfo['link3text']) . "&amp;link4=" . urlencode($ThemeInfo['link4']) . "&amp;link4text=" . urlencode($ThemeInfo['link4text']) . "\" />\n";
echo "            </object>\n";
echo "          </td>\n";
echo "          <td style=\"background-image: url(themes/chromo/images/bnr_14_tile.jpg)\"><img src=\"themes/chromo/images/spacer.gif\" alt=\"\" width=\"1\" height=\"1\" /></td>\n";
echo "          <td width=\"86\"><img src=\"themes/chromo/images/bnr_17.jpg\" width=\"86\" height=\"46\" alt=\"\" /></td>\n";
echo "        </tr>\n";
echo "      </table>\n";
echo "  </td>\n";
echo "  </tr>\n";
echo "</table>";

?>