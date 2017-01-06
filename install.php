<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Installer
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : install.php
   Author        : JeFFb68CAM (www.Evo-Mods.com)
   Version       : 1.0.0
   Date          : 11.05.2005 (mm.dd.yyyy)

   Notes         : You may NOT use this installer for your own
                   needs or script. It is written specifically
                   for Nuke-Evolution.
************************************************************************/

session_start();

define('NUKE_BASE_DIR', dirname(__FILE__) . '/');
define('NUKE_MODULES_DIR', NUKE_BASE_DIR . 'modules/');

include('install/functions.php');
include('includes/functions_selects.php');
$nuke_name = "Nuke Evolution (Xtreme)";

$sql_version = false;
$pagination  = false;

if (!isset($_SESSION['language']) || $_SESSION['language'] == "english") {
    $_SESSION['language'] = isset($_POST['language']) ? $_POST['language'] : "english";
}

if ($_SESSION['language']) {
    if (is_file("install/language/lang_" . $_SESSION['language'] . "/lang-install.php")) {
            include("install/language/lang_" . $_SESSION['language'] . "/lang-install.php");
    } else {
            include("install/language/lang_english/lang-install.php");
    }
}

$step = isset($_GET['step']) ? $_GET['step'] : isset($_POST['step']) ? $_POST['step'] : '';
if (!isset($step)) $step = "0";
$total_steps="7";
$next_step = $step + 1;
$continue_button = "<input type=hidden name=step value=\"".$next_step."\"><input type=submit name=submit value=\"" . $install_lang['continue'] . " $next_step\">";
check_required_files();
$safemodcheck = ini_get('safe_mod');

if ( $safemodcheck == 'On' || $safemodcheck == 'on' || $safemodcheck == TRUE )
{
    include('install/header.php');
    echo "<table id=menu border=\"1\" width=\"100%\">"
        ."<th id=rowHeading align=\"center\">$nuke_name " . $install_lang['installer_heading'] . " ".$install_lang['failed']."</th>"
        ."<tr><td align=\"center\"><span style=\"color:red\"><strong>" . $install_lang['safe_mode'] . "</strong></span></td></tr>"
        ."</table>";
    include('install/footer.php');
    exit;
}

