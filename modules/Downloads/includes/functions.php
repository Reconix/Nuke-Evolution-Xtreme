<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : functions.php
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

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
      Caching System                           v1.0.0       10/31/2005
 ************************************************************************/

if(!defined('IN_DOWNLOADS')) {
  exit('Access Denied');
}

function RandomNumber($length=10)
{
	$random = "";
	$chars = "123456789abcdefghijklmnopqrstuvwxyz";
	srand((double)microtime()*1000000);
	for ($i = 0; $i < $length; $i++)
	{
		$random = $random . substr ($chars, rand() % strlen($chars), 1);
	}
	return $random;
}

function of_group($gid) {
    global $prefix, $db, $userinfo, $module_name;
    if (is_mod_admin($module_name)) {
        return 1;
    } elseif (is_user()) {
        $guid = $userinfo['user_id'];
        $currdate = time();
        $result = $db->sql_query("SELECT COUNT(*) FROM ".$prefix."_bbuser_group WHERE group_id='".$gid."' AND user_id='$guid' AND user_pending != '1'");
        list($ingroup) = $db->sql_fetchrow($result);
        if ($ingroup > 0) { return 1; }
    }
    return 0;
}

function myimage($imgfile) {
    global $module_name;
    $ThemeSel = get_theme();
    if (file_exists("themes/$ThemeSel/images/downloads/$imgfile")) {
        $myimage = "themes/$ThemeSel/images/downloads/$imgfile";
    } else {
        $myimage = "modules/$module_name/images/$imgfile";
    }
    return($myimage);
}

// Copyright (c) 2003 --- NukeScripts Network ---
// Can not be reproduced in whole or in part without
// written consent from NukeScripts Network CEO
function downloads_get_configs(){
    global $prefix, $db, $cache;
    static $config;
    if(isset($config)) return $config;
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
    if(($config = $cache->load('downloads', 'config')) === false) {
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
        $configresult = $db->sql_query("SELECT config_name, config_value FROM ".$prefix."_downloads_config");
        while (list($config_name, $config_value) = $db->sql_fetchrow($configresult)) {
            $config[$config_name] = $config_value;
        }
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
        $cache->save('downloads', 'config', $config);
    }
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
    return $config;
}

// Copyright (c) 2003 --- NukeScripts Network ---
// Can not be reproduced in whole or in part without
// written consent from NukeScripts Network CEO
function downloads_save_config($config_name, $config_value){
    global $prefix, $db, $cache;
    $db->sql_query("UPDATE ".$prefix."_downloads_config SET config_value='$config_value' WHERE config_name='$config_name'");
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
    $cache->delete('downloads', 'config');
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
}

// Copyright (c) 2003 --- NukeScripts Network ---
// Can not be reproduced in whole or in part without
// written consent from NukeScripts Network CEO
function CrawlLevelR($parentid) {
    global $prefix, $db, $crawler;
    $bresult = $db->sql_query("SELECT parentid FROM ".$prefix."_downloads_categories WHERE cid='$parentid' ORDER BY title");
    while(list($parentid2)=$db->sql_fetchrow($bresult)){
        array_push($crawler,$parentid2);
        CrawlLevelR($parentid2);
    }
    return $crawler;
}

// Copyright (c) 2003 --- NukeScripts Network ---
// Can not be reproduced in whole or in part without
// written consent from NukeScripts Network CEO
function CrawlLevel($cid) {
    global $prefix, $db, $crawled;
    $bresult = $db->sql_query("SELECT cid FROM ".$prefix."_downloads_categories WHERE parentid='$cid' ORDER BY title");
    while(list($cid2)=$db->sql_fetchrow($bresult)){
        array_push($crawled,$cid2);
        CrawlLevel($cid2);
    }
    return $crawled;
}

function CoolSize($size) {
    $mb = 1024*1024;
    $gb = $mb*1024;
    if ( $size > $gb ) {
        $mysize = sprintf ("%01.2f",$size/$gb)." "._GB;
    } elseif ( $size > $mb ) {
        $mysize = sprintf ("%01.2f",$size/$mb)." "._MB;
    } elseif ( $size >= 1024 ) {
        $mysize = sprintf ("%01.2f",$size/1024)." "._KB;
    } else {
        $mysize = $size." "._BYTES;
    }
    return $mysize;
}

// Copyright (c) 2003 --- NukeScripts Network ---
// Can not be reproduced in whole or in part without
// written consent from NukeScripts Network CEO
function CoolDate($date) {
    global $dl_config;
    $mydate = formatTimestamp($date);
    return $mydate;
}

// Copyright (c) 2003 --- Michael K. Squires ---
// Can not be reproduced in whole or in part without
// written consent from Michael K. Squires
function getcategoryinfo($catID){
    global $prefix, $db, $user;
    $category = array($catID);
    $cats_detected = 0;
    $downloads_detected = 0;
    while(count($category) != 0){
        sort($category, SORT_STRING);
        reset($category);
        $curr_category = end($category);
        $dresult = $db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads WHERE cid='$curr_category'");
        $catdownloads = $db->sql_numrows($dresult);
        $downloads_detected += $catdownloads;
        $cresult = $db->sql_query("SELECT cid FROM ".$prefix."_downloads_categories WHERE parentid='$curr_category'");
        while (list($cid) = $db->sql_fetchrow($cresult)){
            array_unshift($category, "$cid");
            $cats_detected++;
        }
        array_pop($category);
    }
    $categoryinfo['categories'] = $cats_detected;
    $categoryinfo['downloads'] = $downloads_detected;
    return $categoryinfo;
}

function getparent($parentid,$title) {
    global $prefix,$db;
    $result = $db->sql_query("SELECT * FROM ".$prefix."_downloads_categories WHERE cid='$parentid'");
    $cidinfo = $db->sql_fetchrow($result);
    if ($cidinfo['title'] != "") $title = $cidinfo['title']." -> ".$title;
    if ($cidinfo['parentid'] != 0) { $title=getparent($cidinfo['parentid'], $title); }
    return $title;
}

