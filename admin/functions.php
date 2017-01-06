<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/*                                                                      */
/************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
      NukeSentinel                             v2.5.00      07/11/2006
      Caching System                           v1.0.0       10/31/2005
      Module Simplifications                   v1.0.0       11/17/2005
      Evolution Functions                      v1.5.0       12/14/2005
-=[Other]=-
      Admin Field Size                         v1.0.0       06/02/2005
      Need To Delete                           v1.0.0       06/03/2005
      Date Fix                                 v1.0.0       06/20/2005
-=[Mod]=-
      Admin Icon/Link Pos                      v1.0.0       06/02/2005
      Admin Tracker                            v1.0.1       06/08/2005
      Advanced Username Color                  v1.0.6       06/13/2005
      Advanced Security Code Control           v1.0.0       12/17/2005
      Password Strength Meter                  v1.0.0       07/12/2005
      Auto Admin Protector                     v2.0.0       08/18/2005
      Evolution Version Checker                v1.1.0       08/21/2005
      Auto Admin Login                         v2.0.1       08/27/2005
      Auto First User Login                    v1.0.0       08/27/2005
      Persistent Admin Login                   v2.0.0       12/10/2005
 ************************************************************************/

if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    exit('Access Denied');
}

/*****[BEGIN]******************************************
 [ Other:   Need To Delete                     v1.0.0 ]
 ******************************************************/
function need_delete($file, $dir=false) {
  // will be uncommented for release
  if (!$dir) {
    if(!is_file($file)) {
        return;
    }
    DisplayError("<span style='color: red; font-size: 24pt'>"._NEED_DELETE." ".$file."</span>");
  } else {
    if(!is_dir($file)) {
        return;
    }
    DisplayError("<span style='color: red; font-size: 24pt'>"._NEED_DELETE." the folder \"".$file."\"</span>");
  }
}
/*****[END]********************************************
 [ Other:   Need To Delete                     v1.0.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Other:   Admin Password Confirm             v1.0.0 ]
 ******************************************************/
