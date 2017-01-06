<?php
/**
 * KalenderMx v1.4
 * Copyright (c) 2004 by A.Ellsel (kalender@pragmamx.org)
 * http://www.pragmamx.org & http://www.shiba-design.de
 * 
 * KalenderMx was based on EventCalendar 2.0
 * Copyright (c) 2001 Originally by Rob Sutton
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * $Source: D:\\CVS/dev-Kalender/html/modules/Kalender/language/lang-finnish.php,v $
 * $Revision: 3606 $
 * $Author: technocrat $
 * $Date: 2006-06-21 15:37:59 -0700 (Wed, 21 Jun 2006) $
 * 
 * Finnish version by Pertti Runolinna, postmaster@porstua.net @ 21.10.05 @ 08.00
 * Website: http://www.porstua.net
 */

if (!defined("CAL_MODULE_NAME")) die ("You can't access this file directly...");


####### locale time-format variables #######
define("_CALLOCALE",'fi_FI.ISO8859-1');		# lokale Einstellungen z.B. Datumsformat fuer Linux/Unix
define("_CALSHORTDATEFORMAT","%d.%m.%y");
define("_CALLONGDATEFORMAT","%A, %d. %B %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",1);    //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",1);  // 1 = 24 hour time... 0 = AM/PM time
define("_CALTIMEFORMAT","%H:%Mh"); # ? AM/PM time
define("_CALWEEKBEGINN",1);		# the First Day in the Week: 0 = Sunday, 1 = Monday