function getparentlink($parentid,$title) {
    global $prefix, $db, $module_name;
    $parentid = intval($parentid);
    $cidinfo = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_downloads_categories WHERE cid=$parentid"));
    if ($cidinfo['title'] != "") $title = "<a href='modules.php?name=$module_name&amp;cid=".$cidinfo['cid']."'>".$cidinfo['title']."</a> -&gt; ".$title;
    if ($cidinfo['parentid'] != 0) { $title = getparentlink($cidinfo['parentid'],$title); }
    return $title;
}

// Copyright (c) 2003 --- NukeScripts Network ---
// Can not be reproduced in whole or in part without
// written consent from NukeScripts Network CEO
function restricted($perm) {
    global $db, $prefix, $module_name;
    if ($perm == 1) {
        $who_view = _DL_USERS;
    } elseif ($perm == 2) {
        $who_view = _DL_ADMIN;
    } elseif ($perm >2) {
        $newView = $perm - 2;
        list($who_view) = $db->sql_fetchrow($db->sql_query("SELECT group_name FROM ".$prefix."_bbgroups WHERE group_id=$newView"));
        $who_view = $who_view." "._DL_ONLY;
    }
    $myimage = myimage("restricted.png");
    echo "<center><img src='$myimage' alt=''></center><br />\n";
    echo "<center>"._DL_DENIED."!</center><br />\n";
    echo "<center>"._DL_CANBEDOWN." $who_view</center><br />\n";
    echo "<center>"._GOBACK."</center>\n";
}

// Copyright (c) 2003 --- NukeScripts Network ---
// Can not be reproduced in whole or in part without
// written consent from NukeScripts Network CEO
function restricted2($perm) {
    global $db, $prefix, $module_name;
    if ($perm == 1) {
        $who_view = _DL_USERS;
    } elseif ($perm == 2) {
        $who_view = _DL_ADMIN;
    } elseif ($perm >2) {
        $newView = $perm - 2;
        list($who_view) = $db->sql_fetchrow($db->sql_query("SELECT group_name FROM ".$prefix."_bbgroups WHERE group_id=$newView"));
        $who_view = $who_view." "._DL_ONLY;
    }
    echo "<center>"._DL_DENIED."!<br />\n";
    echo ""._DL_CANBEVIEW."<br /><strong>$who_view</strong></center>\n";
}

function newdownloadgraphic($datetime, $time) {
    global $module_name;
    echo "&nbsp;";
    setlocale (LC_TIME, $locale);
    preg_match ("/([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2}) ([0-9]{1,2})\:([0-9]{1,2})\:([0-9]{1,2})/", $time, $datetime);
    $datetime = strftime(""._LINKSDATESTRING."", mktime($datetime[4],$datetime[5],$datetime[6],$datetime[2],$datetime[3],$datetime[1]));
    $datetime = ucfirst($datetime);
    $startdate = time();
    $count = 0;
    while ($count <= 14) {
        $daysold = date("d-M-Y", $startdate);
        if ($daysold == $datetime) {
            $myimage = myimage("new_01.png");
            if ($count<=1) { echo "<img align='middle' src='$myimage' alt='"._NEWTODAY."' title='"._NEWTODAY."'>"; }
            $myimage = myimage("new_03.png");
            if ($count<=3 && $count>1) { echo "<img align='middle' src='$myimage' alt='"._NEWLAST3DAYS."' title='"._NEWLAST3DAYS."'>"; }
            $myimage = myimage("new_07.png");
            if ($count<=7 && $count>3) { echo "<img align='middle' src='$myimage' alt='"._NEWTHISWEEK."' title='"._NEWTHISWEEK."'>"; }
        }
        $count++;
        $startdate = (time()-(86400 * $count));
    }
}

function newcategorygraphic($cat) {
    global $prefix, $db, $module_name;
    $cat = intval($cat);
    $newresult = $db->sql_query("SELECT date FROM ".$prefix."_downloads_downloads WHERE cid=$cat ORDER BY date DESC LIMIT 1");
    list($time)=$db->sql_fetchrow($newresult);
    echo "&nbsp;";
    setlocale (LC_TIME, $locale);
    preg_match ("/([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2}) ([0-9]{1,2})\:([0-9]{1,2})\:([0-9]{1,2})/", $time, $datetime);
    $datetime = strftime(""._LINKSDATESTRING."", mktime($datetime[4],$datetime[5],$datetime[6],$datetime[2],$datetime[3],$datetime[1]));
    $datetime = ucfirst($datetime);
    $startdate = time();
    $count = 0;
    while ($count <= 14) {
        $daysold = date("d-M-Y", $startdate);
        if ("$daysold" == "$datetime") {
            $myimage = myimage("new_01.png");
            if ($count<=1) { echo "<img align='top' src='$myimage' alt='"._DCATNEWTODAY."' title='"._DCATNEWTODAY."'>"; }
            $myimage = myimage("new_03.png");
            if ($count<=3 && $count>1) { echo "<img align='top' src='$myimage' alt='"._DCATLAST3DAYS."' title='"._DCATLAST3DAYS."'>"; }
            $myimage = myimage("new_07.png");
            if ($count<=7 && $count>3) { echo "<img align='top' src='$myimage' alt='"._DCATTHISWEEK."' title='"._DCATTHISWEEK."'>"; }
        }
        $count++;
        $startdate = (time()-(86400 * $count));
    }
}

function popgraphic($hits) {
    global $module_name, $dl_config;
    $hits = intval($hits);
    $myimage = myimage("popular.png");
    if ($hits >= $dl_config['popular']) { echo "&nbsp;<img align='top' src='$myimage' alt='"._POPULAR."' title='"._POPULAR."'>"; }
}

