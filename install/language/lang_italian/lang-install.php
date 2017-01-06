<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Installer Avanzato
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : lang-install.php
   versione      : Italiana
   Autore        : JeFFb68CAM (www.Evo-Mods.com)
   Versione      : 1.0.0
   Date          : 11.05.2005 (mm.dd.yyyy)

   Notes         : Non usare questo installer per i tuoi script
                   personalizzati in quanto esso è stato scritto
                   specificatamente per Nuke-Evolution.

   TRADUZIONE IN ITALIANO A CURA DI NUKE-EVOLUTION.IT
   STAFF : LuckyLuciano  pex1968  leomauro   www.nuke-evolution.it

    info@nuke-evolution.it                                  RL.2.0.2-LU
*************************************************************************/

$step_a[1] = "Preliminari";
$step_a[2] = "Settaggi dei CHMOD richiesti dai file";
$step_a[3] = "Generazione del file Config.php";
$step_a[4] = "Controllo delle performance di sistema";
$step_a[5] = "Installazione del database nel server";
$step_a[6] = "Configurazione del sito";

$install_lang['briefing'] = "Inizio procedura automatica per l'installazione <br /> di Evolution Basic nel tuo server.";
$install_lang['briefing_1'] = "Se l'operazione di settaggio dei permessi chmod non dovesse andare a buon fine, in quanto alcuni server non permettono tale operazione, ti consigliamo di passare al settaggio dei permessi manualmente, rispecchiando i valori contenuti nel file data.txt che si trova dentro la cartella install.";
$install_lang['couldnt_connect'] = "Collegamento non riuscito al database<br />";
$install_lang['couldnt_select_db'] = "Selezione del database non riuscita<br />";
$install_lang['continue'] = "Vai allo steep nr.";
$install_lang['connection_failed'] = "Connessione al server fallita! Ricontrolla che i settaggi siano corretti.";
$install_lang['connection_failed2'] = "Connessione al database fallita! Ricontrolla che i settaggi siano corretti. (Nome del Database)";
$install_lang['chmod'] = "CHMOD richiesti per i file";
$install_lang['config_maker'] = "Config.php Generator";
$install_lang['configure'] = "Configurazione del Sito";
$install_lang['cant_open'] = "Impossibile aprire il file";
$install_lang['cantwrite'] = "Impossibile scrivere sul file";
$install_lang['chmod_failed'] = "I file ai quali non &egrave stato possibile settare i CHMOD corretti devono essere configurati manualmente attraverso il tuo ftp. IMPORTANTE!!! puoi prosegure l'installazione, ma alcuni moduli potrebbero non funzionare correttamente.";
$install_lang['config_success'] = "Config.php generato con successo.";
$install_lang['cookie_name'] = "Nome dei Cookie:";
$install_lang['cookie_path'] = "Percorso dei Cookie:";
$install_lang['cookie_domain'] = "Dominio dei Cookie:";
$install_lang['config_failed'] = "Creazione del Config.php fallita.";
$install_lang['installer_heading'] = "Installer :: passo";
$install_lang['installer_heading2'] = "di";
$install_lang['dbhost'] = "DB Host:";
$install_lang['dbname'] = "DB Name:";
$install_lang['dbuser'] = "DB User:";
$install_lang['dbpass'] = "DB Password:";
$install_lang['dbtype'] = "DB Tipo:";
$install_lang['dbhost_error'] = "Devi settare il database host (default &egrave \"localhost\")";
$install_lang['dbname_error'] = "Devi settare il database name.";
$install_lang['dbuser_error'] = "Devi settare il database user.";
$install_lang['dbpass_error'] = "Devi settare il database password.";
$install_lang['dbtype_error'] = "devi selezionare il tipo di database.";
$install_lang['data_success'] = "La convalida dei dati ed i controlli del server SQL sono stati eseguiti con successo!";
$install_lang['die_message'] = "Errore Generale";
$install_lang['prefix'] = "Prefix:";
$install_lang['user_prefix'] = "User Prefix:";
$install_lang['confirm_data'] = "Conferma i Dati";
$install_lang['server_check'] = "Server Check";
$install_lang['skip'] = "Esci dalla configurazione";
$install_lang['failed'] = "FALLITA";
$install_lang['success'] = "ESEGUITO";
$install_lang['thefile'] = "Il file";
$install_lang['is_missing'] = "manca.<br />";
$install_lang['prefix_error'] = "Devi settare un prefix.";
$install_lang['uprefix_error'] = "Devi settare un user prefix.";
$install_lang['mysql_incorrect'] = "<font color=red>La tua versione del MySQL version non &egrave corretta!</font><br />Il vostro server riporta la versione MySQL '.$sql_version.' mentre invece &egrave richiesta la versione 4.x .";
$install_lang['dbtype_que'] = "Hai scelto una versione diversa dal MySQL come tipo di database, sei sicuro di questo?  Se non sei sicuro, torna indietro e seleziona  MySQL.";
$install_lang['session_lost'] = "I tuoi dati di sessione sono andati persi, per favore reinstallali di nuovo.";
$install_lang['php_ver'] = "La tua versione PHP non &egrave corretta!</font></strong><br />E richiesta la 4.x.x - La tua versione &egrave";
$install_lang['checks_good'] = "Tutti i controlli sono stati eseguiti con successo. Puoi continuare.";
$install_lang['sql_error'] = "C'&egrave stato un errore MySQL. <strong>Dettagli dell'errore MySQL:</strong></font><br />";
$install_lang['install_success'] = "Installazione del database eseguita correttamente.";
$install_lang['get_config_error'] = "Non &egrave stato possibile interrogare alcune informazioni di config<br />";
$install_lang['update_fail'] = "Aggiornamento Configurazione Fallita per";
$install_lang['sitename'] = "Nome del sito:";
$install_lang['sitedescr'] = "Descrizione del sito:";
$install_lang['namechange'] = "Permetti il cambiamento del nome (consigliato no):";
$install_lang['yes'] = "Si:";
$install_lang['no'] = "No:";
$install_lang['email_sig'] = "Firma nelle email:";
$install_lang['site_email'] = "E-mail del webmaster:";
$install_lang['default_lang'] = "Lingua di default:";
$install_lang['server_name'] = "Nome del server:";
$install_lang['server_port'] = "Porta del server:";
$install_lang['done'] = "Grazie per aver scelto Nuke Evolution.<br /><br /><a href=index.php>Vai nella tua homepage</a>";
$install_lang['delete'] = "<font color=\"red\">Per favore cancella il file <strong>install.php</strong> e la cartella <strong>install</strong> dalla root del server prima di proseguire. Inoltre per questioni di sicurezza, ti consigliamo di modificare il chmod del file config.php a quello di default cio&egrave 644.</font>";
$install_lang['install_complete_header'] = " <strong>:: Installazione Completata ::</strong>";
$install_lang['general_message'] = "Messaggio Generale";
$install_lang['data_error'] = "Impossibile aprire il file <strong>data.txt</strong>";
$install_lang['safe_mode'] = "Il tuo installer.php &egrave attualmente in modalit&agrave di sicurezza.<br /><br />Questo non ti permetter&agrave di portare avanti l'ultima parte dell'installazione.<br /><br />Devi procedere con l'installazione manuale di Evolution.<br /><br />Per Favore consulta il file dell'install help per procedere manualmente.";

?>