function create_first($name, $url, $email, $pwd, $user_new, $cpwd) {
    global $prefix, $db, $user_prefix, $admin_file, $language, $cache, $Default_Theme;
    if($cpwd != $pwd) {
        DisplayError("<center><p style='color:red'>"._ERROR."</p>"._PASS_NOT_MATCH."</center>");
    }
/*****[END]********************************************
 [ Other:   Admin Password Confirm             v1.0.0 ]
 ******************************************************/
    Validate($email, 'email', 'Admin Setup', 0, 1, 0, 0, '', '<br /><center>'. _GOBACK .'</center>');
    Validate($name, 'username', 'Admin Setup', 0, 1, 0, 2, 'Nickname:', '<br /><center>'. _GOBACK .'</center>');
    Validate($url, 'url', 'Admin Setup', 0, 0, 0, 0, '', '<br /><center>'. _GOBACK .'</center>');
/*****[BEGIN]******************************************
 [ Mod:    Admin Tracker                       v1.0.1 ]
 ******************************************************/
    log_write('admin', 'God Admin (' . $name . ') was created', 'General Information');
/*****[END]********************************************
 [ Mod:    Admin Tracker                       v1.0.1 ]
 ******************************************************/
    list($first) = $db->sql_fetchrow($db->sql_query("SELECT COUNT(*) FROM `".$prefix."_authors`"));
    if ($first == 0) {
        $pwd = md5($pwd);
        $the_adm = 'God';
        $email = validate_mail($email);
        $db->sql_query("INSERT INTO `".$prefix."_authors` VALUES ('$name', '$the_adm', '$url', '$email', '$pwd', '0', '1', '')");
/*****[BEGIN]******************************************
 [ Mod:    Auto Admin Protection               v2.0.0 ]
 ******************************************************/
        $db->sql_query("INSERT INTO `".$prefix."_nsnst_admins` (`aid`, `login`, `protected`) VALUES ('$name', '$name', '1')");
/*****[END]********************************************
 [ Mod:    Auto Admin Protection               v2.0.0 ]
 ******************************************************/
/*****[BEGIN]******************************************
 [ Mod:    Auto Admin Login                    v2.0.0 ]
 ******************************************************/
        $cookiedata = base64_encode("$name:$pwd:english:1");
        if(defined('SSL_MODE')) {
            setcookie('admin',$cookiedata,time()+2592000, "", "", 1);
        } else {
            setcookie('admin',$cookiedata,time()+2592000);
        }
/******************************************************
 [ Mod:    Auto Admin Login                    v2.0.0 ]
 ******************************************************/
        if ($user_new == 1) {
/*****[BEGIN]******************************************
 [ Mod:    Auto First User Login               v1.0.0 ]
 ******************************************************/
                $uid = 2;
                $cookiedata = base64_encode("$uid:$name:$pwd");
                setcookie('user',$cookiedata,time()+2592000);
/*****[END]********************************************
 [ Mod:    Auto First User Login               v1.0.0 ]
 ******************************************************/
                $user_regdate = date('M d, Y');
                $user_avatar = 'blank.gif';
                $commentlimit = 4096;
                if ($url == 'http://') { $url = ''; }
/*****[BEGIN]******************************************
 [ Mod:    Advanced Username Color             v1.0.6 ]
 ******************************************************/
                $boardconfig = load_board_config();
                $defaultlang = (!($boardconfig['default_lang'])) ? 'english' : $boardconfig['default_lang'];
                $defaultdateformat = (!($boardconfig['default_dateformat'])) ? 'D M d, Y g:i a' : $boardconfig['default_dateformat'];
                $db->sql_query("INSERT INTO `".$user_prefix."_users` (`user_id`, `username`, `user_email`, `user_website`, `user_avatar`, `user_regdate`, `user_password`, `theme`, `commentmax`, `user_level`, `user_lang`, `user_dateformat`, `user_color_gc`, `user_color_gi`, `user_posts`) VALUES ('','".$name."','".$email."','".$url."','".$user_avatar."','".$user_regdate."','".$pwd."','".$Default_Theme."','".$commentlimit."', '2', '".$defaultlang."','".$defaultdateformat."','FFA34F','--1--', '1')");
/*****[END]********************************************
 [ Mod:    Advanced Username Color             v1.0.6 ]
 ******************************************************/
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
                $cache->delete('UserColors', 'config');
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
        }
/*****[BEGIN]******************************************
 [ Mod:    Auto Admin Login                    v2.0.0 ]
 ******************************************************/
        redirect($admin_file.".php");
/*****[END]********************************************
 [ Mod:    Auto Admin Login                    v2.0.0 ]
 ******************************************************/
    }
}

function login() {
    global $admin_file, $db, $prefix;
    include(NUKE_BASE_DIR.'header.php');
    OpenTable();
    echo '<fieldset><legend><strong>'._ADMINLOGIN.'</strong></legend><form method="post" action="'.$admin_file.'.php">'
        ."<br /><table border=\"0\">"
        ."<tr><td>"._ADMINID."</td>"
        ."<td><input type=\"text\" name=\"aid\" size=\"20\" maxlength=\"25\"></td></tr>"
        ."<tr><td>"._PASSWORD."</td>"
        ."<td><input type=\"password\" name=\"pwd\" size=\"20\" maxlength=\"40\"></td></tr>";
/*****[BEGIN]******************************************
 [ Mod:     Advanced Security Code Control     v1.0.0 ]
 ******************************************************/
    $gfxchk = array(1,5,6,7);
    echo security_code($gfxchk, 'large');
/*****[END]********************************************
 [ Mod:     Advanced Security Code Control     v1.0.0 ]
 ******************************************************/
/*****[BEGIN]******************************************
 [ Mod:    Persistent Admin Login              v2.0.0 ]
 ******************************************************/
    echo "<tr><td colspan=\"2\">"._PERSISTENT.":"
        ."<input type=\"checkbox\" name=\"persistent\" value=\"1\" checked=\"checked\">"
        ."</td></tr>";
/*****[END]********************************************
 [ Mod:    Persistent Admin Login              v2.0.0 ]
 ******************************************************/
    echo "<tr><td><br />"
        ."<input type=\"hidden\" name=\"op\" value=\"login\">"
        ."<input type=\"submit\" value=\""._LOGIN."\">"
        ."</td></tr></table>"
        ."</form></fieldset>";
    CloseTable();
    include(NUKE_BASE_DIR.'footer.php');
}

