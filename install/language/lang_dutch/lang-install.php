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

$step_a[1] = "Uitleg";
$step_a[2] = "CHMOD Benodigde Bestanden";
$step_a[3] = "Genereer Configuratie Bestand";
$step_a[4] = "Controleer Systeem";
$step_a[5] = "Installatie";
$step_a[6] = "Site Configuratie";

$install_lang['briefing'] = "Dit zal $nuke_name installeren op uw server";
$install_lang['couldnt_connect'] = "Kon niet verbinden met database<br />";
$install_lang['couldnt_select_db'] = "Kon geen database selecteren<br />";
$install_lang['continue'] = "Ga verder naar Stap";
$install_lang['connection_failed'] = "Connectie met de server is mislukt! Zorg ervoor dat uw instellingen correct zijn.";
$install_lang['connection_failed2'] = "Connectie met de database is mislukt! Zorg ervoor dat uw instellingen correct zijn. (Database name)";
$install_lang['chmod'] = "CHMOD Benodigde Bestanden";
$install_lang['config_maker'] = "Config.php Generator";
$install_lang['configure'] = "Stel Site in";
$install_lang['cant_open'] = "Kan het bestand niet openen";
$install_lang['cantwrite'] = "Kan niet naar het bestand schrijven";
$install_lang['chmod_failed'] = "Een of meer bestanden zijn mislukt, chmod ze handmatig A.U.B.";
$install_lang['config_success'] = "Config.php generatie gelukt!";
$install_lang['cookie_name'] = "Cookie Naam:";
$install_lang['cookie_path'] = "Cookie Pad:";
$install_lang['cookie_domain'] = "Cookie Domein:";
$install_lang['config_failed'] = "Config.php generatie mislukt!";
$install_lang['installer_heading'] = "Installatie :: Stap";
$install_lang['installer_heading2'] = "van";
$install_lang['dbhost'] = "DB Host:";
$install_lang['dbname'] = "DB Naam:";
$install_lang['dbuser'] = "DB Gebruiker:";
$install_lang['dbpass'] = "DB Wachtwoord:";
$install_lang['dbtype'] = "DB Type:";
$install_lang['dbhost_error'] = "Je moet een database host opgeven(standaard is \"localhost\")";
$install_lang['dbname_error'] = "Je moet een database naam opgeven.";
$install_lang['dbuser_error'] = "Je moet een database gebruiker opgeven.";
$install_lang['dbpass_error'] = "Je moet een database wachtwoord opgeven.";
$install_lang['dbtype_error'] = "Je moet een database type opgeven.";
$install_lang['data_success'] = "Data validatie en SQL Server Checks gelukt!";
$install_lang['die_message'] = "Generale Fout";
$install_lang['prefix'] = "Voorvoegsel:";
$install_lang['user_prefix'] = "Gebruiker Voorvoegsel:";
$install_lang['confirm_data'] = "Controleer Data";
$install_lang['server_check'] = "Server Check";
$install_lang['skip'] = "Sla configuratie over";
$install_lang['failed'] = "MISLUKT";
$install_lang['success'] = "SUCCES";
$install_lang['thefile'] = "Het bestand";
$install_lang['is_missing'] = "ontbreekt.<br />";
$install_lang['prefix_error'] = "Je moet een voorvoegsel opgeven.";
$install_lang['uprefix_error'] = "Je moet een gebruiker voorvoegsel opgeven.";
$install_lang['mysql_incorrect'] = "<font color=red>Uw MySQL versie is niet correct!</font><br />Uw server zegt dat u MySQL versie '.$sql_version.' heeft en 4.x is benodigd.";
$install_lang['dbtype_que'] = "U heeft iets anders gekozen dan MySQL als uw database type, weet u zeker dat u dit wilt gebruiken? Als u het niet zeker weet, ga dan terug en selecteer MySQL.";
$install_lang['session_lost'] = "Uw Sessie Gegevens zijn verloren gegaan, installeer opnieuw A.U.B.";
$install_lang['php_ver'] = "Uw PHP versie is incorrect!</font></strong><br />4.x.x is benodigd - Uw versie is";
$install_lang['checks_good'] = "Alle checks zijn succesvol afgerond. Ga door A.U.B.";
$install_lang['sql_error'] = "Er is een MySQL fout opgetreden. <strong>MySQL Fout Details:</strong></font><br />";
$install_lang['install_success'] = "Uw installatie van $nuke_name is succesvol afgerond.";
$install_lang['get_config_error'] = "Kon de configuratie gegevens niet verzenden<br />";
$install_lang['update_fail'] = "Het bijwerken van de configuratie gegevens zijn mislukt. Betreffend";
$install_lang['sitename'] = "Site Naam:";
$install_lang['sitedescr'] = "Site Descriptie:";
$install_lang['namechange'] = "Sta naam verandering toe:";
$install_lang['yes'] = "Ja:";
$install_lang['no'] = "Nee:";
$install_lang['email_sig'] = "Email Handtekening:";
$install_lang['site_email'] = "Site E-Mail:";
$install_lang['default_lang'] = "Standaard Taal:";
$install_lang['server_name'] = "Server Naam:";
$install_lang['server_port'] = "Server Poort:";
$install_lang['done'] = "Bedankt voor het kiezen van Nuke-Evolution.<br /><br /><a href=index.php>Ga naar uw startpagina</a>";
$install_lang['delete'] = "<font color=\"red\">Verwijder install.php en de install map A.U.B.</font>";
$install_lang['install_complete_header'] = " :: Installation Voltooid";
$install_lang['general_message'] = "Generaal Bericht";
$install_lang['data_error'] = "Kon data.txt niet openen";
$install_lang['safe_mode'] = "Uw php is momenteel in safe mode.<br /><br />Zo kan de installatie niet voltooid worden.<br /><br />Uw moet Nuke-Evolution handmatig installeren.<br /><br />Zie het installatie help bestand hoe een handmatige installatie uit te voeren.";

?>