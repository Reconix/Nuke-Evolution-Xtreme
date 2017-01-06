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
/************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      NukeSentinel                             v2.5.00      07/11/2006
      Nuke Patched                             v3.1.0       06/26/2005
      Advanced Security Extension              v1.0.0       12/22/2005
-=[Other]=-
      Dynamic Titles                           v1.0.0       06/11/2005
-=[Mod]=-
      Collapsing Blocks                        v1.0.0       08/16/2005
	  NSN Center Blocks                        v2.2.1       05/26/2009
 ************************************************************************/

if(!defined('HEADER')) {
    define('HEADER', true);
} else {
    return;
}

if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    exit('Access Denied');
}

require_once(dirname(__FILE__).'/mainfile.php');

function head() {
    global $sitename, $ab_config, $modheader, $cache;

    $ThemeSel = get_theme();
    include_once(NUKE_THEMES_DIR.$ThemeSel.'/theme.php');
    echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\n";
    echo "<html lang=\""._LANGCODE."\" dir=\""._LANG_DIRECTION."\">\n";
    echo "<head>\n";
/*****[BEGIN]******************************************
 [ Base:    Dynamic Titles                     v1.0.0 ]
 ******************************************************/
    include_once(NUKE_INCLUDE_DIR.'dynamic_titles.php');
/*****[END]********************************************
 [ Base:    Dynamic Titles                     v1.0.0 ]
 ******************************************************/
    include_once(NUKE_INCLUDE_DIR.'meta.php');
    include_once(NUKE_INCLUDE_DIR.'javascript.php');

    if ((($favicon = $cache->load('favicon', 'config')) === false) || empty($favicon)) {
        if (file_exists(NUKE_BASE_DIR.'favicon.ico')) {
            $favicon = "favicon.ico";
        } else if (file_exists(NUKE_IMAGES_DIR.'favicon.ico')) {
            $favicon = "images/favicon.ico";
        } else if (file_exists(NUKE_THEMES_DIR.$ThemeSel.'/images/favicon.ico')) {
            $favicon = "themes/$ThemeSel/images/favicon.ico";
        } else {
            $favicon = 'none';
        }
        if ($favicon != 'none') {
            echo "<link rel=\"shortcut icon\" href=\"$favicon\" type=\"image/x-icon\" />\n";
        }
        $cache->save('favicon', 'config', $favicon);
    } else {
        if ($favicon != 'none') {
            echo "<link rel=\"shortcut icon\" href=\"$favicon\" type=\"image/x-icon\" />\n";
        }
    }

    // If you use ForumNews Advance, you may want to replace the RSS News with the RSS ForumNews. Just remove the comments below and comment out the RSS News.
    //echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS $sitename &raquo; ForumNews\" href=\"rss.php?feed=forumnews\">\n";
    echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS $sitename &raquo; News\" href=\"rss.php?feed=news\">\n";
    echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS $sitename &raquo; Forums\" href=\"rss.php?feed=forums\">\n";
    echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS $sitename &raquo; Downloads\" href=\"rss.php?feed=downloads\">\n";
    echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS $sitename &raquo; Web Links\" href=\"rss.php?feed=weblinks\">\n";

    global $browser;
    $style = "<link rel=\"stylesheet\" href=\"themes/$ThemeSel/style/style.css\" type=\"text/css\">\n";
    if ($browser == 'ie' || $browser == 'konqueror' || $browser == 'MSIE') {
        if (file_exists('themes/'.$ThemeSel.'/style/style_ie.css')) {
            $style = "<link rel=\"stylesheet\" href=\"themes/$ThemeSel/style/style_ie.css\" type=\"text/css\">\n";
        }
    } else if ($browser == 'Mozilla' || $browser == 'Firefox' || $browser == 'Gecko' || $browser == 'Netscape') {
        if (file_exists('themes/'.$ThemeSel.'/style/style_moazilla.css')) {
            $style = "<link rel=\"stylesheet\" href=\"themes/$ThemeSel/style/style_mozilla.css\" type=\"text/css\">\n";
        }
    } else if ($browser == 'Opera') {
        if (file_exists('themes/'.$ThemeSel.'/style/style_opera.css')) {
            $style = "<link rel=\"stylesheet\" href=\"themes/$ThemeSel/style/style_opera.css\" type=\"text/css\">\n";
        }
    }

    echo $style;

    if(isset($modheader)) {
        echo $modheader;
    }
    if ((($custom_head = $cache->load('custom_head', 'config')) === false) || empty($custom_head)) {
        $custom_head = array();
        if (file_exists(NUKE_INCLUDE_DIR.'custom_files/custom_head.php')) {
            $custom_head[] = 'custom_head';
        }
        if (file_exists(NUKE_INCLUDE_DIR.'custom_files/custom_header.php')) {
            $custom_head[] = 'custom_header';
        }
        if (!empty($custom_head)) {
            foreach ($custom_head as $file) {
                include_once(NUKE_INCLUDE_DIR.'custom_files/'.$file.'.php');
            }
        }
        $cache->save('custom_head', 'config', $custom_head);
    } else {
        if (!empty($custom_head)) {
            foreach ($custom_head as $file) {
                include_once(NUKE_INCLUDE_DIR.'custom_files/'.$file.'.php');
            }
        }
    }
    echo "</head>\n";
/*****[BEGIN]******************************************
 [ Base:    NukeSentinel                      v2.5.00 ]
 ******************************************************/
    if($ab_config['site_switch'] == 1) {
        echo '<center><img src="images/nukesentinel/disabled.png" alt="'._AB_SITEDISABLED.'" title="'._AB_SITEDISABLED.'" border="0" /></center><br />';
    }
/*****[END]********************************************
 [ Base:    NukeSentinel                      v2.5.00 ]
 ******************************************************/
    themeheader();
}

