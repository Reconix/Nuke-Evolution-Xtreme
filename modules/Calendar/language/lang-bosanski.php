<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: lang-bosanski.php,v 20.4 2004/04/15 16:58:47 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : lang-bosanski.php
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

/// translated by:
/// Srdjan Segvic, Sarajevo, BiH
///   NOT COMPLETE FOR VERSION 1.4 !!!!!!!

####### locale time-format variables #######
if (PHP_OS=="WINNT"||PHP_OS=="WIN32") {
    define("_CALLOCALE","en"); # lokale Einstellungen z.B. Datumsformat f&uuml;r Windows System!!
    }
else {
    define("_CALLOCALE","en_EN");      # lokale Einstellungen z.B. Datumsformat f&uuml;r Linux/Unix
    }
define("_CALSHORTDATEFORMAT","%d/%m/%Y");
define("_CALLONGDATEFORMAT","%d/%m/%Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",0);  //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",1);// 1 = 24 hour time... 0 = AM/PM time
define("_CALTIMEFORMAT","%I:%M %p"); # ? AM/PM time
define("_CALWEEKBEGINN",1);      # the First Day in the Week: 0 = Sunday, 1 = Monday

####### main texts #######
define("_CALDOTCOLORALL","Svi termini");  // desription of all Events (no colordot)
define("_CALSEND","Po¹alji");
define("_CALSUBMITEVENT", "Predlo¾i novi termin");
define("_CALSUBMITNAME", "Froma za unos novog termina u kalendar");
define("_CALNAME", "Kalendar");
define("_CALPREVIEW", "Preview termina");
define("_CALOK", "Po¹alji termin");
define("_CALEVENTDATETEXT", "Datum termina");
define("_CALSUBSENT", "Termin je uspje¹no poslan");
define("_CALTHANKSSUB", "Hvala!");
define("_CALSUBTEXT", "Provjeriæemo ovaj termin, ako je interesantan biæe uskoro postavljen.");
define("_CALSUBTEXTADMIN", "Tvoj termin je odmah postavljen.");
define("_CALWEHAVESUB", "Trenutno imamo");
define("_CALWAITING", "termina koji èekaju postavljanja.");
define("_CALEVENTDATEPREVIEW", "Datum termina");
define("_CALCHECKSTORY", "Provjeri tekst, linkove, i ostalo prije nego ¹to po¹alje¹ svoj termin!");
define("_CALYOURNAME", "Tvoje ime");
define("_CALLOGOUT", "Logout");
define("_CALSUBTITLE", "Naslov");
define("_CALTOPIC", "Tema");
define("_CALSELECTTOPIC", "Odaberi temu");
define("_CALARTICLETEXT", "Opis");
define("_CALHTMLISFINE", "HTML je dozvoljen, ali provjerite URL-ove i HTML tagove!");
define("_CALNEWSUBPREVIEW", "Preview slanja termina");
define("_CALSTORYLOOK", "Tvoj termin æe izgledati otprilike ovako:");
define("_CALBEDESCRIPTIVE", "Budi kratak, budi jasan");
define("_CALSUBPREVIEW", "Mora¹ jednog pregeldati termin prije nego ¹to ga po¹alje¹");
define("_CALALLOWEDHTML", "Dozvoljeni HTML");
define("_CALSUBMISSIONSADMIN", "Postavljanje termina");
define("_CALNEWSUBMISSIONS", "Novi termini poslani");
define("_CALNOSUBJECT", "Nisi unjeo naslov!");
define("_CALNOSUBMISSIONS", "Nema novih termina!");
define("_CALDELETE", "Obri¹i");
define("_CALNAMEFIELD", "Ime");
define("_CALDELETESTORY", "Obri¹i termin");
define("_CALPREVIEWSTORY", "Preview termina");
define("_CALPOSTSTORY", "Saèuvaj termin");
define("_CALSUBMITADVICE1", "Popunite polja u ovog formi i provjerite prije slanja.");
define("_CALSUBMITADVICE2", "<br />Napominjemo da svi poslani termini neæe biti prihvaæeni.<br />Tvoj terminæe biti prvo provjeren i mo¾da editovan od strane na¹ih administratora.");
define("_CALPOSTEDBY","Postavio");
define("_CALPOSTEDON","-");
define("_CALACCEPTEDBY"," odobrio");
define("_CALPREVIOUS","Prethodni");
define("_CALNEXT","Slijedeæi");
define("_CALSTARTTIME","Vrijeme poèetka");
define("_CALENDTIME","Vrijeme kraja");
define("_CALALLDAYEVENT","Cjelodnevni");
define("_CALTIMEIGNORED","Poèetno i vrijeme kraja æe biti ignorisani.");
define("_CALENDDATETEXT","Datum kraja");
define("_CALENDDATEPREVIEW","Datum kraja");
#define("_CALBARCOLORTEXT","Odaberi kategoriju za ovaj termin");
define("_CALBARCOLORTEXT","Kategorija");
define("_CALLOGIN","Login");
define("_CALNO","Ne");
define("_CALYES","Da");
define("_CALREMOVETEST","Da li si siguran da ¾eli¹ obrisati ovaj termin?");
define("_CALNOTAUTHORIZED1","Nisi autorizovan da obri¹e¹ ili edituje¹ ovaj termin");
define("_CALNOTAUTHORIZED2","Kontaktirajte administratora ako imate pitanja");
define("_CALNOTAUTHORIZED3","Nema¹ ovla¹tenja da bri¹e¹ ili edituje¹ termine!");
define("_CALTODAY","Danas");
define("_CALLISTDESCRIPTION1","Ukupno");
define("_CALLISTDESCRIPTION2","termina");
define("_CALLISTSTART","od");
define("_CALLISTRANGE","do");
define("_CALHEADAPPOINTM","Sastanak");
define("_CALDAYEVENTS","Termini");
define("_CALDAYMORNING","Jutro");
define("_CALDAYEVENING","Veèe");
define("_CALMORE","jo¹ termina");
define("_CAL1EVENT","Termin");
define("_CAL2EVENT","Termini");
define("_CAL0EVENTS", "Nema termina koji zadovoljavaju upit");
define("_CAL0EVENTSBLOCK", "Trenutno nema termina.");
define("_CALNOTODAYEVENTS","Danas nema termina.");
define("_CALADDASARTICLE","èlanak");
define("_CALADDASARTICLE2","Dodaj èlanak za ovaj termin.");

