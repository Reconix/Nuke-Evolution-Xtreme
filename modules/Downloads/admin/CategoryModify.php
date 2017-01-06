<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : CategoryModify.php
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

$pagetitle = _CATEGORIESADMIN;
include_once(NUKE_BASE_DIR.'header.php');
OpenTable();
echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=DLMain\">" . _DOWNLOADS_ADMIN_HEADER . "</a></div>\n";
echo "<br /><br />";
echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _DOWNLOADS_RETURNMAIN . "</a> ]</div>\n";
CloseTable();
echo "<br />";
title(_CATEGORIESADMIN);
DLadminmain();
$folder = dirname(dirname(__FILE__));
if(preg_match('/\/(.*?)\//', $folder)) {
    $folder .= '/files/';
} else {
    $folder .= '\files\\';
}
echo "<br />\n";
OpenTable();
$cidinfo = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_downloads_categories WHERE cid='$cid'"));
$cidinfo['cdescription'] = stripslashes($cidinfo['cdescription']);
echo "<table align='center' cellpadding='2' cellspacing='2' border='0'>\n";
echo "<form action='".$admin_file.".php' method='post'>\n";
echo "<tr><td align='center' colspan='2'><strong>"._MODCATEGORY."</strong></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._NAME.":</td><td><input type='text' name='title' value='".$cidinfo['title']."' size='50' maxlength='50'></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2' valign='top'>"._DESCRIPTION.":</td><td><textarea name='cdescription' cols='50' rows='10'>".$cidinfo['cdescription']."</textarea></td></t>\n";
$sel0 = $sel1 = $sel2 = $sel3 = "";
if ($cidinfo['whoadd'] == -1) { $sel0 = " selected"; } elseif ($cidinfo['whoadd'] == 0) { $sel1 = " selected"; } elseif ($cidinfo['whoadd'] == 1) { $sel2 = " selected"; } elseif ($cidinfo['whoadd'] == 2) { $sel3 = " selected"; }
echo "<tr><td bgcolor='$bgcolor2'>"._DL_WHOADD.":</td><td><select name='whoadd'>\n";
echo "<optgroup label='"._DLGENERAL."'>\n";
echo "<option value='-1'$sel0>"._DL_NONE."</option>\n";
echo "<option value='0'$sel1>"._DL_ALL."</option>\n";
echo "<option value='1'$sel2>"._DL_USERS."</option>\n";
echo "<option value='2'$sel3>"._DL_ADMIN."</option>\n";
echo "</optgroup><optgroup label='"._DLGROUPS."'>\n";
$gresult = $db->sql_query("SELECT * FROM ".$prefix."_bbgroups WHERE group_single_user != '1' ORDER BY group_name");
while($gidinfo = $db->sql_fetchrow($gresult)) {
  $gidinfo['group_id'] = $gidinfo['group_id'] + 2;
  if ($cidinfo['whoadd'] == $gidinfo['group_id']) { $sel4 = " selected"; }
  echo "<option value='".$gidinfo['group_id']."'$sel4>".$gidinfo['group_name']." "._DL_ONLY."</option>\n";
}
echo "</optgroup></select></td></tr>\n";
echo "<tr><td bgcolor='$bgcolor2'>"._UPDIRECTORY.":</td><td><input type='text' name='uploaddir' value='".$cidinfo['uploaddir']."' size='50' maxlength='255'><br />(".$folder.")</td></t>\n";
$sel0 = $sel1 = "";
if ($cidinfo['canupload'] == 0) { $sel0 = " selected"; } elseif ($cidinfo['canupload'] == 1) { $sel1 = " selected"; }
echo "<tr><td bgcolor='$bgcolor2'>"._DL_CANUPLOAD.":</td><td><select name='canupload'>\n";
echo "<option value='0'$sel0>"._DL_NO."</option>\n";
echo "<option value='1'$sel1>"._DL_YES."</option>\n";
echo "</select></td></tr>\n";
echo "<input type='hidden' name='cid' value='$cid'>\n";
echo "<input type='hidden' name='op' value='CategoryModifySave'>\n";
echo "<tr><td align='center' colspan='2'><input type='submit' value='"._SAVECHANGES."'></td></tr></form>\n";
echo "<form action='".$admin_file.".php' method='post'>\n";
echo "<input type='hidden' name='cid' value='$cid'>\n";
echo "<input type='hidden' name='op' value='CategoryDelete'>\n";
echo "<tr><td align='center' colspan='2'><input type='submit' value='"._DL_DELETE."'></td></tr></form>\n";
echo "</table>\n";
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>