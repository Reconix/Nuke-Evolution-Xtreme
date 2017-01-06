<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: lang-polish.php,v 20.4 2004/04/15 16:58:47 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : lang-polish.php
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

//  !!!!!!!!!! this file is not completely translated   !!!!!!
// translated by:
// Willi, E-mail: Tomasz-Czernecki@wp.pl
///   NOT COMPLETE FOR VERSION 1.3 !!!!!!!

####### locale time-format variables #######
if (PHP_OS=="WINNT"||PHP_OS=="WIN32") {
    define("_CALLOCALE","pl"); # lokale Einstellungen z.B. Datumsformat fuer Windows System!!
    }
else {
    define("_CALLOCALE","pl_PL");        # lokale Einstellungen z.B. Datumsformat fuer Linux/Unix
    }
define("_CALSHORTDATEFORMAT","%d-%m-%Y");
define("_CALLONGDATEFORMAT","%A, %d %B %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",1);  //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",1);// 1 = 24 hour time... 0 = AM/PM time
define("_CALTIMEFORMAT","%I:%M %p"); # ? AM/PM time
define("_CALWEEKBEGINN",1);        # the First Day in the Week: 0 = Sunday, 1 = Monday

####### main texts #######
define("_CALDOTCOLORALL","wszystkie&nbsp;wydarzenia");  // desription of all Events (no colordot)
define("_CALSEND","Wy¶lij");
define("_CALSUBMITEVENT", "Dodaj Termin");
define("_CALSUBMITNAME", "Dodawanie Nowego Terminu");
define("_CALNAME", "Kalendarz");
define("_CALPREVIEW", "Podgl±d");
define("_CALOK", "Publikuj");
define("_CALEVENTDATETEXT", "Pocz±tek");
define("_CALSUBSENT", "Otrzymali¶my Twoj± propozycjê terminu do kalendarza!");
define("_CALTHANKSSUB", "DZIÊKUJEMY!");
define("_CALSUBTEXT", "Nied³ugo sprawdzimy twoj± propozycjê. Informujemy, i¿ nie wszystkie propozycje s± publikowane.");
define("_CALSUBTEXTADMIN", "Twoja propozycja zosta³a bezpo¶rednio dodana do kalendarza!!!.");
define("_CALWEHAVESUB", "W tym momencie na opublikowanie oczekuje");
define("_CALWAITING", "termin/y/ów.");
define("_CALEVENTDATEPREVIEW", "Event Date");
define("_CALCHECKSTORY", "Przed wys³aniem propozycji terminu u¿yj opcji 'podgl±d' do sprawdzenia tekstu, linków etc.!");
define("_CALYOURNAME", "Nazwisko");
define("_CALLOGOUT", "Logout");
define("_CALSUBTITLE", "Tytu³");
define("_CALTOPIC", "Temat");
define("_CALSELECTTOPIC", "Wybierz Temat");
define("_CALARTICLETEXT", "Opis");
define("_CALHTMLISFINE", "Je¶li u¿ywasz HTML sprawdz jego poprawno¶æ.");
define("_CALNEWSUBPREVIEW", "Event Submission Preview");
define("_CALSTORYLOOK", "Your event will look something like this:");
define("_CALBEDESCRIPTIVE", "Postaraj siê o prosty i zrozumia³y tytu³");
define("_CALSUBPREVIEW", "You must preview your event once before you can submit");
define("_CALALLOWEDHTML", "Mo¿esz korzystaæ z tagów HTML");
define("_CALSUBMISSIONSADMIN", "Administracja Kalendarzem");
define("_CALNEWSUBMISSIONS", "New Event Submissions");
define("_CALNOSUBJECT", "Musisz Wype³niæ To Pole!");
define("_CALNOSUBMISSIONS", "No Submissions Found!");
define("_CALDELETE", "Skasuj");
define("_CALNAMEFIELD", "Nazwisko");
define("_CALDELETESTORY", "Delete Event");
define("_CALPREVIEWSTORY", "Preview Event");
define("_CALPOSTSTORY", "Post Event");
define("_CALSUBMITADVICE1", "Wype³nij dok³adnie poni¿szy formularz.");
define("_CALSUBMITADVICE2", "<br />Przed dodaniem Twojego terminu do kalendarza zostanie on zweryfikowany.<br /><br />");
define("_CALPOSTEDBY","Wys³any przez");
define("_CALPOSTEDON","dnia");
define("_CALACCEPTEDBY",", zaakceptowany przez");
define("_CALVIEWEVENT","Calendar Event");
define("_CALPREVIOUS","wstecz");
define("_CALNEXT","Dalej");
define("_CALSTARTTIME","Godzina");
define("_CALENDTIME","Godzina");
define("_CALALLDAYEVENT","Ca³odzinny");
define("_CALTIMEIGNORED","Bez godziny rozpoczêcia i zakoñczenia.");
define("_CALENDDATETEXT","Koniec");
define("_CALENDDATEPREVIEW","Zakoñczenie");
#define("_CALBARCOLORTEXT","Select a category for this event");
define("_CALBARCOLORTEXT","Kategoria");
define("_CALLOGIN","Login");
define("_CALNO","Nie");
define("_CALYES","Tak");
define("_CALREMOVETEST","Are you sure, you want to remove this event?");
define("_CALNOTAUTHORIZED1","You are not authorized to remove, or edit that entry");
define("_CALNOTAUTHORIZED2","Contact your system administrator for any questions you may have");
define("_CALNOTAUTHORIZED3","Sorry, You are not authorized to remove or edit entries!");
define("_CALTODAY","Dzisiaj");
define("_CALLISTDESCRIPTION1","Wydarzeñ:");
define("_CALLISTDESCRIPTION2","");
define("_CALLISTSTART","liczone od");
define("_CALLISTRANGE","do");
define("_CALHEADAPPOINTM","Harmonogram");
define("_CALDAYEVENTS","Wydarzenia ca³odzienne");
define("_CALDAYMORNING","Rano");
define("_CALDAYEVENING","Wieczór");
define("_CALMORE","more Events");
define("_CAL1EVENT","Event");
define("_CAL2EVENT","wydarzenie/a/ñ");
define("_CAL0EVENTS", "Brak wydarzeñ");
define("_CAL0EVENTSBLOCK", "Sorry, we have no current events available.");
define("_CALNOTODAYEVENTS","No events today.");
define("_CALADDASARTICLE","Artyku³");
define("_CALADDASARTICLE2","Opis wydarzenia bedzie opublikowany na stronie g³ównej.");