####### LINKS ########
define("_CALEVENTLINK","Kreiraj termin");
define("_CALAPPTLINK","Kreiraj sastanak");
define("_CALTASKLINK","Dodaj novi Task");
define("_CALDAYLINK","Dnevni pogled");
define("_CALMONTHLINK","Mjeseèni pogled");
define("_CALYEARLINK","Godi¹nji pogled");
define("_CALJUMPTOTEXT","Promjeni na ");
define("_CALJUMPBUTTON","Promjeni!");
define("_CALLISTLINK","Nadolazeæi termini");

####### MONTHS ########
define("_CALJAN","Januar");
define("_CALFEB","Februar");
define("_CALMAR","Mart");
define("_CALAPR","April");
define("_CALMAY","Maj");
define("_CALJUN","Juni");
define("_CALJUL","Juli");
define("_CALAUG","August");
define("_CALSEP","Septembar");
define("_CALOCT","Oktobar");
define("_CALNOV","Novembar");
define("_CALDEC","Decembar");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Ned");
define("_CALSECONDDAY","Pon");
define("_CALTHIRDDAY","Uto");
define("_CALFOURTHDAY","Sri");
define("_CALFIFTHDAY","Èet");
define("_CALSIXTHDAY","Pet");
define("_CALSEVENTHDAY","Sub");
define("_CALLONGFIRSTDAY","Nedelja");
define("_CALLONGSECONDDAY","Ponedeljak");
define("_CALLONGTHIRDDAY","Utorak");
define("_CALLONGFOURTHDAY","Srijeda");
define("_CALLONGFIFTHDAY","Èetvrtak");
define("_CALLONGSIXTHDAY","Petak");
define("_CALLONGSEVENTHDAY","Subota");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","Gre¹ka prilikom validacije termina!");
define("_CALVALIDFIXMSG","Ispravi slijedeæe gre¹ke prije previewa ili slanja termina.");
define("_CALVALIDSUBJECT","'Naslov' je neophodno polje.");
define("_CALVALIDENDDATE","'Datum kraja' nije validan.");
define("_CALVALIDEVENTDATE","'Datum termina' nije validan.");
define("_CALVALIDDATES","'Datum kraja' mora biti poslije ili isti kao 'Datum termina'.");
define("_CALVALIDTIMES","'Vrijeme kraja' mora biti poslije 'Vrijeme poèetka'.");
define("_CALVALIDTOPIC", "Odaberi temu.");

