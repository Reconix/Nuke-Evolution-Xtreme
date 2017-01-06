<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Server Info Administration
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : info.php
   Author(s)     : Quake (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 12.19.2005 (mm.dd.yyyy)

   Notes         : Server Info Administration Panel
************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
 ************************************************************************/

if (!defined('ADMIN_FILE')) {
   die ("Illegal File Access");
}

global $prefix, $db, $admin_file;
if (is_mod_admin()) {

function get_phpinfo($mode) {
    ob_start();
    phpinfo($mode);
    $info_cache = ob_get_contents();
    ob_end_clean();
    wordwrap($info_cache);
    $info_cache = preg_split('/(<body>|<\/body>)/', $info_cache, -1, PREG_SPLIT_NO_EMPTY);
    if ($mode != INFO_MODULES) {
        $info_cache = preg_split('/(<table border="0" cellpadding="3" width="600">|<\/table>)/', $info_cache[1], -1, PREG_SPLIT_NO_EMPTY);
        if ($mode == INFO_GENERAL) {
            $info_cache = str_replace('<td', '<td class="row3"', $info_cache[3]);
            return $info_cache;
        }
    }
    $info_cache = str_replace('<td', '<td class="row3"', $info_cache[1]);
    $info_cache = str_replace('<th>', '<td class="row1">', $info_cache);
    $info_cache = str_replace('</th>', '</td>', $info_cache);
    return $info_cache;
}

if(isset($_GET['mods'])) {
    $info = _PHP_MODULES;
} elseif(isset($_GET['core'])) {
    $info = _PHP_CORE;
} elseif(isset($_GET['envi'])) {
    $info = _PHP_ENVIRO;
} elseif(isset($_GET['vars'])) {
    $info = _PHP_VARS;
} elseif(isset($_GET['mysql'])) {
    $info = _SQL_SRV;
} else {
    $info = _INFO_GENERAL;
}

include_once(NUKE_BASE_DIR.'header.php');
OpenTable();
echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=info\">" . _INFO_ADMIN_HEADER . "</a></div>\n";
echo "<br /><br />";
echo '<div align="center">';
echo (($info == _INFO_GENERAL) ? '<strong>'._INFO_GENERAL.'</strong>' : '<a href="'.$admin_file.'.php?op=info&amp;general">'._INFO_GENERAL.'</a>').' |
'.(($info == _PHP_CORE) ? '<strong>'._PHP_CORE.'</strong>' : '<a href="'.$admin_file.'.php?op=info&amp;core">'._PHP_CORE.'</a>').' |
'.(($info == _PHP_ENVIRO) ? '<strong>'._PHP_ENVIRO.'</strong>' : '<a href="'.$admin_file.'.php?op=info&amp;envi">'._PHP_ENVIRO.'</a>').' |
'.(($info == _PHP_MODULES) ? '<strong>'._PHP_MODULES.'</strong>' : '<a href="'.$admin_file.'.php?op=info&amp;mods">'._PHP_MODULES.'</a>').' |
'.(($info == _PHP_VARS) ? '<strong>'._PHP_VARS.'</strong>' : '<a href="'.$admin_file.'.php?op=info&amp;vars">'._PHP_VARS.'</a>');
if(SQL_LAYER == 'mysql' || SQL_LAYER == 'mysqli') {
    echo '| '.(($info == _SQL_SRV) ? '<strong>MySQL</strong>' : '<a href="'.$admin_file.'.php?op=info&amp;mysql">MySQL</a>');
}
echo '</div>';
echo "<br /><br />";
echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _INFO_RETURNMAIN . "</a> ]</div>\n";
CloseTable();
echo '<br />';
OpenTable();
if(!isset($_GET['mods'])) {
    echo '<fieldset><legend><strong>'.$info.'</strong></legend><br />';
}
if (isset($_GET['mods'])) {
    echo '<strong>&nbsp;'.$info.'</strong><br /><br />';
    $info_cache = get_phpinfo(INFO_MODULES);
    $info_cache = str_replace('<th colspan="2">', '<td class="row1" colspan="2">', $info_cache);
    $info_cache = str_replace(array('<div class="center">','</div>'), '', $info_cache);
    $info_cache = str_replace('<h2>', '<fieldset><legend><strong>', $info_cache);
    $info_cache = str_replace('</h2>', '</strong><br />', $info_cache);
    $info_cache = preg_split('/(<table border="0" cellpadding="3" width="600">|<\/table><br \/>|<\/table><br \/>)/', $info_cache, -1, PREG_SPLIT_NO_EMPTY);
    for ($i=0, $maxi=count($info_cache); $i<$maxi; $i++) {
        if ($info_cache[$i] != '') {
            if (preg_match('#<fieldset#', $info_cache[$i])) {
                echo '</fieldset><br />'.$info_cache[$i];
            } else {
                echo '<table width="100%" style="border-collapse: collapse">'.$info_cache[$i].'</table>';
            }
        }
    }
} elseif(isset($_GET['core'])) {
    echo '<table width="100%" style="border-collapse: collapse" cellpadding="0" cellspacing="1">'.get_phpinfo(INFO_CONFIGURATION).'</table>';
} elseif(isset($_GET['envi'])) {
    echo '<table width="100%" style="border-collapse: collapse" cellpadding="0" cellspacing="1">'.get_phpinfo(INFO_ENVIRONMENT).'</table>';
} elseif(isset($_GET['vars'])) {
    echo '<table width="100%" style="border-collapse: collapse" cellpadding="0" cellspacing="1">'.get_phpinfo(INFO_VARIABLES).'</table>';
} elseif(isset($_GET['mysql']) && SQL_LAYER == 'mysql' || SQL_LAYER == 'mysqli') {
    $stat = preg_split('/:\s+([0-9]*\.?[0-9]*)/', mysql_stat($db->connect_id), -1, PREG_SPLIT_DELIM_CAPTURE ^ PREG_SPLIT_NO_EMPTY);
    $days = intval($stat[1] / 86400);
    $stat[1] -= ($days * 86400);
    $hrs = intval($stat[1] / 3600);
    $stat[1] -= ($hrs * 3600);
    $mins = intval($stat[1] / 60);
    $stat[1] -= ($mins * 60);
    $secs = $stat[1];
    $stat[1] = $days . "D " . $hrs . "H " . $mins . "M " . $secs . "S";
    echo '<table width="100%" style="border-collapse: collapse" cellpadding="0" cellspacing="1">
<tr><td valign="top">
<table border="0">
<tr><td valign="top"><div><strong>Quick Stats:</strong></div></td></tr>
<tr><td><strong>Server Version:</strong></td><td>' .mysql_get_server_info($db->connect_id) . '</td></tr>
<tr><td><strong>Client Version:</strong></td><td>' . mysql_get_client_info() . '</td></tr>
<tr><td><strong>Host Connection:</strong></td><td>' . mysql_get_host_info($db->connect_id) . '</td></tr>';

    for ($i = 0; isset($stat[$i]); $i += 2) {
        $val = $stat[$i + 1];
        if (is_numeric($val)) {
            if (fmod($val, 1.0) == 0) {
                $val = number_format($val);
            } else {
                $val = number_format($val, 3);
            }
        }
        echo "<tr><td><strong>" . $stat[$i] . "</strong></td><td>" . $val . "</td></tr>";
    }
    echo '</table></td>';

    // complete status
    $res = $db->sql_query("SHOW STATUS");
    echo '<td valign="top">
<table border="0"><tr><td><div><strong>Extended Status:</strong></div></td></tr>
<tr><td><select name="status" size="13">';
    while ($row = $db->sql_fetchrow($res, SQL_NUM)) {
        echo '<option>'.$row[0].'&nbsp;=&nbsp;'.$row[1].'</option>';
    }
    echo '</select></td></tr></table></td>';

    echo '</tr><tr><td colspan="3"></td></tr><tr><td colspan="3">
<table width="100%" border="0">
<tr><td colspan="8"><div><strong>Running Processes:</strong></div></td></tr>
<tr><td><strong>Id</strong></td><td><strong>User</strong></td><td><strong>Host</strong></td><td><strong>Database</strong></td><td><strong>Command</strong></td><td><strong>Time</strong></td><td><strong>State</strong></td><td><strong>Info</strong></td></tr>';
    $res = mysql_list_processes();

    while ($row = $db->sql_fetchrow($res)) {
        echo '<tr><td>' . $row['Id'] . '</td>';
        echo '<td>' . $row['User'] . '</td>';
        echo '<td>' . $row['Host'] . '</td>';
        echo '<td>' . $row['db'] . '</td>';
        echo '<td>' . $row['Command'] . '</td>';
        echo '<td>' . $row['Time'] . '</td>';
        echo '<td>' . $row['State'] . '&nbsp;</td>';
        echo '<td>' . $row['Info'] . '&nbsp;</td></tr>';
    }
    echo '</table></td></tr></table>';
} else {
    echo '<table width="100%" style="border-collapse: collapse" cellpadding="0" cellspacing="1">
  <tr><td class="row1" height="20"><strong>Setting</strong></td><td class="row1" height="20"><strong>Value</strong></td></tr>
  <tr><td class="row3">CMS Root</td><td class="row3">'.NUKE_BASE_DIR.'</td></tr>
  <tr><td class="row3">CMS Version</td><td class="row3">'.NUKE_EVO.'</td></tr>
  <tr><td class="row3">PHP Version</td><td class="row3">'.PHPVERS.'</td></tr>
  <tr><td class="row3">GD Version</td><td class="row3">';
    if (GDSUPPORT && function_exists('gd_info')) {
        $gd = gd_info();
        echo $gd['GD Version'];
    } else {
        echo 'N/A';
    }
    if (SQL_LAYER == 'mysql' || SQL_LAYER == 'mysqli') {
        $result = $db->sql_query('SELECT VERSION()');
        list($mysqlversion) = $db->sql_fetchrow($result);
        if ($mysqlversion[0] > 3) {
            echo '</td></tr>
  <tr><td class="row3">MySQL Version</td><td class="row3">'.$mysqlversion;
        }
    }
    echo '</td></tr>
  <tr><td class="row3">Session save_path</td><td class="row3">'.session_save_path().'</td></tr>
  <tr><td class="row3">Owner</td><td class="row3">'.get_current_user().' ('.getmyuid().')</td></tr>
  <tr><td class="row3">Group</td><td class="row3">'.getmygid().'</td></tr>
  '.get_phpinfo(INFO_GENERAL).'
</table>';
}

echo '</fieldset>';
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

} else {
    echo "Access Denied";
}

?>