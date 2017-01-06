<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: lang-norwegian.php,v 20.5 2004/08/23 13:36:09 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : lang-norwegian.php
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

#/modules/Calendar/language/lang-norwegian.php
#Norwegian versjon by David Petterson, webmaster@petterson.org @ 15.03.04 @ 19.19
#Website: http://www.petterson.org

####### locale time-format variables #######
define("_CALSHORTDATEFORMAT","%d.%m.%y");
define("_CALLONGDATEFORMAT","%A, %d. %B %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",1);  //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",1);// 1 = 24 Stunden Zeit... 0 = AM/PM time
define("_CALLOCALE","de_DE");      # lokale Einstellungen z.B. Datumsformat fuer Linux/Unix
#define("_CALLOCALE","ge"); # lokale Einstellungen z.B. Datumsformat fuer Windows System!!
define("_CALTIMEFORMAT","%H:%Mh");
define("_CALWEEKBEGINN",1);# the First Day in the Week: 0 = Sunday, 1 = Monday

####### main texts #######
define("_CALDOTCOLORALL","Alle&nbsp;oppf�ringer");   // desription of all Events (no colordot)
define("_CALSEND","Send inn");
define("_CALSUBMITEVENT", "Send inn en oppf�ring");
define("_CALSUBMITNAME", "Skjema for innsendelse av oppf�ringer");
define("_CALNAME", "Tunsberg kalenderen");
define("_CALPREVIEW", "Forh�ndsvisning av post");
define("_CALOK", "Send inn post");
define("_CALEVENTDATETEXT", "Dato");
define("_CALSUBSENT", "Din oppf�ring er mottatt");
define("_CALTHANKSSUB", "Takk for innlegget ditt!");
define("_CALSUBTEXT", "Vi kommer til � sjekke innlegget ditt i l�pet av de neste timene. Hvis det er interessant og relevant vil vi legge det inn i kalender s� fort som mulig.");
define("_CALSUBTEXTADMIN", "Innlegget ditt er lagt inn i kalenderen direkte.");
define("_CALWEHAVESUB", "For �yeblikket har vi");
define("_CALWAITING", "oppf�ringer som venter p� � bli publisert.");
define("_CALEVENTDATEPREVIEW", "Dato for oppf�ring");
define("_CALCHECKSTORY", "V�r s� snill � dobbelsjekk at alt du har skrevet er korrekt f�r du sender det inn!");
define("_CALYOURNAME", "Ditt navn");
define("_CALLOGOUT", "Logg ut");
define("_CALSUBTITLE", "Emne");
define("_CALTOPIC", "Tema");
define("_CALSELECTTOPIC", "Velg tema");
define("_CALARTICLETEXT", "Beskrivelse");
define("_CALHTMLISFINE", "HTML er tillatt, men dobbel sjekk at URL og HTML kodene er korrekte!");
define("_CALNEWSUBPREVIEW", "Forh�ndsvisning av oppf�ringen");
define("_CALSTORYLOOK", "Din oppf�ring vil se ut omtrent slik som dette:");
define("_CALBEDESCRIPTIVE", "V�r beskrivende og enkel!");
define("_CALSUBPREVIEW", "Du m� forh�ndsvise ditt innlegg minst en gang f�r du kan poste det!");
define("_CALALLOWEDHTML", "HTML som er tillatt");
define("_CALSUBMISSIONSADMIN", "Innkommende poster");
define("_CALNEWSUBMISSIONS", "Nye innkommende poster");
define("_CALNOSUBJECT", "Ingen emne er valgt!");
define("_CALNOSUBMISSIONS", "Det er ingen nye poster!");
define("_CALDELETE", "Slett");
define("_CALNAMEFIELD", "Navn");
define("_CALDELETESTORY", "Slett oppf�ring");
define("_CALPREVIEWSTORY", "Forh�ndsvis oppf�ring");
define("_CALPOSTSTORY", "Lagre oppf�ring");
define("_CALSUBMITADVICE1", "<center>Skriv inn din kalender oppf�ring ved � fylle inn i skjemaet.<br />   <center> Dobbelsjekk oppf�ringen f�r du poster den.");
define("_CALSUBMITADVICE2", "Ikke alle oppf�ringer blir postet i kalenderen. Den blir f�rst sjekket av administratorene f�r den evn. postes..");
define("_CALPOSTEDBY","Postet av");
define("_CALPOSTEDON",", ");
define("_CALACCEPTEDBY"," og godkjent av");
define("_CALcalViewEvent","Kalender oppf�ring");
define("_CALPREVIOUS","Forrige");
define("_CALNEXT","Neste");
define("_CALSTARTTIME","Start");
define("_CALENDTIME","Slutt");
define("_CALALLDAYEVENT","Hele dagen");
define("_CALTIMEIGNORED","Start og slutt klokkeslett blir ignorert");
define("_CALENDDATETEXT","Slutt dato");
define("_CALENDDATEPREVIEW","Slutt dato");
#define("_CALBARCOLORTEXT","Velg en kategori for denne oppf�ringen");
define("_CALBARCOLORTEXT","Kategori");
define("_CALLOGIN","Login");
define("_CALNO","Nei");
define("_CALYES","Ja");
define("_CALREMOVETEST","Er du sikker p� at du �nsker � fjerne denne posten?");
define("_CALNOTAUTHORIZED1","Du er ikke autorisert til � fjerne denne posten!");
define("_CALNOTAUTHORIZED2","Da kontakt med administrator for evnt. sp�rsm�l.");
define("_CALNOTAUTHORIZED3","Beklager, men du er ikke autorisert til � fjerne eller redigere oppf�ringer!");
define("_CALTODAY","I dag");
define("_CALLISTDESCRIPTION1","Det er");
define("_CALLISTDESCRIPTION2","oppf�ringer");
define("_CALLISTSTART","for");
define("_CALLISTRANGE","til");
define("_CALHEADAPPOINTM","Avtaler");
define("_CALDAYEVENTS","Hendelser");
define("_CALDAYMORNING","Morgen");
define("_CALDAYEVENING","Kveld");
define("_CALMORE","flere oppf�ringer");
define("_CAL1EVENT","Oppf�ring");
define("_CAL2EVENT","Oppf�ringer");
define("_CAL0EVENTS", "Det er ingen oppf�ringer i valg tidspunkt");
define("_CAL0EVENTSBLOCK", "Beklager, men vi har ingen oppf�ringer tilgjengelige for �yeblikket.");
define("_CALNOTODAYEVENTS","Ingen oppf�ringer i dag.");
define("_CALADDASARTICLE","Artikkel");
define("_CALADDASARTICLE2","Legg til en artikkel fra denne oppf�ringen.");