function online() {

    global $prefix, $db, $name, $board_config, $userinfo, $identify;

    $ip = $identify->get_ip();
    $url = (defined('ADMIN_FILE')) ? 'index.php' : Fix_Quotes($_SERVER['REQUEST_URI']);
    $uname = $ip;
    $guest = 1;
    $user_agent = $identify->identify_agent();
    if (is_user()) {
        $uname = $userinfo['username'];
        $guest = 0;
/*****[BEGIN]******************************************
 [ Base:    Advanced Security Extension        v1.0.0 ]
 ******************************************************/
    } elseif($user_agent['engine'] == 'bot') {
        $uname = $user_agent['bot'];
        $guest = 3;
    }
/*****[END]********************************************
 [ Base:    Advanced Security Extension        v1.0.0 ]
 ******************************************************/
    $custom_title = $name;
    $url = str_replace("&amp;", "&", $url);
    $past = time() - $board_config['online_time'];
    $db->sql_query('DELETE FROM '.$prefix.'_session WHERE time < "'.$past.'"');
    $ctime = time();
    list($count) = $db->sql_ufetchrow("SELECT COUNT(*) FROM ".$prefix."_session WHERE uname='$uname' OR host_addr='$ip'");
    if ($count >= 1) {
       $result = $db->sql_query('UPDATE '.$prefix.'_session SET time="'.$ctime.'", guest="'.$guest.'", module="'.$custom_title.'", url="'.$url.'" WHERE uname="'.$uname.'" OR host_addr="'.$ip.'"');
       $db->sql_freeresult($result);
    } else {
       $db->sql_query('INSERT INTO '.$prefix.'_session (uname, time, starttime, host_addr, guest, module, url) VALUES ("'.$uname.'", "'.$ctime.'", "'.$ctime.'", "'.$ip.'", "'.$guest.'","'.$custom_title.'", "'.$url.'")');
    }
}

online();
head();

/*****[BEGIN]******************************************
 [ Mod:    NSN Center Blocks                   v2.2.1 ]
 ******************************************************/
if (!defined('ADMIN_FILE')) {
	include_once(NUKE_INCLUDE_DIR.'counter.php');

	if (defined('HOME_FILE')) {
		include_once(NUKE_INCLUDE_DIR.'messagebox.php');
		blocks('Center');

		// If you want either of the following on all pages simply
		// move the include to before if (defined('HOME_FILE'))
		//
		// Visit www.evolution-xtreme.com for support if your stuck
		include(NUKE_INCLUDE_DIR.'cblocks1.php');
		include(NUKE_INCLUDE_DIR.'cblocks2.php');
	}
}
/*****[END]********************************************
 [ Mod:    NSN Center Blocks                   v2.2.1 ]
 ******************************************************/

?>