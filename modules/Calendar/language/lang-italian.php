<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: lang-italian.php,v 20.5 2004/04/15 16:58:47 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : lang-italian.php
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

//// translation by: http://www.cahor.com/    THX !!
///   NOT COMPLETE FOR VERSION 1.4 !!!!!!!

####### locale time-format variables #######
if (PHP_OS=="WINNT"||PHP_OS=="WIN32") {
    define("_CALLOCALE","it"); # lokale Einstellungen z.B. Datumsformat f&uuml;r Windows System!!
    }
else {
    define("_CALLOCALE","it_IT");      # lokale Einstellungen z.B. Datumsformat f&uuml;r Linux/Unix
    }
define("_CALSHORTDATEFORMAT","%d/%m/%y");
define("_CALLONGDATEFORMAT","%A, %d %B %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",1);  //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",1);// 1 = 24 hour time... 0 = AM/PM time
define("_CALTIMEFORMAT","%I:%M %p"); # ? AM/PM time
define("_CALWEEKBEGINN",0);      # the First Day in the Week: 0 = Sunday, 1 = Monday

####### main texts #######
define("_CALDOTCOLORALL","tutti&nbsp;gli&nbsp;eventi");  // desription of all Events (no colordot)
define("_CALSEND","Invia");
define("_CALSUBMITEVENT", "Suggerisci un evento");
define("_CALSUBMITNAME", "Modulo Inserimento Evento");
define("_CALNAME", "Calendario Eventi");
define("_CALPREVIEW", "Preview Evento");
define("_CALOK", "Invio  Evento");
define("_CALEVENTDATETEXT", "Data Evento");
define("_CALSUBSENT", "Il tuo evento è stato ricevuto");
define("_CALTHANKSSUB", "Grazie per la segnalazione!");
define("_CALSUBTEXT", "Controlleremo la tua segnalazione e la pubblicheremo il prima possibile.");
define("_CALSUBTEXTADMIN", "La tua segnalazione è stata pubblicata direttamente.");
define("_CALWEHAVESUB", "In questo momento abbiamo");
define("_CALWAITING", "suggerimento in attesa di essere pubblicati.");
define("_CALEVENTDATEPREVIEW", "Data Evento");
define("_CALCHECKSTORY", "Prego controllare titolo, date, testo e tutti i dati  inseriti prima di inviare l'evento!");
define("_CALYOURNAME", "Nome");
define("_CALLOGOUT", "Logout");
define("_CALSUBTITLE", "Descrizione");
define("_CALTOPIC", "Argomento");
define("_CALSELECTTOPIC", "Scegli l'argomento");
define("_CALARTICLETEXT", "Descrizione");
define("_CALHTMLISFINE", "E' possibile utilizzare l'HTML ma controlla bene gli URL e il codice!");
define("_CALNEWSUBPREVIEW", "Anteprima dell'invio Evento");
define("_CALSTORYLOOK", "Il tuo evento avrà un'aspetto simile a:");
define("_CALBEDESCRIPTIVE", "Sii descrittivo, chiaro e diretto");
define("_CALSUBPREVIEW", "Devi vedere l'anteprima del tuo evento prima dell'invio finale");
define("_CALALLOWEDHTML", "Codice HTML ammesso");
define("_CALSUBMISSIONSADMIN", "Amministrazione Invii Eventi");
define("_CALNEWSUBMISSIONS", "Invii Nuovi eventi");
define("_CALNOSUBJECT", "Nessuna Descrizione Inserita!");
define("_CALNOSUBMISSIONS", "Non sono stati trovati eventi inviati!");
define("_CALDELETE", "Cancella");
define("_CALNAMEFIELD", "Nome");
define("_CALDELETESTORY", "Cancella Evento");
define("_CALPREVIEWSTORY", "Anteprima Event");
define("_CALPOSTSTORY", "Invia Evento");
define("_CALSUBMITADVICE1", "Inserisce il tuo evento compilando il modulo e controllando attentamente i dati.");
define("_CALSUBMITADVICE2", "<br />Ti avvisiamo che non tutte le segnalazioni saranno pubblicate.<br />La tua segnalazione sarà controllata e, se è necessario, corretta o modificata dal nostro staff.");
define("_CALPOSTEDBY","Segnalato da");
define("_CALPOSTEDON","il");
define("_CALACCEPTEDBY"," e approvato da");
define("_CALVIEWEVENT","Evento");
define("_CALPREVIOUS","Prec");
define("_CALNEXT","Succ");
define("_CALSTARTTIME","Ora Inizio");
define("_CALENDTIME","Ora Termine");
define("_CALALLDAYEVENT","Tutto il giorno");
define("_CALTIMEIGNORED","Gli orari di inizio e termine saranno ignorati.");
define("_CALENDDATETEXT","Data Termine");
define("_CALENDDATEPREVIEW","Data Finale");
#define("_CALBARCOLORTEXT","Scegli una categoria per questo evento");
define("_CALBARCOLORTEXT","Categoria");
define("_CALLOGIN","Login");
define("_CALNO","No");
define("_CALYES","Sì");
define("_CALREMOVETEST","Sei sicuro di voler rimuovere questo evento?");
define("_CALNOTAUTHORIZED1","Non sei autorizzato a rimuovere questo evento o modificare questi dati");
define("_CALNOTAUTHORIZED2","Contatta l'amministratore di sistema per qualunque ulteriore informazione");
define("_CALNOTAUTHORIZED3","Non sei autorizzato a rimuovere questi dati!");
define("_CALTODAY","Oggi");
define("_CALLISTDESCRIPTION1","Successivo");
define("_CALLISTDESCRIPTION2","Eventi");
define("_CALLISTSTART","fino a");
define("_CALLISTRANGE","al");
define("_CALHEADAPPOINTM","Appuntamenti");
define("_CALDAYEVENTS","Eventi");
define("_CALDAYMORNING","Mattina");
define("_CALDAYEVENING","Sera");
define("_CALMORE","altri Eventi");
define("_CAL1EVENT","Evento");
define("_CAL2EVENT","Eventi");
define("_CAL0EVENTS", "Non ci sono eventi per questa ricerca");
define("_CAL0EVENTSBLOCK", "Non ci sono eventi disponibili");
define("_CALNOTODAYEVENTS","Nessun evento oggi.");
define("_CALADDASARTICLE","articoli");
define("_CALADDASARTICLE2","Aggiunti un articolo da questo evento.");