function DLadminmain() {
    global $admin_file, $module_name, $prefix, $db, $textcolor1, $bgcolor1, $bgcolor2;
    $result = $db->sql_query("SELECT * FROM ".$prefix."_downloads_mods WHERE brokendownload='1'");
    $brokendownloads = $db->sql_numrows($result);
    $db->sql_freeresult($result);
    $result = $db->sql_query("SELECT * FROM ".$prefix."_downloads_mods WHERE brokendownload='0'");
    $modrequests = $db->sql_numrows($result);
    $db->sql_freeresult($result);
    $result = $db->sql_query("SELECT * FROM ".$prefix."_downloads_new");
    $newdownloads = $db->sql_numrows($result);
    $db->sql_freeresult($result);
    OpenTable();
    echo "<table align='center' border='0' cellpadding='2' cellspacing='2' width='100%'>\n";
    echo "<tr>\n";
    echo "<td align='center' width='25%'><strong>"._DOWNLOADS."</strong></td>\n";
    echo "<td align='center' width='25%'><strong>"._CATEGORIES."</strong></td>\n";
    echo "<td align='center' width='25%'><strong>"._EXTENSIONS."</strong></td>\n";
    echo "<td align='center' width='25%'><strong>"._OTHERS."</strong></td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td align='center' width='25%'><a href='".$admin_file.".php?op=DownloadAdd'>"._ADDDOWNLOAD."</a></td>\n";
    echo "<td align='center' width='25%'><a href='".$admin_file.".php?op=CategoryAdd'>"._ADDCATEGORY."</a></td>\n";
    echo "<td align='center' width='25%'><a href='".$admin_file.".php?op=ExtensionAdd'>"._ADDEXTENSION."</a></td>\n";
    echo "<td align='center' width='25%'><a href='".$admin_file.".php?op=DLConfig'>"._DOWNCONFIG."</a></td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td align='center' width='25%'><a href='".$admin_file.".php?op=Downloads'>"._DOWNLOADSLIST."</a></td>\n";
    echo "<td align='center' width='25%'><a href='".$admin_file.".php?op=Categories'>"._CATEGORIESLIST."</a></td>\n";
    echo "<td align='center' width='25%'><a href='".$admin_file.".php?op=Extensions'>"._EXTENSIONSLIST."</a></td>\n";
    //echo "<td align='center' width='25%'><a href='".$admin_file.".php'>"._MAINADMIN."</a></td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td align='center' width='25%'><a href='".$admin_file.".php?op=FilesizeCheck'>"._VALIDATESIZES."</a></td>\n";
    echo "<td align='center' width='25%'><a href='".$admin_file.".php?op=CategoryTransfer'>"._CATTRANS."</a></td>\n";
    echo "<td align='center' width='25%'>&nbsp;</td>\n";
    echo "<td align='center' width='25%'><a href='".$admin_file.".php?op=DownloadBroken'>"._BROKENREP."</a> ($brokendownloads)</td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td align='center' width='25%'>&nbsp;</td>\n";
    echo "<td align='center' width='25%'>&nbsp;</td>\n";
    echo "<td align='center' width='25%'>&nbsp;</td>\n";
    echo "<td align='center' width='25%'><a href='".$admin_file.".php?op=DownloadModifyRequests'>"._MODREQUEST."</a> ($modrequests)</td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td align='center' width='25%'>&nbsp;</td>\n";
    echo "<td align='center' width='25%'>&nbsp;</td>\n";
    echo "<td align='center' width='25%'>&nbsp;</td>\n";
    echo "<td align='center' width='25%'><a href='".$admin_file.".php?op=DownloadNew'>"._WAITINGDOWNLOADS."</a> ($newdownloads)</td>\n";
    echo "</tr>\n";
    echo "</table>\n";
    CloseTable();
}

function convertorderbyin($orderby) {
    if ($orderby == "titleA") $orderby = "title ASC";
    if ($orderby == "dateA") $orderby = "date ASC";
    if ($orderby == "hitsA") $orderby = "hits ASC";
    if ($orderby == "titleD") $orderby = "title DESC";
    if ($orderby == "dateD") $orderby = "date DESC";
    if ($orderby == "hitsD") $orderby = "hits DESC";
    return $orderby;
}

function convertorderbytrans($orderby) {
    if ($orderby == "hits ASC") $orderbyTrans = _POPULARITY1;
    if ($orderby == "hits DESC") $orderbyTrans = _POPULARITY2;
    if ($orderby == "title ASC") $orderbyTrans = _TITLEAZ;
    if ($orderby == "title DESC") $orderbyTrans = _TITLEZA;
    if ($orderby == "date ASC") $orderbyTrans = _DDATE1;
    if ($orderby == "date DESC") $orderbyTrans = _DDATE2;
    return $orderbyTrans;
}

function convertorderbyout($orderby) {
    if ($orderby == "title ASC") $orderby = "titleA";
    if ($orderby == "date ASC") $orderby = "dateA";
    if ($orderby == "hits ASC") $orderby = "hitsA";
    if ($orderby == "title DESC") $orderby = "titleD";
    if ($orderby == "date DESC") $orderby = "dateD";
    if ($orderby == "hits DESC") $orderby = "hitsD";
    return $orderby;
}