#### TRANSLATE ??????????? #######################################################################
define("_CALINDEX", "poka¾i desni blok");
define("_CALTEXTEVENTS", "slike barova za vi¹e dnevne termine");
define("_CALADDARTICLEBOX", "automatsko odobravanje Vijesti");
define("_CALPOSTUSERS","registrovani korisnici mogu postavljati datume");
define("_CALUSETOPICS", "Koristi teme novosti");
define("_CALUSETOPICS1", "Da, ali ne neophodno");
define("_CALUSETOPICS2", "Da, neophodno");
define("_CALDEFAULTVIEW", "Defaultni pogled");
define("_CALMINUTERANGE", "razlika u minutama sa datum vrijeme selekcijom");
define("_CALADMINEDITALL", "Admini mogu mjenjati samo svoje termine");
define("_CALADMINMENUSHOW", "koristi normalni CMS Admin menu");
define("_CALADMINTYPE", "Tip admina, koji tip admin mo¾e mijenjati termine");
define("_CALLISTCOUNT", "broj termina u list pogledu");
define("_CALLISTSHOWSTART", "poka¾i startno vrijeme u list pogledu");
define("_CALLISTENDDATE", "poka¾i final datum u list pogledu");
define("_CALLISTENDTIME", "poka¾i final datum u list pogledu");
define("_CALLISTENDDATE2", "poka¾i final datum, ako je isti kao startni datum");
define("_CALLISTBR", "line-makeup imeðu datuma i vremena u list pogledu");
define("_CALDAYTIMEARRAY", "vremenski intervali u dnevnom pogledu");
define("_CALALLOWABLEHTML", "omoguæi HTML tagove u opisu datuma");
define("_CALONLYWEN", "(samo ako je datum kraja naznaèen)"); 
define("_CALSHOWLINKS","poka¾i datum kao link");
define("_CALCALENDARCONFIG", "konfiguracija kalendara");
define("_CALCONF1", "promjene nisu saèuvane!");
define("_CALCONF2", "promjene su saèuvane!");
define("_CALCONF3", "file");
define("_CALCONF4", "za¹tiæen od pisanja, <br />promjene nisu saèuvane!");
define("_CALACTIV", "Aktiviran");

define("_CALMENUROWS","Kolone");
define("_CALMENUROWS2","broj kolona u listi kategorija");

define("_CALERREVENTNOTEXIST","Termin ne postoji u bazi.");
define("_CALERRSQLERROR","DB GRE©KA!");
define("_CALONLYDEACTIVATE","samo deaktiviraj");
define("_CALDEACTIVATED","deaktivirani termini");
define("_CALNODEACTIVATED","nema deaktiviranih termina");
define("_CALNAVIPREV","Prethodnih termina");
define("_CALNAVINEXT","Slijedeæih termina");

/// ab 1.3
define("_CALPRINTER1","printaj stranicu");
define("_CALPRINTER2","Printaj ovu stranicu");
define("_CALPOSTANONYMOUS", "dozvoli anonimcima da postavljaju termine");
define("_CALUSERSAUTOPOST","termine poslane od registrovanih korisnika odmah postavi");
define("_CALANONYAUTOPOST","termine poslane od anonimnih korisnika odmah postavi");
define("_CALCATEGORIESADMIN","Konfiguracija kategorija");
define("_CALCATEGORIESLANG","Odaberi jezik");
define("_CALADMINMENU","Administracijski menu");
define("_CALSHOWPOPS","popup za opis termina");
define("_CALSOURCE","Izvor");
define("_CALGOAL","Cilj");

/// ab 1.4
define('_CALHOURS','hours');
define('_CALMINUTES','minutes');
define('_CALDAYS','days');
define('_CALMONTHS','months');
define('_CALYEARS','years');
define("_CALPLSLOGIN","Please Log-In first");
define("_CALSAVESETT", "Saèuvaj");

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