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
 * $Source: D:\\CVS/dev-Kalender/html/modules/Kalender/language/lang-czech.php,v $
 * $Revision: 4318 $
 * $Author: tulisan $
 * $Date: 2006-11-16 15:13:55 -0800 (Thu, 16 Nov 2006) $
 */

// translated by Martin Svitak (not complete)

if (!defined("CAL_MODULE_NAME")) die ("You can't access this file directly...");

####### locale time-format variables #######
if (PHP_OS=="WINNT"||PHP_OS=="WIN32") {
	define("_CALLOCALE","cz");   # lokale Einstellungen z.B. Datumsformat f&uuml;r Windows System!!
	}
else {
	define("_CALLOCALE","cz_CZ");		# lokale Einstellungen z.B. Datumsformat f&uuml;r Linux/Unix
	}
define("_CALSHORTDATEFORMAT","%d/%m/%y");
define("_CALLONGDATEFORMAT","%A, %B %d, %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",1);    //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",1);  // 1 = 24 hour time... 0 = AM/PM time
define("_CALTIMEFORMAT","%I:%M %p"); # ? AM/PM time
define("_CALWEEKBEGINN",1);		# the First Day in the Week: 0 = Sunday, 1 = Monday

####### main texts #######
define("_CALDOTCOLORALL","vše");    // desription of all Events (no colordot)
define("_CALSEND","Submit");
define("_CALSUBMITEVENT", "Oznámit událost!");
define("_CALSUBMITNAME", "Založení nové události");
define("_CALNAME", "Kalendáø akcí");
define("_CALPREVIEW", "Prohlédnout");
define("_CALOK", "Odeslat událost");
define("_CALEVENTDATETEXT", "Datum konání");
define("_CALSUBSENT", "Vaši událost byla úspìšnì uložena");
define("_CALTHANKSSUB", "Dìkujeme za Vaše oznámení!");
define("_CALSUBTEXT", "Vaše oznámení zpracujeme v nejbližším možném termínu a v pøípadì, že bude odpovídat zamìøení stránek, rádi je zveøejníme.");
define("_CALSUBTEXTADMIN", "Vaše oznámení bylo uveøejnìno.");
define("_CALWEHAVESUB", "V tuto chvíli máme");
define("_CALWAITING", "oznámení èekajících na své uveøejnìní.");
define("_CALEVENTDATEPREVIEW", "Datum události");
define("_CALCHECKSTORY", "Pøed odesláním události, prosíme, provìøte správnost èasù pøípadnì odkazù, dìkujeme!");
define("_CALYOURNAME", "Vaše jméno");
define("_CALLOGOUT", "Odhlásit se");
define("_CALSUBTITLE", "Pøedmìt");
define("_CALTOPIC", "Téma");
define("_CALSELECTTOPIC", "Zvolte téma");
define("_CALARTICLETEXT", "Popis");
define("_CALHTMLISFINE", "Pøi použití html znaèek, prosíme, ovìøte správnost odkazù!");
define("_CALNEWSUBPREVIEW", "Náhled pøed odesláním");
define("_CALSTORYLOOK", "Vaše událost bude vypadat takhle:");
define("_CALBEDESCRIPTIVE", "Zkuste být struèní a výstižní");
define("_CALSUBPREVIEW", "Pøed odesláním události je potøeba ovìøit její náhled.");
define("_CALALLOWEDHTML", "Umožnìné html znaèky jsou");
define("_CALSUBMISSIONSADMIN", "Èekající záznamy");
define("_CALNEWSUBMISSIONS", "Nové záznamy událostí");
define("_CALNOSUBJECT", "Není uveden Pøedmìt!");
define("_CALNOSUBMISSIONS", "Žádné záznamy neèekají na uveøejnìní!");
define("_CALDELETE", "Smazat");
define("_CALNAMEFIELD", "Jméno");
define("_CALDELETESTORY", "Smazat událost");
define("_CALPREVIEWSTORY", "Náhled na událost");
define("_CALPOSTSTORY", "Uložit událost");
define("_CALSUBMITADVICE1", "Pro zaøazení oznámení Vaší události vyplòte, prosím tento formuláø. Všechny údaje, prosíme, peèlivì pøekontrolujte..");
define("_CALSUBMITADVICE2", "<br />Redakce si vyhrazuje právo všechny oznámení neuveøejnit.<br />Nová oznámení mohou být redakcí gramaticky èi stylisticky upravena.");
define("_CALPOSTEDBY","Zaslala(-a)");
define("_CALPOSTEDON","dne");
define("_CALACCEPTEDBY"," zveøejnil(-a)");
define("_CALPREVIOUS","Pøedchozí");
define("_CALNEXT","Následující");
define("_CALSTARTTIME","Èas zahájení");
define("_CALENDTIME","Èas ukonèení");
define("_CALALLDAYEVENT","celý den");
define("_CALTIMEIGNORED","Èasy zahájení a ukonèení budou pominuty.");
define("_CALENDDATETEXT","Datum ukonèení");
define("_CALENDDATEPREVIEW","Datum ukonèení");
#### TRANSLATE ??????????? #######################################################################
#define("_CALBARCOLORTEXT","Select a category for this event");
define("_CALBARCOLORTEXT","Kategorie");
define("_CALLOGIN","Pøihlášení");
define("_CALNO","Ne");
define("_CALYES","Ano");
define("_CALREMOVETEST","Opravdu chcete tuto událost smazat?");
define("_CALNOTAUTHORIZED1","Ke smazání této události nemáte náležité oprávnìní");
define("_CALNOTAUTHORIZED2","S jakýmikoli dotazy, prosíme, kontaktujte redakci stránek.");
define("_CALNOTAUTHORIZED3","Omlouváme se, ale k úpravì této události nemáte patøièné oprávnìní.");
define("_CALTODAY","Dnes");
define("_CALLISTDESCRIPTION1","Nejbližší");
define("_CALLISTDESCRIPTION2","události");
define("_CALLISTSTART","od");
define("_CALLISTRANGE","do");
define("_CALHEADAPPOINTM","Setkání");
define("_CALDAYEVENTS","Událost");
define("_CALDAYMORNING","Ráno");
define("_CALDAYEVENING","Veèer");
define("_CALMORE","další Události");
define("_CAL1EVENT","Událost");
define("_CAL2EVENT","Události");
define("_CAL0EVENTS", "Hledání nenalezlo žádné vhodné záznamy");
define("_CAL0EVENTSBLOCK", "Omlouváme se, v souèasnosti nejsou zaznamenány žádné blížící se akce.");
define("_CALNOTODAYEVENTS","Na dnešní den není ohlášena žádná veøejná událost.");
define("_CALADDASARTICLE","èlánek");
define("_CALADDASARTICLE2","Zaslat toto oznámení zároveò jako èlánek.");

