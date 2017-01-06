<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : CategoryAdd.php
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

$pagetitle = _CATEGORIESADMIN.": "._ADDCATEGORY;
include_once(NUKE_BASE_DIR.'header.php');
OpenTable();
echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=DLMain\">" . _DOWNLOADS_ADMIN_HEADER . "</a></div>\n";
echo "<br /><br />";
echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _DOWNLOADS_RETURNMAIN . "</a> ]</div>\n";
CloseTable();
echo "<br />";
title($pagetitle);
$folder = dirname(dirname(__FILE__));
if(preg_match('/\/(.*?)\//', $folder)) {
    $folder .= '/files/';
} else {
    $folder .= '\files\\';
}
DLadminmain();
echo "<br />\n";
OpenTable();
echo "<table width='80%' align='center' cellpadding='2' cellspacing='2' border='0'>\n";
echo "<form method='post' action='".$admin_file.".php'>\n";
echo "<tr><th align='left'>"._NAME.":</th><td><input type='text' name='title' size='50' maxlength='50'></td></tr>\n";
echo "<tr><th align='left'>"._PARENT."</th><td><select name='cid'><option value='0' selected>"._DL_NONE."</option>\n";
$result = $db->sql_query("SELECT cid, title, parentid FROM ".$prefix."_downloads_categories WHERE parentid='0' ORDER BY title");
while($cidinfo = $db->sql_fetchrow($result)) {
  $crawled = array($cidinfo['cid']);
  CrawlLevel($cidinfo['cid']);
  $x=0;
  while ($x <= (count($crawled)-1)) {
    list($title,$parentid) = $db->sql_fetchrow($db->sql_query("SELECT title, parentid FROM ".$prefix."_downloads_categories WHERE cid='$crawled[$x]'"));
    if ($x > 0) { $title = getparent($parentid,$title); }
    echo "<option value='$crawled[$x]'>$title</option>\n";
    $x++;
  }
}
echo "</select></td></tr>\n";
/*echo "<tr><td bgcolor='$bgcolor2' valign='top'>"._DESCRIPTION.":</td><td><textarea name='cdescription' cols='50' rows='5'></textarea></td></tr>\n";*/
echo "  <tr>\n";
echo "    <th colspan='2' align='left'>". _DESCRIPTION .":</th>\n";
echo "  </tr>\n";
echo "  <tr>\n";
echo "    <td colspan='2'>";
echo Make_TextArea('description', '', 'add_download', '100%', '230px', false);
echo "    </td>\n";
echo "  </tr>\n";
echo "<tr><th align='left'>"._DL_WHOADD.":</th><td><select name='whoadd'>\n";
echo "<optgroup label='"._DLGENERAL."'>\n";
echo "<option value='-1'>"._DL_NONE."</option>\n";
echo "<option value='0' selected>"._DL_ALL."</option>\n";
echo "<option value='1'>"._DL_USERS."</option>\n";
echo "<option value='2'>"._DL_ADMIN."</option>\n";
echo "</optgroup><optgroup label='"._DLGROUPS."'>\n";
$gresult = $db->sql_query("SELECT * FROM ".$prefix."_bbgroups WHERE group_single_user != '1' ORDER BY group_name");
while($gidinfo = $db->sql_fetchrow($gresult)) {
  $gidinfo['group_id'] = $gidinfo['group_id'] + 2;
  echo "<option value='".$gidinfo['group_id']."'>".$gidinfo['group_name']." "._DL_ONLY."</option>\n";
}
echo "</optgroup></select></td></tr>\n";
echo "<tr><th align='left' valign='top'>"._UPDIRECTORY.":</th><td><input type='text' name='uploaddir' size='50' maxlength='255'><br />("._USEUPLOAD.")<br />(".$folder.")</td></tr>\n";
echo "<tr><th align='left'>"._DL_CANUPLOAD.":</th><td><select name='canupload'>\n";
echo "<option value='0'>"._DL_NO."</option>\n";
echo "<option value='1'>"._DL_YES."</option>\n";
echo "</select></td></tr>\n";
echo "<input type='hidden' name='op' value='CategoryAddSave'>\n";
echo "<tr><td align='center' colspan='2'><input type='submit' value='"._ADDCATEGORY."'></td></tr>\n";
echo "</form>\n</table>\n";
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>