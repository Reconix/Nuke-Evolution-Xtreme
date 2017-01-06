<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : getit.php
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
$result = $db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads WHERE lid=$lid AND active>'0'");
$lidinfo = $db->sql_fetchrow($result);
$pagetitle = "- "._DOWNLOADPROFILE.": ".stripslashes($lidinfo['title']);
include_once(NUKE_BASE_DIR.'header.php');
$priv = $lidinfo['sid'] - 2;
if (($lidinfo['sid'] == 0) || ($lidinfo['sid'] == 1 AND is_user())  || ($lidinfo['sid'] == 2 AND is_mod_admin($module_name)) || ($lidinfo['sid'] > 2 AND of_group($priv)) || $dl_config['show_download'] == '1') {
  if (empty($lidinfo['lid']) OR $lidinfo['active'] == 0) {
    title(_DOWNLOADPROFILE.": "._INVALIDDOWNLOAD);
    OpenTable();
    echo "<center><strong>"._INVALIDDOWNLOAD."</strong></center>\n";
  } else {
    $fetchid = base64_encode($lidinfo['url']);
    $title = stripslashes($lidinfo['title']);
    title(_DOWNLOADPROFILE.": $title");
    OpenTable();
    mt_srand ((double)microtime()*1000000);
    $maxran = 1000000;
    $random_num = mt_rand(0, $maxran);
    $lidinfo['description'] = stripslashes($lidinfo['description']);
    $lidinfo['description'] = str_replace ("\r\n", "<br />", $lidinfo['description']);
    if (is_mod_admin($module_name)) {
      $myimage = myimage("edit.png");
      echo "<a href='".$admin_file.".php?op=DownloadModify&amp;lid=$lid' target='$lid'><img align='middle' src='$myimage' border='0' alt='"._DL_EDIT."'></a>&nbsp;";
    } else {
      $myimage = myimage("show.png");
      echo "<img align='middle' src='$myimage' border='0' alt=''>&nbsp;";
    }
    echo "<span class='title'>"._DOWNLOADPROFILE.": <strong>$title</strong></span><br /><hr />";
    echo "".$lidinfo['description']."<br /><hr />";
    echo "<strong>"._VERSION.":</strong> ".$lidinfo['version']."<br />\n";
    echo "<strong>"._FILESIZE.":</strong> ".CoolSize($lidinfo['filesize'])."<br />";
    echo "<strong>"._ADDEDON.":</strong> ".CoolDate($lidinfo['date'])."<br />\n";
    echo "<strong>"._DOWNLOADS.":</strong> ".$lidinfo['hits']."<br />";
    echo "<strong>"._HOMEPAGE.":</strong> ";
    if (empty($lidinfo['homepage']) || $lidinfo['homepage'] == "http://") {
      echo _DL_NOTLIST;
    } else {
      echo "<a href='".$lidinfo['homepage']."' target='new'>".$lidinfo['homepage']."</a>";
    }
    echo "<hr />";
    if (($lidinfo['sid'] == 0) || ($lidinfo['sid'] == 1 AND is_user())  || ($lidinfo['sid'] == 2 AND is_mod_admin($module_name)) || ($lidinfo['sid'] > 2 AND of_group($priv))) {
      echo _DL_DIRECTIONS." "._DL_DLNOTES1."$title"._DL_DLNOTES2."</span><br /><br />";
      echo "<center><table border='0'>";
      echo "<form action='modules.php?name=$module_name' method='POST'>";
      echo "<input type='hidden' name='op' value='go'>";
      echo "<input type='hidden' name='lid' value='".$lidinfo['lid']."'>";
      echo "<input type='hidden' name='fetchid' value='$fetchid'>";
      if ($dl_config['usegfxcheck'] == 1) {
        /*if (GDSUPPORT) {
          echo "<tr><td><strong>"._DL_YOURPASS.":</strong></td><td><img src='modules.php?name=$module_name&amp;op=gfx&amp;random_num=$random_num' height='20' width='80' border='0' alt='"._DL_YOURPASS."' title='"._DL_YOURPASS."'></td></tr>";
          echo "<tr><td><strong>"._DL_TYPEPASS.":</strong></td><td><input type='text' name='passcode' size='10' maxlength='10'></td></tr>";
          echo "<input type='hidden' name='checkpass' value='$random_num'>";
        } else {
          $datekey = date("F j");
          $rcode = hexdec(md5($_SERVER['HTTP_USER_AGENT'] . $sitekey . $random_num . $datekey));
          $code = substr($rcode, 2, $evoconfig['codesize']);
          $ThemeSel = get_theme();
          if (file_exists("themes/$ThemeSel/images/code_bg.png")) {
              $imgpath = "themes/$ThemeSel/images";
          } else {
              $imgpath = "images";
          }
          echo "<tr><td><strong>"._DL_YOURPASS.":</strong></td><td height='20' width='80' background='$imgpath/code_bg.png' class='storytitle' align='center'><strong>$code</strong></td></tr>";
          echo "<tr><td><strong>"._DL_TYPEPASS.":</strong></td><td><input type='text' name='passcode' size='10' maxlength='10'></td></tr>";
          echo "<input type='hidden' name='checkpass' value='$code'>";
        }*/
        echo security_code(1,'normal', 1);
      }
      echo "<tr><td colspan='2' align='center'><input type='submit' name='"._DL_GOGET."' value='"._DL_GOGET."'></td></tr>";
      echo "</form>";
      echo "</table></center><br />";
      if(is_mod_admin($module_name)) {
          echo "<center><span class='content'>[ <a href='" . $admin_file . ".php?op=DownloadModify&amp;lid=$lid'>"._MODIFY."</a> ]</span></center>\n";
      } else {
          echo "<center><span class='content'>[ <a href='modules.php?name=$module_name&amp;op=modifydownloadrequest&amp;lid=$lid'>"._MODIFY."</a> ]</span></center>\n";
      }
    } else {
      restricted($lidinfo['sid']);
    }
  }
  CloseTable();
} else {
  OpenTable();
  restricted($lidinfo['sid']);
  CloseTable();
}
include_once(NUKE_BASE_DIR.'footer.php');

?>