####### LINKS ########
define("_CALEVENTLINK","Vytvoøit událost");
define("_CALAPPTLINK","Vytvoøit schùzku");
define("_CALTASKLINK","Pøidat nový úkol");
define("_CALDAYLINK","Jako den");
define("_CALMONTHLINK","Jako mìsíc");
define("_CALYEARLINK","Jako rok");
define("_CALJUMPTOTEXT","Zobrazuj mi vybraným zpùsobem");
define("_CALJUMPBUTTON","Jdi!");
define("_CALLISTLINK","další události");

####### MONTHS ########
define("_CALJAN","leden");
define("_CALFEB","únor");
define("_CALMAR","bøezen");
define("_CALAPR","duben");
define("_CALMAY","kvìten");
define("_CALJUN","èerven");
define("_CALJUL","èervenec");
define("_CALAUG","srpen");
define("_CALSEP","záøí");
define("_CALOCT","øíjen");
define("_CALNOV","listopad");
define("_CALDEC","prosinec");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Ne");
define("_CALSECONDDAY","Po");
define("_CALTHIRDDAY","Út");
define("_CALFOURTHDAY","St");
define("_CALFIFTHDAY","Èt");
define("_CALSIXTHDAY","Pá");
define("_CALSEVENTHDAY","So");
define("_CALLONGFIRSTDAY","Ne");
define("_CALLONGSECONDDAY","Po");
define("_CALLONGTHIRDDAY","Út");
define("_CALLONGFOURTHDAY","St");
define("_CALLONGFIFTHDAY","Èt");
define("_CALLONGSIXTHDAY","Pá");
define("_CALLONGSEVENTHDAY","So");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","Pøi ovìøení této události se vyskytly problémy!");
define("_CALVALIDFIXMSG","Pøed náhledem èi odesláním události je prosím, opravte.");
define("_CALVALIDSUBJECT","Políèko 'Pøedmìt' je zapotøebí vyplnit.");
define("_CALVALIDENDDATE","'Datum ukonèení' není platné.");
define("_CALVALIDEVENTDATE","'Datum události' není platné.");
define("_CALVALIDDATES","'Datum ukonèení' musí být pozdìjší èi shodné s 'Datem události'.");
define("_CALVALIDTIMES","'Èas ukonèení' musí být pozdìjší èi shodné s 'Èasem zahájení'.");
define("_CALVALIDTOPIC", "Zvolte, prosím, téma události.");

