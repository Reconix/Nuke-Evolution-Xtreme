<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : modifydownloadrequest.php
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

if(!defined('IN_DOWNLOADS')) {
  exit('Access Denied');
}

$lid = intval($lid);
$pagetitle = "- "._REQUESTDOWNLOADMOD;
include_once(NUKE_BASE_DIR.'header.php');
menu(1);
echo "<br />\n";
title(_REQUESTDOWNLOADMOD);
OpenTable();
if ($dl_config['blockunregmodify'] == 1 && !is_user()) {
  echo "<center><strong>"._DONLYREGUSERSMODIFY."</strong></center>\n";
} else {
  $result = $db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads WHERE lid=$lid AND active>'0'");
  $lidinfo = $db->sql_fetchrow($result);
  if (empty($lidinfo['lid'])) {
    echo "<center><strong>"._INVALIDDOWNLOAD."</strong></center>\n";
  } else {
    $lidinfo['title'] = stripslashes($lidinfo['title']);
    $lidinfo['description'] = stripslashes($lidinfo['description']);
    echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
    echo "<form action='modules.php?name=$module_name' method='post'>\n";
    echo "<tr><td bgcolor='$bgcolor2'><strong>"._TITLE.":</strong></td><td><input type='text' name='title' value='".$lidinfo['title']."' size='50' maxlength='100'></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2' valign='top'><strong>"._URL.":</strong></td><td><input type='text' name='url' value='' size='50' maxlength='255'><br />("._PATHHIDE.")</td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2' valign='top'><strong>"._DESCRIPTION.":</strong></td><td><textarea name='description' cols='60' rows='10'>".$lidinfo['description']."</textarea></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2'><strong>"._CATEGORY.":</strong></td><td><select name='cat'>\n";
    $result2 = $db->sql_query("SELECT * FROM ".$prefix."_downloads_categories ORDER BY parentid,title");
    while($cidinfo = $db->sql_fetchrow($result2)) {
      if ($cidinfo['cid'] == $lidinfo['cid']) { $sel = "selected"; } else { $sel = ""; }
      if ($cidinfo['parentid'] != 0) $cidinfo['title'] = getparent($cidinfo['parentid'], $cidinfo['title']);
      echo "<option value='".$cidinfo['cid']."' $sel>".$cidinfo['title']."</option>\n";
    }
    echo "</select></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2'><strong>"._AUTHORNAME.":</strong></td><td><input type='text' name='auth_name' value='".$lidinfo['name']."' size='30' maxlength='100'></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2'><strong>"._AUTHOREMAIL.":</strong></td><td><input type='text' name='email' value='".$lidinfo['email']."' size='30' maxlength='100'></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2'><strong>"._FILESIZE.":</strong></td><td><input type='text' name='filesize' value='".$lidinfo['filesize']."' size='20' maxlength='20'> ("._INBYTES.")</td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2'><strong>"._VERSION.":</strong></td><td><input type='text' name='version' value='".$lidinfo['version']."' size='20' maxlength='20'></td></tr>\n";
    echo "<tr><td bgcolor='$bgcolor2'><strong>"._HOMEPAGE.":</strong></td><td><input type='text' name='homepage' value='".$lidinfo['homepage']."' size='50' maxlength='255'></td></tr>\n";
    echo "<input type='hidden' name='lid' value='$lid'>\n";
    echo "<input type='hidden' name='op' value='modifydownloadrequestS'>\n";
    echo "<tr><td align='center' colspan='2'><input type='submit' value='"._SENDREQUEST."'></td></tr>\n";
    echo "</form>\n</table>\n";
  }
}
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>