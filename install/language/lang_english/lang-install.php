<?php
/*=======================================================================
 Nuke-Evolution Xtreme: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Installer
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : lang-install.php
   Author        : JeFFb68CAM (www.Evo-Mods.com)
   Version       : 1.0.0
   Date          : 11.05.2005 (mm.dd.yyyy)

   Notes         : You may NOT use this installer for your own
                   needs or script. It is written specifically
                   for Nuke-Evolution.
************************************************************************/

$step_a[1] = "Briefing";
$step_a[2] = "CHMOD Required Files";
$step_a[3] = "Generate Config File";
$step_a[4] = "Perform System Checks";
$step_a[5] = "Install";
$step_a[6] = "Site Config";

$install_lang['briefing'] = "This will install $nuke_name on your server";
$install_lang['couldnt_connect'] = "Could not connect to database<br />";
$install_lang['couldnt_select_db'] = "Could not select database<br />";
$install_lang['continue'] = "Continue To Step";
$install_lang['connection_failed'] = "Connection to the server has failed! Make sure your settings are correct.";
$install_lang['connection_failed2'] = "Connection to the database has failed! Make sure your settings are correct. (Database name)";
$install_lang['chmod'] = "CHMOD Required Files";
$install_lang['config_maker'] = "Config.php Generator";
$install_lang['configure'] = "Configure Site";
$install_lang['cant_open'] = "Cannot open file";
$install_lang['cantwrite'] = "Cannot write to file";
$install_lang['chmod_failed'] = "One or more files has failed, please manually chmod them.";
$install_lang['config_success'] = "Config.php generated Successfully.";
$install_lang['cookie_name'] = "Cookie Name:";
$install_lang['cookie_path'] = "Cookie Path:";
$install_lang['cookie_domain'] = "Cookie Domain:";
$install_lang['config_failed'] = "Config.php generation failed.";
$install_lang['installer_heading'] = "Installer :: Step";
$install_lang['installer_heading2'] = "of";
$install_lang['dbhost'] = "DB Host:";
$install_lang['dbname'] = "DB Name:";
$install_lang['dbuser'] = "DB User:";
$install_lang['dbpass'] = "DB Password:";
$install_lang['dbtype'] = "DB Type:";
$install_lang['dbhost_error'] = "You must enter a database host (default is \"localhost\")";
$install_lang['dbname_error'] = "You must enter a database name.";
$install_lang['dbuser_error'] = "You must enter a database user.";
$install_lang['dbpass_error'] = "You must enter a database password.";
$install_lang['dbtype_error'] = "You must select a database type.";
$install_lang['data_success'] = "Data validation and SQL Server Checks completed succsesfully!";
$install_lang['die_message'] = "General Error";
$install_lang['prefix'] = "Prefix:";
$install_lang['user_prefix'] = "User Prefix:";
$install_lang['confirm_data'] = "Confirm Data";
$install_lang['server_check'] = "Server Check";
$install_lang['skip'] = "Skip Configuration";
$install_lang['failed'] = "FAILED";
$install_lang['success'] = "SUCCESS";
$install_lang['thefile'] = "The file";
$install_lang['is_missing'] = "is missing.<br />";
$install_lang['prefix_error'] = "You must enter a prefix.";
$install_lang['uprefix_error'] = "You must enter a user prefix.";
$install_lang['mysql_incorrect'] = "<font color=red>Your MySQL version is not correct!</font><br />Your server is reporting a MySQL version of $sql_version and 4.x is required.";
$install_lang['dbtype_que'] = "You have chosen something other than MySQL as your database type, are you sure you wish to use this? If you are not sure, you need to go back and select MySQL.";
$install_lang['session_lost'] = "Your Session Data was lost, please run install again.";
$install_lang['php_ver'] = "Your PHP version is incorrect!</font></strong><br />4.x.x is required - Your version is";
$install_lang['checks_good'] = "All checks completed Successfully. Please continue.";
$install_lang['sql_error'] = "There has been a MySQL error. <strong>MySQL Error Details:</strong></font><br />";
$install_lang['install_success'] = "Your installation of $nuke_name has been Successful.";
$install_lang['get_config_error'] = "Could not query config information<br />";
$install_lang['update_fail'] = "Failed to update configuration for";
$install_lang['sitename'] = "Site Name:";
$install_lang['sitedescr'] = "Site Description:";
$install_lang['namechange'] = "Allow Namechange:";
$install_lang['yes'] = "Yes:";
$install_lang['no'] = "No:";
$install_lang['email_sig'] = "Email Sig:";
$install_lang['site_email'] = "Site E-Mail:";
$install_lang['default_lang'] = "Default Language:";
$install_lang['server_name'] = "Server Name:";
$install_lang['server_port'] = "Server Port:";
$install_lang['done'] = "Thank you for choosing Nuke-Evolution.<br /><br /><a href=index.php>Goto your homepage</a>";
$install_lang['delete'] = "<font color=\"red\">Please delete install.php and the install folder</font>";
$install_lang['install_complete_header'] = " :: Installation Complete";
$install_lang['general_message'] = "General Message";
$install_lang['data_error'] = "Cannot open data.txt";
$install_lang['safe_mode'] = "Your php is currently in safe mode.<br /><br />This will keep the installer from finishing.<br /><br />You must install Nuke-Evolution manually.<br /><br />Please see the install help file to manually install.";

?>