// GUI TWEAK BY phoenix-cms
function menu($maindownload) {
    global $module_name;
	$ThemeSel = get_theme();
    OpenTable();
	if (file_exists("themes/$ThemeSel/images/downloads/down-logo.gif")) {
	echo "<center><a href='modules.php?name=$module_name'><img src=\"themes/$ThemeSel/images/downloads/down-logo.gif\" border=\"0\" alt=\"\"></a></center><br />\n";
    } else {
	$myimage = myimage("down-logo.gif");
    echo "<center><a href='modules.php?name=$module_name'><img src='$myimage' border='0' alt=''></a></center><br />\n";
    }
	SearchForm();
    echo "<br /><center>";
    if ($maindownload>0) {
	if (file_exists("themes/$ThemeSel/images/downloads/main.gif")) {
	echo "<a href='modules.php?name=$module_name'><img border=\"0\" src=\"themes/$ThemeSel/images/downloads/main.gif\" alt=\"\"></a>";
	 } else {
	echo "<a href='modules.php?name=$module_name'><img border=\"0\" src=\"modules/$module_name/images/main.gif\" alt=\"\"></a>";
	}
	}
	if (file_exists("themes/$ThemeSel/images/downloads/add.gif")) {
	echo " <a href='modules.php?name=$module_name&amp;op=SubmitDownloads'><img border=\"0\" src=\"themes/$ThemeSel/images/downloads/add.gif\" alt=\"\"></a>";
    } else {
	echo " <a href='modules.php?name=$module_name&amp;op=SubmitDownloads'><img border=\"0\" src=\"modules/$module_name/images/add.gif\" alt=\"\"></a>";
    }
	if (file_exists("themes/$ThemeSel/images/downloads/add.gif")) {
	echo " <a href='modules.php?name=$module_name&amp;op=NewDownloads'><img border=\"0\" src=\"themes/$ThemeSel/images/downloads/new.gif\" alt=\"\"></a>";
	} else {
	echo " <a href='modules.php?name=$module_name&amp;op=NewDownloads'><img border=\"0\" src=\"modules/$module_name/images/new.gif\" alt=\"\"></a>";
    }
	if (file_exists("themes/$ThemeSel/images/downloads/popular.gif")) {
	echo " <a href='modules.php?name=$module_name&amp;op=MostPopular'><img border=\"0\" src=\"themes/$ThemeSel/images/downloads/popular.gif\" alt=\"\"></a>";
    } else {
	echo " <a href='modules.php?name=$module_name&amp;op=MostPopular'><img border=\"0\" src=\"modules/$module_name/images/popular.gif\" alt=\"\"></a>";
    }
	echo "</center>\n";
    CloseTable();
    echo "<br />\n";
    OpenTable();
	
		echo "<table align='center' cellpadding='2' cellspacing='2' border='0' width='100%'>\n";
		echo "  <tr>";
		echo "    <td align='center' colspan='4'><strong>"._DL_LEGEND."</strong></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <td align='center' width='25%'><img align='middle' src='". myimage("new_01.png") ."' alt='' title=''> = ". _NEWTODAY ."</td>\n";
		echo "    <td align='center' width='25%'><img align='middle' src='". myimage("new_03.png") ."' alt='' title=''> = ". _NEWLAST3DAYS ."</td>\n";
		echo "    <td align='center' width='25%'><img align='middle' src='". myimage("new_07.png") ."' alt='' title=''> = ". _NEWTHISWEEK ."</strong></td>\n";
		echo "    <td align='center' width='25%'><img align='middle' src='". myimage("popular.png") ."' alt='' title=''> = ". _POPULAR ."</strong></td>\n";
		echo "  </tr>\n";
		echo "</table>\n";
	
    CloseTable();
}
// GUI TWEAK BY phoenix-cms

function SearchForm() {
    global $module_name, $query;
    echo "<form action='modules.php?name=$module_name&amp;op=search&amp;query=$query' method='post'>\n";
    echo "<table border='0' cellspacing='0' cellpadding='0' align='center'>\n";
    echo "<tr><td><span class='content'><input type='text' size='25' name='query' value='$query'> <input type='submit' value='"._DL_SEARCH."'></span></td></tr>\n";
    echo "</table>\n";
    echo "</form>\n";
}

