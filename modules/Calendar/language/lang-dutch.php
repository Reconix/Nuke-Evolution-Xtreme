<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: lang-dutch.php,v 20.11 2004/04/15 16:58:47 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : lang-dutch.php
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

///   NOT COMPLETE FOR VERSION 1.4 !!!!!!!

####### locale time-format variables #######
if (PHP_OS=="WINNT"||PHP_OS=="WIN32") {
    define("_CALLOCALE","du"); # lokale Einstellungen z.B. Datumsformat f&uuml;r Windows System!!
    }
else {
    define("_CALLOCALE","du_DU");        # lokale Einstellungen z.B. Datumsformat f&uuml;r Linux/Unix
    }
define("_CALSHORTDATEFORMAT","%d.%m.%y");
define("_CALLONGDATEFORMAT","%A, %d. %B %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",1);  //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",1);// 1 = 24 hour time... 0 = AM/PM time
define("_CALTIMEFORMAT","%H:%Mh");
define("_CALWEEKBEGINN",1);# the First Day in the Week: 0 = Sunday, 1 = Monday

####### main texts #######
define("_CALDOTCOLORALL","Alle&nbsp;Termine");   // desription of all Events (no colordot)
define("_CALSEND","Versturen");
define("_CALSUBMITEVENT", "Agendapunt opgeven");
define("_CALSUBMITNAME", "Geef hier je belangrijke data en gegevens");
define("_CALNAME", "Kalender");
define("_CALPREVIEW", "Bekijk vooraf");
define("_CALOK", "Versturen");
define("_CALEVENTDATETEXT", "datum");
define("_CALSUBSENT", "Je bijdrage is geaccepteerd");
define("_CALTHANKSSUB", "Bedankt voor je bijdrage!");
define("_CALSUBTEXT", "Je voorstel wordt zo snel mogelijk bekeken en indien nodig ingevoerd.");
define("_CALSUBTEXTADMIN", "Je bijdrage wordt zo snel mogelijk verwerkt.");
define("_CALWEHAVESUB", "Op het ogenblik hebben we ");
define("_CALWAITING", "bijdragen in de wachtrij staan.");
define("_CALEVENTDATEPREVIEW", "datum");
define("_CALCHECKSTORY", "Controleer alles, ook de links, VOORDAT je je bijdrage opstuurt!");
define("_CALYOURNAME", "Je naam");
define("_CALLOGOUT", "Logout");
define("_CALSUBTITLE", "Onderwerp");
define("_CALTOPIC", "Thema");
define("_CALSELECTTOPIC", "Thema uitkiezen");
define("_CALARTICLETEXT", "Beschrijving");
define("_CALHTMLISFINE", "HTML is toegestaan, Controleer goed of de codes kloppen!");
define("_CALNEWSUBPREVIEW", "Bekijk je inzending vooraf");
define("_CALSTORYLOOK", "Je inzending zal er ongeveer ZO uitzien:");
define("_CALBEDESCRIPTIVE", "Geef een korte beschrijving en wees precies!");
define("_CALSUBPREVIEW", "Voordat je kunt versturen MOET je EERST het voorbeeld bekijken. Pas daarna kun je het veld Versturen selecteren en op Versturen klikken");
define("_CALALLOWEDHTML", "Toegestane HTML");
define("_CALSUBMISSIONSADMIN", "Kalender Administratie");
define("_CALNEWSUBMISSIONS", "Nieuw kalendervoorstel");
define("_CALNOSUBJECT", "er ontbreekt een veld!");
define("_CALNOSUBMISSIONS", "Er zijn geen nieuwe data opgegeven!");
define("_CALDELETE", "Wissen");
define("_CALNAMEFIELD", "Naam");
define("_CALDELETESTORY", "Datum leegmaken");
define("_CALPREVIEWSTORY", "Bekijk altijd eerst vooraf");
define("_CALPOSTSTORY", "Data publiceren");
define("_CALSUBMITADVICE1", "Vul alsjeblieft het volgende formulier in.");
define("_CALSUBMITADVICE2", "Let er op dat we niet alle inzendingen publiceren.<br />We kunnen je inzending eventueel ook aanpassen.");
define("_CALPOSTEDBY","Opgegeven door");
define("_CALPOSTEDON","op");
define("_CALACCEPTEDBY"," en goedgekeurd door");
define("_CALPREVIOUS","Vorige");
define("_CALNEXT","Volgende");
define("_CALSTARTTIME","Begintijdstip");
define("_CALENDTIME","Einde");
define("_CALALLDAYEVENT","hele dag");
define("_CALTIMEIGNORED","Begin- en eindtijd niet opnemen.");
define("_CALENDDATETEXT","Einddatum");
define("_CALENDDATEPREVIEW","Einddatum");
#define("_CALBARCOLORTEXT","Kies alsjeblieft een categorie voor je inzending uit");
define("_CALBARCOLORTEXT","Categorie");
define("_CALLOGIN","Login");
define("_CALNO","Nee");
define("_CALYES","Ja");
define("_CALREMOVETEST","Weet je zeker dat deze gegevens verwijderd mogen worden?");
define("_CALNOTAUTHORIZED1","Je hebt geen rechten om deze inzending aan te passen!");
define("_CALNOTAUTHORIZED2","Als je vragen hebt, neem dan kontakt op met de systeembeheerder of webmaster");
define("_CALNOTAUTHORIZED3","Je hebt geen rechten om deze inzending aan te passen of te verwijderen!");
define("_CALTODAY","Vandaag");
define("_CALLISTDESCRIPTION1","Overzicht van de volgende");
define("_CALLISTDESCRIPTION2","periode");
define("_CALLISTSTART","vanaf");
define("_CALLISTRANGE","tot");
define("_CALHEADAPPOINTM","Periode");
define("_CALDAYEVENTS","Gebeurtenis");
define("_CALDAYMORNING","'Overdag");
define("_CALDAYEVENING","'s Avonds");
define("_CALMORE","verdere periodes");
define("_CAL1EVENT","Periode");
define("_CAL2EVENT","Periodes");
define("_CAL0EVENTS", "Er zijn geen kalendergegevens gevonden voor deze zoekopdracht");
define("_CAL0EVENTSBLOCK", "Vandaag staan er geen nieuwe activiteiten op het programma.");
define("_CALNOTODAYEVENTS","Geen belangrijke activiteiten vandaag.");
define("_CALADDASARTICLE","Artikel");
define("_CALADDASARTICLE2","Maak van deze activteit een nieuwsbericht.");

