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
      CNBYA Modifications                      v1.0.0       07/05/2005
      Password Strength Meter                  v1.0.0       07/12/2005
      Auto Admin Protector                     v2.0.0       08/18/2005
      Admin IP Lock                            v2.1.0       11/18/2005
      Evolution Version Checker                v1.1.0       08/21/2005
      Auto Admin Login                         v2.0.1       08/27/2005
      Auto First User Login                    v1.0.0       08/27/2005
      Persistent Admin Login                   v2.0.0       12/10/2005
      External Admin Index                     v1.0.0       08/27/2005
      External Admin Functions                 v1.0.0       12/14/2005
 ************************************************************************/

define('ADMIN_FILE', true);
define('VALIDATE', true);

if(isset($aid) && ($aid) && (!isset($admin) || empty($admin)) && $op != 'login'){
    unset($aid, $admin);
    die('Access Denied');
}

// Include functions
require_once(dirname(__FILE__) . '/mainfile.php');
/*****[BEGIN]******************************************
 [ Mod:     External Admin Functions           v1.0.0 ]
 ******************************************************/
require_once(NUKE_ADMIN_DIR.'functions.php');
/*****[END]********************************************
 [ Mod:     External Admin Functions           v1.0.0 ]
 ******************************************************/

global $domain, $admin_file, $identify;

/*****[BEGIN]******************************************
 [ Mod:    Admin IP Lock                       v2.1.0 ]
 ******************************************************/
/*=====
  For more information on how to use this please see the help file in the help/features folder
  =====*/
include(NUKE_BASE_DIR.'ips.php');

if (isset($ips) && is_array($ips)){
    $ip_check = implode('|^',$ips);
	
    if (!preg_match("/^".$ip_check."/",$identify->get_ip())){
        unset($aid);
        unset($admin);
/*****[BEGIN]******************************************
 [ Base:     Evolution Functions               v1.5.0 ]
 ******************************************************/
        global $cookie;
        $name = (isset($cookie[1]) && !empty($cookie[1])) ? $cookie[1] : _ANONYMOUS;
        log_write('admin', $name.' used invalid IP address attempted to access the admin area', 'Security Breach');
/*****[END]********************************************
 [ Base:     Evolution Functions               v1.5.0 ]
 ******************************************************/
        die('Invalid IP<br />Access denied');
    }
    define('ADMIN_IP_LOCK',true);
}
/*****[END]********************************************
 [ Mod:    Admin IP Lock                       v2.1.0 ]
 ******************************************************/

list($the_first )= $db->sql_ufetchrow("SELECT COUNT(*) FROM ".$prefix."_authors", SQL_NUM);