####### main texts #######
define("_CALDOTCOLORALL","Kaikki&nbsp;tapahtumat");    // desription of all Events (no colordot)
define("_CALSEND","OK");
define("_CALSUBMITEVENT", "Ilmoita tapahtuma");
define("_CALSUBMITNAME", "Tapahtuman ilmoittaminen");
define("_CALNAME", "Kalenteri");
define("_CALPREVIEW", "Esikatsele ilmoitus");
define("_CALOK", "L‰het‰ ilmoitus");
define("_CALEVENTDATETEXT", "Tapahtuma-aika");
define("_CALSUBSENT", "Ilmoituksesi on vastaanotettu");
define("_CALTHANKSSUB", "Kiitos ilmoituksestasi!");
define("_CALSUBTEXT", "Tarkastamme ilmoituksen ja julkaisemme tapahtuman sen j‰lkeen.");
define("_CALSUBTEXTADMIN", "Ilmoituksesi on julkaistu.");
define("_CALWEHAVESUB", "T‰ll‰ hetkell‰");
define("_CALWAITING", "tapahtumaa odottaa julkaisemista.");
define("_CALEVENTDATEPREVIEW", "Tapahtuma-aika");
define("_CALCHECKSTORY", "Tarkasta teksti, linkit jne. ennen ilmoituksen l‰hett‰mist‰!");
define("_CALYOURNAME", "Nimesi");
define("_CALLOGOUT", "Kirjaudu ulos");
define("_CALSUBTITLE", "Tapahtuman nimi");
define("_CALTOPIC", "Uutisryhm‰");
define("_CALSELECTTOPIC", "Valitse uutisryhm‰");
define("_CALARTICLETEXT", "Kuvaus");
define("_CALHTMLISFINE", "HTML:n k‰yttˆ on ok mutta varmista, ett‰ URL-osoitteet ja HTML-koodi ovat oikein!");
define("_CALNEWSUBPREVIEW", "Ilmoituksen esikatselu");
define("_CALSTORYLOOK", "Ilmoituksesi n‰ytt‰‰ julkaistuna suunnilleen t‰llaiselta:");
define("_CALBEDESCRIPTIVE", "Kuvaa selke‰sti ja yksinkertaisesti");
define("_CALSUBPREVIEW", "Ilmoitus on esikatseltava ennen l‰hett‰mist‰");
define("_CALALLOWEDHTML", "Sallittu HTML");
define("_CALSUBMISSIONSADMIN", "Tapahtumailmoitusten valvonta");
define("_CALNEWSUBMISSIONS", "Uudet ilmoitukset");
define("_CALNOSUBJECT", "Tapahtuman nimi puuttuu!");
define("_CALNOSUBMISSIONS", "Ei uusia ilmoituksia!");
define("_CALDELETE", "Poista");
define("_CALNAMEFIELD", "Nimi");
define("_CALDELETESTORY", "Poista ilmoitus");
define("_CALPREVIEWSTORY", "Esikatsele ilmoitus");
define("_CALPOSTSTORY", "Tallenna ilmoitus");
define("_CALSUBMITADVICE1", "Ilmoita tapahtuma t‰ytt‰m‰ll‰ lomake ja varmista, ett‰ kaikki kohdat ovat oikein.");
define("_CALSUBMITADVICE2", "<br />Muistathan, ett‰ kaikkia ilmoituksia ei julkaista.<br />Kalenterin valvoja tarkastaa ilmoituksesi ja voi muokata sit‰.");
define("_CALPOSTEDBY","Ilmoittanut");
define("_CALPOSTEDON"," ");
define("_CALACCEPTEDBY"," ja hyv‰ksynyt");
define("_CALPREVIOUS","Edellinen");
define("_CALNEXT","Seuraava");
define("_CALSTARTTIME","Alkamisaika");
define("_CALENDTIME","P‰‰ttymisaika");
define("_CALALLDAYEVENT","Koko p‰iv‰n");
define("_CALTIMEIGNORED","Alkamis- ja p‰‰ttymisaikoja ei n‰ytet‰.");
define("_CALENDDATETEXT","P‰‰ttymisp‰iv‰");
define("_CALENDDATEPREVIEW","P‰‰ttymisp‰iv‰");
#define("_CALBARCOLORTEXT","Select a category for this event");
define("_CALBARCOLORTEXT","Tapahtumaryhm‰");
define("_CALLOGIN","Kirjaudu");
define("_CALNO","Ei");
define("_CALYES","Kyll‰");
define("_CALREMOVETEST","Oletko varma, ett‰ haluat poistaa t‰m‰n tapahtuman?");
define("_CALNOTAUTHORIZED1","K‰ytt‰j‰oikeutesi eiv‰t riit‰ tapahtuman poistamiseen tai muokkaamiseen");
define("_CALNOTAUTHORIZED2","Ota tarvittaessa yhteytt‰ kalenterin valvojaan");
define("_CALNOTAUTHORIZED3","K‰ytt‰j‰oikeutesi eiv‰t  valitettavasti riit‰ tapahtumien poistamiseen tai muokkaamiseen!");
define("_CALTODAY","T‰n‰‰n");
define("_CALLISTDESCRIPTION1","Seuraavat");
define("_CALLISTDESCRIPTION2","tapahtumaa");
define("_CALLISTSTART","alkaen");
define("_CALLISTRANGE","p‰‰ttyy");
define("_CALHEADAPPOINTM","Tapahtumat");
define("_CALDAYEVENTS","Tapahtumat");
define("_CALDAYMORNING","Aamulla");
define("_CALDAYEVENING","Illalla");
define("_CALMORE","lis‰‰ tapahtumia");
define("_CAL1EVENT","Tapahtuma");
define("_CAL2EVENT","Tapahtumat");
define("_CAL0EVENTS", "Tapahtumia ei lˆytynyt");
define("_CAL0EVENTSBLOCK", "Ajankohtana ei ole tapahtumia.");
define("_CALNOTODAYEVENTS","T‰n‰‰n ei ole tapahtumia.");
define("_CALADDASARTICLE","Uutiskirjoitus");
define("_CALADDASARTICLE2","Lis‰‰ uutiskirjoitus tapahtumasta.");

####### LINKS ########
define("_CALEVENTLINK","Lis‰‰ tapahtuma");
define("_CALAPPTLINK","Lis‰‰ varaus");
define("_CALTASKLINK","Lis‰‰ teht‰v‰");
define("_CALDAYLINK","P‰iv‰n‰kym‰");
define("_CALMONTHLINK","Kuukausin‰kym‰");
define("_CALYEARLINK","Vuosin‰kym‰");
define("_CALJUMPTOTEXT","Siirry seuraavaan n‰kym‰‰n");
define("_CALJUMPBUTTON","Siirry!");
define("_CALLISTLINK","Seuraavat tapahtumat");

