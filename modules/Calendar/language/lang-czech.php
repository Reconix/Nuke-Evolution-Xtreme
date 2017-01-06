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
define("_CALDOTCOLORALL","v�e");    // desription of all Events (no colordot)
define("_CALSEND","Submit");
define("_CALSUBMITEVENT", "Ozn�mit ud�lost!");
define("_CALSUBMITNAME", "Zalo�en� nov� ud�losti");
define("_CALNAME", "Kalend�� akc�");
define("_CALPREVIEW", "Prohl�dnout");
define("_CALOK", "Odeslat ud�lost");
define("_CALEVENTDATETEXT", "Datum kon�n�");
define("_CALSUBSENT", "Va�i ud�lost byla �sp�n� ulo�ena");
define("_CALTHANKSSUB", "D�kujeme za Va�e ozn�men�!");
define("_CALSUBTEXT", "Va�e ozn�men� zpracujeme v nejbli���m mo�n�m term�nu a v p��pad�, �e bude odpov�dat zam��en� str�nek, r�di je zve�ejn�me.");
define("_CALSUBTEXTADMIN", "Va�e ozn�men� bylo uve�ejn�no.");
define("_CALWEHAVESUB", "V tuto chv�li m�me");
define("_CALWAITING", "ozn�men� �ekaj�c�ch na sv� uve�ejn�n�.");
define("_CALEVENTDATEPREVIEW", "Datum ud�losti");
define("_CALCHECKSTORY", "P�ed odesl�n�m ud�losti, pros�me, prov��te spr�vnost �as� p��padn� odkaz�, d�kujeme!");
define("_CALYOURNAME", "Va�e jm�no");
define("_CALLOGOUT", "Odhl�sit se");
define("_CALSUBTITLE", "P�edm�t");
define("_CALTOPIC", "T�ma");
define("_CALSELECTTOPIC", "Zvolte t�ma");
define("_CALARTICLETEXT", "Popis");
define("_CALHTMLISFINE", "P�i pou�it� html zna�ek, pros�me, ov��te spr�vnost odkaz�!");
define("_CALNEWSUBPREVIEW", "N�hled p�ed odesl�n�m");
define("_CALSTORYLOOK", "Va�e ud�lost bude vypadat takhle:");
define("_CALBEDESCRIPTIVE", "Zkuste b�t stru�n� a v�sti�n�");
define("_CALSUBPREVIEW", "P�ed odesl�n�m ud�losti je pot�eba ov��it jej� n�hled.");
define("_CALALLOWEDHTML", "Umo�n�n� html zna�ky jsou");
define("_CALSUBMISSIONSADMIN", "�ekaj�c� z�znamy");
define("_CALNEWSUBMISSIONS", "Nov� z�znamy ud�lost�");
define("_CALNOSUBJECT", "Nen� uveden P�edm�t!");
define("_CALNOSUBMISSIONS", "��dn� z�znamy ne�ekaj� na uve�ejn�n�!");
define("_CALDELETE", "Smazat");
define("_CALNAMEFIELD", "Jm�no");
define("_CALDELETESTORY", "Smazat ud�lost");
define("_CALPREVIEWSTORY", "N�hled na ud�lost");
define("_CALPOSTSTORY", "Ulo�it ud�lost");
define("_CALSUBMITADVICE1", "Pro za�azen� ozn�men� Va�� ud�losti vypl�te, pros�m tento formul��. V�echny �daje, pros�me, pe�liv� p�ekontrolujte..");
define("_CALSUBMITADVICE2", "<br />Redakce si vyhrazuje pr�vo v�echny ozn�men� neuve�ejnit.<br />Nov� ozn�men� mohou b�t redakc� gramaticky �i stylisticky upravena.");
define("_CALPOSTEDBY","Zaslala(-a)");
define("_CALPOSTEDON","dne");
define("_CALACCEPTEDBY"," zve�ejnil(-a)");
define("_CALPREVIOUS","P�edchoz�");
define("_CALNEXT","N�sleduj�c�");
define("_CALSTARTTIME","�as zah�jen�");
define("_CALENDTIME","�as ukon�en�");
define("_CALALLDAYEVENT","cel� den");
define("_CALTIMEIGNORED","�asy zah�jen� a ukon�en� budou pominuty.");
define("_CALENDDATETEXT","Datum ukon�en�");
define("_CALENDDATEPREVIEW","Datum ukon�en�");
#### TRANSLATE ??????????? #######################################################################
#define("_CALBARCOLORTEXT","Select a category for this event");
define("_CALBARCOLORTEXT","Kategorie");
define("_CALLOGIN","P�ihl�en�");
define("_CALNO","Ne");
define("_CALYES","Ano");
define("_CALREMOVETEST","Opravdu chcete tuto ud�lost smazat?");
define("_CALNOTAUTHORIZED1","Ke smaz�n� t�to ud�losti nem�te n�le�it� opr�vn�n�");
define("_CALNOTAUTHORIZED2","S jak�mikoli dotazy, pros�me, kontaktujte redakci str�nek.");
define("_CALNOTAUTHORIZED3","Omlouv�me se, ale k �prav� t�to ud�losti nem�te pat�i�n� opr�vn�n�.");
define("_CALTODAY","Dnes");
define("_CALLISTDESCRIPTION1","Nejbli���");
define("_CALLISTDESCRIPTION2","ud�losti");
define("_CALLISTSTART","od");
define("_CALLISTRANGE","do");
define("_CALHEADAPPOINTM","Setk�n�");
define("_CALDAYEVENTS","Ud�lost");
define("_CALDAYMORNING","R�no");
define("_CALDAYEVENING","Ve�er");
define("_CALMORE","dal�� Ud�losti");
define("_CAL1EVENT","Ud�lost");
define("_CAL2EVENT","Ud�losti");
define("_CAL0EVENTS", "Hled�n� nenalezlo ��dn� vhodn� z�znamy");
define("_CAL0EVENTSBLOCK", "Omlouv�me se, v sou�asnosti nejsou zaznamen�ny ��dn� bl��c� se akce.");
define("_CALNOTODAYEVENTS","Na dne�n� den nen� ohl�ena ��dn� ve�ejn� ud�lost.");
define("_CALADDASARTICLE","�l�nek");
define("_CALADDASARTICLE2","Zaslat toto ozn�men� z�rove� jako �l�nek.");