function deleteNotice($id) {
    global $prefix, $db, $admin_file, $cache;
    $id = intval($id);
    $db->sql_query("DELETE FROM `".$prefix."_reviews_add` WHERE `id` = '$id'");
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
    $cache->delete('numwaitreviews', 'submissions');
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
    redirect($admin_file.".php?op=reviews");
}

function adminmenu($url, $title, $image) {
    global $counter, $admingraphic, $Default_Theme, $admdata, $admin;
    $ThemeSel = get_theme();
    $image = (file_exists(NUKE_THEMES_DIR.$ThemeSel.'/images/admin/'.$image)) ? NUKE_THEMES_DIR.$ThemeSel.'/images/admin/'.$image : 'images/admin/'.$image;
    $img = ($admingraphic) ? "<img src=\"$image\" border=\"0\" alt=\"$title\" title=\"$title\" width=\"32\" height=\"32\" /></a><br />" : '';
    $close = ($admingraphic) ? '' : '</a>';
	if (!is_god($admin) && ($title == 'Edit Admins' || $title == 'Nuke Sentinel(tm)')){
		echo "<td align=\"center\" valign=\"top\" width=\"5%\"><span class=\"gensmall\">$img<em style='text-decoration: line-through;'>$title</em><br /><br /></span></td>";
	} else {
		echo "<td align=\"center\" valign=\"top\" width=\"5%\"><span class=\"gensmall\"><a href=\"$url\">$img<strong>$title</strong>$close<br /><br /></span></td>";
	}
    if ($counter == 4) echo '</tr><tr>';
	$counter = ($counter == 4) ? 0 : $counter+1;
}

/****[BEGIN]*******************************************
 [ Mod:     News Feed                          v1.0.0 ]
 ******************************************************/
function liveNewsFeed(){
	global $json, $admincookie, $use_stream, $userinfo;
	
	OpenTable();
	echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">';
	echo '  <tr>';
	echo '    <td valign="top" width="60%">';
	echo '        <div style="float: right; position: relative;" class="gensmall">';
	
	if (is_mod_admin('super')){
		echo '<strong>'._NASS_SL_TITLE.':</strong>';	
		echo ($admincookie[4] == 'old') ? ' <a href="#new" class="style-switch-admin">'._NASS_NS_TITLE.'</a>' : ' <a href="#old" class="style-switch-admin">'._NASS_OS_TITLE.'</a>';
	}
	
	echo '        </div>';
	
	if ($use_stream) {
		echo '<strong><font size="3">'._LIVESTREAM_TITLE.'</font></strong><br /><br />';
		echo '<table width="100%" border="0" cellspacing="0" cellpadding="1">';
		
		if ($fp = fsockopen('evolution-xtreme.com', 80, $errno, $errstr, 10)) {
			fwrite($fp, "GET /feed.json HTTP/1.1\r\n");
			fwrite($fp, "Host: www.evolution-xtreme.com\r\n");
			fwrite($fp, "User-Agent: " . $_SERVER['HTTP_USER_AGENT'] . "\r\n");
			fwrite($fp, "Connection: Close\r\n\r\n");
			
			while (!feof($fp)) {
				$feed = fgets($fp, 10000);
			}
			
			fclose($fp);
			
			// Decode the feed for use
			$feed = $json->decode($feed);
			
			if (!empty($feed)) {
				foreach ($feed['items'] as $f) {
					echo '<tr>';
					echo '    <td style="font-size: 12px; line-height: 16px;">';
					echo          $f['subject'].' <strong> ' . _LIVESTREAM_ON . '</strong> ' . EvoDate('F j, Y, g:i a', $f['nf_time'], $userinfo['user_timezone']);
					echo '        <div style="border-bottom: 1px dashed rgb(204, 204, 204); margin: 4px 0px;"></div>';
					echo          decode_bbcode(set_smilies(stripslashes($f['text'])), 1, true);
					echo '    </td>';
					echo '</tr>';
				}
			} else {
				echo '<tr>';
				echo '    <td style="font-size: 12px; line-height: 16px;">' . _LIVESTREAM_EMPTY . '</td>';
				echo '</tr>';
			}
		} else {
			echo '<tr>';
			echo '    <td style="font-size: 12px; line-height: 16px;">' . _LIVESTREAM_OFFLINE . '</td>';
			echo '</tr>';
		}
		
		echo '</table>';
	}
	
	echo '    </td>';
	echo '  </tr>';
	echo '</table>';
	
	if ($admincookie[4] == 'old'){
		CloseTable();
	}
}
/****[END]*******************************************
 [ Mod:     News Feed                        v1.0.0 ]
 ****************************************************/
 
