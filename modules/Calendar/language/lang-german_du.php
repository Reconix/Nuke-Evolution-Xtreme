<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: lang-german_du.php,v 20.12 2004/04/15 16:58:47 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : lang-german_du.php
   Author        : See below
   Improved by   : LombudXa (Rodmar) (www.evolved-Systems.net)
   Version       : 1.4.0c (Based on KalenderMx 1.4b)
   Date          : 06/18/2005 (mm-dd-yyyy)

   Description   : Enhanced Calendar module with a lot of nice
                   features.
                   New Abstraction Layer and Nuke 7.6 Administration
                   System.
************************************************************************/

/************************************************************************/
/* KalenderMx v1.4                                                      */
/* ===================                                                  */
/*  Calendar Module for vkpMx 2.x / pragmaMx & phpNuke 5.5-7.6          */
/*  Copyright (c) 2004 by A.Ellsel (kalender@pragmamx.org)              */
/*  http://www.pragmamx.org & http://www.shiba-design.de                */
/* -------------------------------------------------------------------- */
/* KalenderMx is based on EventCalendar 2.0                             */
/*  Copyright (c) 2001 Originally by Rob Sutton                         */
/*  http://smart.xnettech.net (Nuke Site)                               */
/*  Development continued by Aleks A.-Lessmann                          */
/* Included some ideas and changes by:                                  */
/*  flobee, bulli-frank, kicks, kochloeffel, FrankySz, Jubilee          */
/* -------------------------------------------------------------------- */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 or a newer version.   */
/************************************************************************/

#/modules/Calendar/language/lang-german.du.php
#Du-Version von Hajo Sackmann, webmaster@einewahrheit.de am 24.5.03 um 19.00
#Website: http://www.einewahrheit.de
# fuer VKPMaxi 2

####### Variable f&uuml;r alle lokalen Zeit-Formate #######
if (PHP_OS=="WINNT"||PHP_OS=="WIN32") {
    define("_CALLOCALE","ge"); # lokale Einstellungen z.B. Datumsformat f&uuml;r Windows System!!
    }
else {
    define("_CALLOCALE","de_DE");      # lokale Einstellungen z.B. Datumsformat f&uuml;r Linux/Unix
    }
define("_CALSHORTDATEFORMAT","%d.%m.%y");
define("_CALLONGDATEFORMAT","%A, %d. %B %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",1);  //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",1);// 1 = 24 Stunden Zeit... 0 = AM/PM time
define("_CALTIMEFORMAT","%H:%Mh");
define("_CALWEEKBEGINN",1);# der erste Tag in der Woche: 0 = Sonntag, 1 = Montag