// Copyright (c) 2003 --- NukeScripts Network ---
// Can not be reproduced in whole or in part without
// written consent from NukeScripts Network CEO
function showlisting($lid) 
{
	global $admin_file, $module_name, $admin, $db, $prefix, $user, $dl_config;
    $lid = intval($lid);
    $result = $db->sql_query("SELECT * FROM `". $prefix ."_downloads_downloads` WHERE `lid`='". $lid ."'");
	$lidinfo = $db->sql_fetchrow($result);
    OpenTable();
		
		$priv = $lidinfo['sid'] - 2;
    	if (($lidinfo['sid'] == 0) || ($lidinfo['sid'] == 1 AND is_user())  || ($lidinfo['sid'] == 2 AND is_mod_admin($module_name)) || ($lidinfo['sid'] > 2 AND of_group($priv)) || $dl_config['show_download'] == '1') 
		{
			$lidinfo['lid']         = $lidinfo['lid'];
			$lidinfo['title']       = stripslashes($lidinfo['title']);
			$lidinfo['url']         = stripslashes($lidinfo['url']);
			$lidinfo['hits']        = (int) $lidinfo['hits'];
			$lidinfo['date']        = $lidinfo['date'];
			$lidinfo['description'] = stripslashes($lidinfo['description']);
			$lidinfo['fixes']       = stripslashes($lidinfo['fixes']);
			$lidinfo['features']    = stripslashes($lidinfo['features']);
			$lidinfo['name']		= stripslashes($lidinfo['name']);
			$lidinfo['email']		= stripslashes($lidinfo['email']);
			$lidinfo['homepage']	= stripslashes($lidinfo['homepage']);
			$lidinfo['filesize']	= stripslashes($lidinfo['filesize']);
			$lidinfo['version']		= stripslashes($lidinfo['version']);
				
			if ($lidinfo['sid'] == 0) 
			{
				$who_view = _DL_ALL;
			} 
			elseif ($lidinfo['sid'] == 1)
			{
				$who_view = _DL_USERS;
			} 
			elseif ($lidinfo['sid'] == 2) 
			{
				$who_view = _DL_ADMIN;
			} 
			elseif ($lidinfo['sid'] > 2) 
			{
				$newView = $lidinfo['sid'] - 2;
				list($who_view) = $db->sql_ufetchrow("SELECT `group_name` FROM `". $prefix ."_bbgroups` WHERE `group_id`=". $newView ."");
				$who_view = $who_view." "._DL_ONLY;
			}
			echo "<table width=\"100%\" cellpadding=\"5\" cellspacing=\"3\" border=\"0\">\n";
			echo "  <tr>\n";
			echo "    <th colspan=\"3\" align=\"left\" valign=\"top\">". $lidinfo['title'] ."</th>\n";
			echo "  </tr>\n";
			/*echo "  <tr>\n";
			echo "    <td colspan=\"2\">";
			echo "      <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\n";
			echo "        <tr>\n";
			echo "          <td align=\"left\"><b>". $lidinfo['title'] ."</b> ";
			newdownloadgraphic($datetime, $lidinfo['date']);
        	popgraphic($lidinfo['hits']);
			echo "          </td>\n";
			echo "        </tr>\n";
			echo "      </table>\n";
			echo "    </td>\n";
			echo "  </tr>\n";*/
			
			echo "  <tr>\n";
			echo "    <td>";
			echo "    <div style=\"padding: 5px; border: 1px dashed #AAA; float: right; font-size: 0.9em;\">";
			echo "		<ul style=\"list-style-type: none; text-align: left; padding: 0px 0px 0px 5px; line-height: 1.5em; margin: 0;\">";
			echo "			<li><img src=\"modules/". $module_name ."/images/author.png\" alt=\"version\" /> <strong>Author:</strong> ". $lidinfo['name'] ."</li>";
			echo "			<li><img src=\"modules/". $module_name ."/images/version.png\" alt=\"version\" /> <strong>Version:</strong> ". (($lidinfo['version'] <> '') ? $lidinfo['version'] : 'N/A') ."</li>";
			echo "			<li><img src=\"modules/". $module_name ."/images/downloads.png\" alt=\"downloads\" /> <strong>Downloads:</strong> ". $lidinfo['hits'] ."</li>";
			echo "			<li><img src=\"modules/". $module_name ."/images/size.png\" alt=\"size\" /> <strong>File Size:</strong> ". CoolSize($lidinfo['filesize']) ."</li>";
			echo "			<li><img src=\"modules/". $module_name ."/images/date.png\" alt=\"date\" /> <strong>Date:</strong> ". $lidinfo['date'] ."</li>";
			echo "		</ul>";
			echo "	  </div>";
			echo "    <p>";
			echo "<b>". $lidinfo['title'] ."</b> ";
			newdownloadgraphic($datetime, $lidinfo['date']);
        	popgraphic($lidinfo['hits']);
			
			echo "<br /><br /><b>Description</b><br /><br />";
			echo decode_bbcode(set_smilies(stripslashes($lidinfo['description'])), 1, true);
			echo "    </p>";
			echo "    </td>\n";
			echo "  </tr>\n";	
				
			if($lidinfo['fixes'])
			{
				echo "  <tr>\n";
				echo "    <td colspan=\"2\"><b>Fixes</b></td>\n";
				echo "  </tr>\n";
				echo "  <tr>\n";
				echo "    <td colspan=\"2\">";
				echo decode_bbcode(set_smilies(stripslashes($lidinfo['fixes'])), 1, true);
				echo "    </td>";
				echo "  </tr>\n";
			}
				
			if($lidinfo['features'])
			{
				echo "  <tr>\n";
				echo "    <td colspan=\"2\"><b>Features</b></td>\n";
				echo "  </tr>\n";
				echo "  <tr>\n";
				echo "    <td colspan=\"2\">";
				echo decode_bbcode(set_smilies(stripslashes($lidinfo['features'])), 1, true);
				echo "    </td>";
				echo "  </tr>\n";
			}				
				
			echo "  <tr>\n";
			echo "    <td colspan=\"2\"><b>Screenshots</b></td>\n";
			echo "  </tr>\n";
			echo "  <tr>\n";
			echo "    <td colspan=\"2\">";
			if($lidinfo['screenshot1'] || $lidinfo['screenshot2'] || $lidinfo['screenshot3'] || $lidinfo['screenshot4'])
			{
				if($lidinfo['screenshot1'])
				{
					$lidinfo['screenshot1'] = "modules/". $module_name ."/screenshots/". $lidinfo['screenshot1'];
					echo "<a href=\"". $lidinfo['screenshot1'] ."\" rel=\"lytebox[screenshot". $lidinfo['lid'] ."]\"><img src=\"". $lidinfo['screenshot1'] ."\" width=\"130\" border=\"1\"></a>&nbsp;";
				}
				if($lidinfo['screenshot2'])
				{
					$lidinfo['screenshot2'] = "modules/". $module_name ."/screenshots/". $lidinfo['screenshot2'];
					echo "<a href=\"". $lidinfo['screenshot2'] ."\" rel=\"lytebox[screenshot". $lidinfo['lid'] ."]\"><img src=\"". $lidinfo['screenshot2'] ."\" width=\"130\" border=\"1\"></a>&nbsp;";
				}
				if($lidinfo['screenshot3'])
				{
					$lidinfo['screenshot3'] = "modules/". $module_name ."/screenshots/". $lidinfo['screenshot3'];
					echo "<a href=\"". $lidinfo['screenshot3'] ."\" rel=\"lytebox[screenshot". $lidinfo['lid'] ."]\"><img src=\"". $lidinfo['screenshot3'] ."\" width=\"130\" border=\"1\"></a>&nbsp;";
				}
				if($lidinfo['screenshot4'])
				{
					$lidinfo['screenshot4'] = "modules/". $module_name ."/screenshots/". $lidinfo['screenshot4'];
					echo "<a href=\"". $lidinfo['screenshot4'] ."\" rel=\"lytebox[screenshot". $lidinfo['lid'] ."]\"><img src=\"". $lidinfo['screenshot4'] ."\" width=\"130\" border=\"1\"></a>";
				}
			}
			else
			{
				echo "<img src=\"modules/". $module_name ."/images/blank.gif\" width=\"130\" border=\"0\">";
			}
			echo "    </td>\n";
			echo "  </tr>\n";
			echo "<form action=\"modules.php?name=". $module_name ."&amp;op=retrievedownload\" method=\"post\">";
			echo "<input type=\"hidden\" name=\"lid\" value=\"". $lid ."\">";
			echo "  <tr>";
			echo "    <td colspan=\"2\" align=\"center\">";
			//echo "        <tr>\n";
			if ($dl_config['usegfxcheck'] == 1) 
			{
				echo security_code(1, 'stacked', 1);
			}
			echo "    </td>\n";
			echo "  </tr>";	
			echo "  <tr>\n";
			echo "    <td colspan=\"2\">";
			echo "      <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\n";
			echo "        <tr>\n";
			echo "          <td align=\"left\">&nbsp;</td>\n";
			echo "          <td align=\"right\">";
			echo "<input type=\"submit\" name=\"submit\" value=\"Download\" />&nbsp;";			
			if( $lidinfo['external_mirror1'] )
			{
				if($lidinfo['external_mirror1'] <> 'http://')
				{
					echo "<input type=\"submit\" name=\"submit\" value=\"External Mirror One\" />&nbsp;";
				}
			}			
			if( $lidinfo['external_mirror2'] )
			{
				if($lidinfo['external_mirror2'] <> 'http://')
				{
					echo "<input type=\"submit\" name=\"submit\" value=\"External Mirror Two\" />&nbsp;";
				}
			}
			echo "          </td>\n";
			echo "        </tr>\n";
			echo "      </table>\n";
			echo "    </td>\n";
			echo "  </tr>\n";
			echo "</form>";
			echo "</table>\n";
		}
		else
		{
			restricted2($lidinfo['sid']);
		}
	
	CloseTable();
}

