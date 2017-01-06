<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : DownloadNew.php
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

$pagetitle = _DOWNLOADSADMIN.": "._DOWNLOADSWAITINGVAL;
include_once(NUKE_BASE_DIR.'header.php');
OpenTable();
echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=DLMain\">" . _DOWNLOADS_ADMIN_HEADER . "</a></div>\n";
echo "<br /><br />";
echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _DOWNLOADS_RETURNMAIN . "</a> ]</div>\n";
CloseTable();
echo "<br />";
$result = $db->sql_query("SELECT * FROM ".$prefix."_downloads_new ORDER BY lid");
$numrows = $db->sql_numrows($result);
title("$pagetitle ($numrows)");
DLadminmain();
echo "<br />\n";
OpenTable();
if ($numrows>0) {
  while($lidinfo = $db->sql_fetchrow($result)) {
    if (empty($lidinfo['submitter'])) { $lidinfo['submitter'] = $anonymous; }
    $lidinfo['homepage'] = ereg_replace("http://","",$lidinfo['homepage']);
    if ($lidinfo['homepage'] != "") { $lidinfo['homepage'] = "http://".$lidinfo['homepage']; }
    OpenTable2();
    echo "<table align='center' cellpadding='2' cellspacing='2' border='0'>\n";
    echo "<form action='".$admin_file.".php' method='post'>\n";
    echo "<tr><td bgcolor='$bgcolor2'>"._SUBMITTER.":</td><td><strong>".$lidinfo['submitter']."</strong></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2'>"._SUBIP.":</td><td><strong>".$lidinfo['sub_ip']."</strong></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2'>"._TITLE.":</td><td><input type='text' name='title' value='".$lidinfo['title']."' size='50' maxlength='100'></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2'>"._URL.":</td><td><input type='text' name='url' value='".$lidinfo['url']."' size='50' maxlength='100'></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2'>"._CATEGORY.":</td><td><select name='cat'><option value='0'";
    if ($lidinfo['cid'] == 0) { echo " selected"; }
    echo ">"._DL_NONE."</option>\n";
    $result2 = $db->sql_query("SELECT * FROM ".$prefix."_downloads_categories ORDER BY parentid,title");
    while($cidinfo = $db->sql_fetchrow($result2)) {
      if ($cidinfo['cid'] == $lidinfo['cid']) { $sel = "selected"; } else { $sel = ""; }
      if ($cidinfo['parentid'] != 0) $cidinfo['title'] = getparent($cidinfo['parentid'], $cidinfo['title']);
      echo "<option value='".$cidinfo['cid']."' $sel>".$cidinfo['title']."</option>\n";
    }
    echo "</select></td></tr>\n";
    $sel1 = $sel2 = $sel3 = "";
    if ($lidinfo['sid'] == 0) { $sel1 = " selected"; } elseif ($lidinfo['sid'] == 1) { $sel2 = " selected"; } elseif ($lidinfo['sid'] == 2) { $sel3 = " selected"; }
    echo "<tr><td bgcolor='$bgcolor2'>"._DL_PERM.":</td><td><select name='perm'>\n";
    echo "<optgroup label='General'>\n";
    echo "<option value='0'>"._DL_ALL."</option>\n";
    echo "<option value='1'>"._DL_USERS."</option>\n";
    echo "<option value='2'>"._DL_ADMIN."</option>\n";
    echo "</optgroup><optgroup label='Groups'>\n";
    $gresult = $db->sql_query("SELECT * FROM ".$prefix."_bbgroups WHERE group_single_user != '1' ORDER BY group_name");
    while($gidinfo = $db->sql_fetchrow($gresult)) {
      $gidinfo['group_id'] = $gidinfo['group_id'] + 2;
      echo "<option value='".$gidinfo['group_id']."'>".$gidinfo['group_name']." "._DL_ONLY."</option>\n";
    }
    echo "</optgroup></select></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2' valign='top'>"._DESCRIPTION.":</td><td><textarea name='description' cols='60' rows='10'>".$lidinfo['description']."</textarea></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2'>"._AUTHORNAME.":</td><td><input type='text' name='sname' size='20' maxlength='100' value='".$lidinfo['name']."'></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2'>"._AUTHOREMAIL.":</td><td><input type='text' name='email' size='20' maxlength='100' value='".$lidinfo['email']."'></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2'>"._FILESIZE.":</td><td><input type='text' name='filesize' size='12' maxlength='20' value='".$lidinfo['filesize']."'></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2'>"._VERSION.":</td><td><input type='text' name='version' size='11' maxlength='20' value='".$lidinfo['version']."'></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2'>"._HOMEPAGE.":</td><td><input type='text' name='homepage' size='30' maxlength='255' value='".$lidinfo['homepage']."'> [ <a href='".$lidinfo['homepage']."' target='_blank'>"._VISIT."</a> ]</td></tr>\n";
    echo "<input type='hidden' name='sub_ip' value='".$lidinfo['sub_ip']."'>\n";
    echo "<input type='hidden' name='new' value='1'>\n";
    echo "<input type='hidden' name='hits' value='0'>\n";
    echo "<input type='hidden' name='lid' value='".$lidinfo['lid']."'>\n";
    echo "<input type='hidden' name='submitter' value='".$lidinfo['submitter']."'>\n";
    echo "<input type='hidden' name='op' value='DownloadAddSave'>\n";
    echo "<input type='hidden' name='xop' value='$op'>\n";
    echo "<tr><td align='center' colspan='2'><input type='submit' value='"._ADDDOWNLOAD."'></td></tr>\n";
    echo "</form>\n";
    echo "<form action='".$admin_file.".php' method='post'>\n";
    echo "<input type='hidden' name='lid' value='".$lidinfo['lid']."'>\n";
    echo "<input type='hidden' name='op' value='DownloadNewDelete'>\n";
    echo "<tr><td align='center' colspan='2'><input type='submit' value='"._DELETEDOWNLOAD."'></td></tr>\n";
    echo "</form>\n";
    echo "</table>\n";
    CloseTable2();
    echo "<br />\n";
  }
} else {
  echo "<table align='center' cellpadding='2' cellspacing='2' border='0'><tr><td align='center'><strong>"._DNODOWNLOADSWAITINGVAL."<strong></td></tr></table>\n";
}
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>