if ($the_first == 0){
    if (!$name){
/*****[BEGIN]******************************************
 [ Other:   Need To Delete                      v1.0.0 ]
 ******************************************************/
        need_delete('install.php');
        need_delete('upgrade.php');
        need_delete('install', true);
/*****[END]********************************************
 [ Other:   Need To Delete                      v1.0.0 ]
 ******************************************************/
        include_once(NUKE_BASE_DIR.'header.php');
        title($sitename.': '._ADMINISTRATION);
        OpenTable();
        echo "<center><strong>"._NOADMINYET."</strong></center><br /><br />"
            ."<form action=\"".$admin_file.".php\" method=\"post\" name=\"form1\">"
            ."<table border=\"0\">"
            ."<tr><td><strong>"._NICKNAME.":</strong></td><td><input type=\"text\" name=\"name\" size=\"30\" maxlength=\"25\"></td></tr>"
            ."<tr><td><strong>"._HOMEPAGE.":</strong></td><td><input type=\"text\" name=\"url\" size=\"30\" maxlength=\"255\" value=\"http://\"></td></tr>"
            ."<tr><td><strong>"._EMAIL.":</strong></td><td><input type=\"text\" name=\"email\" size=\"30\" maxlength=\"255\"></td></tr>"
            ."<tr><td><strong>"._PASSWORD.":</strong></td><td><input type=\"password\" name=\"pwd\" size=\"11\" maxlength=\"40\" onkeyup='chkpwd(form1.pwd.value)' onblur='chkpwd(form1.pwd.value)' onmouseout='chkpwd(form1.pwd.value)'></td></tr>";
/*****[BEGIN]******************************************
 [ Other:   Admin Password Confirm             v1.0.0 ]
 ******************************************************/
        echo "<tr><td><strong>"._PASS_CONFIRM.":</strong></td><td><input type=\"password\" name=\"cpwd\" size=\"11\" maxlength=\"40\"></td></tr>";
/*****[END]********************************************
 [ Other:   Admin Password Confirm             v1.0.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:     Password Strength Meter            v1.0.0 ]
 ******************************************************/
        echo "</table><table width='300' cellpadding='2' cellspacing='0' border='1' style='border-collapse: collapse;'><tr>"
            ."<td id='td1' width='100' align='center'><div id='div1'></div></td>"
            ."<td id='td2' width='100' align='center'><div id='div2'></div></td>"
            ."<td id='td3' width='100' align='center'><div id='div3'>"._PSM_NOTRATED."</div></td>"
            ."<td id='td4' width='100' align='center'><div id='div4'></div></td>"
            ."<td id='td5' width='100' align='center'><div id='div5'></div></td>"
            ."</tr></table><div id='divTEMP'></div><table border=\"0\">";
        echo ""._PSM_CLICK." <a href=\"javascript:strengthhelp()\">"._PSM_HERE."</a> "._PSM_HELP."";
/*****[END]********************************************
 [ Mod:     Password Strength Meter            v1.0.0 ]
 ******************************************************/
        echo "<tr><td colspan=\"2\">"._CREATEUSERDATA." <input type=\"radio\" name=\"user_new\" value=\"1\" checked>"._YES."&nbsp;&nbsp;<input type=\"radio\" name=\"user_new\" value=\"0\">"._NO."</td></tr>";
        echo "<tr><td><input type=\"hidden\" name=\"fop\" value=\"create_first\">"
            ."<input type=\"submit\" value=\""._SUBMIT."\">"
            ."</td></tr></table></form>";
        CloseTable();
        include_once(NUKE_BASE_DIR.'footer.php');
    }
	
    switch($fop){
        case "create_first":
			create_first($name, $url, $email, $pwd, $user_new, $cpwd);
		break;
    }
	
    exit;
}

if (isset($aid) && (preg_match("/[^a-zA-Z0-9_-]/", trim($aid)))){
    die('Begone');
}

if (isset($aid)){ $aid = substr($aid, 0,25);}
if (isset($pwd)){ $pwd = substr($pwd, 0,40);}
if ((isset($aid)) && (isset($pwd)) && (isset($op)) && ($op == "login")){
/*****[BEGIN]******************************************
 [ Mod:     Advanced Security Code Control     v1.0.0 ]
 ******************************************************/
    $gfxchk = array(1,5,6,7);
    if (!security_code_check($_POST['gfx_check'], $gfxchk)){
/*****[END]********************************************
 [ Mod:     Advanced Security Code Control     v1.0.0 ]
 ******************************************************/
        redirect($admin_file.".php");
    }
	
    if (!empty($aid) AND !empty($pwd)){
        $txt_pwd = $pwd;
/*****[BEGIN]******************************************
 [ Base:     Evolution Functions               v1.5.0 ]
 ******************************************************/
        $evo_crypt = EvoCrypt($pwd);
        $pwd = md5($pwd);
/*****[END]********************************************
 [ Base:     Evolution Functions               v1.5.0 ]
 ******************************************************/
        $admlanguage = addslashes(get_admin_field('admlanguage', $aid));
        $rpwd = get_admin_field('pwd', $aid);
		
        // Un-evocrypt
        if ($evo_crypt == $rpwd){
            $db->sql_query("UPDATE `".$prefix."_authors` SET `pwd`='".$pwd."' WHERE `aid`='".$aid."'");
            $rpwd = get_admin_field('pwd', $aid);
        }
		
        if($rpwd == $pwd && !empty($rpwd)){
/*****[BEGIN]******************************************
 [ Mod:    Persistent Admin Login              v2.0.0 ]
 ******************************************************/
            $persistent = intval($persistent);
			
			$superadmin = get_admin_field('radminsuper', $aid);
			$layouttype = ($superadmin == 0) ? 'old' : 'new';
			
            $admin = base64_encode("$aid:$pwd:$admlanguage:$persistent:$layouttype");
            $time = (intval($admin1[3])) ? 43200 : 60;
            setcookie('admin',$admin,time()+($time*60));
/*****[END]********************************************
 [ Mod:    Persistent Admin Login              v2.0.0 ]
 ******************************************************/
            unset($op);
/*****[BEGIN]******************************************
 [ Mod:    Admin Tracker                       v1.0.1 ]
 ******************************************************/
            unset($txt_pwd);
            redirect($_SERVER['REQUEST_URI']);
        } else {
            log_write('admin', 'Attempted to login with "' . $aid . '"/"' . $txt_pwd . '" but failed', 'Security Breach');
            unset($txt_pwd);
        }
    } else {
        if (empty($aid) AND empty($pwd)){
            log_write('admin', 'Attempted to login to the admin area with no username and password', 'Security Breach');
        } elseif (empty($aid)){
            log_write('admin', 'Attempted to login to the admin area with no username', 'Security Breach');
        } elseif (empty($pwd)){
            log_write('admin', 'Attempted to login to the admin area with no password', 'Security Breach');
        }
    }
/*****[END]********************************************
 [ Mod:    Admin Tracker                       v1.0.1 ]
 ******************************************************/
}

