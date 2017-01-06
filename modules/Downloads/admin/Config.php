<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : Config.php
   Author        : Quake (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 11.21.2005 (mm.dd.yyyy)

   Notes         : Advanced Downloads module with BBGroups Integration
                   based on NSN GR Downloads.
************************************************************************/

/********************************************************/
/* Based on NSN GR Downloads                            */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright (c) 2000-2005 by NukeScripts Network         */
/********************************************************/

$pagetitle = _DOWNCONFIG;
include_once(NUKE_BASE_DIR.'header.php');
OpenTable();
echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=DLMain\">" . _DOWNLOADS_ADMIN_HEADER . "</a></div>\n";
echo "<br /><br />";
echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _DOWNLOADS_RETURNMAIN . "</a> ]</div>\n";
CloseTable();
echo "<br />";
$dl_config = downloads_get_configs();
title($pagetitle);
DLadminmain();
echo "<br />\n";
OpenTable();
echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
echo "<form action='".$admin_file.".php' method='post'>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._ADMBLOCKUNREGMODIFY."</td><td><select name='xblockunregmodify'>\n";
echo "<option value='0'";
if ($dl_config['blockunregmodify'] == 0) { echo " selected"; }
echo "> "._YES." </option>\n<option value='1'";
if ($dl_config['blockunregmodify'] == 1) { echo " selected"; }
echo "> "._NO." </option>\n";
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._ADMMOSTPOPULAR."</td><td><select name='xmostpopular'>\n";
echo "<option value='".$dl_config['mostpopular']."' selected> ".$dl_config['mostpopular']." </option>\n";
for ($i=1; $i <= 5; $i++) { $j = $i * 5; echo "<option value='$j'> $j </option>\n"; }
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._ADMMOSTPOPULARTRIG."</td><td><select name='xmostpopulartrig'>\n";
echo "<option value='0'";
if ($dl_config['mostpopulartrig'] == 0) { echo " selected"; }
echo "> "._NUMBER." </option>\n<option value='1'";
if ($dl_config['mostpopulartrig'] == 1) { echo " selected"; }
echo "> "._PERCENT." </option>\n";
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._ADMPERPAGE."</td><td><select name='xperpage'>\n";
echo "<option value='".$dl_config['perpage']."' selected> ".$dl_config['perpage']." </option>\n";
for ($i=1; $i <= 5; $i++) { $j = $i * 10; echo "<option value='$j'> $j </option>\n"; }
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._ADMADMPERPAGE."</td><td><select name='xadmperpage'>\n";
echo "<option value='".$dl_config['admperpage']."' selected> ".$dl_config['admperpage']." </option>\n";
for ($i=1; $i <= 8; $i++) { $j = $i * 25; echo "<option value='$j'> $j </option>\n"; }
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._ADMRESULTS."</td><td><select name='xresults'>\n";
echo "<option value='".$dl_config['results']."' selected> ".$dl_config['results']." </option>\n";
for ($i=1; $i <= 5; $i++) { $j = $i * 10; echo "<option value='$j'> $j </option>\n"; }
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._ADMPOPULAR."</td><td><select name='xpopular'>\n";
echo "<option value='".$dl_config['popular']."' selected> ".$dl_config['popular']." </option>\n";
for ($i=1; $i <= 10; $i++) { $j = $i * 100; echo "<option value='$j'> $j </option>\n"; }
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._ADMSHOWDOWNLOAD."</td><td><select name='xshow_download'>\n";
echo "<option value='0'";
if ($dl_config['show_download'] == 0) { echo " selected"; }
echo "> "._NO." </option>\n<option value='1'";
if ($dl_config['show_download'] == 1) { echo " selected"; }
echo "> "._YES." </option>\n";
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._ADMSHOWNUM."</td><td><select name='xshow_links_num'>\n";
echo "<option value='0'";
if ($dl_config['show_links_num'] == 0) { echo " selected"; }
echo "> "._NO." </option>\n<option value='1'";
if ($dl_config['show_links_num'] == 1) { echo " selected"; }
echo "> "._YES." </option>\n";
echo "</select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._ADMUSEGFX."</td><td><select name='xusegfxcheck'>\n";
echo "<option value='0'";
if ($dl_config['usegfxcheck'] == 0) { echo " selected"; }
echo "> "._NO." </option>\n<option value='1'";
if ($dl_config['usegfxcheck'] == 1) { echo " selected"; }
echo "> "._YES." </option>\n";
echo "</select></td></tr>\n";
/*echo "<tr><td bgcolor='$bgcolor2'>"._DL_DATEFORMAT.":<br />"._DL_DATEMSG."</td><td>";
echo "<input size='30' maxlength='60' type='text' name='xdateformat' value='".$dl_config['dateformat']."'></td></tr>\n";*/
echo "<input type='hidden' name='xdateformat' value='".$dl_config['dateformat']."'>\n";
echo "<input type='hidden' name='op' value='DLConfigSave'>\n";
echo "<tr><td align='center' colspan='2'><input type='submit' value='"._SAVECHANGES."'></td></tr>\n";
echo "</form>\n";
echo "</table>\n";
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>