/*****[BEGIN]******************************************
 [ Mod:    Admin Icon/Link Pos                 v1.0.0 ]
 ******************************************************/
function GraphicAdmin($pos=1){
    global $aid, $admingraphic, $cache, $language, $admin, $prefix, $db, $counter, $admin_file, $admin_pos, $admdata, $radminsuper, $userinfo, $admincookie, $bgcolor1, $bgcolor2, $currentlang;
	
    if ($pos != $admin_pos){
        return;
    }
/*****[END]********************************************
 [ Mod:    Admin Icon/Link Pos                 v1.0.0 ]
 ******************************************************/
	
	echo '<div id="admin-select-overlay"></div>';
	echo '<div id="admin-select-inner" class="admin-select-button">'._NASS_SD_DESC.' <a href="#yes" class="style-switch-admin">'._YES.'</a>&nbsp;&nbsp;&nbsp;<a href="#no" class="style-switch-admin">'._NO.'</a></div>';
 
    $radminsuper = is_mod_admin();
	liveNewsFeed();
	
    if (is_mod_admin('super')){
		if ($admincookie[4] == 'new'){
			echo '<div style="border-top: '.$bgcolor1.' 1px solid; margin: 5px 0px 5px 0px;"></div>';
			echo '<table width="100%" border="0" cellspacing="2" cellpadding="0" align="center">';
			echo '  <tr>';
			echo '    <td valign="top" rowspan="2">';
			echo '<div style="border-top: '.$bgcolor1.' 1px solid; border-bottom: '.$bgcolor1.' 1px solid; background: '.$bgcolor2.'; margin: 5px 5px 5px 0px; font-weight: bold; padding: 3px 0px 3px 5px;"><a href="'.$admin_file.'.php">'._ADMINMENU.'</strong></a></div>';
		} else {
			OpenTable();
			echo '<center>';
			echo '<a href="'.$admin_file.'.php"><font size="2"><strong>'._ADMINMENU.'</strong></font></a>';
		}
        if ($admincookie[4] == 'old'){
			echo "<br />";
		}
        echo "<br /><center><table border=\"0\" width=\"100%\" cellspacing=\"1\"><tr>";
        $linksdir = opendir(NUKE_ADMIN_DIR.'links');
        $menulist = "";
        while(false !== ($func = readdir($linksdir))) {
            if(substr($func, 0, 6) == 'links.') {
				$menulist .= $func.' ';
				
            }
        }
        closedir($linksdir);
        $menulist = explode(' ', $menulist);
        sort($menulist);
        for ($i=0, $maxi = count($menulist); $i < $maxi; $i++) {
            if(!empty($menulist[$i])){
				include(NUKE_ADMIN_DIR.'links/'.$menulist[$i]);
            }
        }
		adminmenu($admin_file.'.php?op=logout', _ADMINLOGOUT, 'logout.png');
        echo "</tr></table></center>";
        $counter = "";
        if ($admincookie[4] == 'old'){
        	echo '</center>';
			CloseTable();
		}
    }
    if ($admincookie[4] == 'new'){
		echo '    </td>';
		echo '    <td valign="top" style="width: 300px;">';
/*****[BEGIN]******************************************
 [ Other:  Security Status                     v1.0.0 ]
 ******************************************************/
		echo '<div style="border-top: '.$bgcolor1.' 1px solid; border-bottom: '.$bgcolor1.' 1px solid; background: '.$bgcolor2.'; text-align: center; margin: 5px 0px 5px 5px; font-weight: bold; padding: 3px 0px">'._SEC_STATUS.'</div>';
		echo "<br />";
		echo "<table border='0' width='70%' align='center'>";
		if (defined('ADMIN_IP_LOCK')){
			echo "<tr><td>"
				."<img src='images/evo/ok.png' alt='' width='10' height='10' /></td><td>"
				."<i>" . _ADMIN_IP_LOCK . ":</i></td><td>" . _SEC_ON . "</td></tr>";
		} else {
			echo "<tr><td>"
				."<img src='images/evo/bad.png' alt='' width='10' height='10' /></td><td>"
				."<i>" . _ADMIN_IP_LOCK . ":</i></td><td>" . _SEC_OFF . "</td></tr>";
		}
		// Removed because INPUT_FILTER is always off in admin panel
		//if(defined('INPUT_FILTER')) {
			echo "<tr><td>"
				."<img src='images/evo/ok.png' alt='' width='10' height='10' /></td><td>"
				."<i>" . _INPUT_FILTER . ":</i></td><td>" . _SEC_ON . "</td></tr>";
		/*} else {
			echo "<tr><td>"
				."<img src='images/evo/bad.png' alt='' width='10' height='10' /></td><td>"
				."<i>" . _INPUT_FILTER . ":</i></td><td>" . _SEC_OFF . "</td></tr>";
		}*/
		if(defined('NUKESENTINEL_IS_LOADED')) {
			echo "<tr><td>"
				."<img src='images/evo/ok.png' alt='' width='10' height='10' /></td><td>"
				."<i>" . _AB_NUKESENTINEL . ":</i></td><td>" . _SEC_ON . "</td></tr>";
		} else {
			echo "<tr><td>"
				."<img src='images/evo/bad.png' alt='' width='10' height='10' /></td><td>"
				."<i>" . _AB_NUKESENTINEL . ":</i></td><td>" . _SEC_OFF . "</td></tr>";
		}
		echo "</table>";
		echo '    </td>';
		echo '  </tr>';
		echo '  <tr>';
		echo '    <td valign="top" style="width: 300px;">';
/*****[END]********************************************
 [ Other:  Security Status                     v1.0.0 ]
 ******************************************************/
/*****[BEGIN]******************************************
 [ Mod:    Admin Tracker                       v1.0.1 ]
 ******************************************************/
		if (is_mod_admin('super')){
			echo '<div style="border-top: '.$bgcolor1.' 1px solid; border-bottom: '.$bgcolor1.' 1px solid; background: '.$bgcolor2.'; text-align: center; margin: 5px 0px 5px 5px; font-weight: bold; padding: 3px 0px">'._ADMIN_LOG.'</div>';
			echo "<br />";
			echo "<table border='0' width='100%' align='center'>";
			echo "  <tr>";
			echo "    <td align=\"center\"><strong>"._ADMIN_LOG_EXPLAIN1."</strong></td>";
			echo "  </tr>";
			echo "  <tr>";
			echo "    <td align=\"left\">"._ADMIN_LOG_EXPLAIN2."</td>";
			echo "  </tr>";
			$ret_log = log_size('admin');
			$img = ($ret_log == -1 || $ret_log == -2 || $ret_log) ? "bad" : "ok";
			echo "  <tr>";
			echo "    <td width='100%' align='center'><img src='images/evo/$img.png' alt='' width='10' height='10' /> <strong>Admin Tracker</strong>:<br />";
			if ($ret_log == -1){
				echo "<font color='red'>" . _ADMIN_LOG_ERR . "</font>";
			} elseif($ret_log == -2){
				echo "<font color='red'>" . _ADMIN_LOG_ERRCHMOD . "</font>";
			} elseif($ret_log){
				echo "<font color='red'>" . _ADMIN_LOG_CHG . "</font>";
			} else {
				echo "<font color='green'>" . _ADMIN_LOG_FINE . "</font>";
			}
			if($ret_log != -1 && $ret_log != -2) {
				echo "<br />[ <a href='".$admin_file.".php?op=viewadminlog&amp;log=admin'>"._ADMIN_LOG_VIEW."</a>" . (($ret_log) ? " | <a href='".$admin_file.".php?op=adminlog_ack&log=admin'>"._ADMIN_LOG_ACK."</a>" : "") ." ]";
			}
			echo "    </td>";
			echo "  </tr>";
			$ret_log = log_size('error');
			$img = ($ret_log == -1 || $ret_log == -2 || $ret_log) ? "bad" : "ok";
			echo "  <tr>";
			echo "    <td width='100%' align='center'><img src='images/evo/$img.png' alt='' width='10' height='10' /> <strong>Error Logger</strong>:<br />";
			if ($ret_log == -1){
				echo "<font color='red'>" . _ERROR_LOG_ERR . "</font>";
			} elseif($ret_log == -2){
				echo "<font color='red'>" . _ERROR_LOG_ERRCHMOD . "</font>";
			} elseif($ret_log){
				echo "<font color='red'>" . _ERROR_LOG_CHG . "</font>";
			} else {
				echo "<font color='green'>" . _ERROR_LOG_FINE . "</font>";
			}
			if ($ret_log != -1 && $ret_log != -2){
				echo "<br />[ <a href='".$admin_file.".php?op=viewadminlog&amp;log=error'>"._ADMIN_LOG_VIEW."</a>" . (($ret_log) ? " | <a href='".$admin_file.".php?op=adminlog_ack&amp;log=error'>"._ADMIN_LOG_ACK."</a>" : "") ." ]";
			}
			echo "    </td>";
			echo "  </tr>";
			echo "</table>";
		}
/*****[END]********************************************
 [ Mod:    Admin Tracker                       v1.0.1 ]
 ******************************************************/
		echo '    </td>';
		echo '  </tr>';
	} else {
		echo '<br />';
	}
	
	if ($admincookie[4] == 'new'){
		echo '  <tr>';
		echo '    <td valign="top" rowspan="3">';
		echo '<div style="border-top: '.$bgcolor1.' 1px solid; border-bottom: '.$bgcolor1.' 1px solid; background: '.$bgcolor2.'; margin: 5px 5px 5px 0px; font-weight: bold; padding: 3px 0px 3px 5px;"><a href="'.$admin_file.'.php">'._MODULESADMIN.'</strong></a></div>';
	} else {
		OpenTable();
		echo "<center>";
		echo '<a href="'.$admin_file.'.php"><font size="2"><strong>'._MODULESADMIN.'</strong></font></a>';
	}
	
	echo "<br /><center><table border=\"0\" width=\"100%\" cellspacing=\"1\">";
	echo "  <tr>";
/*****[BEGIN]******************************************
 [ Base:    Module Simplifications             v1.0.0 ]
 ******************************************************/
	update_modules();
/*****[END]********************************************
 [ Base:    Module Simplifications             v1.0.0 ]
 ******************************************************/
	$result = $db->sql_query("SELECT title FROM ".$prefix."_modules ORDER BY title ASC");
	$count = 0;
	while($row = $db->sql_fetchrow($result)) {
		if (is_mod_admin($row['title'])) {
			if (file_exists(NUKE_MODULES_DIR.$row['title']."/admin/index.php") AND file_exists(NUKE_MODULES_DIR.$row['title']."/admin/links.php") AND file_exists(NUKE_MODULES_DIR.$row['title']."/admin/case.php")) {
				include(NUKE_MODULES_DIR.$row['title']."/admin/links.php");
			}
			$count++;
		}
	}
	if ($count == 0){
		echo '<td align="center">'.sprintf(_NO_ADMIN_RIGHTS, UsernameColor($userinfo['username'])).'</td>';
	}
	echo"  </tr>";
	echo "</table></center>";
	if ($admincookie[4] == 'new'){
		echo '    </td>';
		echo '    <td valign="top" style="width: 300px;">';
/*****[BEGIN]******************************************
 [ Mod:    Evolution Version Checker           v1.1.0 ]
 ******************************************************/
		echo '<div style="border-top: '.$bgcolor1.' 1px solid; border-bottom: '.$bgcolor1.' 1px solid; background: '.$bgcolor2.'; text-align: center; margin: 5px 0px 5px 5px; font-weight: bold; padding: 3px 0px">'._ADMIN_VER_TITLE.'</div>';
		echo "<center>";
		echo sprintf(_CURRENTVERSION, NUKE_EVO);
		echo "</center>";
		echo '    </td>';
		echo '  </tr>';
/*****[END]********************************************
 [ Mod:    Evolution Version Checker           v1.1.0 ]
 ******************************************************/
		if ($admdata['radminsuper'] == 1){
			echo '  <tr>';
			echo '    <td valign="top" width="300">';
			echo '<div style="border-top: '.$bgcolor1.' 1px solid; border-bottom: '.$bgcolor1.' 1px solid; background: '.$bgcolor2.'; text-align: center; margin: 5px 0px 5px 0px; font-weight: bold; padding: 3px 0px">'._SUBMISSIONS.'</div>';
			
			$newdown     = $db->sql_numrows($db->sql_query('SELECT * FROM '.$prefix.'_downloads_new'));                                // New Downloads
			$modrdown    = $db->sql_numrows($db->sql_query('SELECT * FROM '.$prefix.'_downloads_mods WHERE `brokendownload`=\'0\''));  // Modify Downloads
			$brokendown  = $db->sql_numrows($db->sql_query('SELECT * FROM '.$prefix.'_downloads_mods WHERE `brokendownload`=\'1\''));  // Broken Downloads
			$submissions = $db->sql_numrows($db->sql_query('SELECT * FROM '.$prefix.'_queue'));                                        // New Submissions
			
			// Make sure the link us module exists
			if (is_dir(NUKE_MODULES_DIR.'Link_Us')){
				$linkus  = $db->sql_numrows($db->sql_query('SELECT * FROM '.$prefix.'_link_us WHERE `site_status`=\'3\''));            // Link To Us Submissions
			}
			
			$suppend     = $db->sql_numrows($db->sql_query('SELECT * FROM '.$prefix.'_nsnsp_sites WHERE `site_status`=\'0\''));        // Pending Supporters
			$supact      = $db->sql_numrows($db->sql_query('SELECT * FROM '.$prefix.'_nsnsp_sites WHERE `site_status`=\'1\''));        // Active Supporters
			$supsp       = $db->sql_numrows($db->sql_query('SELECT * FROM '.$prefix.'_nsnsp_sites WHERE `site_status`=\'-1\''));       // Inactive Supporters
			$tempuser    = $db->sql_numrows($db->sql_query('SELECT * FROM '.$prefix.'_users_temp'));                                   // Users Awaiting Activation
			
			$content .= '<div style="padding: 2px 5px;">';
			$content .= '    <u><strong>Downloads</strong></u><br />';
			$content .= '    <div style="float: right; position: relative;">[ '.$newdown.' ]</div><a href="'.$admin_file.'.php?op=DownloadNew">New Downloads</a><br />';
			$content .= '    <div style="float: right; position: relative;">[ '.$modrdown.' ]</div><a href="'.$admin_file.'.php?op=DownloadModifyRequests">Mod Downloads</a><br />';
			$content .= '    <div style="float: right; position: relative;">[ '.$brokendown.' ]</div><a href="'.$admin_file.'.php?op=DownloadBroken">Bad Downloads</a><hr />';
			$content .= '    <u><strong>Stories</strong></u><br />';
			$content .= '    <div style="float: right; position: relative;">[ '.$submissions.' ]</div><a href="'.$admin_file.'.php?op=submissions">Submissions</a><hr />';
			
			// Make sure the link us module exists
			if (is_dir(NUKE_MODULES_DIR.'Link_Us')){
				$content .= '    <u><strong>Link Us</strong></u><br />';
				$content .= '    <div style="float: right; position: relative;">[ '.$linkus.' ]</div><a href="'.$admin_file.'.php?op=button_pending">Waiting Links</a><hr />';
			}
			
			$content .= '    <u><strong>Supporters</strong></u><br />';
			$content .= '    <div style="float: right; position: relative;">[ '.$suppend.' ]</div><a href="'.$admin_file.'.php?op=SPPending">Waiting</a><br />';
			$content .= '    <div style="float: right; position: relative;">[ '.$supact.' ]</div><a href="'.$admin_file.'.php?op=SPActive">Active</a><br />';
			$content .= '    <div style="float: right; position: relative;">[ '.$supsp.' ]</div><a href="'.$admin_file.'.php?op=SPInactive">Inactive</a><hr />';
			$content .= '    <u><strong>Waiting Users</strong></u><br />';
			$content .= '    <div style="float: right; position: relative;">[ '.$tempuser.' ]</div><a href="modules.php?name=Your_Account&amp;file=admin&amp;op=listpending">Waiting Users</a>';
			$content .= '</div>';
			
			echo $content;
			unset($content);
			
			echo '    </td>';
			echo '  </tr>';
			echo '  <tr>';
			echo '    <td valign="top" width="300">';
			echo '<div style="border-top: '.$bgcolor1.' 1px solid; border-bottom: '.$bgcolor1.' 1px solid; background: '.$bgcolor2.'; text-align: center; margin: 5px 0px 5px 5px; font-weight: bold; padding: 3px 0px">'._LATESTUSERS.'</div>';
			echo '<div style="margin-left: 5px; text-align: center;">';
			// Get the last 5 registered users
			global $user_prefix;
			$res = $db->sql_query("SELECT `user_id`, `username`, `user_regdate` FROM ". $user_prefix ."_users WHERE user_id != '1' ORDER BY `user_id` DESC LIMIT 5");
			$i = 0;
			while(list($uid,$username,$regdate) = $db->sql_fetchrow($res)){
				echo ($i > 0) ? '<hr />' : '';
				echo '<a href="modules.php?name=Profile&amp;mode=viewprofile&amp;u='.$uid.'">'.UsernameColor($username).'</a><br />'.$regdate;
				$i++;
			}
			$db->sql_freeresult($res);
			echo '</div>';
			echo '    </td>';
			echo '  </tr>';
		}
	}
	
    if ($admincookie[4] == 'old'){
		echo "<br />";
		echo '</center>';
		CloseTable();
		echo '<br />';
	} else {
		echo '  </tr>';
		echo '</table>';
	}
	if ($admincookie[4] == 'new'){	
		CloseTable();
	}
}

?>