####### LINKS ########
define("_CALEVENTLINK","Skriv en ny post");
define("_CALAPPTLINK","Lag en avtale");
define("_CALTASKLINK","Legg til en ny oppgave");
define("_CALDAYLINK","Vis dag");
define("_CALMONTHLINK","Vis m�ned");
define("_CALYEARLINK","Vis �r");
define("_CALJUMPTOTEXT","Hopp til f�lgende valg");
define("_CALJUMPBUTTON","Hopp!");
define("_CALLISTLINK","neste");

####### MONTHS ########
define("_CALJAN","Januar");
define("_CALFEB","Februar");
define("_CALMAR","Mars");
define("_CALAPR","April");
define("_CALMAY","Mai");
define("_CALJUN","Juni");
define("_CALJUL","Juli");
define("_CALAUG","August");
define("_CALSEP","September");
define("_CALOCT","Oktober");
define("_CALNOV","November");
define("_CALDEC","Desember");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Ma");
define("_CALSECONDDAY","Ti");
define("_CALTHIRDDAY","On");
define("_CALFOURTHDAY","To");
define("_CALFIFTHDAY","Fr");
define("_CALSIXTHDAY","L�");
define("_CALSEVENTHDAY","S�");
define("_CALLONGFIRSTDAY","Mandag");
define("_CALLONGSECONDDAY","Tirsdag");
define("_CALLONGTHIRDDAY","Onsdag");
define("_CALLONGFOURTHDAY","Torsdag");
define("_CALLONGFIFTHDAY","Fredag");
define("_CALLONGSIXTHDAY","L�rdag");
define("_CALLONGSEVENTHDAY","S�ndag");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","Da denne oppf�ringen skulle godkjennes ble det oppdaget en feil!");
define("_CALVALIDFIXMSG","V�r s� snill � korrigere innlegget f�r du forh�ndsviser eller sender denne oppf�ringen.");
define("_CALVALIDSUBJECT","Du m� fylle ut Emne ogs�.");
define("_CALVALIDENDDATE","Slutt dato er ikke en godkjent dato.");
define("_CALVALIDEVENTDATE","Dato for oppf�ringen er ikke gyldig.");
define("_CALVALIDDATES","Slutt dato m� v�re etter eller lik start dato.");
define("_CALVALIDTIMES","Slutt tid m� v�re etter start tid'.");
define("_CALVALIDTOPIC", "Du m� velge et tema.");