// Copyright (c) 2003 --- NukeScripts Network ---
// Can not be reproduced in whole or in part without
// written consent from NukeScripts Network CEO
function showresulting($lid)
{
	global $admin_file, $module_name, $admin, $db, $prefix, $user, $dl_config;
    $lid = intval($lid);
    $result = $db->sql_query("SELECT * FROM `". $prefix ."_downloads_downloads` WHERE `lid`='". $lid ."'");
	$lidinfo = $db->sql_fetchrow($result);
    OpenTable();
		
		$priv = $lidinfo['sid'] - 2;
    	if (($lidinfo['sid'] == 0) || ($lidinfo['sid'] == 1 AND is_user())  || ($lidinfo['sid'] == 2 AND is_mod_admin($module_name)) || ($lidinfo['sid'] > 2 AND of_group($priv)) || $dl_config['show_download'] == '1') 
		{
			$lidinfo['lid']         = $lidinfo['lid'];
			$lidinfo['title']       = stripslashes($lidinfo['title']);
			$lidinfo['url']         = stripslashes($lidinfo['url']);
			$lidinfo['description'] = stripslashes($lidinfo['description']);
			$lidinfo['fixes']       = stripslashes($lidinfo['fixes']);
			$lidinfo['features']    = stripslashes($lidinfo['features']);
			$lidinfo['name']		= stripslashes($lidinfo['name']);
			$lidinfo['email']		= stripslashes($lidinfo['email']);
			$lidinfo['homepage']	= stripslashes($lidinfo['homepage']);
			$lidinfo['filesize']	= stripslashes($lidinfo['filesize']);
			$lidinfo['version']		= stripslashes($lidinfo['version']);
				
			if ($lidinfo['sid'] == 0) 
			{
				$who_view = _DL_ALL;
			} 
			elseif ($lidinfo['sid'] == 1)
			{
				$who_view = _DL_USERS;
			} 
			elseif ($lidinfo['sid'] == 2) 
			{
				$who_view = _DL_ADMIN;
			} 
			elseif ($lidinfo['sid'] > 2) 
			{
				$newView = $lidinfo['sid'] - 2;
				list($who_view) = $db->sql_ufetchrow("SELECT `group_name` FROM `". $prefix ."_bbgroups` WHERE `group_id`=". $newView ."");
				$who_view = $who_view." "._DL_ONLY;
			}
			echo "<table width=\"100%\" cellpadding=\"5\" cellspacing=\"3\" border=\"0\">\n";
			echo "  <tr>\n";
			echo "    <th colspan=\"3\" align=\"left\" valign=\"top\">". $lidinfo['title'] ."</th>\n";
			echo "  </tr>\n";
			echo "  <tr>\n";
			echo "    <td>";
			echo "      <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\n";
			echo "        <tr>\n";
			echo "          <td align=\"left\"><b>". $lidinfo['title'] ."</b> ";
			newdownloadgraphic($datetime, $lidinfo['date']);
        	popgraphic($lidinfo['hits']);
			echo "          </td>\n";
			echo "          <td align=\"right\">";
			echo "            <a href=\"modules.php?name=". $module_name ."&amp;op=retrievedownload&amp;lid=". $lid ."&amp;type=local\"><b>Download</b></a>";
			if( $lidinfo['external_mirror1'] )
			{
				if($lidinfo['external_mirror1'] <> 'http://')
				{
					echo " | <a href=\"modules.php?name=". $module_name ."&amp;op=retrievedownload&amp;lid=". $lid ."&amp;type=external1\"><b>External Mirror</b></a>";
				}
			}
			if( $lidinfo['external_mirror2'] )
			{
				if($lidinfo['external_mirror2'] <> 'http://')
				{
					echo " | <a href=\"modules.php?name=". $module_name ."&amp;op=retrievedownload&amp;lid=". $lid ."&amp;type=external2\"><b>External Mirror</b></a>";
				}
			}
			echo "          </td>\n";
			echo "        </tr>\n";
			echo "      </table>\n";
			echo "    </td>\n";
			echo "  </tr>\n";			
				
			echo "  <tr>\n";
			echo "    <td><b>Description</b></td>\n";
			echo "  </tr>\n";
			echo "  <tr>\n";
			echo "    <td>". decode_bbcode(set_smilies(stripslashes($lidinfo['description'])), 1, true) ."</td>\n";
			echo "  </tr>\n";				
				
			if($lidinfo['fixes'])
			{					
				$lidinfo['fixes'] = explode("\n", $lidinfo['fixes']);
				echo "  <tr>\n";
				echo "    <td><b>Fixes</b></td>\n";
				echo "  </tr>\n";
				echo "  <tr>\n";
				echo "    <td>";
				echo "    <ul>";
				for ($x = 0; $x < count($lidinfo['fixes']); $x++)
    			{
					echo "  <li>". decode_bbcode(set_smilies(stripslashes($lidinfo['fixes'][$x])), 1, true) ."</li>";
				}
				echo "    </ul>";
				echo "  </tr>\n";
			}
				
			if($lidinfo['features'])
			{
				$lidinfo['features'] = explode("\n",$lidinfo['features']);
				echo "  <tr>\n";
				echo "    <td><b>Features</b></td>\n";
				echo "  </tr>\n";
				echo "  <tr>\n";
				echo "    <td>";
				echo "    <ul>";
				for ($f = 0; $f < count($lidinfo['features']); $f++)
    			{
					echo "  <li>". decode_bbcode(set_smilies(stripslashes($lidinfo['features'][$f])), 1, true) ."</li>";
				}
				echo "    </ul>";
				echo "  </tr>\n";
			}				
				
			echo "  <tr>\n";
			echo "    <td><b>Screenshots</b></td>\n";
			echo "  </tr>\n";
			echo "  <tr>\n";
			echo "    <td>";
			if($lidinfo['screenshot1'] || $lidinfo['screenshot2'] || $lidinfo['screenshot3'] || $lidinfo['screenshot4'])
			{
				if($lidinfo['screenshot1'])
				{
					$lidinfo['screenshot1'] = "modules/". $module_name ."/screenshots/". $lidinfo['screenshot1'];
					echo "<a href=\"". $lidinfo['screenshot1'] ."\" rel=\"lytebox[screenshot". $lidinfo['lid'] ."]\"><img src=\"". $lidinfo['screenshot1'] ."\" width=\"130\" border=\"1\"></a>&nbsp;";
				}
				if($lidinfo['screenshot2'])
				{
					$lidinfo['screenshot2'] = "modules/". $module_name ."/screenshots/". $lidinfo['screenshot2'];
					echo "<a href=\"". $lidinfo['screenshot2'] ."\" rel=\"lytebox[screenshot". $lidinfo['lid'] ."]\"><img src=\"". $lidinfo['screenshot2'] ."\" width=\"130\" border=\"1\"></a>&nbsp;";
				}
				if($lidinfo['screenshot3'])
				{
					$lidinfo['screenshot3'] = "modules/". $module_name ."/screenshots/". $lidinfo['screenshot3'];
					echo "<a href=\"". $lidinfo['screenshot3'] ."\" rel=\"lytebox[screenshot". $lidinfo['lid'] ."]\"><img src=\"". $lidinfo['screenshot3'] ."\" width=\"130\" border=\"1\"></a>&nbsp;";
				}
				if($lidinfo['screenshot4'])
				{
					$lidinfo['screenshot4'] = "modules/". $module_name ."/screenshots/". $lidinfo['screenshot4'];
					echo "<a href=\"". $lidinfo['screenshot4'] ."\" rel=\"lytebox[screenshot". $lidinfo['lid'] ."]\"><img src=\"". $lidinfo['screenshot4'] ."\" width=\"130\" border=\"1\"></a>";
				}
			}
			else
			{
				echo "<img src=\"modules/". $module_name ."/images/blank.gif\" width=\"130\" border=\"0\">";
			}
			echo "    </td>\n";
			echo "  </tr>\n";
				
			echo "  <tr>\n";
			echo "    <td>";
			echo "      <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\n";
			echo "        <tr>\n";
			echo "          <td align=\"left\">&nbsp;</td>\n";
			echo "          <td align=\"right\">";
			echo "            <a href=\"modules.php?name=". $module_name ."&amp;op=retrievedownload&amp;lid=". $lid ."&amp;type=local\"><b>Download</b></a>";
			if( $lidinfo['external_mirror1'] )
			{
				if($lidinfo['external_mirror1'] <> 'http://')
				{
					echo " | <a href=\"modules.php?name=". $module_name ."&amp;op=retrievedownload&amp;lid=". $lid ."&amp;type=external1\"><b>External Mirror</b></a>";
				}
			}
			if( $lidinfo['external_mirror2'] )
			{
				if($lidinfo['external_mirror2'] <> 'http://')
				{
					echo " | <a href=\"modules.php?name=". $module_name ."&amp;op=retrievedownload&amp;lid=". $lid ."&amp;type=external2\"><b>External Mirror</b></a>";
				}
			}
			echo "          </td>\n";
			echo "        </tr>\n";
			echo "      </table>\n";
			echo "    </td>\n";
			echo "  </tr>\n";
			echo "</table>\n";
		}
		else
		{
			restricted2($lidinfo['sid']);
		}
	
	CloseTable();
}
/*function showresulting($lid) {
    global $admin_file, $module_name, $admin, $db, $prefix, $user, $dl_config;
    $lid = intval($lid);
    $lidinfo = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads WHERE lid=$lid"));
    OpenTable();
    $priv = $lidinfo['sid'] - 2;
    if (($lidinfo['sid'] == 0) || ($lidinfo['sid'] == 1 AND is_user())  || ($lidinfo['sid'] == 2 AND is_mod_admin($module_name)) || ($lidinfo['sid'] > 2 AND of_group($priv)) || $dl_config['show_download'] == '1') {
        $lidinfo['title'] = stripslashes($lidinfo['title']);
        $lidinfo['description'] = stripslashes($lidinfo['description']);
        if (is_mod_admin($module_name)) {
            $myimage = myimage("edit.png");
            echo "<a href='".$admin_file.".php?op=DownloadModify&amp;lid=$lid' target='$lid'><img align='middle' src='$myimage' border='0' alt='"._DL_EDIT."' title='"._DL_EDIT."'></a>&nbsp;";
        } else {
            $myimage = myimage("show.png");
            echo "<img align='middle' src='$myimage' border='0' alt='' title=''>&nbsp;";
        }
        echo "<a href='modules.php?name=$module_name&amp;op=getit&amp;lid=$lid'><strong>".$lidinfo['title']."</strong></a>";
        newdownloadgraphic($datetime, $lidinfo['date']);
        popgraphic($lidinfo['hits']);
        echo "<br />\n";
        if ($lidinfo['sid'] == 0) {
            $who_view = _DL_ALL;
        } elseif ($lidinfo['sid'] == 1) {
            $who_view = _DL_USERS;
        } elseif ($lidinfo['sid'] == 2) {
            $who_view = _DL_ADMIN;
        } elseif ($lidinfo['sid'] >2) {
            $newView = $lidinfo['sid'] - 2;
            list($who_view) = $db->sql_fetchrow($db->sql_query("SELECT group_name FROM ".$prefix."_bbgroups WHERE group_id=$newView"));
            $who_view = $who_view." "._DL_ONLY;
        }
        echo "<strong>"._DL_PERM.":</strong> $who_view<br />\n";
        echo "<strong>"._VERSION.":</strong> ".$lidinfo['version']."<br />\n";
        echo "<strong>"._FILESIZE.":</strong> ".CoolSize($lidinfo['filesize'])."<br />\n";
        echo "<strong>"._ADDEDON.":</strong> ".CoolDate($lidinfo['date'])."<br />\n";
        echo "<strong>"._DOWNLOADS.":</strong> ".$lidinfo['hits']."<br />\n";
        echo "<strong>"._HOMEPAGE.":</strong> ";
        if (empty($lidinfo['homepage']) || $lidinfo['homepage'] == "http://") {
            echo _DL_NOTLIST."<br />\n";
        } else {
            echo "<a href='".$lidinfo['homepage']."' target='new'>".$lidinfo['homepage']."</a><br />\n";
        }
        $result2 = $db->sql_query("SELECT * FROM ".$prefix."_downloads_categories WHERE cid='".$lidinfo['cid']."'");
        $cidinfo = $db->sql_fetchrow($result2);
        $cidinfo['title'] = "<a href=modules.php?name=$module_name&amp;cid=".$lidinfo['cid'].">".$cidinfo['title']."</a>";
        $cidinfo['title'] = getparentlink($cidinfo['parentid'], $cidinfo['title']);
        echo "<strong>"._CATEGORY.":</strong> ".$cidinfo['title']."\n";
    } else {
        restricted2($lidinfo['sid']);
    }
    CloseTable();
}*/