$admintest = false;

if (isset($admin) && !empty($admin) && (!isset($admin1) || !is_array($admin1))){
    $admin1 = base64_decode($admin);
    $admin1 = explode(":", $admin1);
    $aid = addslashes($admin1[0]);
    $pwd = $admin1[1];
    $admlanguage = (isset($admin1[2])) ? $admin1[2] : 'english';
	
    if (empty($aid) OR empty($pwd)){
        $admintest = false;
/*****[BEGIN]******************************************
 [ Mod:    Admin Tracker                       v1.0.1 ]
 ******************************************************/
        log_write('admin', 'Caused an Intruder Alert', 'Security Breach');
/*****[END]********************************************
 [ Mod:    Admin Tracker                       v1.0.1 ]
 ******************************************************/
        die('Illegal Operation');
    }
	
    $aid = substr($aid, 0,25);
	
    if (!($admdata = get_admin_field('*', $aid))){
        die('Selection from database failed!');
    } else {
        if ($admdata['pwd'] == $pwd && !empty($admdata['pwd'])){
            $admintest = true;
/*****[BEGIN]******************************************
 [ Mod:    Persistent Admin Login              v2.0.0 ]
 ******************************************************/
            $time = (intval($admin1[3])) ? 43200 : 60;
            if (!isset($op) || $op != 'logout') {
                setcookie('admin',$admin,time()+($time*60));
            }
/*****[END]********************************************
 [ Mod:    Persistent Admin Login              v2.0.0 ]
 ******************************************************/
        } else {
            $admdata = array();
/*****[BEGIN]******************************************
 [ Mod:    Admin Tracker                       v1.0.1 ]
 ******************************************************/
            log_write('admin', 'Attempted to login with "' . $aid . '" but failed', 'Security Breach');
/*****[END]********************************************
 [ Mod:    Admin Tracker                       v1.0.1 ]
 ******************************************************/
        }
    }
	
    unset($admin1);
}

if ($admintest){
	$admincookie = explode(':', base64_decode($admin));
	$aid = substr($admincookie[0], 0,25);
} else {
	$admintest = false;
}

// Force Cookie Reset
if (!isset($admincookie[4]) && $admintest){
	$cookieData = base64_encode("$admincookie[0]:$admincookie[1]:$admincookie[2]:$admincookie[3]:old");
	
	if (defined('SSL_MODE')){
		setcookie('admin', $cookieData, time()+2592000, "", "", 1);
	} else {
		setcookie('admin', $cookieData, time()+2592000);
	}
	
	redirect($admin_file.'.php');
	exit;
}

