<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/*                                                                      */
/************************************************************************/
/*         Additional security & Abstraction layer conversion           */
/*                           2003 chatserv                              */
/*      http://www.nukefixes.com -- http://www.nukeresources.com        */
/************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
      Caching System                           v1.0.0       10/31/2005
-=[Other]=-
      Need To Delete                           v1.0.0       06/03/2005
      Date Fix                                 v1.0.0       06/20/2005
      Security Status                          v1.0.0       11/18/2005
-=[Mod]=-
      Admin Icon/Link Pos                      v1.0.0       06/02/2005
      Admin Tracker                            v1.0.1       06/08/2005
      Evolution Version Checker                v1.1.0       08/21/2005
 ************************************************************************/

/*********************************************************/
/* [ External ] Administration Main Function             */
/*********************************************************/

function adminMain() {
    global $language, $admin, $aid, $prefix, $file, $db, $sitename, $user_prefix, $admin_file, $bgcolor1, $evoconfig, $admdata, $dbtype, $cache, $json, $admincookie, $radminsuper;
/*****[BEGIN]******************************************
 [ Mod:     Admin Icon/Link Pos                 v1.0.0 ]
 ******************************************************/
    define('ADMIN_POS', true);
/*****[END]********************************************
 [ Mod:     Admin Icon/Link Pos                 v1.0.0 ]
 ******************************************************/
    include_once(NUKE_BASE_DIR.'header.php');
    $dummy = 0;
/*****[BEGIN]******************************************
 [ Other:   Date Fix                           v1.0.0 ]
 ******************************************************/
    $month = date('M');
    $curDate2 = "%".$month[0].$month[1].$month[2]."%".date('d')."%".date('Y')."%";
    $ty = time() - 86400;
    $preday = strftime('%d', $ty);
    $premonth = strftime('%B', $ty);
    $preyear = strftime('%Y', $ty);
    $curDateP = "%".$premonth[0].$premonth[1].$premonth[2]."%".$preday."%".$preyear."%";
/*****[END]********************************************
 [ Other:   Date Fix                           v1.0.0 ]
 ******************************************************/
    GraphicAdmin();
    $aid = substr($aid, 0,25);
    $radminsuper = is_mod_admin();
    $admlanguage = addslashes($admdata['admlanguage']);
    $result = $db->sql_query("SELECT admins FROM ".$prefix."_modules WHERE title='News'");
    $aidname = $admdata['name'];
    $radminarticle = 0;
    while (list($admins) = $db->sql_fetchrow($result)) {
        $admins = explode(",", $admins);
        $auth_user = 0;
        for ($i=0, $maxi=count($admins); $i < $maxi; $i++) {
            if ($aidname == $admins[$i]) {
                $auth_user = 1;
            }
        }
        if ($auth_user == 1) {
            $radminarticle = 1;
        }
    }
	if ($admincookie[4] == 'old'){
/*****[BEGIN]******************************************
 [ Other:  Security Status                     v1.0.0 ]
 ******************************************************/
		OpenTable();
		echo "<center><font size='2'><strong>" . _SEC_STATUS . "</strong></font><br /><br />"
		."<table border='0' width='70%'>";
		if(defined('ADMIN_IP_LOCK')) {
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
		echo "</table></center>";
		CloseTable();
		echo '<br />';
/*****[END]********************************************
 [ Other:  Security Status                     v1.0.0 ]
 ******************************************************/
/*****[BEGIN]******************************************
 [ Mod:    Admin Tracker                       v1.0.1 ]
 ******************************************************/
		if (is_mod_admin('super')){
			OpenTable();
			echo "<center><strong><font size='2'>"._ADMIN_LOG."</font></strong><br /><br />";

			echo"<table border='0' width='40%' align='center'>";
			echo "<tr><td>"
				."<strong>"._ADMIN_LOG_EXPLAIN1."</strong>"
				."</td></tr>"
				."<tr><td>"
				._ADMIN_LOG_EXPLAIN2
				."</td></tr>";
			echo "</table>";
			echo"<table border='0' width='70%'>";

			$ret_log = log_size('admin');
			$img = ($ret_log == -1 || $ret_log == -2 || $ret_log) ? "bad" : "ok";

			echo "<tr><td width='8%'>"
				."<img src='images/evo/$img.png' alt='' width='10' height='10' /></td><td width='22%'><i>Admin Tracker</i>:</td>";
			if($ret_log == -1) {
			echo "<td align='center' width='40%'><font color='red'>" . _ADMIN_LOG_ERR . "</font></td>";
			} elseif($ret_log == -2) {
			echo "<td align='center' width='40%'><font color='red'>" . _ADMIN_LOG_ERRCHMOD . "</font></td>";
			}    elseif($ret_log) {
			echo "<td align='center' width='40%'><font color='red'>" . _ADMIN_LOG_CHG . "</font></td>";
			//echo "<input type=\"submit\" value=\""._ADMIN_LOG_ACK."\">";
			} else {
			echo "<td align='center' width='40%'><font color='green'>" . _ADMIN_LOG_FINE . "</font></td>";
			}
			if($ret_log != -1 && $ret_log != -2) {
			echo "<td align='center' width='30%'>[ <a href='".$admin_file.".php?op=viewadminlog&amp;log=admin'>"._ADMIN_LOG_VIEW."</a>" . (($ret_log) ? " | <a href='".$admin_file.".php?op=adminlog_ack&log=admin'>"._ADMIN_LOG_ACK."</a>" : "") ." ]</td>";
			}
			echo "</tr>";

			$ret_log = log_size('error');
			$img = ($ret_log == -1 || $ret_log == -2 || $ret_log) ? "bad" : "ok";

			echo "<tr><td width='8%'>"
				."<img src='images/evo/$img.png' alt='' width='10' height='10' /></td><td width='22%'><i>Error Logger</i>:</td>";
			if($ret_log == -1) {
			echo "<td align='center' width='40%'><font color='red'>" . _ERROR_LOG_ERR . "</font></td>";
			} elseif($ret_log == -2) {
			echo "<td align='center' width='40%'><font color='red'>" . _ERROR_LOG_ERRCHMOD . "</font></td>";
			}    elseif($ret_log) {
			echo "<td align='center' width='40%'><font color='red'>" . _ERROR_LOG_CHG . "</font></td>";
			} else {
			echo "<td align='center' width='40%'><font color='green'>" . _ERROR_LOG_FINE . "</font></td>";
			}
			if($ret_log != -1 && $ret_log != -2) {
			echo "<td align='center' width='30%'>[ <a href='".$admin_file.".php?op=viewadminlog&amp;log=error'>"._ADMIN_LOG_VIEW."</a>" . (($ret_log) ? " | <a href='".$admin_file.".php?op=adminlog_ack&amp;log=error'>"._ADMIN_LOG_ACK."</a>" : "") ." ]</td>";
			}
			echo "</tr>";

			echo "</table>";
			echo "</center>";
			CloseTable();
			echo "<br />";
/*****[END]********************************************
 [ Mod:    Admin Tracker                       v1.0.1 ]
 ******************************************************/
/*****[BEGIN]******************************************
 [ Mod:    Evolution Version Checker           v1.1.0 ]
 ******************************************************/
			OpenTable();
			echo "<center><strong><font size='2'>"._ADMIN_VER_TITLE."</font></strong><br /><br />";
			echo sprintf(_CURRENTVERSION, NUKE_EVO);
			echo "</center>";
			CloseTable();
			echo "<br />";
		}
	}
/*****[END]********************************************
 [ Mod:    Evolution Version Checker           v1.1.0 ]
 ******************************************************/
	include(NUKE_BASE_DIR.'footer.php');
}

?>