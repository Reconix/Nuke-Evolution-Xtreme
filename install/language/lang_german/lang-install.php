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

$step_a[1] = "Anweisungen";
$step_a[2] = "CHMOD Benötigte Files";
$step_a[3] = "Generierung Configfile";
$step_a[4] = "Systemüberprüfung vollziehen";
$step_a[5] = "Installation";
$step_a[6] = "Seiten Config";

$install_lang['briefing'] = "Das wird $nuke_name auf dem Server installieren";
$install_lang['couldnt_connect'] = "Konnte nicht zur Datenbank verbinden<br />";
$install_lang['couldnt_select_db'] = "Konnte Datenbank nicht auswählen<br />";
$install_lang['continue'] = "Weiter zu Schritt";
$install_lang['connection_failed'] = "Verbindung zum Server ist fehlgeschlagen! Bitte Einstellungen überprüfen.";
$install_lang['connection_failed2'] = "Verbindung zur Datenbank ist fehlgeschlagen! Bitte Einstellungen überprüfen. (Database Name)";
$install_lang['chmod'] = "CHMOD Benötigte Files";
$install_lang['config_maker'] = "Config.php Generator";
$install_lang['configure'] = "Seitenkonfiguration";
$install_lang['cant_open'] = "Konnte Datei nicht öffnen";
$install_lang['cantwrite'] = "Konnte nicht in die Datei schreiben";
$install_lang['chmod_failed'] = "Ein oder mehrere Dateien sind Fehlgeschlagen, bitte CHMOD manuell setzen.";
$install_lang['config_success'] = "Config.php Erfolgreich erstellt.";
$install_lang['cookie_name'] = "Cookie Name:";
$install_lang['cookie_path'] = "Cookie Pfad:";
$install_lang['cookie_domain'] = "Cookie Domain:";
$install_lang['config_failed'] = "Config.php Generierung fehlgeschlagen.";
$install_lang['installer_heading'] = "Installer :: Schritt";
$install_lang['installer_heading2'] = "of";
$install_lang['dbhost'] = "DB Host:";
$install_lang['dbname'] = "DB Name:";
$install_lang['dbuser'] = "DB User:";
$install_lang['dbpass'] = "DB Passwort:";
$install_lang['dbtype'] = "DB Type:";
$install_lang['dbhost_error'] = "Eingabe eines Datenbankhost benötigt(Standart ist \"localhost\")";
$install_lang['dbname_error'] = "Eingabe eines Datenbank Namens benötigt.";
$install_lang['dbuser_error'] = "Eingabe eines Datenbank User benötigt.";
$install_lang['dbpass_error'] = "Eingabe eines Passwortes benötigt.";
$install_lang['dbtype_error'] = "Eingabe eines Datenbanktyps benötigt.";
$install_lang['data_success'] = "Datenbank Gültigkeit und SQL Serverkontrolle erfolgreich Beendet!";
$install_lang['die_message'] = "Genereller Fehler";
$install_lang['prefix'] = "Prefix:";
$install_lang['user_prefix'] = "User Prefix:";
$install_lang['confirm_data'] = "Daten bestätigen";
$install_lang['server_check'] = "Server Kontrolle";
$install_lang['skip'] = "Konfiguration überspringen";
$install_lang['failed'] = "Fehlgeschlagen";
$install_lang['success'] = "Erfolgreich";
$install_lang['thefile'] = "Die Datei";
$install_lang['is_missing'] = "fehlt.<br />";
$install_lang['prefix_error'] = "Eingabe eines Prefix benötigt.";
$install_lang['uprefix_error'] = "Eingabe eines User prefix benötigt.";
$install_lang['mysql_incorrect'] = "<font color=red>Ihre MySQL- Version ist nicht korrekt!</font><br />Ihr Server hat folgende MySQL Version '.$sql_version.' und Version 4.x wird benötigt.";
$install_lang['dbtype_que'] = "Sie haben etwas anderes als MySQL als Datenbanktyp angegeben. Sicher, dass diese verwendet werden soll? Wenn nicht, zurück und MySQL auswählen.";
$install_lang['session_lost'] = "Die Daten dieser Session sind verlohren, bitte Installation nochmals durchführen.";
$install_lang['php_ver'] = "Die PHP- Version ist nicht korrekt!</font></strong><br />4.x.x ist benötigt - Diese Version ist";
$install_lang['checks_good'] = "Überprüfungen sind erfolgreich durchgeführt! Bitte weiterfahren.";
$install_lang['sql_error'] = "Es hat sich ein MySQL fehler gegeben. <strong>MySQL Fehler Details:</strong></font><br />";
$install_lang['install_success'] = "Die Installation von $nuke_name war erfolgreich.";
$install_lang['get_config_error'] = "Konnte Informations Config nicht abfragen<br />";
$install_lang['update_fail'] = "Update fehlgeschlagen für";
$install_lang['sitename'] = "Seiten Name:";
$install_lang['sitedescr'] = "Siten Beschreibung:";
$install_lang['namechange'] = "Allow Namechange:";
$install_lang['yes'] = "Ja:";
$install_lang['no'] = "Nein:";
$install_lang['email_sig'] = "Email Sig:";
$install_lang['site_email'] = "Siten E-Mail:";
$install_lang['default_lang'] = "Standart Sprache:";
$install_lang['server_name'] = "Server Name:";
$install_lang['server_port'] = "Server Port:";
$install_lang['done'] = "Danke für das Auswählen von Nuke-Evolution.<br /><br /><a href=index.php>Zu der Homepage</a>";
$install_lang['delete'] = "<font color=\"red\">Bitte install.php und Installationsordner löschen</font>";
$install_lang['install_complete_header'] = " :: Installation beendet";
$install_lang['general_message'] = "Allgemeine Mitteilung";
$install_lang['data_error'] = "Kann data.txt nicht öffnen";
$install_lang['safe_mode'] = "PHP ist zur Zeit im abgesicherten Modus.<br /><br />Das behindert die Fertigstellung duch die Installationsroutine.<br /><br />Nuke-Evolution muss manuell installiert werden.<br /><br />Bitte Installationshilfe Datei öffnen und manuell installieren.";

?>