#### TRANSLATE ??????????? #######################################################################
define("_CALINDEX", "Show right blocks column");
define("_CALTEXTEVENTS", "Use image bars for multiday events");
define("_CALADDARTICLEBOX", "Allow news article creation with events");
define("_CALPOSTUSERS","Registered users can submit events");
define("_CALUSETOPICS", "Use news topics to assist event categorization");
define("_CALUSETOPICS1", "Yes, but not necessarily");
define("_CALUSETOPICS2", "Yes, necessarily");
define("_CALDEFAULTVIEW", "Default Vew");
define("_CALMINUTERANGE", "Minutes between increments (recommend 15)");
define("_CALADMINEDITALL", "Only admins can edit events");
define("_CALADMINMENUSHOW", "Show Administration Menu (recommended)");
define("_CALADMINTYPE", "Which admins may work on events");
define("_CALLISTCOUNT", "Number of entries to display in list view");
define("_CALLISTSHOWSTART", "Display event start");
define("_CALLISTENDDATE", "Display event end date");
define("_CALLISTENDTIME", "Display event end time");
define("_CALLISTENDDATE2", "Display end date for single day events");
define("_CALLISTBR", "Line break between date and time in list view");
define("_CALDAYTIMEARRAY", "Time intervals in daily view");
define("_CALALLOWABLEHTML", "Permitted HTML tags in description");
define("_CALONLYWEN", "(only if final date indicated)");
define("_CALSHOWLINKS","Make date in date view clickable");
define("_CALCALENDARCONFIG", "Calendar configuration");
#### TRANSLATE ??????????? #######################################################################
define("_CALCONF1", "The settings could not be stored!");
define("_CALCONF2", "The settings were stored!");
define("_CALCONF3", "The file");
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
define("_CALPRINTER1","Tisknout");
define("_CALPRINTER2","odeslat tuto stránku na tiskárnu");
define("_CALPOSTANONYMOUS", "Anonymous Users allowed to submit events");
define("_CALUSERSAUTOPOST","Events from Registered Users approve automatically");
define("_CALANONYAUTOPOST","Events from Anonymous Users approve automatically");
define("_CALCATEGORIESADMIN","Category Configuration");
define("_CALCATEGORIESLANG","Select language");
define("_CALADMINMENU","Administration Menu");
define("_CALSHOWPOPS","Popup for Event Description");
define("_CALSOURCE","Zdroj");
define("_CALGOAL","Cíl");

/// ab 1.4
define("_CALHOURS","hodiny");
define("_CALMINUTES","minuty");
define("_CALDAYS","dny");
define("_CALMONTHS","mesíce");
define("_CALYEARS","roky");
define("_CALPLSLOGIN","Pøihlaste se, prosím");
define("_CALSAVESETT", "Uložit");

define("_CALALLWORDS","slova zároveò");
define("_CALANYWORDS","i samostatnì");
define("_CALSEARCH","Hledej");
define("_CALSEARCHEVENT","Hledat");
define("_CALFOR","co");
define("_CALSEARCHTITLE","Prohledávání Kalendáøe akcí");
define("_CALCQUEUE","Výsledky Vašeho hledání");
define("_CALTOMUCH1","Nalezených výsledkù je více než ");
define("_CALTOMUCH2"," Omezte, prosím, podmínky prohledávání.");
define("_CALSEARCHCOUNT", "max. poèet nalezených výsledkù");
define("_CALSEARCHTOPICS","hledej v èláncích");
#### TRANSLATE ??????????? #######################################################################
define("_CALMOREOPTIONINF","You find further options for the optical configuration of the calendar in the file:");
define("_CALSEFROMDATE","Od data");
define("_CALSELCATEGORY","zvol Kategorii");
define("_CALINTHIS","v");
define("_CALNOTOPICS", "Žádná témata nejsou momentálnì nalezena");
#### TRANSLATE ??????????? #######################################################################
define("_CALGOTOEDIT","edit again");
define("_CALGOTOADMIN","then goto Adminmenue");
define("_CALGOTOCALENDAR","then goto Calendarview");
define("_CALCONFVIEW1","Authorizations &amp Security");
define("_CALCONFVIEW2","Opinions &amp  Optics");
define("_CALCONFVIEW3","News-Articles &amp  Topics");
define("_CALLISTSHOWLINKS","Show date in list-view as link");

#### TRANSLATE ??????????? #######################################################################
/// ab 1.4.c
define('_CAL_WYSIWYG_ACTIVE','WYSIWYG - Editor activate');