####### LINKS ########
define("_CALEVENTLINK","Create an Event");
define("_CALAPPTLINK","Create an Appointment");
define("_CALTASKLINK","Add a new Task");
define("_CALDAYLINK","Dzieñ");
define("_CALMONTHLINK","Miesi±c");
define("_CALYEARLINK","Rok");
define("_CALJUMPTOTEXT","Wybierz widok");
define("_CALJUMPBUTTON","Zobacz!");
define("_CALLISTLINK","Lista");

####### MONTHS ########
define("_CALJAN","Styczeñ");
define("_CALFEB","Luty");
define("_CALMAR","Marzec");
define("_CALAPR","Kwiecieñ");
define("_CALMAY","Maj");
define("_CALJUN","Czerwiec");
define("_CALJUL","Lipiec");
define("_CALAUG","Sierpieñ");
define("_CALSEP","Wrzesieñ");
define("_CALOCT","Pa¼dziernik");
define("_CALNOV","Listopad");
define("_CALDEC","Grudzieñ");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Pn");
define("_CALSECONDDAY","Wt");
define("_CALTHIRDDAY","¦r");
define("_CALFOURTHDAY","Cz");
define("_CALFIFTHDAY","Pt");
define("_CALSIXTHDAY","So");
define("_CALSEVENTHDAY","N");
define("_CALLONGFIRSTDAY","Niedziela");
define("_CALLONGSECONDDAY","Poniedzia³ek");
define("_CALLONGTHIRDDAY","Wtorek");
define("_CALLONGFOURTHDAY","¦roda");
define("_CALLONGFIFTHDAY","Czwartek");
define("_CALLONGSIXTHDAY","Pi±tek");
define("_CALLONGSEVENTHDAY","Sobota");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","Znaleziono b³êdy w wype³nianym przez Ciebie formularzu!");
define("_CALVALIDFIXMSG","Proszê poprawiæ wystêpuj±ce b³êdy przed wys³aniem terminu.");
define("_CALVALIDSUBJECT","Musisz wype³niæ pole: Tytu³.");
define("_CALVALIDENDDATE","Niepoprawna Data Koñcowa!");
define("_CALVALIDEVENTDATE","Niepoprawna Data Terminu.");
define("_CALVALIDDATES","Wprowadzona 'Data Koñcowa' jest wcze¶niejsza ni¿ 'Data Rozpoczêcia' - Popraw B³±d!.");
define("_CALVALIDTIMES","Wprowadzony 'Czas Zakoñczenia' jest wcze¶niejszy ni¿ 'Czas Rozpoczêcia' - Popraw B³±d!.");
define("_CALVALIDTOPIC", "Wybierz Temat.");

/// ab 1.1a
define("_CALINDEX","rechte Bloecke anzeigen");
define("_CALTEXTEVENTS","Bildleisten fuer mehrtaegige Termine");
define("_CALADDARTICLEBOX","automatischen News-Artikel erlauben");
define("_CALPOSTUSERS","angemeldete Benutzer duerfen Termine melden");
define("_CALUSETOPICS","News-Themen verwenden");
define("_CALUSETOPICS1","Ja, aber nicht erforderlich");
define("_CALUSETOPICS2","Ja, erforderlich");
define("_CALDEFAULTVIEW","Standardansicht");
define("_CALMINUTERANGE","Abstand der Minuten bei Terminzeit-Auswahl");
define("_CALADMINEDITALL","Admins duerfen nur eigene Termine bearbeiten");
define("_CALADMINMENUSHOW","normales CMS Adminmenue verwenden");
define("_CALADMINTYPE","Admintyp, welche Admins duerfen Termine bearbeiten");
define("_CALLISTCOUNT","Anzahl der Eintraege in Listenansicht");
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
define("_CALCONF1","Die Einstellungen konnten nicht gespeichert werden!");
define("_CALCONF2","Die Einstellungen wurden gespeichert!");
define("_CALCONF3","Die Datei ");
define("_CALCONF4","ist schreibgeschuetzt, <br />Aenderungen koennen nicht gespeichert werden!");
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
define("_CALPOSTANONYMOUS","anonyme dürfen Termine melden");
define("_CALUSERSAUTOPOST","gemeldete Termine von angemeldeten Benutzern sofort freischalten");
define("_CALANONYAUTOPOST","gemeldete Termine von anonymen Benutzern sofort freischalten");
define("_CALCATEGORIESADMIN","Kategorie-Konfiguration");
define("_CALCATEGORIESLANG","Andere Sprachen wählen");
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
define('_CALTOMUCH2',' Suchergebnisse vorhanden. Bitte schr&auml;nken Sie die Suchbedingungen ein.');
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