####### MONTHS ########
define("_CALJAN","Tammikuu");
define("_CALFEB","Helmikuu");
define("_CALMAR","Maaliskuu");
define("_CALAPR","Huhtikuu");
define("_CALMAY","Toukokuu");
define("_CALJUN","Hein‰kuu");
define("_CALJUL","Kes‰kuu");
define("_CALAUG","Elokuu");
define("_CALSEP","Syyskuu");
define("_CALOCT","Lokakuu");
define("_CALNOV","Marraskuu");
define("_CALDEC","Joulukuu");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Ma");
define("_CALSECONDDAY","Ti");
define("_CALTHIRDDAY","Ke");
define("_CALFOURTHDAY","To");
define("_CALFIFTHDAY","Pe");
define("_CALSIXTHDAY","La");
define("_CALSEVENTHDAY","Su");
define("_CALLONGFIRSTDAY","Maanantai");
define("_CALLONGSECONDDAY","Tiistai");
define("_CALLONGTHIRDDAY","Keskiviikko");
define("_CALLONGFOURTHDAY","Torstai");
define("_CALLONGFIFTHDAY","Perjantai");
define("_CALLONGSIXTHDAY","Lauantai");
define("_CALLONGSEVENTHDAY","Sunnuntai");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","Ilmoituksesta lˆytyi virheit‰");
define("_CALVALIDFIXMSG","Korjaa virheet ennen ilmoituksen esikatselua ja l‰hett‰mist‰.");
define("_CALVALIDSUBJECT","Tapahtuman nimi on virheellinen.");
define("_CALVALIDENDDATE","P‰‰ttymisp‰iv‰ on virheellinen.");
define("_CALVALIDEVENTDATE","Tapahtuma-aika on virheellinen.");
define("_CALVALIDDATES","P‰‰ttymisp‰iv‰n on oltava sama tai myˆhempi kuin tapahtuma-ajan.");
define("_CALVALIDTIMES","P‰‰ttymisajan on oltava myˆhempi kuin alkamisajan.");
define("_CALVALIDTOPIC", "Valitse tapahtumaryhm‰.");

define("_CALINDEX", "N‰yt‰ blokki oikealla");  
define("_CALTEXTEVENTS", "Useampip‰iv‰isten tapahtumien kuvapalkit");  
define("_CALADDARTICLEBOX", "Automaattiset uutiskirjoitukset k‰ytˆss‰");  
define("_CALPOSTUSERS","Rekisterˆidyt k‰ytt‰j‰t voivat ilmoittaa tapahtumia");
define("_CALUSETOPICS", "Uutisryhm‰t k‰ytˆss‰");  
define("_CALUSETOPICS1", "Kyll‰, mutta ei pakollisina");  
define("_CALUSETOPICS2", "Kyll‰, pakollisina");  
define("_CALDEFAULTVIEW", "Oletusn‰kym‰");  
define("_CALMINUTERANGE", "Minuuttien v‰li tapahtuman ajan valinnassa");  
define("_CALADMINEDITALL", "Valvoja voi muokata vain omistamiaan tapahtumia");  
define("_CALADMINMENUSHOW", "K‰yt‰ CMS:n hallintapaneelia");  
define("_CALADMINTYPE", "Valvojataso, mitk‰ valvojat voivat muokata tapahtumia");  
define("_CALLISTCOUNT", "Tapahtumien m‰‰r‰ luettelon‰kym‰ss‰");  
define("_CALLISTSHOWSTART", "Luettelon‰kym‰n alkamisaika");  
define("_CALLISTENDDATE", "Luettelon‰kym‰n p‰‰ttymisp‰iv‰");  
define("_CALLISTENDTIME", "Luettelon‰kym‰n p‰‰ttymisaika");  
define("_CALLISTENDDATE2", "N‰ytett‰v‰ p‰‰ttymisp‰iv‰, jos sama kuin alkamisp‰iv‰");  
define("_CALLISTBR", "P‰iv‰n ja ajan erottaja luettelon‰kym‰ss‰");
define("_CALDAYTIMEARRAY", "Aikav‰lit p‰iv‰n‰kym‰ss‰");  
define("_CALALLOWABLEHTML", "Hyv‰ksytyt HTML -koodit tapahtuman kuvauksessa");  
define("_CALONLYWEN", "(Vain jos p‰‰ttymisp‰iv‰ n‰ytet‰‰n)"); 
define("_CALSHOWLINKS","N‰yt‰ p‰iv‰ p‰iv‰n‰kym‰ss‰ linkkin‰");  
define("_CALCALENDARCONFIG", "Kalenterin asetukset");  
define("_CALCONF1", "Asetuksia ei voitu tallentaa!");  
define("_CALCONF2", "Asetukset on tallennettu!");  
define("_CALCONF3", "Tiedosto");  
define("_CALCONF4", "on kirjoitussuojattu, <br />asetuksia ei voi tallentaa!");  
define("_CALACTIV", "Tila aktiivinen");
define("_CALMENUROWS","Sarakkeita");
define("_CALMENUROWS2","Sarakkeiden m‰‰r‰ ryhm‰luettelossa");