define("_CALINDEX","Vis blokk til h�yre");
define("_CALTEXTEVENTS","Bilder for flere dagers oppf�ringer");
define("_CALADDARTICLEBOX","Tillat automatiske artikkel nyheter.");
define("_CALPOSTUSERS","Registrerte brukere kan annonsere datoer");
define("_CALUSETOPICS","Nyhets emner");
define("_CALUSETOPICS1","Ja, men ikke n�dvendigvis");
define("_CALUSETOPICS2","Ja, det er en helt avhengig av");
define("_CALDEFAULTVIEW","Standardvisning");
define("_CALMINUTERANGE","Avstand i minutter med timevalg.");
define("_CALADMINEDITALL","Admin fungerer kun p� egne oppf�ringer");
define("_CALADMINMENUSHOW","Bruk normal CMS adminstrator meny");
define("_CALADMINTYPE","Admintype, hvilke admin fungerer p� oppf�ringene");
define("_CALLISTCOUNT","Antall oppf�ringer i liste visning");
define("_CALLISTSHOWSTART","Starttidspunkt i liste visning indikasjon");
define("_CALLISTENDDATE","Slutt dato i liste visning indikasjon");
define("_CALLISTENDTIME","Slutt tidspunkt i liste visning indikasjon");
define("_CALLISTENDDATE2","Slutt dato indikerer, hvis lik start dato");
define("_CALLISTBR","Linjeskift mellom dato og tid i liste visning");
define("_CALDAYTIMEARRAY","Intervall i timer i dagsvisning");
define("_CALALLOWABLEHTML","Tillatt HTML koder i beskrivelse av oppf�ring");
define("_CALONLYWEN","(bare hvis slutt dato er valgt)");
define("_CALSHOWLINKS","Vis dato i datovisning som en lenke");
define("_CALCALENDARCONFIG","Kalender konfigurasjon");
define("_CALCONF1","Innstillingene kunne ikke bli lagret!");
define("_CALCONF2","Innstillingene ble lagret!");
define("_CALCONF3","filen ");
define("_CALCONF4","er skrivebeskyttet, <br />Innstillingene kunne ikke bli lagrert!");
define("_CALACTIV","Aktiv status");
define("_CALMENUROWS","Spalte");
define("_CALMENUROWS2","Antall kolonner i kategorilisten");

define("_CALERREVENTNOTEXIST","Denne oppf�ringen eksisterer ikke i v�r database.");
define("_CALERRSQLERROR","Database feil!");
define("_CALONLYDEACTIVATE","bare deaktivering");
define("_CALDEACTIVATED","deaktiverte oppf�ringer");
define("_CALNODEACTIVATED","Ingen deaktiverte oppf�ringer");
define("_CALNAVIPREV","Tilbake");
define("_CALNAVINEXT","Neste");

/// ab 1.3
define("_CALPRINTER1","Skriv ut");
define("_CALPRINTER2","Send denne siden til skriver");
define("_CALPOSTANONYMOUS","Tillatt at anonyme kan poste");
define("_CALUSERSAUTOPOST","Ta straks bort meldte perioder fra registrerte brukere");
define("_CALANONYAUTOPOST","Ta straks bort meldte perioder fra anonyme brukere");
define("_CALCATEGORIESADMIN","Kategori konfigurasjon");
define("_CALCATEGORIESLANG","Velg spr�k");
define("_CALADMINMENU","Administrasjonsmeny;");
define("_CALSHOWPOPS","Popup for beskrivelse av oppf�ring");
define("_CALSOURCE","Kilde");
define("_CALGOAL","M�l");

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