// Copyright (c) 2003 --- NukeScripts Network ---
// Can not be reproduced in whole or in part without
// written consent from NukeScripts Network CEO
function pagenums_admin($op, $totalselected, $perpage, $max) {
    global $admin_file;
    $pagesint = ($totalselected / $perpage);
    $pageremainder = ($totalselected % $perpage);
    if ($pageremainder != 0) {
        $pages = ceil($pagesint);
        if ($totalselected < $perpage) { $pageremainder = 0; }
    } else {
        $pages = $pagesint;
    }
    if ($pages != 1 && $pages != 0) {
        $counter = 1;
        $currentpage = ($max / $perpage);
        echo "<table border='0' cellpadding='2' cellspacing='2' width='100%'>\n";
        echo "<tr><form action='".$admin_file.".php' method='post'>\n";
        echo "<td align='right'><strong>"._DL_SELECTPAGE.": </strong><select name='min' onChange='top.location.href=this.options[this.selectedIndex].value'>\n";
        while ($counter <= $pages ) {
            $cpage = $counter;
            $mintemp = ($perpage * $counter) - $perpage;
            if ($counter == $currentpage) {
                echo "<option selected>$counter</option>\n";
            } else {
                echo "<option value='".$admin_file.".php?op=$op&amp;min=$mintemp";
                if ($op > "" ) { echo "&amp;op=$op"; }
                if ($query > "") { echo "&amp;query=$query"; }
                if (isset($cid)) { echo "&amp;cid=$cid"; }
                echo "'>$counter</option>\n";
            }
            $counter++;
        }
        echo "</select><strong> "._DL_OF." $pages "._DL_PAGES."</strong></td>\n</form>\n</tr>\n";
        echo "</table>\n";
    }
}