####### LINKS ########
define("_CALEVENTLINK","Crea un Evento");
define("_CALAPPTLINK","Crea an Appuntamento");
define("_CALTASKLINK","Aggiungi una nuova Sessione");
define("_CALDAYLINK","Vista Giorno");
define("_CALMONTHLINK","Vista Mensile");
define("_CALYEARLINK","Vista Annuale");
define("_CALJUMPTOTEXT","Vai alla seguente vista");
define("_CALJUMPBUTTON","Vai!");
define("_CALLISTLINK","prossimi Eventi");

####### MONTHS ########
define("_CALJAN","Gennaio");
define("_CALFEB","Febbraio");
define("_CALMAR","Marzo");
define("_CALAPR","Aprila");
define("_CALMAY","Maggio");
define("_CALJUN","Giugno");
define("_CALJUL","Luglio");
define("_CALAUG","Agosto");
define("_CALSEP","Settembre");
define("_CALOCT","Ottobre");
define("_CALNOV","Novembre");
define("_CALDEC","Dicembre");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Dom");
define("_CALSECONDDAY","Lun");
define("_CALTHIRDDAY","Mar");
define("_CALFOURTHDAY","Mer");
define("_CALFIFTHDAY","Gio");
define("_CALSIXTHDAY","Ven");
define("_CALSEVENTHDAY","Sab");
define("_CALLONGFIRSTDAY","Domenica");
define("_CALLONGSECONDDAY","Lunedì");
define("_CALLONGTHIRDDAY","Martedì");
define("_CALLONGFOURTHDAY","Mercoledì");
define("_CALLONGFIFTHDAY","Giovedì");
define("_CALLONGSIXTHDAY","Venerdì");
define("_CALLONGSEVENTHDAY","Sabato");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","C'è stato un errore cercando di verificare i dati immessi!");
define("_CALVALIDFIXMSG","Correggere questi errori prima di inviare i dati inseriti.");
define("_CALVALIDSUBJECT","La 'Descrizione' è un campo obbligatorio.");
define("_CALVALIDENDDATE","La 'Data Termine' non è una data valida.");
define("_CALVALIDEVENTDATE","La 'Data Evento' non è una data valida.");
define("_CALVALIDDATES","La \"Data Termine\" deve essere successiva o uguale alla \"Data Evento\".");
define("_CALVALIDTIMES","L' \"Ora Termine\" deve essere successiva a' \"Ora Inizio\".");
define("_CALVALIDTOPIC", "Scegli un Argomento.");