####### LINKS ########
define("_CALEVENTLINK","Periode opgeven");
define("_CALAPPTLINK","Periode opgeven");
define("_CALTASKLINK","Nieuwe activiteit opgeven");
define("_CALDAYLINK","Dagoverzicht");
define("_CALMONTHLINK","Maandoverzicht");
define("_CALYEARLINK","Jaaroverzichtt");
define("_CALJUMPTOTEXT","Omschakelen naar andere weergave");
define("_CALJUMPBUTTON","Omschakelen!");
define("_CALLISTLINK","volgende periode");

####### MONTHS ########
define("_CALJAN","Januari");
define("_CALFEB","Februari");
define("_CALMAR","Maart");
define("_CALAPR","April");
define("_CALMAY","Mei");
define("_CALJUN","Juni");
define("_CALJUL","Juli");
define("_CALAUG","Augustus");
define("_CALSEP","September");
define("_CALOCT","Oktober");
define("_CALNOV","November");
define("_CALDEC","December");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Ma");
define("_CALSECONDDAY","Di");
define("_CALTHIRDDAY","Wo");
define("_CALFOURTHDAY","Do");
define("_CALFIFTHDAY","Vr");
define("_CALSIXTHDAY","Za");
define("_CALSEVENTHDAY","Zo");
define("_CALLONGFIRSTDAY","Maandag");
define("_CALLONGSECONDDAY","Dinsdag");
define("_CALLONGTHIRDDAY","Woensdag");
define("_CALLONGFOURTHDAY","Donderdag");
define("_CALLONGFIFTHDAY","Vrijdag");
define("_CALLONGSIXTHDAY","Zaterdag");
define("_CALLONGSEVENTHDAY","Zondag");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","Er zijn fouten opgetreden tijdens het versturen van je verzoek!");
define("_CALVALIDFIXMSG","Controleer EERST op fouten of vergeten dingen voordat je het verstuurt.");
define("_CALVALIDSUBJECT","Het veld 'Onderwerp' moet ingevuld zijn.");
define("_CALVALIDENDDATE","De opgegeven einddatum klopt niet .");
define("_CALVALIDEVENTDATE","De datum voor de periode is niet goed ingevoerd.");
define("_CALVALIDDATES","De einddatum moet later of hetzelfde als de periodedatum zijn.");
define("_CALVALIDTIMES","De einddatum moet na de begindatum zijn'.");
define("_CALVALIDTOPIC", "Er moet een thema uitgekozen zijn.");

#### TRANSLATE !!!!! #######################################################################
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
define("_CALSAVESETT", "Save");

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