####### LINKS ########
define("_CALEVENTLINK","Vytvo�it ud�lost");
define("_CALAPPTLINK","Vytvo�it sch�zku");
define("_CALTASKLINK","P�idat nov� �kol");
define("_CALDAYLINK","Jako den");
define("_CALMONTHLINK","Jako m�s�c");
define("_CALYEARLINK","Jako rok");
define("_CALJUMPTOTEXT","Zobrazuj mi vybran�m zp�sobem");
define("_CALJUMPBUTTON","Jdi!");
define("_CALLISTLINK","dal�� ud�losti");

####### MONTHS ########
define("_CALJAN","leden");
define("_CALFEB","�nor");
define("_CALMAR","b�ezen");
define("_CALAPR","duben");
define("_CALMAY","kv�ten");
define("_CALJUN","�erven");
define("_CALJUL","�ervenec");
define("_CALAUG","srpen");
define("_CALSEP","z���");
define("_CALOCT","��jen");
define("_CALNOV","listopad");
define("_CALDEC","prosinec");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Ne");
define("_CALSECONDDAY","Po");
define("_CALTHIRDDAY","�t");
define("_CALFOURTHDAY","St");
define("_CALFIFTHDAY","�t");
define("_CALSIXTHDAY","P�");
define("_CALSEVENTHDAY","So");
define("_CALLONGFIRSTDAY","Ne");
define("_CALLONGSECONDDAY","Po");
define("_CALLONGTHIRDDAY","�t");
define("_CALLONGFOURTHDAY","St");
define("_CALLONGFIFTHDAY","�t");
define("_CALLONGSIXTHDAY","P�");
define("_CALLONGSEVENTHDAY","So");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","P�i ov��en� t�to ud�losti se vyskytly probl�my!");
define("_CALVALIDFIXMSG","P�ed n�hledem �i odesl�n�m ud�losti je pros�m, opravte.");
define("_CALVALIDSUBJECT","Pol��ko 'P�edm�t' je zapot�eb� vyplnit.");
define("_CALVALIDENDDATE","'Datum ukon�en�' nen� platn�.");
define("_CALVALIDEVENTDATE","'Datum ud�losti' nen� platn�.");
define("_CALVALIDDATES","'Datum ukon�en�' mus� b�t pozd�j�� �i shodn� s 'Datem ud�losti'.");
define("_CALVALIDTIMES","'�as ukon�en�' mus� b�t pozd�j�� �i shodn� s '�asem zah�jen�'.");
define("_CALVALIDTOPIC", "Zvolte, pros�m, t�ma ud�losti.");

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
define("_CALPRINTER2","odeslat tuto str�nku na tisk�rnu");
define("_CALPOSTANONYMOUS", "Anonymous Users allowed to submit events");
define("_CALUSERSAUTOPOST","Events from Registered Users approve automatically");
define("_CALANONYAUTOPOST","Events from Anonymous Users approve automatically");
define("_CALCATEGORIESADMIN","Category Configuration");
define("_CALCATEGORIESLANG","Select language");
define("_CALADMINMENU","Administration Menu");
define("_CALSHOWPOPS","Popup for Event Description");
define("_CALSOURCE","Zdroj");
define("_CALGOAL","C�l");

/// ab 1.4
define("_CALHOURS","hodiny");
define("_CALMINUTES","minuty");
define("_CALDAYS","dny");
define("_CALMONTHS","mes�ce");
define("_CALYEARS","roky");
define("_CALPLSLOGIN","P�ihlaste se, pros�m");
define("_CALSAVESETT", "Ulo�it");

define("_CALALLWORDS","slova z�rove�");
define("_CALANYWORDS","i samostatn�");
define("_CALSEARCH","Hledej");
define("_CALSEARCHEVENT","Hledat");
define("_CALFOR","co");
define("_CALSEARCHTITLE","Prohled�v�n� Kalend��e akc�");
define("_CALCQUEUE","V�sledky Va�eho hled�n�");
define("_CALTOMUCH1","Nalezen�ch v�sledk� je v�ce ne� ");
define("_CALTOMUCH2"," Omezte, pros�m, podm�nky prohled�v�n�.");
define("_CALSEARCHCOUNT", "max. po�et nalezen�ch v�sledk�");
define("_CALSEARCHTOPICS","hledej v �l�nc�ch");
#### TRANSLATE ??????????? #######################################################################
define("_CALMOREOPTIONINF","You find further options for the optical configuration of the calendar in the file:");
define("_CALSEFROMDATE","Od data");
define("_CALSELCATEGORY","zvol Kategorii");
define("_CALINTHIS","v");
define("_CALNOTOPICS", "��dn� t�mata nejsou moment�ln� nalezena");
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