// Copyright (c) 2003 --- NukeScripts Network ---
// Can not be reproduced in whole or in part without
// written consent from NukeScripts Network CEO
function pagenums($cid, $query, $orderby, $op, $totalselected, $perpage, $max) {
    global $module_name;
    $pagesint = ($totalselected / $perpage);
    $pageremainder = ($totalselected % $perpage);
    if ($pageremainder != 0) {
        $pages = ceil($pagesint);
        if ($totalselected < $perpage) { $pageremainder = 0; }
    } else {
        $pages = $pagesint;
    }
    if ($pages != 1 && $pages != 0) {
        $counter = 1;
        $currentpage = ($max / $perpage);
        echo "<table border='0' cellpadding='2' cellspacing='2' width='100%'>\n";
        echo "<tr><form action='modules.php?name=$module_name' method='post'>\n";
        echo "<td align='right'><strong>"._DL_SELECTPAGE.": </strong><select name='min' onChange='top.location.href=this.options[this.selectedIndex].value'>\n";
        while ($counter <= $pages ) {
            $cpage = $counter;
            $mintemp = ($perpage * $counter) - $perpage;
            if ($counter == $currentpage) {
                echo "<option selected>$counter</option>\n";
            } else {
                echo "<option value='modules.php?name=$module_name&amp;min=$mintemp";
                if ($op > "" ) { echo "&amp;op=$op"; }
                if ($query > "") { echo "&amp;query=$query"; }
                if (isset($cid)) { echo "&amp;cid=$cid"; }
                echo "'>$counter</option>\n";
            }
            $counter++;
        }
        echo "</select><strong> "._DL_OF." $pages "._DL_PAGES."</strong></td>\n</form>\n</tr>\n";
        echo "</table>\n";
    }
}
?>