define("_CALERREVENTNOTEXIST","Tapahtumaa ei lˆydy tietokannasta.");
define("_CALERRSQLERROR","Tietokantavirhe!");
define("_CALONLYDEACTIVATE","Vain deaktivointi");
define("_CALDEACTIVATED","Deaktivoidut tapahtumat");
define("_CALNODEACTIVATED","Ei deaktivoituja tapahtumia");
define("_CALNAVIPREV","Edellinen");
define("_CALNAVINEXT","Seuraava");

/// ab 1.3
define("_CALPRINTER1","Tulosta sivu");
define("_CALPRINTER2","Tulosta t‰m‰ sivu");
define("_CALPOSTANONYMOUS", "Anonyymit voivat ilmoittaa tapahtumia");  
define("_CALUSERSAUTOPOST","Rekisterˆityjen k‰ytt‰jien tapahtumailmoitukset julkaistaan v‰littˆm‰sti");
define("_CALANONYAUTOPOST","Anonyymien k‰ytt‰jien tapahtumailmoitukset julkaistaan v‰littˆm‰sti");
define("_CALCATEGORIESADMIN","Tapahtumaryhm‰n asetukset");
define("_CALCATEGORIESLANG","Valitse kieli");
define("_CALADMINMENU","Hallintapaneeli");
define("_CALSHOWPOPS","N‰ytet‰‰n tapahtuman kuvaus popupikkunassa");
define("_CALSOURCE","L‰hde");
define("_CALGOAL","Kohde");

/// ab 1.4
define('_CALHOURS','tuntia');
define('_CALMINUTES','minuuttia');
define('_CALDAYS','p‰iv‰‰');
define('_CALMONTHS','kuukautta');
define('_CALYEARS','vuotta');
define("_CALPLSLOGIN","Kirjaudu ensin sis‰‰n");
define("_CALSAVESETT", "Tallenna");

define('_CALALLWORDS','Kaikki sanat [ALL]');
define('_CALANYWORDS','Yksi sana[OR]');
define('_CALSEARCH','Etsi');
define('_CALSEARCHEVENT','Etsi tapahtuma');
define('_CALFOR',' ');
define('_CALSEARCHTITLE','Etsi kalenterista');
define('_CALCQUEUE','Hakutulokset');
define('_CALTOMUCH1','Tuloksia on yli ');
define('_CALTOMUCH2',' . Rajaa hakuehtoja.');
define("_CALSEARCHCOUNT", "Maks. m‰‰r‰ hakutuloksia");  
define('_CALSEARCHTOPICS','Etsi tapahtumaryhmist‰');
define('_CALMOREOPTIONINF','Lue lis‰‰ kalenterin ulkoasun asetuksista tiedostossa:');
define('_CALSEFROMDATE','p‰iv‰st‰');
define('_CALSELCATEGORY','Valitse tapahtumaryhm‰');
define('_CALINTHIS',' ');
define("_CALNOTOPICS", "Ei tapahtumaryhmi‰");
define('_CALGOTOEDIT','Muokkaa uudelleen');
define('_CALGOTOADMIN','Siirry hallintapaneeliin');
define('_CALGOTOCALENDAR','Siirry kalenterin‰kym‰‰n');
define('_CALCONFVIEW1','Oikeudet &amp; Suojaus');
define('_CALCONFVIEW2','N‰kym‰t &amp; Ulkoasu');
define('_CALCONFVIEW3','Uutiskirjoitukset / Uutisryhm‰t');
define("_CALLISTSHOWLINKS","N‰yt‰ p‰v‰m‰‰r‰ luettelon‰kym‰ss‰ linkkin‰");  

#### TRANSLATE ??????????? #######################################################################
/// ab 1.4.c
define('_CAL_WYSIWYG_ACTIVE','WYSIWYG - Editor activate');