if(isset($_POST['download_file']) && !empty($_SESSION['configData']) && !isset($_POST['continue'])) {
    header("Content-Type: text/x-delimtext; name=config.php");
    header("Content-disposition: attachment; filename=config.php");

    $configData = $_SESSION['configData'];
    echo $configData;

    exit;
}
if ($step >= 5){
    if (!mysql_connect($_SESSION['dbhost'], $_SESSION['dbuser'], $_SESSION['dbpass']))
    {
        die ($install_lang['couldnt_connect'] . mysql_error());
    }
    if (!mysql_select_db($_SESSION['dbname'])) {
        die ($install_lang['couldnt_select_db'] . mysql_error());
    }
}
if ($step == 0) {
    include('install/header.php');
    $lang_select = language_select('english', "language", dirname(__FILE__) . '/install/language');
    echo "<form method=post>"
        ."<table id=menu border=\"1\" width=\"100%\">"
        ."<th id=rowHeading align=\"center\">$nuke_name " . $install_lang['installer_heading'] . " $step " . $install_lang['installer_heading2'] . " $total_steps</th>"
        ."<tr><td align=\"center\"><strong>$lang_select</strong></td></tr>"
        ."<tr><td align=\"center\">$continue_button</td></tr>"
        ."</table></form>";
    include('install/footer.php');
}
elseif ($step == 1) {
    include('install/header.php');
    echo "<form method=post>"
        ."<table id=menu border=\"1\" width=\"100%\">"
        ."<th id=rowHeading align=\"center\">$nuke_name " . $install_lang['installer_heading'] . " $step " . $install_lang['installer_heading2'] . " $total_steps</th>"
        ."<tr><td align=\"center\"><strong>" . $install_lang['briefing'] . "</strong></td></tr>"
        ."<tr><td align=\"center\">$continue_button</td></tr>"
        ."</table></form>";
    include('install/footer.php');
}
elseif ($step == 2) {
    include('install/header.php');

    echo "<form method=post>"
        ."<table id=menu border=\"1\" width=\"100%\">"
        ."<th id=rowHeading align=\"center\">$nuke_name " . $install_lang['installer_heading'] . " $step " . $install_lang['installer_heading2'] . " $total_steps</th>"
        ."<tr><td align=\"center\"><strong>" . $install_lang['chmod'] . "</strong></td></tr>";
    echo chmod_files();
    echo "<tr><td align=\"center\">$continue_button</td></tr></table></form>";

    include('install/footer.php');
} elseif ($step == 3) {
    include('install/header.php');

    $confirm = isset($_POST['confirm'] ) ? $_POST['confirm'] : '';
    if (!$confirm) {
        echo "<form name=config method=post>"
        ."<table id=menu border=\"1\" width=\"100%\">"
        ."<th id=rowHeading align=\"center\" colspan=2>".$nuke_name." " . $install_lang['installer_heading'] . " $step " . $install_lang['installer_heading2'] . " ".$total_steps."</th>"
        ."<tr><td align=\"center\" colspan=2 class=row1><strong>" . $install_lang['config_maker'] . "</strong></td></tr>"
        ."<tr><td align=\"center\" width=50%><strong>" . $install_lang['dbhost'] . "</strong></td> <td align=\"center\" width=50%><input type=text length=60 value=localhost name=dbhost></td></tr>"
        ."<tr><td align=\"center\" width=50%><strong>" . $install_lang['dbname'] . "</strong></td> <td align=\"center\" width=50%><input type=text length=60 value=\"\" name=dbname></td></tr>"
        ."<tr><td align=\"center\" width=50%><strong>" . $install_lang['dbuser'] . "</strong></td> <td align=\"center\" width=50%><input type=text length=60 name=dbuser></td></tr>"
        ."<tr><td align=\"center\" width=50%><strong>" . $install_lang['dbpass'] . "</strong></td> <td align=\"center\" width=50%><input type=password length=60 name=dbpass></td></tr>"
        ."<tr><td align=\"center\" width=50%><strong>" . $install_lang['prefix'] . "</strong></td> <td align=\"center\" width=50%><input type=text length=60 value=\"nuke\" name=prefix></td></tr>"
        ."<tr><td align=\"center\" width=50%><strong>" . $install_lang['user_prefix'] . "</strong></td> <td align=\"center\" width=50%><input type=text length=60 value=\"nuke\" name=user_prefix></td></tr>"
        ."<tr><td align=center>"
        ."<strong>" . $install_lang['dbtype'] . "</strong></td><td align=center>"
        ."<select size=\"1\" name=\"dbtype\">";
        // Quake fix for db type selection
        $handle = opendir('includes/db');
        while(false !== ($file = readdir($handle))) {
            if(preg_match('/(.*?)\.php/i', $file, $database)) {
                if(strtolower($database[1]) != 'db' && strtolower($database[1]) != 'db-old') {
                    echo "<option value='".strtolower($database[1])."'>".ucfirst($database[1])."</option>";
                }
            }
        }
        closedir($handle);
        echo "</select></td></tr>"
        ."<tr><td align=center colspan=2><input type=hidden name=step value=\"".$step."\"><input type=submit name=confirm value=\"" . $install_lang['confirm_data'] . "\"></td></tr>"
        ."</table></form>";
    } else {
        echo "<form method=post>"
            ."<table id=menu border=\"1\" width=\"100%\">"
            ."<th id=rowHeading align=\"center\">".$nuke_name." " . $install_lang['installer_heading'] . " $step " . $install_lang['installer_heading2'] . " ".$total_steps."</th>";
        echo validate_data($_POST);
        echo "</table></form>";

    }
    include('install/footer.php');
} elseif ($step == 4) {
    include('install/header.php');

    echo "<form method=post>"
        ."<table id=menu border=\"1\" width=\"100%\">"
        ."<th id=rowHeading align=\"center\">".$nuke_name." " . $install_lang['installer_heading'] . " $step " . $install_lang['installer_heading2'] . " ".$total_steps."</th>"
        ."<tr><td align=\"center\"><strong>" . $install_lang['server_check'] . "</strong></td></tr>";
    echo server_check();
    echo "<tr><td align=\"center\">$continue_button</td></tr>"
        ."</table></form>";

    include('install/footer.php');
} elseif ($step == 5) {
    include('install/header.php');

    echo "<form method=post>"
        ."<table id=menu border=\"1\" width=\"100%\">"
        ."<th id=rowHeading align=\"center\" colspan=2>".$nuke_name." " . $install_lang['installer_heading'] . " $step " . $install_lang['installer_heading2'] . " ".$total_steps."</th>";
    echo do_sql("install/install.sql");
    echo "</table></form>";

    include('install/footer.php');
} elseif ($step == 6) {
    include('install/header.php');
    echo "<form method=post>"
        ."<table id=menu border=\"1\" width=\"100%\">"
        ."<th id=rowHeading align=\"center\" colspan=2>".$nuke_name." " . $install_lang['installer_heading'] . " $step " . $install_lang['installer_heading2'] . " ".$total_steps."</th>";
    echo site_form();
    echo "<tr><td align=center colspan=2><input type=hidden name=step value=\"$next_step\"><input type=submit name=submit value=\"" . $install_lang['configure'] . "\">  <input type=submit name=skip value=\"" . $install_lang['skip'] . "\"></td></tr>";
    echo "</table></form>";
    include('install/footer.php');
} elseif ($step == 7) {
    $skip = (isset($_POST['skip'])) ? $_POST['skip'] : '';
    $submit = (isset($_POST['submit'])) ? $_POST['submit'] : '';

    include('install/header.php');
    if ($submit) {
        site_form(0);
    }
    message($install_lang['done']."<br /><br />".$install_lang['delete']);
    include('install/footer.php');
}

?>