#### TRANSLATE ??????????? #######################################################################
define("_CALINDEX", "show right blocks");
define("_CALTEXTEVENTS", "image Bars for multiday events");
define("_CALADDARTICLEBOX", "automatic News article permit");
define("_CALPOSTUSERS","registered Users allow events announce");
define("_CALUSETOPICS", "News-topics use");
define("_CALUSETOPICS1", "Yes, but not necessarily");
define("_CALUSETOPICS2", "Yes, necessarily");
define("_CALDEFAULTVIEW", "Defaultview");
define("_CALMINUTERANGE", "distance of the minutes with date time selection");
define("_CALADMINEDITALL", "Admins may work on only own events");
define("_CALADMINMENUSHOW", "use normal CMS Adminmenue");
define("_CALADMINTYPE", "Admintype, which Admins may work on events");
define("_CALLISTCOUNT", "number of entries in list-view");
define("_CALLISTSHOWSTART", "starting time in list-view indicate");
define("_CALLISTENDDATE", "final date in list-view indicate");
define("_CALLISTENDTIME", "final time in list-view indicate");
define("_CALLISTENDDATE2", "final date in indicate, if equal the starting date");
define("_CALLISTBR", "line-makeup between date and time in list-view");
define("_CALDAYTIMEARRAY", "time intervalls in daily view");
define("_CALALLOWABLEHTML", "permitted HTML tags in description of date");
define("_CALONLYWEN", "(only if final date indicated)"); 
define("_CALSHOWLINKS","show date in day-view as link");
define("_CALCALENDARCONFIG", "calendar configuration");
define("_CALCONF1", "the settings could not be stored!");
define("_CALCONF2", "the settings were stored!");
define("_CALCONF3", "the file");
define("_CALCONF4", "is write protected, <br />settings can not be stored!");
define("_CALACTIV", "status actively");

define("_CALMENUROWS","Columns");
define("_CALMENUROWS2","Count of Columns in Categories-List");

define("_CALERREVENTNOTEXIST","Event doesn't exist in our database.");
define("_CALERRSQLERROR","Database-Error!");
define("_CALONLYDEACTIVATE","only deactivate");
define("_CALDEACTIVATED","deactivated events");
define("_CALNODEACTIVATED","no deactivated events");
define("_CALNAVIPREV","Events back");
define("_CALNAVINEXT","next Events");

/// ab 1.3
define("_CALPRINTER1","print page");
define("_CALPRINTER2","send this page to printer");
define("_CALPOSTANONYMOUS", "anonymous allow events announce");
define("_CALUSERSAUTOPOST","publish announced events from announced users immediately");
define("_CALANONYAUTOPOST","publish announced events from anonymous users immediately");
define("_CALCATEGORIESADMIN","Category-Configuration");
define("_CALCATEGORIESLANG","select language");
define("_CALADMINMENU","Administration Menu");
define("_CALSHOWPOPS","popup for eventdescription");
define("_CALSOURCE","Source");
define("_CALGOAL","Goal");

/// ab 1.4
define('_CALHOURS','hours');
define('_CALMINUTES','minutes');
define('_CALDAYS','days');
define('_CALMONTHS','months');
define('_CALYEARS','years');
define("_CALPLSLOGIN","Please Log-In first");
define("_CALSAVESETT", "Invia");

define('_CALALLWORDS','All words [ALL]');
define('_CALANYWORDS','Any words[OR]');
define('_CALSEARCH','Search');
define('_CALSEARCHEVENT','Search Event');
define('_CALFOR','for');
define('_CALSEARCHTITLE','Search in Eventcalendar');
define('_CALCQUEUE','Your search results');
define('_CALTOMUCH1','There is more than ');
define('_CALTOMUCH2',' search results present. Please limit the search conditions.');
define("_CALSEARCHCOUNT", "max. number of search results");
define('_CALSEARCHTOPICS','search in News-Topics');
define('_CALMOREOPTIONINF','You find further options for the optical configuration of the calendar in the file:');
define('_CALSEFROMDATE','from Date');
define('_CALSELCATEGORY','select Category');
define('_CALINTHIS','in');
define("_CALNOTOPICS", "There are no topics available");
define('_CALGOTOEDIT','edit again');
define('_CALGOTOADMIN','then goto Adminmenue');
define('_CALGOTOCALENDAR','then goto Calendarview');
define('_CALCONFVIEW1','Authorizations &amp; Security');
define('_CALCONFVIEW2','Opinions &amp; Optics');
define('_CALCONFVIEW3','News-Articles &amp; -Topics');
define("_CALLISTSHOWLINKS","show date in list-view as link");

?>