####### main texts #######
define("_CALDOTCOLORALL","Alle&nbsp;Termine");   // desription of all Events (no colordot)
define("_CALSEND","Absenden");
define("_CALSUBMITEVENT", "Termin vorschlagen");
define("_CALSUBMITNAME", "Terminkalender Vorschlagsformular");
define("_CALNAME", "Terminkalender");
define("_CALPREVIEW", "Terminvorschau");
define("_CALOK", "Termin &uuml;bermitteln");
define("_CALEVENTDATETEXT", "Termindatum");
define("_CALSUBSENT", "Dein Kalendereintrag ist eingegangen");
define("_CALTHANKSSUB", "Vielen Dank f&uuml;r deine Einsendung!");
define("_CALSUBTEXT", "In den n&auml;chsten Stunden wird dein Eintrag gepr&uuml;ft und gegebenenfalls ver&ouml;ffentlicht.");
define("_CALSUBTEXTADMIN", "Dein Eintrag wurde sofort ver&ouml;ffentlicht.");
define("_CALWEHAVESUB", "Im Augenblick haben wir");
define("_CALWAITING", "Einsendungen, die darauf warten, ver&ouml;ffentlicht zu werden.");
define("_CALEVENTDATEPREVIEW", "Termindatum");
define("_CALCHECKSTORY", "Bitte &uuml;berpr&uuml;fe Text, Links, etc., BEVOR du deinen Termin senden!");
define("_CALYOURNAME", "Dein Name");
define("_CALLOGOUT", "Logout");
define("_CALSUBTITLE", "Betreff");
define("_CALTOPIC", "Thema");
define("_CALSELECTTOPIC", "Thema ausw&auml;hlen");
define("_CALARTICLETEXT", "Beschreibung");
define("_CALHTMLISFINE", "HTML ist erlaubt, bitte &uuml;berpr&uuml;fe aber unbedingt die Tags!");
define("_CALNEWSUBPREVIEW", "Terminvorschlag: Vorschau");
define("_CALSTORYLOOK", "Dein Eintrag wird in etwa SO aussehen:");
define("_CALBEDESCRIPTIVE", "Beschreibe bitte kurz und pr&auml;zise!");
define("_CALSUBPREVIEW", "Vor der &Uuml;bertragung musst du zun&auml;chst die Vorschau ansehen");
define("_CALALLOWEDHTML", "Erlaubtes HTML");
define("_CALSUBMISSIONSADMIN", "Termin-Administration");
define("_CALNEWSUBMISSIONS", "Neue Terminvorschl&auml;ge");
define("_CALNOSUBJECT", "ein Betreff fehlt!");
define("_CALNOSUBMISSIONS", "Keine neuen Terminvorschl&auml;ge vorhanden!");
define("_CALDELETE", "L&ouml;schen");
define("_CALNAMEFIELD", "Name");
define("_CALDELETESTORY", "Termin l&ouml;schen");
define("_CALPREVIEWSTORY", "Terminvorschau");
define("_CALPOSTSTORY", "Termin speichern");
define("_CALSUBMITADVICE1", "F&uuml;lle bitte das folgende Formular aus.");
define("_CALSUBMITADVICE2", "Wir m&ouml;chten dich darauf hinweisen, dass nicht alle Termine ver&ouml;ffentlicht werden.<br />Eventuell nehmen wir uns die Freiheit, deinen Termin zu &uuml;berarbeiten.");
define("_CALPOSTEDBY","Ver&ouml;ffentlicht von");
define("_CALPOSTEDON","am");
define("_CALACCEPTEDBY"," und genehmigt von");
define("_CALPREVIOUS","Vorherige");
define("_CALNEXT","N&auml;chste");
define("_CALSTARTTIME","Startzeit");
define("_CALENDTIME","Ende");
define("_CALALLDAYEVENT","ganzt&auml;gig");
define("_CALTIMEIGNORED","Start- und Endzeit werden ignoriert.");
define("_CALENDDATETEXT","Enddatum");
define("_CALENDDATEPREVIEW","Enddatum");
#define("_CALBARCOLORTEXT","Bitte w&auml;hle eine Kategorie f&uuml;r den Termin aus");
define("_CALBARCOLORTEXT","Kategorie");
define("_CALLOGIN","Login");
define("_CALNO","Nein");
define("_CALYES","Ja");
define("_CALREMOVETEST","Bist du sicher, dass du diesen Termin entfernen m&ouml;chtest?");
define("_CALNOTAUTHORIZED1","Du bist nicht berechtigt, diesen Eintrag zu &auml;ndern oder zu entfernen!");
define("_CALNOTAUTHORIZED2","F&uuml;r Fragen konsultiere bitte den Systemadministrator");
define("_CALNOTAUTHORIZED3","Sorry, aber du bist nicht berechtigt, Eintr&auml;ge zu ver&auml;ndern oder zu l&ouml;schen!");
define("_CALTODAY","Heute");
define("_CALLISTDESCRIPTION1","&Uuml;bersicht der n&auml;chsten");
define("_CALLISTDESCRIPTION2","Termine");
define("_CALLISTSTART","ab");
define("_CALLISTRANGE","bis");
define("_CALHEADAPPOINTM","Termine");
define("_CALDAYEVENTS","Ereignisse");
define("_CALDAYMORNING","am Morgen");
define("_CALDAYEVENING","am Abend");
define("_CALMORE","weitere Termine");
define("_CAL1EVENT","Termin");
define("_CAL2EVENT","Termine");
define("_CAL0EVENTS", "Es sind keine Termine f&uuml;r diese Bedingung vorhanden");
define("_CAL0EVENTSBLOCK", "Sorry, zur Zeit haben wir keine aktuellen Termine zur Verf&uuml;gung.");
define("_CALNOTODAYEVENTS","Keine Termine f&uuml;r heute.");
define("_CALADDASARTICLE","Artikel");
define("_CALADDASARTICLE2","Einen News-Artikel von diesem Termin erstellen.");