// Admin panel style switch
// Updated: 15/12/2010
if (isset($HTTP_POST_VARS['nukeAdminAjax']) && $HTTP_POST_VARS['nukeAdminAjax'] == true){
	global $json, $aid;
	
	// Make sure the user is an admin and is who he/she
	// says they are
	if (isset($HTTP_POST_VARS['adminID']) && $HTTP_POST_VARS['adminID'] != $aid){
		echo $json->encode(array('success' => false, 'error' => _NASS_AU_ERROR));
		exit;
	}
	
	// Determine the admin style
	if (isset($HTTP_POST_VARS['nukeAdminStyle']) && !in_array($HTTP_POST_VARS['nukeAdminStyle'], array('new','old'))){
		echo $json->encode(array('success' => false, 'error' => _NASS_AS_ERROR));
		exit;
	} else {
		$styleType = strip_tags(trim($HTTP_POST_VARS['nukeAdminStyle']));
	}
	
	// Set the cookie data
	$cookieData = base64_encode("$admincookie[0]:$admincookie[1]:$admincookie[2]:$admincookie[3]:$styleType");
	
	if (defined('SSL_MODE')){
		setcookie('admin', $cookieData, time()+2592000, '', '', 1);
	} else {
		setcookie('admin', $cookieData, time()+2592000);
	}
	
	echo $json->encode(array('success' => true));
	exit;
}

if (!isset($op)){
    $op = 'adminMain';
} elseif (($op == 'mod_authors' || $op == 'modifyadmin' || $op == 'UpdateAuthor' || $op == 'AddAuthor' || $op == 'deladmin2' || $op == 'deladmin' || $op == 'assignstories' || $op == 'deladminconf') && $admdata['name'] != 'God'){
    die('Illegal Operation');
}

if ($admintest){
    if (!$admin) exit('Illegal Operation');
    switch($op){
        case "do_gfx":
            do_gfx();
        break;
        case "deleteNotice":
            deleteNotice($id);
        break;
        case "GraphicAdmin":
            GraphicAdmin();
        break;
        case "adminMain":
/*****[BEGIN]******************************************
 [ Mod:     External Admin Index               v1.0.0 ]
 ******************************************************/
            include_once(NUKE_ADMIN_MODULE_DIR.'index.php');
/*****[END]********************************************
 [ Mod:     External Admin Index               v1.0.0 ]
 ******************************************************/
            adminMain();
        break;
		case "logout":
            setcookie("admin", false);
            unset($admin);
            header("Refresh: 3; url=".$admin_file.".php");
            DisplayError("<span class=\"title\"><strong>"._YOUARELOGGEDOUT."</strong></span>", true);
        break;
        case "login";
            unset($op);
        default:
            if (!is_admin()){
                login();
            }
/*****[BEGIN]******************************************
 [ Mod:    Admin Icon/Link Pos                 v1.0.0 ]
 ******************************************************/
            define('ADMIN_POS', true);
/*****[END]********************************************
 [ Mod:    Admin Icon/Link Pos                 v1.0.0 ]
 ******************************************************/
            define('ADMIN_PROTECTION', true);
            $casedir = opendir(NUKE_ADMIN_DIR.'case');
            while(false !== ($func = readdir($casedir))){
                if (substr($func, 0, 5) == "case."){
                    include(NUKE_ADMIN_DIR.'case/'.$func);
                }
            }
            closedir($casedir);
            $result = $db->sql_query("SELECT title FROM ".$prefix."_modules ORDER BY title ASC");
            while(list($mod_title) = $db->sql_fetchrow($result,SQL_BOTH)){
                if (is_mod_admin($mod_title) && (file_exists(NUKE_MODULES_DIR.$mod_title.'/admin/index.php') AND file_exists(NUKE_MODULES_DIR.$mod_title.'/admin/links.php') AND file_exists(NUKE_MODULES_DIR.$mod_title.'/admin/case.php'))){
                     include(NUKE_MODULES_DIR.$mod_title.'/admin/case.php');
                }
            }
            $db->sql_freeresult($result);
        break;
    }
} else {
    switch($op) {
        default:
            if (!stristr($_SERVER['HTTP_USER_AGENT'], 'WebTV')) {
                header('HTTP/1.0 403 Forbidden');
            }
			login();
        break;
    }
}

?>