####### LINKS ########
define("_CALEVENTLINK","Termin eintragen");
define("_CALAPPTLINK","Termin eintragen");
define("_CALTASKLINK","Neue Aufgabe eintragen");
define("_CALDAYLINK","Tagesansicht");
define("_CALMONTHLINK","Monatsansicht");
define("_CALYEARLINK","Jahresansicht");
define("_CALJUMPTOTEXT","In den folgenden Modus wechseln");
define("_CALJUMPBUTTON","Wechseln!");
define("_CALLISTLINK","n&auml;chste Termine");

####### MONTHS ########
define("_CALJAN","Januar");
define("_CALFEB","Februar");
define("_CALMAR","M&auml;rz");
define("_CALAPR","April");
define("_CALMAY","Mai");
define("_CALJUN","Juni");
define("_CALJUL","Juli");
define("_CALAUG","August");
define("_CALSEP","September");
define("_CALOCT","Oktober");
define("_CALNOV","November");
define("_CALDEC","Dezember");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Mo");
define("_CALSECONDDAY","Di");
define("_CALTHIRDDAY","Mi");
define("_CALFOURTHDAY","Do");
define("_CALFIFTHDAY","Fr");
define("_CALSIXTHDAY","Sa");
define("_CALSEVENTHDAY","So");
define("_CALLONGFIRSTDAY","Montag");
define("_CALLONGSECONDDAY","Dienstag");
define("_CALLONGTHIRDDAY","Mittwoch");
define("_CALLONGFOURTHDAY","Donnerstag");
define("_CALLONGFIFTHDAY","Freitag");
define("_CALLONGSIXTHDAY","Samstag");
define("_CALLONGSEVENTHDAY","Sonntag");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","Es sind Fehler aufgetreten bei dem Versuch, den Eintrag zu best&auml;tigen!");
define("_CALVALIDFIXMSG","Bitte diese Fehler VOR der Vorschau oder &Uuml;bertragung &auml;ndern.");
define("_CALVALIDSUBJECT","Das Feld 'Betreff' ist zwingend notwendig.");
define("_CALVALIDENDDATE","Das 'Enddatum' hat einen ung&uuml;ltigen Eintrag.");
define("_CALVALIDEVENTDATE","Das 'Termindatum' hat einen ung&uuml;ltigen Eintrag.");
define("_CALVALIDDATES","Das 'Enddatum' muss nach, oder gleich, dem 'Termindatum' liegen.");
define("_CALVALIDTIMES","Das 'Enddatum' muss nach dem 'Startdatum' liegen'.");
define("_CALVALIDTOPIC", "Es muss ein Thema ausgew&auml;hlt werden.");

define("_CALINDEX","rechte Bl&ouml;cke anzeigen");
define("_CALTEXTEVENTS","Bildleisten f&uuml;r mehrt&auml;gige Termine");
define("_CALADDARTICLEBOX","automatischen News-Artikel erlauben");
define("_CALPOSTUSERS","angemeldete Benutzer d&uuml;rfen Termine melden");
define("_CALUSETOPICS","News-Themen verwenden");
define("_CALUSETOPICS1","Ja, aber nicht erforderlich");
define("_CALUSETOPICS2","Ja, erforderlich");
define("_CALDEFAULTVIEW","Standardansicht");
define("_CALMINUTERANGE","Abstand der Minuten bei Terminzeit-Auswahl");
define("_CALADMINEDITALL","Admins d&uuml;rfen nur eigene Termine bearbeiten");
define("_CALADMINMENUSHOW","normales CMS Adminmen&uuml; verwenden");
define("_CALADMINTYPE","Admintyp, welche Admins d&uuml;rfen Termine bearbeiten");
define("_CALLISTCOUNT","Anzahl der Eintr&auml;ge in Listenansicht");
define("_CALLISTSHOWSTART","Startzeit in Listenansicht anzeigen");
define("_CALLISTENDDATE","Enddatum in Listenansicht anzeigen");
define("_CALLISTENDTIME","Endzeit in Listenansicht anzeigen");
define("_CALLISTENDDATE2","Enddatum in Listenansicht anzeigen, wenn gleich dem Startdatum");
define("_CALLISTBR","Zeilenumbruch zwischen Datum und Zeit in Listenansicht");
define("_CALDAYTIMEARRAY","Zeitbereiche in Tagesansicht");
define("_CALALLOWABLEHTML","erlaubte HTML-Tags in Terminbeschreibung");
define("_CALONLYWEN","(nur wenn Enddatum angezeigt)");
define("_CALSHOWLINKS","Datum in Terminansicht als Link zeigen");
define("_CALCALENDARCONFIG","Kalender Konfiguration");
define("_CALCONF1","Die &Auml;nderungen konnten nicht gespeichert werden!");
define("_CALCONF2","Die &Auml;nderungen wurden gespeichert!");
define("_CALCONF3","Die Datei ");
define("_CALCONF4","ist schreibgesch&uuml;tzt, <br />&Auml;nderungen k&ouml;nnen nicht gespeichert werden!");
define("_CALACTIV","Status aktiv");
define("_CALMENUROWS","Spalten");
define("_CALMENUROWS2","Anzahl der Spalten in der Kategorieliste");

define("_CALERREVENTNOTEXIST","Dieser Termin existiert nicht in unserer Datenbank.");
define("_CALERRSQLERROR","Datenzugriffsfehler!");
define("_CALONLYDEACTIVATE","nur deaktivieren");
define("_CALDEACTIVATED","deaktivierte Termine");
define("_CALNODEACTIVATED","keine deaktivierte Termine");
define("_CALNAVIPREV","Termine zur&uuml;ck");
define("_CALNAVINEXT","Termine vor");

/// ab 1.3
define("_CALPRINTER1","Seite drucken");
define("_CALPRINTER2","diese Seite ausdrucken");
define("_CALPOSTANONYMOUS","anonyme d&uuml;rfen Termine melden");
define("_CALUSERSAUTOPOST","gemeldete Termine von angemeldeten Benutzern sofort freischalten");
define("_CALANONYAUTOPOST","gemeldete Termine von anonymen Benutzern sofort freischalten");
define("_CALCATEGORIESADMIN","Kategorie-Konfiguration");
define("_CALCATEGORIESLANG","Andere Sprachen w&auml;hlen");
define("_CALADMINMENU","Administrationsmen&uuml;");
define("_CALSHOWPOPS","Terminbeschreibung als Popup");
define("_CALSOURCE","Quelle");
define("_CALGOAL","Ziel");

/// ab 1.4
define('_CALHOURS','Stunden');
define('_CALMINUTES','Minuten');
define('_CALDAYS','Tage');
define('_CALMONTHS','Monate');
define('_CALYEARS','Jahre');
define("_CALPLSLOGIN","Bitte erst einloggen.");
define("_CALSAVESETT", "Speichern");

define('_CALALLWORDS','Alle W&ouml;rter [ALL]');
define('_CALANYWORDS','Ein Wort [OR]');
define('_CALSEARCH','Suche');
define('_CALSEARCHEVENT','Termin suchen');
define('_CALFOR','Nach');
define('_CALSEARCHTITLE','Suche im Terminkalender');
define('_CALCQUEUE','Suchergebnis');
define('_CALTOMUCH1','Es sind mehr als ');
define('_CALTOMUCH2',' Suchergebnisse vorhanden. Bitte schränke die Suchbedingungen ein.');
define("_CALSEARCHCOUNT","max. Anzahl der Suchergebnisse");
define('_CALSEARCHTOPICS','suche auch über News-Themen');
define('_CALMOREOPTIONINF','Weitere Optionen zur optischen Konfiguration des Kalenders findest du in der Datei:');
define('_CALSEFROMDATE','ab Datum');
define('_CALSELCATEGORY','Kategorie auswählen');
define('_CALINTHIS','in');
define("_CALNOTOPICS", "Es sind keine Themenbereiche vorhanden");
define('_CALGOTOEDIT','Termin erneut editieren');
define('_CALGOTOADMIN','weiter zum Adminmenü');
define('_CALGOTOCALENDAR','weiter zur Kalenderansicht');
define('_CALCONFVIEW1','Berechtigungen &amp; Sicherheit');
define('_CALCONFVIEW2','Ansichten & Optik');
define('_CALCONFVIEW3','News-Artikel &amp; -Themen');
define("_CALLISTSHOWLINKS","Datum in Listenansicht als Link zeigen");

?>